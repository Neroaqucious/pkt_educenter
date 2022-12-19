<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfo extends CI_Controller
{
	private $mod = "dashboard/Portfo_Model";
	private $cof_mod = "dashboard/Config_Model";

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->model($this->mod);
		$this->load->model($this->cof_mod);
		$this->load->library('encryption');
    $this->load->library('session');
    $this->load->library('upload');

    if(empty($_SESSION['sess_admin_token']) && empty($_SESSION['sess_user_id']) && empty($_SESSION['sess_user_name']) && empty($_SESSION['sess_user_role']) && empty($_SESSION['sess_user_session']) &&empty($_SESSION['sess_admin_config'])) {
      redirect('admin/auth/login');
    }

    // Permssion defined as admin input role level and option //
    if($this->string_pos('pe_activity') === FALSE){
      $this->session->set_flashdata('msg_error', "Your aren't permission for this config!"); 
      redirect('dashboard');
    }

    //Custom Timezone
    ini_set('date.timezone', 'UTC');
    date_default_timezone_set('Asia/Rangoon');
	}

	public function index()
	{
		//global header
		$data['title'] = "Portfolies";
		$data['msg'] = "";

    //global new header
    $data['student'] = $this->Config_Model->getStudentList();
    $data['feedback'] = $this->Config_Model->getFeedbackList();

    //Define Aside bar value
    $data['uri'] = array("portfo","portfo_list");

		$data['lists'] = $this->Portfo_Model->getNews();

		foreach ($data['lists'] as $rows)
		{
			$rows->title = $this->limit_text($rows->title, 30);
		}
		$this->load->view('dashboard/portfo/list', $data);
	}


	public function view($id)
	{
		//global header
		$data['title'] = "Portfolies";
		$data['msg'] = "";

    //global new header
    $data['student'] = $this->Config_Model->getStudentList();
    $data['feedback'] = $this->Config_Model->getFeedbackList();

    //Define Aside bar value
		$data['uri'] = array("portfo","portfo_list");

		$data['result'] = $this->Portfo_Model->getNewsDetail($id);
		if(empty($id) || !is_numeric($id) || empty($data['result'])){
      $this->session->set_flashdata('msg_error', "Bad Request, Not allowed permission!");
      redirect('adm/portfo', $data);
		}
		$this->load->view('dashboard/portfo/view', $data);
	}

	public function add()
	{
		//global header
		$data['title'] = "Add Portfolies";
		$data['msg'] = "";

    //global new header
    $data['student'] = $this->Config_Model->getStudentList();
    $data['feedback'] = $this->Config_Model->getFeedbackList();

    //Define Aside bar value
    $data['uri'] = array("portfo","portfo_add");
		
		$data['tags'] = $this->Portfo_Model->getTagsData();

		if($_POST) {
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('tags', 'tags', 'trim|required');
			$this->form_validation->set_rules('userfile', 'cover photo', 'trim');

			$this->form_validation->set_message('required', 'You must enter a %s!');

			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/portfo/add', $data);
			} else {
				$data = array(
					'title' => $this->input->post('title'),
					'tags_id' => $this->input->post('tags'),
					'status' => $this->input->post('status'),
				);
				$data = $this->security->xss_clean($data);
				$checkdata = $this->Portfo_Model->newsCheck($data);

				if ($checkdata){
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portfo/add', $data);
				}

				if (!empty($_FILES['userfile']['name']))
				{
					//image upload sever and add database
					$movupload = $this->doUpload();

					if(!empty($movupload['msg_error'])) {
						$this->session->set_flashdata('msg_error', $movupload['msg_error']);
						redirect('adm/portfo/add');
					} else {
						$data['photo'] = $movupload['file_name'];
						$this->Portfo_Model->newsInsert($data);
						$this->session->set_flashdata('msg_success', 'Your data has been insert!');
						redirect('adm/portfo');
					}
				} else {
					$this->session->set_flashdata('msg_error', 'Not allow empty movies uploading! Please retrun.');
					redirect('adm/portfo');
				}
			}
		} else {
			$this->load->view('dashboard/portfo/add', $data);
		}
	}

	public function edit($id)
	{
		//global header
		$data['title'] = "Edit portfolies";
		$data['msg'] = "";

    //global new header
    $data['student'] = $this->Config_Model->getStudentList();
    $data['feedback'] = $this->Config_Model->getFeedbackList();

    //Define Aside bar value
		$data['uri'] = array("portfo","portfo_list");

		//page required
		$data['tags']=$this->Portfo_Model->getTagsData();
		$data['result'] = $this->Portfo_Model->getNewsDetail($id);

		if(empty($id) || !is_numeric($id) || empty($data['result'])){
      $this->session->set_flashdata('msg_error', "Bad Request, Not allowed permission!");
      redirect('adm/portfo', $data);
		}
		$recent_photo = $data['result']->photo;
		
		if($_POST) {
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('tags', 'tags', 'trim|required');
			$this->form_validation->set_rules('userfile', 'cover photo', 'trim');

			$this->form_validation->set_message('required', 'You must enter a %s!');

			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/portfo/edit', $data);
			} else {
				$data = array(
					'title' => $this->input->post('title'),
					'tags_id' => $this->input->post('tags'),
					'status' => $this->input->post('status'),
				);
				$data = $this->security->xss_clean($data);
				$checkdata = $this->Portfo_Model->newsCheck($data);

				if (!empty($_FILES['userfile']['name']))
				{
					//delete recent file from server
          $photolink = dirname(__FILE__)."/../../../upload/other/".$recent_photo;
          if(file_exists($photolink)){
            unlink($photolink);
					}				

					//image upload sever and add database
					$movupload = $this->doUpload();

					if(!empty($movupload['msg_error'])) {
						$this->session->set_flashdata('msg_error', $movupload['msg_error']);
						redirect('adm/portfo/edit/'.$id, $data);
					} else {
						$data['photo'] = $movupload['file_name'];
					}
				} else {
					if ($checkdata){
						$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
						redirect('adm/portfo/edit/'.$id, $data);
					}
				}

				if(empty($checkdata)) {
					$this->Portfo_Model->newsUpdate($data, $id);
					$this->session->set_flashdata('msg_success', 'Your data has been update!');
					redirect('adm/portfo');
				}
			}
		} else {
			$this->load->view('dashboard/portfo/edit', $data);
		}
	}

	public function delete($id)
	{
		//global header
		$data['title'] = "Portfolies";
		$data['msg'] = "";

    //Define Aside bar value
		$data['uri'] = array("portfo","portfo_list");

		//get recent movies data and remove file from sever
		$data['result'] = $this->Portfo_Model->getNewsDetail($id);
		$recent_photo = $data['result']->photo;

		//delete recent file from server
		$photolink = dirname(__FILE__)."/../../../upload/other/".$recent_photo;
		if(file_exists($photolink)){
			unlink($photolink);
		}
	
		$this->Portfo_Model->newsDelete($id);
		$this->session->set_flashdata('msg_success', 'Your data has been delete!');
		redirect('adm/portfo');
	}

