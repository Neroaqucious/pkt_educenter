<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'third_party/getid3/getid3/getid3.php');

class Lessons extends CI_Controller
{
	//db and configuration
	private $private_db = "dashboard/Lessons_Model";
	protected $data;
	private $key, $url, $getID3;
	private $current_id, $current_user, $current_role, $current_csrf_key, $current_permission, $current_session_count, $current_login_time, $current_log_id, $session_checker, $user_config;
	private $site_name, $meta_tag, $favicon, $decimal_point, $date_format, $phone_format, $user_session, $timezone;
	
	//File upload data
	private $filename;
	private $upload_path = "./upload/assets/adm/mov/int_/pkt_/_data/";
	private $file_path = "/../../../upload/assets/adm/mov/int_/pkt_/_data/";
	private $mov_path = APPPATH.'/../upload/assets/adm/mov/int_/pkt_/_data/';
	private $max_size = "202800";  // upload max size 200 MB
	private $max_width = "4600";
	private $max_height = "4600";
	private $allow_type = 'mp4|mpg|mpeg|avi|mov';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model($this->private_db);
		$this->load->library('session');
		$this->load->library('encryption');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->helper('file');
		$this->load->library('mainconfig');
		$this->load->helper('custom');
		$this->mainconfig->_DefaultTimeZone($this->timezone);
		
		/** Session Assign **/
		$this->__preSessionDataSet();
		/** Site Configuration Assign **/
		$this->user_config = $this->__preSiteConfigDataSet();
		
