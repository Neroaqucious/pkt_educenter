<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
  private $private_db = "Home_Model";
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
    $this->load->library('userconfig');    

    $this->userconfig->_DefaultTimeZone($this->default_timezone);
		/** Session Assign **/
		$this->__preSessionDataSet();
  }

  public function index(){
    $globalHeader = array(
		  'title' => "Top page",
      'pass' => ['home' => '/'],
		  'msg' => "",	
	  );

		$this->data['course'] = $this->Home_Model->getCourse();
	  $this->data['news'] = $this->Home_Model->getNews();
	  $this->data['trainer'] = $this->Home_Model->getTrainer();
	  $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, $this->data);
    foreach($this->data['course'] as $row) {
      $row->cos_des1 = $this->userconfig->_textLimiter($row->cos_des1, 150);
    }
    foreach($this->data['news'] as $row) {
      $row->content = $this->userconfig->_textLimiter($row->content, 150);
    }
    foreach($this->data['news'] as $row) {
      $row->title = $this->userconfig->_textLimiter($row->title, 25);
    }
    $this->load->view('page/home', $this->data);
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
