<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch_Model extends CI_Model
{
  private $db1 = "batch";
  private $db2 = "level";
  private $db3 = "course";
  private $db4 = "trainer";
  private $db5 = "student";
  private $db6 = "std_course";
  private $db7 = "std_profile";
  
// for globals header 
  public function getCourse($unselected = true)
  {
    if ($unselected === true) {
      $data = array( '' => 'Select Course');
    }
    $this->db->where('status', 1);
    $query = $this->db->get($this->db3);
    $result = $query->result();
    foreach ($result as $row) {
      $data[$row->id] = $row->cos_title;
    }
    return $data;
  }
	
	public function getTriner($unselected = true)
	{
		if ($unselected === true) {
			$data = array( '' => 'Select instructor');
		}
		$this->db->where('status', 1);
		$query = $this->db->get($this->db4);
		$result = $query->result();
		foreach ($result as $row) {
			$data[$row->id] = $row->name;
		}
		return $data;
	}

  public function fetch_course($key)
  {
    $this->db->where('ref_key', $key);
    $this->db->order_by('id', 'ASC');
    $query = $this->db->get($this->db3);
    $output = '<option value="">Select Course</option>';
    $select = 'selected';
    foreach($query->result() as $row)
    {
    $output .= 
    '<option value="'.$row->id.'" '.((isset($subcategory) && $subcategory == $row->id) 
    ?"$select":"").'>'.$row->cos_title.'</option>';
    }
    return $output;
  }

  public function getLastID()
  {
    $this->db->select('id')->order_by('id',"desc")->limit(1);
    return $this->db->get($this->db1)->row();
  }

	public function getBatchList($key)
	{
		$this->db->select('batch_id,fees,member,month_duration,day_duration,start_date,batch.released_date,batch.closed_date,batch.id,course.cos_title as title,liveclass,course.ref_key,batch.status');
    $this->db->from($this->db1);
    $this->db->join($this->db3, $this->db3.'.id = '.$this->db1.'.course_id', 'left');
    $this->db->order_by($this->db1.'.id', 'DESC');
    $this->db->where('ref_key', $key);
		$query=$this->db->get();
		return $query->result();
  }

  public function getBatchDetailList($id)
	{
		$this->db->select('batch.id,batch_id,remark,course_id,month_duration,day_duration,end_time,fees,member,days,liveclass,start_time,start_date,unlimited,batch.released_date,batch.closed_date,batch.status,course.ref_key,cos_title,cos_image,cos_thumb,level.name as level,trainer.name as trainer,trainer.email as email,trainer.id as trainer_id,batch.description');
    $this->db->join($this->db3, $this->db3.'.id = '.$this->db1.'.course_id', 'left');
    $this->db->join($this->db2, $this->db2.'.id = '.$this->db3.'.level_id', 'left');
    $this->db->join($this->db4, $this->db4.'.id = '.$this->db1.'.trainer_id', 'left');
		$this->db->where($this->db1.'.id', $id);
		return $this->db->get($this->db1)->row();
  }

  public function getStudentLists($id)
  {
    $this->db->select('student.id as std_id, user_id as student_id,name,email,phone,std_profile.request_date,std_profile.activate_date, std_profile.status, image_file');
    $this->db->from($this->db6);
    $this->db->join($this->db5, $this->db5.'.id = '.$this->db6.'.std_id', 'left');
    $this->db->join($this->db7, $this->db7.'.std_id = '.$this->db6.'.std_id', 'left');
    $this->db->order_by($this->db6.'.request_date', 'DESC');
    $this->db->where($this->db6.'.bat_id', $id);
		$query=$this->db->get();
		return $query->result();
  }

  public function batchCheck($data)
	{
		$this->db->select('batch_id,course_id,liveclass,trainer_id,description,fees,member,month_duration,day_duration,unlimited,start_time,end_time,days,start_date,remark,status,released_date,closed_date');
		$this->db->from($this->db1);
		$this->db->where('batch_id', $data['batch_id']);
		$this->db->where('course_id', $data['course_id']);
		$this->db->where('trainer_id', $data['trainer_id']);
    $this->db->where('description', $data['description']);
    $this->db->where('fees', $data['fees']);
    $this->db->where('member', $data['member']);
		$this->db->where('month_duration', $data['month_duration']);
    $this->db->where('day_duration', $data['day_duration']);
    $this->db->where('unlimited', $data['unlimited']);
    $this->db->where('liveclass', $data['liveclass']);
    $this->db->where('start_time', $data['start_time']);
    $this->db->where('end_time', $data['end_time']);
    $this->db->where('days', $data['days']);
    $this->db->where('start_date', $data['start_date']);
    $this->db->where('remark', $data['remark']);
    $this->db->where('status', $data['status']);
    $this->db->where('released_date', $data['released_date']);
    $this->db->where('closed_date', $data['closed_date']);
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
		$this->db->select('batch_id,remark,course_id,trainer_id,start_time,end_time,days,batch.description,fees,member,month_duration,day_duration,liveclass,start_date,unlimited,batch.released_date,batch.closed_date,batch.id,course.ref_key,batch.status');
    $this->db->join($this->db3, $this->db3.'.id = '.$this->db1.'.course_id', 'left');
		$this->db->where($this->db1.'.id', $id);
		return $this->db->get($this->db1)->row();
  }
  
  public function batchUpdate($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update($this->db1, $data);
		return true;
  }

	public function batchDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db1);
		return true;
	}
	
	public function getTotalStudentDetail($id)
	{
		$this->db->select('*');
		$this->db->from($this->db6);
		$this->db->where("bat_id", $id);
		$query=$this->db->get();
		return $query->result();
	}
}
