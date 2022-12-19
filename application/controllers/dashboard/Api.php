<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_controller.php');
class Api extends REST_Controller
{
       public function __construct() {
               parent::__construct();
       }  
       
       public function index_get()
       {
            $id = $this->uri->segment(3);
            $query = $this->db->query("select * from `OSL_tbl_user` where user_id = $id");
            $data = $query->result();
            $this->response($data); 
            
       }

       public function user_put(){
           $id = $this->uri->segment(3);
           $data = array('name' => $this->input->get('name'),
           'pass' => $this->input->get('pass'),
           'type' => $this->input->get('type')
           );
            $r = $this->user_model->update($id,$data);
               $this->response($r); 
       }
       public function user_post(){
           $data = array('name' => $this->input->post('name'),
           'pass' => $this->input->post('pass'),
           'type' => $this->input->post('type')
           );
           $r = $this->user_model->insert($data);
           $this->response($r); 
       }
       public function user_delete(){
           $id = $this->uri->segment(3);
           $r = $this->user_model->delete($id);
           $this->response($r); 
       }
    
}
