<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model
{
// for globals header
  private $db1 = "student";
  private $db2 = "std_profile";
  private $db3 = "std_config";

  public function studentInsert($data)
	{
		$this->db->insert($this->db1, $data);
    $id = $this->db->insert_id();
    return (isset($id)) ? $id : FALSE;
	}

  public function studentDataInsert($data)
  {
    $this->db->insert($this->db2, $data);
    return true;
  }

  public function addStudentLogin($data)
  {
    $this->db->insert($this->db1, $data);
    return true;
  }

  public function checkStudentRecord($id)
  {
    $this->db->select('*');
    $this->db->from($this->db1);
    $this->db->where('id', $id);
    $query=$this->db->get();
    return $query->result();
  }

  public function getLastID()
  {
    $this->db->select('id')->order_by('id',"desc")->limit(1);
    return $this->db->get($this->db2)->row();
  }

  public function setStudentLogin($data)
  {
	  $this->db->insert($this->db3, $data);
	  $id = $this->db->insert_id();
	  return (isset($id)) ? $id : FALSE;
  }




}
