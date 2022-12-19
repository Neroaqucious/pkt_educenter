<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_Model extends CI_Model
{
// for globals header

  private $private_db = "level";
	private $db1 = "course";

	public function levelList()
	{
		$this->db->select('id,name,description,created_at,updated_at,status');
		$this->db->from($this->private_db);
		$query=$this->db->get();
		return $query->result();
	}

  public function detail($id)
  {
    $this->db->select('id,name,description,created_at,updated_at,status');
    $this->db->where('id', $id);
		return $this->db->get($this->private_db)->row();
  }
  
  public function levelChecks($data, $id)
	{
		$this->db->select('name,status');
		$this->db->from($this->private_db);
    $this->db->where('name', $data['name']);
    $this->db->where('status', $data['status']);
		$this->db->where('id !=', $id);
		$query=$this->db->get();
		return $query->result();
	}

	public function insert($data)
	{
		$this->db->insert($this->private_db, $data);
		return true;
	}

	public function levelUpdate($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update($this->private_db, $data);
		return true;
	}

	public function levelDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->private_db);
		return true;
	}
	
	public function checkParentlevel($id){
		$this->db->select('cos_title');
		$this->db->from($this->db1);
		$this->db->where('level_id', $id);
		$query=$this->db->get();
		return $query->result();
	}
}
