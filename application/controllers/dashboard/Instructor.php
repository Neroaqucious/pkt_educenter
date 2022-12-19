<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor extends CI_Controller
{
	//db and configuration
	private $private_db = "dashboard/Instructor_Model";
	protected $data;
	private $key, $url;
	protected $current_id, $current_user, $current_role, $current_csrf_key, $current_permission, $current_session_count, $current_login_time, $current_log_id, $session_checker, $user_config;
	protected $site_name, $meta_tag, $favicon, $decimal_point, $date_format, $phone_format, $user_session, $timezone;
	
	//File upload data
	private $filename;
	private $upload_path = "./upload/assets/adm/inst/";
	private $file_path = "/../../../upload/assets/adm/inst/";
	private $max_size = "202800";  // upload max size 200 MB
	private $max_width = "1024";
	private $max_height = "768";
	private $allow_type = 'jpg|jpeg|png|JPEG';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model($this->private_db);
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('encryption');
		$this->load->library('upload');
		$this->load->library('mainconfig');
		$this->load->helper('custom');
		$this->mainconfig->_DefaultTimeZone($this->timezone);
		
		/** Current User Session Assign **/
		$this->__preSessionDataSet();
		/** Site Configuration Assign **/
		$this->user_config = $this->__preSiteConfigDataSet();
		
		/** Token Checker **/
		$this->__tokenChecker();
		
		/** User Permission Checker **/
		$this->key = "pe_course";
		$this->url = "adm/portal/d-panel";
		$this->__permissionChecker($this->key,$this->url);
	}

	public function index()
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Instructor",
			'msg' => "",
			'uri' => array("instructor","instructor_lists"),
			'config' => $this->user_config
		);
		
		$list = $this->Instructor_Model->trainerList();
		//*** Generate necessary key and value
		$Q_list = _transfer_key_prepare(array_keys_checker($list));
		$this->data['list'] = array_transfer($list, $Q_list);
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
		
		$this->load->view('dashboard/instructor/list', $this->data);
	}

	public function add()
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Add Instructor",
			'msg' => "",
			'uri' => array("instructor","instructor_add"),
			'config' => $this->user_config
		);
		
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);

		if($_POST) {
			$this->form_validation->set_rules('tra_name', 'trainer name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('tra_email', 'email', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('tra_phone', 'phone number', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('tra_course', 'course name', 'trim|required');
			$this->form_validation->set_rules('tra_education', 'education name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('tra_description', 'education name', 'trim|xss_clean|max_length[150]');
			$this->form_validation->set_rules('userfile', 'lessons', 'trim');
			$this->form_validation->set_message('required', 'You must enter %s!');
			$this->form_validation->set_message('is_unique', 'Your %s is already exits!');
			$this->form_validation->set_message('numeric', 'The %s always allow only numbers!');
			$this->form_validation->set_message('valid_email', 'The %s must be valid!');
			$this->form_validation->set_error_delimiters("","");

			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/instructor/add', $this->data);
			} else {
				$data = array(
					'name' => $this->input->post('tra_name'),
					'email' => $this->input->post('tra_email'),
					'phone' => $this->input->post('tra_phone'),
					'course' => $this->input->post('tra_course'),
          'education' => $this->input->post('tra_education'),
          'description' => $this->input->post('tra_description'),
					'status' => $this->input->post('tra_status'),
					'created_at' => date("Y-m-d H:i:s"),
					'updated_at' => date("Y-m-d H:i:s"),
				);
        $data = $this->__Xss($data);
        $checkdata = $this->Instructor_Model->trainerCheck($data);
        
				if ($checkdata){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portal/instructor/add');
				}

				if (!empty($_FILES['userfile']['name'])) {
					//image upload sever and add database
					$imgupload = $this->mainconfig->_fileUpload($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, TRUE, TRUE, FALSE);

					if (!empty($imgupload['msg_error'])) {
							$this->session->set_flashdata('msg_error', $imgupload['msg_error']);
							redirect('adm/portal/instructor/add');
					} else {
							$data['images'] = $imgupload['file_name'];
							$this->Instructor_Model->insert($data);
							$this->session->set_flashdata('msg_success', 'Your data has been insert!');
							redirect('adm/portal/instructor');
					}
				} else {
					$this->session->set_flashdata('msg_error', 'Not allow empty data uploading! Please retrun.');
					redirect('adm/portal/instructor/add');
				}
			}
		} else {
			$this->load->view('dashboard/instructor/add', $this->data);
		}
	}

	public function edit($id)
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Edit Instructor",
			'msg' => "",
			'uri' => array("instructor","instructor_lists"),
			'config' => $this->user_config,
		);
		
		$list = $this->Instructor_Model->trainerDetail($id);
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/instructor", $list);
		//*** Generate necessary key and value
		$Q_list = _transfer_key_prepare(object_key_checker($list));
		
		$this->data['result'] = object_transfer($list, $Q_list);
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
		$recent_cover = $this->data['result']->images;
		
		if($_POST) {
			$this->form_validation->set_rules('tra_name', 'trainer name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('tra_email', 'email', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('tra_phone', 'phone number', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('tra_course', 'course name', 'trim|required');
			$this->form_validation->set_rules('tra_education', 'education name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('tra_description', 'education name', 'trim|xss_clean|max_length[150]');
			$this->form_validation->set_rules('userfile', 'lessons', 'trim');
			$this->form_validation->set_message('required', 'You must enter %s!');
			$this->form_validation->set_message('is_unique', 'Your %s is already exits!');
			$this->form_validation->set_message('numeric', 'The %s always allow only numbers!');
			$this->form_validation->set_message('valid_email', 'The %s must be valid!');
			$this->form_validation->set_error_delimiters("","");

			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/instructor/edit', $this->data);
			} else {

				$data = array(
					'name' => $this->input->post('tra_name'),
					'email' => $this->input->post('tra_email'),
					'phone' => $this->input->post('tra_phone'),
					'course' => $this->input->post('tra_course'),
          'education' => $this->input->post('tra_education'),
          'description' => $this->input->post('tra_description'),
					'status' => $this->input->post('tra_status'),
					'updated_at' => date("Y-m-d H:i:s"),
				);

				$data = $this->__Xss($data);
				$checkdata = $this->Instructor_Model->trainerCheck($data);

				if (!empty($_FILES['userfile']['name']))
				{
					//delete recent file from server
					if(!empty($recent_cover)) {
						$preview_link = dirname(__FILE__)."".$this->file_path."".$recent_cover;
						if(file_exists($preview_link)){
							unlink($preview_link);
						}
					}
					//image upload sever and add database
					$movupload = $this->mainconfig->_fileUpload($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, TRUE, TRUE, FALSE);

					if(!empty($movupload['msg_error'])) {
							$this->session->set_flashdata('msg_error', $movupload['msg_error']);
							redirect('adm/portal/instructor/edit/'.$id);
					} else {
							$data['images'] = $movupload['file_name'];
					}
				} else {
					if ($checkdata) {
						$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
						redirect('adm/portal/instructor/edit/'.$id);
					}
				}
				
				$data['result'] = $this->Instructor_Model->trainerUpdate($data, $id);
				$this->session->set_flashdata('msg_success', 'Your data has been update!');
				redirect("adm/portal/instructor");
			}
		} else {
			$this->load->view('dashboard/instructor/edit', $this->data);
		}
	}

	public function view($id)
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "View Instructor Detail",
			'msg' => "",
			'uri' => array("instructor","instructor_lists"),
			'config' => $this->user_config
		);
		
		$list = $this->Instructor_Model->detail($id);
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/instructor", $list);
		//*** Generate necessary key and value
		$Q_list = _transfer_key_prepare(object_key_checker($list));
		$this->data['result'] = object_transfer($list, $Q_list);
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
		
		$this->load->view('dashboard/instructor/view', $this->data);
	}

  public function delete($id)
  {
	  /** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Delete Instructor",
		  'msg' => "",
		  'uri' => array("instructor","instructor_lists"),
		  'config' => $this->user_config,
	  );
	
	  $list = $this->Instructor_Model->detail($id);
	  //*** Current query value checker
	  $this->__resultEmptyChecker($id, $globalHeader,"adm/portal/instructor", $list);
	  
	  $parentChecker = $this->Instructor_Model->checkParentinstructor($id);
	  $recent_date = $this->Instructor_Model->detail($id);
	  
		if(count($parentChecker) > 0 ) {
			$this->session->set_flashdata('msg_error', "Request data can't delete!");
			redirect('adm/portal/instructor');
		} else {
			$recent_cover = $recent_date->images;
			$photolink = dirname(__FILE__) . $this->file_path . $recent_cover;
			if (file_exists($photolink))
			{
				unlink($photolink);
			}
			$this->Instructor_Model->trainerDelete($id);
			$this->session->set_flashdata('msg_success', 'Your data has been delete!');
			redirect("adm/portal/instructor");
		}
  }
	
	/******* Session Reassign and Distibute *********/
	private function __preSessionDataSet(){
		$this->current_id = isset($_SESSION['__admin_user_data']['user_id'])?$_SESSION['__admin_user_data']['user_id']:"";
		$this->current_user = isset($_SESSION['__admin_user_data']['user_name'])?$_SESSION['__admin_user_data']['user_name']:"";
		$this->current_role = isset($_SESSION['__admin_user_data']['user_role'])?$_SESSION['__admin_user_data']['user_role']:"";
		$this->current_csrf_key = isset($_SESSION['__admin_token_slug'])?$_SESSION['__admin_token_slug']:"";
		$this->current_permission = isset($_SESSION['__admin_user_data']['user_permission'])?$_SESSION['__admin_user_data']['user_permission']:"";
		$this->current_log_id  = isset($_SESSION['__admin_session_id'])?$_SESSION['__admin_session_id']:"";
		$this->current_session_count = isset($_SESSION['__admin_user_data']['session'])?$_SESSION['__admin_user_data']['session']:"";
		$this->current_login_time = isset($_SESSION['__admin_user_data']['login_time'])?$_SESSION['__admin_user_data']['login_time']:"";
		$this->session_checker = isset($_SESSION['__pre_session_check']['check_point'])?$_SESSION['__pre_session_check']['check_point']:"";
	}
	
	/******* Site Configuration Reassign and Distibute *********/
	private function __preSiteConfigDataSet(){
		$config = $this->mainconfig->_getInitialSiteConfigData();
		if(!empty($config)) {
			$this->site_name = $config->site_name;
			$this->meta_tag = $config->meta_tag;
			$this->favicon = $config->favicon;
			$this->date_format = $config->date_format;
			$this->decimal_point = $config->decimal_point;
			$this->phone_format = $config->phone_format;
			$this->user_session = $config->user_session;
			$this->timezone = $config->timezone;
		}
		return $config;
	}
	
	/******* Security Configuration *********/
	private function __Xss($data){
		return $this->security->xss_clean($data);
	}
	
	/******* Role And Permission Check Point *********/
	private function string_pos($find)
	{
		if(!empty($this->current_permission)) {
			return strpos($this->current_permission, $find);
		}
	}
	
	private function __permissionChecker($key, $url){
		if($this->string_pos($key) === FALSE){
			$this->session->set_flashdata('msg_error', "Your aren't permission for this config!");
			redirect($url);
		}
	}
	
	/******* Login Configuration and Token Checker *********/
	private function _user_query_Remove($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('adm_config');
		return true;
	}
	
	private function _get_user_token($token, $slug)
	{
		$this->db->select('id,adm_id,csrf_token_key,csrf_slug_key');
		$this->db->from('adm_config');
		$this->db->where('csrf_token_key', $token);
		$this->db->where('csrf_slug_key', $slug);
		$query=$this->db->get();
		return $query->result();
	}
	
	private function __pretokenCheck(){
		if(empty($this->current_csrf_key) || $this->session_checker == false) {
			return FALSE;
		} else {
			$data = $this->mainconfig->_mbSplit('_', $this->current_csrf_key);
			$key_info = $this->_get_user_token($data[0].'_', $data[1]);
			if(count($key_info) == 1 && $key_info[0]->id == $this->current_log_id) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
	
	private function __tokenChecker(){
		if(empty($this->__pretokenCheck())) {
			$queryChecker = $this->_user_query_Remove($this->current_log_id);
			if($queryChecker) {
				redirect('adm/portal/auth/logout');
			}
		}
	}
	
	/******* Other necessary Configuration *********/
	public function __resultEmptyChecker($id, $return, $url, $data = Null){
		if(empty($id) || !is_numeric($id) || empty($data)){
			$this->session->set_flashdata('msg_error', "Bad Request, Not allowed permission!");
			redirect($url, $return);
		}
	}

}
