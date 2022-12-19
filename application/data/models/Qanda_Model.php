<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qanda_Model extends CI_Model
{
  protected $private_db = "q_a";

  public function getQandAList($limit, $page)
  {
    $this->db->select('*');
    $this->db->from($this->private_db);
    $this->db->where('status', '1');
    $this->db->limit($limit, $page);
    $query=$this->db->get();
    return $query->result();
  }

  public function getQandACount()
  {
    $this->db->select('*');
    $this->db->from($this->private_db);
    $this->db->where('status', '1');
    return $this->db->count_all_results();
  }

}
