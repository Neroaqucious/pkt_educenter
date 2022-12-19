<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contactus_Model extends CI_Model
{
  private $privated_db = "feedback";

  public function insert($data)
  {
      $this->db->insert($this->privated_db, $data);
      return true;
  }

}
