<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * course detail not complete!
	 */
	class Payment_Model extends CI_Model
	{
		private $private_db = "payment";

		public function getPaymentList()
		{
			$this->db->select('acc_name,acc_id,acc_key,status,id,acc_ref');
			$this->db->from($this->private_db);
			$this->db->where('status', '1');
			$query=$this->db->get();
			return $query->result();
		}


	}
