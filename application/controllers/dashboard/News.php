<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
{
	//db and configuration
	private $private_db = "dashboard/News_Model";
	protected $data;
	private $key, $url;
	private $current_id, $current_user, $current_role, $current_csrf_key, $current_permission, $current_session_count, $current_login_time, $current_log_id, $session_checker, $user_config;
	private $site_name, $meta_tag, $favicon, $decimal_point, $date_format, $phone_format, $user_session, $timezone;
	
	//File upload data
	private $filename;
	private $upload_path = "./upload/assets/adm/new/";
	private $file_path = "/../../../upload/assets/adm/new/";
	private $max_size = "202800";  // upload max size 200 MB
	private $max_width = "1600";
	private $max_height = "1600";
	private $allow_type = 'jpg|jpeg|png|JPEG';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model($this->private_db);
		$this->load->library('session');
		$this->load->library('encryption');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->library('image_lib');
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
		$this->key = "pe_activity";
		$this->url = "adm/portal/d-panel";
		$this->__permissionChecker($this->key,$this->url);
	}

	public function index()
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
			
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Event & News",
			'msg' => "",
			'uri' => array("event","event_list"),
			'config' => $this->user_config
		);
		
		$list = $this->News_Model->getNews();
		$Q_list = _transfer_key_prepare(array_keys_checker($list));
		$this->data['lists'] = array_transfer($list, $Q_list);

		foreach ($list as $row)
		{
			$row->content = $this->mainconfig->_textLimiter($row->content, 20);
			$row->title = $this->mainconfig->_textLimiter($row->title, 30);
			$row->thumb = $this->upload_path."_thumb/".$row->thumb;
		}
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
		$this->load->view('dashboard/news/news_list', $this->data);
	}

	public function add()
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);

		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Add News",
			'msg' => "",
			'uri' => array("event","event_add"),
			'config' => $this->user_config,
			'tags' => $this->News_Model->getTagsData(),
		);
		
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);

		if($_POST) {
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('content', 'content', 'trim|required');
			$this->form_validation->set_rules('tags', 'tags', 'trim|required');
			$this->form_validation->set_rules('userfile', 'cover photo', 'trim');

			$this->form_validation->set_message('required', 'You must enter a %s!');

			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/news/news_add', $this->data);
			} else {
				$data = array(
					'title' => $this->input->post('title'),
					'content' => $this->input->post('content'),
					'tags_id' => $this->input->post('tags'),
					'created_at' => date("Y-m-d H:i:s"),
					'updated_at' => date("Y-m-d H:i:s"),
					'status' => $this->input->post('status'),
				);
				$data = $this->__Xss($data);
				$checkdata = $this->News_Model->newsCheck($data);

				if ($checkdata){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portal/news/add');
				}

				if (!empty($_FILES['userfile']['name'])) {
					//image upload sever and add database
					$imgupload = $this->mainconfig->_fileUpload($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, TRUE, TRUE, TRUE);
					
					if (!empty($imgupload['msg_error'])) {
						$this->session->set_flashdata('msg_error', $imgupload['msg_error']);
						redirect('adm/portal/news/add');
					} else {
						$data['photo'] = $imgupload['file_name'];
						$data['thumb'] = $imgupload['raw_name']."_thumb".$imgupload['file_ext']; //thumb file create
						$this->News_Model->newsInsert($data);
						$this->session->set_flashdata('msg_success', 'Your data has been insert!');
						redirect('adm/portal/news');
					}
				} else {
					$this->session->set_flashdata('msg_error', 'Not allow empty movies uploading! Please retrun.');
					redirect('adm/portal/news');
				}
			}
		} else {
			$this->load->view('dashboard/news/news_add', $this->data);
		}
	}

	public function edit($id)
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
			
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Edit News",
			'msg' => "",
			'uri' => array("event","event_list"),
			'config' => $this->user_config,
		);
		
		$list = $this->News_Model->getNewsDetail($id);
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/news", $list);
		//*** Generate necessary key and value
		$Q_list = _transfer_key_prepare(object_key_checker($list));
		$this->data['tags']=$this->News_Model->getTagsData();
		
		$this->data['result'] = object_transfer($list, $Q_list);
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

		$recent_photo = $this->data['result']->photo;
		$recent_thumb = $this->data['result']->thumb;

		if($_POST) {
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('content', 'content', 'trim|required');
			$this->form_validation->set_rules('tags', 'tags', 'trim|required');
			$this->form_validation->set_rules('userfile', 'cover photo', 'trim');

			$this->form_validation->set_message('required', 'You must enter a %s!');

			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/news/news_edit', $this->data);
			} else {
				$data = array(
					'title' => $this->input->post('title'),
					'content' => $this->input->post('content'),
					'tags_id' => $this->input->post('tags'),
					'updated_at' => date("Y-m-d H:i:s"),
					'status' => $this->input->post('status'),
				);
				$data = $this->__Xss($data);
				$checkdata = $this->News_Model->newsCheck($data, $id);

				if (!empty($_FILES['userfile']['name'])) {
					if(!empty($recent_photo)) {
						$preview_link = dirname(__FILE__)."".$this->file_path."".$recent_photo;
						if(file_exists($preview_link)){
							unlink($preview_link);
						}
					}
					
					if(!empty($recent_thumb)) {
						$preview_thumb = dirname(__FILE__)."".$this->file_path."_thumb/".$recent_thumb;
						if(file_exists($preview_thumb)){
							unlink($preview_thumb);
						}
					}
					
					//image upload sever and add database
					$imgupload = $this->mainconfig->_fileUpload($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, TRUE, TRUE, TRUE);
					
					if(!empty($imgupload['msg_error'])) {
						$this->session->set_flashdata('msg_error', $imgupload['msg_error']);
						redirect('adm/portal/news/edit/'.$id);
					} else {
						$data['photo'] = $imgupload['file_name'];
						$data['thumb'] = $imgupload['raw_name']."_thumb".$imgupload['file_ext'];
					}
				} else {
					if ($checkdata) {
						$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
						redirect('adm/portal/news/edit/'.$id);
					}
				}
				
				$this->News_Model->newsUpdate($data, $id);
				$this->session->set_flashdata('msg_success', 'Your data has been update!');
				redirect("adm/portal/news");
			}
		} else {
			$this->load->view('dashboard/news/news_edit', $this->data);
		}
	}

	public function view($id)
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
			
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "View News Detail",
			'msg' => "",
			'uri' => array("event","event_list"),
			'config' => $this->user_config
		);
		
		$list = $this->News_Model->getNewsDetail($id);
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/news", $list);
		//*** Generate necessary key and value
		$Q_list = _transfer_key_prepare(object_key_checker($list));
		$this->data['result'] = object_transfer($list, $Q_list);
		
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

		$this->load->view('dashboard/news/news_view', $this->data);
	}

	public function delete($id)
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
			
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Delete News",
			'msg' => "",
			'uri' => array("event","event_list"),
			'config' => $this->user_config,
		);
		
		$list = $this->News_Model->getNewsDetail($id);
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/news", $list);
		

		$recent_cover = $list->photo;
		$recent_thumb = $list->thumb;
			
			if(!empty($recent_cover)) {
				$preview_link = dirname(__FILE__)."".$this->file_path."".$recent_cover;
				if(file_exists($preview_link)){
					unlink($preview_link);
				}
			}
			
			if (!empty($recent_thumb)) {
				$preview_thumb = dirname(__FILE__)."".$this->file_path."_thumb/".$recent_thumb;
				if(file_exists($preview_thumb)){
					unlink($preview_thumb);
				}
			}
			
			$this->News_Model->newsDelete($id);
			$this->session->set_flashdata('msg_success', 'Your data has been delete!');
			redirect('adm/portal/news');
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

	/******* Other necessary Configuration *********/
	public function __resultEmptyChecker($id, $return, $url, $data = Null){
		if(empty($id) || !is_numeric($id) || empty($data)){
			$this->session->set_flashdata('msg_error', "Bad Request, Not allowed permission!");
			redirect($url, $return);
		}
	}

}
