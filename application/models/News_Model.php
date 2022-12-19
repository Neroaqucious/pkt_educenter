<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_Model extends CI_Model
{
  protected $private_db = "new";
  protected $alien_db = "tags";

  public function getNewsList($limit, $page)
  {
    $this->db->select('new.id,new.title,new.content,new.photo,new.updated_at,new.status,tags.name');
    $this->db->from($this->private_db);
    $this->db->where($this->private_db.'.status', '1');
    $this->db->join($this->alien_db, $this->alien_db.'.id = '.$this->private_db.'.tags_id', 'left' );
    $this->db->limit($limit, $page);
    $query=$this->db->get();
    return $query->result();
  }

  public function getRecentNewsList($id)
  {
    $this->db->select('new.id,new.title,new.photo,new.updated_at,tags.name');
    $this->db->from($this->private_db);
    $this->db->where($this->private_db.'.status', '1');
    $this->db->where($this->private_db.'.id !=', $id);
    $this->db->join($this->alien_db, $this->alien_db.'.id = '.$this->private_db.'.tags_id', 'left' );
    $query=$this->db->get();
    return $query->result();
  }

  public function getNewsCount()
  {
    $this->db->select('*');
    $this->db->from($this->private_db);
    $this->db->where('status', '1');
    return $this->db->count_all_results();
  }

  public function getNewsDetail($id)
  {
    $this->db->select('new.id,new.title,new.content,new.photo,new.updated_at,new.status,tags.name,');
    $this->db->where($this->private_db.'.id', $id);
    $this->db->join($this->alien_db, $this->alien_db.'.id = '.$this->private_db.'.tags_id', 'left' );
    return $this->db->get($this->private_db)->row();
  }
}
