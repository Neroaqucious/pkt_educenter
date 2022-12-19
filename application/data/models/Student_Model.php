<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_Model extends CI_Model
{
// for globals header
  private $db1 = "student";
  private $db2 = "std_course";
  private $db3 = "course";
  private $db4 = "batch";
  private $db5 = "trainer";
  private $db6 = "level";
  private $db7 = "lessons";
  private $db8 = "less_part";
  private $db9 = "less_list";
  private $db10 = "std_note";
  private $db11 = "std_profile";
  private $db12 = "std_config";
  private $db13 = "std_invoice";
  private $db14 = "std_payment";
  private $db15 = "std_calendar";
  private $db16 = "payment";

  public function getStudentBatchList($limit, $page, $id)
  {
    $this->db->select('std_course.id,std_id,bat_id,cos_id,std_course.activate_date,std_course.status,cos_title,cos_image,ref_key,batch_id,days,start_time,end_time,month_duration,day_duration,start_date,liveclass,batch.released_date,slug_name,trainer.name as trainer,fees');
    $this->db->from($this->db2);
    $this->db->join($this->db3, $this->db3.'.id = '.$this->db2.'.cos_id', 'left' );    
    $this->db->join($this->db4, $this->db4.'.id = '.$this->db2.'.bat_id', 'left' );
    $this->db->join($this->db5, $this->db5.'.id = '.$this->db4.'.trainer_id', 'left' );
    $this->db->limit($limit, $page);
    $this->db->where($this->db2.'.std_id', $id);
    $this->db->order_by($this->db2.'.id', "desc");
    $query=$this->db->get();
    return $query->result();
  }

  public function getStudentBatchCount($id)
  {
    $this->db->select('*');
    $this->db->from($this->db2);
    $this->db->where('std_id', $id);
    return $this->db->count_all_results();
  }

  public function getstudentDetail($id)
  {
    $this->db->select('*, user_id as student_id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db11, $this->db11.'.std_id = '.$this->db1.'.id', 'left');
		return $this->db->get($this->db1)->row();
  }

  public function studentCheck($data, $id)
	{
		$this->db->select('name,phone,address,birthday,nrc,education,social');
		$this->db->from($this->db11);
		$this->db->where('name', $data['name']);
    $this->db->where('address', $data['address']);
		$this->db->where('phone', $data['phone']);
    $this->db->where('birthday', $data['birthday']);
    $this->db->where('nrc', $data['nrc']);
    $this->db->where('education', $data['education']);
    $this->db->where('social', $data['social']);
    $this->db->where('id !=', $id);
		$query=$this->db->get();
		return $query->result();
  }

  public function studentUpdate($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update($this->db1, $data);
		return true;
  }

  public function studentAuthUpdate($data, $id)
  {
    $this->db->where('id', $id);
		$this->db->update($this->db11, $data);
		return true;
  }

  public function getStudentBatchDetail($b_id,$std_id, $course)
  {
    $this->db->select('std_course.id,std_id,bat_id,cos_id,std_course.status,liveclass,course.cos_des1 as course_description,batch.description as batch_description,cos_title,slug_name,subcat_id,trainer_id,cos_image,ref_key,level.name as level,trainer.name as trainer,email,month_duration,day_duration,start_time,end_time,start_date,days,member,unlimited,batch_id,fees');
    $this->db->join($this->db3, $this->db3.'.id = '.$this->db2.'.cos_id', 'left' );
    $this->db->join($this->db4, $this->db4.'.id = '.$this->db2.'.bat_id', 'left' );
    $this->db->join($this->db5, $this->db5.'.id = '.$this->db4.'.trainer_id', 'left' );
    $this->db->join($this->db6, $this->db6.'.id = '.$this->db3.'.level_id', 'left' );
    $this->db->where($this->db2.'.id', $b_id);
    $this->db->where($this->db2.'.std_id', $std_id);
    $this->db->where($this->db3.'.slug_name', $course);
    return $this->db->get($this->db2)->row();
  }

  public function getLessonsListByCourse($id)
	{
		$this->db->select('lessons.id,cos_id,lessons.description as lessons_description,lessons.updated_at,lessons.status,cos_title,level.name as level,lectures,hours,lessons');
		$this->db->join($this->db3, $this->db3.'.id = '.$this->db7.'.cos_id', 'left');
		$this->db->join($this->db6, $this->db6.'.id = '.$this->db3.'.level_id', 'left');
		$this->db->where($this->db7.'.cos_id', $id);
		return $this->db->get($this->db7)->row();
  }

  public function getLessonsListByOnlineCourse($id, $sid)
  {
    $this->db->select('*');
    $this->db->join($this->db2, $this->db2.'.id = '.$this->db15.'.std_cos_id', 'left');
    $this->db->where($this->db15.'.std_cos_id', $id);
    $this->db->where($this->db15.'.std_id', $sid);
		return $this->db->get($this->db15)->row();
  }

  public function getLessonsDetailList($id)
	{
		$this->db->select('less_list.id,less_id,title,desc1,movies,minute,less_list.updated_at,less_list.status,less_part.name,less_part.id as part_id,slug_name');
		$this->db->from($this->db9);
		$this->db->join($this->db8, $this->db8.'.id = '.$this->db9.'.part_id', 'left');
		$this->db->where($this->db9.".less_id", $id);
		$this->db->order_by($this->db8.'.name', "asc");
    $this->db->order_by($this->db9.'.title', "asc");
    $this->db->where($this->db9.".status", 1);
		$query=$this->db->get();
		return $query->result();	
  }

  public function getPartList($id)
	{
		$this->db->select('*');
    $this->db->from($this->db8);
		$this->db->where("lesson_id", $id);
		$query=$this->db->get();
		return $query->result();
  }

  public function getPartDetail($id)
  {
    $this->db->select('less_list.part_id, count(less_id) as count_less');
    $this->db->from($this->db9);
    $this->db->where("less_id", $id);
    $this->db->group_by('part_id');
		$query=$this->db->get();
		return $query->result();
  }
  
  public function getLessonsDetail($slug)
	{
		$this->db->select('less_list.id,less_id,part_id,title,desc1,desc2,movies,minute,less_list.status,less_part.name as part,lessons.description as lessons,less_list.updated_at');
		$this->db->join($this->db8, $this->db8.'.id = '.$this->db9.'.part_id', 'left');
		$this->db->join($this->db7, $this->db7.'.id = '.$this->db9.'.less_id', 'left');
		$this->db->where($this->db9.'.slug_name', $slug);
		return $this->db->get($this->db9)->row();
	}

  public function getRelatedLessonsDetail($id, $part_id, $less_id)
	{
		$this->db->select('less_list.id,less_id,part_id,title,desc1,desc2,movies,minute,less_list.status,less_part.name as part,less_list.updated_at,slug_name');
		$this->db->from($this->db9);
		$this->db->join($this->db8, $this->db8.'.id = '.$this->db9.'.part_id', 'left');
		$this->db->where($this->db9.'.id !=', $id);
		$this->db->where($this->db9.".part_id", $part_id);
		$this->db->where($this->db9.".less_id", $less_id);
		$query=$this->db->get();
		return $query->result();
  }

  public function getLessonsListByLessons($id)
	{
		$this->db->select('lessons.id,cos_id,lessons.description,lessons.updated_at,lessons.status,cos_title,level.name as level,cos_thumb');
		$this->db->join($this->db3, $this->db3.'.id = '.$this->db7.'.cos_id', 'left');
		$this->db->join($this->db6, $this->db6.'.id = '.$this->db3.'.level_id', 'left');
		$this->db->where($this->db7.'.id', $id);
		return $this->db->get($this->db7)->row();
  }
  
  public function studentNoteDetail($std_id, $data_id)
  {
    $this->db->select('*');
		$this->db->where("std_id", $std_id);
		$this->db->where("data_id", $data_id);
		return $this->db->get($this->db10)->row();
  }
  
  public function studentBatchDetail($std_id, $cos_id)
  {
    $this->db->select('bat_id');
    $this->db->where('std_id', $std_id);
    $this->db->where('cos_id', $cos_id);
		return $this->db->get($this->db2)->row();
  }
  
  public function studentLessonDetail($id)
  {
    $this->db->select('*');
		$this->db->where("id", $id);
		return $this->db->get($this->db9)->row();
  }

  public function studentNoteUpdate($std_id, $data_id, $data)
  {
    $this->db->where('std_id', $std_id);
    $this->db->where('data_id', $data_id);
		$this->db->update($this->db10, $data);
		return true;
  }

  public function studentNoteInsert($data)
  {
    $this->db->insert($this->db10, $data);
    return true;
  }

  public function getStudentPermission($id)
  {
    $this->db->select('permission,status');
		$this->db->where("id", $id);
		return $this->db->get($this->db11)->row();
  }

/** Purchase history */
  public function getStudentPurchaseCount($id)
  {
    $this->db->select('*');
    $this->db->from($this->db14);
    $this->db->where('std_id', $id);
    return $this->db->count_all_results();
  }

  public function getStudentPurchaseList($limit, $page, $id)
  {
    $this->db->select('std_payment.id,std_payment.std_id,payment_id,bat_id,cos_id,std_course.status,cos_title,batch_id,invoice_number,total_cash,std_payment.created_at');
    $this->db->from($this->db14);
    $this->db->join($this->db13, $this->db13.'.id = '.$this->db14.'.std_inv_id', 'left' ); 
    $this->db->join($this->db2, $this->db2.'.id = '.$this->db13.'.std_cos_id', 'left' ); 
    $this->db->join($this->db3, $this->db3.'.id = '.$this->db2.'.cos_id', 'left' );    
    $this->db->join($this->db4, $this->db4.'.id = '.$this->db2.'.bat_id', 'left' );
    $this->db->limit($limit, $page);
    $this->db->where($this->db14.'.std_id', $id);
    $this->db->order_by($this->db14.'.id', "desc");
    $query=$this->db->get();
    return $query->result();
  }

  public function getStudentBrachChecker($lid, $slug, $logid)
  {
    $this->db->select('csrf_token_key,csrf_slug_key,less_list.slug_name');
		$this->db->join($this->db7, $this->db7.'.id = '.$this->db9.'.less_id', 'left');
    $this->db->join($this->db3, $this->db3.'.id = '.$this->db7.'.cos_id', 'left');
    $this->db->join($this->db2, $this->db2.'.cos_id = '.$this->db3.'.id', 'left');
    $this->db->join($this->db12, $this->db12.'.std_id = '.$this->db2.'.std_id', 'left');
		$this->db->where($this->db12.'.id', $logid);
		$this->db->where($this->db9.".slug_name", $slug);
		$this->db->where($this->db9.".less_id", $lid);
    return $this->db->get($this->db9)->row();
  }

  public function getLocalClassList($id)
  {
    $this->db->select('*');
    $this->db->from($this->db15);
    $this->db->where($this->db15.'.std_id', $id);
    $query=$this->db->get();
    return $query->result();
  }

  public function getPaymentList($std, $cid, $bid)
  {
    $this->db->select('pay_name,reference,usr_name,total_price');

    $this->db->join($this->db13, $this->db13.'.std_cos_id = '.$this->db2.'.id', 'left' );
    $this->db->join($this->db16, $this->db16.'.slug = '.$this->db13.'.pay_type', 'left' );
    $this->db->where($this->db2.'.std_id', $std);
    $this->db->where($this->db2.'.cos_id', $cid);
    $this->db->where($this->db2.'.bat_id', $bid);
    return $this->db->get($this->db2)->row();
  }
  
}
