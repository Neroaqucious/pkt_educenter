<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends CI_Controller
{
  private $private_db = "dashboard/Student_Model";
	private $data, $key, $url;
  //Initial auth session
	protected $current_id, $current_user, $current_role, $current_csrf_key, $current_permission, $current_session_count, $current_login_time, $current_log_id, $session_checker, $user_config;
  //Initial presite config
	protected $site_name, $meta_tag, $favicon, $decimal_point, $date_format, $phone_format, $user_session, $timezone;

  //File upload data
  private $filename;
  private $upload_path = "./upload/assets/adm/usr/";
  private $file_path = "/../../../upload/assets/adm/usr/";
  private $max_size = "202800";  // upload max size 200 MB
  private $max_width = "1024";
  private $max_height = "1024";
  private $allow_type = 'jpg|jpeg|png|JPEG';

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model($this->private_db);
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->library('encryption');
    $this->load->library('user_agent');
    $this->load->library('upload');
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
		$this->key = "pe_student";
		$this->url = "adm/portal/d-panel";
		$this->__permissionChecker($this->key,$this->url);
  }
  
  public function index()
  {
    /** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Student Lists",
			'msg' => "",
			'uri' => array("student","std_lists"),
			'config' => $this->user_config
		);
		
		$list = $this->Student_Model->getStudentList();
		//*** Generate necessary key and value
		$Q_list = _transfer_key_prepare(array_keys_checker($list));
		$this->data['lists'] = array_transfer($list, $Q_list);
    $this->data['course'] = $this->Student_Model->getStudentCourseRequest();	
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

    // For data showing (course, )
    $this->load->view('dashboard/student/lists', $this->data);
  }

  public function add()
	{
    /** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);

		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Add Student",
			'msg' => "",
			'uri' => array("student","std_add"),
			'config' => $this->user_config,
		);
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);

		if($_POST) {
			$this->form_validation->set_rules('std_name', 'student name', 'trim|required|min_length[5]|is_unique[OSL_std_profile.name]|xss_clean');
			$this->form_validation->set_rules('std_email', 'email', 'trim|required|valid_email|is_unique[OSL_student.email]|xss_clean');
      $this->form_validation->set_rules('std_password', 'password', 'trim|required|min_length[6]|max_length[30]|xss_clean');
      $this->form_validation->set_rules('conf_password', 'confirm password', 'trim|required|min_length[6]|max_length[30]|xss_clean|matches[std_password]');
      $this->form_validation->set_rules('address', 'address', 'trim|xss_clean');      
      $this->form_validation->set_rules('std_birthday', 'birthday', 'trim|xss_clean');
      $this->form_validation->set_rules('std_edu', 'education', 'trim|xss_clean');
      $this->form_validation->set_rules('std_nrc', 'NRC no.', 'trim|xss_clean');
      $this->form_validation->set_rules('std_batch', 'batch', 'trim|xss_clean');
			$this->form_validation->set_rules('phone', 'phone number', 'trim|required|numeric|xss_clean');
      $this->form_validation->set_rules('std_facebook', 'facebook account', 'trim|xss_clean');
      $this->form_validation->set_rules('userfile', 'Student photo', 'trim|xss_clean');

			$this->form_validation->set_message('required', 'You must enter %s!');
			$this->form_validation->set_message('is_unique', 'Your %s is already exits!');
			$this->form_validation->set_message('numeric', 'The %s always allow only numbers!');
			$this->form_validation->set_message('valid_email', 'The %s must be valid!');

			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/student/add', $this->data);
			} else {
        $lastid = $this->Student_Model->getLastID();   
        $lastid = (isset($lastid->id)?$lastid->id:0);
        $lastid = serial_id_generate("sdid_", $lastid, 5);
				$password = $this->__passwordDataHashing($this->input->post('std_password'));

				if($this->input->post('std_status') == 1) {
					$activate_date = date('Y-m-d H:i:s');
				}else{
					$activate_date = "0000-00-00 00:00:00";
				}

        $authData = array(
          'std_auth_key' => $this->__generate_auth_key($this->input->post('std_email')),
          'email' => $this->input->post('std_email'),
          'password' => $password,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        );
        $authData = $this->__Xss($authData);
        $std_id = $this->Student_Model->studentInsert($authData);

				$data = array(
          'std_id' => $std_id,
          'user_id' => $lastid,
					'name' => $this->input->post('std_name'),
          'phone' => $this->input->post('phone'),
          'address' => $this->input->post('address'),
          'birthday' => $this->input->post('std_birthday'),
          'nrc' => $this->input->post('std_nrc'),
          'education' => $this->input->post('std_edu'),
          'social' => $this->input->post('std_facebook'),
          'request_date' => date('Y-m-d H:i:s'),
          'activate_date' => $activate_date,
          'expired_date' => "0000-00-00 00:00:00",
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'status' => $this->input->post('std_status'),
          'permission' => $this->input->post('std_permission')
        );
        $data = $this->__Xss($data);

        if (!empty($_FILES['userfile']['name'])) {
          //image upload sever and add database
          $imgupload = $this->mainconfig->_fileUpload($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, TRUE, TRUE, FALSE);

          if (!empty($imgupload['msg_error'])) {
            $this->session->set_flashdata('msg_error', $imgupload['msg_error']);
            redirect('adm/portal/student/add');
          } else {
            $data['image_file'] = $imgupload['file_name'];
          }
        }

        // Auto Mail Sending
        // if($this->input->post('std_email') != "") {
        //   $this->sendAutoMail(1, $this->input->post('std_email'), 'regConf');
        // }

        $this->Student_Model->studentAuthInsert($data);
        $this->session->set_flashdata('msg_success', 'Your data has been insert!');
        redirect('adm/portal/student');
			}
		} else {
			$this->load->view('dashboard/student/add', $this->data);
		}
  }

  public function edit($id)
	{
    /** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Edit Student",
			'msg' => "",
			'uri' => array("student","std_lists"),
			'config' => $this->user_config,
		);
		
		$list = $this->Student_Model->studentDetail($id);
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/student", $list);
		//*** Generate necessary key and value
		$Q_list = _transfer_key_prepare(object_key_checker($list));
		
		$this->data['result'] = object_transfer($list, $Q_list);
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
    $recent_photo = $this->data['result']->image_file;
		if($_POST) {
      $this->form_validation->set_rules('std_name', 'student name', 'trim|required|min_length[5]|xss_clean');
			$this->form_validation->set_rules('std_email', 'email', 'trim|required|valid_email|xss_clean');
      $this->form_validation->set_rules('std_password', 'password', 'trim|min_length[6]|max_length[30]|xss_clean');
      $this->form_validation->set_rules('conf_password', 'confirm password', 'trim|min_length[6]|max_length[30]|xss_clean|matches[std_password]');
      $this->form_validation->set_rules('address', 'address', 'trim|xss_clean');      
      $this->form_validation->set_rules('std_birthday', 'birthday', 'trim|xss_clean');
      $this->form_validation->set_rules('std_edu', 'education', 'trim|xss_clean');
      $this->form_validation->set_rules('std_nrc', 'NRC no.', 'trim|xss_clean');
      $this->form_validation->set_rules('std_batch', 'batch', 'trim|xss_clean');
			$this->form_validation->set_rules('phone', 'phone number', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('std_facebook', 'facebook account', 'trim|xss_clean');
      $this->form_validation->set_rules('userfile', 'Student photo', 'trim|xss_clean');

			$this->form_validation->set_message('required', 'You must enter a %s!');
			$this->form_validation->set_message('is_unique', 'Your %s is already exits!');
			$this->form_validation->set_message('numeric', 'The %s always allow only numbers!');
			$this->form_validation->set_message('valid_email', 'The %s must be valid!');

			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/student/edit', $this->data);
			} else {
        $usrData = array(
          'email' => $this->input->post('std_email'),
          'updated_at' => date('Y-m-d H:i:s'),
        );
        if(!empty($this->input->post('std_password'))) {
          $usrData['password'] = $this->__passwordDataHashing($this->input->post('std_password'));
        }
        $usrData = $this->__Xss($usrData);

        $data = array(
          'name' => $this->input->post('std_name'),  
          'phone' => $this->input->post('phone'),
          'address' => $this->input->post('address'),
          'birthday' => $this->input->post('std_birthday'),
          'nrc' => $this->input->post('std_nrc'),
          'education' => $this->input->post('std_edu'),
          'social' => $this->input->post('std_facebook'),
          'updated_at' => date('Y-m-d H:i:s'),
          'status' => $this->input->post('std_status'),
          'permission' => $this->input->post('std_permission'),
        );
        $data = $this->__Xss($data);

        //Check validation
        $checkdata = $this->Student_Model->studentCheck($data, $id);
        $checkemail = $this->Student_Model->studentEmailCheck($this->input->post('std_email'),$id);
     
        if($this->input->post('std_status') == 1) {
          $data['activate_date'] = date('Y-m-d H:i:s');
        }else{
          $data['activate_date'] = "0000-00-00 00:00:00";
        }
  
        if (!$checkemail) {
          if (!empty($_FILES['userfile']['name'])) {
            if(!empty($recent_photo)) {
              $preview_link = dirname(__FILE__)."".$this->file_path."".$recent_photo;
              if(file_exists($preview_link)){
                unlink($preview_link);
              }
            }
            //image upload sever and add database
            $imgupload = $this->mainconfig->_fileUpload($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, TRUE, TRUE, FALSE);

            if(!empty($imgupload['msg_error'])) {
              $this->session->set_flashdata('msg_error', $imgupload['msg_error']);
              redirect('adm/portal/student/edit/'.$id, $data);
            } else {
              $data['image_file'] = $imgupload['file_name'];
            }
          } else {
            if ($checkdata) {
              $this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
              redirect('adm/portal/student/edit/'.$id, $data);
            }
          }
        } else {
          $this->session->set_flashdata('msg_error', 'Your email already exits!');
          redirect('adm/portal/student/edit/'.$id, $data);
        } 
          
        if(empty($checkdata) || empty($checkemail)) {
          $this->Student_Model->studentAuthUpdate($usrData, $id);
          $this->Student_Model->studentUpdate($data, $id);
          $this->session->set_flashdata('msg_success', 'Your data has been update!');
          redirect("adm/portal/student");
        }

        // Auto Mail Sending
        // if($this->input->post('std_email') != ""  && $this->input->post('std_status') == 1) {
        //     $this->sendAutoMail(1, $this->input->post('std_email'), 'memAct');
        // }
			}
		} else {
			$this->load->view('dashboard/student/edit', $this->data);
		}
	}

  public function view($id)
	{
    /** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "View Student",
		  'msg' => "",
		  'uri' => array("student","std_lists"),
		  'config' => $this->user_config
	  );
	
	  $list = $this->Student_Model->studentViewDetail($id);
	  //*** Current query value checker
	  $this->__resultEmptyChecker($id, $globalHeader,"adm/portal/student", $list);
	  //*** Generate necessary key and value
	  $Q_list = _transfer_key_prepare(object_key_checker($list));
	  $this->data['result'] = object_transfer($list, $Q_list);

    $course = $this->Student_Model->studentViewCourse($id);
		$Q_list = _transfer_key_prepare(array_keys_checker($course));
		$this->data['course'] = array_transfer($course, $Q_list);
    $this->data['record'] = $this->Student_Model->studentViewRecord($id);
    $this->data['noted'] = $this->Student_Model->studentViewNotes($id);
    $this->data['batch'] = $this->Student_Model->getBatch();
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

    if($_POST) {
      $this->form_validation->set_rules('std_id', 'std_id', 'trim|required|xss_clean');
      $this->form_validation->set_rules('batch_id', 'batch_id', 'trim|required|xss_clean');
      $this->form_validation->set_rules('pay_type', 'payment type', 'trim|required|xss_clean');
      $this->form_validation->set_rules('pay_info', 'payment info', 'trim|required|xss_clean');
      $this->form_validation->set_rules('note', 'note', 'trim|xss_clean');
			if ($this->form_validation->run() === false) {
        $data['msg'] = "Something wrong!";
				$this->load->view('dashboard/student/views', $this->data);
			} else {
        $lastid = $this->Student_Model->getCourseID();   
        $lastid = (isset($lastid)?$lastid:1);
        $invoice_number = serial_id_generate("Inv-", $lastid-1, 6);
        $courseinfo = $this->Student_Model->getBatchDetail($this->input->post('batch_id'));

        $data = array(
					'std_id' => $this->input->post('std_id'),
          'bat_id' => $this->input->post('batch_id'),
          'cos_id' => $courseinfo->course_id,
          'request_date' => date('Y-m-d H:i:s'),
          'expired_date' => "0000-00-00 00:00:00",
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
					'status' => $this->input->post('status')
				);

        if($this->input->post('status') == 1) {
          $data['activate_date'] = date('Y-m-d H:i:s');
        }else{
          $data['activate_date'] = "0000-00-00 00:00:00";
        }
      
        $data = $this->security->xss_clean($data);        
				$checkdata = $this->Student_Model->batchCheck($data);

				if ($checkdata){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portal/student/view/'.$id);
        }
				$cos_id = $this->Student_Model->insertBatch($data);

        $invoice = array(
          'std_id' => $this->input->post('std_id'),
          'std_cos_id' => $cos_id,
          'invoice_number' => $invoice_number,
          'pay_type' => $this->input->post('pay_type'),
          'discount' => 0,
          'txt' => 0,
          'charge' => 0,
          'sub_price' => $courseinfo->fees,
          'total_price' => $courseinfo->fees,
          'pay_info' => $this->input->post('pay_info'),
          'description' => $this->input->post('note'),
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->Student_Model->insertInvoice($invoice);

				$this->session->set_flashdata('msg_success', 'Your data has been insert!');
				redirect('adm/portal/student/view/'.$id);
			}
		} else {
      // print_r($this->data['noted']);
			$this->load->view('dashboard/student/views', $this->data);
		}
  }
  
  public function delete($id)
  {
    /** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
	
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Delete Student",
			'msg' => "",
			'uri' => array("student",""),
			'config' => $this->user_config,
		);

    $list = $this->Student_Model->studentDetail($id);
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/student", $list);
    $recent_cover = $list->image_file;

    if(!empty($recent_cover)) {
      $preview_link = dirname(__FILE__)."".$this->file_path."".$recent_cover;
      if(file_exists($preview_link)){
        unlink($preview_link);
      }
    }

		$this->Student_Model->Delete($id);
    $this->Student_Model->stdAuthDelete($id);
    $this->Student_Model->stdConfigDelete($id);
    $this->Student_Model->stdCourseDelete($id);
    $this->Student_Model->stdInvoiceDelete($id);
    $this->Student_Model->stdNoteDelete($id);
    $this->Student_Model->stdPaymentDelete($id);

		$this->session->set_flashdata('msg_success', 'Your data has been delete!');
    redirect('adm/portal/student');
  }

  public function activated($id)
  {
    $globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Activate Student",
			'msg' => "",
			'uri' => array("student","std_lists"),
			'config' => $this->user_config,
		);
		$this->__resultEmptyChecker($id, $globalHeader, "adm/portal/student", $globalHeader);
    $data = array(
      'activate_date' => date('Y-m-d H:i:s'),
      "status" => 1
    );

    $data['result'] = $this->Student_Model->studentUpdate($data, $id);
    $this->session->set_flashdata('msg_success', 'Your data has been activated!');
    redirect("adm/portal/student", $data);
  }

  public function deactivated($id)
	{
    $globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Deactivate Student",
			'msg' => "",
			'uri' => array("student","std_lists"),
			'config' => $this->user_config,
		);
		$this->__resultEmptyChecker($id, $globalHeader, "adm/portal/student", $globalHeader);
		$data = array(
			'activate_date' => date('0000-00-00 00:00:00'),
			"status" => 0
		);

		$data['result'] = $this->Student_Model->studentUpdate($data, $id);
		$this->session->set_flashdata('msg_success', 'Your data has been deactivated!');
		redirect("adm/portal/student", $data);
	}
  
  public function permission_activated($id)
  {
    $globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Activate Course",
			'msg' => "",
			'uri' => array("student","std_lists"),
			'config' => $this->user_config,
		);
		$this->__resultEmptyChecker($id, $globalHeader, "adm/portal/student", $globalHeader);
    $data = array(
      'updated_at' => date('Y-m-d H:i:s'),
      "permission" => 1
    );

    $data['result'] = $this->Student_Model->studentUpdate($data, $id);
    $this->session->set_flashdata('msg_success', 'Your data has been activated!');
    redirect("adm/portal/student", $data);
  }

  public function permission_deactivated($id)
  {
    $globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Deactivate Course",
			'msg' => "",
			'uri' => array("student","std_lists"),
			'config' => $this->user_config,
		);
		$this->__resultEmptyChecker($id, $globalHeader, "adm/portal/student", $globalHeader);
    $data = array(
      'updated_at' => date('Y-m-d H:i:s'),
      "permission" => 0
    );

    $data['result'] = $this->Student_Model->studentUpdate($data, $id);
    $this->session->set_flashdata('msg_success', 'Your data has been deactivated!');
    redirect("adm/portal/student", $data);
  }

  public function invoice_view($id)
  {
    /** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "View Student",
		  'msg' => "",
		  'uri' => array("student","std_lists"),
		  'config' => $this->user_config
	  );
	
	  $list = $this->Student_Model->studentCourseDetail($id);
	  //*** Current query value checker
	  $this->__resultEmptyChecker($id, $globalHeader,"adm/portal/student", $list);
	  //*** Generate necessary key and value
	  $Q_list = _transfer_key_prepare(object_key_checker($list));
	  $this->data['result'] = object_transfer($list, $Q_list);

    $invoice = $this->Student_Model->studentInvoiceDetail($id);
		$Q_list = _transfer_key_prepare(object_key_checker($invoice));
		$this->data['invoice'] = object_transfer($invoice, $Q_list);
    
    $payment = $this->Student_Model->studentPaymentLists($id);
		$Q_list = _transfer_key_prepare(array_keys_checker($payment));
    
		$this->data['payment'] = array_transfer($payment, $Q_list);
    $this->data['type'] = $this->Student_Model->getStudentPaymentMethod();
    
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
  
    $this->load->view('dashboard/student/course_views', $this->data);
  }

  public function purchase_add($id)
  {
    /** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Add Purchase Course",
		  'msg' => "",
		  'uri' => array("student","std_lists"),
		  'config' => $this->user_config
	  );
    $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);

    if($_POST) {
      $this->form_validation->set_rules('ref_number', 'reference number', 'trim|required|xss_clean');
      $this->form_validation->set_rules('pay_from', 'receive from', 'trim|required|xss_clean');
      $this->form_validation->set_rules('cash', 'cash', 'trim|required|xss_clean');
      $this->form_validation->set_rules('desc', 'description', 'trim|required|xss_clean');

			if ($this->form_validation->run() === false) {
        $this->session->set_flashdata('msg_error', 'Empty Data! please fill data!');
        redirect('adm/portal/student/invoice/view/'.$id);
			} else {
        $lastid = $this->Student_Model->getStudentPaymentID();   
        $lastid = (isset($lastid)?$lastid:1);
        $pay_number = serial_id_generate("Pay-", $lastid-1, 6);
        $c_total = $this->Student_Model->CourseTotalPrice($id);
        $s_cash = $this->Student_Model->studentPurchaseTotal($id);

       $this->__CheckStudentPurchaseChecker($c_total->total_price, $s_cash[0]->total_cash, $this->input->post('cash'), 'adm/portal/student/course/view/'.$id);

        $data = array(
          'std_id' => $c_total->std_id,
          'std_inv_id' => $this->input->post('id'),
          'payment_id' => $pay_number,
					'ref_number' => $this->input->post('ref_number'),
          'cash_type' => $this->input->post('pay_from'),
          'total_cash' => $this->input->post('cash'),
          'description' => $this->input->post('desc'),
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
				);
        $data = $this->security->xss_clean($data);        
				$checkdata = $this->Student_Model->studentPaymentCheck($data);

				if ($checkdata){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portal/student/invoice/view/'.$id);
        }

				$this->Student_Model->insertStdPayment($data);
				$this->session->set_flashdata('msg_success', 'Your data has been insert!');
				redirect('adm/portal/student/invoice/view/'.$id);
			}
		} else {
			$this->session->set_flashdata('msg_error', 'Not allow! please try again!');
      redirect('adm/portal/student/invoice/view/'.$id);
		}
  }

  public function course_active($id)
  {
    //global header
		$data['title'] = "Activate Course";
    $data['msg'] = "";
    
    //Define Aside bar value
    $data['uri'] = array("student",""); 

    if(empty($id) || !is_numeric($id)){
      $this->session->set_flashdata('msg_error', "Bad Request, Not allowed permission!");
      redirect('adm/student/lists', $data);
    }

    $data = array(
      'activate_date' => date('Y-m-d H:i:s'),
      "status" => 1
    );

    $student_course = $this->Student_Model->studentCourseDetail($id);
    $target = $this->Student_Model->studentCourseTargetDate($student_course->bat_id);
    
    $data['result'] = $this->Student_Model->studentEnrollUpdate($data, $id);
    $std_id = $this->Student_Model->getStudentID($id);

    if($target->liveclass == "on") {
      $initial = $target->start_date;
      $monthdue = $target->month_duration;
      $daydue = $target->day_duration;
      $target_date = explode(", ", $target->days);
      $description = $target->cos_title." (".$target->start_time."~".$target->end_time.") ";
      $json = $this->__attendDateGenerate($target_date, $initial, $monthdue, $daydue);
      $data = array(
        'std_cos_id' => $id,
        'std_id' => $student_course->std_id,
        'class_date' => $json,
        'description' => $description,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      );
      $this->Student_Model->insertLocalClass($data);
    }
    $this->session->set_flashdata('msg_success', 'Your data has been activated!');
    redirect("adm/portal/student/view/".$std_id->std_id, $data);
  }

  public function course_deactive($id)
  {
    //global header
		$data['title'] = "Deactivate Course";
    $data['msg'] = "";
    
    //Define Aside bar value
    $data['uri'] = array("student","");    

    if(empty($id) || !is_numeric($id)){
      $this->session->set_flashdata('msg_error', "Bad Request, Not allowed permission!");
      redirect('adm/student/lists', $data);
    }

    $data = array(
      'activate_date' => "0000-00-00 00:00:00",
      "status" => 0
    );

    $std_id = $this->Student_Model->getStudentID($id);

    if(!empty($std_id->std_id)) {
      $this->Student_Model->studentCalenderDelete($std_id->id, $std_id->std_id);
    }
    $data['result'] = $this->Student_Model->studentEnrollUpdate($data, $id);
    $this->session->set_flashdata('msg_success', 'Your data has been deactivated!');
    redirect("adm/portal/student/view/".$std_id->std_id, $data);
  }

  public function course_delete($id,$stdid)
  {
    /** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Delete Invoice Record",
			'msg' => "",
			'uri' => array("student",""),
			'config' => $this->user_config,
		);

		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/student", $globalHeader);
    $parentChecker = $this->Student_Model->checkParentCourseInvoice($id);
    $Checker = $this->Student_Model->checkParentCoursePayment($parentChecker[0]->id);

    if(count($Checker) > 0 ) {
      $this->session->set_flashdata('msg_error', "Request data can't delete! Purchase has value");
      redirect('adm/portal/student/view/'.$stdid);
    } else {
      $this->Student_Model->studentCourseDelete($id);
      $this->Student_Model->studentCourseEnrollDelete($id);
      $this->session->set_flashdata('msg_success', 'Your data has been delete!');
      redirect("adm/portal/student/view/".$stdid);
    }
  }

  public function purchase_delete($id,$invid)
  {
    /** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
			
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Delete Purchase Record",
			'msg' => "",
			'uri' => array("student",""),
			'config' => $this->user_config,
		);

		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/student", $globalHeader);
		$this->Student_Model->studentEnrollDelete($id);
		$this->session->set_flashdata('msg_success', 'Your data has been delete!');
    redirect("adm/portal/student/invoice/view/".$invid);
  }
  
//Auto Mail System
  public function sendAutoMail($admin, $email, $key) 
  {
    $adminemail = $this->Student_Model->selectAdminEmail($admin);
    $subject = $this->Student_Model->selectEmailContent($key);
    $message = '
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PKT Online School</title>
    </head><body>';

    $message .= $subject->message;
    $message .= '</body></html>';
    $name = " PKT Online School ".$adminemail->name;
    $config['protocol'] = 'sendmail';
    $config['mailpath'] = '/usr/sbin/sendmail';
    $config['mailtype'] = 'html';
    $config['charset'] = 'iso-8859-1';
    $config['wordwrap'] = TRUE;
    $config['validate'] = TRUE;
    $config['crlf'] = "\r\n";
    $config['newline'] = "\r\n";

    $this->email->initialize($config);
    $this->email->from($adminemail->email, $name);
    $this->email->to($email);
    $this->email->cc($adminemail->cc);
    $this->email->subject($subject->subject);
    $this->email->message($message);
    $this->email->send();
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
	private function __Xss($data){
		return $this->security->xss_clean($data);
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
	
	private function __pretokenCheck()
  {
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
	
	private function __tokenChecker()
  {
		if(empty($this->__pretokenCheck())) {
			$queryChecker = $this->_user_query_Remove($this->current_log_id);
			if($queryChecker) {
				redirect('adm/portal/auth/logout');
			}
		}
	}

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
	
	/******* Other necessary Configuration *********/
	public function __resultEmptyChecker($id, $return, $url, $data = Null)
  {
		if(empty($id) || !is_numeric($id) || empty($data)){
			$this->session->set_flashdata('msg_error', "Bad Request, Not allowed permission!");
			redirect($url, $return);
		}
	}

  public function __CheckStudentPurchaseChecker($ctotal, $scash, $input, $url)
  {
    if($ctotal < $scash+$input) {
      $this->session->set_flashdata('msg_error', 'Please check your purchase amount!');
      redirect($url);
    } else {
      return true;
    }
  }

  public function __attendDateGenerate(array $data, $initial, $month, $day)
  {
    // Add days to date and display it
    $add_month = date('Y-m-d', strtotime($initial. ' + '.$month.' months'));
    $final = date('Y-m-d', strtotime($add_month. ' + '.$day.' days'));
    $target_date = $this->mainconfig->targetDateGenerate($data, $initial, $final);
    return json_encode($target_date);
  }

}