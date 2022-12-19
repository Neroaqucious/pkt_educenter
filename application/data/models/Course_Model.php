<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * course detail not complete!
 */
class Course_Model extends CI_Model
{
  private $private_db = "course";
  private $db1 = "trainer";
  private $db2 = "subcategory";
  private $db3 = "new";
  private $db4 = "batch";
	private $db5 = "std_course";
  private $db6 = "level";

// for globals header
  public function getCourseList($limit, $page)
  {
    $this->db->select('course.id,slug_name,cos_title,cos_des1,cos_image,cos_thumb,ref_key,course.status,level.name as level');
    $this->db->from($this->private_db);
    $this->db->where($this->private_db.'.status', '1');
    $this->db->join($this->db2, "".$this->db2.".id = ".$this->private_db.".subcat_id", 'left');
    $this->db->join($this->db6, "".$this->db6.".id = ".$this->private_db.".level_id", 'left');
    $this->db->limit($limit, $page);
    $this->db->where('course.status', '1');
    $query=$this->db->get();
    return $query->result();
  }

  public function getCourseCount()
  {
    $this->db->select('*');
    $this->db->from($this->private_db);
    $this->db->where('status', '1');
    return $this->db->count_all_results();
  }

  public function getCourseFilter($filter = null, $key = null)
  {
    $this->db->select('course.id,slug_name,cos_title,cos_des1,cos_image,cos_thumb,ref_key,course.status, level.name as level');
    $this->db->from($this->private_db);
    $this->db->join($this->db2, "".$this->db2.".id = ".$this->private_db.".subcat_id", 'left');
    $this->db->join($this->db6, "".$this->db6.".id = ".$this->private_db.".level_id", 'left');
    if($key != null){
      if($filter != null && $filter == "ref"){
        $this->db->where($this->private_db.'.ref_key', $key);
      } elseif($filter != null && $filter == "cat") {
        $this->db->where($this->private_db.'.subcat_id', $key);
      } elseif($filter != null && $filter == "title") {
        $this->db->like($this->private_db.'.cos_title', $key, 'both');
      }
    }
    $this->db->where($this->private_db.".status", 1);
    $query=$this->db->get();
    return $query->result();
  }

  public function getCourseDetail($slug)
  {
    $this->db->select('course.id,cos_title,cos_des1,cos_image,ref_key,slug_name,course.created_at,course.status,subcategory.name as subcategory,subcat_id,level.id as level_id,level.name as level');
    $this->db->join($this->db2, "".$this->db2.".id = ".$this->private_db.".subcat_id", 'left');
    $this->db->join($this->db6, "".$this->db6.".id = ".$this->private_db.".level_id", 'left');
    $this->db->where($this->private_db.'.slug_name', $slug);
    $this->db->where($this->private_db.'.status', '1');
    return $this->db->get($this->private_db)->row();
  }

  public function getCurrentUserBatch($id, $slug)
  {
    $this->db->select('std_course.id,bat_id,std_course.status,slug_name,std_course.status');
    $this->db->join($this->private_db, "".$this->private_db.".id = ".$this->db5.".cos_id", 'left');
	  $this->db->where('std_id', $id);
    $this->db->where($this->private_db.'.slug_name', $slug);
	  return $this->db->get($this->db5)->row();
  }


  public function getRelatCourse($id, $sub, $level)
  {
    $this->db->select('course.id,cos_title,slug_name,cos_des1,cos_image,cos_thumb,ref_key,course.created_at,subcategory.name as subcategory,subcat_id, level.name as level');
    $this->db->from($this->private_db);
    $this->db->join($this->db2, "".$this->db2.".id = ".$this->private_db.".subcat_id", 'left');
    $this->db->join($this->db6, "".$this->db6.".id = ".$this->private_db.".level_id", 'left');
    $this->db->where($this->private_db.'.status', '1');
    $this->db->where($this->private_db.'.id !=', $id);
    $this->db->where($this->private_db.'.subcat_id', $sub);
    $this->db->where($this->private_db.'.level_id', $level);
    $query=$this->db->get();
    return $query->result();
  }

  public function getBatchList($id)
  {
    $this->db->select('*,batch.description,batch.id');
    $this->db->from($this->db4);
    $this->db->join($this->db1, "".$this->db1.".id = ".$this->db4.".trainer_id", 'left');
    $date = date("Y-m-d H:i:s");
    $array = array($this->db4.'.status' => 1, $this->db4.'.course_id' => $id, 'released_date <' => $date, 'closed_date >' => $date);
    $this->db->where($array);
    $query=$this->db->get();
    return $query->result();
  }

  public function getSubCategoryList()
  {
    $this->db->select('id,name');
    $this->db->from($this->db2);
    $this->db->where('status', '1');
    $query=$this->db->get();
    return $query->result();
  }

  public function getNewsList()
  {
    $this->db->select('id,title,photo,updated_at');
    $this->db->from($this->db3);
    $this->db->where('status', '1');
    $this->db->order_by('id', 'desc');
    $this->db->limit(4);
    $query=$this->db->get();
    return $query->result();
  }

  public function getEnrollBatch($sid, $cid){
	  $this->db->select('std_id,bat_id,cos_id');
	  $this->db->from($this->db5);
	  $this->db->where('std_id', $sid);
	  $this->db->where('cos_id', $cid);
	  $query=$this->db->get();
	  return $query->result();
  }

}
