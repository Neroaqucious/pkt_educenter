<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_Model extends CI_Model
{
  private $db1 = "tags";
  private $db2 = "new";

// for globals header
  public function getTagsData($unselected = true)
  {
    if ($unselected === true) {
      $data = array( '' => 'Select Tags');
    }
    $this->db->select('*');
    $this->db->where('status', 1);
    $query = $this->db->get($this->db1);
    $result = $query->result();
    foreach ($result as $row) {
      $data[$row->id] = $row->name;
    }
    return $data;
  }
    
  public function getNews()
	{
    $this->db->select('new.id,title,content,photo,tags_id,new.updated_at,new.created_at,thumb,new.status,tags.name');
    $this->db->from($this->db2);
    $this->db->join($this->db1, $this->db1.'.id = '.$this->db2.'.tags_id', 'left' );
    $query=$this->db->get();
    return $query->result();
  }
    
  public function getTags()
  {
    $this->db->select('*');
    $this->db->from($this->db1);
    $query=$this->db->get();
    return $query->result();
  }

  public function getNewsDetail($id)
  {
    $this->db->select('new.id,title,content,photo,tags_id,new.updated_at,new.created_at,thumb,new.status,tags.name');
    $this->db->where($this->db2.'.id', $id);
    $this->db->join($this->db1, $this->db1.'.id = '.$this->db2.'.tags_id', 'left' );
    return $this->db->get($this->db2)->row();
  }

  public function getTagsDetail($id)
  {
    $this->db->select('*');
    $this->db->where('id', $id);
    return $this->db->get($this->db1)->row();
  }

	public function newsCheck($data, $id)
	{
    $this->db->select('title,content,tags_id,status');
    $this->db->from($this->db2);
    $this->db->where('title', $data['title']);
    $this->db->where('content', $data['content']);
    $this->db->where('tags_id', $data['tags_id']);
    $this->db->where('status', $data['status']);
    $this->db->where('id !=', $id);
    $query=$this->db->get();
    return $query->result();
  }
    
  public function tagsCheck($data)
  {
    $this->db->select('name,status');
    $this->db->from($this->db1);
    $this->db->where('name', $data['name']);
    $this->db->where('status', $data['status']);
    $query=$this->db->get();
    return $query->result();
  }

  public function tagsNameCheck($data, $id)
  {
    $this->db->select('name');
    $this->db->from($this->db1);
    $this->db->where('name', $data['name']);
    $this->db->where('id !=', $id);
    $query=$this->db->get();
    return $query->result();
  }

	public function newsInsert($data)
	{
    $this->db->insert($this->db2, $data);
    return true;
  }
  
  public function tagsInsert($data)
  {
    $this->db->insert($this->db1, $data);
    return true;
  }

  public function newsUpdate($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update($this->db2, $data);
    return true;
  }
  
  public function tagsUpdate($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update($this->db1, $data);
    return true;
  }

	public function newsDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db2);
		return true;
  }
    
  public function tagsDelete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete($this->db1);
    return true;
  }

}
