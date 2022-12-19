<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Qanda extends CI_Controller {

  private $mod = "Qanda_Model";

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->library('encryption');
    $this->load->library('pagination');
    $this->load->database();
    $this->load->model($this->mod);

    //Custom Timezone
    ini_set('date.timezone', 'UTC');
    date_default_timezone_set('Asia/Rangoon');
  }

  public function index()
  {
    $this->page();
  }
  public function page(){
    //global header
    $data['title'] = "Question and Answer";
    $data['pass'] = [
      'qanda' => 'qanda/index'
    ];
    $data['msg']="";
    $config['base_url'] = base_url('qanda/page/');
    $config['total_rows'] = $this->Qanda_Model->getQandACount();
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
    $config['prev_link'] = '<span class="prev">≪</span>';
    $config['next_link'] = '<span class="next">≫</span>';

    $this->pagination->initialize($config);

    $data['lists'] = $this->Qanda_Model->getQandAList($config['per_page'], $page);
    $data['pagination'] = $this->pagination->create_links();
    
    $this->load->view('page/qanda', $data);
  }
}
