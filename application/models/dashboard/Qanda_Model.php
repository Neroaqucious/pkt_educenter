<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qanda_Model extends CI_Model
{
// for globals header
  private $private_db = "q_a";

	public function qandaList()
	{
		$this->db->select('*');
		$this->db->from($this->private_db);
		$query=$this->db->get();
		return $query->result();
	}

  public function detail($id)
  {
    $this->db->select('*');
    $this->db->where('id', $id);
		return $this->db->get($this->private_db)->row();
  }
  
	public function qandaCheck($data)
	{
		$this->db->select('question,answer,status');
		$this->db->from($this->private_db);
    $this->db->where('question', $data['question']);
    $this->db->where('answer', $data['answer']);
    $this->db->where('status', $data['status']);
		$query=$this->db->get();
		return $query->result();
  }
  
	public function insert($data)
	{
		$this->db->insert($this->private_db, $data);
		return true;
	}

	public function qandaUpdate($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update($this->private_db, $data);
		return true;
	}

	public function qandaDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->private_db);
		return true;
	}
}
