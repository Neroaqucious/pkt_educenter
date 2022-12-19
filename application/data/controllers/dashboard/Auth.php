<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
  private $private_db = "dashboard/Admin_Model";
	protected $data;
	//Initial auth session
	private $admintoken, $current_log_id;
	//Initial presite config
	private $site_name, $meta_tag, $favicon, $decimal_point, $date_format, $phone_format, $user_session, $timezone;
	
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model($this->private_db);
	  $this->load->library('session');
	  $this->load->library('form_validation');
    $this->load->library('user_agent');
    $this->load->library('encryption');
	  $this->load->library('mainconfig');
	  $this->mainconfig->_DefaultTimeZone($this->timezone);
	  $this->__initSessionDataAssign();
	  $this->__preSiteConfigDataSet();
  }
  
	public function index(){
		$globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Admin Login",
		  'msg' => "",
	  );
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);

		if($this->__AcceptIPGenerater()) {
			$url = $this->__makeIPUrlGenerate();
			redirect($url);
		} else {
			$this->output->set_status_header('404');
			$this->data['msg'] = "";
			return $this->load->view('error_404', $this->data);
		}
	}

  public function login($slug = null, $key = null)
  {
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Admin Login",
		  'msg' => "",
			'slug' => $slug,
			'key' => $key,
	  );

	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);

		if($slug == null || $slug == "" && $key == null || $slug == "") {
			$this->output->set_status_header('404');
			$this->data['msg'] = "";
			return $this->load->view('error_404', $this->data);
		}

			$skey = isset($_SESSION['__pre_ip_match']['skey'])?$_SESSION['__pre_ip_match']['skey']:date('_Ymdhis_');
			$slugkey = isset($_SESSION['__pre_ip_match']['slug'])?$_SESSION['__pre_ip_match']['slug']:date('_Ymdhis_');		
		if($slug != null || $slug != "" && $key != null || $slug != "") {
			$skey = isset($_SESSION['__pre_ip_match']['skey'])?$_SESSION['__pre_ip_match']['skey']:date('_Ymdhis_');
			$slugkey = isset($_SESSION['__pre_ip_match']['slug'])?$_SESSION['__pre_ip_match']['slug']:date('_Ymdhis_');
			if($slug != $skey && $key != $slugkey) {
				$this->output->set_status_header('404');
				$this->data['msg'] = "";
				return $this->load->view('error_404', $this->data);
			}
		}

	  $this->mainconfig->_customSessionChecker( 1, $this->admintoken,"adm/portal/d-panel");

    if($_POST) {
      $this->form_validation->set_rules('user_name', 'username!','trim|required|min_length[2]|xss_clean');
      $this->form_validation->set_rules('user_password', 'password!', 'trim|required|min_length[5]|xss_clean');
      
	    if ($this->form_validation->run() === false) {
        $this->load->view('dashboard/auth/login', $this->data);
      } else {
        $username = $this->security->xss_clean($this->input->post('user_name'));
	      $username = $this->mainconfig->_data64Encode($username);
        $password = $this->security->xss_clean($this->input->post('user_password'));
				$skey = $this->security->xss_clean($this->input->post('skey'));
				$slugkey = $this->security->xss_clean($this->input->post('slug_key'));
				
				$sess_skey = isset($_SESSION['__pre_ip_match']['skey'])?$_SESSION['__pre_ip_match']['skey']:"";
				$sess_slugkey = isset($_SESSION['__pre_ip_match']['slug'])?$_SESSION['__pre_ip_match']['slug']:"";

				if($skey == $sess_skey && $slugkey == $sess_slugkey) {
					if($this->_security_admin_login($username, $password)) {
						$user_status = $this->_get_user_status($username);
						$role_permission = $this->_get_role_status($username);
						
						if($user_status == 1 && $role_permission == 1) {
							$user_info = $this->_get_user_info($username);
							$permission = $this->_get_user_config($user_info[0]->role);
							$user_session = $this->_get_user_session($user_info[0]->role);
							$ip_address = $this->input->ip_address();
							$agent = $this->agent->browser().", ".$this->agent->version().", ".$this->agent->platform();
							$token_key = $this->__generate_csrf_token_key();
							$slug_key = $this->__generate_csrf_slug_key();
							$p_ip = $this->__getPersonalIPAdd();

							$userdata = array(
							  "adm_id" => $user_info[0]->id,
							  "csrf_token_key" => $token_key,
							  "csrf_slug_key" => $slug_key,
							  "ipaddress" => $ip_address,
								'p_ipaddress' => $p_ip,
							  "agent" => $agent,
							  "session_time" => $user_session,
							  "session_start" => date('Y-m-d H:i:s'),
							  "session_timeout" => date('Y-m-d H:i:s',time()+$user_session),
							);
							$current_id = $this->Admin_Model->setAdminLogin($userdata);

							$admin_info = array(
							  'user_id' => $user_info[0]->id,
							  'user_name' => $this->mainconfig->_data64Decode($user_info[0]->username),
							  'user_role' => $user_info[0]->role,
							  'user_permission' => $permission,
							  'ip_address' => $ip_address,
							  'useragent' => $agent,
							  'session' => $user_session,
							  'login_time' => date('Y-m-d H:i:s',time()),
							  'session_timeout' => date('Y-m-d H:i:s',time()+$user_session)
							);

							$site_config = array(
							  "site_name" => $this->site_name,
							  "meta_tag" => $this->meta_tag,
							  "favicon" => $this->favicon,
							  "date_format" => $this->date_format,
							  "decimal_point" => $this->decimal_point,
							  "phone_format" => $this->phone_format,
							  "user_session" => $this->user_session,
							);

							/** real session data assign*/
							$sessiondata = array(
							  '__admin_user_data' => $admin_info,
							  '__admin_token_slug' => $token_key.$slug_key,
							  '__admin_session_id' => $current_id,
							  '__admin_config_data' => $site_config,
							);
							$this->session->set_userdata($sessiondata);

							/** checkpoint session data assign*/
							$presession = array(
								"check_point" => TRUE,
							  'record_timeout' => date('Y-m-d H:i:s',time()+$user_session-1)
							);

							$sessionchecker = array(
								'__pre_session_check' => $presession,
							);

							$session_check = $this->mainconfig->__sessionDataAssign($sessionchecker, '__pre_session_check', $user_session-1);

							if($session_check) {
								
								unset($_SESSION['__pre_ip_match']['skey']);
								unset($_SESSION['__pre_ip_match']['slug']);
								unset($_SESSION['__ci_vars']['__pre_ip_match']);
								unset($_SESSION['__pre_ip_match']);

								redirect('adm/portal/d-panel');	
							} else {
							  $this->data['msg']="Something worry, Please try again!";
							  $this->load->view('dashboard/auth/login', $this->data);
							}
						} else {
							$this->data['msg']="Please contact with admin!";
							$this->load->view('dashboard/auth/login', $this->data);
						}
					} else {
						$this->data['msg']="Invalid information!";
						$this->load->view('dashboard/auth/login', $this->data);
					}
				} else {
					redirect('adm/portal/auth/login');
				}
      }
    } else {
      $this->load->view('dashboard/auth/login', $this->data);
    }
  }

  public function logout()
  {
		if($this->current_log_id) {
			$this->_userRecordTrancase($this->current_log_id);
		}
	  $this->session->unset_userdata("__admin_user_data");
	  $this->session->unset_userdata("__admin_token_slug");
	  $this->session->unset_userdata("__admin_session_id");
	  $this->session->unset_userdata("__admin_config_data");
	  $this->session->unset_userdata("__pre_session_check");
		unset($_SESSION['__pre_ip_match']['skey']);
		unset($_SESSION['__pre_ip_match']['slug']);
		unset($_SESSION['__ci_vars']['__pre_session_check']);
	  redirect('adm/portal/auth/login');
  }
  
