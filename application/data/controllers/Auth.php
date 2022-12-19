<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
  private $mod = "Auth_Model";
  private $private_db = "student";
  private $db1 = "std_profile";

  private $data;
  private $sessiondata, $authkey, $slugkey, $std_id, $usr_email,$usr_phone, $usr_name, $current_log_id;
  private $id, $enroll_course, $enroll_batch, $enroll_package, $enroll_checker, $usertoken;
  //Initial presite config
	private $site_name, $meta_tag, $favicon, $decimal_point, $date_format, $phone_format, $user_session, $timezone;

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model($this->mod);
    $this->load->library('session');
	  $this->load->library('form_validation');
    $this->load->library('user_agent');
    $this->load->library('encryption');
    $this->load->library('encrypt');
    $this->load->helper('cookie');
    $this->load->library('userconfig');
    
    //Custom Timezone
    $this->userconfig->_DefaultTimeZone($this->timezone);
    $this->__initSessionDataAssign();
    $this->__preSiteConfigDataSet();
  }
  
  public function login()
  {
    $this->index();
  }

  public function index()
  {
    $globalHeader = array(
		  "pass" => ['login' => 'login/index'],
		  'title' => "Login",
		  'msg' => "",
	  );
	  $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, []);
	  $this->userconfig->_customSessionChecker( 1, $this->usertoken,"student/dashboard");
   
    if($_POST) {
      $this->form_validation->set_rules('email', 'email!','trim|required|xss_clean|min_length[8]|valid_email');
      $this->form_validation->set_rules('password', 'password!', 'trim|required|xss_clean|min_length[6]');
      if ($this->form_validation->run() === false) {
        $this->load->view('page/login', $this->data);
      } else {
        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        $this->usr_email = $this->__Xss($email);
        $user_password = $this->__Xss($pass);
       
        if($this->_security_student_login($this->usr_email, $user_password)){
          $this->id = $this->_get_user_id($this->usr_email);
          $userData = $this->_get_user_data($this->id);
          $this->usr_name = $userData[0]->name;
          $this->std_id = $userData[0]->user_id;
          $this->usr_phone = $userData[0]->phone;
          
          if($userData[0]->status == 1) {
            $this->authkey = $this->_get_student_authkey($this->id);
            $user_session = $this->_get_user_session();
            $this->slugkey = $this->__generate_csrf_slug_key();
            $ip_address = $this->input->ip_address();
						$agent = $this->agent->browser().", ".$this->agent->version().", ".$this->agent->platform();

            $userdata = array(
	            "std_id" => $this->id,
		          "csrf_token_key" => $this->authkey,
		          "csrf_slug_key" => $this->slugkey,
		          "ipaddress" => $ip_address,
		          "agent" => $agent,
		          "session_time" => $user_session,
		          "session_start" => date('Y-m-d H:i:s'),
		          "session_timeout" => date('Y-m-d H:i:s',time()+$user_session),
	          );
	          $this->current_log_id = $this->Auth_Model->setStudentLogin($userdata);

		        $student_info = array(
		          'user_id' => $this->id,
		          'user_name' => $this->usr_name,
              'student_id' => $this->std_id,
              'user_email' => $this->usr_email,
              'user_phone' => $this->usr_phone,
		          'ip_address' => $ip_address,
		          'useragent' => $agent,
		          'session' => $user_session,
		          'login_time' => date('Y-m-d H:i:s',time()),
			        'session_timeout' => date('Y-m-d H:i:s',time()+$user_session)
		        );

	          /** real session data assign*/
		        $this->sessiondata = array(
		          '__student_user_data' => $student_info,
		          '__student_token_slug' => $this->authkey.$this->slugkey,
		          '__student_session_id' => $this->current_log_id,
		        );
	          $this->session->set_userdata($this->sessiondata);

		        $presession = array(
		        	'usercheck_point' => TRUE,
			        'session_timeout' => date('Y-m-d H:i:s',time()+$user_session-1)
		        );

		        $sessionchecker = array(
		        	'__student_session' => $presession,
		        );

            $session_check = $this->userconfig->__sessionDataAssign($sessionchecker, '__student_session', $user_session-1);

	          if($session_check) {
              if($this->enroll_package != "") {
                redirect('enroll/course');
              } else {
                redirect('student/dashboard');
              }
            } else {
		          $this->data['msg']="Something worry, Please try again!";
		          $this->load->view('page/login', $this->data);
	          }
          } else {
	          $this->data['msg']="Account isn't activated!";
            $this->load->view('page/login', $this->data);
          }
        } else {
          $this->data['msg']="Invalid information!";
          $this->load->view('page/login', $this->data);
        }
      }
    } else {
      $this->load->view('page/login', $this->data);
    }
  }

  public function logout()
  {
    if($this->current_log_id) {
			$this->_userRecordTrancase($this->current_log_id);
		}
	  $this->session->unset_userdata("__student_user_data");
	  $this->session->unset_userdata("__student_token_slug");
	  $this->session->unset_userdata("__student_session_id");
	  $this->session->unset_userdata("__student_session");
    unset($_SESSION['__ci_vars']['__student_session']);
	  redirect('auth/login');
  }

  public function regist()
  {
    $globalHeader = array(
		  "pass" => ['register' => 'auth/regist'],
		  'title' => "Sign up",
		  'msg' => "",
	  );
	  $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, []);
	
    if($_POST) {
        $this->form_validation->set_rules('std_name', 'name', 'trim|required|min_length[5]|xss_clean');
        $this->form_validation->set_rules('std_email', 'email', 'trim|required|valid_email|is_unique[OSL_student.email]|xss_clean');
        $this->form_validation->set_rules('std_password', 'password', 'trim|required|min_length[6]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('conf_password', 'confirm password', 'trim|required|min_length[6]|max_length[30]|xss_clean|matches[std_password]');
        $this->form_validation->set_rules('phone', 'phone number', 'trim|required|numeric|xss_clean');
      
        $this->form_validation->set_message('required', 'You must enter %s!');
        $this->form_validation->set_message('is_unique', 'Your %s is already exits!');
        $this->form_validation->set_message('numeric', 'The %s always allow only numbers!');
        $this->form_validation->set_message('valid_email', 'The %s must be valid!');

        if ($this->form_validation->run() === false) {
            $this->load->view('page/register', $this->data);
        } else {

        $regist = array(
          'name' => $this->input->post('std_name'),
          'email' => $this->input->post('std_email'),
          'password' => $this->input->post('std_password'),
          'phone' => $this->input->post('phone')
        );

        $array = array(
          '__initial_regist_data' => $regist
        );

        $this->session->set_userdata($array);
				redirect('auth/regist/confirm');
			}
		} else {
			$this->load->view('page/register', $this->data);
		}
  }

  public function regist_confirm()
  {
    $globalHeader = array(
		  "pass" => ['register confirm' => 'auth/regist/confirm'],
		  'title' => "Student Register Confirm",
		  'msg' => "",
	  );
	  if(empty($this->session->userdata('__initial_regist_data'))) {
      $this->session->set_flashdata('msg_error', 'Something wrong!');
      redirect('auth/regist');
    }
    $data['lists'] = array(
      'name' => $this->session->userdata('__initial_regist_data')['name'],
      'email' => $this->session->userdata('__initial_regist_data')['email'],
      'password' => $this->session->userdata('__initial_regist_data')['password'],
      'phone' => $this->session->userdata('__initial_regist_data')['phone']
    );
    $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, $data);
    $this->load->view('page/register_confirm', $this->data);
  }

  public function store_register()
  {
    $globalHeader = array(
		  "pass" => ['register confirm' => 'auth/regist/confirm'],
		  'title' => "Student Register Confirm",
		  'msg' => "",
	  );
    
    $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, []);

    if($_POST) {
			$this->form_validation->set_rules('name', 'name', 'trim|required|min_length[5]|xss_clean');
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[OSL_student.email]|xss_clean');
      $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|max_length[30]|xss_clean');
      $this->form_validation->set_rules('phone', 'phone number', 'trim|required|numeric|xss_clean');
      
			$this->form_validation->set_message('required', 'You must enter a %s!');
			$this->form_validation->set_message('is_unique', 'Your %s is already exits!');
			$this->form_validation->set_message('numeric', 'The %s always allow only numbers!');
			$this->form_validation->set_message('valid_email', 'The %s must be valid!');

			if ($this->form_validation->run() === false) {
        $this->session->set_flashdata('msg_error', 'Something wrong!');
				redirect('auth/regist/confirm');
			} else {

        $lastid = $this->Auth_Model->getLastID();   
        $lastid = (isset($lastid->id)?$lastid->id:0);
        $last_id = "sdid_".str_pad(($lastid+1), 5, '0', STR_PAD_LEFT);
        $password = $this->__passwordDataHashing($this->input->post('password'));

        $authData = array(
          'std_auth_key' => $this->__generate_auth_key($this->input->post('email')),
          'email' => $this->input->post('email'),
          'password' => $password,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        );
        $authData = $this->__Xss($authData);
        $std_id = $this->Auth_Model->studentInsert($authData);

				$userData = array(
          'std_id' => $std_id,
          'user_id' => $last_id,
					'name' => $this->input->post('name'),
          'phone' => $this->input->post('phone'),
          'request_date' => date('Y-m-d H:i:s'),
          'activate_date' => date('Y-m-d H:i:s'),
          'expired_date' => "0000-00-00 00:00:00",
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'status' => 1,
          'permission' => 0
        );
        $userData = $this->__Xss($userData);

        $insertChecker = $this->Auth_Model->studentDataInsert($userData);
        if($insertChecker) {
          if($this->session->has_userdata('__initial_regist_data')) {
            $enroll = array('__initial_regist_data');
            $this->session->unset_userdata($enroll);
          }
          redirect('auth/regist/complete');
        }        
			}
		} else {
      $this->session->set_flashdata('msg_error', 'Something wrong!');
      redirect('auth/regist/confirm');
		}
  }

  public function regist_complete()
  {
    $globalHeader = array(
		  "pass" => ['register complete' => 'auth/regist/complete'],
		  'title' => "Student Register Complete",
		  'msg' => "သင်ဖြည့်စွက်ထားသော အချက်အလက်များကိုအတည်ပြုပြီးပါက ကျောင်းမှဆက်သွယ်အကြောင်းကြားပေးပါမည်",
	  );
    $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, []);
    
    $this->load->view('page/register_complete', $this->data);
  }

