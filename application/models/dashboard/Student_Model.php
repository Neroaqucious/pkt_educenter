<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_Model extends CI_Model
{
  private $db1 = "student";
  private $db2 = "batch";
  private $db3 = "course";
  private $db4 = "level";
  private $db5 = "std_course";
  private $db7 = "std_note";
  private $db8 = "less_list";
  private $db9 = "lessons";
  private $db10 = "less_part";
  private $db11 = "subcategory";
  private $db12 = "std_invoice";
  private $db13 = "std_payment";
  private $db14 = "payment";
  private $db15 = "std_config";
  private $db16 = "std_profile";
  private $db17 = "std_calendar";

//For Globals select option
	public function getBatch($unselected = true)
	{
		if ($unselected === true) {
			$data = array( '' => 'Select Batch');
		}
      $this->db->select('batch.id,batch_id,course.cos_title as title, level.name as level,course.ref_key');
      $this->db->join($this->db3, $this->db3.'.id = '.$this->db2.'.course_id', 'left' );
      $this->db->join($this->db4, $this->db4.'.id = '.$this->db3.'.level_id', 'left' );
      $this->db->where($this->db2.'.status', 1);
      $query = $this->db->get($this->db2);
      $result = $query->result();
		foreach ($result as $row) {
			$data[$row->id] = $row->title." ~ ".$row->batch_id." ( ".$row->level." - ".$row->ref_key." course )";
		}
		return $data;
	}

  public function getLastID()
  {
    $incID = $this->db->query("SHOW TABLE STATUS LIKE 'OSL_student'");
    $last_id = $incID->row(0);
    return $last_id->Auto_increment;
  }

  public function getCourseID()
  {
    $incID = $this->db->query("SHOW TABLE STATUS LIKE 'OSL_std_invoice'");
    $last_id = $incID->row(0);
    return $last_id->Auto_increment;
  }

  public function getStudentPaymentID()
  {
    $incID = $this->db->query("SHOW TABLE STATUS LIKE 'OSL_std_payment'");
    $last_id = $incID->row(0);
    return $last_id->Auto_increment;
  }

  public function getBatchDetail($id)
  {
    $this->db->select('id,course_id,fees');
    $this->db->where('id', $id);
    return $this->db->get($this->db2)->row();
  }

  public function batchCheck($data)
  {
    $this->db->select('std_id,bat_id,cos_id');
		$this->db->from($this->db5);
		$this->db->where('std_id', $data['std_id']);
    $this->db->where('bat_id', $data['bat_id']);
    $this->db->where('cos_id', $data['cos_id']);
		$query=$this->db->get();
		return $query->result();
  }

  public function insertBatch($data)
  {
    $this->db->insert($this->db5, $data);
    $id = $this->db->insert_id();
	  return (isset($id)) ? $id : FALSE;
  }

  public function insertInvoice($data)
  {
    $this->db->insert($this->db12, $data);
    return true;
  }

  public function studentCourseDetail($id)
  {
    $this->db->select('std_course.id as id, bat_id,std_id,course.cos_title,std_course.activate_date,std_course.expired_date,std_course.request_date,std_course.status as status,batch.batch_id,ref_key,cos_image,slug_name,level.name as level,subcategory.name as subcategory');
    $this->db->join($this->db2, $this->db2.'.id = '.$this->db5.'.bat_id', 'left' );
    $this->db->join($this->db3, $this->db3.'.id = '.$this->db5.'.cos_id', 'left' );
    $this->db->join($this->db4, $this->db4.'.id = '.$this->db3.'.level_id', 'left' );
    $this->db->join($this->db11, $this->db11.'.id = '.$this->db3.'.subcat_id', 'left' );
    $this->db->where($this->db5.'.id', $id);
		return $this->db->get($this->db5)->row();
  }

  public function studentInvoiceDetail($id)
  {
    $this->db->select('*,student.id');
    $this->db->where($this->db12.'.std_cos_id', $id);
    $this->db->join($this->db1, $this->db1.'.id = '.$this->db12.'.std_id', 'left' );
    $this->db->join($this->db16, $this->db16.'.std_id = '.$this->db12.'.std_id', 'left' );
		return $this->db->get($this->db12)->row();
  }

  public function studentPaymentLists($id)
  {
    $this->db->select('*,std_payment.id,std_payment.description,std_payment.created_at');
    $this->db->from($this->db13);
    $this->db->join($this->db12, $this->db12.'.id = '.$this->db13.'.std_inv_id', 'left' );
    $this->db->where('std_inv_id', $id);
    $query=$this->db->get();
    return $query->result();
  }

  public function getStudentPaymentMethod($unselected = true)
	{
		if ($unselected === true) {
			$data = array( '' => 'Select Payment Method');
		}
      $this->db->select('*');
      $this->db->where($this->db14.'.status', 1);
      $query = $this->db->get($this->db14);
      $result = $query->result();
		foreach ($result as $row) {
			$data[$row->slug] = ucfirst($row->pay_name);
		}
		return $data;
	}

  public function studentPaymentCheck($data)
  {
    $this->db->select('std_inv_id,payment_id,ref_number,cash_type,total_cash,description');
		$this->db->from($this->db13);
		$this->db->where('std_inv_id', $data['std_inv_id']);
    $this->db->where('payment_id', $data['payment_id']);
    $this->db->where('ref_number', $data['ref_number']);
		$this->db->where('cash_type', $data['cash_type']);
    $this->db->where('total_cash', $data['total_cash']);
    $this->db->where('description', $data['description']);
		$query=$this->db->get();
		return $query->result();
  }

  public function insertStdPayment($data)
  {
    $this->db->insert($this->db13, $data);
    return true;
  }

  public function getStudentList()
  {
    $this->db->select('student.id,name,user_id,email,phone,address,permission,status,request_date,activate_date');
    $this->db->from($this->db1);
    $this->db->group_by('student.id');
    $this->db->join($this->db16, $this->db16.'.std_id = '.$this->db1.'.id', 'left' );
    $this->db->order_by('student.id', 'desc');
    $query=$this->db->get();
    return $query->result();
  }

  public function getStudentCourseRequest()
  {
    $this->db->select('id,std_id,status');
    $this->db->from($this->db5);
    $query=$this->db->get();
    return $query->result();
  }

  public function studentCheck($data, $id)
	{
		$this->db->select('name,phone,address,birthday,nrc,education,social,status,permission');
		$this->db->from($this->db16);
		$this->db->where('name', $data['name']);
    $this->db->where('phone', $data['phone']);
    $this->db->where('address', $data['address']);
    $this->db->where('birthday', $data['birthday']);
    $this->db->where('nrc', $data['nrc']);
    $this->db->where('education', $data['education']);
    $this->db->where('social', $data['social']);
    $this->db->where('status', $data['status']);
		$this->db->where('permission', $data['permission']);
    $this->db->where('std_id !=', $id);
		$query=$this->db->get();
		return $query->result();
  }
  
  public function studentEmailCheck($email, $id)
  {
    $this->db->from($this->db1);
    $this->db->where('email', $email);
    $this->db->where('id !=', $id);
		$query=$this->db->get();
		return $query->result();
  }

	public function studentInsert($data)
	{
    $this->db->insert($this->db1, $data);
    $id = $this->db->insert_id();
	  return (isset($id)) ? $id : FALSE;
	}

  public function studentAuthInsert($data)
	{
		$this->db->insert($this->db16, $data);
    return true;
	}

	public function studentDetail($id)
	{
    $this->db->select('student.id,user_id,name,email,phone as _phone,address,birthday,nrc,education,social,std_profile.request_date,image_file,std_profile.status,std_profile.permission');
    $this->db->join($this->db16, $this->db16.'.std_id = '.$this->db1.'.id', 'left' );
		$this->db->where($this->db1.'.id', $id);
		return $this->db->get($this->db1)->row();
  }
  
  public function studentViewDetail($id)
	{
    $this->db->select('*,student.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db16, $this->db16.'.std_id = '.$this->db1.'.id', 'left' );
		return $this->db->get($this->db1)->row();
  }

  public function CourseTotalPrice($id)
  {
    $this->db->select('total_price,std_id');
		$this->db->where($this->db12.'.std_cos_id', $id);
		return $this->db->get($this->db12)->row();
  }

  public function getStudentID($id)
  {
    $this->db->select('std_id,id');
		$this->db->where($this->db5.'.id', $id);
		return $this->db->get($this->db5)->row();
  }

  public function studentViewCourse($id)
  {
    $this->db->select('std_course.id as id,batch.id as bat_id, course.id as cos_id,course.cos_title,std_course.activate_date,std_course.expired_date,std_course.request_date,std_course.status as status,batch.batch_id,ref_key,cos_thumb');
    $this->db->from($this->db5);
    $this->db->where($this->db5.'.std_id', $id);
    $this->db->join($this->db2, $this->db2.'.id = '.$this->db5.'.bat_id', 'left' );
    $this->db->join($this->db3, $this->db3.'.id = '.$this->db2.'.course_id', 'left' );
		$query=$this->db->get();
		return $query->result();
  }

  public function studentPurchaseTotal($id)
  {
    $this->db->select('sum(total_cash) as total_cash');
    $this->db->from($this->db13);
		$this->db->where($this->db13.'.std_inv_id', $id);
		$query=$this->db->get();
		return $query->result();
  }

  public function studentViewRecord($id)
  {
    $this->db->select('*');
    $this->db->from($this->db15);
		$this->db->where($this->db15.'.std_id', $id);
    $this->db->order_by('id', 'DESC');
		$query=$this->db->get();
		return $query->result();
  }

  public function studentViewNotes($id)
  {
    $this->db->select('std_id,data_id,bat_id,less_id,note,batch_id,less_part.name,std_note.created_at,std_note.status,std_note.id,less_list.title,cos_title');
    $this->db->from($this->db7);
    $this->db->join($this->db2, $this->db2.'.id = '.$this->db7.'.bat_id', 'left' );
    $this->db->join($this->db3, $this->db3.'.id = '.$this->db7.'.cos_id', 'left' );
    $this->db->join($this->db8, $this->db8.'.id = '.$this->db7.'.data_id', 'left' );
    $this->db->join($this->db9, $this->db9.'.id = '.$this->db8.'.less_id', 'left' );
    $this->db->join($this->db10, $this->db10.'.id = '.$this->db8.'.part_id', 'left' );
		$this->db->where($this->db7.'.std_id', $id);
		$query=$this->db->get();
		return $query->result();
  }

  public function studentUpdate($data, $id)
	{
		$this->db->where('std_id', $id);
		$this->db->update($this->db16, $data);
		return true;
  }

  public function studentAuthUpdate($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update($this->db1, $data);
		return true;
  }
  
  public function Delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db1);
		return true;
	}

  public function stdConfigDelete($id)
	{
		$this->db->where('std_id', $id);
		$this->db->delete($this->db15);
		return true;
	}
    
  public function stdCourseDelete($id)
	{
		$this->db->where('std_id', $id);
		$this->db->delete($this->db5);
		return true;
	}

  public function stdInvoiceDelete($id)
	{
		$this->db->where('std_id', $id);
		$this->db->delete($this->db12);
		return true;
	}

    
  public function stdNoteDelete($id)
	{
		$this->db->where('std_id', $id);
		$this->db->delete($this->db7);
		return true;
	}

  public function stdPaymentDelete($id)
	{
		$this->db->where('std_id', $id);
		$this->db->delete($this->db13);
		return true;
	}

  public function stdAuthDelete($id)
	{
		$this->db->where('std_id', $id);
		$this->db->delete($this->db16);
		return true;
	}

  public function studentEnrollUpdate($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update($this->db5, $data);
		return true;
  }

  public function studentEnrollDelete($id)
  {
    $this->db->where('id', $id);
		$this->db->delete($this->db13);
		return true;
  }

  public function checkParentCourseInvoice($id)
	{
		$this->db->select('id');
		$this->db->from($this->db12);
		$this->db->where('std_cos_id', $id);
		$query=$this->db->get();
		return $query->result();
	}

  public function checkParentCoursePayment($id)
	{
		$this->db->select('id');
		$this->db->from($this->db13);
		$this->db->where('std_inv_id', $id);
		$query=$this->db->get();
		return $query->result();
	}

  public function studentCourseDelete($id)
  {
    $this->db->where('id', $id);
		$this->db->delete($this->db5);
		return true;
  }

  public function studentCourseEnrollDelete($id)
  {
    $this->db->where('std_cos_id', $id);
		$this->db->delete($this->db12);
		return true;
  }

  public function studentCourseTargetDate($id)
  { 
    $this->db->select('ref_key,cos_title,start_date,batch.status,month_duration,day_duration,start_time,end_time,days,batch_id,course_id,slug_name,liveclass');
    $this->db->join($this->db3, $this->db3.'.id = '.$this->db2.'.course_id', 'left' );
    $this->db->where($this->db2.'.id', $id);
    return $this->db->get($this->db2)->row();
  }

  public function insertLocalClass($data)
  {
    $this->db->insert($this->db17, $data);
    return true;
  }

  public function studentCalenderDelete($cid,$sid)
  {
    $this->db->where('std_cos_id', $cid);
    $this->db->where('std_id', $sid);
		$this->db->delete($this->db17);
		return true;
  }


// For member Auto Mail System
  public function selectAdminEmail($id)
  {
      $this->db->select('adm_profile.adm_email as email, adm_profile.adm_name as name');
      $this->db->join('adm_config', 'adm_config.adm_id = admin.id', 'left');
      $this->db->join('adm_profile', 'adm_profile.adm_id = admin.id', 'left');
      $this->db->where('admin.status', '1');
      $this->db->where('admin.id', $id);
      return $this->db->get('admin')->row();
  }

  public function selectEmailContent($key)
  {
    $this->db->select('subject, content');
    $this->db->where('def_key', $key);
    $this->db->where('status', '1');
    return $this->db->get('mail')->row();
  }



}
