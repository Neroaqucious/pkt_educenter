<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_Model extends CI_Model
{
    protected $tb_name1 = 'std_profile';
    protected $tb_name2 = 'feedback';
    protected $tb_name3 = 'site_config';
	protected $tb_name4 = 'precheck';
    protected $tb_name5 = 'std_course';

	//Notification For Student
    public function getStudentList()
    {
        $this->db->select('id, COUNT(id) as count');
        $this->db->from($this->tb_name1);
        $this->db->where('status', 0);
        $query=$this->db->get();
        $result = $query->result();
        return $result[0]->count;
    }

    public function getStudentCourseList()
    {
        $this->db->select('id, COUNT(id) as count');
        $this->db->from($this->tb_name5);
        $this->db->where('status', 0);
        $query=$this->db->get();
        $result = $query->result();
        return $result[0]->count;
    }

    public function getFeedbackList()
    {
        $this->db->select('id, COUNT(id) as count');
        $this->db->from($this->tb_name2);
        $this->db->where('status', 0);
        $query=$this->db->get();
        $result = $query->result();
        return $result[0]->count;
    }
	
    public function getSiteConfig()
    {
        $this->db->select('site_name, favicon, meta_tag, decimal_point, date_format, phone_format, user_session, timezone');
        return $this->db->get($this->tb_name3)->row();
    }

    public function _initial_config_checker(){
        return $this->db->count_all($this->tb_name4);
    }
}
