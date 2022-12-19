<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qanda extends CI_Controller
{
	private $private_db = "dashboard/Qanda_Model";
	private $default_timezone = "Asia/Rangoon";
	protected $data;
	private $key, $url;
	protected $current_id, $current_user, $current_role, $current_csrf_key, $current_permission, $current_session_count, $current_login_time, $current_log_id, $session_checker, $user_config;
	protected $site_name, $meta_tag, $favicon, $decimal_point, $date_format, $phone_format, $user_session, $timezone;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model($this->private_db);
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('mainconfig');
		$this->load->helper('custom');
		$this->mainconfig->_DefaultTimeZone($this->default_timezone);
		
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
			'title' => "QandA",
			'msg' => "",
			'uri' => array("qanda","list"),
			'config' => $this->user_config
		);
		
		$list = $this->Qanda_Model->qandaList();
		//*** Generate necessary key and value
		$Q_list = _transfer_key_prepare(array_keys_checker($list));
		$this->data['lists'] = array_transfer($list, $Q_list);
		foreach($this->data['lists'] as $row) {
			$row->question = $this->mainconfig->_textLimiter($row->question, 20);
			$row->answer = $this->mainconfig->_textLimiter($row->answer, 70);
		}
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
    $this->load->view('dashboard/qanda/index', $this->data);
	}

	public function add()
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Add QandA",
			'msg' => "",
			'uri' => array("qanda","add"),
			'config' => $this->user_config,
		);
		
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);

		if($_POST) {
			$this->form_validation->set_rules('question', 'question', 'trim|required|xss_clean|min_length[6]');
      $this->form_validation->set_rules('answer', 'answer', 'trim|xss_clean|required');

			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/qanda/add', $this->data);
			} else {  
				$data = array(
					'question' => $this->input->post('question'),
					'answer' => $this->input->post('answer'),
					'status' => $this->input->post('status')
				);

        $data = $this->security->xss_clean($data);        
				$checkdata = $this->Qanda_Model->qandaCheck($data);

				if ($checkdata){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portal/qanda');
        }

				$this->Qanda_Model->insert($data);
				$this->session->set_flashdata('msg_success', 'Your data has been insert!');
				redirect('adm/portal/qanda');
			}
		} else {
			$this->load->view('dashboard/qanda/add', $this->data);
		}
	}

  public function view($id)
  {
	  /** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "View QandA",
		  'msg' => "",
		  'uri' => array("qanda","list"),
		  'config' => $this->user_config
	  );
	
	  $list = $this->Qanda_Model->detail($id);
	  //*** Current query value checker
	  $this->__resultEmptyChecker($id, $globalHeader,"adm/portal/qanda", $list);
	  //*** Generate necessary key and value
	  $Q_list = _transfer_key_prepare(object_key_checker($list));
	  $this->data['result'] = object_transfer($list, $Q_list);
	  
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
	  
    $this->load->view('dashboard/qanda/view', $this->data);
  }

	public function edit($id)
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Edit qanda",
			'msg' => "",
			'uri' => array("qanda","list"),
			'config' => $this->user_config,
		);
		
		$list = $this->Qanda_Model->detail($id);
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/qanda", $list);
		//*** Generate necessary key and value
		$Q_list = _transfer_key_prepare(object_key_checker($list));
		
		$this->data['result'] = object_transfer($list, $Q_list);
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
		
		if($_POST) {
			$this->form_validation->set_rules('question', 'question', 'trim|required|xss_clean|min_length[6]');
      $this->form_validation->set_rules('answer', 'answer', 'trim|xss_clean|required');

			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/qanda/edit', $this->data);
			} else {  
				$data = array(
					'question' => $this->input->post('question'),
					'answer' => $this->input->post('answer'),
					'status' => $this->input->post('status')
				);

				$data = $this->__Xss($data);
				$checkdata = $this->Qanda_Model->qandaCheck($data);

				if ($checkdata){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portal/qanda/edit/'.$id);
        }

				$data['result'] = $this->Qanda_Model->qandaUpdate($data, $id);
				$this->session->set_flashdata('msg_success', 'Your data has been update!');
				redirect("adm/portal/qanda");
			}
		} else {
			$this->load->view('dashboard/qanda/edit', $this->data);
		}
	}

	public function delete($id)
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "QandA",
			'msg' => "",
			'uri' => array("qanda","list"),
			'config' => $this->user_config,
		);
		
		$this->__resultEmptyChecker($id, $globalHeader, "adm/portal/qanda", $globalHeader);
		
			$this->Qanda_Model->qandaDelete($id);
			$this->session->set_flashdata('msg_success', 'Your data has been delete!');
			redirect('adm/portal/qanda');
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
