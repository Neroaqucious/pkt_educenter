<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor_Model extends CI_Model
{
	private $private_db = "trainer";
	private $db1 = "batch";

	// for globals header
	public function trainerList()
	{
		$this->db->select('id,name,email,phone,course,status,description,created_at,updated_at');
		$this->db->from($this->private_db);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function trainerCheck($data)
	{
		$this->db->select('name,email,phone,course,education,description,status');
		$this->db->from($this->private_db);
		$this->db->where('name', $data['name']);
		$this->db->where('email', $data['email']);
		$this->db->where('phone', $data['phone']);
		$this->db->where('course', $data['course']);
		$this->db->where('description', $data['description']);
		$this->db->where('education', $data['education']);
		$this->db->where('status', $data['status']);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function insert($data)
	{
		$this->db->insert($this->private_db, $data);
		return true;
	}

	public function trainerDetail($id)
	{
		$this->db->select('id,name,email,phone as phone_,course,education,description,status,created_at,updated_at,images');
		$this->db->where('id', $id);
		return $this->db->get($this->private_db)->row();
	}
	
	public function detail($id)
	{
		$this->db->select('id,name,email,phone as phone,course,education,description,status,created_at,updated_at,images');
		$this->db->where('id', $id);
		return $this->db->get($this->private_db)->row();
	}

	public function trainerUpdate($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update($this->private_db, $data);
		return true;
	}

	public function trainerDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->private_db);
		return true;
  }
  
  public function checkParentinstructor($id){
	  $this->db->select('id');
	  $this->db->from($this->db1);
	  $this->db->where('trainer_id', $id);
	  $query=$this->db->get();
	  return $query->result();
  }
  
}
