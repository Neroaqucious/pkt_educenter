<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lessons_Model extends CI_Model
{
	private $db1 = "lessons";
  private $db2 = "less_list";
	private $db3 = "course";
	private $db4 = "level";
	private $db5 = "trainer";
	private $db6 = "less_part";
	private $db7 = "batch";
	
// for globals header
	public function getLessonsList()
	{
		$this->db->select('lessons.id,lessons.status,lessons.created_at,lessons.updated_at,cos_title,description');
		$this->db->from($this->db1);
		$this->db->join($this->db3, $this->db3.'.id = '.$this->db1.'.cos_id', 'left');
		$query=$this->db->get();
		return $query->result();
	}

	public function getCourseList($unselected = true)
	{
		if ($unselected === true) {
			$data = array( '' => 'Select Course');
		}
		$this->db->select('id,cos_title');
		$this->db->where('status', 1);
		$this->db->where('ref_key', 'online');
		$query = $this->db->get($this->db3);
		$result = $query->result();
		foreach ($result as $row) {
			$data[$row->id] = $row->cos_title;
		}
		return $data;
	}

	public function getLessonsPartList($id,$unselected = true)
	{
		if ($unselected === true) {
			$data = array( '' => 'Select Part');
		}
		$this->db->select('id,name');
		$this->db->where('status', 1);
		$this->db->where('lesson_id', $id);
		$query = $this->db->get($this->db6);
		$result = $query->result();
		foreach ($result as $row) {
			$data[$row->id] = $row->name;
		}
		return $data;
	}

	public function getLessonsData($unselected = true, $id)
	{
		if ($unselected === true) {
			$data = array( '' => 'Select Lessons');
		}
		$this->db->select('lessons.id,cos_title');
		$this->db->join($this->db3, $this->db3.'.id = '.$this->db1.'.cos_id', 'left');
		$this->db->where($this->db1.'.status', 1);
		$this->db->where($this->db1.'.id', $id);
		$query = $this->db->get($this->db1);
		$result = $query->result();
		foreach ($result as $row) {
			$data[$row->id] = $row->cos_title;
		}
		return $data;
	}

	public function LessonsCheck($data)
	{
		$this->db->select('cos_id,status');
		$this->db->from($this->db1);
		$this->db->where('cos_id', $data['cos_id']);
		$this->db->where('status', $data['status']);
		$query=$this->db->get();
		return $query->result();
	}

	public function LessonsCourseCheck($cos_id,$id)
	{
		$this->db->select('cos_id');
		$this->db->from($this->db1);
		$this->db->where('id !=', $id);
		$this->db->where('cos_id', $cos_id);
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

	public function lessonsUpdate($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update($this->db1, $data);
		return true;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db1);
		return true;
	}
	
	public function getLessonsDetail1($id)
	{
		$this->db->select('');
		$this->db->where($this->db1.'.id', $id);
		return $this->db->get($this->db1)->row();
	}

	public function getCourseDetail($id)
	{
		$this->db->select('lessons.id,cos_id,lessons.description,lessons.updated_at,lessons.created_at,lessons.status,cos_title,level.name as level,cos_image');
		$this->db->join($this->db3, $this->db3.'.id = '.$this->db1.'.cos_id', 'left');
		$this->db->join($this->db4, $this->db4.'.id = '.$this->db3.'.level_id', 'left');
		$this->db->where($this->db1.'.id', $id);
		return $this->db->get($this->db1)->row();
	}
	
	public function getBatchDetail($id)
	{
		$this->db->select('batch.id, batch.batch_id, batch.fees, batch.member,batch.status, batch.released_date, batch.closed_date,trainer.name as trainer');
		$this->db->from($this->db7);
		$this->db->join($this->db5, $this->db5.'.id = '.$this->db7.'.trainer_id', 'left');
		$this->db->where("course_id", $id);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function getLessonsDetailList($id)
	{
		$this->db->select('less_list.id,less_id,title,desc1,movies,minute,less_list.created_at,less_list.updated_at,less_list.status,less_part.name,less_part.id as part_id');
		$this->db->from($this->db2);
		$this->db->join($this->db6, $this->db6.'.id = '.$this->db2.'.part_id', 'left');
		$this->db->where($this->db2.".less_id", $id);
		$this->db->order_by($this->db6.'.name', "asc");
		$this->db->order_by($this->db2.'.title', "asc");
		$query=$this->db->get();
		return $query->result();	
	}

	public function checkLessonFiles($data, $id = null)
	{
		$this->db->select('less_id,part_id,title,desc1,desc2,status');
		$this->db->from($this->db2);
		$this->db->where('less_id', $data['less_id']);
		$this->db->where('part_id', $data['part_id']);
		$this->db->where('title', $data['title']);
		$this->db->where('desc1', $data['desc1']);
		$this->db->where('desc2', $data['desc2']);
		$this->db->where('status', $data['status']);
		if($id != null) {
			$this->db->where($this->db2.'.id !=', $id);	
		}
		$query=$this->db->get();
		return $query->result();
	}

	public function insertLessonFiles($data)
	{
		$this->db->insert($this->db2, $data);
		return true;
	}

	public function getLessonsDetail($id)
	{
		$this->db->select('less_list.id,less_id,part_id,title,desc1,desc2,movies,minute,less_list.status');
		$this->db->join($this->db6, $this->db6.'.id = '.$this->db2.'.part_id', 'left');
		$this->db->where($this->db2.'.id', $id);
		return $this->db->get($this->db2)->row();
	}

	public function getLessonsMoviesDetail($id)
	{
		$this->db->select('less_list.id,less_id,part_id,title,desc1,desc2,movies,minute,less_list.status,less_part.name as part,lessons.description as lessons,less_list.created_at,less_list.updated_at,less_list.slug_name');
		$this->db->join($this->db6, $this->db6.'.id = '.$this->db2.'.part_id', 'left');
		$this->db->join($this->db1, $this->db1.'.id = '.$this->db2.'.less_id', 'left');
		$this->db->where($this->db2.'.id', $id);
		return $this->db->get($this->db2)->row();
	}

	public function getLessonsPartDetail($id, $part_id, $less_id)
	{
		$this->db->select('less_list.id,less_id,part_id,title,desc1,desc2,movies,minute,less_list.status,less_part.name as part,less_list.created_at,less_list.updated_at');
		$this->db->from($this->db2);
		$this->db->join($this->db6, $this->db6.'.id = '.$this->db2.'.part_id', 'left');
		$this->db->where($this->db2.'.id !=', $id);
		$this->db->where($this->db2.".part_id", $part_id);
		$this->db->where($this->db2.".less_id", $less_id);
		$query=$this->db->get();
		return $query->result();
	}

	public function moviesUpdate($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update($this->db2, $data);
		return true;
	}
	
	public function getTotalPath($id)
	{
		$this->db->select('count(lesson_id) as count_less');
		$this->db->from($this->db6);
		$this->db->where('lesson_id', $id);
		$query=$this->db->get();
		$return = $query->result();
		return $return[0]->count_less;
	}
	
	public function getTotalLessonsPath($id)
	{
		$this->db->select('less_id,minute, SUM(minute) as sumlist');
		$this->db->from($this->db2);
		$this->db->where('less_id', $id);
		$query=$this->db->get();
		$return = $query->result();
		return $return[0]->sumlist;
	}

	public function getTotalCountLessons($id)
	{
		$this->db->select('count(less_id) as count_less');
		$this->db->from($this->db2);
		$this->db->where('less_id', $id);
		$query=$this->db->get();
		$return = $query->result();
		return $return[0]->count_less;
	}
	
	public function getPartList($id)
	{
		$this->db->select('*');
		$this->db->from($this->db6);
		$this->db->where("lesson_id", $id);
		$this->db->where("status", 1);
		$query=$this->db->get();
		return $query->result();
	}

	public function deleteLessons($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db2);
		return true;
	}

	public function partList($id = Null)
	{
		$this->db->select('less_part.id,less_part.name,less_part.created_at,less_part.updated_at,less_part.status,cos_title');
		$this->db->from($this->db6);
		$this->db->join($this->db1, $this->db1.'.id = '.$this->db6.'.lesson_id', 'left');
		$this->db->join($this->db3, $this->db3.'.id = '.$this->db1.'.cos_id', 'left');
		$this->db->where('lesson_id', $id);
		$query=$this->db->get();
		return $query->result();
	}

	public function partCheck($data)
	{
		$this->db->select('lesson_id,name,status');
		$this->db->from($this->db6);
		$this->db->where('name', $data['name']);
		$this->db->where('lesson_id', $data['lesson_id']);
		$this->db->where('status', $data['status']);
		$query=$this->db->get();
		return $query->result();
	}

	public function partInsert($data)
	{
		$this->db->insert($this->db6, $data);
		return true;
	}

	public function partDetail($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		return $this->db->get($this->db6)->row();
	}

	public function partUpdate($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update($this->db6, $data);
		return true;	
	}

	public function partDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db6);
		return true;
	}
	
	public function getTotalLessonDetail($id)
	{
		$this->db->select('id');
		$this->db->from($this->db2);
		$this->db->where('less_id', $id);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function getTotalPartDetail($id)
	{
		$this->db->select('id');
		$this->db->from($this->db2);
		$this->db->where('part_id', $id);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function getTotalLessonMinutes($id)
	{
		$this->db->select('minute');
		$this->db->from($this->db2);
		$this->db->where('less_id', $id);
		$query=$this->db->get();
		return $query->result();
	}

	public function getTotalLessonCount($id)
	{
		$this->db->select('count(less_id) as count_less');
		$this->db->from($this->db2);
		$this->db->where('less_id', $id);
		$query=$this->db->get();
		return $query->result();
	}
	
}
