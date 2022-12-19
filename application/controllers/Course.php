<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course extends CI_Controller {

  private $private_db = "Course_Model";
	private $default_timezone = "Asia/Rangoon";
	private $data;
  private $current_id, $current_user, $student_id, $user_email, $current_csrf_key, $current_log_id, $current_session_count, $current_login_time, $session_checker;

  private $fil_sess = array('filter' => "", 'key' => '');
  
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

  public function index()
  {
    $this->page();
  }

  public function page()
  {
    $globalHeader = array(
		  'title' => "Course",
      'pass' => ['course' => 'course/'],
		  'msg' => "",	
	  );

    $config['base_url'] = base_url('course/page/');
    $config['total_rows'] = $this->Course_Model->getCourseCount();
    $config['per_page'] = 4;
    $config['uri_segment'] = 3;
    $config['use_page_numbers'] = TRUE;
    $currentPage = ($this->uri->segment(3))?$this->uri->segment(3):1;

    $page = $config['per_page'] * ($currentPage - 1);
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li><span class="current">';
    $config['cur_tag_close'] = '</span></li>';
    $config['prev_link'] = '<li><span class="prev">≪</span></li>';
    $config['next_link'] = '<span class="next">≫</span>';

    $this->pagination->initialize($config);
    $this->data['lists'] = $this->Course_Model->getCourseList($config['per_page'], $page);
    $this->data['subcat'] = $this->Course_Model->getSubCategoryList();
    $this->data['news'] = $this->Course_Model->getNewsList();
    $this->data['pagination'] = $this->pagination->create_links();

    $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

    foreach($this->data['lists'] as $row) {
      $row->cos_des1 = $this->mainconfig->_textLimiter($row->cos_des1, 150);
    }
    foreach($this->data['news'] as $row) {
      $row->title = $this->mainconfig->_textLimiter($row->title, 30);
    }

    $this->load->view('page/course', $this->data);
  }

  public function search($filter = null,$key = null)
  {
    $globalHeader = array(
		  'title' => "Course",
      'pass' => ['course' => 'course/','filter' => 'course/search/'.$filter."/".$key],
		  'msg' => "",	
	  );

    if($_POST) {
      $filter = $this->input->post('title');
      $key = $this->input->post('key');
			
      $globalHeader['pass'] = [
        'course' => 'course/',
        'filter' => 'course/search/'.$filter."/".$key
      ];

      if($filter != null && $key != null) {
        $this->fil_sess['filter'] = $filter;
        $this->fil_sess['key'] = $key;
      }
    } else {
      $globalHeader['pass'] = [
        'course' => 'course/',
        'filter' => 'course/search/'.$filter."/".$key
      ];

      if($key != null) {
        $id = $key;
      }
      if($filter != null && $key != null) {
        $this->fil_sess['filter'] = $filter;
        if(is_numeric($id)) {
          $this->fil_sess['key'] = $id;
        } else {
          $this->fil_sess['key'] = $key;
        } 
      }
    }
    $this->session->set_userdata($this->fil_sess);
    
    $this->data['lists'] = $this->Course_Model->getCourseFilter($_SESSION['filter'], $_SESSION['key']);
    $this->data['subcat'] = $this->Course_Model->getSubCategoryList();
    $this->data['news'] = $this->Course_Model->getNewsList();

    foreach($this->data['lists'] as $row) {
      $row->cos_des1 = $this->mainconfig->_textLimiter($row->cos_des1, 150);
    }
    foreach($this->data['news'] as $row) {
      $row->title = $this->mainconfig->_textLimiter($row->title, 30);
    }
    $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

    $this->load->view('page/course_filter', $this->data);
  }

  public function find($filter = null,$key = null)
  {
    $globalHeader = array(
		  'title' => "Course",
      'pass' => ['course' => 'course/','filter' => 'course/search/'.$filter."/".$key],
		  'msg' => "",	
	  );

    if($_POST) {
      $filter = $this->input->post('title');
      $key = $this->input->post('key');
			
      $globalHeader['pass'] = [
        'course' => 'course/',
        'filter' => 'course/search/'.$filter."/".$key
      ];

      if($filter != null && $key != null) {
        $this->fil_sess['filter'] = $filter;
        $this->fil_sess['key'] = $key;
      }
    } else {
      $globalHeader['pass'] = [
        'course' => 'course/',
        'filter' => 'course/search/'.$filter."/".$key
      ];

      if($key != null) {
        $id = $key;
      }
      if($filter != null && $key != null) {
        $this->fil_sess['filter'] = $filter;
        if(is_numeric($id)) {
          $this->fil_sess['key'] = $id;
        } else {
          $this->fil_sess['key'] = $key;
        } 
      }
    }

    $this->session->set_userdata($this->fil_sess);
    
    $this->data['lists'] = $this->Course_Model->getCourseFilter($_SESSION['filter'], $_SESSION['key']);
    $this->data['subcat'] = $this->Course_Model->getSubCategoryList();
    $this->data['news'] = $this->Course_Model->getNewsList();

    foreach($this->data['lists'] as $row) {
      $row->cos_des1 = $this->mainconfig->_textLimiter($row->cos_des1, 150);
    }
    foreach($this->data['news'] as $row) {
      $row->title = $this->mainconfig->_textLimiter($row->title, 30);
    }
    $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

    $this->load->view('page/course_filter', $this->data);
  }


  public function detail($slug)
  {
    $globalHeader = array(
		  'title' => "Course Detail",
      'pass' => ['course' => 'course/','detail' => 'course/detail/'.$slug],
		  'msg' => "",	
	  );
    
    // Requirement detail UI
    $this->data['subcat'] = $this->Course_Model->getSubCategoryList();
    $this->data['news'] = $this->Course_Model->getNewsList();
    $this->data['result'] = $this->Course_Model->getCourseDetail($slug);

    if($this->current_id != "") {
      $this->data['auth'] = $this->Course_Model->getCurrentUserBatch($this->current_id, $slug);
    }
    
    if(empty($slug) || empty($this->data['result'])){
      $this->output->set_status_header('404');
      $this->data['msg'] = "";
      return $this->load->view('error_404', $this->data);
    }

		//batch and related course
    $subcat = $this->data['result']->subcat_id;
	  $this->data['batch'] = $this->Course_Model->getBatchList($this->data['result']->id);
    $this->data['related'] = $this->Course_Model->getRelatCourse($this->data['result']->id, $subcat, $this->data['result']->level_id);

    if(empty($this->data['result'])){
      $this->session->set_flashdata('msg_error', "Bad Request, Not allowed permission!");
      redirect('course', $this->data);
    }

    foreach($this->data['news'] as $row) {
      $row->title = $this->mainconfig->_textLimiter($row->title, 30);
    }

    foreach($this->data['related'] as $row) {
      $row->cos_des1 = $this->mainconfig->_textLimiter($row->cos_des1, 150);
    }
    foreach ($this->data['batch'] as $row)
		{
      /** Remaind to assign last show live online class target days */
      $row->livecheck = $this->userconfig->__attendDateGenerate($this->data['result']->ref_key, $row->liveclass, $row->start_date, $row->month_duration, $row->day_duration, 20);
		}

    $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
 
    $this->load->view('page/course_detail', $this->data);
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
