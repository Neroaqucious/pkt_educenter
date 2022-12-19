<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Course extends CI_Controller
	{
		//db and configuration
		private $private_db = "dashboard/Course_Model";
		protected $data;
		private $key, $url;
		private $current_id, $current_user, $current_role, $current_csrf_key, $current_permission, $current_session_count, $current_login_time, $current_log_id, $session_checker, $user_config;
		private $site_name, $meta_tag, $favicon, $decimal_point, $date_format, $phone_format, $user_session, $timezone;
		
		//File upload data
		private $filename;
		private $upload_path = "./upload/assets/adm/cos/";
		private $file_path = "/../../../upload/assets/adm/cos/";
		private $max_size = "202800";  // upload max size 200 MB
		private $max_width = "1600";
		private $max_height = "1600";
		private $allow_type = 'jpg|jpeg|png|JPEG|gif|GIF';
		
		
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
				'title' => "Course List",
				'msg' => "",
				'uri' => array("course","course_lists"),
				'config' => $this->user_config
			);
			
			$list = $this->Course_Model->getCourseList();
			$Q_list = _transfer_key_prepare(array_keys_checker($list));
			$this->data['lists'] = array_transfer($list, $Q_list);
			foreach ($this->data['lists'] as $row) {
				$row->cos_thumb = $this->upload_path."_thumb/".$row->cos_thumb;
			}
			$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
			$this->load->view('dashboard/course/list', $this->data);
		}
		
		public function add()
		{
			/** User Permission Checker **/
			$this->__permissionChecker($this->key,$this->url);
			
			$globalHeader = array(
				"alert" => $this->mainconfig->_DefaultNotic(),
				'title' => "Add Course",
				'msg' => "",
				'uri' => array("course","course_add"),
				'config' => $this->user_config,
				'level' => $this->Course_Model->getLevel(),
				'topic' => $this->Course_Model->getTopic(),
			);
			
			$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);
			
			if($_POST) {
				$this->form_validation->set_rules('name', 'course title', 'trim|required|xss_clean');
				$this->form_validation->set_rules('desc', 'course description', 'trim|required|xss_clean');
				$this->form_validation->set_rules('level', 'level', 'trim|required|xss_clean');
				$this->form_validation->set_rules('subcategory', 'subcategory', 'trim|required|xss_clean');
				$this->form_validation->set_rules('default_key', 'class', 'trim|required|xss_clean');
				$this->form_validation->set_rules('userfile', 'lessons', 'trim');
				$this->form_validation->set_rules('description2', 'course description2', 'trim|xss_clean');
				$this->form_validation->set_rules('slug', 'slug name', 'trim|required|xss_clean|is_unique[OSL_course.slug_name]');
				
				$this->form_validation->set_message('required', 'You must enter %s');
				$this->form_validation->set_message('is_unique', 'Your %s is already exits!');
				$this->form_validation->set_message('numeric', 'The %s always allow only numbers!');
				$this->form_validation->set_error_delimiters("","");
				
				if ($this->form_validation->run() === false) {
					$this->load->view('dashboard/course/add', $this->data);
				} else {
					$data = array(
						'cos_title' => $this->input->post('name'),
						'cos_des1' => $this->input->post('desc'),
						'level_id' => $this->input->post('level'),
						'subcat_id' => $this->input->post('subcategory'),
						'created_at' => date("Y-m-d H:i:s"),
						'updated_at' => date("Y-m-d H:i:s"),
						'ref_key' => $this->input->post('default_key'),
						'slug_name' => $this->mainconfig->_slugKeyGen($this->input->post('slug')),
						'status' => $this->input->post('status')
					);
					$data = $this->__Xss($data);
					$checkdata = $this->Course_Model->checkCourse($data);
					
					if ($checkdata) {
						$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
						redirect('adm/portal/course/add');
					}
					
					if (!empty($_FILES['userfile']['name'])) {
						//image upload sever and add database
						$imgupload = $this->mainconfig->_fileUpload($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, TRUE, TRUE, TRUE);
						
						if (!empty($imgupload['msg_error'])) {
							$this->session->set_flashdata('msg_error', $imgupload['msg_error']);
							redirect('adm/portal/course/add');
						} else {
							$data['cos_image'] = $imgupload['file_name'];
							$data['cos_thumb'] = $imgupload['raw_name']."_thumb".$imgupload['file_ext']; //thumb file create
							$this->Course_Model->insertCourse($data);
							$this->session->set_flashdata('msg_success', 'Your data has been insert!');
							redirect('adm/portal/course');
						}
					} else {
						$this->session->set_flashdata('msg_error', 'Not allow empty data uploading! Please retrun.');
						redirect('adm/portal/course/add');
					}
				}
			} else {
				$this->load->view('dashboard/course/add', $this->data);
			}
		}
		
		public function edit($id)
		{
			/** User Permission Checker **/
			$this->__permissionChecker($this->key,$this->url);
			
			$globalHeader = array(
				"alert" => $this->mainconfig->_DefaultNotic(),
				'title' => "Edit Course",
				'msg' => "",
				'uri' => array("course","course_lists"),
				'config' => $this->user_config,
			);
			
			$list = $this->Course_Model->detailCourse($id);
			//*** Current query value checker
			$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/course", $list);
			//*** Generate necessary key and value
			$Q_list = _transfer_key_prepare(object_key_checker($list));
			$this->data['level'] = $this->Course_Model->getLevel();
			$this->data['topic'] = $this->Course_Model->getTopic();
			
			$this->data['result'] = object_transfer($list, $Q_list);
			$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

			$recent_cover = $this->data['result']->cos_image;
			$recent_thumb = $this->data['result']->cos_thumb;
			
			if ($_POST) {
				$this->form_validation->set_rules('name', 'course title', 'trim|required|xss_clean');
				$this->form_validation->set_rules('desc', 'course description', 'trim|required|xss_clean');
				$this->form_validation->set_rules('description2', 'course description2', 'trim|xss_clean');
				$this->form_validation->set_rules('slug', 'slug name', 'trim|required|xss_clean');
				$this->form_validation->set_rules('subcategory', 'subcategory', 'trim|required|xss_clean');
				$this->form_validation->set_rules('level', 'level', 'trim|required|xss_clean');
				$this->form_validation->set_rules('default_key', 'key', 'trim|required|xss_clean');
				$this->form_validation->set_rules('userfile', 'lessons', 'trim');
				
				$this->form_validation->set_message('required', 'You must enter %s!');
				$this->form_validation->set_message('is_unique', 'Your %s is already exits!');
				$this->form_validation->set_message('numeric', 'The %s always allow only numbers!');
				$this->form_validation->set_error_delimiters("","");
				
				if ($this->form_validation->run() === false) {
					$this->load->view('dashboard/course/edit', $this->data);
				} else {
					
					$data = array(
						'cos_title' => $this->input->post('name'),
						'cos_des1' => $this->input->post('desc'),
						'subcat_id' => $this->input->post('subcategory'),
						'level_id' => $this->input->post('level'),
						'updated_at' => date("Y-m-d H:i:s"),
						'ref_key' => $this->input->post('default_key'),
						'slug_name' => $this->mainconfig->_slugKeyGen($this->input->post('slug')),
						'status' => $this->input->post('status')
					);
					
					$data = $this->__Xss($data);
					$checkdata = $this->Course_Model->checkEditCourse($data, $id);
					$unique_slug = $this->Course_Model->checkSlug(strtolower($this->input->post('slug')), $id);
					
					if (!empty($_FILES['userfile']['name'])) {
						if(!empty($recent_cover)) {
							$preview_link = dirname(__FILE__)."".$this->file_path."".$recent_cover;
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
							redirect('adm/portal/course/edit/'.$id);
						} else {
							$data['cos_image'] = $imgupload['file_name'];
							$data['cos_thumb'] = $imgupload['raw_name']."_thumb".$imgupload['file_ext'];
						}
					} else {
						if ($checkdata) {
							$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
							redirect('adm/portal/course/edit/'.$id);
						} elseif ($unique_slug) {
							$this->session->set_flashdata('msg_error', 'Your slug name already exits! please fill other data!');
							redirect('adm/portal/course/edit/'.$id);
						}
					}
					
					$data['result'] = $this->Course_Model->courseUpdate($data, $id);
					$this->session->set_flashdata('msg_success', 'Your data has been update!');
					redirect("adm/portal/course");
				}
			} else {
				$this->load->view('dashboard/course/edit', $this->data);
			}
		}
		
		public function view($id)
		{
			/** User Permission Checker **/
			$this->__permissionChecker($this->key,$this->url);
			
			$globalHeader = array(
				"alert" => $this->mainconfig->_DefaultNotic(),
				'title' => "View Course Detail",
				'msg' => "",
				'uri' => array("course","course_lists"),
				'config' => $this->user_config
			);
			
			$list = $this->Course_Model->detailCourseList($id);
			//*** Current query value checker
			$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/course", $list);
			//*** Generate necessary key and value
			$Q_list = _transfer_key_prepare(object_key_checker($list));
			$this->data['result'] = object_transfer($list, $Q_list);
			
			//Batch List
			$batch = $this->Course_Model->getTotalBatchDetail($id);
			$Q_list = _transfer_key_prepare(array_keys_checker($batch));
			$this->data['batch'] = array_transfer($batch, $Q_list);
			
			//Student List
			$list2 = $this->Course_Model->getStudentLists($id);
			$Q_list = _transfer_key_prepare(array_keys_checker($list2));
			$this->data['list'] = array_transfer($list2, $Q_list);
			$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
			
			$this->load->view('dashboard/course/view', $this->data);
		}
		
		public function delete($id)
		{
			/** User Permission Checker **/
			$this->__permissionChecker($this->key,$this->url);
			
			$globalHeader = array(
				"alert" => $this->mainconfig->_DefaultNotic(),
				'title' => "Delete Course",
				'msg' => "",
				'uri' => array("course","course_lists"),
				'config' => $this->user_config,
			);
			
			$list = $this->Course_Model->detailCourse($id);
			//*** Current query value checker
			$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/course", $list);
			
			$batchchecker = $this->Course_Model->getTotalBatchDetail($list->id);
			if(count($batchchecker) > 0 ) {
				$this->session->set_flashdata('msg_error', "Bad Request, You can't delete this data!");
				redirect('adm/portal/course');
			} else {
				$recent_cover = $list->cos_image;
				$recent_thumb = $list->cos_thumb;
				
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
				
				$this->Course_Model->courseDelete($id);
				$this->session->set_flashdata('msg_success', 'Your data has been delete!');
				redirect('adm/portal/course');
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
		
	}