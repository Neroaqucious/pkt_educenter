<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Model extends CI_Model
{
  private $db1 = "student";
  private $db2 = "std_course";
  private $db3 = "course";
  private $db4 = "trainer";
  private $db5 = "std_profile";
  private $db6 = "std_payment";
  
// for globals header
  public function getStudentCount()
  {
    $this->db->select('*');
    $this->db->from($this->db5);
    $query=$this->db->get();
    return $query->num_rows();
  }

  public function getCourseCount()
  {
    $this->db->select('*');
    $this->db->from($this->db2);
    $query=$this->db->get();
    return $query->num_rows();
  }

  public function getTotalCashCount()
  {
    $query = $this->db->query('select year(created_at) as year, month(created_at) as month, day(created_at) as day, sum(total_cash) as total_amount from OSL_std_payment group by year(created_at), month(created_at), day(created_at)');   
    return $query->result(); 
  }

  public function getInstructorListCount()
  {
    $this->db->select('*');
    $this->db->from($this->db4);
    $query=$this->db->get();
    return $query->num_rows();
  }

  public function getStudentListCount()
  {
    $this->db->select('std_id,user_id as student_id,student.id,name,email,phone,address,status,std_profile.request_date');
    $this->db->from($this->db5);
    $this->db->join($this->db1, $this->db1.'.id = '.$this->db5.'.std_id', 'left' );
    $this->db->order_by('id','desc')->limit(4);
    $query=$this->db->get();
    return $query->result();
  }

  public function getMonthlyRecord()
  {
    $this->db->select('DATE_FORMAT(request_date,"%b") as month,count(id) as std_count');
    $this->db->group_by('month');
    $this->db->from($this->db5);
    $this->db->where('YEAR(request_date)', 2021);
    $this->db->order_by('month','asc');
    $query=$this->db->get();
    return $query->result();
  }

}
