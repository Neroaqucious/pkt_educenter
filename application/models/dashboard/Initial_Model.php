<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Initial_Model extends CI_Model
	{
		private $admin = "admin";
		private $profile = "adm_profile";
		private $config = "site_config";
		private $precheck = "precheck";
		
		public function getUserInsert_($data)
		{
			$this->db->insert($this->admin, $data);
			$id = $this->db->insert_id();
			return (isset($id)) ? $id : FALSE;
		}
		
		public function getprofileInsert_($data)
		{
			$this->db->insert($this->profile, $data);
			return true;
		}
		
		public function getconfigInsert_($data)
		{
			$this->db->insert($this->config, $data);
			return true;
		}
		
		public function getpreCheckerInsert_($data) {
			$this->db->insert($this->precheck, $data);
			return true;
		}
		
		public function trancateData() {
			$this->db->truncate('admin');
			$this->db->truncate('adm_profile');
			$this->db->truncate('adm_config');
			$this->db->truncate('site_config');
			$this->db->truncate('precheck');
			return true;
		}
	}
