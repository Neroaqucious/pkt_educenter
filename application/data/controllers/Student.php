<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends CI_Controller {
  private $private_db = "Student_Model";
	private $data;
  private $current_id, $current_user, $student_id, $user_email, $current_csrf_key, $current_log_id, $current_session_count, $current_login_time, $session_checker;
  //Initial presite config
	private $site_name, $meta_tag, $favicon, $decimal_point, $date_format, $phone_format, $user_session, $timezone;
  private $less_id, $part_id, $mov_id;
  //File upload data
  private $filename;
  private $upload_path = "./upload/assets/adm/usr/";
  private $file_path = "/../../upload/assets/adm/usr/";
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
    $this->load->library('pagination');
    $this->load->library('upload');
    $this->load->library('calendar');
    $this->load->library('userconfig');    

    $this->userconfig->_DefaultTimeZone($this->timezone);
		/** Session Assign **/
		$this->__preSessionDataSet();
    $this->__preSiteConfigDataSet();
		/** Token Checker **/
		$this->__tokenChecker();
  }

  public function index()
  {
    $this->page();
  }

  public function page()
  {
    $globalHeader = array(
		  'title' => "MY PAGE",
      'pass' => ['dashboard' => 'student/dashboard'],
      'uri' => array("dashboard"),
		  'msg' => "",
      'sidebar' => 'off'	
	  );

    $config['base_url'] = base_url('student/page/');
    $config['total_rows'] = $this->Student_Model->getStudentBatchCount($this->current_id);
    $config['per_page'] = 2;
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

    $this->data['lists'] = $this->Student_Model->getStudentBatchList($config['per_page'], $page, $this->current_id);
    $this->data['permission'] = $this->Student_Model->getStudentPermission($this->current_id);
    $this->data['pagination'] = $this->pagination->create_links();
    
    foreach ($this->data['lists'] as $row)
		{
      $row->url = base_url('student/course/'.$row->id."/".$row->ref_key."/".$row->slug_name);
		}
    foreach ($this->data['lists'] as $row)
		{
      $row->request = base_url('student/course/request/'.$row->id."/".$row->ref_key."/".$row->slug_name);
		}
    foreach ($this->data['lists'] as $row)
		{
      $row->livecheck = $this->userconfig->__attendDateGenerate($row->ref_key, $row->liveclass, $row->start_date, $row->month_duration, $row->day_duration, 20);
		}
    $this->data['calendar'] = $this->getCalendar();

    $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, $this->data);
    $this->load->view('auth/dashboard', $this->data);
  }

  public function profile()
  {
    $globalHeader = array(
		  'title' => "Profile",
      'pass' => [
        'dashboard' => 'student/dashboard',
        'profile' => 'student/profile'
      ],
      'uri' => array("profile"),
		  'msg' => "",	
      'sidebar' => 'off',
	  );
    $this->data['result'] = $this->Student_Model->getstudentDetail($this->current_id);
    $this->data['calendar'] = $this->getCalendar();
    $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, $this->data);
    $this->load->view('auth/profile', $this->data);
  }

  public function edit()
  {
    $globalHeader = array(
		  'title' => "Edit",
      'pass' => [
        'dashboard' => 'student/dashboard',
        'profile' => 'student/profile',
        'edit' => 'student/edit'
      ],
      'uri' => array("profile"),
		  'msg' => "",	
      'sidebar' => 'off',
	  );

    $this->data['result'] = $this->Student_Model->getstudentDetail($this->current_id);
        
    if(empty($this->current_id) || empty($this->data['result'])){
      $this->output->set_status_header('404');
      $this->data['msg'] = "";
      return $this->load->view('error_404', $this->data);
    }
    $this->data['calendar'] = $this->getCalendar();
    $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, $this->data);
    $recent_photo = $this->data['result']->image_file;

    if($_POST) {
      $this->form_validation->set_rules('std_name', 'student name', 'trim|required|min_length[5]|xss_clean');
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
				$this->load->view('student/edit', $this->data);
			} else {
        $data = array(
          'name' => $this->input->post('std_name'),
          'phone' => $this->input->post('phone'),
          'address' => $this->input->post('address'),
          'birthday' => $this->input->post('std_birthday'),
          'nrc' => $this->input->post('std_nrc'),
          'education' => $this->input->post('std_edu'),
          'social' => $this->input->post('std_facebook'),
          'updated_at' => date('Y-m-d H:i:s')
        );
        $data = $this->__Xss($data);

        $checkdata = $this->Student_Model->studentCheck($data, $this->current_id);

        if (!empty($_FILES['userfile']['name'])){
          if(!empty($recent_photo)) {
						$preview_link = dirname(__FILE__)."".$this->file_path."".$recent_photo;
						if(file_exists($preview_link)){
							unlink($preview_link);
						}
					}

          $imgupload = $this->userconfig->_fileUpload($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, TRUE, TRUE, FALSE);

          if(!empty($imgupload['msg_error'])) {
              $this->session->set_flashdata('msg_error', $imgupload['msg_error']);
              redirect('student/edit/', $data);
          } else {
              $data['image_file'] = $imgupload['file_name'];
          }
        } else {
          if ($checkdata) {
            $this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
            redirect('student/edit/');
          }
        }
        if(!empty($this->input->post('std_password'))) {
          $auth['password'] = $this->__passwordDataHashing($this->input->post('std_password'));
          $this->Student_Model->studentUpdate($auth, $this->current_id);
        } 
        if(empty($checkdata)) {
          $data['result'] = $this->Student_Model->studentAuthUpdate($data, $this->current_id);
          $this->session->set_flashdata('msg_success', 'Your data has been update!');
          redirect("student/profile");
        }
			}
		} else {
			$this->load->view('auth/edit', $this->data);
		}
  }

  public function cos_detail($id,$slug,$course)
  {
    $globalHeader = array(
		  'title' => "Course Detail",
      'pass' => [
        'dashboard' => 'student/dashboard',
        'detail' => 'student/course/'.$id."/".$slug."/".$course
      ],
      'uri' => array("dashboard"),
		  'msg' => "",
      'sidebar' => 'off',
	  );
    $this->data['result'] = $this->Student_Model->getStudentBatchDetail($id, $this->current_id, $course);
    //Student Course Permission
    $this->data['permission'] = $this->Student_Model->getStudentPermission($this->current_id);
    //Data validation and condition checking
    if(empty($id) || !is_numeric($id) || empty($this->data['result'])){
      $this->output->set_status_header('404');
      $this->data['msg'] = "The requested URL was not found on this website!";
      return $this->load->view('error_404', $this->data);
    }

    if($this->data['result']->status == 0 ) {
      $batch = $this->data['result'];
      $this->session->set_flashdata('msg_error', 'Your enroll course has not activated!');
      redirect("student/course/request/".$batch->id."/".$batch->ref_key."/".$batch->slug_name);
    }    
    $cos_id = $this->data['result']->cos_id;
    $ply_key = $this->data['result']->liveclass;

    if($slug == "online") {
      //Lessons review by course id
      $this->data['online'] = $this->Student_Model->getLessonsListByCourse($cos_id); 
      $this->data['result']->livecheck = $this->userconfig->__attendDateGenerate($this->data['result']->ref_key, $this->data['result']->liveclass, $this->data['result']->start_date, $this->data['result']->month_duration, $this->data['result']->day_duration);
      if($ply_key == 'on') {
        $this->data['localclass'] = $this->Student_Model->getLessonsListByOnlineCourse($id, $this->current_id);
        $this->data['localclass']->calendar_day = json_decode($this->data['localclass']->class_date);
      }
    } else {
      //Lessons review by course id
      $this->data['localclass'] = $this->Student_Model->getLessonsListByOnlineCourse($id, $this->current_id); 
      $this->data['localclass']->calendar_day = json_decode($this->data['localclass']->class_date);
    }
 
    if(!empty($this->data['online']->id)) {
      $less_id = $this->data['online']->id;
      //Lesson video detail
      $this->data['lesson_lists'] = $this->Student_Model->getLessonsDetailList($less_id);
      //Part detail
      $this->data['lesson_parts'] = $this->Student_Model->getPartList($less_id);
      // part total
      $this->data['parts_detail'] = $this->Student_Model->getPartDetail($less_id);
    } else {
      $this->data['lesson_lists'] = $this->data['lesson_parts'] = $this->data['parts_detail'] = "";
    }

    $this->data['calendar'] = $this->getCalendar();
    $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, $this->data);

    if($slug == "online") {
      $this->load->view('auth/course_detail', $this->data);
    } else {
      $this->load->view('auth/course_detail_local', $this->data);
    }
  }

  public function cos_request($id,$slug,$course)
  {
    $globalHeader = array(
		  'title' => "Course Request",
      'pass' => [
        'dashboard' => 'student/dashboard',
        'request' => 'student/course/request/'.$id."/".$slug."/".$course
      ],
      'uri' => array("dashboard"),
		  'msg' => "",
      'sidebar' => 'off',	
	  );

    $this->data['result'] = $this->Student_Model->getStudentBatchDetail($id, $this->current_id, $course);

    if(empty($id) || !is_numeric($id) || empty($this->data['result'])){
      $this->output->set_status_header('404');
      $this->data['msg'] = "The requested URL was not found on this website!";
      return $this->load->view('error_404', $this->data);
    }

    if($this->data['result']->status == 1 ) {
      $batch = $this->data['result'];
      $this->session->set_flashdata('msg_success', 'Your enroll course has been activated!');
      redirect("student/course/".$batch->id."/".$batch->ref_key."/".$batch->slug_name);
    }
    $cos_id = $this->data['result']->cos_id;

    if($slug == "online") {
      //Lessons review by course id
      $this->data['online'] = $this->Student_Model->getLessonsListByCourse($cos_id); 
    }
    $this->data['result']->livecheck = $this->userconfig->__attendDateGenerate($this->data['result']->ref_key, $this->data['result']->liveclass, $this->data['result']->start_date, $this->data['result']->month_duration, $this->data['result']->day_duration);
    //Student Course Permission
    $this->data['permission'] = $this->Student_Model->getStudentPermission($this->current_id);
    $this->data['payment'] = $this->Student_Model->getPaymentList($this->current_id, $this->data['result']->cos_id, $this->data['result']->bat_id);
    $this->data['calendar'] = $this->getCalendar();
    // print_r($this->data['payment']);
    $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, $this->data);
    $this->load->view('auth/course_request', $this->data);
  }

  public function lessons($lid, $slug)
  {
    $globalHeader = array(
		  'title' => "Lessons",
      'pass' => [
        'dashboard' => 'student/dashboard',
        'lessons' => 'student/lessons/'.$lid.''.$slug
      ],
      'uri' => array("dashboard", "pc_only"),
		  'msg' => "",
      'sidebar' => 'on',
	  );

    $this->data['result'] = $this->Student_Model->getLessonsDetail($slug);
    //Student Course Permission
    $this->data['permission'] = $this->Student_Model->getStudentPermission($this->current_id);

    if(empty($lid) || !is_numeric($lid) ||  empty($this->data['result']) || $this->__activateMediaToken($lid, $slug) != 1 || $this->data['permission']->permission == 0){
      $this->output->set_status_header('404');
      $this->data['msg'] = "The requested URL was not found on this website!";
      return $this->load->view('error_404', $this->data);
    }

    if(!empty($this->data['result'])) {
      $this->less_id = $this->data['result']->less_id;
      $this->part_id = $this->data['result']->part_id;
      $this->mov_id = $this->data['result']->id;

      $this->data['related'] = $this->Student_Model->getRelatedLessonsDetail($this->mov_id, $this->part_id, $this->less_id);
      $this->data['course'] = $this->Student_Model->getLessonsListByLessons($this->less_id); 
      $this->data['lists'] = $this->Student_Model->getLessonsDetailList($this->less_id);
      $this->data['parts'] = $this->Student_Model->getPartList($this->less_id);
      $this->data['parts_detail'] = $this->Student_Model->getPartDetail($this->less_id);
      $this->data['note'] = $this->Student_Model->studentNoteDetail($this->current_id, $this->mov_id);
    } else {
      $this->data['related'] = $this->data['note'] = $this->data['course'] = $this->data['lists'] = $this->data['parts'] = $this->data['parts_detail'] = "";
    }    
    $this->data['calendar'] = $this->getCalendar();
    $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, $this->data);
    $this->load->view('auth/lessons_detail', $this->data);
  }

  public function addnote()
  {
    if($_POST) {
      $this->form_validation->set_rules('data_id', 'data_id', 'trim|xss_clean');    
      $this->form_validation->set_rules('cos_id', 'part_id', 'trim|xss_clean');      
      $this->form_validation->set_rules('member_note', 'notes', 'trim|xss_clean');      

      $cos_id = $this->input->post('cos_id');
      $data_id = $this->input->post('data_id');
      $batch = $this->Student_Model->studentBatchDetail($this->current_id, $cos_id);
      $data1 = array(
        'std_id' => $this->current_id,
        'data_id' => $data_id,
        'cos_id' => $cos_id,
        'bat_id' => $batch->bat_id,
        'note' => $this->input->post('member_note'),
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
        'status' => 1
      );
      $data1 = $this->security->xss_clean($data1);
      $checkdata = $this->Student_Model->studentNoteDetail($this->current_id, $data_id);
      $urldata = $this->Student_Model->studentLessonDetail($data_id);
      
      if(!empty($checkdata)) {
        $data2 = array(
          'note' => $this->input->post('member_note'),
          'updated_at' => date("Y-m-d H:i:s"),
        );
        $data2 = $this->security->xss_clean($data2);
        $return = $this->Student_Model->studentNoteUpdate($this->current_id, $data_id, $data2);
      } else {
        $return = $this->Student_Model->studentNoteInsert($data1);
      }

      if($return) {
        $this->session->set_flashdata('msg_success', 'Note has been saved!');
        redirect("student/lessons/".$urldata->less_id."/".$urldata->slug_name);
      }
		}
  }

  public function history()
  {
    $globalHeader = array(
		  'title' => "Course Request",
      'pass' => [
        'dashboard' => 'student/dashboard',
        'purchase history' => 'student/purchase/history/',
      ],
      'uri' => array("history"),
		  'msg' => "",		
	  );

    $config['base_url'] = base_url('student/purchase/history/');
    $config['total_rows'] = $this->Student_Model->getStudentPurchaseCount($this->current_id);
    $config['per_page'] = 4;
    $config['uri_segment'] = 4;
    $config['use_page_numbers'] = TRUE;
    $currentPage = ($this->uri->segment(4))?$this->uri->segment(4):1;

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

    $this->data['lists'] = $this->Student_Model->getStudentPurchaseList($config['per_page'], $page, $this->current_id);
    $this->data['permission'] = $this->Student_Model->getStudentPermission($this->current_id);
    $this->data['pagination'] = $this->pagination->create_links();
    $this->data['calendar'] = $this->getCalendar();
    $this->data = $this->userconfig->_ArrayDataMarge($globalHeader, $this->data);
    
    $this->load->view('auth/history', $this->data);
  }

  public function task($date, $sl)
  {
    print_r($date);
    print_r($sl);
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

/******* Site Configuration Reassign and Distibute *********/
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
		if(empty($this->__pretokenCheck()) || ($this->__userStateChecker() == false)) {
			$queryChecker = $this->_user_query_Remove($this->current_log_id);
			if($queryChecker) {
				redirect('auth/logout');
			}
		}
	}

  public function __userStateChecker()
  {
    $perm = $this->Student_Model->getStudentPermission($this->current_id);
    if($perm->status == 1) {
      return true;
    } else {
      return false;
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

/******* Security Configuration *********/
	private function __Xss($data){
		return $this->security->xss_clean($data);
	}

	private function __passwordDataHashing($data){
		return password_hash($data, PASSWORD_BCRYPT);
	}

/******** Media File token gernerate *********/
  private function __activateMediaToken($lid, $slug)
  {
    $access_token = $this->Student_Model->getStudentBrachChecker($lid, $slug, $this->current_log_id);
    if(!empty($access_token)){
      $access_gen = $access_token->csrf_token_key."".$access_token->csrf_slug_key;
      if($access_gen === $this->current_csrf_key && $slug === $access_token->slug_name) {
        return TRUE;
      } else {
        return FALSE;   
      }
    } else {
      return FALSE;
    }
  }

  function getTheDay($date)
  {
    $curr_date=strtotime(date("Y-m-d H:i:s"));
    $the_date=strtotime($date);
    $diff=floor(($curr_date-$the_date)/(60*60*24));

    switch($diff)
    {
      case 0:
        return "Today";
        break;
      case 1:
        return "Yesterday";
        break;
      default:
        return $diff." Days ago";
    }
  }

  public function getCalendar() 
  {
    $dd = $this->Student_Model->getLocalClassList($this->current_id);
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
