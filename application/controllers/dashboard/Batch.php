<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch extends CI_Controller
{
	//db and configuration
	private $private_db = "dashboard/Batch_Model";
	protected $data;
	private $key, $url;
	private $current_id, $current_user, $current_role, $current_csrf_key, $current_permission, $current_session_count, $current_login_time, $current_log_id, $session_checker, $user_config;
	private $site_name, $meta_tag, $favicon, $decimal_point, $date_format, $phone_format, $user_session, $timezone;
	
  public function __construct()
  {
    parent::__construct();
	
	  $this->load->database();
	  $this->load->model($this->private_db);
	  $this->load->library('session');
	  $this->load->library('encryption');
	  $this->load->library('form_validation');
	  $this->load->library('mainconfig');
	  $this->load->helper('custom');
	  $this->mainconfig->_DefaultTimeZone($this->timezone);
	
	  /** Session Assign **/
	  $this->__preSessionDataSet();
	  /** Site Configuration Assign **/
	  $this->user_config = $this->__preSiteConfigDataSet();
	
	  /** Token Checker **/
	  $this->__tokenChecker();
	  $this->key = "pe_course";
	  $this->url = "adm/portal/d-panel";
  }

	public function index()
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Batch List",
			'msg' => "",
			'uri' => array("batch","batch_lists"),
			'config' => $this->user_config
		);
		
		$list = $this->Batch_Model->getBatchList("online");
		$Q_list = _transfer_key_prepare(array_keys_checker($list));
		$this->data['lists1'] = array_transfer($list, $Q_list);
		
		$list = $this->Batch_Model->getBatchList("offline");
		$Q_list = _transfer_key_prepare(array_keys_checker($list));
		$this->data['lists2'] = array_transfer($list, $Q_list);
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

    $this->load->view('dashboard/batch/list', $this->data);
  }

  public function view($id)
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "View Batch Detail",
			'msg' => "",
			'uri' => array("batch","batch_lists"),
			'config' => $this->user_config
		);
		
		$list = $this->Batch_Model->getBatchDetailList($id);
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/batch", $list);
		//*** Generate necessary key and value
		$Q_list = _transfer_key_prepare(object_key_checker($list));
		$this->data['result'] = object_transfer($list, $Q_list);
		
		//Batch List
		$batch = $this->Batch_Model->getStudentLists($id);
		$Q_list = _transfer_key_prepare(array_keys_checker($batch));
		$this->data['list'] = array_transfer($batch, $Q_list);	
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

    $this->load->view('dashboard/batch/views', $this->data);
  }

	public function add()
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Add Batch",
			'msg' => "",
			'uri' => array("batch","batch_add"),
			'config' => $this->user_config,
			'course' => $this->Batch_Model->getCourse(),
			'trainer' => $this->Batch_Model->getTriner(),
		);
		
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);

		if($_POST) {
      $this->form_validation->set_rules('course', 'course', 'trim|required|xss_clean');
			$this->form_validation->set_rules('class', 'class', 'trim|required|xss_clean');
			$this->form_validation->set_rules('trainer', 'instructor', 'trim|required|xss_clean');
      $this->form_validation->set_rules('desc', 'description', 'trim|xss_clean');
      $this->form_validation->set_rules('remark', 'status', 'trim|xss_clean');
      $this->form_validation->set_rules('month_duration', 'month', 'trim|required|xss_clean');
			$this->form_validation->set_rules('day_duration', 'day', 'trim|required|xss_clean');
      $this->form_validation->set_rules('class_days[]', 'days', 'trim|required|xss_clean|callback_option_check');
      $this->form_validation->set_rules('start_times', 'start times', 'trim|required|xss_clean');
			$this->form_validation->set_rules('end_times', 'end times', 'trim|required|xss_clean');
			$this->form_validation->set_rules('start_date', 'start date', 'trim|required|xss_clean');
      $this->form_validation->set_rules('fees', 'fees', 'trim|required|integer|xss_clean');
      $this->form_validation->set_rules('total_std', 'limited', 'trim|required|xss_clean');
      $this->form_validation->set_rules('unlimit', 'unlimit', 'trim|xss_clean');
			$this->form_validation->set_rules('liveclass', 'liveclass', 'trim|required|xss_clean');
      $this->form_validation->set_rules('release', 'release date', 'trim|required|xss_clean');
      $this->form_validation->set_rules('closed', 'closed date', 'trim|required|xss_clean');      
      $this->form_validation->set_rules('status', 'status', 'trim|xss_clean');
      
			$this->form_validation->set_message('required', 'You must enter %s!');
			
			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/batch/add', $this->data);
			} else {
        $lastid = $this->Batch_Model->getLastID();
        $unlimit = $this->input->post('liveclass');
        $last_id = serial_id_generate("bch-", $lastid->id, 5);
        $unlimited = (isset($unlimit))?$unlimit:"off";

				$class_days = substr(implode(', ', $this->input->post('class_days')), 0);

				$data = array(
          'batch_id' => $last_id,
          'course_id' => $this->input->post('course'),
					'trainer_id' => $this->input->post('trainer'),
          'description' => $this->input->post('desc'),
          'fees' => $this->input->post('fees'),
          'member' => $this->input->post('total_std'),
          'unlimited' => $unlimited,
					'liveclass' => $this->input->post('liveclass'),
          'days' => $class_days,
          'start_time' => $this->input->post('start_times'),
					'end_time' => $this->input->post('end_times'),
          'month_duration' => $this->input->post('month_duration'),
					'day_duration' => $this->input->post('day_duration'),
					'start_date' => $this->input->post('start_date'),
          'remark' => $this->input->post('remark'),
          'status' => $this->input->post('status'),
          'released_date' => date("Y-m-d H:i:s", strtotime($this->input->post('release'))),
          'closed_date' => date("Y-m-d H:i:s", strtotime($this->input->post('closed'))),
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
				);
        
        $data = $this->__Xss($data);
        $checkdata = $this->Batch_Model->batchCheck($data);

				if ($checkdata){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portal/batch/add');
        }
				$this->Batch_Model->insert($data);
				$this->session->set_flashdata('msg_success', 'Your data has been insert!');
				redirect('adm/portal/batch');
			}
		} else {
			$this->load->view('dashboard/batch/add', $this->data);
		}
	}
	
	public function edit($id)
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Edit Batch",
			'msg' => "",
			'uri' => array("batch","batch_lists"),
			'config' => $this->user_config,
		);
		
		$list = $this->Batch_Model->detail($id);
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/batch", $list);
		//*** Generate necessary key and value
		$Q_list = _transfer_key_prepare(object_key_checker($list));
		$this->data['course'] = $this->Batch_Model->getCourse();
		$this->data['trainer'] = $this->Batch_Model->getTriner();
		
		$this->data['result'] = object_transfer($list, $Q_list);
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
		
		if($_POST) {
      $this->form_validation->set_rules('course', 'course', 'trim|required|xss_clean');
			$this->form_validation->set_rules('class', 'class', 'trim|required|xss_clean');
			$this->form_validation->set_rules('trainer', 'instructor', 'trim|required|xss_clean');
      $this->form_validation->set_rules('desc', 'description', 'trim|xss_clean');
      $this->form_validation->set_rules('remark', 'status', 'trim|xss_clean');
      $this->form_validation->set_rules('month_duration', 'month', 'trim|required|xss_clean');
			$this->form_validation->set_rules('day_duration', 'day', 'trim|required|xss_clean');
      $this->form_validation->set_rules('class_days[]', 'days', 'trim|required|xss_clean|callback_option_check');
      $this->form_validation->set_rules('start_times', 'start times', 'trim|required|xss_clean');
			$this->form_validation->set_rules('end_times', 'end times', 'trim|required|xss_clean');
			$this->form_validation->set_rules('start_date', 'start date', 'trim|required|xss_clean');
      $this->form_validation->set_rules('fees', 'fees', 'trim|required|integer|xss_clean');
      $this->form_validation->set_rules('total_std', 'limited', 'trim|required|xss_clean');
      $this->form_validation->set_rules('unlimit', 'unlimit', 'trim|xss_clean');
			$this->form_validation->set_rules('liveclass', 'liveclass', 'trim|xss_clean');
      $this->form_validation->set_rules('release', 'release date', 'trim|required|xss_clean');
      $this->form_validation->set_rules('closed', 'closed date', 'trim|required|xss_clean');      
      $this->form_validation->set_rules('status', 'status', 'trim|xss_clean');
      
			$this->form_validation->set_message('required', 'You must enter %s!');
			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/batch/edit', $this->data);
			} else {
        $unlimit = $this->input->post('unlimit');
        $unlimited = (isset($unlimit))?$unlimit:"off";
				$class_days = substr(implode(', ', $this->input->post('class_days')), 0);

        $data = array(
          'batch_id' => $this->input->post('batch_id'),
          'course_id' => $this->input->post('course'),
	        'trainer_id' => $this->input->post('trainer'),
          'description' => $this->input->post('desc'),
          'fees' => $this->input->post('fees'),
          'member' => $this->input->post('total_std'),
          'unlimited' => $unlimited,
					'liveclass' => $this->input->post('liveclass'),
					'days' => $class_days,
          'start_time' => $this->input->post('start_times'),
					'end_time' => $this->input->post('end_times'),
          'month_duration' => $this->input->post('month_duration'),
					'day_duration' => $this->input->post('day_duration'),
					'start_date' => $this->input->post('start_date'),
          'remark' => $this->input->post('remark'),
          'status' => $this->input->post('status'),
          'released_date' => date("Y-m-d H:i:s", strtotime($this->input->post('release'))),
          'closed_date' => date("Y-m-d H:i:s", strtotime($this->input->post('closed'))),
          'updated_at' => date('Y-m-d H:i:s')
				);

        $data = $this->security->xss_clean($data);
        $checkdata = $this->Batch_Model->batchCheck($data);	
				if ($checkdata){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portal/batch/edit/'.$id);
				}
				$data['result'] = $this->Batch_Model->batchUpdate($data, $id);
				$this->session->set_flashdata('msg_success', 'Your data has been update!');
        redirect("adm/portal/batch");        
			}
		} else {
			$this->load->view('dashboard/batch/edit', $this->data);
		}
	}

	public function delete($id)
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Delete Batch",
			'msg' => "",
			'uri' => array("batch","batch_lists"),
			'config' => $this->user_config,
		);
		
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader, "adm/portal/batch", $globalHeader);
		
		$studentChecker = $this->Batch_Model->getTotalStudentDetail($id);
		if(count($studentChecker) > 0 ) {
			$this->session->set_flashdata('msg_error', "Bad Request, You can't delete this data!");
			redirect('adm/portal/batch');
		} else {
			$this->Batch_Model->batchDelete($id);
			$this->session->set_flashdata('msg_success', 'Your data has been delete!');
			redirect('adm/portal/batch');
		}
  }

  public function fetch_course()
  {
    if($_POST) {
        $proposal_data = $this->input->post('proposal');
        echo $this->Batch_Model->fetch_course($proposal_data);
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
	
/** Callback filter function */
	public function option_check()
	{
		if(empty($this->input->post('class_days[]'))){
			$this->form_validation->set_message('option_check', 'You must provide %s');
			return FALSE;
		} else {
			return TRUE;
		}
	}

}
