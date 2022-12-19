<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * # VIEW CHECK POINT #
 */

class Admin_Model extends CI_Model
{
    private $db1 = "admin";
    private $db2 = "adm_role";
    private $db3 = "adm_profile";
    private $db4 = "adm_config";
		private $db5 = "site_config";
		private $db6 = "precheck";

// for globals header
  public function roleLevel($unselected = true)
  {
    if ($unselected === true) {
      $data = array( '' => 'Select Role');
    }
    $this->db->where('status', 1);
    $query = $this->db->get($this->db2);
    $result = $query->result();
    foreach ($result as $row) {
      $data[$row->name] = strtolower($row->name);
    }
    return $data;
  }

//For login user data checking
  public function setAdminLogin($data)
  {
	  $this->db->insert($this->db4, $data);
	  $id = $this->db->insert_id();
	  return (isset($id)) ? $id : FALSE;
  }
  
// User configuration area
  public function getUserDataList($id)
  {
    $this->db->select('admin.id as id,username,password,admin.role,admin.status,facebook,twitter,instagram,address,adm_profile.name as full_name,email,phone,adm_role.config,adm_role.session');
    $this->db->where('admin.id', $id);
    $this->db->join($this->db4, 'adm_config.adm_id = admin.id', 'left' );
    $this->db->join($this->db3, 'adm_profile.adm_id = admin.id', 'left');
    $this->db->join($this->db2, 'adm_role.name = admin.role', 'left');
    return $this->db->get($this->db1)->row();
  }
  
  public function getUserSessionRecordList($id) {
	  $this->db->select('*');
	  $this->db->from($this->db4);
	  $this->db->where('adm_id', $id);
	  $query=$this->db->get();
	  return $query->result();
  }
  
  public function getAdminList()
  {
    $this->db->select('id,username,role as role,created_at,updated_at,status');
    $this->db->from($this->db1);
    $query=$this->db->get();
    return $query->result();
  }

  public function checkUserProfile($data, $except)
	{
		$this->db->select('email');
    $this->db->from($this->db3);	
		$this->db->where('email', $data['email']);
    $this->db->where('adm_id !=', $except);
		$query=$this->db->get();
		return $query->result();
  }

  public function updateAdminAuthorize($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update($this->db1, $data);
    return true;
  }
  
  public function updateAdminProfile($data, $id)
  {
    $this->db->where('adm_id', $id);
    $this->db->update($this->db3, $data);
    return true;
  }

  public function updateAdminPassword($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update($this->db1, $data);
    return true;
  }

  public function userInsert($data)
	{
		$this->db->insert($this->db1, $data);
    $id = $this->db->insert_id();
    return (isset($id)) ? $id : FALSE;
	}

  public function userProfileInsert($data)
  {
    $this->db->insert($this->db3, $data);
    return true;
  }
	
	public function siteConfigInsert($data)
	{
		$this->db->insert($this->db5, $data);
		return true;
	}
	
	public function preCheckerInsert($data) {
		$this->db->insert($this->db6, $data);
		return true;
	}

  public function getAdminDataList($id)
  {
    $this->db->select('admin.id as id,username,admin.status,facebook,twitter,instagram,role as role_,name,email,phone as phone_,address');
    $this->db->where('admin.id', $id);
    $this->db->join($this->db4, 'adm_config.adm_id = admin.id', 'left' );
    $this->db->join($this->db3, 'adm_profile.adm_id = admin.id', 'left');
    return $this->db->get($this->db1)->row();
  }

  public function adminDelete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete($this->db1);
    return true;
  }

  public function adminProfileDelete($id)
  {
    $this->db->where('adm_id', $id);
    $this->db->delete($this->db3);
    return true;
  }
		
	public function adminRecordDelete($id,$user = null)
	{
		if(!empty($user)) {
			$this->db->where('id !=', $user);
		}
		$this->db->where('adm_id', $id);
		$this->db->delete($this->db4);
		return true;
	}

//Role list
  public function insert_role($data)
  {
    $this->db->insert($this->db2, $data);
    return true;
  }
  
  public function update_role($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update($this->db2, $data);
    return $data['name'];
  }
  
  public function getRoleDataList()
  {
    $this->db->select("*");
    $this->db->from($this->db2);
    $query=$this->db->get();
    return $query->result();
  }

  public function getRoleData($id)
  {
    $this->db->select("*");
    $this->db->where('id', $id);
    return $this->db->get($this->db2)->row();
  }
	
	public function getAdminRoleList($id)
	{
		$this->db->select("name");
		$this->db->where('id', $id);
		return $this->db->get($this->db2)->row();
	}

	public function getCurrentRole($role){
		$this->db->select("id,role");
		$this->db->from($this->db1);
		$this->db->where('role', $role);
		$query=$this->db->get();
		return $query->result();
	}
	
  public function adminRoleCheck($data)
  {
    $this->db->select('name,config,session,status');
    $this->db->from($this->db2);
    $this->db->where('name', $data['name']);
    $this->db->where('config', $data['config']);
    $this->db->where('session', $data['session']);
    $this->db->where('status', $data['status']);
    $query=$this->db->get();
    return $query->result();
  }

  public function roleDelete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete($this->db2);
    return true;
  }
}
