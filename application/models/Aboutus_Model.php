<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Aboutus_Model extends CI_Model
{
  private $db6 = "trainer";

  public function getTrainer(){
    $this->db->select('*');
    $this->db->from($this->db6);
    $this->db->where($this->db6.'.status', '1');
    $query=$this->db->get();
    return $query->result();
  }
  
}
