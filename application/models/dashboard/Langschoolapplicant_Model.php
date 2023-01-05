<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Langschoolapplicant_Model extends CI_Model
{
// for globals header
  private $db1 = "JLS_applicant_info";
  private $db2 = "JLS_other_details";
  private $db3 = "JLS_financial_sponsor";
  private $db4 = "JLS_educational_history";
  private $db5 = "JLS_previous_jp_lang_study";
  private $db6 = "JLS_achievement_jp_lang_test";
  private $db7 = "JLS_name_jp_lang_tests_going_to_take";
  private $db8 = "JLS_history_employment";
  private $db9 = "JLS_family_member";
  private $db10 = "JLS_family_in_japan";
  private $db11 = "JLS_previous_stay_in_japan";
  private $db12 = "JLS_other_info";
  private $db20 = "JLS_ever_been_japan";

  public function JLSapplicantinfo($userData)
  {
    $this->db->insert($this->db1, $userData);
    $id = $this->db->insert_id();
	  return (isset($id)) ? $id : FALSE;
  }
  public function JLSapplicantdetails($userData1)
  {
    $this->db->insert($this->db2,$userData1);
    return true;
  }
  public function JLSapplicantotherinfo($other_info)
  {
    $this->db->insert($this->db12,$other_info);
    return true;
  }
  public function JLSEverBeenJapan($data_jp_ever_been_japan)
  {
    $this->db->insert($this->db20,$data_jp_ever_been_japan);
    return true;
  }
  public function JLSfinancialsponser($data_financial_sponsor)
  {
    $this->db->insert($this->db3,$data_financial_sponsor);
    return true;
  }
  public function JLSlangstudy($data_jp_lang_study)
  {
    // $this->db->insert($this->db4,$data_jp_lang_study);
    // return true;
  }
  public function getRegisterTotal()
  {
    $this->db->select('*, COUNT(id) AS totalRegister');
    $this->db->from($this->db1);
    $this->db->where('appli_status', 'Register');
    $query=$this->db->get();
    return $query->result();
  }
  public function getInterTotal()
  {
    $this->db->select('*, COUNT(id) AS totalInter');
    $this->db->from($this->db1);
    $this->db->where('appli_status', 'Interview');
    $query=$this->db->get();
    return $query->result();
  }
  public function getInterFailTotal()
  {
    $this->db->select('*, COUNT(id) AS totalInterFail');
    $this->db->from($this->db1);
    $this->db->where('appli_status', 'Interview Failed');
    $query=$this->db->get();
    return $query->result();
  }
  public function getAdmissionTotal()
  {
    $this->db->select('*, COUNT(id) AS totalAdmission');
    $this->db->from($this->db1);
    $this->db->where('appli_status', 'Admission');
    $query=$this->db->get();
    return $query->result();
  }
  public function getAdmissionCompleteTotal()
  {
    $this->db->select('*, COUNT(id) AS totalAdmissCompete');
    $this->db->from($this->db1);
    $this->db->where('appli_status', 'Admission Complete');
    $query=$this->db->get();
    return $query->result();
  }
  public function getCOEWaitTotal()
  {
    $this->db->select('*, COUNT(id) AS totalCOEWait');
    $this->db->from($this->db1);
    $this->db->where('appli_status', 'COE Waiting');
    $query=$this->db->get();
    return $query->result();
  }
  public function getCOEResultTotal()
  {
    $this->db->select('*, COUNT(id) AS totalCOEResult');
    $this->db->from($this->db1);
    $where = "appli_status='COE Passed' OR appli_status='COE Failed'";
    $this->db->where($where);
    $query=$this->db->get();
    return $query->result();
  }
  public function getCancelTotal()
  {
    $this->db->select('*, COUNT(id) AS totalCancel');
    $this->db->from($this->db1);
    $this->db->where('appli_status', 'Cancel');
    $query=$this->db->get();
    return $query->result();
  }
  public function getJLSList()
  {
    $this->db->select('*');
    $this->db->from($this->db1);
    $this->db->join($this->db2, $this->db1.'.id = '.$this->db2.'.applicant_id', 'left' );
    $query=$this->db->get();
    return $query->result();
  }
  
  public function getJLSDetail($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db2, $this->db1.'.id = '.$this->db2.'.applicant_id', 'left' );
    return $this->db->get($this->db1)->row();
  }
  public function getJLSDetailFin($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db3, $this->db1.'.id = '.$this->db3.'.applicant_id', 'left' );
    return $this->db->get($this->db1)->row();
  }
  public function getJLSDetail1($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db4, $this->db1.'.id = '.$this->db4.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getJLSDetail2($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db5, $this->db1.'.id = '.$this->db5.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getJLSDetail3($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db6, $this->db1.'.id = '.$this->db6.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getJLSDetail4($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db7, $this->db1.'.id = '.$this->db7.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getJLSDetail5($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db8, $this->db1.'.id = '.$this->db8.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getJLSDetail6($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db9, $this->db1.'.id = '.$this->db9.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getJLSDetail7($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db10, $this->db1.'.id = '.$this->db10.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getJLSDetail8($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db11, $this->db1.'.id = '.$this->db11.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function getJLSDetail9($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db12, $this->db1.'.id = '.$this->db12.'.applicant_id', 'left' );
    return $this->db->get($this->db1)->row();
  }
  public function getJLSDetail10($id)
  {
    $this->db->select('*,JLS_applicant_info.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db20, $this->db1.'.id = '.$this->db20.'.applicant_id', 'left' );
    $query = $this->db->get($this->db1);
    return $query->result();
  }
  public function studentDetail($id)
	{
    $this->db->select('student.id,user_id,name,email,info_phone as info_phone,address,birthday,nrc,education,social,std_profile.request_date,image_file,std_profile.status,std_profile.permission');
    $this->db->join($this->db16, $this->db16.'.std_id = '.$this->db1.'.id', 'left' );
		$this->db->where($this->db1.'.id', $id);
		return $this->db->get($this->db1)->row();
  }
  public function getStudentBatchList($limit, $page, $id)
  {
    $this->db->select('std_course.id,std_id,bat_id,cos_id,std_course.activate_date,std_course.status,cos_title,cos_image,ref_key,batch_id,days,start_time,end_time,month_duration,day_duration,start_date,liveclass,batch.released_date,slug_name,trainer.name as trainer,fees');
    $this->db->from($this->db2);
    $this->db->join($this->db3, $this->db3.'.id = '.$this->db2.'.cos_id', 'left' );    
    $this->db->join($this->db4, $this->db4.'.id = '.$this->db2.'.bat_id', 'left' );
    $this->db->join($this->db5, $this->db5.'.id = '.$this->db4.'.trainer_id', 'left' );
    $this->db->limit($limit, $page);
    $this->db->where($this->db2.'.std_id', $id);
    $this->db->order_by($this->db2.'.id', "desc");
    $query=$this->db->get();
    return $query->result();
  }

  public function getStudentBatchCount($id)
  {
    $this->db->select('*');
    $this->db->from($this->db2);
    $this->db->where('std_id', $id);
    return $this->db->count_all_results();
  }

  public function getstudentDetail($id)
  {
    $this->db->select('*,student.id');
		$this->db->where($this->db1.'.id', $id);
    $this->db->join($this->db16, $this->db16.'.std_id = '.$this->db1.'.id', 'left' );
		return $this->db->get($this->db1)->row();
  }

  public function JLSCheck($data_info, $id)
	{
		$this->db->select('*');
		$this->db->from($this->db1);
		$this->db->where('applicant_name', $data_info['applicant_name']);
    $this->db->where('applicant_name_kanji', $data_info['applicant_name_kanji']);
		$this->db->where('jls_name', $data_info['jls_name']);
    $this->db->where('date_of_birthday', $data_info['date_of_birthday']);
    $this->db->where('info_age', $data_info['info_age']);
    $this->db->where('info_nationality', $data_info['info_nationality']);
    $this->db->where('gender', $data_info['gender']);
    $this->db->where('martial_status', $data_info['martial_status']);
		$this->db->where('partaner_name', $data_info['partaner_name']);
    $this->db->where('std_email', $data_info['std_email']);
    $this->db->where('info_phone', $data_info['info_phone']);
    $this->db->where('course_admission', $data_info['address']);
    $this->db->where('course_study_lengh', $data_info['course_study_lengh']);
    $this->db->where('std_occupation', $data_info['std_occupation']);
		$this->db->where('jls_name', $data_info['jls_name']);
    $this->db->where('place_employment_school', $data_info['place_employment_school']);
    $this->db->where('addr_employment_school', $data_info['addr_employment_school']);
    $this->db->where('tel_employment_school', $data_info['tel_employment_school']);
    $this->db->where('entry_age_ele_school', $data_info['entry_age_ele_school']);
    $this->db->where('duration_jp_language_study', $data_info['duration_jp_language_study']);
		$this->db->where('passport', $data_info['passport']);
    $this->db->where('educational_school_name', $data_info['educational_school_name']);
    $this->db->where('passport_no', $data_info['passport_no']);
    $this->db->where('passport_data_issue', $data_info['passport_data_issue']);
    $this->db->where('passport_data_exp', $data_info['passport_data_exp']);
    $this->db->where('military_service', $data_info['military_service']);
		$this->db->where('family_mail', $data_info['family_mail']);
    $this->db->where('family_tel', $data_info['family_tel']);
    $this->db->where('family_address', $data_info['family_address']);
    $this->db->where('id !=', $id);
		$query=$this->db->get();
		return $query->result();
  }
  public function JLSCheck1($data_details, $id)
	{
		$this->db->select('*');
		$this->db->from($this->db2);
		$this->db->where('have_you_visited_jp', $data_details['have_you_visited_jp']);
    $this->db->where('visited_date', $data_details['visited_date']);
		$this->db->where('date_of_departure', $data_details['date_of_departure']);
    $this->db->where('school_apply_before_japan', $data_details['school_apply_before_japan']);
    $this->db->where('aimed_occupational_category', $data_details['aimed_occupational_category']);
    $this->db->where('school_apply_date', $data_details['school_apply_date']);
    $this->db->where('school_apply_status', $data_details['school_apply_status']);
    $this->db->where('school_apply_name', $data_details['school_apply_name']);
		$this->db->where('immigration_office', $data_details['immigration_office']);
    $this->db->where('immigration_result', $data_details['immigration_result']);
    $this->db->where('COE_reject', $data_details['COE_reject']);
    $this->db->where('place_apply_visa', $data_details['place_apply_visa']);
    $this->db->where('family_language', $data_details['family_language']);
    $this->db->where('accompanying_person', $data_details['accompanying_person']);
    $this->db->where('understand_language', $data_details['understand_language']);
		$this->db->where('criminal_record', $data_details['criminal_record']);
    $this->db->where('criminal_record_details', $data_details['criminal_record_details']);
    $this->db->where('criminal_record_when', $data_details['criminal_record_when']);
    $this->db->where('departure_deportation', $data_details['departure_deportation']);
    $this->db->where('current_status', $data_details['current_status']);
    $this->db->where('current_status_school_name', $data_details['current_status_school_name']);
		$this->db->where('current_status_school_major', $data_details['current_status_school_major']);
    $this->db->where('current_status_school_grade', $data_details['current_status_school_grade']);
    $this->db->where('expected_month', $data_details['expected_month']);
    $this->db->where('expected_year', $data_details['expected_year']);
    $this->db->where('specific_plans_after_graduating', $data_details['specific_plans_after_graduating']);
    $this->db->where('specific_plan_type_schools', $data_details['specific_plan_type_schools']);
		$this->db->where('specific_plan_school_name', $data_details['specific_plan_school_name']);
    $this->db->where('specific_plan_major', $data_details['specific_plan_major']);
    $this->db->where('will_you_return', $data_details['will_you_return']);
    $this->db->where('purpose_studying_in_japanese', $data_details['purpose_studying_in_japanese']);
    $this->db->where('entry_purpose1', $data_details['entry_purpose1']);
    //$this->db->where('ja_plan_to_stay_with_them', $data_family_japan['ja_plan_to_stay_with_them']);
    $this->db->where('id !=', $id);
		$query=$this->db->get();
		return $query->result();
  }
  public function JLSCheck2($data_financial_sponsor, $id)
	{
		$this->db->select('*');
		$this->db->from($this->db3);
		$this->db->where('fin_name', $data_financial_sponsor['fin_name']);
    $this->db->where('fin_age', $data_financial_sponsor['fin_age']);
    $this->db->where('fin_relationship', $data_financial_sponsor['fin_relationship']);
		$this->db->where('fin_address', $data_financial_sponsor['fin_address']);
    $this->db->where('tel', $data_financial_sponsor['tel']);
    $this->db->where('email', $data_financial_sponsor['email']);
    $this->db->where('fin_occupation', $data_financial_sponsor['fin_occupation']);
    $this->db->where('fin_work_place', $data_financial_sponsor['fin_work_place']);
		$this->db->where('fin_annual_income', $data_financial_sponsor['fin_annual_income']);
    $this->db->where('amount_saving_for_study_abroad', $data_financial_sponsor['amount_saving_for_study_abroad']);
    $this->db->where('amount_of_saving_which_proved', $data_financial_sponsor['amount_of_saving_which_proved']);
    $this->db->where('start_work_date', $data_financial_sponsor['start_work_date']);
    $this->db->where('id !=', $id);
		$query=$this->db->get();
		return $query->result();
  }
  public function JLSCheck3($data_edu_history, $id)
	{
		$this->db->select('*');
		$this->db->from($this->db4);
		$this->db->where('edu_name', $data_edu_history['edu_name']);
    $this->db->where('address', $data_edu_history['address']);
		$this->db->where('start_date', $data_edu_history['start_date']);
    $this->db->where('end_date', $data_edu_history['end_date']);
    $this->db->where('year', $data_edu_history['year']);
    $this->db->where('id !=', $id);
    return true;
		//$query=$this->db->get();
		//return $query->result();
  }
  public function JLSCheck4($data_lang_study, $id)
	{
		$this->db->select('*');
		$this->db->from($this->db5);
		$this->db->where('jp_name', $data_lang_study['jp_name']);
    $this->db->where('address', $data_lang_study['address']);
		$this->db->where('start_date', $data_lang_study['start_date']);
    $this->db->where('end_date', $data_lang_study['end_date']);
    $this->db->where('hour', $data_lang_study['hour']);
    $this->db->where('id !=', $id);
    return true;
		// $query=$this->db->get();
		// return $query->result();
  }
  public function JLSCheck5($data_achievement_jp, $id)
	{
		$this->db->select('*');
		$this->db->from($this->db6);
		$this->db->where('achiv_name', $data_achievement_jp['achiv_name']);
    $this->db->where('level', $data_achievement_jp['level']);
		$this->db->where('exam_year', $data_achievement_jp['exam_year']);
    $this->db->where('score', $data_achievement_jp['score']);
    $this->db->where('result', $data_achievement_jp['result']);
    $this->db->where('date_qualification', $data_achievement_jp['date_qualification']);
    $this->db->where('id !=', $id);
    return true;
		// $query=$this->db->get();
		// return $query->result();
  }
  public function JLSCheck6($data_jp_lang_going_to_take, $id)
	{
		$this->db->select('*');
		$this->db->from($this->db7);
		$this->db->where('going_name', $data_jp_lang_going_to_take['going_name']);
    $this->db->where('going_level', $data_jp_lang_going_to_take['going_level']);
    $this->db->where('id !=', $id);
    return true;
		// $query=$this->db->get();
		// return $query->result();
  }
  public function JLSCheck7($data_history_employment, $id)
	{
		$this->db->select('*');
		$this->db->from($this->db8);
		$this->db->where('emp_name', $data_history_employment['emp_name']);
    $this->db->where('address', $data_history_employment['address']);
		$this->db->where('start_date', $data_history_employment['start_date']);
    $this->db->where('end_date', $data_history_employment['end_date']);
    $this->db->where('year', $data_history_employment['year']);
    $this->db->where('job_description', $data_history_employment['job_description']);
    $this->db->where('id !=', $id);
    return true;
		// $query=$this->db->get();
		// return $query->result();
  }
  public function JLSCheck8($data_family_member, $id)
	{
		$this->db->select('*');
		$this->db->from($this->db9);
		$this->db->where('fam_name', $data_family_member['fam_name']);
    $this->db->where('fam_relationship', $data_family_member['fam_relationship']);
		$this->db->where('work_place', $data_family_member['work_place']);
    $this->db->where('birthday', $data_family_member['birthday']);
    $this->db->where('occupation', $data_family_member['occupation']);
    $this->db->where('annual_income', $data_family_member['annual_income']);
    $this->db->where('address', $data_family_member['address']);
    $this->db->where('length_sevice', $data_family_member['length_sevice']);
    $this->db->where('id !=', $id);
    return true;
		// $query=$this->db->get();
		// return $query->result();
  }
  public function JLSCheck9($data_family_japan, $id)
	{
		$this->db->select('*');
		$this->db->from($this->db10);
    $this->db->where('ja_fam_name', $data_family_japan['ja_fam_name']);
		$this->db->where('ja_fam_age', $data_family_japan['ja_fam_age']);
    $this->db->where('ja_fam_relationship', $data_family_japan['ja_fam_relationship']);
    $this->db->where('ja_fam_residing_applicant', $data_family_japan['ja_fam_residing_applicant']);
    $this->db->where('ja_fam_nationality', $data_family_japan['ja_fam_nationality']);
    $this->db->where('ja_fam_visa_status', $data_family_japan['ja_fam_visa_status']);
    $this->db->where('ja_fam_work_place', $data_family_japan['ja_fam_work_place']);
    $this->db->where('ja_certificate_alien', $data_family_japan['ja_certificate_alien']);
    $this->db->where('id !=', $id);
    return true;
		// $query=$this->db->get();
		// return $query->result();
  }

  public function JLSCheck10($data_previous_stay_japan, $id)
	{
		$this->db->select('*');
		$this->db->from($this->db11);
		$this->db->where('entry_date', $data_previous_stay_japan['entry_date']);
    $this->db->where('arrival_date', $data_previous_stay_japan['arrival_date']);
		$this->db->where('depature_date', $data_previous_stay_japan['depature_date']);
    $this->db->where('status', $data_previous_stay_japan['status']);
    $this->db->where('entry_purpose', $data_previous_stay_japan['entry_purpose']);
    $this->db->where('id !=', $id);
    return true;
		// $query=$this->db->get();
		// return $query->result();
  }
  public function JLSCheck20($data_jp_ever_been_japan, $id)
	{
		$this->db->select('*');
		$this->db->from($this->db20);
		$this->db->where('shortVisa_purpose', $data_jp_ever_been_japan['shortVisa_purpose']);
    $this->db->where('shortVisa_status', $data_jp_ever_been_japan['shortVisa_status']);
		$this->db->where('shortVisa_period', $data_jp_ever_been_japan['shortVisa_period']);
    $this->db->where('shortVisa_prepare', $data_jp_ever_been_japan['shortVisa_prepare']);
    $this->db->where('id !=', $id);
    return true;
		// $query=$this->db->get();
		// return $query->result();
  }
  public function jlsAuthUpdate($data_info, $id)
  {
    $this->db->where('id', $id);
		$this->db->update($this->db1, $data_info);
    // if($this->db->affected_rows() > 0){
    //   return $id;
    //   // $id is your updated record id because it is unique.
    // }else{
    //   return false;
    // }  
    // $id = $this->db->insert_id();
	  return $id;
  }
  public function jlsAuthUpdate1($data_details, $id)
  {
    $this->db->where('applicant_id', $id);
		$this->db->update($this->db2, $data_details);
		return true;
  }
  public function jlsAuthUpdate2($data_financial_sponsor, $id)
  {
    $this->db->where('applicant_id', $id);
		$this->db->update($this->db3, $data_financial_sponsor);
		return true;
  }
  public function jlsAuthUpdate3($data_edu_history, $id)
  {
    $this->db->where('applicant_id', $id);
		$this->db->update($this->db4, $data_edu_history);
		return true;
  }
  public function jlsAuthUpdate4($data_lang_study, $id)
  {
    $this->db->where('applicant_id', $id);
		$this->db->update($this->db5, $data_lang_study);
		return true;
  }
  public function jlsAuthUpdate5($data_achievement_jp, $id)
  {
    $this->db->where('applicant_id', $id);
		$this->db->update($this->db6, $data_achievement_jp);
		return true;
  }
  public function jlsAuthUpdate6($data_jp_lang_going_to_take, $id)
  {
    $this->db->where('applicant_id', $id);
		$this->db->update($this->db7, $data_jp_lang_going_to_take);
		return true;
  }
  public function jlsAuthUpdate7($data_history_employment, $id)
  {
    $this->db->where('applicant_id', $id);
		$this->db->update($this->db8, $data_history_employment);
		return true;
  }
  public function jlsAuthUpdate8($data_family_member, $id)
  {
    $this->db->where('applicant_id', $id);
		$this->db->update($this->db9, $data_family_member);
		return true;
  }
  public function jlsAuthUpdate9($data_family_japan, $id)
  {
    $this->db->where('applicant_id', $id);
		$this->db->update($this->db10, $data_family_japan);
		return true;
  }
  public function jlsAuthUpdate10($data_previous_stay_japan, $id)
  {
    $this->db->where('applicant_id', $id);
		$this->db->update($this->db11, $data_previous_stay_japan);
		return true;
  }
  public function jlsAuthUpdate11($data_info, $id)
  {
    $this->db->where('applicant_id', $id);
		$this->db->update($this->db12, $data_info);
		return true;
  }
  public function jlsAuthUpdate12($data_jp_ever_been_japan, $id)
  {
    $this->db->where('applicant_id', $id);
		$this->db->update($this->db20, $data_jp_ever_been_japan);
		return true;
  }
  public function getStudentBatchDetail($b_id,$std_id, $course)
  {
    $this->db->select('std_course.id,std_id,bat_id,cos_id,std_course.status,liveclass,course.cos_des1 as course_description,batch.description as batch_description,cos_title,slug_name,subcat_id,trainer_id,cos_image,ref_key,level.name as level,trainer.name as trainer,email,month_duration,day_duration,start_time,end_time,start_date,days,member,unlimited,batch_id,fees');
    $this->db->join($this->db3, $this->db3.'.id = '.$this->db2.'.cos_id', 'left' );
    $this->db->join($this->db4, $this->db4.'.id = '.$this->db2.'.bat_id', 'left' );
    $this->db->join($this->db5, $this->db5.'.id = '.$this->db4.'.trainer_id', 'left' );
    $this->db->join($this->db6, $this->db6.'.id = '.$this->db3.'.level_id', 'left' );
    $this->db->where($this->db2.'.id', $b_id);
    $this->db->where($this->db2.'.std_id', $std_id);
    $this->db->where($this->db3.'.slug_name', $course);
    return $this->db->get($this->db2)->row();
  }

  public function getLessonsListByCourse($id)
	{
		$this->db->select('lessons.id,cos_id,lessons.description as lessons_description,lessons.updated_at,lessons.status,cos_title,level.name as level,lectures,hours,lessons');
		$this->db->join($this->db3, $this->db3.'.id = '.$this->db7.'.cos_id', 'left');
		$this->db->join($this->db6, $this->db6.'.id = '.$this->db3.'.level_id', 'left');
		$this->db->where($this->db7.'.cos_id', $id);
		return $this->db->get($this->db7)->row();
  }

  public function getLessonsListByOnlineCourse($id, $sid)
  {
    $this->db->select('*');
    $this->db->join($this->db2, $this->db2.'.id = '.$this->db15.'.std_cos_id', 'left');
    $this->db->where($this->db15.'.std_cos_id', $id);
    $this->db->where($this->db15.'.std_id', $sid);
		return $this->db->get($this->db15)->row();
  }

  public function getLessonsDetailList($id)
	{
		$this->db->select('less_list.id,less_id,title,desc1,movies,minute,less_list.updated_at,less_list.status,less_part.name,less_part.id as part_id,slug_name');
		$this->db->from($this->db9);
		$this->db->join($this->db8, $this->db8.'.id = '.$this->db9.'.part_id', 'left');
		$this->db->where($this->db9.".less_id", $id);
		$this->db->order_by($this->db8.'.name', "asc");
    $this->db->order_by($this->db9.'.title', "asc");
    $this->db->where($this->db9.".status", 1);
		$query=$this->db->get();
		return $query->result();	
  }

  public function getPartList($id)
	{
		$this->db->select('*');
    $this->db->from($this->db8);
		$this->db->where("lesson_id", $id);
		$query=$this->db->get();
		return $query->result();
  }

  public function getPartDetail($id)
  {
    $this->db->select('less_list.part_id, count(less_id) as count_less');
    $this->db->from($this->db9);
    $this->db->where("less_id", $id);
    $this->db->group_by('part_id');
		$query=$this->db->get();
		return $query->result();
  }
  
  public function getLessonsDetail($slug)
	{
		$this->db->select('less_list.id,less_id,part_id,title,desc1,desc2,movies,minute,less_list.status,less_part.name as part,lessons.description as lessons,less_list.updated_at');
		$this->db->join($this->db8, $this->db8.'.id = '.$this->db9.'.part_id', 'left');
		$this->db->join($this->db7, $this->db7.'.id = '.$this->db9.'.less_id', 'left');
		$this->db->where($this->db9.'.slug_name', $slug);
		return $this->db->get($this->db9)->row();
	}

  public function getRelatedLessonsDetail($id, $part_id, $less_id)
	{
		$this->db->select('less_list.id,less_id,part_id,title,desc1,desc2,movies,minute,less_list.status,less_part.name as part,less_list.updated_at,slug_name');
		$this->db->from($this->db9);
		$this->db->join($this->db8, $this->db8.'.id = '.$this->db9.'.part_id', 'left');
		$this->db->where($this->db9.'.id !=', $id);
		$this->db->where($this->db9.".part_id", $part_id);
		$this->db->where($this->db9.".less_id", $less_id);
		$query=$this->db->get();
		return $query->result();
  }

  public function getLessonsListByLessons($id)
	{
		$this->db->select('lessons.id,cos_id,lessons.description,lessons.updated_at,lessons.status,cos_title,level.name as level,cos_thumb');
		$this->db->join($this->db3, $this->db3.'.id = '.$this->db7.'.cos_id', 'left');
		$this->db->join($this->db6, $this->db6.'.id = '.$this->db3.'.level_id', 'left');
		$this->db->where($this->db7.'.id', $id);
		return $this->db->get($this->db7)->row();
  }
  
  public function studentNoteDetail($std_id, $data_id)
  {
    $this->db->select('*');
		$this->db->where("std_id", $std_id);
		$this->db->where("data_id", $data_id);
		return $this->db->get($this->db10)->row();
  }
  
  public function studentBatchDetail($std_id, $cos_id)
  {
    $this->db->select('bat_id');
    $this->db->where('std_id', $std_id);
    $this->db->where('cos_id', $cos_id);
		return $this->db->get($this->db2)->row();
  }
  
  public function studentLessonDetail($id)
  {
    $this->db->select('*');
		$this->db->where("id", $id);
		return $this->db->get($this->db9)->row();
  }

  public function studentNoteUpdate($std_id, $data_id, $data)
  {
    $this->db->where('std_id', $std_id);
    $this->db->where('data_id', $data_id);
		$this->db->update($this->db10, $data);
		return true;
  }
  public function getStudentPermission($id)
  {
    $this->db->select('permission,status');
		$this->db->where("id", $id);
		return $this->db->get($this->db11)->row();
  }
  public function getStudentEverBeen($id)
  {
    $this->db->select('permission,status');
		$this->db->where("id", $id);
		return $this->db->get($this->db20)->row();
  }

/** Purchase history */
  public function getStudentPurchaseCount($id)
  {
    $this->db->select('*');
    $this->db->from($this->db14);
    $this->db->where('std_id', $id);
    return $this->db->count_all_results();
  }

  public function getStudentPurchaseList($limit, $page, $id)
  {
    $this->db->select('std_payment.id,std_payment.std_id,payment_id,bat_id,cos_id,std_course.status,cos_title,batch_id,invoice_number,total_cash,std_payment.created_at');
    $this->db->from($this->db14);
    $this->db->join($this->db13, $this->db13.'.id = '.$this->db14.'.std_inv_id', 'left' ); 
    $this->db->join($this->db2, $this->db2.'.id = '.$this->db13.'.std_cos_id', 'left' ); 
    $this->db->join($this->db3, $this->db3.'.id = '.$this->db2.'.cos_id', 'left' );    
    $this->db->join($this->db4, $this->db4.'.id = '.$this->db2.'.bat_id', 'left' );
    $this->db->limit($limit, $page);
    $this->db->where($this->db14.'.std_id', $id);
    $this->db->order_by($this->db14.'.id', "desc");
    $query=$this->db->get();
    return $query->result();
  }

  public function getStudentBrachChecker($lid, $slug, $logid)
  {
    $this->db->select('csrf_token_key,csrf_slug_key,less_list.slug_name');
		$this->db->join($this->db7, $this->db7.'.id = '.$this->db9.'.less_id', 'left');
    $this->db->join($this->db3, $this->db3.'.id = '.$this->db7.'.cos_id', 'left');
    $this->db->join($this->db2, $this->db2.'.cos_id = '.$this->db3.'.id', 'left');
    $this->db->join($this->db12, $this->db12.'.std_id = '.$this->db2.'.std_id', 'left');
		$this->db->where($this->db12.'.id', $logid);
		$this->db->where($this->db9.".slug_name", $slug);
		$this->db->where($this->db9.".less_id", $lid);
    return $this->db->get($this->db9)->row();
  }

  public function getLocalClassList($id)
  {
    $this->db->select('*');
    $this->db->from($this->db15);
    $this->db->where($this->db15.'.std_id', $id);
    $query=$this->db->get();
    return $query->result();
  }

  public function getPaymentList($std, $cid, $bid)
  {
    $this->db->select('pay_name,reference,usr_name,total_price');

    $this->db->join($this->db13, $this->db13.'.std_cos_id = '.$this->db2.'.id', 'left' );
    $this->db->join($this->db16, $this->db16.'.slug = '.$this->db13.'.pay_type', 'left' );
    $this->db->where($this->db2.'.std_id', $std);
    $this->db->where($this->db2.'.cos_id', $cid);
    $this->db->where($this->db2.'.bat_id', $bid);
    return $this->db->get($this->db2)->row();
  }

  /**
   *  $id => Application_id
   */
  public function eduHistoryDeleteByAppID($id) {
    $this->db->where('applicant_id', $id);
		$this->db->delete($this->db4);
		return true;
  }
  
  public function jpHistoryDeleteByAppID($id) {
    $this->db->where('applicant_id', $id);
		$this->db->delete($this->db5);
		return true;
  }
  public function achivHistoryDeleteByAppID($id) {
    $this->db->where('applicant_id', $id);
		$this->db->delete($this->db6);
		return true;
  }
  public function goingHistoryDeleteByAppID($id) {
    $this->db->where('applicant_id', $id);
		$this->db->delete($this->db7);
		return true;
  }
  public function empHistoryDeleteByAppID($id) {
    $this->db->where('applicant_id', $id);
		$this->db->delete($this->db8);
		return true;
  }
  public function famHistoryDeleteByAppID($id) {
    $this->db->where('applicant_id', $id);
		$this->db->delete($this->db9);
		return true;
  }
  public function jaFamHistoryDeleteByAppID($id) {
    $this->db->where('applicant_id', $id);
		$this->db->delete($this->db10);
		return true;
  }
  public function preJaFamHistoryDeleteByAppID($id) {
    $this->db->where('applicant_id', $id);
		$this->db->delete($this->db11);
		return true;
  }
  public function jpeverbeenDeleteByAppID($id) {
    $this->db->where('applicant_id', $id);
		$this->db->delete($this->db20);
		return true;
  }
  public function Delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db1);
		return true;
	}
  public function detailsDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db2);
		return true;
	}
  public function finDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db3);
		return true;
	}
  public function eduDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db4);
		return true;
	}
  public function preDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db5);
		return true;
	}
  public function achivDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db6);
		return true;
	}
  public function goingDdelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db7);
		return true;
	}
  public function hisDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db8);
		return true;
	}
  public function famDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db9);
		return true;
	}
  public function famJpDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db10);
		return true;
	}
  public function prestayDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db11);
		return true;
	}
  public function jpeverDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db20);
		return true;
	}
}
