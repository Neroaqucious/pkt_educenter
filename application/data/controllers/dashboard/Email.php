<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Email extends CI_Controller
{
	//db and configuration
	private $private_db = "dashboard/Email_Model";
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
		$this->load->library('email');
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
		$this->key = "pe_config";
		$this->url = "adm/portal/d-panel";
		$this->__permissionChecker($this->key,$this->url);
	}

	public function index()
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
			
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Email List",
			'msg' => "",
			'uri' => array("email","email_list"),
			'config' => $this->user_config
		);
		
		$list = $this->Email_Model->emailList();
		$Q_list = _transfer_key_prepare(array_keys_checker($list));
		$this->data['lists'] = array_transfer($list, $Q_list);		
		foreach ($this->data['lists'] as $rows)
		{
			$rows->content = $this->mainconfig->_textLimiter($rows->content, 100);
		}
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

		$this->load->view('dashboard/email/email_list', $this->data);
	}

	public function view($id)
	{
		/** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "View Email",
		  'msg' => "",
		  'uri' => array("email","email_list"),
		  'config' => $this->user_config
	  );
	
	  $list = $this->Email_Model->detail($id);
	  //*** Current query value checker
	  $this->__resultEmptyChecker($id, $globalHeader,"adm/portal/email", $list);
	  //*** Generate necessary key and value
	  $Q_list = _transfer_key_prepare(object_key_checker($list));
	  $this->data['result'] = object_transfer($list, $Q_list);
	  
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

		$this->load->view('dashboard/email/email_view', $this->data);
	}

	public function add()
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Add Email",
			'msg' => "",
			'uri' => array("email","email_add"),
			'config' => $this->user_config,
		);
		
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);

		if($_POST) {
			$this->form_validation->set_rules('subject', 'email subject', 'trim|required|xss_clean');
			$this->form_validation->set_rules('def_key', 'reference key', 'trim|required|is_unique[mail.def_key]|xss_clean');
			$this->form_validation->set_rules('content', 'email content', 'trim|required|xss_clean');
	
			$this->form_validation->set_message('required', 'You must enter %s!');
			$this->form_validation->set_message('is_unique', 'Your %s is already exits!');

			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/email/email_add', $this->data);
			} else {
				$data = array(
					'subject' => $this->input->post('subject'),
					'def_key' => $this->input->post('def_key'),
					'content' => $this->input->post('content'),
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'status' => $this->input->post('status')
				);
				$data = $this->__Xss($data);
				$checkdata = $this->Email_Model->emailCheck($data);

				if ($checkdata){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portal/email/add');
				}

				$this->Email_Model->insert($data);
				$this->session->set_flashdata('msg_success', 'Your data has been insert!');
				redirect('adm/portal/email');
			}
		} else {
			$this->load->view('dashboard/email/email_add', $this->data);
		}
	}

	public function edit($id)
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Edit Email",
			'msg' => "",
			'uri' => array("email","email_list"),
			'config' => $this->user_config,
		);
		
		$list = $this->Email_Model->detail($id);
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/email", $list);
		//*** Generate necessary key and value
		$Q_list = _transfer_key_prepare(object_key_checker($list));
		
		$this->data['result'] = object_transfer($list, $Q_list);
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

		if($_POST) {
			$this->form_validation->set_rules('subject', 'email subject', 'trim|required|xss_clean');
			$this->form_validation->set_rules('def_key', 'reference key', 'trim|required|xss_clean');
			$this->form_validation->set_rules('content', 'email content', 'trim|required|xss_clean');
			$this->form_validation->set_rules('id', 'email id', 'trim|required|xss_clean');
	
			$this->form_validation->set_message('required', 'You must enter %s!');
			$this->form_validation->set_message('is_unique', 'Your %s is already exits!');

			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/email/email_edit', $this->data);
			} else {
				$id = $this->input->post('id');
				$data = array(
					'subject' => $this->input->post('subject'),
					'def_key' => $this->input->post('def_key'),
					'content' => $this->input->post('content'),
					'updated_at' => date('Y-m-d H:i:s'),
					'status' => $this->input->post('status')
				);
				$data = $this->__Xss($data);
				$checkdata = $this->Email_Model->emailCheck($data);
				$check = $this->Email_Model->emailRefKeyCheck($id,$this->input->post('def_key'));

				if ($checkdata || $check){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portal/email/edit/'.$this->url_encode($id));
				}

				$data['result'] = $this->Email_Model->emailUpdate($data, $id);
				$this->session->set_flashdata('msg_success', 'Your data has been update!');
				redirect("adm/portal/email");
			}
		} else {
			$this->load->view('dashboard/email/email_edit', $this->data);
		}
	}

	public function delete($id)
	{
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Email",
			'msg' => "",
			'uri' => array("email","email_list"),
			'config' => $this->user_config,
		);		
		$this->__resultEmptyChecker($id, $globalHeader, "adm/portal/email", $globalHeader);

		$this->Email_Model->emailDelete($id);
		$this->session->set_flashdata('msg_success', 'Your data has been delete!');
		redirect("adm/portal/email", $this->data);
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
