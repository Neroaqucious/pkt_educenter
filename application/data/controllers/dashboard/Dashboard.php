<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	private $private_db = "dashboard/Dashboard_Model";
	private $default_timezone = "Asia/Rangoon";
	protected $data;
	private $admintoken, $username, $password, $sessiondata, $current_log_id, $p_ip;
	private $site_name, $meta_tag, $favicon, $decimal_point, $date_format, $phone_format, $user_session, $timezone;
	private $csrf_key, $current_user;
	private $current_id;

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model($this->private_db);
		$this->load->library('session');
	  $this->load->library('form_validation');
    $this->load->library('user_agent');
    $this->load->library('encryption');
	  $this->load->library('mainconfig');
		$this->load->library('calendar');
    
		$this->mainconfig->_DefaultTimeZone($this->default_timezone);
		/** Session Assign **/
		$this->__preSessionDataSet();
		/** Site Configuration Assign **/
		$this->user_config = $this->__preSiteConfigDataSet();
		/** Token Checker **/
		$this->__tokenChecker();
  }

  public function index()
  {
		$globalHeader = array(
		  "alert" => $this->mainconfig->_DefaultNotic(),
		  'title' => "Dashboard",
		  'msg' => "",
		  'uri' => array("dashboard",""),
	  );

    $this->data['total_student'] = $this->Dashboard_Model->getStudentCount();
    $this->data['instructor'] = $this->Dashboard_Model->getInstructorListCount();
    $this->data['course_count'] = $this->Dashboard_Model->getCourseCount();

		$this->data['total_cash'] = $this->Dashboard_Model->getTotalCashCount();
    $this->data['lists'] = $this->Dashboard_Model->getStudentListCount();

    $this->data['json'] = $this->fetch_data();

			$data = array(
				3  => '#my-dalendar"'.'data-toggle="tooltip" data-placement="top" title="" data-original-title="This is rain date and other description all for me!" class="reminder',
				7  => 'http://example.com/news/article/2006/06/07/',
				13 => 'http://example.com/news/article/2006/06/13/',
				26 => 'http://example.com/news/article/2006/06/26/'
			);

		$prefs = $this->mainconfig->__calendarGenerate();
		$this->calendar->initialize($prefs);
    $this->load->library('calendar',$prefs); // Load calender library		
		$this->data['calendar'] = $this->calendar->generate("2021", "08", $data);
	

			$this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
			$this->load->view('dashboard/index', $this->data);
  }

  public function fetch_data()
  {
    $data = $this->Dashboard_Model->getMonthlyRecord();		
		$date = $this->date_generate($data);
		return json_encode($date);
  }
  
/******* Session Reassign and Distibute *********/
	private function __preSessionDataSet(){
		$this->current_id = isset($_SESSION['__admin_user_data']['user_id'])?$_SESSION['__admin_user_data']['user_id']:"";
		$this->current_user = isset($_SESSION['__admin_user_data']['user_name'])?$_SESSION['__admin_user_data']['user_name']:"";
		$this->current_role = isset($_SESSION['__admin_user_data']['user_role'])?$_SESSION['__admin_user_data']['user_role']:"";
		$this->current_csrf_key = isset($_SESSION['__admin_token_slug'])?$_SESSION['__admin_token_slug']:"";
		$this->current_permission = isset($_SESSION['__admin_user_data']['user_permission'])?$_SESSION['__admin_user_data']['user_permission']:"";
		$this->current_log_id  = isset($_SESSION['__admin_session_id'])?$_SESSION['__admin_session_id']:"";
		$this->current_session_count = isset($_SESSION['__admin_user_data']['session'])?$_SESSION['__admin_user_data']['session']:"";
		$this->current_login_time = isset($_SESSION['__admin_user_data']['login_time'])?$_SESSION['__admin_user_data']['login_time']:"";
		$this->session_checker = isset($_SESSION['__pre_session_check']['check_point'])?$_SESSION['__pre_session_check']['check_point']:"";
	}
	
/******* Site Configuration Reassign and Distibute *********/
	private function __preSiteConfigDataSet(){
		$config = $this->mainconfig->_getInitialSiteConfigData();
			if(!empty($config)) {
				$this->site_name = $config->site_name;
				$this->meta_tag = $config->meta_tag;
				$this->favicon = $config->favicon;
				$this->date_format = $config->date_format;
				$this->decimal_point = $config->decimal_point;
				$this->phone_format = $config->phone_format;
				$this->user_session = $config->user_session;
				$this->timezone = $config->timezone;
			}
		return $config;
	}
		
/******* Login Configuration and Token Checker *********/
	private function __pretokenCheck()
	{
		if(empty($this->current_csrf_key) || $this->session_checker == false) {
			return FALSE;
		} else {
			$data = $this->mainconfig->_mbSplit('_', $this->current_csrf_key);
			$key_info = $this->_get_user_token($data[0].'_', $data[1]);
			if(count($key_info) == 1 && $key_info[0]->id == $this->current_log_id) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
	
	private function __tokenChecker() 
	{
		if(empty($this->__pretokenCheck())) {
			$queryChecker = $this->_user_query_Remove($this->current_log_id);
			if($queryChecker) {
				redirect('adm/portal/auth/logout');
			}
		}
	}
	
	private function _user_query_Remove($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('adm_config');
		return true;
	}
	
	private function _get_user_token($token, $slug)
	{
		$this->db->select('id,adm_id,csrf_token_key,csrf_slug_key');
		$this->db->from('adm_config');
		$this->db->where('csrf_token_key', $token);
		$this->db->where('csrf_slug_key', $slug);
		$query=$this->db->get();
		return $query->result();
	}
	
/** Callback filter function */
	public function option_check()
	{
		if(empty($this->input->post('permission[]'))){
			$this->form_validation->set_message('option_check', 'You must provide %s');
			return FALSE;
		} else {
			return TRUE;
		}
	}

/******* Other necessary Configuration *********/
	public function date_generate(array $data)
	{
		$primary = $secondary = [];
		$default_date = array(
			["month" => "Jan", "std_count" => "0",],
			["month" => "Feb", "std_count" => "0",],
			["month" => "Mar", "std_count" => "0",],
			["month" => "Apr", "std_count" => "0",],
			["month" => "May", "std_count" => "0",],
			["month" => "Jun", "std_count" => "0",],
			["month" => "Jul", "std_count" => "0",],
			["month" => "Aug", "std_count" => "0",],
			["month" => "Sep", "std_count" => "0",],
			["month" => "Oct", "std_count" => "0",],
			["month" => "Nov", "std_count" => "0",],
			["month" => "Dec", "std_count" => "0",],
		);
		foreach($data as $row) {
				$primary[$row->month] = array( "month" => $row->month, "std_count" => $row->std_count);
		}
		$keys1 = array_values($default_date);
		foreach($keys1 as $row){
			$secondary[$row['month']] = array( "month" => $row['month'], "std_count" => $row['std_count']);
		}
		$data = array_merge($secondary, $primary);
		return array_values($data);
	}


}