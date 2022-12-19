<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Model extends CI_Model
{
// for globals header
	private $private_db = "course";
	private $db1 = "batch";
	private $db4 = "new";
	private $db5 = "tags";
	private $db6 = "trainer";
	private $db7 = "level";

	public function getCourse()
	{
		$today = date('Y-m-d H:i:s');
		$this->db->select('batch.id,course_id,batch_id,fees,days,start_time,end_time,month_duration,day_duration,start_date,liveclass,batch.status,batch.released_date,batch.closed_date,course.cos_des1,course.slug_name,course.cos_title,course.cos_image,course.ref_key,course.status as cos_status,level.name as level,trainer.name as trainer');
		$this->db->from($this->db1);
		$this->db->join($this->private_db, "".$this->private_db.".id = ".$this->db1.".course_id", 'left');
		$this->db->join($this->db6, "".$this->db6.".id = ".$this->db1.".trainer_id", 'left');
		$this->db->join($this->db7, "".$this->db7.".id = ".$this->private_db.".level_id", 'left');
		$date = date("Y-m-d H:i:s");
    $array = array('released_date <' => $date, 'closed_date >' => $date);
		$this->db->where($this->private_db.'.status', '1');
		$this->db->where($this->db1.'.released_date <', $today);
		$this->db->where($this->db1.'.closed_date >', $today);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function getTrainer(){
		$this->db->select('*');
		$this->db->from($this->db6);
		$this->db->where($this->db6.'.status', '1');
		$query=$this->db->get();
		return $query->result();
	}
			
	public function getNews()
	{
		$this->db->select('*,new.id as id');
		$this->db->from($this->db4);
		$this->db->join($this->db5, "".$this->db5.".id = ".$this->db4.".tags_id", 'left');
		$this->db->where($this->db4.'.status', '1');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function getQandAList()
	{
		$this->db->select('question,answer');
		$this->db->from('q_a');
		$this->db->where('status', '1');
		$this->db->limit(3);
		$this->db->order_by('id','DESC');
		$query=$this->db->get();
		return $query->result();
	}

	public function getEventList()
	{
		$this->db->select('id,title,content,photo,key_value,upload_date');
		$this->db->from('event_news');
		$this->db->where('status', '1');
		$this->db->limit(2);
		$this->db->order_by('id','DESC');
		$query=$this->db->get();
		return $query->result();
	}
}
