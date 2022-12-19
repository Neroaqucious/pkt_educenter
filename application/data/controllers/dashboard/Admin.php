<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	private $private_db = "dashboard/Admin_Model";
	protected $data;
	private $key, $url;
	private $current_id, $current_user, $current_role, $current_csrf_key, $current_permission, $current_session_count, $current_login_time, $current_log_id, $session_checker, $user_config;
	//Initial presite config
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
		$this->key = "pe_admin";
	  $this->url = "adm/portal/d-panel";
  }
	
	/**********************
	 * User Configuration *
	 *********************/
  public function profile()
  {
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Profile",
		  'msg' => "",
		  'uri' => array("dashboard",""),
		  'config' => $this->user_config
	  );
	  
	  $list = $this->Admin_Model->getUserDataList($this->current_id);
	  //*** Generate necessary key and value
	  $Q_list = _transfer_key_prepare(object_key_checker($list));
	  $this->data['result'] = object_transfer($list, $Q_list);
	  $this->data['record'] = $this->Admin_Model->getUserSessionRecordList($this->current_id);
	  
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
    $this->load->view('dashboard/auth/profile', $this->data);
  }

  public function edit_user()
  {
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Edit Profile",
		  'msg' => "",
		  'uri' => array("dashboard",""),
		  'config' => $this->user_config
	  );
	  
    $this->data['result'] = $this->Admin_Model->getUserDataList($this->current_id);
	  //*** Array Merge For Send Data
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
	  
    if($_POST) {
      $this->form_validation->set_rules('admin_name','name','trim|required|xss_clean');
      $this->form_validation->set_rules('admin_email','email','trim|required|xss_clean|valid_email');
      $this->form_validation->set_rules('admin_phone','phone','trim|xss_clean|required|numeric');
      $this->form_validation->set_rules('admin_address','address','trim|xss_clean');
      $this->form_validation->set_rules('admin_facebook','facebook','trim|xss_clean');
      $this->form_validation->set_rules('admin_twitter','twitter','trim|xss_clean');
	    $this->form_validation->set_rules('admin_instagram','instagram','trim|xss_clean');

      $this->form_validation->set_message('required', 'You must provide %s');

    if ($this->form_validation->run() === false) {
      $this->load->view('dashboard/auth/user_edit', $this->data);
    } else {
    	
      $profile = array(
        'name' => $this->input->post('admin_name'),
        'email' => $this->input->post('admin_email'),
        'phone' => $this->input->post('admin_phone'),
        'address' => $this->input->post('admin_address'),
	      'facebook' => $this->input->post('admin_facebook'),
	      'twitter' => $this->input->post('admin_twitter'),
	      'instagram' => $this->input->post('admin_instagram'),
      );

      $email_check = $this->Admin_Model->checkUserProfile($profile, $this->current_id);
        if($email_check) {
          $this->session->set_flashdata('msg_error', 'Your email already exits!');
          redirect("adm/portal/auth/useredit", $this->data);
        } else {
          $data['result'] = $this->Admin_Model->updateAdminProfile($profile, $this->current_id);
            $this->session->set_flashdata('msg_success', 'Your data has been update!');
            redirect("adm/portal/auth/profile");
        }
      }
    } else {
      $this->load->view('dashboard/auth/user_edit', $this->data);
    }
  }

  public function password()
  {
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Edit Password",
		  'msg' => "",
		  'uri' => array("dashboard",""),
		  'config' => $this->user_config
	  );
	
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);
	  
    if($_POST) {
			$this->form_validation->set_rules('curr_user_pass', 'current passowrd', 'trim|xss_clean|required|min_length[6]|max_length[30]');
      $this->form_validation->set_rules('new_user_pass', 'new password', 'trim|xss_clean|required|min_length[6]|max_length[30]');
      $this->form_validation->set_rules('user_conf_pass', 'confirm password', 'trim|xss_clean|required|min_length[6]|max_length[30]|matches[new_user_pass]');

			$this->form_validation->set_message('required', 'You must enter a %s!');
			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/auth/user_password', $this->data);
			} else {
				$current_user = $this->mainconfig->_data64Encode($this->current_user);
        $current_pass = $this->input->post('curr_user_pass');
        
        if($this->_security_admin_login($current_user, $current_pass)) {
          $new_pass = $this->__passwordDataHashing($this->input->post('new_user_pass'));

          $newpass = array(
            'password' => $new_pass,
            'updated_at' => date('Y-m-d H:i:s'),
          );

          $this->Admin_Model->updateAdminPassword($newpass, $this->current_id);
          $this->session->set_flashdata('msg_success', 'Your password changed successfully!');
          redirect("adm/portal/auth/profile");
          
        } else {
          $this->session->set_flashdata('msg_error', 'Please insert your login password correstly!');
          redirect("adm/portal/auth/password");
        }
      }
    } else {
      $this->load->view('dashboard/auth/user_password', $this->data);
    }
  }
  
  public function delete_record($id = null, $user = null){
	  $deleteid = $this->Admin_Model->adminRecordDelete($id, $user);
	  if($deleteid){
		  $this->session->set_flashdata('msg_success', 'Session record has been delete!');
		  redirect('adm/portal/auth/profile');
	  }
  }

	/**************************
	 * ALL User Configuration *
	 *************************/
  public function lists()
  {
	  /** User Permission Checker **/
  	$this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "User Lists",
		  'msg' => "",
		  'uri' => array("admin","admin_list"),
		  'config' => $this->user_config
	  );
	
	  $list = $this->Admin_Model->getAdminList();
	  //*** Generate necessary key and value
	  
	  $Q_list = _transfer_key_prepare(array_keys_checker($list));
	  $this->data['result'] = array_transfer($list, $Q_list);
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
    $this->load->view('dashboard/auth/lists', $this->data);
  }

  public function views($id)
  {
	  /** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "View Users",
		  'msg' => "",
		  'uri' => array("admin","admin_list"),
		  'config' => $this->user_config
	  );
	  
	  $list = $this->Admin_Model->getUserDataList($id);
	  //*** Current query value checker
	  $this->__resultEmptyChecker($id, $globalHeader,"adm/portal/auth/lists", $list);
	  //*** Generate necessary key and value
	  $Q_list = _transfer_key_prepare(object_key_checker($list));
	  $this->data['result'] = object_transfer($list, $Q_list);
	  $this->data['record'] = $this->Admin_Model->getUserSessionRecordList($id);

	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
	  
    $this->load->view('dashboard/auth/views', $this->data);
  }
  
  public function add()
  {
	  /** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Add Users",
		  'msg' => "",
		  'uri' => array("admin","admin_add"),
		  'config' => $this->user_config,
		  'rolelist' => $this->Admin_Model->roleLevel(),
	  );
	
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);
	  
    if($_POST) {
      $this->form_validation->set_rules('user_name','user name','trim|required|xss_clean|min_length[3]');
      $this->form_validation->set_rules('user_pass','password','trim|required|xss_clean|min_length[6]|max_length[30]');
      $this->form_validation->set_rules('user_conf_pass','confirm password','trim|required|matches[user_pass]|xss_clean|min_length[6]|max_length[30]');
      $this->form_validation->set_rules('role','role permission','trim|required|xss_clean');
      $this->form_validation->set_rules('status','status','trim|xss_clean');
      $this->form_validation->set_rules('admin_name','full name','trim|required|xss_clean');
      $this->form_validation->set_rules('admin_email','email','trim|required|xss_clean|valid_email|is_unique[OSL_adm_profile.email]');
      $this->form_validation->set_rules('admin_phone','phone','trim|xss_clean|required|numeric');
      $this->form_validation->set_rules('admin_address','address','trim|xss_clean');
      $this->form_validation->set_rules('admin_facebook','facebook','trim|xss_clean');
      $this->form_validation->set_rules('admin_twitter','twitter','trim|xss_clean');

      $this->form_validation->set_message('required', 'You must provide %s');

    if ($this->form_validation->run() === false) {
        $this->load->view('dashboard/auth/add', $this->data);
    } else {
      $password = $this->__passwordDataHashing($this->input->post('user_pass'));

      $authorize = array(
        'username' => $this->mainconfig->_data64Encode($this->input->post('user_name')),
        'password' => $password,
        'role' => $this->input->post('role'),
        'created_at' => date('Y-m-d H:i:s'),
	      'updated_at' => date('Y-m-d H:i:s'),
        'status' => $this->input->post('status')
      );

      $user_id = $this->Admin_Model->userInsert($authorize);

      if (!empty($user_id)){
        $profile = array(
          'adm_id' => $user_id,
          'name' => $this->input->post('admin_name'),
          'email' => $this->input->post('admin_email'),
          'phone' => $this->input->post('admin_phone'),
          'address' => $this->input->post('admin_address'),
	        'facebook' => $this->input->post('admin_facebook'),
	        'twitter' => $this->input->post('admin_twitter'),
	        'instagram' => $this->input->post('admin_instagram'),
        );
        
          $this->Admin_Model->userProfileInsert($profile);
          $this->session->set_flashdata('msg_success', 'Your data has been insert!');
          redirect("adm/portal/auth/lists");
        }
      }
    } else {
      $this->load->view('dashboard/auth/add', $this->data);
    }
  }

  public function edit($id)
  {
	  /** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Edit Users",
		  'msg' => "",
		  'uri' => array("admin","admin_list"),
		  'config' => $this->user_config,
		  'rolelist' => $this->Admin_Model->roleLevel(),
	  );
	  
	  $list = $this->Admin_Model->getAdminDataList($id);
	  //*** Current query value checker
	  $this->__resultEmptyChecker($id, $globalHeader,"adm/portal/auth/lists", $list);
	  //*** Generate necessary key and value
	  $Q_list = _transfer_key_prepare(object_key_checker($list));
	  
	  $this->data['result'] = object_transfer($list, $Q_list);
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
	  
    if($_POST) {
      $this->form_validation->set_rules('user_name','user name','trim|required|xss_clean|min_length[3]');
      $this->form_validation->set_rules('user_pass','user password','trim|xss_clean|min_length[6]|max_length[30]'); 
      $this->form_validation->set_rules('user_conf_pass','user confirm password','trim|matches[user_pass]|xss_clean|min_length[6]|max_length[30]'); 
      $this->form_validation->set_rules('role','role','trim|required|xss_clean');
      $this->form_validation->set_rules('status','status','trim|xss_clean');
      $this->form_validation->set_rules('admin_name','name','trim|required|xss_clean');
      $this->form_validation->set_rules('admin_email','email','trim|required|xss_clean|valid_email');
      $this->form_validation->set_rules('admin_phone','phone','trim|xss_clean|required|numeric');
      $this->form_validation->set_rules('admin_address','address','trim|xss_clean');
      $this->form_validation->set_rules('admin_facebook','facebook','trim|xss_clean');
      $this->form_validation->set_rules('admin_twitter','twitter','trim|xss_clean');
	    $this->form_validation->set_rules('admin_instagram','instagram','trim|xss_clean');

      $this->form_validation->set_message('required', 'You must provide %s');

    if ($this->form_validation->run() === false) {
        $this->load->view('dashboard/auth/edit', $this->data);
    } else {
    	
      $authorize = array(
        'username' => $this->mainconfig->_data64Encode($this->input->post('user_name')),
        'role' => $this->input->post('role'),
	      'updated_at' => date('Y-m-d H:i:s'),
        'status' => $this->input->post('status')
      );

      $profile = array(
        'name' => $this->input->post('admin_name'),
        'email' => $this->input->post('admin_email'),
        'phone' => $this->input->post('admin_phone'),
        'address' => $this->input->post('admin_address'),
	      'facebook' => $this->input->post('admin_facebook'),
	      'twitter' => $this->input->post('admin_twitter'),
	      'instagram' => $this->input->post('admin_instagram'),
      );
      
      if(!empty($this->input->post('user_pass'))) {
        $authorize['password'] = $this->__passwordDataHashing($this->input->post('user_pass'));
      }
      
      $check1 = $this->Admin_Model->checkUserProfile($profile, $id);
        if($check1) {
          $this->session->set_flashdata('msg_error', 'Your email already exits!');
          redirect("adm/portal/auth/edit/".$id);
        } else {

          $this->Admin_Model->updateAdminAuthorize($authorize, $id);
          $this->Admin_Model->updateAdminProfile($profile, $id);

          $this->session->set_flashdata('msg_success', 'Your data has been update!');
          redirect("adm/portal/auth/lists");
        }
      }
    } else {
      $this->load->view('dashboard/auth/edit', $this->data);
    }
  }

  public function withdraw($id)
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Delete Users",
			'msg' => "",
			'uri' => array("admin","admin_list"),
			'config' => $this->user_config,
		);

		$this->__resultEmptyChecker($id, $globalHeader, "adm/portal/auth/lists", $globalHeader);
		
		if($this->current_id == $id) {
			$this->session->set_flashdata('msg_error', 'Something wrong!');
			redirect('adm/portal/auth/lists');
		} else {
			$this->Admin_Model->adminDelete($id);
			$this->Admin_Model->adminProfileDelete($id);
			
			$this->session->set_flashdata('msg_success', 'Your data has been delete!');
			redirect('adm/portal/auth/lists');
		}
  }

/*** User Role Configuration ***/
  public function role()
  {
	  /** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Role list",
		  'msg' => "",
		  'uri' => array("role","role_list"),
		  'config' => $this->user_config,
	  );
	  
	  $list = $this->Admin_Model->getRoleDataList();
	  //*** Generate necessary key and value
	  $Q_list = _transfer_key_prepare(array_keys((array)$list[0]));
	  $this->data['result'] = array_transfer($list, $Q_list);
	
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
    $this->load->view('dashboard/role/role_list', $this->data);
  }

  public function role_add()
  {
	  /** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	  
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Add Role",
		  'msg' => "",
		  'uri' => array("role","role_add"),
		  'config' => $this->user_config,
	  );
	
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);
	  
    if($_POST) {
      $this->form_validation->set_rules('role_name','name','trim|required|is_unique[OSL_adm_role.name]|xss_clean');
      $this->form_validation->set_rules('session','session','trim|required|numeric|xss_clean');
      $this->form_validation->set_rules('permission[]','permission','trim|xss_clean|required|callback_option_check');

      $this->form_validation->set_message('required', 'You must provide %s');

    if ($this->form_validation->run() === false) {
        $this->load->view('dashboard/role/role_add', $this->data);
    } else {
        $perm = substr(implode(', ', $this->input->post('permission')), 0);
        $data = array(        
          "name" => $this->mainconfig->_strToLower($this->input->post('role_name')),
          "session" => $this->input->post('session')*60,
          "config" => $perm,
          "created_at" => date('Y-m-d H:i:s'),
	        "updated_at" => date('Y-m-d H:i:s'),
          "status" => $this->input->post('status')
        );
       
        $this->Admin_Model->insert_role($data);
				$this->session->set_flashdata('msg_success', 'Your data has been insert!');
				redirect('adm/portal/auth/role');
      }
    } else {
      $this->load->view('dashboard/role/role_add', $this->data);
    }
  }
  
  public function role_edit($id)
  {
	  /** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Edit Role",
		  'msg' => "",
		  'uri' => array("role","role_list"),
		  'config' => $this->user_config,
		  "id" => $id
	  );
	  
	  $list = $this->Admin_Model->getRoleData($id);
	  //*** Current query value checker
	  $this->__resultEmptyChecker($id, $globalHeader,"adm/portal/auth/role", $list);
	  //*** Generate necessary key and value
	  $Q_list = _transfer_key_prepare(object_key_checker($list));
	  $this->data['result'] = object_transfer($list, $Q_list);

	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
	
	  if($_POST) {
      $this->form_validation->set_rules('role_name','name','trim|required|xss_clean');
      $this->form_validation->set_rules('session','session','trim|required|numeric|integer|xss_clean');
      $this->form_validation->set_rules('permission[]','permission','trim|xss_clean|required|callback_option_check');

      $this->form_validation->set_message('required', 'You must provide %s');

    if ($this->form_validation->run() === false) {
        $this->load->view('dashboard/role/role_edit', $this->data);
    } else {
        $perm = substr(implode(', ', $this->input->post('permission')), 0);
        $data = array(
          "name" => $this->mainconfig->_strToLower($this->input->post('role_name')),
          "session" => $this->input->post('session')*60,
          "config" => $perm,
          "updated_at" => date('Y-m-d H:i:s'),
          "status" => $this->input->post('status')
        );
        
        $data = $this->security->xss_clean($data);
        $checkdata = $this->Admin_Model->adminRoleCheck($data);
        
        if ($checkdata){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portal/auth/role_edit/'.$id, $data);
        }
        
        $this->Admin_Model->update_role($data,$id);
        redirect('adm/portal/auth/role');
      }
    } else {
      $this->load->view('dashboard/role/role_edit', $this->data);
    }
  }

  public function role_delete($id)
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Delete Role",
			'msg' => "",
			'uri' => array("role","role_list"),
			'config' => $this->user_config,
		);
		$this->__resultEmptyChecker($id, $globalHeader, "adm/portal/auth/role", $globalHeader);
		
    $this->current_user = $this->Admin_Model->getAdminRoleList($id);
    $checker = $this->Admin_Model->getCurrentRole($this->current_user->name);
    
    if(count($checker) > 0) {
	    $this->session->set_flashdata('msg_error', "Request data can't delete!");
	    redirect('adm/portal/auth/role');
    } else {
	    $this->Admin_Model->roleDelete($id);
			$this->session->set_flashdata('msg_success', 'Your data has been delete!');
			redirect('adm/portal/auth/role');
    }
  }
  
	public function delete_all_record($id = null){
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		if($this->current_id == $id) {
			$this->session->set_flashdata('msg_error', "Request process can't complete!");
			redirect('adm/portal/auth/lists');
		} else {
			$this->Admin_Model->adminRecordDelete($id);
			$this->session->set_flashdata('msg_success', 'Force logout process complete!');
			redirect('adm/portal/auth/lists');
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
				$this->timezone = isset($config->timezone)?$config->timezone:"Asia/Rangoon";
			}
		return $config;
	}
	
/******* Security Configuration *********/
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
	
	private function __passwordDataHashing($data){
		return password_hash($data, PASSWORD_BCRYPT);
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
		if(empty($this->input->post('permission[]'))){
			$this->form_validation->set_message('option_check', 'You must provide %s');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