/******* Site Configuration Reassign and Distibute *********/
	private function __initSessionDataAssign(){
		$this->usertoken = isset($_SESSION['__student_token_slug'])?$_SESSION['__student_token_slug']:"";
		$this->current_log_id = isset($_SESSION['__student_session_id'])?$_SESSION['__student_session_id']:"";    
    $this->enroll_course = isset($_SESSION['__enroll_course_package']['ini_course'])?$_SESSION['__enroll_course_package']['ini_course']:"";
    $this->enroll_batch = isset($_SESSION['__enroll_course_package']['rel_batch'])?$_SESSION['__enroll_course_package']['rel_batch']:"";
    $this->enroll_package = isset($_SESSION['__enroll_course_package'])?$_SESSION['__enroll_course_package']:"";
    $this->enroll_checker = isset($_SESSION['__enroll_course_checker'])?$_SESSION['__enroll_course_checker']:"";
	}
  
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
	
/*** Login Query Configuration ***/
  private function _security_student_login($name, $pass)
  {
    $this->db->where('email', $name);
    $hash = $this->db->get($this->private_db)->row('password');
    return $this->_verify_password_hash($pass, $hash);
  }

  private function _get_user_id($email)
  {
    $this->db->select('id');
    $this->db->from($this->private_db);
    $this->db->where('email', $email);
    return $this->db->get()->row('id');
  }

  private function _get_user_data($id)
  {
    $this->db->select('*');
    $this->db->from($this->db1);
    $this->db->where('std_id', $id);
    $query=$this->db->get();
    return $query->result();
  }

	private function _get_student_authkey($id)
	{
    $this->db->select('std_auth_key');
    $this->db->from($this->private_db);
    $this->db->where('id', $id);
    return $this->db->get()->row('std_auth_key');
	}

  private function _get_user_session()
	{
		$this->db->select('user_session');
		$this->db->from('site_config');
		return $this->db->get()->row('user_session');
	}

  private function _verify_password_hash($user_pass, $hash)
  {
    return password_verify($user_pass, $hash);
  }

