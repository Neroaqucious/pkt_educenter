<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_Model extends CI_Model
{
  private $private_db = "feedback";

// for globals header
  public function feedbackList()
  {
    $this->db->select('*');
    $this->db->from($this->private_db);
    $query = $this->db->get();
    return $query->result();
  }

  public function feedbackDetail($id)
  {
    $this->db->select('*');
    $this->db->where('id', $id);
    return $this->db->get($this->private_db)->row();
  }

  public function feedbackUpdate($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update('feedback', $data);
    return true;
  }

  public function feedbackDelete($id)
  {
    $this->db->where('id', $id);
		$this->db->delete($this->private_db);
		return true;
  }
}
