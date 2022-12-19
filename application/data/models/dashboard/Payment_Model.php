<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_Model extends CI_Model
{
  private $db1 = "payment";
  
  public function getPayments()
  {
    $this->db->select('*');
    $this->db->from($this->db1);
    $query=$this->db->get();
    return $query->result();
  }

  public function getPaymentDetail($id)
  {
    $this->db->select('*');
    $this->db->where('id', $id);
    return $this->db->get($this->db1)->row();
  }

  public function paymentInsert($data)
  {
    $this->db->insert($this->db1, $data);
    return true;
  }
  
  public function paymentCheck($data, $id)
	{
    $this->db->select('pay_name,usr_name,pay_type,reference,slug,fees,status');
    $this->db->from($this->db1);
    $this->db->where('pay_name', $data['pay_name']);
    $this->db->where('usr_name', $data['usr_name']);
    $this->db->where('pay_type', $data['pay_type']);
    $this->db->where('reference', $data['reference']);
    $this->db->where('slug', $data['slug']);
    $this->db->where('fees', $data['fees']);
    $this->db->where('status', $data['status']);
    $this->db->where('id !=', $id);
    $query=$this->db->get();
    return $query->result();
  }

  public function paymentUpdate($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update($this->db1, $data);
    return true;
  }

  public function paymentDelete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete($this->db1);
    return true;
  }

}