/*** Initial Configuration Checker */
	private function __initSessionDataAssign(){
		$this->admintoken = isset($_SESSION['__admin_token_slug'])?$_SESSION['__admin_token_slug']:"";
		$this->current_log_id = isset($_SESSION['__admin_session_id'])?$_SESSION['__admin_session_id']:"";
	}
	
	private function __sessionDataAssign($session, $set_time = null)
	{
		if($session != "" && $set_time != "") {
			$this->session->set_tempdata($session, Null, $set_time); //Set session time 4 hour
		} else {
			$this->session->set_tempdata($session, Null, 1800); //Set session time 30 minutes
		}
		return true;
	}
	
/*** Login Configuration ***/
  private function _security_admin_login($user_name, $user_pass)
  {
    $this->db->where('username', $user_name);
    $hash = $this->db->get('admin')->row('password');
    return $this->_verify_password_hash($user_pass, $hash);
  }
	
	private function _verify_password_hash($user_pass, $hash)
	{
		return password_verify($user_pass, $hash);
	}
	
	private function __generate_csrf_token_key()
	{
		$this->csrf_token = $_SESSION['__ci_last_regenerate'];
		return "\$pkt".$this->csrf_token."_";
	}
	
	private function __generate_csrf_slug_key()
	{
		$comp1 = $comp2 = []; $dd = $dd1 = $dd3 = "";
		$tokenkey = $this->encryption->encrypt($this->__preTokenGenerateWithSlug());
		
		$first_str = preg_replace("/[\/]/", "$1", $tokenkey);
		$first_str = preg_replace("/[0-9+_~]/", "$1", $first_str);
		for ($i = 0; $i < 4; $i++) {
			$comp1[] = mb_substr($first_str, (2*$i), 5);
		}
		foreach ($comp1 as $row) {
			$dd .= $row."-";
		}
		
		$second_str = preg_replace("/[A-z+_~*^]/", "$1", $tokenkey);
		for ($i = 0; $i < 4; $i++) {
			$comp2[] = mb_substr($second_str, (2*$i), 5);
		}
		foreach ($comp2 as $row) {
			$dd1 .= $row."-";
		}
		
		$data = array_combine($comp1, $comp2);
		foreach ($data as $key=>$val) {
			$dd3 .= $val."-".$key;
		}
		$this->csrf_slug = $dd3;
		return $this->csrf_slug;
	}
	
	private function __preTokenGenerateWithSlug()
	{
		$agent = $this->agent->platform();
		$skey = isset($_SESSION['__pre_ip_match']['skey'])?$_SESSION['__pre_ip_match']['skey']:date('_Ymdhis_');
		$ipaddress =  $this->input->ip_address();
		$slugkey = isset($_SESSION['__pre_ip_match']['slug'])?$_SESSION['__pre_ip_match']['slug']:date('_Ymdhis_');
		$key1 = $this->_getDataEncrypt($agent, $skey);
		$key2 = $this->_getDataEncrypt($ipaddress, $slugkey);
		
		if (!empty($key1) && !empty($key2))
		{
			$csrf = $key1."$".$key2;
			$csrf = substr($csrf, 1, 30);
		}
		return $csrf;
	}
	
	/** Security Helper Function */
	public function _getDataEncrypt($info, $salt)
	{
		if(!empty($info))
		{
			$info = openssl_encrypt($info,"AES-128-ECB", $salt);
			$info = $this->encryption->encrypt($info);
		}
		return $info;
	}
	
	public function _getDataDecrypt($info, $salt)
	{
		if(!empty($info))
		{
			$info = $this->encryption->decrypt($info);
			$info = openssl_decrypt($info,"AES-128-ECB", $salt);
		}
		return $info;
	}

  private function __getPersonalIPAdd()
  {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
  }

	private function __makeIPUrlGenerate(){
		$skey = $this->_get_ip_address(1)->skey;
		$slug_key = $this->__generate_csrf_slug_key();

		/** checkpoint session data assign*/
		$ipmatch = array(
			"skey" => $skey,
			'slug' => $slug_key
		);
		$sessionchecker = array(
			'__pre_ip_match' => $ipmatch,
		);

		$IPsession = $this->mainconfig->__sessionDataAssign($sessionchecker, '__pre_ip_match', 1800);
		if($IPsession) {
			return base_url('adm/portal/auth/login/'.$skey."/".$slug_key);
		}
	}

	private function __AcceptIPGenerater() {
		$iptarget = $this->_get_ip_address(1);
		if(!empty($iptarget)) {
		 	$allow_ip = $iptarget->allow_ip;
		}
		$allow_ip = isset($allow_ip)?$allow_ip:"";
		$private_address = $this->__getPersonalIPAdd();
		if($this->__checkIPTracking($private_address, $allow_ip)) {
			return true;
		} else {
			return false;
		}
	}

	private function __checkIPTracking($target, $data){
		$assgin = explode(',', $data);
		foreach($assgin as $row) {
			$ipdata[] =  trim($row);
		}

		if(count($ipdata) == 1) {
			if($ipdata[0] == trim($target)) {
				return true;
			} else {
				return false;
			}
		} else {
			if (in_array($target, $ipdata)) {
				return true;
			} else {
				return false;
			}
		}
	}

	private function _get_ip_address($id){
		$this->db->from('ip_match');
		$this->db->where('id', $id);
		return $this->db->get()->row();
	}

	private function _get_user_status($user_name)
	{
		$this->db->select('status');
		$this->db->from('admin');
		$this->db->where('username', $user_name);
		return $this->db->get()->row('status');
	}
	
	private function _get_role_status($user_name)
	{
		$this->db->select('adm_role.status as status');
		$this->db->from('admin');
		$this->db->where('username', $user_name);
		$this->db->join('adm_role', 'adm_role.name = admin.role', 'left');
		return $this->db->get()->row('status');
	}
	
	private function _get_user_info($user_name)
	{
		$this->db->select('id,username,role');
		$this->db->from('admin');
		$this->db->where('username', $user_name);
		$query=$this->db->get();
		return $query->result();
	}
	
	private function _get_user_config($user_config)
	{
		$this->db->select('config');
		$this->db->from('adm_role');
		$this->db->where('name', $user_config);
		return $this->db->get()->row('config');
	}
	
	private function _get_user_session($user_role)
	{
		$this->db->select('session');
		$this->db->from('adm_role');
		$this->db->where('name', $user_role);
		return $this->db->get()->row('session');
	}
	
	private function _userRecordTrancase($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('adm_config');
		return true;
	}
	
/******* Site Configuration Reassign and Distibute *********/
	private function __preSiteConfigDataSet(){
		$config = $this->Config_Model->getSiteConfig();
		if(!empty($config)) {
			$this->site_name = $config->site_name;
			$this->meta_tag = $config->meta_tag;
			$this->favicon = $config->favicon;
			$this->date_format = $config->date_format;
			$this->decimal_point = $config->decimal_point;
			$this->phone_format = $config->phone_format;
			$this->user_session = $config->user_session;
			$this->timezone = isset($config->timezone)?$config->timezone:"Asia/Rangoon";
		}
		return true;
	}

}