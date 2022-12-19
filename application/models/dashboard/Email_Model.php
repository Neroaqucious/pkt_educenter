<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_Model extends CI_Model
{
// for globals select option
	private $db1 = "mail";
	
	public function emailList()
	{
		$this->db->select('*');
		$this->db->from($this->db1);
		$query=$this->db->get();
		return $query->result();
	}

	public function emailCheck($data)
	{
		$this->db->select('subject,content,status,def_key');
		$this->db->from($this->db1);
		$this->db->where('subject', $data['subject']);
		$this->db->where('content', $data['content']);
		$this->db->where('def_key', $data['def_key']);
		$this->db->where('status', $data['status']);
		$query=$this->db->get();
		return $query->result();
	}

	public function emailRefKeyCheck($id, $key)
	{
		$this->db->select('id,def_key');
		$this->db->from($this->db1);
		$this->db->where('id !=', $id);
		$this->db->where('def_key', $key);
		$query=$this->db->get();
		return $query->result();
	}

	public function insert($data)
	{
		$this->db->insert($this->db1, $data);
		return true;
	}

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		return $this->db->get($this->db1)->row();
	}

	public function emailUpdate($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update($this->db1, $data);
		return true;
	}

	public function emailDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db1);
		return true;
	}

}
