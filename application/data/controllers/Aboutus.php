<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Aboutus extends CI_Controller {
  private $private_db = "Aboutus_Model";
	private $default_timezone = "Asia/Rangoon";
	private $data;
  private $current_id, $current_user, $student_id, $user_email, $current_csrf_key, $current_log_id, $current_session_count, $current_login_time, $session_checker;

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model($this->private_db);
    $this->load->library('session');
    $this->load->library('encryption');
    $this->load->library('pagination');
    $this->load->library('mainconfig');    

    $this->mainconfig->_DefaultTimeZone($this->default_timezone);
		/** Session Assign **/
		$this->__preSessionDataSet();
  }

  public function index(){
    $globalHeader = array(
		  'title' => "Aboutus",
      'pass' => ['aboutus' => 'aboutus'],
		  'msg' => "",	
	  );

    $this->data['trainer'] = $this->Aboutus_Model->getTrainer();
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
    $this->load->view('page/aboutus', $this->data);
  }

  
/******* Session Reassign and Distibute *********/
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
	}

  /******* Security Configuration *********/
	private function __Xss($data){
		return $this->security->xss_clean($data);
	}

	private function __passwordDataHashing($data){
		return password_hash($data, PASSWORD_BCRYPT);
	}
}
