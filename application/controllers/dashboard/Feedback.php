<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Feedback extends CI_Controller
{
  //db and configuration
	private $private_db = "dashboard/Feedback_Model";
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
			'title' => "Feedback",
			'msg' => "",
			'uri' => array("feedback",""),
			'config' => $this->user_config
		);
		
		$list = $this->Feedback_Model->feedbackList();
		$Q_list = _transfer_key_prepare(array_keys_checker($list));
		$this->data['lists'] = array_transfer($list, $Q_list);		
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

		$this->load->view('dashboard/feedback/list', $this->data);
	}

	public function view($id)
  {
    /** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "View Feedback",
		  'msg' => "",
		  'uri' => array("feedback",""),
		  'config' => $this->user_config
	  );
	
	  $list = $this->Feedback_Model->feedbackDetail($id);
	  //*** Current query value checker
	  $this->__resultEmptyChecker($id, $globalHeader,"adm/portal/feedback", $list);
	  //*** Generate necessary key and value
	  $Q_list = _transfer_key_prepare(object_key_checker($list));
	  $this->data['result'] = object_transfer($list, $Q_list);
	  
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

    $status = array(
        'status' => 1
    );
    $mark = $this->Feedback_Model->feedbackUpdate($status,$id);
    if($mark) {
        $this->load->view('dashboard/feedback/view', $this->data);
    }
  }

  public function delete($id)
	{
		//global header
		$data['title'] = "Feedback";
		$data['msg'] = "";

		if(empty($id) || !is_numeric($id)){
      $this->session->set_flashdata('msg_error', "Bad Request, Not allowed permission!");
      redirect('adm/portal/feedback', $data);
		}

    $this->Feedback_Model->feedbackDelete($id);
		$this->session->set_flashdata('msg_success', 'Your data has been delete!');
		redirect('adm/portal/feedback');
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