/******* Security Token Distribution *********/
  private function __generate_auth_key($email)
  {
    $comp1 = []; $dd = "";
    $e = explode('@',$email);
    $e1 = $e[0];

    $e1 = "pkD".$this->encrypt->encode($e1)."@";

    $first_str = preg_replace("/[\/]/", "$1", $e1);

		$first_str = preg_replace("/[0-9+_=~]/", "$1", $first_str);

    for ($i = 0; $i < 2; $i++) {
			$comp1[] = mb_substr($first_str, (1*$i), 10);
		}
    foreach ($comp1 as $row) {
			$dd .= $row;
		}
    $dd = substr($dd, 0, 21);
    return $dd."@";
  }
	
	private function __generate_csrf_slug_key()
	{
		$comp1 = $comp2 = []; $dd = $dd1 = $dd3 = "";
		$tokenkey = $this->encryption->encrypt($this->__preTokenGenerateWithSlug());
		
		$first_str = preg_replace("/[\/]/", "$1", $tokenkey);
		$first_str = preg_replace("/[0-9+_~]/", "$1", $first_str);
		for ($i = 0; $i < 10; $i++) {
			$comp1[] = mb_substr($first_str, (2*$i), 1);
		}
		foreach ($comp1 as $row) {
			$dd .= $row."-";
		}
		
		$second_str = preg_replace("/[A-z+_~*^]/", "$1", $tokenkey);
		for ($i = 0; $i < 10; $i++) {
			$comp2[] = mb_substr($second_str, (2*$i), 6);
		}
		foreach ($comp2 as $row) {
			$dd1 .= $row."-";
		}
		
		$data = array_combine($comp1, $comp2);
		foreach ($data as $key=>$val) {
			$dd3 .= $val."-".$key;
		}
		return $dd3;
	}
	
	private function __preTokenGenerateWithSlug()
	{
		$agent = $this->agent->platform();
		$date = date('_Ymdhis_');
		$ipaddress =  $this->input->ip_address();
		
		$key1 = $this->_getDataEncrypt($agent, $date);
		$key2 = $this->_getDataEncrypt($ipaddress, $date);
		
		if (!empty($key1) && !empty($key2)){
			$csrf = $key1."$".$key2;
			$csrf = substr($csrf, 1, 30);
		}
		return $csrf;
	}

  private function _userRecordTrancase($id) 
  {
		$this->db->where('id', $id);
		$this->db->delete('std_config');
		return true;
	}

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

  private function __Xss($data){
		return $this->security->xss_clean($data);
	}

	private function __passwordDataHashing($data){
		return password_hash($data, PASSWORD_BCRYPT);
	}


}
