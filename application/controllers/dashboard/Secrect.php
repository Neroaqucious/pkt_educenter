<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
class Secrect extends CI_Controller {
	private $private_db = "dashboard/Admin_Model";
	protected $data, $timezone;	
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
		$this->load->helper('custom');
	  $this->mainconfig->_DefaultTimeZone($this->timezone);
  }
  
  public function loader()
  {
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Admin Login",
		  'msg' => "",
	  );
		
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);
    if($_POST) {
      $this->form_validation->set_rules('user_name', 'username!','trim|required|min_length[2]|xss_clean');
      $this->form_validation->set_rules('user_password', 'password!', 'trim|required|min_length[5]|xss_clean');
      
	    if ($this->form_validation->run() === false) {
        $this->load->view('dashboard/ip/login', $this->data);
      } else {
        $username = $this->security->xss_clean($this->input->post('user_name'));
	      $username = $this->mainconfig->_data64Encode($username);
        $password = $this->security->xss_clean($this->input->post('user_password'));
        
			if($this->_security_admin_login($username, $password)) {
				$user_status = $this->_get_user_status($username);
				$role_permission = $this->_get_role_status($username);
					
				if($user_status == 1 && $role_permission == 1) {
						$softKey = array(
		        	"softKey" => $this->__generate_csrf_slug_key(),
			        'record_timeout' => date('Y-m-d H:i:s',time()+300)
		        );
						$session_check = $this->__sessionDataAssign($softKey, 300);

						if($session_check) {
							redirect('root/portal/url/generate/ipaccess/new');
						} else {
							$this->data['msg']="Something worry, Please try again!";
							$this->load->view('dashboard/ip/login', $this->data);
						}
					} else {
						$this->data['msg']="Invalid information!";
						$this->load->view('dashboard/ip/login', $this->data);
					}
				} else {
					$this->data['msg']="Invalid information!";
					$this->load->view('dashboard/ip/login', $this->data);
				}
			}
    } else {
      $this->load->view('dashboard/ip/login', $this->data);
    }
  }

	public function add()
  {
		$this->__tokenChecker();
	  $globalHeader = array(
		  'title' => "Add IP",
		  'msg' => "",
		  'iprange' => $this->__getPersonalIPAdd()
	  );
		$list = $this->_get_ip_address(1);
		$Q_list = _transfer_key_prepare(object_key_checker($list));
	  $this->data['result'] = object_transfer($list, $Q_list);
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
    if($_POST) {
      $this->form_validation->set_rules('accept_ip','ip address','trim|required|xss_clean');
      $this->form_validation->set_message('required', 'You must provide %s');
    if ($this->form_validation->run() === false) {
			$this->load->view('dashboard/ip/add', $this->data);
    } else {
        $data = array(        
          "allow_ip" => $this->mainconfig->_strToLower($this->input->post('accept_ip')),
          "skey" => $_SESSION['softKey'],
	        "updated_at" => date('Y-m-d H:i:s'),
        );
				
				$prev_data = $this->_get_ip_address(1);
				if(!empty($prev_data->skey)) {
					$checkip = $this->__updatedIP($data);
				} else {
					$checkip = $this->__insertIP($data);
				}

				if($checkip) {
					$this->session->unset_userdata("softKey");
					$this->session->unset_userdata("record_timeout");
					unset($_SESSION['__ci_vars']);
					redirect('adm/portal/auth/login');
				} else {
					redirect('root/portal/url/generate/ipaccess');
				}
      }
    } else {
      $this->load->view('dashboard/ip/add', $this->data);
    }
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
	
	private function __sessionDataAssign($session, $set_time = null)
	{
		if($session != "" && $set_time != "") {
			$this->session->set_tempdata($session, Null, $set_time); //Set session time 4 hour
		} else {
			$this->session->set_tempdata($session, Null, 1800); //Set session time 30 minutes
		}
		return true;
	}

	private function __pretokenCheck(){
		if(empty($_SESSION['softKey']) || $_SESSION['softKey'] == false) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	private function __tokenChecker(){
		if(empty($this->__pretokenCheck())) {
			redirect('root/portalkey/url/generate/ipaccess');
		}
	}

	
	private function __generate_csrf_slug_key()
	{
		$comp1 = $comp2 = []; $dd = $dd1 = $dd3 = "";
		$tokenkey = $this->encryption->encrypt($this->__preTokenGenerateWithSlug());
		
		$first_str = preg_replace("/[\/]/", "$1", $tokenkey);
		$first_str = preg_replace("/[0-9+_~]/", "$1", $first_str);
		for ($i = 0; $i < 2; $i++) {
			$comp1[] = mb_substr($first_str, (1*$i), 5);
		}
		foreach ($comp1 as $row) {
			$dd .= $row."-";
		}
		
		$second_str = preg_replace("/[A-z+_~*^]/", "$1", $tokenkey);
		for ($i = 0; $i < 2; $i++) {
			$comp2[] = mb_substr($second_str, (1*$i), 5);
		}
		foreach ($comp2 as $row) {
			$dd1 .= $row."";
		}
		
		$data = array_combine($comp1, $comp2);
		foreach ($data as $key=>$val) {
			$dd3 .= $val."".$key;
		}
		$this->csrf_slug = $dd3;
		return strtoupper($this->csrf_slug);
	}
	
	private function __preTokenGenerateWithSlug()
	{
		$agent = $this->agent->platform();
		$date = date('_Ymdhis_');
		$ipaddress =  $this->input->ip_address();
		
		$key1 = $this->_getDataEncrypt($agent, $date);
		$key2 = $this->_getDataEncrypt($ipaddress, $date);
		
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

//   if($socket = @fsockopen("www.google.com", 80, $num, $error, 5)){
//     $ipAddress = file_get_contents('https://api.ipify.org');
//   } else {
// 	$ipAddress = $_SERVER['REMOTE_ADDR'];
// }
// return $ipAddress;

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

	private function _get_ip_address($id){
		$this->db->from('ip_match');
		$this->db->where('id', $id);
		return $this->db->get()->row();
	}

	private function __insertIP($data){
		$this->db->insert('ip_match', $data);
		return true;
	}

	private function __updatedIP($data){
		$this->db->where('id', 1);
    $this->db->update('ip_match', $data);
    return true;
	}
}