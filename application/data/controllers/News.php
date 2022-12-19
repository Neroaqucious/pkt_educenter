<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * not finish tags with query
 */
class News extends CI_Controller {
  private $private_db = "News_Model";
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

  public function index()
  {
      $this->page();
  }

  public function page()
  {
    $globalHeader = array(
		  'title' => "News",
      'pass' => ['news' => 'news'],
		  'msg' => "",	
	  );

    $config['base_url'] = base_url('news/page/');
    $config['total_rows'] = $this->News_Model->getNewsCount();
    $config['per_page'] = 6;
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
    $this->data['lists'] = $this->News_Model->getNewsList($config['per_page'], $page);
    $this->data['pagination'] = $this->pagination->create_links();
    $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
    foreach($this->data['lists'] as $row) {
      $row->title = $this->mainconfig->_textLimiter($row->title, 25);
    }
    foreach($this->data['lists'] as $row) {
      $row->content = $this->mainconfig->_textLimiter($row->content, 100);
    }
    $this->load->view('page/news', $this->data);
  }

  public function detail($id)
  {
    $globalHeader = array(
		  'title' => "News Detail",
      'pass' => ['news' => 'news', 'detail' => 'news/detail/'.$id],
		  'msg' => "",	
	  );
    $this->data['result'] = $this->News_Model->getNewsDetail($id);
    $this->data['recent'] = $this->News_Model->getRecentNewsList($id);

    $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
    foreach($this->data['recent'] as $row) {
      $row->title = $this->mainconfig->_textLimiter($row->title, 25);
    }

    if(empty($id) || !is_numeric($id) || empty($this->data['result'])){
      $this->output->set_status_header('404');
      $this->data['msg']="Sorry, we can’t find the page you were looking for!";
      return $this->load->view('error_404', $this->data);
    }
    
    $this->load->view('page/news_detail', $this->data);
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
