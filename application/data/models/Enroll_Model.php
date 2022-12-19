<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enroll_Model extends CI_Model
{
// for globals header
  private $private_db = "course";
  private $db1 = "student";
  private $db2 = "std_course";
  private $db4 = "batch";
  private $db5 = "payment";
  private $db6 = "trainer";
  private $db7 = "std_profile";
  private $db8 = "std_invoice";
  private $db9 = "lessons";
  private $db15 = "std_calendar";

  public function getBatchDetail($id)
  {
    $this->db->select('*,trainer.name, trainer.email');
    $this->db->join($this->private_db, $this->private_db.".id = ".$this->db4.".course_id", 'left');
    $this->db->join($this->db6, "".$this->db6.".id = ".$this->db4.".trainer_id", 'left');
    $this->db->where($this->db4.'.id', $id);
    return $this->db->get($this->db4)->row();
  }

  public function getLessonsDetail($cos)
  {
    $this->db->select('lectures, hours, lessons');
    $this->db->where('cos_id', $cos);
    $this->db->where('status', 1);
    return $this->db->get($this->db9)->row();
  }

  public function getCourseDetail($id)
  {
    $this->db->select('course.id,cos_title,cos_des1,cos_image,ref_key,cos_thumb');
    $this->db->where($this->private_db.'.id', $id);
    return $this->db->get($this->private_db)->row();
  }

  public function getStudentDetail($id)
  {
    $this->db->select('*');
    $this->db->join($this->db1, $this->db1.".id = ".$this->db7.".std_id", 'left');
    $this->db->where($this->db7.'.user_id', $id);
    return $this->db->get($this->db7)->row();
  }

  function fetch_payment($pay_id)
  {
      $this->db->where('slug', $pay_id);
      $this->db->where('status', '1');
      $this->db->order_by('id', 'ASC');
      $query = $this->db->get($this->db5);
      $output = '<table class="table table-bordered"></table>';
      foreach($query->result() as $row)
      {
        $output .= 
        '<table class="table table-bordered">
          <tbody>
            <tr>
              <td>ဘဏ်အကောင့်အမည်</td>
              <td>'.$row->pay_name.'</td>
            </tr>
            <tr>
              <td>ငွေပေးသွင်းရမည့်အကောင့်</td>
              <td>'.$row->reference.'</td>
            </tr>
            <tr>
              <td>အကောင့်အမည်</td>
              <td>'.$row->usr_name.'</td>
            </tr>
          </tbody>
        </table>';
      }
      return $output;
  }

  public function EnrollBatchCheck($data)
  {
    $this->db->select('std_id,bat_id,cos_id');
		$this->db->from($this->db2);
		$this->db->where('std_id', $data['std_id']);
    $this->db->where('bat_id', $data['bat_id']);
    $this->db->where('cos_id', $data['cos_id']);
		$query=$this->db->get();
		return $query->result();
  }

  public function insertBatch($data)
  {
    $this->db->insert($this->db2, $data);
    $id = $this->db->insert_id();
	  return (isset($id)) ? $id : FALSE;
  }

  public function getCourseID()
  {
    $incID = $this->db->query("SHOW TABLE STATUS LIKE 'OSL_std_invoice'");
    $last_id = $incID->row(0);
    return $last_id->Auto_increment;
  }

  public function insertInvoice($data)
  {
    $this->db->insert($this->db8, $data);
    return true;
  }

  public function getPaymentDetail($key)
  {
    $this->db->select('*');
    $this->db->where('status', '1');
    $this->db->where('slug', $key);
    return $this->db->get($this->db5)->row();
  }

  public function getPaymentList()
  {
    $this->db->select('*');
    $this->db->from($this->db5);
    $this->db->where('status', '1');
    $query=$this->db->get();
    return $query->result();
  }

  public function getStdCourse($id, $cid, $bid)
  {
	  $this->db->select('std_course.id,std_course.status,std_id,cos_id,bat_id,ref_key,slug_name');
    $this->db->join($this->private_db, $this->private_db.".id = ".$this->db2.".cos_id", 'left');
    $this->db->join($this->db4, "".$this->db4.".id = ".$this->db2.".bat_id", 'left');
	  $this->db->where('std_id', $id);
	  $this->db->where('bat_id', $bid);
	  $this->db->where('cos_id', $cid);
	  return $this->db->get($this->db2)->row();
  }

  public function getLocalClassList($id)
  {
    $this->db->select('*');
    $this->db->from($this->db15);
    $this->db->where($this->db15.'.std_id', $id);
    $query=$this->db->get();
    return $query->result();
  }

}
