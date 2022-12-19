<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Enroll extends CI_Controller {
  private $private_db = "Enroll_Model";
  private $data;
  //initial current Login user information
  private $current_id, $current_user, $student_id, $user_email,  $current_csrf_key, $current_log_id, $current_session_count, $current_login_time, $session_checker;
  //initial current enroll course information
  private $enroll_course, $enroll_batch, $enroll_package, $enroll_checker;
  //Initial presite config
	private $site_name, $meta_tag, $favicon, $decimal_point, $date_format, $phone_format, $user_session, $timezone;

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model($this->private_db);
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->library('cart');
    $this->load->library('user_agent');
    $this->load->library('encryption');
    $this->load->library('userconfig');   
    $this->load->helper('custom');   
    $this->userconfig->_DefaultTimeZone($this->timezone);

		/** Session Assign **/
		$this->__preSessionDataSet();
    $this->__preSiteConfigDataSet();
    /** Cart Session Checking and destory */
    $this->__preCartAndEnrollChecker();
  }
  
  public function regist()
  {    
    if($_POST) {
      $this->form_validation->set_rules('course_id', 'course id!','trim|required|xss_clean');
      $this->form_validation->set_rules('batch_id', 'batch id!', 'trim|required|xss_clean');
      $this->form_validation->set_rules('batch_code', 'batch code!', 'trim|required|xss_clean');
      
      if ($this->form_validation->run() === false) {
        redirect('course');
      } else {
        $result = $this->Enroll_Model->getBatchDetail($this->input->post('batch_id'));
        $insert = $this->__singleCartInsert($result->batch_id, $result->cos_title, 1, $result->fees, $result->ref_key, $result->cos_image);
        if($insert) {
          $enroll = array(
            'ini_course' => $this->input->post('course_id'),
            'rel_batch' => $this->input->post('batch_id'),
            'batch_id' => $this->input->post('batch_code'),
            'ini_enroll_session' => date('Y-m-d H:i:s'),
          );
          $enroll_course = array(
            '__enroll_course_package' => $enroll,
            '__enroll_course_checker' => 0
          );
          $this->session->set_userdata($enroll_course);
          redirect('enroll/course');
        }
      }
    } else {
      redirect('course');
    }
  }

  public function course()
  {
    /** User token Check */
    $this->__tokenChecker();

    $globalHeader = array(
		  'title' => "Enroll Course",
      'pass' => ['dashboard' => 'student/dashboard','applied course' => 'student/apply'],
		  'uri' => array("enroll"),
      'msg' => ''
	  );

    $preview_check_enroll = $this->Enroll_Model->getStdCourse($this->current_id, $this->enroll_course, $this->enroll_batch);

    //After enroll course done!
    if($preview_check_enroll != "") {
      $this->__ClosedEnrollSessionSet();
    	if($preview_check_enroll->status == 0) {        
		    redirect('student/course/request/'.$preview_check_enroll->id.'/'.$preview_check_enroll->ref_key.'/'.$preview_check_enroll->slug_name);
	    } else {
		    redirect('student/course/'.$preview_check_enroll->id.'/'.$preview_check_enroll->ref_key.'/'.$preview_check_enroll->slug_name);
	    }
    }

    $this->data['course'] = $this->Enroll_Model->getCourseDetail($this->enroll_course);
    if(!empty($this->data['course']->ref_key)) {
      if($this->data['course']->ref_key == "online") {
        $this->data['lesson'] = $this->Enroll_Model->getLessonsDetail($this->enroll_course);
      }
    }
    $this->data['batch'] = $this->Enroll_Model->getBatchDetail($this->enroll_batch);
    $this->data['batch']->livecheck = $this->userconfig->__attendDateGenerate($this->data['course']->ref_key, $this->data['batch']->liveclass, $this->data['batch']->start_date, $this->data['batch']->month_duration, $this->data['batch']->day_duration, 20);
    $this->data['student'] = $this->Enroll_Model->getStudentDetail($this->student_id);
    $this->data['calendar'] = $this->getCalendar();  
    $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, $this->data);
  
    $this->load->view('auth/enroll_confirm', $this->data);
  }

  public function payment()
  {
    /** User token Check */
    $this->__tokenChecker();

    $globalHeader = array(
		  'title' => "Enroll Course",
      'pass' => ['dashboard' => 'student/dashboard','applied course' => 'student/apply'],
		  'uri' => array("std_apply"),
      'msg' => ''
	  );

    $this->userconfig->_customSessionChecker(0, $this->enroll_package, 'course');
    $this->userconfig->_customSessionChecker(0, $this->current_csrf_key, 'auth/login');

    $this->data['course'] = $this->Enroll_Model->getCourseDetail($this->enroll_course);
    if(!empty($this->data['course']->ref_key)) {
      if($this->data['course']->ref_key == "online") {
        $this->data['lesson'] = $this->Enroll_Model->getLessonsDetail($this->enroll_course);
      }
    }
    $this->data['student'] = $this->Enroll_Model->getstudentDetail($this->student_id);
    $this->data['batch'] = $this->Enroll_Model->getBatchDetail($this->enroll_batch);
    $this->data['batch']->livecheck = $this->userconfig->__attendDateGenerate($this->data['course']->ref_key, $this->data['batch']->liveclass, $this->data['batch']->start_date, $this->data['batch']->month_duration, $this->data['batch']->day_duration, 20);
	  $this->data['payment'] = $this->Enroll_Model->getPaymentList();
    $this->data['calendar'] = $this->getCalendar();
    $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, $this->data);

    $this->load->view('auth/enroll_payment', $this->data);
  }

  public function enroll_check()
  {
    /** User token Check */
    $this->__tokenChecker();

    if($_POST) {
      $this->form_validation->set_rules('student_id', 'student id!', 'trim|required|xss_clean');
      $this->form_validation->set_rules('payment_method', 'payment method!', 'trim|required|xss_clean');
      $this->form_validation->set_rules('phonenumber', 'phone number!', 'trim|numeric|required|xss_clean');
      if ($this->form_validation->run() === false) {
        $this->session->set_flashdata('msg_error', 'Please select payment & correct phone number!');
        redirect('enroll/payment');
      } else {
        $data = array(
          'std_id' => $this->current_id,
          'bat_id' => $this->enroll_batch,
          'cos_id' => $this->enroll_course,
          'request_date' => date('Y-m-d H:i:s'),
          'expired_date' => "0000-00-00 00:00:00",
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'status' => 0
        );
      $data = $this->security->xss_clean($data);        
      $checkdata = $this->Enroll_Model->EnrollBatchCheck($data);

      if ($checkdata){
        $this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
        redirect('course');
      } else {
        $cos_id = $this->Enroll_Model->insertBatch($data);
        $lastid = $this->Enroll_Model->getCourseID();   
        $lastid = (isset($lastid)?$lastid:1);
        $invoice_number = serial_id_generate("Inv-", $lastid-1, 6);
        $courseinfo = $this->Enroll_Model->getBatchDetail($this->enroll_batch);

        $invoice = array(
          'std_id' => $this->current_id,
          'std_cos_id' => $cos_id,
          'invoice_number' => $invoice_number,
          'pay_type' => $this->input->post('payment_method'),
          'discount' => 0,
          'txt' => 0,
          'charge' => 0,
          'sub_price' => $courseinfo->fees,
          'total_price' => $courseinfo->fees,
          'pay_info' => $this->input->post('phonenumber'),
          'description' => $this->input->post('note'),
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        );

        $enroll_type = array(
          '__enroll_payment_type' => $this->input->post('payment_method')
        );
        $this->session->set_userdata($enroll_type);
          $insert = $this->Enroll_Model->insertInvoice($invoice);
          if($insert) {
            $this->__ClosedEnrollSessionSet();
            $this->session->set_flashdata('msg', 'Your data has been insert!');
            redirect('enroll/complete');
          }
        }
      }
    } else {
      redirect('enroll/payment');
    }
  }

  public function complete()
  {
    /** User token Check */
    $this->__tokenChecker();
    $globalHeader = array(
		  'title' => "Enroll Course",
      'pass' => ['dashboard' => 'student/dashboard','applied course' => 'student/apply'],
		  'uri' => array("std_apply"),
      'msg' => ''
	  );
    $this->__ClosedEnrollSessionSet();

    if(!empty($this->session->__enroll_payment_type)) {
      $this->data['payment'] = $this->Enroll_Model->getPaymentDetail($this->session->__enroll_payment_type);
    }
    $this->data['calendar'] = $this->getCalendar();
    $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, $this->data);

    $this->load->view('auth/enroll_complete', $this->data);
  }

  public function course_cancel()
  {
    /** User token Check */
    $this->__tokenChecker();

    $this->__ClosedEnrollSessionSet();
    redirect('course');
  }

  public function fetch_payment()
	{
		if($this->input->post('pay_id'))
		{
			echo $this->Enroll_Model->fetch_payment($this->input->post('pay_id'));
		}
	}

 /******* Site Configuration Reassign and Distibute *********/
	private function __preSessionDataSet()
  {
    $this->current_id = isset($_SESSION['__student_user_data']['user_id'])?$_SESSION['__student_user_data']['user_id']:"";
		$this->current_user = isset($_SESSION['__student_user_data']['user_name'])?$_SESSION['__student_user_data']['user_name']:"";
		$this->student_id = isset($_SESSION['__student_user_data']['student_id'])?$_SESSION['__student_user_data']['student_id']:"";
    $this->user_email = isset($_SESSION['__student_user_data']['user_email'])?$_SESSION['__student_user_data']['user_email']:"";
		$this->current_csrf_key = isset($_SESSION['__student_token_slug'])?$_SESSION['__student_token_slug']:"";
		$this->current_log_id  = isset($_SESSION['__student_session_id'])?$_SESSION['__student_session_id']:"";
		$this->current_session_count = isset($_SESSION['__student_user_data']['session'])?$_SESSION['__student_user_data']['session']:"";
		$this->current_login_time = isset($_SESSION['__student_user_data']['login_time'])?$_SESSION['__student_user_data']['login_time']:"";
		$this->session_checker = isset($_SESSION['__student_session']['usercheck_point'])?$_SESSION['__student_session']['usercheck_point']:"";
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

/******* Login Configuration and Token Checker *********/
	private function __pretokenCheck()
  {
		if(empty($this->current_csrf_key) || $this->session_checker == false) {
      return FALSE;
    } else {
      $data = $this->userconfig->_mbSplit('@', $this->current_csrf_key);
      $key_info = $this->_get_user_token($data[0].'@', $data[1]);
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
				redirect('auth/logout');
			}
		}
	}
	
	private function _user_query_Remove($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('std_config');
		return true;
	}
	
	private function _get_user_token($token, $slug)
	{
		$this->db->select('id,std_id,csrf_token_key,csrf_slug_key');
		$this->db->from('std_config');
		$this->db->where('csrf_token_key', $token);
		$this->db->where('csrf_slug_key', $slug);
		$query=$this->db->get();
		return $query->result();
	}

