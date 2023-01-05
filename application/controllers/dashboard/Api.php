<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_controller.php');
class Api extends REST_Controller
{
  private $db1 = "JLS_applicant_info";
  private $db2 = "JLS_other_details";
  private $db3 = "JLS_financial_sponsor";
  private $db4 = "JLS_educational_history";
  private $db5 = "JLS_previous_jp_lang_study";
  private $db6 = "JLS_achievement_jp_lang_test";
  private $db7 = "JLS_name_jp_lang_tests_going_to_take";
  private $db8 = "JLS_history_employment";
  private $db9 = "JLS_family_member";
  private $db10 = "JLS_family_in_japan";
  private $db11 = "JLS_previous_stay_in_japan";
  private $db12 = "JLS_other_info";
  private $db20 = "JLS_ever_been_japan";

       public function __construct() {
               parent::__construct();
       }  
       
       public function index_get()
       {
            $id = $this->uri->segment(3);
            $this->db->select('*,JLS_applicant_info.id');
            $this->db->where($this->db1.'.id', $id);
            $query = $this->db->get($this->db1);
            $data['applicant_info'] = $query->result();

            $this->db->select('*,'.$this->db2.'.id');
            $this->db->where($this->db2.'.applicant_id', $id);
            $query2= $this->db->get($this->db2);
            $data['other_details'] = $query2->result();

            $this->db->select('*,'.$this->db3.'.id');
            $this->db->where($this->db3.'.applicant_id', $id);
            $query3= $this->db->get($this->db3);
            $data['financial_sponsor'] = $query3->result();

            $this->db->select('*,'.$this->db4.'.id');
            $this->db->where($this->db4.'.applicant_id', $id);
            $query4= $this->db->get($this->db4);
            $data['educational_history'] = $query4->result();

            $this->db->select('*,'.$this->db5.'.id');
            $this->db->where($this->db5.'.applicant_id', $id);
            $query5= $this->db->get($this->db5);
            $data['previous_jp_lang_study'] = $query5->result();

            $this->db->select('*,'.$this->db6.'.id');
            $this->db->where($this->db6.'.applicant_id', $id);
            $query6= $this->db->get($this->db6);
            $data['achievement_jp_lang_test'] = $query6->result();

            $this->db->select('*,'.$this->db7.'.id');
            $this->db->where($this->db7.'.applicant_id', $id);
            $query7= $this->db->get($this->db7);
            $data['name_jp_lang_tests_going_to_take'] = $query7->result();

            $this->db->select('*,'.$this->db8.'.id');
            $this->db->where($this->db8.'.applicant_id', $id);
            $query8= $this->db->get($this->db8);
            $data['history_employment'] = $query8->result();

            $this->db->select('*,'.$this->db9.'.id');
            $this->db->where($this->db9.'.applicant_id', $id);
            $query9= $this->db->get($this->db9);
            $data['family_member'] = $query9->result();

            $this->db->select('*,'.$this->db10.'.id');
            $this->db->where($this->db10.'.applicant_id', $id);
            $query10= $this->db->get($this->db10);
            $data['family_in_japan'] = $query10->result();
            
            $this->db->select('*,'.$this->db11.'.id');
            $this->db->where($this->db11.'.applicant_id', $id);
            $query11= $this->db->get($this->db11);
            $data['previous_stay_in_japan'] = $query11->result();

            $this->db->select('*,'.$this->db12.'.id');
            $this->db->where($this->db12.'.applicant_id', $id);
            $query12= $this->db->get($this->db12);
            $data['other_info'] = $query12->result();

            $this->db->select('*,'.$this->db20.'.id');
            $this->db->where($this->db20.'.applicant_id', $id);
            $query20= $this->db->get($this->db20);
            $data['ever_been_japan'] = $query20->result();
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
