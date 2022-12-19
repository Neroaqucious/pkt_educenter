<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Welcome extends CI_Controller {
		
		//db and configuration
		protected $data;
		private $private_db = "dashboard/Initial_Model";
		private $default_timezone = "Asia/Rangoon";
		
		//File upload data
		private $filename = "favicon";
		private $upload_path = "./upload/";
		private $max_size = "10028";
		private $max_width = "100";
		private $max_height = "100";
		private $allow_type = 'jpg|jpeg|png|JPEG|ico';
		
		//Other user data protected
		public $email;
		protected $username, $password, $role, $site_name, $meta_tag, $decimal_point, $date_format, $phone_format, $user_session, $timezone, $name, $phone, $address, $facebook, $twitter, $instagram, $favicon;
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model($this->private_db);
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->library('encryption');
			$this->load->library('mainconfig');
			$this->mainconfig->_DefaultTimeZone($this->default_timezone);
			$this->__initSessionDataAssign();
		}
		
		public function welcome(){
			$globalHeader = array(
				"alert" => $this->mainconfig->_DefaultNotic(),
				'title' => "Initial Configuration",
				'msg' => "",
			);
			$this->__makeInitialConfigChecker();
			$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);
			
			if($_POST) {
				$this->form_validation->set_rules('full_name','full name','trim|required|min_length[5]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('email','email','trim|required|valid_email|xss_clean');
				$this->form_validation->set_rules('user_name','user name','trim|required|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('user_password','password','trim|required|min_length[6]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('conf_password','confirm password','trim|required|matches[user_password]|min_length[6]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('phone','phone','trim|xss_clean|required|numeric');
				$this->form_validation->set_rules('address','address','trim|xss_clean');
				$this->form_validation->set_rules('user_facebook','facebook','trim|xss_clean');
				$this->form_validation->set_rules('user_instagram','instagram','trim|xss_clean');
				$this->form_validation->set_rules('user_twitter','twitter','trim|xss_clean');
				$this->form_validation->set_rules('site_name','site name','trim|required|xss_clean');
				$this->form_validation->set_rules('meta_tag','meta tag','trim|xss_clean');
				$this->form_validation->set_rules('date_format','date format','trim|required|xss_clean');
				$this->form_validation->set_rules('decimal_point','decimal point','trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('mobile','mobile format','trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('user_session','user session','trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('timezone','timezone','trim|required|xss_clean');
				
				$this->form_validation->set_message('required', 'Please enter %s!');
				
				if ($this->form_validation->run() === false) {
					$this->load->view('dashboard/initial/welcome', $this->data);
				} else {
					
					$this->primary_data = array(
						'username' => $this->input->post('user_name'),
						'password' => $this->input->post('user_password'),
						'role' => "admin",
						'site_name' => $this->input->post('site_name'),
						'meta_tag' => $this->input->post('meta_tag'),
						'decimal_point' => $this->input->post('decimal_point'),
						'date_format' => $this->input->post('date_format'),
						'phone_format' => $this->input->post('mobile'),
						'user_session' => $this->input->post('user_session'),
						'timezone' => $this->input->post('timezone'),
						'name' => $this->input->post('full_name'),
						'email' => $this->input->post('email'),
						'phone' => $this->input->post('phone'),
						'address' => $this->input->post('address'),
						'facebook' => $this->input->post('user_facebook'),
						'twitter' => $this->input->post('user_twitter'),
						'instagram' => $this->input->post('user_instagram')
					);
					
					if (!empty($_FILES['userfile']['name'])) {
						//image upload sever and add database
						$imgupload = $this->mainconfig->_fileUpload($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type);
						
						if (!empty($imgupload['msg_error'])) {
							$this->session->set_flashdata('msg_error', $imgupload['msg_error']);
							redirect('initial');
						} else {
							$this->primary_data['cos_image'] = $imgupload['file_name'];
							
							$primarydata = array(
								"__rootuser_primary_data" => $this->primary_data,
								"__user_session_timeout" => date('Y-m-d H:i:s',time()+300)
							);
							$session_check = $this->__setUserSessionData($primarydata, 300);
							
							if($session_check) {
								redirect('initial/confirm');
							} else {
								$data['msg']="Something worry, Please try again!";
								$this->load->view('dashboard/initial/welcome', $this->data);
							}
						}
					} else {
						$this->session->set_flashdata('msg_error', 'Do not allow empty data! Please check.');
						redirect('initial');
					}
				}
			} else {
				$this->load->view('dashboard/initial/welcome', $this->data);
			}
		}
		
		public function welcome_confirm()
		{
			//*** Global Header
			$globalHeader = array(
				"alert" => $this->mainconfig->_DefaultNotic(),
				'title' => "Confirm Admin User",
				'msg' => "",
			);
			$this->__makeInitialConfigChecker();
			$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);
			
			if(empty($_SESSION['__rootuser_primary_data'])){
				$this->session->set_flashdata('msg_error', 'Session Expired!');
				redirect('initial');
			}
			
			if($_POST) {
				$authorize = array(
					'username' => $this->mainconfig->_data64Encode($this->username),
					'password' => $this->__passwordDataHashing($this->password),
					'role' => $this->role,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'status' => 1,
				);
				$authorize = $this->security->xss_clean($authorize);
				$siteconfig = array(
					'site_name' => $this->site_name,
					'meta_tag' => $this->meta_tag,
					'decimal_point' => $this->decimal_point,
					'date_format' => $this->date_format,
					'phone_format' => $this->phone_format,
					'user_session' => $this->user_session,
					'favicon' => $this->favicon,
					'timezone' => $this->timezone,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
				);
				$siteconfig = $this->security->xss_clean($siteconfig);
				
				$user_id = $this->Initial_Model->getUserInsert_($authorize);
				$config = $this->Initial_Model->getconfigInsert_($siteconfig);
				
				if (!empty($user_id) && $config){
					$profile = array(
						'adm_id' => $user_id,
						'name' => $this->name,
						'email' => $this->email,
						'phone' => $this->phone,
						'address' => $this->address,
						'facebook' => $this->facebook,
						'twitter' => $this->twitter,
						'instagram' => $this->instagram,
					);
					$profile = $this->Initial_Model->getprofileInsert_($profile);
					
					$precheck = array(
						'pre_check' => 1,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
					);
					$prechecker = $this->Initial_Model->getpreCheckerInsert_($precheck);
					
					if($profile && $prechecker) {
						redirect("initial/complete");
					}
					
				} else {
					$this->session->set_flashdata('msg_success', 'Something wrong!');
					redirect("initial");
				}
			} else {
				$this->load->view('dashboard/initial/confirm', $this->data);
			}
		}
		
		public function welcome_complete(){
			$this->global = array(
				"alert" => $this->mainconfig->_DefaultNotic(),
				'title' => "Complete Admin User Configuration",
				'msg' => "",
			);
			$this->data = $this->mainconfig->_ArrayDataMarge($this->global, []);
			
			if(empty($_SESSION['__rootuser_primary_data'])){
				$this->session->set_flashdata('msg_error', 'Session Expired!');
				redirect('initial');
			}
			
			$this->session->sess_destroy();
			$this->load->view('dashboard/initial/complete', $this->data);
		}
		
		public function reset_all_setting(){
			$return = $this->Initial_Model->trancateData();
			if($return) {
				$this->session->set_flashdata('msg_success', 'All admin user data already reset!');
				redirect('initial');
			}
		}
		
		/******* Session Configuration *********/
		private function __initSessionDataAssign(){
			$this->username = isset($_SESSION['__rootuser_primary_data']['username'])?$_SESSION['__rootuser_primary_data']['username']:"";
			$this->password = isset($_SESSION['__rootuser_primary_data']['password'])?$_SESSION['__rootuser_primary_data']['password']:"";
			$this->role = isset($_SESSION['__rootuser_primary_data']['role'])?$_SESSION['__rootuser_primary_data']['role']:"";
			$this->site_name = isset($_SESSION['__rootuser_primary_data']['site_name'])?$_SESSION['__rootuser_primary_data']['site_name']:"";
			$this->meta_tag = isset($_SESSION['__rootuser_primary_data']['meta_tag'])?$_SESSION['__rootuser_primary_data']['meta_tag']:"";
			$this->decimal_point = isset($_SESSION['__rootuser_primary_data']['decimal_point'])?$_SESSION['__rootuser_primary_data']['decimal_point']:"";
			$this->date_format = isset($_SESSION['__rootuser_primary_data']['date_format'])?$_SESSION['__rootuser_primary_data']['date_format']:"";
			$this->phone_format = isset($_SESSION['__rootuser_primary_data']['phone_format'])?$_SESSION['__rootuser_primary_data']['phone_format']:"";
			$this->user_session = isset($_SESSION['__rootuser_primary_data']['user_session'])?$_SESSION['__rootuser_primary_data']['user_session']:"";
			$this->timezone = isset($_SESSION['__rootuser_primary_data']['timezone'])?$_SESSION['__rootuser_primary_data']['timezone']:"";
			$this->name = isset($_SESSION['__rootuser_primary_data']['name'])?$_SESSION['__rootuser_primary_data']['name']:"";
			$this->email = isset($_SESSION['__rootuser_primary_data']['email'])?$_SESSION['__rootuser_primary_data']['email']:"";
			$this->phone = isset($_SESSION['__rootuser_primary_data']['phone'])?$_SESSION['__rootuser_primary_data']['phone']:"";
			$this->address = isset($_SESSION['__rootuser_primary_data']['address'])?$_SESSION['__rootuser_primary_data']['address']:"";
			$this->facebook = isset($_SESSION['__rootuser_primary_data']['facebook'])?$_SESSION['__rootuser_primary_data']['facebook']:"";
			$this->twitter = isset($_SESSION['__rootuser_primary_data']['twitter'])?$_SESSION['__rootuser_primary_data']['twitter']:"";
			$this->instagram = isset($_SESSION['__rootuser_primary_data']['instagram'])?$_SESSION['__rootuser_primary_data']['instagram']:"";
			$this->favicon = isset($_SESSION['__rootuser_primary_data']['cos_image'])?$_SESSION['__rootuser_primary_data']['cos_image']:"";
		}
		
		private function __makeInitialConfigChecker(){
			if($this->__initialConfigChecker() != 0) {
				redirect('adm/portal/auth/login');
			}
		}
		
		private function __initialConfigChecker(){
			return $this->db->count_all('precheck');
		}
		
		/******* Authrize Configuration *********/
		private function __passwordDataHashing($data){
			return password_hash($data, PASSWORD_BCRYPT);
		}
		
		public function __setUserSessionData($session, $set_time)
		{
			if($session != "" && $set_time != "") {
				$this->session->set_tempdata($session, Null, $set_time); //Set session time 4 hour
			} else {
				$this->session->set_tempdata($session, Null, 1800); //Set session time 30 minutes
			}
			return true;
		}
		
	}
