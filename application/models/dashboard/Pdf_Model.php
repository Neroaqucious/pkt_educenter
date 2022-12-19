<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_Model extends CI_Model
{
// for globals header
  private $db1 = "JLS_applicant_info";
  private $db2 = "JLS_other_details";
  private $db3 = "JLS_financial_sponsor";
  private $db4 = "JLS_educational_history";
  private $db5 = "JLS_previous_jp_lang_study";
  private $db6 = "JLS_achievement_jp_lang_test";
  private $db7 = "JLS_name_jp_lang_tests_going_to_take";
  private $db8 = "JLS_history_employment";
  private $db9 = "JLS_family_member";
  private $db10 = "JLS_family_in_japan";
  private $db11 = "JLS_previous_stay_in_japan";
  private $db12 = "JLS_other_info";

  public function getAllData($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db2, $this->db1.'.id = '.$this->db2.'.applicant_id', 'left' );
    $this->db->join($this->db3, $this->db1.'.id = '.$this->db3.'.applicant_id', 'left' );
    return $this->db->get($this->db1)->row();
  }
  public function getJLSDetail1($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db4, $this->db1.'.id = '.$this->db4.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getEduHitory($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db4, $this->db1.'.id = '.$this->db4.'.applicant_id', 'left' );
    return $this->db->get($this->db1)->row();
  }
  public function getJLSDetail2($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db5, $this->db1.'.id = '.$this->db5.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getPreJpStudy($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db5, $this->db1.'.id = '.$this->db5.'.applicant_id', 'left' );
    return $this->db->get($this->db1)->row();
  }
  public function getJLSDetail3($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db6, $this->db1.'.id = '.$this->db6.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getAchivTest($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db6, $this->db1.'.id = '.$this->db6.'.applicant_id', 'left' );
    return $this->db->get($this->db1)->row();
  }
  public function getJLSDetail4($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db7, $this->db1.'.id = '.$this->db7.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getGoingTest($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db7, $this->db1.'.id = '.$this->db7.'.applicant_id', 'left' );
    return $this->db->get($this->db1)->row();
  }
  public function getJLSDetail5($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db8, $this->db1.'.id = '.$this->db8.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getHisEmp($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db8, $this->db1.'.id = '.$this->db8.'.applicant_id', 'left' );
    return $this->db->get($this->db1)->row();
  }
  public function getJLSDetail6($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db9, $this->db1.'.id = '.$this->db9.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getJLSDetail7($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db10, $this->db1.'.id = '.$this->db10.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getFamJapan($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db10, $this->db1.'.id = '.$this->db10.'.applicant_id', 'left' );
    return $this->db->get($this->db1)->row();
  }
  public function getJLSDetail8($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db11, $this->db1.'.id = '.$this->db11.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getJLSDetail9($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db12, $this->db1.'.id = '.$this->db12.'.applicant_id', 'left' );
   return $this->db->get($this->db1)->row();
  }
}