/******* Cart System, Cart Session and Single item insert *********/  
  public function __preCartAndEnrollChecker()
  {
    if($this->enroll_checker == 1) {
      $this->session->unset_userdata('__enroll_course_package');
      $this->session->unset_userdata('__enroll_course_checker');
      $this->__CartDestory();
    }
  }

  private function __CartDestory()
  {
      $this->cart->destroy();
  }

  private function __singleCartInsert($id, $name, $qty = 1, $price, $class, $img) 
  {
    $this->__CartDestory();
    if(count($this->cart->contents()) > 1) {
      $this->cart->destroy();
    } else {
      $data = array(
        'id' => $id,
        'name' => $name,
        'qty' => $qty,
        'price' => $price,
        'class' => $class,
        'image' => $img,
      );
      $this->cart->insert($data);
    }
    return true;
  }

  public function __ClosedEnrollSessionSet()
  {
    $enroll_course['__enroll_course_checker'] =  1;
    $this->session->set_userdata($enroll_course);
  }

  public function getCalendar() 
  {
    $dd = $this->Enroll_Model->getLocalClassList($this->current_id);
    $calendar = $this->userconfig->__calendarDateGenerate($dd);
    $month = date('m');
    $years = date('Y');
    $prefs = $this->userconfig->__calendarGenerate();
    $this->calendar->initialize($prefs);
    $this->load->library('calendar',$prefs); // Load calender library		
    $data['calendar'] = $this->calendar->generate($years, $month, $calendar);
    return $data['calendar'];
  }

}
