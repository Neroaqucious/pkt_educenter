<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Maintain extends CI_Controller {

  private $mod = "Home_Model";

  public function __construct()
  {
    parent::__construct();
    //Custom Timezone
    ini_set('date.timezone', 'UTC');
    date_default_timezone_set('Asia/Rangoon');
  }

  public function index(){
    //global header
    $data['title'] = "Maintain";
    $data['msg']="";

    $this->load->view('maintain', $data);
  }
}