//News and Event Tags
	public function tag()
	{
		//global header
		$data['title'] = "Portfolio";
		$data['msg'] = "";

    //global new header
    $data['student'] = $this->Config_Model->getStudentList();
    $data['feedback'] = $this->Config_Model->getFeedbackList();

    //Define Aside bar value
    $data['uri'] = array("portfo","portfo_tag");

		$data['lists'] = $this->Portfo_Model->getTags();
		$this->load->view('dashboard/portfo/tags_list', $data);
	}
	
	public function add_tag()
	{
		//global header
		$data['title'] = "Add Tags";
		$data['msg'] = "";

    //global new header
    $data['student'] = $this->Config_Model->getStudentList();
		$data['feedback'] = $this->Config_Model->getFeedbackList();

		//Define Aside bar value
		$data['uri'] = array("portfo","portfo_tag");
		
		$data['lists'] = $this->Portfo_Model->getTags();

		if($_POST) {
			$this->form_validation->set_rules('name', 'tag name', 'trim|is_unique[portfo_tags.name]|required');
			$this->form_validation->set_message('required', 'You must enter a %s!');

			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/portfo/tags_list', $data);
			} else {
				$data = array(
					'name' => strtolower($this->input->post('name')),
					'status' => $this->input->post('status'),
				);
				$data = $this->security->xss_clean($data);
			        
				$this->Portfo_Model->tagsInsert($data);
				$this->session->set_flashdata('msg_success', 'Your data has been insert!');
				redirect('adm/portfo/tag');
			}
		} else {
			$this->load->view('dashboard/portfo/tags_list', $data);
		}
	}

	public function tags_edit($id)
	{
		//global header
		$data['title'] = "Edit Tags";
		$data['msg'] = "";

    //global new header
    $data['student'] = $this->Config_Model->getStudentList();
    $data['feedback'] = $this->Config_Model->getFeedbackList();

    //Define Aside bar value
    $data['uri'] = array("portfo","portfo_tag");

		//page required
		$data['result'] = $this->Portfo_Model->getTagsDetail($id);
		if(empty($id) || !is_numeric($id) || empty($data['result'])){
      $this->session->set_flashdata('msg_error', "Bad Request, Not allowed permission!");
      redirect('adm/portfo/tag', $data);
		}

		if ($_POST) {
			$this->form_validation->set_rules('name', 'tag name', 'trim|required');
			$this->form_validation->set_message('required', 'You must enter a %s!');
			if ($this->form_validation->run() === false) {
				$this->load->view('dashboard/portfo/tags_edit', $data);
			} else {
				$data = array(
					'name' => strtolower($this->input->post('name')),
					'status' => $this->input->post('status'),
				);
				$data = $this->security->xss_clean($data);
				$checkdata = $this->Portfo_Model->tagsCheck($data);
				$check = $this->Portfo_Model->tagsNameCheck($data,$id);

				if($checkdata || $check) {
					$this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
					redirect('adm/portfo/tags_edit/'.$id, $data);
				} else {
					$this->Portfo_Model->tagsUpdate($data, $id);
					$this->session->set_flashdata('msg_success', 'Your data has been insert!');
					redirect('adm/portfo/tag');
				}
			}
		} else {
			$this->load->view('dashboard/portfo/tags_edit', $data);
		}
	}

	public function tags_delete($id)
	{
		//global header
		$data['title'] = "Tags";
		$data['msg'] = "";

	 //page required
		 $data['result'] = $this->Portfo_Model->getTagsDetail($id);
		 if(empty($id) || !is_numeric($id)){
			 $this->session->set_flashdata('msg_error', "Bad Request, Not allowed permission!");
			 redirect('adm/portfo/tag', $data);
		 }

		$this->Portfo_Model->tagsDelete($id);
		$this->session->set_flashdata('msg_success', 'Your data has been delete!');
		redirect('adm/portfo/tag');
	}

//Supply Configuration
	public function doUpload()
	{
		$config['upload_path'] = './upload/other/';
		$config['overwrite'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$config['detect_mime'] = TRUE;
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['maintain_ratio'] = FALSE;

		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('userfile'))
		{
			$data['msg_error'] = $this->upload->display_errors();
		} else {
			$config['width']= 730;
			$config['height']=410;
			$this->load->library('image_lib', $config);
			$this->image_lib->resize(); // to change size

			$data = $this->upload->data(); //data upload
		}
		return $data;
	}
	
	//Other configuration
  public function str_lower($data)
  {
    return strtolower($data);
  }

  function string_pos($find)
  {
    $session = isset($_SESSION['sess_admin_config'])?$_SESSION['sess_admin_config']:"";
    if(!empty($session)) {
      return strpos($session, $find);
    }
	}

  public function limit_text($text, $limit) 
  {
    if (strlen($text) > $limit) {
			$text = mb_substr($text, 0, $limit) . '...';
    }
    return $text;
  }
	

}