		/** Token Checker **/
		$this->__tokenChecker();
		$this->key = "pe_data";
		$this->url = "adm/portal/d-panel";
	}

	public function index()
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Lessons List",
			'msg' => "",
			'uri' => array("lessons","lessons_lists"),
			'config' => $this->user_config
		);
		
		$list = $this->Lessons_Model->getLessonsList();
		$Q_list = _transfer_key_prepare(array_keys_checker($list));
		$this->data['lists'] = array_transfer($list, $Q_list);
		$this->data['course'] = $this->Lessons_Model->getCourseList();
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);

		if($_POST) {
			$this->form_validation->set_rules('description', 'lessons', 'trim|required|xss_clean');
      $this->form_validation->set_rules('course', 'course', 'trim|required|is_unique[OSL_lessons.cos_id]|xss_clean');
			$this->form_validation->set_error_delimiters("","");

			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/lessons/index', $this->data);
			} else {        
				$data = array(
          'cos_id' => $this->input->post('course'),
          'description' => $this->input->post('description'),
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s'),
					'status' => $this->input->post('status')
				);

        $data = $this->__Xss($data);
				$checkdata = $this->Lessons_Model->LessonsCheck($data);

				if ($checkdata){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portal/lessons');
        }

				$this->Lessons_Model->insert($data);
				$this->session->set_flashdata('msg_success', 'Your data has been insert!');
				redirect('adm/portal/lessons');
			}
		} else {
			$this->load->view('dashboard/lessons/index', $this->data);
    }
	}

  public function add()
  {
    $this->index();
  }

  public function edit($id)
  {
	  /** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Edit Lessons",
		  'msg' => "",
		  'uri' => array("lessons","lessons_lists"),
		  'config' => $this->user_config,
	  );
	
	  $list = $this->Lessons_Model->detail($id);
	  //*** Current query value checker
	  $this->__resultEmptyChecker($id, $globalHeader,"adm/portal/lessons", $list);
	  //*** Generate necessary key and value
	  $Q_list = _transfer_key_prepare(object_key_checker($list));
	  $this->data['result'] = object_transfer($list, $Q_list);
	  $this->data['course'] = $this->Lessons_Model->getCourseList();
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
    
		if($_POST) {
			$this->form_validation->set_rules('desc', 'lessons', 'trim|required|xss_clean');
      $this->form_validation->set_rules('course', 'course', 'trim|required|xss_clean');
      
			$this->form_validation->set_message('required', 'You must enter a %s!');
			$this->form_validation->set_message('is_unique', 'Your %s is already exits!');

			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/lessons/edit', $this->data);
			} else {

        $data = array(
          'cos_id' => $this->input->post('course'),
          'description' => $this->input->post('desc'),
          'updated_at' => date('Y-m-d H:i:s'),
					'status' => $this->input->post('status')
				);

				$data = $this->__Xss($data);
        $checkcourse = $this->Lessons_Model->LessonsCourseCheck($this->input->post('course'),$id);

				if ($checkcourse){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portal/lessons/edit/'.$id);
        }

				$data['result'] = $this->Lessons_Model->lessonsUpdate($data, $id);
				$this->session->set_flashdata('msg_success', 'Your data has been update!');
				redirect("adm/portal/lessons");
			}
		} else {
			$this->load->view('dashboard/lessons/edit', $this->data);
		}
  }

  public function delete($id)
	{
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Delete Lessons",
			'msg' => "",
			'uri' => array("lessons","lessons_lists"),
			'config' => $this->user_config,
		);
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/lessons", $globalHeader);
		
		$lessonchecker = $this->Lessons_Model->getTotalLessonDetail($id);
		if(count($lessonchecker) > 0 ) {
			$this->session->set_flashdata('msg_error', "Bad Request, You can't delete this data!");
			redirect('adm/portal/lessons');
		} else {
			$this->Lessons_Model->delete($id);
			$this->session->set_flashdata('msg_success', 'Your data has been delete!');
			redirect('adm/portal/lessons');
		}
  }

  public function view($id)
  {
	  /** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "View Lessons Detail",
		  'msg' => "",
		  'uri' => array("lessons","lessons_lists"),
		  'config' => $this->user_config
	  );
	
	  $list = $this->Lessons_Model->getCourseDetail($id);
	  //*** Current query value checker
	  $this->__resultEmptyChecker($id, $globalHeader,"adm/portal/lessons", $list);
	  //*** Generate necessary key and value
	  $Q_list = _transfer_key_prepare(object_key_checker($list));
	  $this->data['course'] = object_transfer($list, $Q_list);
	  
	  //Batch review
    if(!empty($list->cos_id)){
	    $list = $this->Lessons_Model->getBatchDetail($list->cos_id);
	    $Q_list = _transfer_key_prepare(array_keys_checker($list));
	    $this->data['batch'] = array_transfer($list, $Q_list);
    }
    
    //Lesson Detail
	  $this->data['detail'] = $this->Lessons_Model->getLessonsDetail1($id);
    //Lesson video detail
	  $this->data['lists'] = $this->Lessons_Model->getLessonsDetailList($id);
    //Part detail
	  $this->data['parts'] = $this->Lessons_Model->getPartList($id);
    //Total minutes
	  $this->data['total_less'] = $this->Lessons_Model->getTotalCountLessons($id);
	
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
	  
    $this->load->view('dashboard/lessons/view', $this->data);
  }

  
  public function add_movies($id)
  {
	  /** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Add Video",
		  'msg' => "",
		  'uri' => array("lessons","lessons_lists"),
		  'config' => $this->user_config,
		  'id' => $id
	  );
	
	  $this->data['part'] = $this->Lessons_Model->getLessonsPartList($id);
	  //*** Current query value checker
	  $this->__resultEmptyChecker($id, $globalHeader,"adm/portal/lessons", $globalHeader);
	  if(count($this->data['part']) < 2){
		  $this->session->set_flashdata('msg_error', "Please add new part for this lesson files!");
		  redirect('adm/portal/lessons');
	  }
	  
	  $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
	  
		if($_POST) {
      $this->form_validation->set_rules('less_id', 'lesson id', 'trim|required|xss_clean');
			$this->form_validation->set_rules('title', 'lesson name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('desc1', 'lesson description', 'trim|required|xss_clean');
      $this->form_validation->set_rules('desc2', 'description2', 'trim|xss_clean');
      $this->form_validation->set_rules('part', 'part', 'trim|required|xss_clean');
      $this->form_validation->set_rules('userfile', 'lessons', 'trim');
    
			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/lessons/add_movies', $this->data);
			} else {   
        $less_id = $this->input->post('less_id');
        $slug_name = $this->__generateDataSlug($id, $less_id);
        $data = array(
          'less_id' => $this->input->post('less_id'),
          'title' => $this->input->post('title'),
          'desc1' => $this->input->post('desc1'),
          'desc2' => $this->input->post('desc2'),
          'part_id' => $this->input->post('part'),
          'slug_name' => $slug_name,
          'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s'),
          'status' => $this->input->post('status')
        );
        $data = $this->__Xss($data);
        $checkdata = $this->Lessons_Model->checkLessonFiles($data);

        if ($checkdata) {
          $this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
          redirect('adm/portal/lessons/add_movies/'.$id);
        }
  
        if (!empty($_FILES['userfile']['name'])) {
					//image upload sever and add database
					$movupload = $this->mainconfig->_fileUpload($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, TRUE, TRUE, FALSE);

          if (!empty($movupload['msg_error'])) {
            $this->session->set_flashdata('msg_error', $movupload['msg_error']);
            redirect('adm/portal/lessons/add_movies/'.$less_id);
          } else {
						$data['movies'] = $movupload['file_name'];

						/** Media Information **/
						$this->getID3 = new getID3;						
						$filename = $this->mov_path.$movupload['file_name'];
						$MedInfo = $this->getID3->analyze($filename);
						$this->getID3->CopyTagsToComments($MedInfo);

						$data['minute'] = $MedInfo['playtime_string'];
						$data['dimensions'] = $MedInfo['video']['resolution_x']."x".$MedInfo['video']['resolution_y'];
						$data['filesize'] = $MedInfo['filesize'];
				
						$this->Lessons_Model->insertLessonFiles($data);
						            
						$getresult = $this->Lessons_Model->getTotalLessonMinutes($less_id);
						$med_count = $this->Lessons_Model->getTotalLessonCount($less_id);

	          $data = array(
		          'hours' => media_duration($getresult),
		          'lessons' => $med_count[0]->count_less,
						);			
						$this->Lessons_Model->lessonsUpdate($data, $less_id);
						
            $this->session->set_flashdata('msg_success', 'Your data has been insert!');
            redirect('adm/portal/lessons/view/'.$less_id);
          }
        } else {
          $this->session->set_flashdata('msg_error', 'Not allow empty data uploading! Please retrun.');
          redirect('adm/portal/lessons/add_movies/'.$less_id);
        }
      }
		} else {
			$this->load->view('dashboard/lessons/add_movies', $this->data);
    }
  }

  public function view_movies($id,$lid)
  {
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "View Movies Detail",
			'msg' => "",
			'uri' => array("lessons","lessons_lists"),
			'config' => $this->user_config
		);
		
		$list = $this->Lessons_Model->getLessonsMoviesDetail($id);
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/lessons", $list);
		//*** Generate necessary key and value
		$Q_list = _transfer_key_prepare(object_key_checker($list));
		$this->data['result'] = object_transfer($list, $Q_list);
		$less = $this->data['result']->less_id;
    $part = $this->data['result']->part_id;

		$list = $this->Lessons_Model->getLessonsPartDetail($id, $part, $less);
		$Q_list = _transfer_key_prepare(array_keys_checker($list));
		$this->data['related'] = array_transfer($list, $Q_list);

		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
    
    $this->load->view('dashboard/lessons/view_movies', $this->data); 
  }

  public function edit_movies($id,$lid)
  {
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Edit Movies",
			'msg' => "",
			'uri' => array("lessons","lessons_lists"),
			'config' => $this->user_config,
		);
		
		$list = $this->Lessons_Model->getLessonsDetail($id);
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/lessons", $list);
		//*** Generate necessary key and value
		$Q_list = _transfer_key_prepare(object_key_checker($list));
		$this->data['result'] = object_transfer($list, $Q_list);
		$this->data['part'] = $this->Lessons_Model->getLessonsPartList($lid); 

		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);		
		$recent_movies = $list->movies;
		
		if($_POST) {
      $this->form_validation->set_rules('id', 'id', 'trim|required|xss_clean');
      $this->form_validation->set_rules('less_id', 'lesson id', 'trim|required|xss_clean');
			$this->form_validation->set_rules('title', 'lesson title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('desc1', 'lesson description', 'trim|required|xss_clean');
      $this->form_validation->set_rules('desc2', 'description2', 'trim|xss_clean');
      $this->form_validation->set_rules('part', 'part', 'trim|required|xss_clean');
      $this->form_validation->set_rules('userfile', 'lessons', 'trim');
    
			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/lessons/edit_movies', $this->data);
			} else {   
        $id = $this->input->post('id');
        $less_id = $this->input->post('less_id');
				$slug_name = $this->__generateDataSlug($id, $less_id);
				
        $data = array(
          'less_id' => $this->input->post('less_id'),
          'title' => $this->input->post('title'),
          'desc1' => $this->input->post('desc1'),
          'desc2' => $this->input->post('desc2'),
					'part_id' => $this->input->post('part'),
					'slug_name' => $slug_name,
	        'updated_at' => date('Y-m-d H:i:s'),
          'status' => $this->input->post('status')
        );
        $data = $this->__Xss($data);
        $checkdata = $this->Lessons_Model->checkLessonFiles($data, $id);
			
        if (!empty($_FILES['userfile']['name'])) {
	        //delete recent file from server
	        if(!empty($recent_movies)) {
		        $preview_link = dirname(__FILE__)."".$this->file_path."".$recent_movies;
		        if(file_exists($preview_link)){
			        unlink($preview_link);
		        }
	        }
	        
					//movies upload server and add database
					$movupload = $this->mainconfig->_fileUpload($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, TRUE, TRUE, FALSE);

						if(!empty($movupload['msg_error'])) {
							$this->session->set_flashdata('msg_error', $movupload['msg_error']);
							redirect('adm/portal/lessons/edit_movies/'.$id.'/'.$less_id);
						} else {
							$data['movies'] = $movupload['file_name'];
							/** Media Information **/
							$this->getID3 = new getID3;						
							$filename = $this->mov_path.$movupload['file_name'];
							$MedInfo = $this->getID3->analyze($filename);
							$this->getID3->CopyTagsToComments($MedInfo);

							$data['minute'] = $MedInfo['playtime_string'];
							$data['dimensions'] = $MedInfo['video']['resolution_x']."x".$MedInfo['video']['resolution_y'];
							$data['filesize'] = $MedInfo['filesize'];
						}
					} else {
						if ($checkdata) {
							$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
							redirect('adm/portal/lessons/edit_movies/'.$id.'/'.$less_id);
						}
					}

					$this->Lessons_Model->moviesUpdate($data, $id);
        
					$getresult = $this->Lessons_Model->getTotalLessonMinutes($less_id);
					$med_count = $this->Lessons_Model->getTotalLessonCount($less_id);

					$data = array(
						'hours' => media_duration($getresult),
						'lessons' => $med_count[0]->count_less,
					);			
					$this->Lessons_Model->lessonsUpdate($data, $less_id);
          
          $this->session->set_flashdata('msg_success', 'Your data has been update!');
          redirect('adm/portal/lessons/view/'.$less_id);

			}
		} else {
			$this->load->view('dashboard/lessons/edit_movies', $this->data);
    }
  }

  public function delete_movies($id,$lid) 
  {
		/** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Delete Movies",
		  'msg' => "",
		  'uri' => array("lessons","lessons_lists"),
		  'config' => $this->user_config,
	  );
	
	  $list = $this->Lessons_Model->getLessonsDetail($id);
	  //*** Current query value checker
	  $this->__resultEmptyChecker($id, $globalHeader,"adm/portal/instructor", $list);
	  $recent_movies = $list->movies;
 
	  //delete recent file from server
	  if(!empty($recent_movies)) {
		  $preview_link = dirname(__FILE__)."".$this->file_path."".$recent_movies;
		  if(file_exists($preview_link)){
			  unlink($preview_link);
		  }
	  }

		$this->Lessons_Model->deleteLessons($id);
	
	  $getresult = $this->Lessons_Model->getTotalLessonMinutes($lid);
		$med_count = $this->Lessons_Model->getTotalLessonCount($lid);

		$data = array(
			'hours' => media_duration($getresult),
			'lessons' => $med_count[0]->count_less,
		);			
		$this->Lessons_Model->lessonsUpdate($data, $lid);
	  
		$this->session->set_flashdata('msg_success', 'Your data has been delete!');
    redirect('adm/portal/lessons/view/'.$lid);
  }
  
  
  public function part($id)
  {

		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Lessons Part List",
			'msg' => "",
			'uri' => array("lessons","lessons_lists"),
			'config' => $this->user_config
		);
		
		$list = $this->Lessons_Model->partList($id);
		//*** Current query value checker
	  $this->__resultEmptyChecker($id, $globalHeader,"adm/portal/lessons", $list);
		$Q_list = _transfer_key_prepare(array_keys_checker($list));
		$this->data['list'] = array_transfer($list, $Q_list);
		$this->data['part_id'] = $id;
    $this->data['lessons'] = $this->Lessons_Model->getLessonsData(FALSE,$id);
		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
    
		if($_POST) {
			$this->form_validation->set_rules('name', 'part name', 'trim|required|xss_clean|min_length[3]');
      $this->form_validation->set_rules('lessons', 'lessons', 'trim|required|xss_clean');
      
			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/lessons/part', $this->data);
			} else {
				$data = array(
          'name' => $this->input->post('name'),
          'lesson_id' => $this->input->post('lessons'),
					'status' => $this->input->post('status')
				);

        $data = $this->__Xss($data);        
				$checkdata = $this->Lessons_Model->partCheck($data);

				if ($checkdata){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portal/lessons/part/'.$id);
        } else {
					$insetCheck = $this->Lessons_Model->partInsert($data);
					if($insetCheck){
						$pathtotal = $this->Lessons_Model->getTotalPath($id);
						$data = array(
							'lectures' => $pathtotal,
							'updated_at' => date('Y-m-d H:i:s'),
						);
						$this->Lessons_Model->lessonsUpdate($data, $id);
					}

					$this->session->set_flashdata('msg_success', 'Your data has been insert!');
					redirect('adm/portal/lessons/part/'.$id);
				}
			}
		} else {
			$this->load->view('dashboard/lessons/part', $this->data);
		}
  }

  public function add_part($id)
  {
    $this->part($id);
  }

  public function edit_part($id, $pid)
  {
		/** User Permission Checker **/
		$this->__permissionChecker($this->key,$this->url);
		
		$globalHeader = array(
			"alert" => $this->mainconfig->_DefaultNotic(),
			'title' => "Edit Lessons Part",
			'msg' => "",
			'uri' => array("lessons","lessons_lists"),
			'config' => $this->user_config,
		);
		
		$list = $this->Lessons_Model->partDetail($id);
		//*** Current query value checker
		$this->__resultEmptyChecker($id, $globalHeader,"adm/portal/part/".$pid, $list);
		//*** Generate necessary key and value
		$Q_list = _transfer_key_prepare(object_key_checker($list));
		$this->data['result'] = object_transfer($list, $Q_list);
		$this->data['pid'] = $pid;
		$this->data['lessons'] = $this->Lessons_Model->getLessonsData(FALSE,$pid);

		$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
		    
		if($_POST) {
			$this->form_validation->set_rules('name', 'part name', 'trim|required|xss_clean|min_length[3]');
      $this->form_validation->set_rules('lessons', 'lessons', 'trim|required|xss_clean');
      
      $this->form_validation->set_message('required', 'You must enter a %s!');
      
			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/lessons/part_edit', $this->data);
			} else {
			
        $data = array(
          'name' => $this->input->post('name'),
          'lesson_id' => $this->input->post('lessons'),
					'status' => $this->input->post('status')
				);

				$data = $this->security->xss_clean($data);
				$checkdata = $this->Lessons_Model->partCheck($data);

				if ($checkdata){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portal/lessons/edit_part/'.$id."/".$pid, $data);
        }

				$data['result'] = $this->Lessons_Model->partUpdate($data, $id);
				if($data['result']){
						$pathtotal = $this->Lessons_Model->getTotalPath($id);
						$data = array(
							'lectures' => $pathtotal,
							'updated_at' => date('Y-m-d H:i:s'),
						);
						$this->Lessons_Model->lessonsUpdate($data, $id);
					}
				
        $this->session->set_flashdata('msg_success', 'Your data has been update!');
        redirect("adm/portal/lessons/part/".$pid, $data);
			}
		} else {
			$this->load->view('dashboard/lessons/part_edit', $this->data);
		}
  }
  
  public function delete_part($id, $pid)
  {
		/** User Permission Checker **/
	  $this->__permissionChecker($this->key,$this->url);
	
	  $globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Delete Part",
		  'msg' => "",
		  'uri' => array("lessons","lessons_lists"),
		  'config' => $this->user_config,
	  );
	
	  //*** Current query value checker
	  $this->__resultEmptyChecker($id, $globalHeader,"adm/portal/lessons/part/".$pid, $globalHeader);
	
	  $partchecker = $this->Lessons_Model->getTotalPartDetail($id);
	  if(count($partchecker) > 0 ) {
		  $this->session->set_flashdata('msg_error', "Bad Request, You can't delete this data!");
		  redirect('adm/portal/lessons/part/'.$pid);
	  } else {
		  $deletepart = $this->Lessons_Model->partDelete($id);
		  if($deletepart) {
			  $pathtotal = $this->Lessons_Model->getTotalPath($pid);
			  $data = array(
				  'lectures' => $pathtotal,
				  'updated_at' => date('Y-m-d H:i:s'),
			  );
			  $this->Lessons_Model->lessonsUpdate($data, $pid);
			
			  $this->session->set_flashdata('msg_success', 'Your data has been delete!');
			  redirect('adm/portal/lessons/part/'.$pid);
		  }
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
	
	private function __generateDataSlug($key1, $key2){
		$slug1 = $this->input->ip_address();
		$slug2 = $this->upload_path;
		$key3 = date('isd');
		$genKey = $this->encryption->encrypt($slug1."".$slug2);
		$genKey = substr($genKey,0,20);
		$genKey = $key3."-".$genKey."pkt-".$key1."_".$key2;
		
		return $genKey;
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
