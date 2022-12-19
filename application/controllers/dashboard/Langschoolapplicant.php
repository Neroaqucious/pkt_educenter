<?php
    defined('BASEPATH') or exit('No direct script access allowed');
class Langschoolapplicant extends CI_Controller 
{
    private $private_db = "dashboard/Langschoolapplicant_Model";
    private $data, $key, $url;
    private $sessiondata, $authkey, $slugkey, $std_id, $usr_email, $usr_phone, $usr_name;
    private $id, $enroll_course, $enroll_batch, $enroll_package, $enroll_checker, $usertoken;
    //Initial presite config
    //Initial auth session
    protected $current_id, $current_user, $current_role, $current_csrf_key, $current_permission, $current_session_count, $current_login_time, $current_log_id, $session_checker, $user_config;
    //Initial presite config
    protected $site_name, $meta_tag, $favicon, $decimal_point, $date_format, $phone_format, $user_session, $timezone;
    //File upload data
    private $filename;
    private $filenames;
    private $upload_path = "./upload/assets/adm/usr/";
    private $upload_paths = "./upload/assets/adm/sign/";
    private $file_path = "/../../../upload/assets/adm/usr/";
    private $max_size = "202800"; // upload max size 200 MB
    private $max_width = "1024";
    private $max_height = "1024";
    private $allow_type = 'jpg|jpeg|png|JPEG';

    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
        $this->load->model($this->private_db);
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->library('user_agent');
        $this->load->library('upload');
        //$this->load->library('uploads');
        $this->load->library('email');
        $this->load->library('mainconfig');
        $this->load->helper('custom');
        $this->load->helper('cookie');
        //$this->load->library('userconfig');
        $this->mainconfig->_DefaultTimeZone($this->timezone);
        /** Current User Session Assign **/
        $this->__preSessionDataSet();
        /** Site Configuration Assign **/
        $this->user_config = $this->__preSiteConfigDataSet();
        $this->mainconfig->_DefaultTimeZone($this->timezone);
        // $this->__initSessionDataAssign();
        $this->__preSiteConfigDataSet();
        /** Token Checker **/
        $this->__tokenChecker();
        /** User Permission Checker **/
        $this->key = "pe_student";
        $this->url = "adm/portal/d-panel";
        $this->__permissionChecker($this->key, $this->url);
    }
    public function index() 
    {
        /** User Permission Checker **/
        $this->__permissionChecker($this->key, $this->url);
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), 'title' => "Student Lists", 'msg' => "", 'uri' => array("langschoolapplicant", "jls_lists"), 'config' => $this->user_config);
        $lists = $this->Langschoolapplicant_Model->getJLSList();
        $registerlists = $this->Langschoolapplicant_Model->getRegisterTotal();
        $this->data['registerlists'] = $registerlists;
        $interlists = $this->Langschoolapplicant_Model->getInterTotal();
        $this->data['interlists'] = $interlists;
        $interfail = $this->Langschoolapplicant_Model->getInterFailTotal();
        $this->data['interfail'] = $interfail;
        $admisslists = $this->Langschoolapplicant_Model->getAdmissionTotal();
        $this->data['admisslists'] = $admisslists;
        $admisscomplete = $this->Langschoolapplicant_Model->getAdmissionCompleteTotal();
        $this->data['admisscomplete'] = $admisscomplete;
        $coewait = $this->Langschoolapplicant_Model->getCOEWaitTotal();
        $this->data['coewait'] = $coewait;
        $coeresult = $this->Langschoolapplicant_Model->getCOEResultTotal();
        $this->data['coeresult'] = $coeresult;
        $cancellists = $this->Langschoolapplicant_Model->getCancelTotal();
        $this->data['cancellists'] = $cancellists;
        //*** Generate necessary key and value
        $Q_list = _transfer_key_prepare(array_keys_checker($lists));
        $this->data['lists'] = array_transfer($lists, $Q_list);
        //$this->data['course'] = $this->Langschoolapplicant_Model->getStudentCourseRequest();
        $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
        // For data showing (course, )
        $this->load->view('dashboard/langschoolstudent/lists', $this->data);
    }
    public function add() 
    {
        /** User Permission Checker **/
        $this->__permissionChecker($this->key, $this->url);
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), "pass" => ['add' => 'adm/portal/jls_applicant/add'], 'title' => "Sign up", 'uri' => array("langschoolapplicant", "jls_add"), 'msg' => "",);
        $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);
        if ($_POST) {
            // $this->form_validation->set_rules('std_name', 'student name', 'trim|required|min_length[5]|is_unique[OSL_std_profile.name]|xss_clean');
            // $this->form_validation->set_rules('std_email', 'email', 'trim|required|valid_email|is_unique[OSL_student.email]|xss_clean');
            // $this->form_validation->set_rules('std_password', 'password', 'trim|required|min_length[6]|max_length[30]|xss_clean');
            // $this->form_validation->set_rules('conf_password', 'confirm password', 'trim|required|min_length[6]|max_length[30]|xss_clean|matches[std_password]');
            //$this->form_validation->set_rules('jls_name', 'jls name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('applicant_name', 'applicant name', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('applicant_name_kanji', 'applicant name kanji', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('date_of_birthday', 'date of birthday.', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('place_birth', 'place birth', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('age', 'age', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('nationality', 'nationality', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('gender', 'gender', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('martial_status', 'martial status', 'trim|required|xss_clean');
            // //$this->form_validation->set_rules('partaner_name', 'partaner name.', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('place_birth', 'place birth', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('std_email', 'std email', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('phone', 'phone', 'trim|required|numeric|xss_clean');
            // $this->form_validation->set_rules('std_facebook', 'facebook account', 'trim|xss_clean');
            // $this->form_validation->set_rules('userfile', 'Student photo', 'trim|xss_clean');
            // $this->form_validation->set_message('required', 'You must enter %s!');
            // $this->form_validation->set_message('is_unique', 'Your %s is already exits!');
            // $this->form_validation->set_message('numeric', 'The %s always allow only numbers!'
            // $this->form_validation->set_message('valid_email', 'The %s must be valid!');
            if ($this->form_validation->run() === false) {
                $this->load->view('dashboard/langschoolstudent/add', $this->data);
            }
            else {
                //var_dump($_POST);
                $data_info = array('jls_name' => $this->input->post('jls_name'), 'applicant_name' => $this->input->post('applicant_name'), 'applicant_name_kanji' => $this->input->post('applicant_name_kanji'),'register_date' => $this->input->post('register_date'),'appli_status' => $this->input->post('appli_status'), 'date_of_birthday' => $this->input->post('date_of_birthday'), 'place_birth' => $this->input->post('place_birth'),'province' => $this->input->post('province'), 'info_age' => $this->input->post('info_age'), 'info_nationality' => $this->input->post('info_nationality'), 'gender' => $this->input->post('gender'), 'martial_status' => $this->input->post('martial_status'), 'partaner_name' => $this->input->post('partaner_name'), 'std_email' => $this->input->post('std_email'), 'info_phone' => $this->input->post('info_phone'), 'address' => $this->input->post('address'), 'course_admission' => $this->input->post('course_admission'), 'course_study_lengh' => $this->input->post('course_study_lengh'), 'occupation' => $this->input->post('occupation'), 'place_employment_school' => $this->input->post('place_employment_school'), 'addr_employment_school' => $this->input->post('addr_employment_school'), 'tel_employment_school' => $this->input->post('tel_employment_school'), 'entry_age_ele_school' => $this->input->post('entry_age_ele_school'), 'duration_jp_language_study' => $this->input->post('duration_jp_language_study'), 'passport' => $this->input->post('passport'), 'educational_school_name' => $this->input->post('educational_school_name'), 'passport_no' => $this->input->post('passport_no'), 'passport_data_issue' => $this->input->post('passport_data_issue'), 'passport_data_exp' => $this->input->post('passport_data_exp'),'passport_issue_authority' => $this->input->post('passport_issue_authority'), 'military_service' => $this->input->post('military_service'),'military_service_details' => $this->input->post('military_service_details'), 'family_mail' => $this->input->post('family_mail'), 'family_tel' => $this->input->post('family_tel'), 'family_address' => $this->input->post('family_address',),'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s'));
                if (!empty($_FILES['userfile']['name'])) {
                    $this->filename = $_FILES['userfile']['name'];
                    $imgupload = $this->mainconfig->_fileUploadWithByName($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, true, true, false, 'userfile');
                    if (!empty($imgupload['msg_error'])) {
                        $this->session->set_flashdata('msg_error', $imgupload['msg_error']);
                        redirect('adm/portal/jls_applicant/add');
                    } else {
                        $data_info['image_file'] = $imgupload['file_name'];
                    }
                }
                    
                if (!empty($_FILES['signfile']['name'])) {
                    $this->filename = $_FILES['signfile']['name'];
                    $signupload = $this->mainconfig->_fileUploadWithByName($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, true, true, false, 'signfile');
                    if (!empty($signupload['msg_error'])) {
                        $this->session->set_flashdata('msg_error', $signupload['msg_error']);
                        redirect('adm/portal/jls_applicant/add');
                    } else {
                        $data_info['sign_file'] = $signupload['file_name'];
                    }
                }
                var_dump($data_info);
                if (!empty($_FILES['familyfile']['name'])) {
                    $this->filename = $_FILES['familyfile']['name'];
                    $familysignupload = $this->mainconfig->_fileUploadWithByName($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, true, true, false, 'familyfile');
                    if (!empty($familysignupload['msg_error'])) {
                        $this->session->set_flashdata('msg_error', $familysignupload['msg_error']);
                        redirect('adm/portal/jls_applicant/add');
                    } else {
                        $data_info['family_file'] = $familysignupload['file_name'];
                    }
                }
                // $error = array();
                // $config1['upload_path'] = "upload/assets/adm/usr/";
                // $config1['allowed_types'] = 'gif|jpeg|png|jpg';
                // $config1['max_size'] = '3000000';
                // $config1['max_width'] = '1024';
                // $config1['max_height'] = '768';
                // $this->load->library('upload', $config1);
                
                // if (!$this->upload->do_upload('userfile')){
                //     $error = array('error' => $this->upload->display_errors());
                //     echo "<pre>";
                //     print_r($error);
                //     exit();
                // }
                // else {
                //     $fdata = $this->upload->data();
                //     var_dump($fdata);
                //    // $data_info['userfile'] = 'upload/assets/adm/usr/' . $fdata['file_name'];
                //     }
                
                // $config2['upload_path'] = "./upload/assets/adm/sign/";
                // $config2['allowed_types'] = 'gif|jpeg|png|jpg';
                // $config2['max_size'] = '3000000';
                // $config2['max_width'] = '1024';
                // $config2['max_height'] = '768';
                // $this->upload->initialize($config2);
                
                // if (!$this->upload->do_upload('signfile')){
                //     $error = array('error' => $this->upload->display_errors());
                //     echo "<pre>";
                //     print_r($error);
                //     exit();
                // }
                // else {
                //     $fdata = $this->upload->data();
                //     $data_info['signfile'] = './upload/assets/adm/sign/' . $fdata['file_name'];
                //     }
                $data_details = array('have_you_visited_jp' => $this->input->post('have_you_visited_jp'),'visited_jp_status' => $this->input->post('visited_jp_status'),'return_other' => $this->input->post('return_other'),'eligibility_non_issuance' => $this->input->post('eligibility_non_issuance'),'ja_plan_to_stay_with_them' => $this->input->post('ja_plan_to_stay_with_them'),'employment_experience' => $this->input->post('employment_experience'),'jplearn_experience' => $this->input->post('jplearn_experience'),'jplearn_achievement' => $this->input->post('jplearn_achievement'),'family_in_japan' => $this->input->post('family_in_japan'), 'visited_date' => $this->input->post('visited_date'),'entry_time' => $this->input->post('entry_time'), 'date_of_departure' => $this->input->post('date_of_departure'), 'visa_type' => $this->input->post('visa_type'), 'school_apply_before_japan' => $this->input->post('school_apply_before_japan'), 'aimed_occupational_category' => $this->input->post('aimed_occupational_category'), 'school_apply_date' => $this->input->post('school_apply_date'), 'school_apply_status' => $this->input->post('school_apply_status'), 'school_apply_name' => $this->input->post('school_apply_name'), 'immigration_office' => $this->input->post('immigration_office'), 'immigration_result' => $this->input->post('immigration_result'),'immigration_reason' => $this->input->post('immigration_reason'),'graduate_date' => $this->input->post('graduate_date'), 'COE_reject' => $this->input->post('COE_reject'), 'place_apply_visa' => $this->input->post('place_apply_visa'), 'family_language' => $this->input->post('family_language'),
                 'eligibility_have' => $this->input->post('eligibility_have'),
                //  'eligibility_time' => $this->input->post('eligibility_time'),
                //  'eligibility_purpose' => $this->input->post('eligibility_purpose'),
                //  'eligibility_date' => $this->input->post('eligibility_date'),
                'provide_english' => $this->input->post('provide_english'), 'accompanying_person' => $this->input->post('accompanying_person'),'accompanying_marital_status' => $this->input->post('accompanying_marital_status'), 'understand_language' => $this->input->post('understand_language'), 'criminal_record' => $this->input->post('criminal_record'), 'criminal_record_details' => $this->input->post('criminal_record_details'),'eligibility_details' => $this->input->post('eligibility_details'), 'criminal_record_when' => $this->input->post('criminal_record_when'), 'departure_deportation' => $this->input->post('departure_deportation'), 'current_status' => $this->input->post('current_status'), 'current_status_school_name' => $this->input->post('current_status_school_name'), 'current_status_school_major' => $this->input->post('current_status_school_major'), 'current_status_school_grade' => $this->input->post('current_status_school_grade'), 'expected_month' => $this->input->post('expected_month'), 'expected_year' => $this->input->post('expected_year'), 'specific_plans_after_graduating' => $this->input->post('specific_plans_after_graduating'), 'specific_plan_type_schools' => $this->input->post('specific_plan_type_schools'), 'specific_plan_school_name' => $this->input->post('specific_plan_school_name'), 'specific_plan_major' => $this->input->post('specific_plan_major'), 'will_you_return' => $this->input->post('will_you_return'), 'purpose_studying_in_japanese' => $this->input->post('purpose_studying_in_japanese'), 'entry_purpose1' => $this->input->post('entry_purpose1'),);
                $data_financial_sponsor = array('fin_name' => $this->input->post('fin_name'), 'fin_age' => $this->input->post('fin_age'), 'fin_relationship' => $this->input->post('fin_relationship'), 'fin_address' => $this->input->post('fin_address'), 'tel' => $this->input->post('tel'), 'email' => $this->input->post('email'), 'fin_occupation' => $this->input->post('fin_occupation'), 'work_place' => $this->input->post('work_place'), 'annual_income' => $this->input->post('annual_income'),'fin_visa' => $this->input->post('fin_visa'), 'amount_saving_for_study_abroad' => $this->input->post('amount_saving_for_study_abroad'), 'amount_of_saving_which_proved' => $this->input->post('amount_of_saving_which_proved'), 'start_work_date' => $this->input->post('start_work_date'),);
                $data_other_info = array('father_work_place' => $this->input->post('father_work_place'),'twyrs_crs_start_date' => $this->input->post('twyrs_crs_start_date'),'twyrs_crs_end_date' => $this->input->post('twyrs_crs_end_date'),'onenine_crs_start_date' => $this->input->post('onenine_crs_start_date'),'onenine_crs_end_date' => $this->input->post('onenine_crs_end_date'),'onefive_crs_start_date' => $this->input->post('onefive_crs_start_date'),'onefive_crs_end_date' => $this->input->post('onefive_crs_end_date'),'onethree_crs_start_date' => $this->input->post('onethree_crs_start_date'),'onethree_crs_end_date' => $this->input->post('onethree_crs_end_date'),'one_crs_start_date' => $this->input->post('one_crs_start_date'),'one_crs_end_date' => $this->input->post('one_crs_end_date'),'student_work_details' => $this->input->post('student_work_details'),'eligibility_visa' => $this->input->post('eligibility_visa'),'issued_date' => $this->input->post('issued_date'),'intended_roll' => $this->input->post('intended_roll'),'defraying_details' => $this->input->post('defraying_details'),'family_inJpfri' => $this->input->post('family_inJpfri'),'japan_four_times' => $this->input->post('japan_four_times'),'select_name_of_course' => $this->input->post('select_name_of_course'),'future_plan_after_graduating' => $this->input->post('future_plan_after_graduating'),'future_plan_checkdata01' => $this->input->post('future_plan_checkdata01'),'spec_other' => $this->input->post('spec_other'),'type_work_father' => $this->input->post('type_work_father'), 'mother_work_place' => $this->input->post('mother_work_place'), 'type_work_mother' => $this->input->post('type_work_mother'), 'language_can_you_use' => $this->input->post('language_can_you_use'), 'you_are_good_subject' => $this->input->post('you_are_good_subject'), 'special_ability' => $this->input->post('special_ability'), 'hobbies' => $this->input->post('hobbies'), 'allergic_medicine' => $this->input->post('allergic_medicine'),'allergic_medicine_details' => $this->input->post('allergic_medicine_details'), 'consent_name' => $this->input->post('consent_name'), 'consent_relation' => $this->input->post('consent_relation'), 'consent_address' => $this->input->post('consent_address'),'consent_email' => $this->input->post('consent_email'),'consent_tel' => $this->input->post('consent_tel'),'registered_enrollment' => $this->input->post('registered_enrollment'),'total_period_edu' => $this->input->post('total_period_edu'),'jp_certificate_number' => $this->input->post('jp_certificate_number'),'what_todo_japan' => $this->input->post('what_todo_japan'),'defraying_name' => $this->input->post('defraying_name'),'defraying_tel' => $this->input->post('defraying_tel'),'defraying_address' => $this->input->post('defraying_address'),'defraying_relation' => $this->input->post('defraying_relation'),'defraying_company' => $this->input->post('defraying_company'),'defraying_work_tel' => $this->input->post('defraying_work_tel'),'defraying_date' => $this->input->post('defraying_date'),'six_tuition_fee' => $this->input->post('six_tuition_fee'),'first_year_tuitioin_fee' => $this->input->post('first_year_tuitioin_fee'),'second_year_tuitioin_fee' => $this->input->post('second_year_tuitioin_fee'),'tuition_study_period' => $this->input->post('tuition_study_period'),'living_expense_amount' => $this->input->post('living_expense_amount'),'payment_method' => $this->input->post('payment_method'),);
                if (!empty($_FILES['defraying_sign']['name'])) {
                    $this->filename = $_FILES['defraying_sign']['name'];
                    $defrayupload = $this->mainconfig->_fileUploadWithByName($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, true, true, false, 'defraying_sign');
                    if (!empty($defrayupload['msg_error'])) {
                        $this->session->set_flashdata('msg_error', $defrayupload['msg_error']);
                        redirect('adm/portal/jls_applicant/add');
                    } else {
                        $data_other_info['defraying_sign'] = $defrayupload['file_name'];
                    }
                }
                $edu_name = $_POST['edu_name'];
                $edu_address = $_POST['edu_address'];
                $edu_start_date = $_POST['edu_start_date'];
                $edu_end_date = $_POST['edu_end_date'];
                $edu_year = $_POST['edu_year'];
                if($edu_name != Null){
                $data_edu_history = [];
                $data_edu_history = array('edu_name' => $edu_name, 'edu_address' => $edu_address, 'edu_start_date' => $edu_start_date, 'edu_end_date' => $edu_end_date, 'edu_year' => $edu_year,);
                }
                $jp_name = $_POST['jp_name'];
                $jp_level = $_POST['jp_level'];
                $jp_status = $_POST['jp_status'];
                $jp_address = $_POST['jp_address'];
                $jp_start_date = $_POST['jp_start_date'];
                $jp_end_date = $_POST['jp_end_date'];
                $jp_hour = $_POST['jp_hour'];
                $jp_year = $_POST['jp_year'];
                if($jp_name != Null){
                $data_lang_study = [];
                $data_lang_study = array('jp_name' => $jp_name, 'jp_level' => $jp_level,'jp_status' => $jp_status,'jp_address' => $jp_address, 'jp_start_date' => $jp_start_date, 'jp_end_date' => $jp_end_date, 'jp_hour' => $jp_hour,'jp_year' => $jp_year,);
                }
                // JLS_achievement_jp_lang_test
                $achiv_name = $_POST['achiv_name'];
                $level = $_POST['achiv_level'];
                $exam_year = $_POST['achiv_exam_year'];
                $score = $_POST['achiv_score'];
                $result = $_POST['achiv_result'];
                $date_qualification = $_POST['date_qualification'];
                $data_achievement_jp = [];
                $data_achievement_jp = array('achiv_name' => $achiv_name, 'level' => $level, 'exam_year' => $exam_year, 'score' => $score, 'result' => $result, 'date_qualification' => $date_qualification,);
                // JLS_achievement_jp_lang_test
                //JLS_name_jp_lang_tests_going_to_take
                $going_name = $_POST['going_name'];
                $going_level = $_POST['going_level'];
                $going_date = $_POST['going_date'];
                $data_jp_lang_going_to_take = array('going_name' => $going_name, 'going_level' => $going_level,'going_date' => $going_date,);
                //JLS_name_jp_lang_tests_going_to_take
                //JLS_ever_been_japan
                $shortVisa_purpose = $_POST['shortVisa_purpose'];
                $shortVisa_status = $_POST['shortVisa_status'];
                $shortVisa_period = $_POST['shortVisa_period'];
                $shortVisa_prepare = $_POST['shortVisa_prepare'];
                $data_jp_ever_been_japan = array('shortVisa_purpose' => $shortVisa_purpose, 'shortVisa_status' => $shortVisa_status,'shortVisa_period' => $shortVisa_period,'shortVisa_prepare' => $shortVisa_prepare,);
                //JLS_ever_been_japan
                //JLS_history_employment
                $emp_name = $_POST['emp_name'];
                $emp_address = $_POST['emp_address'];
                $emp_start_date = $_POST['emp_start_date'];
                $emp_end_date = $_POST['emp_start_date'];
                $emp_year = $_POST['emp_year'];
                $emp_job_description = $_POST['emp_job_description'];
                $data_history_employment = array('emp_name' => $emp_name, 'emp_address' => $emp_address, 'emp_start_date' => $emp_start_date, 'emp_end_date' => $emp_end_date, 'emp_year' => $emp_year, 'emp_job_description' => $emp_job_description,);
                //JLS_history_employment
                //JLS_family_member
                $fam_name = $_POST['fam_name'];
                $fam_age = $_POST['fam_age'];
                $fam_gender = $_POST['fam_gender'];
                $fam_relationship = $_POST['fam_relationship'];
                $fam_nationality = $_POST['fam_nationality'];
                $fam_work_place = $_POST['fam_work_place'];
                $fam_birthday = $_POST['fam_birthday'];
                $fam_occupation = $_POST['fam_occupation'];
                $fam_annual_income = $_POST['fam_annual_income'];
                $fam_address = $_POST['fam_address'];
                $fam_length_sevice = $_POST['fam_length_sevice'];
                $data_family_member = array(
                    'fam_name' => $fam_name, 
                    'fam_age' => $fam_age, 
                    'fam_gender' => $fam_gender, 
                    'fam_relationship' => $fam_relationship, 
                    'fam_nationality' => $fam_nationality, 
                    'fam_work_place' => $fam_work_place, 
                    'fam_birthday' => $fam_birthday, 
                    'fam_occupation' => $fam_occupation, 
                    'fam_annual_income' => $fam_annual_income, 
                    'fam_address' => $fam_address, 
                    'fam_length_sevice' => $fam_length_sevice,);
                //JLS_family_member
                //JLS_family_in_japan
                $ja_fam_name = $_POST['ja_fam_name'];
                $ja_fam_date_birth = $_POST['ja_fam_date_birth'];
                $ja_fam_address = $_POST['ja_fam_address'];
                $residence_card_no = $_POST['residence_card_no'];
                $ja_fam_age = $_POST['ja_fam_age'];
                $ja_fam_relationship = $_POST['ja_fam_relationship'];
                $ja_fam_residing_applicant = $_POST['ja_fam_residing_applicant'];
                $ja_fam_nationality = $_POST['ja_fam_nationality'];
                $ja_fam_visa_status = $_POST['ja_fam_visa_status'];
                $ja_fam_work_place = $_POST['ja_fam_work_place'];
                $ja_certificate_alien = $_POST['ja_certificate_alien'];
                $data_family_japan = array(
                    'ja_fam_name' => $ja_fam_name, 
                    'ja_fam_date_birth' => $ja_fam_date_birth, 
                    'ja_fam_address' => $ja_fam_address, 
                    'residence_card_no' => $residence_card_no, 
                    'ja_fam_age' => $ja_fam_age, 
                    'ja_fam_relationship' => $ja_fam_relationship, 
                    'ja_fam_residing_applicant' => $ja_fam_residing_applicant, 
                    'ja_fam_nationality' => $ja_fam_nationality, 
                    'ja_fam_visa_status' => $ja_fam_visa_status, 
                    'ja_fam_work_place' => $ja_fam_work_place,
                    'ja_certificate_alien' => $ja_certificate_alien,);
                //JLS_family_in_japan
                //JLS_previous_stay_in_japan
                $entry_date = $_POST['entry_date'];
                $arrival_date = $_POST['arrival_date'];
                $depature_date = $_POST['depature_date'];
                $pre_stay_visa = $_POST['pre_stay_visa'];
                $status = $_POST['status'];
                $entry_purpose = $_POST['entry_purpose'];
                $data_previous_stay_japan = array('entry_date' => $entry_date, 'arrival_date' => $arrival_date, 'depature_date' => $depature_date,'pre_stay_visa' => $pre_stay_visa, 'status' => $status, 'entry_purpose' => $entry_purpose,);
                //  var_dump($data_edu_history);
                if($edu_name != Null){
                $array_jcli1 = array
                ('__initial_regist_data' => $data_info, 
                '__initial_regist_data1' => $data_details, 
                '__initial_regist_data2' => $data_financial_sponsor,                
                '__initial_regist_data3' => $data_edu_history, 
                '__initial_regist_data4' => $data_lang_study, 
                '__initial_regist_data5' => $data_achievement_jp, 
                '__initial_regist_data6' => $data_jp_lang_going_to_take, 
                '__initial_regist_data7' => $data_history_employment, 
                '__initial_regist_data8' => $data_family_member, 
                '__initial_regist_data9' => $data_family_japan, 
                '__initial_regist_data10' => $data_previous_stay_japan,
                '__initial_regist_data11' => $data_other_info,
                '__initial_regist_data12' => $data_jp_ever_been_japan);
                //var_dump($array_jcli1);
                }
                $this->session->set_userdata($array_jcli1);
                redirect('adm/portal/jls_applicant/confirm');
            }
        }
        else {
            $this->load->view('dashboard/langschoolstudent/add', $this->data);
        }
    }
    // public function save_product() {
    //     $data = array();
    //     $error = array();
    //     $config1['upload_path'] = './upload/assets/adm/usr/';
    //     $config1['allowed_types'] = 'gif|jpeg|png|jpg';
    //     $config1['max_size'] = '3000000';
    //     $config1['max_width'] = '1024';
    //     $config1['max_height'] = '768';
    //     $this->load->library('upload', $config1);
        
    //     if (!$this->upload->do_upload('usefile')){
    //         $error = array('error' => $this->upload->display_errors());
    //         echo "<pre>";
    //         print_r($error);
    //         exit();
    //     }
    //     else {
    //         $fdata = $this->upload->data();
    //         $data_info['userfile'] = 'upload/assets/adm/usr/' . $fdata['file_name'];
    //         }
        
    //     $config2['upload_path'] = './upload/assets/adm/sign/';
    //     $config2['allowed_types'] = 'gif|jpeg|png|jpg';
    //     $config2['max_size'] = '3000000';
    //     $config2['max_width'] = '1024';
    //     $config2['max_height'] = '768';
    //     $this->upload->initialize($config2);
        
    //     if (!$this->upload->do_upload('signfile')){
    //         $error = array('error' => $this->upload->display_errors());
    //         echo "<pre>";
    //         print_r($error);
    //         exit();
    //     }
    //     else {
    //         $fdata = $this->upload->data();
    //         $data_info['signfile'] = 'upload/assets/adm/sign/' . $fdata['file_name'];
    //         }
        
    //         // $data['product_id'] = $this->input->post('product_id', TRUE);
    //         // $data['product_name'] = $this->input->post('product_name', TRUE);
    //         // $data['category'] = $this->input->post('category', TRUE);
        
    //         // $result = $this->super_admin_model->save_product_detail($data);
    //         // $sdata = array();
    //         // $sdata['message'] = "Well done!</strong> You successfully add the Product Details.";
    //         // $this->session->set_userdata($sdata);
    //         // redirect('super_admin/add_product', 'refresh');
    //     }
    // confirm
    public function confirm() 
    {
        $this->__permissionChecker($this->key, $this->url);
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), "pass" => ['confirm' => 'adm/portal/jls_applicant/confirm'], 'title' => "Student Register Confirm", 'uri' => array("langschoolapplicant", "jls_confirm"), 'msg' => "",);
        $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);
        if (empty($this->session->userdata('__initial_regist_data'))) {
            $this->session->set_flashdata('msg_error', 'Something wrong!');
            redirect('adm/portal/jls_applicant/add');
        }
        $data['lists'] = array('sign_file' => $this->session->userdata('__initial_regist_data') ['sign_file'], 'image_file' => $this->session->userdata('__initial_regist_data') ['image_file'],'family_file' => $this->session->userdata('__initial_regist_data') ['family_file'], 'jls_name' => $this->session->userdata('__initial_regist_data') ['jls_name'], 'applicant_name' => $this->session->userdata('__initial_regist_data') ['applicant_name'], 'applicant_name_kanji' => $this->session->userdata('__initial_regist_data') ['applicant_name_kanji'],'register_date' => $this->session->userdata('__initial_regist_data') ['register_date'],'appli_status' => $this->session->userdata('__initial_regist_data') ['appli_status'], 'date_of_birthday' => $this->session->userdata('__initial_regist_data') ['date_of_birthday'], 'place_birth' => $this->session->userdata('__initial_regist_data') ['place_birth'],'province' => $this->session->userdata('__initial_regist_data') ['province'], 'info_age' => $this->session->userdata('__initial_regist_data') ['info_age'], 'course_admission' => $this->session->userdata('__initial_regist_data') ['course_admission'], 'info_nationality' => $this->session->userdata('__initial_regist_data') ['info_nationality'], 'gender' => $this->session->userdata('__initial_regist_data') ['gender'], 'martial_status' => $this->session->userdata('__initial_regist_data') ['martial_status'], 'partaner_name' => $this->session->userdata('__initial_regist_data') ['partaner_name'], 'std_email' => $this->session->userdata('__initial_regist_data') ['std_email'], 'info_phone' => $this->session->userdata('__initial_regist_data') ['info_phone'], 'address' => $this->session->userdata('__initial_regist_data') ['address'], 'course_study_lengh' => $this->session->userdata('__initial_regist_data') ['course_study_lengh'], 'occupation' => $this->session->userdata('__initial_regist_data') ['occupation'], 'place_employment_school' => $this->session->userdata('__initial_regist_data') ['place_employment_school'], 'addr_employment_school' => $this->session->userdata('__initial_regist_data') ['addr_employment_school'], 'tel_employment_school' => $this->session->userdata('__initial_regist_data') ['tel_employment_school'], 'entry_age_ele_school' => $this->session->userdata('__initial_regist_data') ['entry_age_ele_school'], 'duration_jp_language_study' => $this->session->userdata('__initial_regist_data') ['duration_jp_language_study'], 'passport' => $this->session->userdata('__initial_regist_data') ['passport'], 'educational_school_name' => $this->session->userdata('__initial_regist_data') ['educational_school_name'], 'passport_no' => $this->session->userdata('__initial_regist_data') ['passport_no'], 'passport_data_issue' => $this->session->userdata('__initial_regist_data') ['passport_data_issue'], 'passport_data_exp' => $this->session->userdata('__initial_regist_data') ['passport_data_exp'],'passport_issue_authority' => $this->session->userdata('__initial_regist_data') ['passport_issue_authority'], 'military_service' => $this->session->userdata('__initial_regist_data') ['military_service'],'military_service_details' => $this->session->userdata('__initial_regist_data') ['military_service_details'], 'family_mail' => $this->session->userdata('__initial_regist_data') ['family_mail'], 'family_tel' => $this->session->userdata('__initial_regist_data') ['family_tel'], 'family_address' => $this->session->userdata('__initial_regist_data') ['family_address'],'created_at' => $this->session->userdata('__initial_regist_data') ['created_at'],'updated_at' => $this->session->userdata('__initial_regist_data') ['updated_at']);
        $data['data_details'] = array('have_you_visited_jp' => $this->session->userdata('__initial_regist_data1') ['have_you_visited_jp'],'visited_jp_status' => $this->session->userdata('__initial_regist_data1') ['visited_jp_status'],'return_other' => $this->session->userdata('__initial_regist_data1') ['return_other'],'eligibility_non_issuance' => $this->session->userdata('__initial_regist_data1') ['eligibility_non_issuance'],'ja_plan_to_stay_with_them' => $this->session->userdata('__initial_regist_data1') ['ja_plan_to_stay_with_them'],'employment_experience' => $this->session->userdata('__initial_regist_data1') ['employment_experience'],'jplearn_experience' => $this->session->userdata('__initial_regist_data1') ['jplearn_experience'],'jplearn_achievement' => $this->session->userdata('__initial_regist_data1') ['jplearn_achievement'],'family_in_japan' => $this->session->userdata('__initial_regist_data1') ['family_in_japan'], 'visited_date' => $this->session->userdata('__initial_regist_data1') ['visited_date'],'entry_time' => $this->session->userdata('__initial_regist_data1') ['entry_time'], 'date_of_departure' => $this->session->userdata('__initial_regist_data1') ['date_of_departure'], 'visa_type' => $this->session->userdata('__initial_regist_data1') ['visa_type'], 'school_apply_before_japan' => $this->session->userdata('__initial_regist_data1') ['school_apply_before_japan'], 'aimed_occupational_category' => $this->session->userdata('__initial_regist_data1') ['aimed_occupational_category'], 'will_you_return' => $this->session->userdata('__initial_regist_data1') ['will_you_return'], 'school_apply_date' => $this->session->userdata('__initial_regist_data1') ['school_apply_date'], 'school_apply_status' => $this->session->userdata('__initial_regist_data1') ['school_apply_status'], 'school_apply_name' => $this->session->userdata('__initial_regist_data1') ['school_apply_name'], 'immigration_office' => $this->session->userdata('__initial_regist_data1') ['immigration_office'], 'immigration_result' => $this->session->userdata('__initial_regist_data1') ['immigration_result'],'immigration_reason' => $this->session->userdata('__initial_regist_data1') ['immigration_reason'],'graduate_date' => $this->session->userdata('__initial_regist_data1') ['graduate_date'], 'COE_reject' => $this->session->userdata('__initial_regist_data1') ['COE_reject'], 'place_apply_visa' => $this->session->userdata('__initial_regist_data1') ['place_apply_visa'], 'family_language' => $this->session->userdata('__initial_regist_data1') ['family_language'],
         'eligibility_have' => $this->session->userdata('__initial_regist_data1')['eligibility_have'],
        //  'eligibility_time' => $this->session->userdata('__initial_regist_data1')['eligibility_time'],
        //  'eligibility_purpose' => $this->session->userdata('__initial_regist_data1')['eligibility_purpose'],
        //  'eligibility_date' => $this->session->userdata('__initial_regist_data1')['eligibility_date'],
        'provide_english' => $this->session->userdata('__initial_regist_data1') ['provide_english'], 'accompanying_person' => $this->session->userdata('__initial_regist_data1') ['accompanying_person'],'accompanying_marital_status' => $this->session->userdata('__initial_regist_data1') ['accompanying_marital_status'], 'understand_language' => $this->session->userdata('__initial_regist_data1') ['understand_language'], 'criminal_record' => $this->session->userdata('__initial_regist_data1') ['criminal_record'], 'criminal_record_details' => $this->session->userdata('__initial_regist_data1') ['criminal_record_details'],'eligibility_details' => $this->session->userdata('__initial_regist_data1') ['eligibility_details'], 'criminal_record_when' => $this->session->userdata('__initial_regist_data1') ['criminal_record_when'], 'departure_deportation' => $this->session->userdata('__initial_regist_data1') ['departure_deportation'], 'current_status' => $this->session->userdata('__initial_regist_data1') ['current_status'], 'current_status_school_name' => $this->session->userdata('__initial_regist_data1') ['current_status_school_name'], 'current_status_school_major' => $this->session->userdata('__initial_regist_data1') ['current_status_school_major'], 'current_status_school_grade' => $this->session->userdata('__initial_regist_data1') ['current_status_school_grade'], 'expected_month' => $this->session->userdata('__initial_regist_data1') ['expected_month'], 'expected_year' => $this->session->userdata('__initial_regist_data1') ['expected_year'], 'specific_plans_after_graduating' => $this->session->userdata('__initial_regist_data1') ['specific_plans_after_graduating'], 'specific_plan_type_schools' => $this->session->userdata('__initial_regist_data1') ['specific_plan_type_schools'], 'specific_plan_school_name' => $this->session->userdata('__initial_regist_data1') ['specific_plan_school_name'], 'specific_plan_major' => $this->session->userdata('__initial_regist_data1') ['specific_plan_major'], 'purpose_studying_in_japanese' => $this->session->userdata('__initial_regist_data1') ['purpose_studying_in_japanese'], 'entry_purpose1' => $this->session->userdata('__initial_regist_data1') ['entry_purpose1']);
        //$data['lists2'] = array('name' => $this->session->userdata('__initial_regist_data2') ['name'], 'age' => $this->session->userdata('__initial_regist_data2') ['age'], 'address' => $this->session->userdata('__initial_regist_data2') ['address'], 'tel' => $this->session->userdata('__initial_regist_data2') ['tel']);
        $data['other_info'] = array('select_name_of_course' => $this->session->userdata('__initial_regist_data11') ['select_name_of_course'],'future_plan_after_graduating' => $this->session->userdata('__initial_regist_data11') ['future_plan_after_graduating'],'future_plan_checkdata01' => $this->session->userdata('__initial_regist_data11') ['future_plan_checkdata01'],'spec_other' => $this->session->userdata('__initial_regist_data11') ['spec_other'],'twyrs_crs_start_date' => $this->session->userdata('__initial_regist_data11') ['twyrs_crs_start_date'], 'twyrs_crs_end_date' => $this->session->userdata('__initial_regist_data11') ['twyrs_crs_end_date'],'onenine_crs_start_date' => $this->session->userdata('__initial_regist_data11') ['onenine_crs_start_date'], 'onenine_crs_end_date' => $this->session->userdata('__initial_regist_data11') ['onenine_crs_end_date'],'onefive_crs_start_date' => $this->session->userdata('__initial_regist_data11') ['onefive_crs_start_date'], 'onefive_crs_end_date' => $this->session->userdata('__initial_regist_data11') ['onefive_crs_end_date'],'onethree_crs_start_date' => $this->session->userdata('__initial_regist_data11') ['onethree_crs_start_date'], 'onethree_crs_end_date' => $this->session->userdata('__initial_regist_data11') ['onethree_crs_end_date'],'one_crs_start_date' => $this->session->userdata('__initial_regist_data11') ['one_crs_start_date'], 'one_crs_end_date' => $this->session->userdata('__initial_regist_data11') ['one_crs_end_date'],'student_work_details' => $this->session->userdata('__initial_regist_data11') ['student_work_details'],'eligibility_visa' => $this->session->userdata('__initial_regist_data11') ['eligibility_visa'],'issued_date' => $this->session->userdata('__initial_regist_data11') ['issued_date'],'intended_roll' => $this->session->userdata('__initial_regist_data11') ['intended_roll'],'defraying_details' => $this->session->userdata('__initial_regist_data11') ['defraying_details'],'family_inJpfri' => $this->session->userdata('__initial_regist_data11') ['family_inJpfri'],'japan_four_times' => $this->session->userdata('__initial_regist_data11') ['japan_four_times'],'father_work_place' => $this->session->userdata('__initial_regist_data11') ['father_work_place'],  'type_work_father' => $this->session->userdata('__initial_regist_data11') ['type_work_father'], 'mother_work_place' => $this->session->userdata('__initial_regist_data11') ['mother_work_place'], 'type_work_mother' => $this->session->userdata('__initial_regist_data11') ['type_work_mother'], 'language_can_you_use' => $this->session->userdata('__initial_regist_data11') ['language_can_you_use'], 'you_are_good_subject' => $this->session->userdata('__initial_regist_data11') ['you_are_good_subject'], 'special_ability' => $this->session->userdata('__initial_regist_data11') ['special_ability'],'hobbies' => $this->session->userdata('__initial_regist_data11') ['hobbies'], 'allergic_medicine' => $this->session->userdata('__initial_regist_data11') ['allergic_medicine'], 'allergic_medicine_details' => $this->session->userdata('__initial_regist_data11') ['allergic_medicine_details'], 'consent_name' => $this->session->userdata('__initial_regist_data11') ['consent_name'], 'consent_relation' => $this->session->userdata('__initial_regist_data11') ['consent_relation'], 'consent_address' => $this->session->userdata('__initial_regist_data11') ['consent_address'], 'consent_email' => $this->session->userdata('__initial_regist_data11') ['consent_email'], 'consent_tel' => $this->session->userdata('__initial_regist_data11') ['consent_tel'], 'registered_enrollment' => $this->session->userdata('__initial_regist_data11') ['registered_enrollment'], 'total_period_edu' => $this->session->userdata('__initial_regist_data11') ['total_period_edu'], 'jp_certificate_number' => $this->session->userdata('__initial_regist_data11') ['jp_certificate_number'], 'what_todo_japan' => $this->session->userdata('__initial_regist_data11') ['what_todo_japan'], 'defraying_name' => $this->session->userdata('__initial_regist_data11') ['defraying_name'],'defraying_tel' => $this->session->userdata('__initial_regist_data11') ['defraying_tel'], 'defraying_address' => $this->session->userdata('__initial_regist_data11') ['defraying_address'], 'defraying_relation' => $this->session->userdata('__initial_regist_data11') ['defraying_relation'], 'defraying_company' => $this->session->userdata('__initial_regist_data11') ['defraying_company'], 'defraying_work_tel' => $this->session->userdata('__initial_regist_data11') ['defraying_work_tel'], 'defraying_sign' => $this->session->userdata('__initial_regist_data11') ['defraying_sign'], 'defraying_date' => $this->session->userdata('__initial_regist_data11') ['defraying_date'], 'six_tuition_fee' => $this->session->userdata('__initial_regist_data11') ['six_tuition_fee'], 'first_year_tuitioin_fee' => $this->session->userdata('__initial_regist_data11') ['first_year_tuitioin_fee'], 'second_year_tuitioin_fee' => $this->session->userdata('__initial_regist_data11') ['second_year_tuitioin_fee'], 'tuition_study_period' => $this->session->userdata('__initial_regist_data11') ['tuition_study_period'],'living_expense_amount' => $this->session->userdata('__initial_regist_data11') ['living_expense_amount'], 'payment_method' => $this->session->userdata('__initial_regist_data11') ['payment_method']);
        if($this->session->userdata('__initial_regist_data3') ['edu_name'] != null){
        $data['lists3'] = array(            
            'edu_name' => $this->session->userdata('__initial_regist_data3') ['edu_name'], 'edu_address' => $this->session->userdata('__initial_regist_data3') ['edu_address'], 'edu_start_date' => $this->session->userdata('__initial_regist_data3') ['edu_start_date'], 'edu_end_date' => $this->session->userdata('__initial_regist_data3') ['edu_end_date'], 'edu_year' => $this->session->userdata('__initial_regist_data3') ['edu_year']);
         }
        $data['data_lang_study'] = array('jp_name' => $this->session->userdata('__initial_regist_data4') ['jp_name'],'jp_level' => $this->session->userdata('__initial_regist_data4') ['jp_level'],'jp_status' => $this->session->userdata('__initial_regist_data4') ['jp_status'], 'jp_address' => $this->session->userdata('__initial_regist_data4') ['jp_address'], 'jp_start_date' => $this->session->userdata('__initial_regist_data4') ['jp_start_date'], 'jp_end_date' => $this->session->userdata('__initial_regist_data4') ['jp_end_date'], 'jp_hour' => $this->session->userdata('__initial_regist_data4') ['jp_hour'],'jp_year' => $this->session->userdata('__initial_regist_data4') ['jp_year']);
        $data['data_achievement_jp'] = array('achiv_name' => $this->session->userdata('__initial_regist_data5') ['achiv_name'], 'level' => $this->session->userdata('__initial_regist_data5') ['level'], 'exam_year' => $this->session->userdata('__initial_regist_data5') ['exam_year'], 'score' => $this->session->userdata('__initial_regist_data5') ['score'], 'result' => $this->session->userdata('__initial_regist_data5') ['result'], 'date_qualification' => $this->session->userdata('__initial_regist_data5') ['date_qualification']);
        $data['data_jp_lang_going_to_take'] = array('going_name' => $this->session->userdata('__initial_regist_data6') ['going_name'], 'going_level' => $this->session->userdata('__initial_regist_data6') ['going_level'],'going_date' => $this->session->userdata('__initial_regist_data6') ['going_date'],);
        $data['data_jp_ever_been_japan'] = array('shortVisa_purpose' => $this->session->userdata('__initial_regist_data12') ['shortVisa_purpose'], 'shortVisa_status' => $this->session->userdata('__initial_regist_data12') ['shortVisa_status'],'shortVisa_period' => $this->session->userdata('__initial_regist_data12') ['shortVisa_period'],'shortVisa_prepare' => $this->session->userdata('__initial_regist_data12') ['shortVisa_prepare']);
        $data['data_history_employment'] = array('emp_name' => $this->session->userdata('__initial_regist_data7') ['emp_name'], 'emp_address' => $this->session->userdata('__initial_regist_data7') ['emp_address'], 'emp_start_date' => $this->session->userdata('__initial_regist_data7') ['emp_start_date'], 'emp_end_date' => $this->session->userdata('__initial_regist_data7') ['emp_end_date'], 'emp_year' => $this->session->userdata('__initial_regist_data7') ['emp_year'], 'emp_job_description' => $this->session->userdata('__initial_regist_data7') ['emp_job_description']);
        $data['data_family_member'] = array('fam_name' => $this->session->userdata('__initial_regist_data8') ['fam_name'], 'fam_age' => $this->session->userdata('__initial_regist_data8') ['fam_age'],'fam_gender' => $this->session->userdata('__initial_regist_data8') ['fam_gender'],'fam_relationship' => $this->session->userdata('__initial_regist_data8') ['fam_relationship'],'fam_nationality' => $this->session->userdata('__initial_regist_data8') ['fam_nationality'], 'fam_work_place' => $this->session->userdata('__initial_regist_data8') ['fam_work_place'], 'fam_birthday' => $this->session->userdata('__initial_regist_data8') ['fam_birthday'], 'fam_occupation' => $this->session->userdata('__initial_regist_data8') ['fam_occupation'], 'fam_annual_income' => $this->session->userdata('__initial_regist_data8') ['fam_annual_income'], 'fam_address' => $this->session->userdata('__initial_regist_data8') ['fam_address'], 'fam_length_sevice' => $this->session->userdata('__initial_regist_data8') ['fam_length_sevice']);
        $data['data_family_japan'] = array('ja_fam_name' => $this->session->userdata('__initial_regist_data9') ['ja_fam_name'],'ja_fam_date_birth' => $this->session->userdata('__initial_regist_data9') ['ja_fam_date_birth'],'ja_fam_address' => $this->session->userdata('__initial_regist_data9') ['ja_fam_address'],'residence_card_no' => $this->session->userdata('__initial_regist_data9') ['residence_card_no'], 'ja_fam_age' => $this->session->userdata('__initial_regist_data9') ['ja_fam_age'], 'ja_fam_relationship' => $this->session->userdata('__initial_regist_data9') ['ja_fam_relationship'], 'ja_fam_residing_applicant' => $this->session->userdata('__initial_regist_data9') ['ja_fam_residing_applicant'], 'ja_fam_nationality' => $this->session->userdata('__initial_regist_data9') ['ja_fam_nationality'], 'ja_fam_visa_status' => $this->session->userdata('__initial_regist_data9') ['ja_fam_visa_status'], 'ja_fam_work_place' => $this->session->userdata('__initial_regist_data9') ['ja_fam_work_place'],'ja_certificate_alien' => $this->session->userdata('__initial_regist_data9') ['ja_certificate_alien']);
        $data['data_previous_stay_japan'] = array('entry_date' => $this->session->userdata('__initial_regist_data10') ['entry_date'], 'arrival_date' => $this->session->userdata('__initial_regist_data10') ['arrival_date'], 'depature_date' => $this->session->userdata('__initial_regist_data10') ['depature_date'],'pre_stay_visa' => $this->session->userdata('__initial_regist_data10') ['pre_stay_visa'], 'status' => $this->session->userdata('__initial_regist_data10') ['status'], 'entry_purpose' => $this->session->userdata('__initial_regist_data10') ['entry_purpose']);
        $data['data_financial_sponsor'] = array('fin_name' => $this->session->userdata('__initial_regist_data2') ['fin_name'], 'fin_age' => $this->session->userdata('__initial_regist_data2') ['fin_age'], 'fin_relationship' => $this->session->userdata('__initial_regist_data2') ['fin_relationship'], 'fin_address' => $this->session->userdata('__initial_regist_data2') ['fin_address'], 'tel' => $this->session->userdata('__initial_regist_data2') ['tel'], 'email' => $this->session->userdata('__initial_regist_data2') ['email'], 'fin_occupation' => $this->session->userdata('__initial_regist_data2') ['fin_occupation'], 'work_place' => $this->session->userdata('__initial_regist_data2') ['work_place'], 'annual_income' => $this->session->userdata('__initial_regist_data2') ['annual_income'],'fin_visa' => $this->session->userdata('__initial_regist_data2') ['fin_visa'], 'amount_saving_for_study_abroad' => $this->session->userdata('__initial_regist_data2') ['amount_saving_for_study_abroad'], 'amount_of_saving_which_proved' => $this->session->userdata('__initial_regist_data2') ['amount_of_saving_which_proved'], 'start_work_date' => $this->session->userdata('__initial_regist_data2') ['start_work_date'],);
        $this->session->userdata('__initial_regist_data3') ['edu_name'];
        $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $data);
        $this->load->view('dashboard/langschoolstudent/confirm', $this->data);
        // $this->session->userdata('__initial_regist_data4')['jp_name'];
        // $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $data);
        // $this->load->view('dashboard/langschoolstudent/confirm', $this->data);
        
    }

    public function store() 
    {
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), "pass" => ['confirm' => 'adm/portal/jls_applicant/confirm'], 'title' => "JLS Register Confirm", 'msg' => "",);
        $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);
        if ($_POST) {
            //$this->form_validation->set_rules('jls_name', 'jls name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('applicant_name', 'applicant name', 'trim|required|xss_clean');
            // $this->form_validation->set_message('required', 'You must enter a %s!');
            // $this->form_validation->set_message('is_unique', 'Your %s is already exits!');
            // $this->form_validation->set_message('numeric', 'The %s always allow only numbers!');
            // $this->form_validation->set_message('valid_email', 'The %s must be valid!');
            if ($this->form_validation->run() === false) {
                $this->session->set_flashdata('msg_error', 'Something wrong!');
                redirect('adm/portal/jls_applicant/confirm');
            }
            else {
                $userData = array('sign_file' => $this->session->userdata('__initial_regist_data') ['sign_file'], 'image_file' => $this->session->userdata('__initial_regist_data') ['image_file'],'family_file' => $this->session->userdata('__initial_regist_data') ['family_file'], 'jls_name' => $this->session->userdata('__initial_regist_data') ['jls_name'], 'applicant_name' => $this->session->userdata('__initial_regist_data') ['applicant_name'], 'applicant_name_kanji' => $this->session->userdata('__initial_regist_data') ['applicant_name_kanji'],'register_date' => $this->session->userdata('__initial_regist_data') ['register_date'],'appli_status' => $this->session->userdata('__initial_regist_data') ['appli_status'], 'date_of_birthday' => $this->session->userdata('__initial_regist_data') ['date_of_birthday'], 'place_birth' => $this->session->userdata('__initial_regist_data') ['place_birth'],'province' => $this->session->userdata('__initial_regist_data') ['province'],  'info_age' => $this->session->userdata('__initial_regist_data') ['info_age'], 'info_nationality' => $this->session->userdata('__initial_regist_data') ['info_nationality'], 'gender' => $this->session->userdata('__initial_regist_data') ['gender'], 'martial_status' => $this->session->userdata('__initial_regist_data') ['martial_status'], 'partaner_name' => $this->session->userdata('__initial_regist_data') ['partaner_name'], 'std_email' => $this->session->userdata('__initial_regist_data') ['std_email'], 'info_phone' => $this->session->userdata('__initial_regist_data') ['info_phone'], 'address' => $this->session->userdata('__initial_regist_data') ['address'], 'course_admission' => $this->session->userdata('__initial_regist_data') ['course_admission'], 'course_study_lengh' => $this->session->userdata('__initial_regist_data') ['course_study_lengh'], 'occupation' => $this->session->userdata('__initial_regist_data') ['occupation'], 'place_employment_school' => $this->session->userdata('__initial_regist_data') ['place_employment_school'], 'addr_employment_school' => $this->session->userdata('__initial_regist_data') ['addr_employment_school'], 'tel_employment_school' => $this->session->userdata('__initial_regist_data') ['tel_employment_school'], 'entry_age_ele_school' => $this->session->userdata('__initial_regist_data') ['entry_age_ele_school'], 'duration_jp_language_study' => $this->session->userdata('__initial_regist_data') ['duration_jp_language_study'], 'passport' => $this->session->userdata('__initial_regist_data') ['passport'], 'educational_school_name' => $this->session->userdata('__initial_regist_data') ['educational_school_name'], 'passport_no' => $this->session->userdata('__initial_regist_data') ['passport_no'], 'passport_data_issue' => $this->session->userdata('__initial_regist_data') ['passport_data_issue'], 'passport_data_exp' => $this->session->userdata('__initial_regist_data') ['passport_data_exp'],'passport_issue_authority' => $this->session->userdata('__initial_regist_data') ['passport_issue_authority'], 'military_service' => $this->session->userdata('__initial_regist_data') ['military_service'],'military_service_details' => $this->session->userdata('__initial_regist_data') ['military_service_details'], 'family_mail' => $this->session->userdata('__initial_regist_data') ['family_mail'], 'family_tel' => $this->session->userdata('__initial_regist_data') ['family_tel'], 'family_address' => $this->session->userdata('__initial_regist_data') ['family_address'],'created_at' => $this->session->userdata('__initial_regist_data') ['created_at'],'updated_at' => $this->session->userdata('__initial_regist_data') ['updated_at'],);
                $userData = $this->__Xss($userData);
                $applicant_id = $this->Langschoolapplicant_Model->JLSapplicantinfo($userData);
                // var_dump($userData);
                $userdata1 = array('applicant_id' => $applicant_id, 'have_you_visited_jp' => $this->session->userdata('__initial_regist_data1') ['have_you_visited_jp'],'visited_jp_status' => $this->session->userdata('__initial_regist_data1') ['visited_jp_status'],'return_other' => $this->session->userdata('__initial_regist_data1') ['return_other'],'eligibility_non_issuance' => $this->session->userdata('__initial_regist_data1') ['eligibility_non_issuance'],'ja_plan_to_stay_with_them' => $this->session->userdata('__initial_regist_data1') ['ja_plan_to_stay_with_them'],'employment_experience' => $this->session->userdata('__initial_regist_data1') ['employment_experience'],'jplearn_experience' => $this->session->userdata('__initial_regist_data1') ['jplearn_experience'],'jplearn_achievement' => $this->session->userdata('__initial_regist_data1') ['jplearn_achievement'],'family_in_japan' => $this->session->userdata('__initial_regist_data1') ['family_in_japan'], 'visited_date' => $this->session->userdata('__initial_regist_data1') ['visited_date'],'entry_time' => $this->session->userdata('__initial_regist_data1') ['entry_time'], 'date_of_departure' => $this->session->userdata('__initial_regist_data1') ['date_of_departure'], 'visa_type' => $this->session->userdata('__initial_regist_data1') ['visa_type'], 'school_apply_before_japan' => $this->session->userdata('__initial_regist_data1') ['school_apply_before_japan'], 'aimed_occupational_category' => $this->session->userdata('__initial_regist_data1') ['aimed_occupational_category'], 'school_apply_date' => $this->session->userdata('__initial_regist_data1') ['school_apply_date'], 'school_apply_status' => $this->session->userdata('__initial_regist_data1') ['school_apply_status'], 'school_apply_name' => $this->session->userdata('__initial_regist_data1') ['school_apply_name'], 'immigration_office' => $this->session->userdata('__initial_regist_data1') ['immigration_office'], 'immigration_result' => $this->session->userdata('__initial_regist_data1') ['immigration_result'],'immigration_reason' => $this->session->userdata('__initial_regist_data1') ['immigration_reason'],'graduate_date' => $this->session->userdata('__initial_regist_data1') ['graduate_date'], 'COE_reject' => $this->session->userdata('__initial_regist_data1') ['COE_reject'], 'place_apply_visa' => $this->session->userdata('__initial_regist_data1') ['place_apply_visa'], 'family_language' => $this->session->userdata('__initial_regist_data1') ['family_language'],
                 'eligibility_have' => $this->session->userdata('__initial_regist_data1')['eligibility_have'],
                //  'eligibility_time' => $this->session->userdata('__initial_regist_data1')['eligibility_time'],
                //  'eligibility_purpose' => $this->session->userdata('__initial_regist_data1')['eligibility_purpose'],
                //  'eligibility_date' => $this->session->userdata('__initial_regist_data1')['eligibility_date'],
                'provide_english' => $this->session->userdata('__initial_regist_data1') ['provide_english'], 'accompanying_person' => $this->session->userdata('__initial_regist_data1') ['accompanying_person'],'accompanying_marital_status' => $this->session->userdata('__initial_regist_data1') ['accompanying_marital_status'], 'understand_language' => $this->session->userdata('__initial_regist_data1') ['understand_language'], 'criminal_record' => $this->session->userdata('__initial_regist_data1') ['criminal_record'], 'criminal_record_details' => $this->session->userdata('__initial_regist_data1') ['criminal_record_details'],'eligibility_details' => $this->session->userdata('__initial_regist_data1') ['eligibility_details'], 'criminal_record_when' => $this->session->userdata('__initial_regist_data1') ['criminal_record_when'], 'departure_deportation' => $this->session->userdata('__initial_regist_data1') ['departure_deportation'], 'current_status' => $this->session->userdata('__initial_regist_data1') ['current_status'], 'current_status_school_name' => $this->session->userdata('__initial_regist_data1') ['current_status_school_name'], 'current_status_school_major' => $this->session->userdata('__initial_regist_data1') ['current_status_school_major'], 'current_status_school_grade' => $this->session->userdata('__initial_regist_data1') ['current_status_school_grade'], 'expected_month' => $this->session->userdata('__initial_regist_data1') ['expected_month'], 'expected_year' => $this->session->userdata('__initial_regist_data1') ['expected_year'], 'specific_plans_after_graduating' => $this->session->userdata('__initial_regist_data1') ['specific_plans_after_graduating'], 'specific_plan_type_schools' => $this->session->userdata('__initial_regist_data1') ['specific_plan_type_schools'], 'specific_plan_school_name' => $this->session->userdata('__initial_regist_data1') ['specific_plan_school_name'], 'specific_plan_major' => $this->session->userdata('__initial_regist_data1') ['specific_plan_major'], 'will_you_return' => $this->session->userdata('__initial_regist_data1') ['will_you_return'], 'purpose_studying_in_japanese' => $this->session->userdata('__initial_regist_data1') ['purpose_studying_in_japanese'], 'entry_purpose1' => $this->session->userdata('__initial_regist_data1') ['entry_purpose1']);
                $insertChecker = $this->Langschoolapplicant_Model->JLSapplicantdetails($userdata1);
                $other_info = array('applicant_id' => $applicant_id, 'select_name_of_course' => $this->session->userdata('__initial_regist_data11') ['select_name_of_course'],'future_plan_after_graduating' => $this->session->userdata('__initial_regist_data11') ['future_plan_after_graduating'],'future_plan_checkdata01' => $this->session->userdata('__initial_regist_data11') ['future_plan_checkdata01'],'spec_other' => $this->session->userdata('__initial_regist_data11') ['spec_other'],'twyrs_crs_start_date' => $this->session->userdata('__initial_regist_data11') ['twyrs_crs_start_date'],'twyrs_crs_end_date' => $this->session->userdata('__initial_regist_data11') ['twyrs_crs_end_date'],'onenine_crs_start_date' => $this->session->userdata('__initial_regist_data11') ['onenine_crs_start_date'],'onenine_crs_end_date' => $this->session->userdata('__initial_regist_data11') ['onenine_crs_end_date'],'onefive_crs_start_date' => $this->session->userdata('__initial_regist_data11') ['onefive_crs_start_date'],'onefive_crs_end_date' => $this->session->userdata('__initial_regist_data11') ['onefive_crs_end_date'],'onethree_crs_start_date' => $this->session->userdata('__initial_regist_data11') ['onethree_crs_start_date'],'onethree_crs_end_date' => $this->session->userdata('__initial_regist_data11') ['onethree_crs_end_date'],'one_crs_start_date' => $this->session->userdata('__initial_regist_data11') ['one_crs_start_date'],'one_crs_end_date' => $this->session->userdata('__initial_regist_data11') ['one_crs_end_date'],'student_work_details' => $this->session->userdata('__initial_regist_data11') ['student_work_details'],'eligibility_visa' => $this->session->userdata('__initial_regist_data11') ['eligibility_visa'],'issued_date' => $this->session->userdata('__initial_regist_data11') ['issued_date'],'intended_roll' => $this->session->userdata('__initial_regist_data11') ['intended_roll'],'defraying_details' => $this->session->userdata('__initial_regist_data11') ['defraying_details'],'family_inJpfri' => $this->session->userdata('__initial_regist_data11') ['family_inJpfri'],'japan_four_times' => $this->session->userdata('__initial_regist_data11') ['japan_four_times'],'father_work_place' => $this->session->userdata('__initial_regist_data11') ['father_work_place'], 'type_work_father' => $this->session->userdata('__initial_regist_data11') ['type_work_father'], 'mother_work_place' => $this->session->userdata('__initial_regist_data11') ['mother_work_place'], 'type_work_mother' => $this->session->userdata('__initial_regist_data11') ['type_work_mother'], 'language_can_you_use' => $this->session->userdata('__initial_regist_data11') ['language_can_you_use'], 'you_are_good_subject' => $this->session->userdata('__initial_regist_data11') ['you_are_good_subject'], 'special_ability' => $this->session->userdata('__initial_regist_data11') ['special_ability'],'hobbies' => $this->session->userdata('__initial_regist_data11') ['hobbies'], 'allergic_medicine' => $this->session->userdata('__initial_regist_data11') ['allergic_medicine'], 'allergic_medicine_details' => $this->session->userdata('__initial_regist_data11') ['allergic_medicine_details'], 'consent_name' => $this->session->userdata('__initial_regist_data11') ['consent_name'], 'consent_relation' => $this->session->userdata('__initial_regist_data11') ['consent_relation'], 'consent_address' => $this->session->userdata('__initial_regist_data11') ['consent_address'], 'consent_email' => $this->session->userdata('__initial_regist_data11') ['consent_email'], 'consent_tel' => $this->session->userdata('__initial_regist_data11') ['consent_tel'], 'registered_enrollment' => $this->session->userdata('__initial_regist_data11') ['registered_enrollment'], 'total_period_edu' => $this->session->userdata('__initial_regist_data11') ['total_period_edu'], 'jp_certificate_number' => $this->session->userdata('__initial_regist_data11') ['jp_certificate_number'], 'what_todo_japan' => $this->session->userdata('__initial_regist_data11') ['what_todo_japan'], 'defraying_name' => $this->session->userdata('__initial_regist_data11') ['defraying_name'],'defraying_tel' => $this->session->userdata('__initial_regist_data11') ['defraying_tel'],'defraying_address' => $this->session->userdata('__initial_regist_data11') ['defraying_address'], 'defraying_relation' => $this->session->userdata('__initial_regist_data11') ['defraying_relation'], 'defraying_company' => $this->session->userdata('__initial_regist_data11') ['defraying_company'], 'defraying_work_tel' => $this->session->userdata('__initial_regist_data11') ['defraying_work_tel'], 'defraying_sign' => $this->session->userdata('__initial_regist_data11') ['defraying_sign'], 'defraying_date' => $this->session->userdata('__initial_regist_data11') ['defraying_date'], 'six_tuition_fee' => $this->session->userdata('__initial_regist_data11') ['six_tuition_fee'], 'first_year_tuitioin_fee' => $this->session->userdata('__initial_regist_data11') ['first_year_tuitioin_fee'], 'second_year_tuitioin_fee' => $this->session->userdata('__initial_regist_data11') ['second_year_tuitioin_fee'], 'tuition_study_period' => $this->session->userdata('__initial_regist_data11') ['tuition_study_period'],'living_expense_amount' => $this->session->userdata('__initial_regist_data11') ['living_expense_amount'], 'payment_method' => $this->session->userdata('__initial_regist_data11') ['payment_method']);
                $insertCheckerInfo = $this->Langschoolapplicant_Model->JLSapplicantotherinfo($other_info);
                $data_financial_sponsor = array('applicant_id' => $applicant_id, 'fin_name' => $this->session->userdata('__initial_regist_data2') ['fin_name'], 'fin_age' => $this->session->userdata('__initial_regist_data2') ['fin_age'], 'fin_relationship' => $this->session->userdata('__initial_regist_data2') ['fin_relationship'], 'fin_address' => $this->session->userdata('__initial_regist_data2') ['fin_address'], 'tel' => $this->session->userdata('__initial_regist_data2') ['tel'], 'email' => $this->session->userdata('__initial_regist_data2') ['email'], 'fin_occupation' => $this->session->userdata('__initial_regist_data2') ['fin_occupation'], 'work_place' => $this->session->userdata('__initial_regist_data2') ['work_place'],'fin_visa' => $this->session->userdata('__initial_regist_data2') ['fin_visa'], 'annual_income' => $this->session->userdata('__initial_regist_data2') ['annual_income'], 'amount_saving_for_study_abroad' => $this->session->userdata('__initial_regist_data2') ['amount_saving_for_study_abroad'], 'amount_of_saving_which_proved' => $this->session->userdata('__initial_regist_data2') ['amount_of_saving_which_proved'], 'start_work_date' => $this->session->userdata('__initial_regist_data2') ['start_work_date'],);
                $insertChecker2 = $this->Langschoolapplicant_Model->JLSfinancialsponser($data_financial_sponsor);
                $edu_name = $this->session->userdata('__initial_regist_data3') ['edu_name'];
                $edu_address = $this->session->userdata('__initial_regist_data3') ['edu_address'];
                $edu_start_date = $this->session->userdata('__initial_regist_data3') ['edu_start_date'];
                $edu_end_date = $this->session->userdata('__initial_regist_data3') ['edu_end_date'];
                $edu_year = $this->session->userdata('__initial_regist_data3') ['edu_year'];
                $count1 = count($this->session->userdata('__initial_regist_data3') ['edu_name']);
                for ($i = 0;$i < $count1;$i++) {                    
                    if($edu_name[$i] != Null){
                        $data_edu_history = array('applicant_id' => $applicant_id, 'edu_name' => $edu_name[$i], 'address' => $edu_address[$i], 'start_date' => $edu_start_date[$i], 'end_date' => $edu_end_date[$i], 'year' => $edu_year[$i],);
                    $insertChecker3 = $this->db->insert('JLS_educational_history', $data_edu_history);
                    }
                }
                $jp_name = $this->session->userdata('__initial_regist_data4') ['jp_name'];
                $jp_level = $this->session->userdata('__initial_regist_data4') ['jp_level'];
                $jp_status = $this->session->userdata('__initial_regist_data4') ['jp_status'];
                $jp_address = $this->session->userdata('__initial_regist_data4') ['jp_address'];
                $jp_start_date = $this->session->userdata('__initial_regist_data4') ['jp_start_date'];
                $jp_end_date = $this->session->userdata('__initial_regist_data4') ['jp_end_date'];
                $jp_hour = $this->session->userdata('__initial_regist_data4') ['jp_hour'];
                $jp_year = $this->session->userdata('__initial_regist_data4') ['jp_year'];
                $count2 = count($this->session->userdata('__initial_regist_data4') ['jp_name']);
                for ($i = 0;$i < $count2;$i++) {
                    if($jp_name[$i] != Null){
                    $data_lang_study = array('applicant_id' => $applicant_id, 'jp_name' => $jp_name[$i],'jp_level' => $jp_level[$i],'jp_status' => $jp_status[$i], 'address' => $jp_address[$i], 'start_date' => $jp_start_date[$i], 'end_date' => $jp_end_date[$i], 'hour' => $jp_hour[$i],'jp_year' => $jp_year[$i],);
                    $insertChecker4 = $this->db->insert('JLS_previous_jp_lang_study', $data_lang_study);
                    }
                }
                $achiv_name = $this->session->userdata('__initial_regist_data5') ['achiv_name'];
                $level = $this->session->userdata('__initial_regist_data5') ['level'];
                $exam_year = $this->session->userdata('__initial_regist_data5') ['exam_year'];
                $score = $this->session->userdata('__initial_regist_data5') ['score'];
                $result = $this->session->userdata('__initial_regist_data5') ['result'];
                $date_qualification = $this->session->userdata('__initial_regist_data5') ['date_qualification'];
                $count3 = count($this->session->userdata('__initial_regist_data5') ['achiv_name']);
                for ($i = 0;$i < $count3;$i++) {
                    if($achiv_name[$i] != Null){
                    $data_achievement_jp = array('applicant_id' => $applicant_id, 'achiv_name' => $achiv_name[$i], 'level' => $level[$i], 'exam_year' => $exam_year[$i], 'score' => $score[$i], 'result' => $result[$i], 'date_qualification' => $date_qualification[$i],);
                    $insertChecker5 = $this->db->insert('JLS_achievement_jp_lang_test', $data_achievement_jp);
                    }
                }
                $going_name = $this->session->userdata('__initial_regist_data6') ['going_name'];
                $going_level = $this->session->userdata('__initial_regist_data6') ['going_level'];
                $going_date = $this->session->userdata('__initial_regist_data6') ['going_date'];
                $count4 = count($this->session->userdata('__initial_regist_data6') ['going_name']);
                for ($i = 0;$i < $count4;$i++) {
                    if($going_name[$i] != Null){
                    $data_jp_lang_going_to_take = array('applicant_id' => $applicant_id, 'going_name' => $going_name[$i], 'going_level' => $going_level[$i],'going_date' => $going_date[$i]);
                    $insertChecker3 = $this->db->insert('JLS_name_jp_lang_tests_going_to_take', $data_jp_lang_going_to_take);
                    }
                }
                $shortVisa_purpose = $this->session->userdata('__initial_regist_data12') ['shortVisa_purpose'];
                $shortVisa_status = $this->session->userdata('__initial_regist_data12') ['shortVisa_status'];
                $shortVisa_period = $this->session->userdata('__initial_regist_data12') ['shortVisa_period'];
                $shortVisa_prepare = $this->session->userdata('__initial_regist_data12') ['shortVisa_prepare'];
                $count7 = count($this->session->userdata('__initial_regist_data12') ['shortVisa_purpose']);
                for ($i = 0;$i < $count7;$i++) {
                    if($shortVisa_purpose[$i] != Null){
                    $data_jp_ever_been_japan = array('applicant_id' => $applicant_id, 'shortVisa_purpose' => $shortVisa_purpose[$i], 'shortVisa_status' => $shortVisa_status[$i],'shortVisa_period' => $shortVisa_period[$i],'shortVisa_prepare' => $shortVisa_prepare[$i]);
                    $insertChecker3 = $this->db->insert('JLS_ever_been_japan', $data_jp_ever_been_japan);
                    }
                }
                $emp_name = $this->session->userdata('__initial_regist_data7') ['emp_name'];
                $emp_address = $this->session->userdata('__initial_regist_data7') ['emp_address'];
                $emp_start_date = $this->session->userdata('__initial_regist_data7') ['emp_start_date'];
                $emp_end_date = $this->session->userdata('__initial_regist_data7') ['emp_end_date'];
                $emp_year = $this->session->userdata('__initial_regist_data7') ['emp_year'];
                $emp_job_description = $this->session->userdata('__initial_regist_data7') ['emp_job_description'];
                $count3 = count($this->session->userdata('__initial_regist_data7') ['emp_name']);
                for ($i = 0;$i < $count3;$i++) {
                    if($emp_name[$i] != Null){
                    $data_history_employment = array('applicant_id' => $applicant_id, 'emp_name' => $emp_name[$i], 'address' => $emp_address[$i], 'start_date' => $emp_start_date[$i], 'end_date' => $emp_end_date[$i], 'year' => $emp_year[$i], 'job_description' => $emp_job_description[$i],);
                    $insertChecker6 = $this->db->insert('JLS_history_employment', $data_history_employment);
                    }
                }
                $fam_name = $this->session->userdata('__initial_regist_data8') ['fam_name'];
                $fam_relationship = $this->session->userdata('__initial_regist_data8') ['fam_relationship'];
                $fam_nationality = $this->session->userdata('__initial_regist_data8') ['fam_nationality'];
                $fam_age = $this->session->userdata('__initial_regist_data8') ['fam_age'];
                $fam_gender = $this->session->userdata('__initial_regist_data8') ['fam_gender'];
                $fam_work_place = $this->session->userdata('__initial_regist_data8') ['fam_work_place'];
                $fam_birthday = $this->session->userdata('__initial_regist_data8') ['fam_birthday'];
                $fam_occupation = $this->session->userdata('__initial_regist_data8') ['fam_occupation'];
                $fam_annual_income = $this->session->userdata('__initial_regist_data8') ['fam_annual_income'];
                $fam_address = $this->session->userdata('__initial_regist_data8') ['fam_address'];
                $fam_length_sevice = $this->session->userdata('__initial_regist_data8') ['fam_length_sevice'];
                $count4 = count($this->session->userdata('__initial_regist_data8') ['fam_name']);
                for ($i = 0;$i < $count4;$i++) {
                    if($fam_name[$i] != Null){
                    $data_family_member = array('applicant_id' => $applicant_id, 'fam_name' => $fam_name[$i], 'fam_age' => $fam_age[$i],'fam_gender' => $fam_gender[$i],'fam_relationship' => $fam_relationship[$i],'fam_nationality' => $fam_nationality[$i], 'work_place' => $fam_work_place[$i], 'birthday' => $fam_birthday[$i], 'occupation' => $fam_occupation[$i], 'annual_income' => $fam_annual_income[$i], 'address' => $fam_address[$i], 'length_sevice' => $fam_length_sevice[$i]);
                    $insertChecker7 = $this->db->insert('JLS_family_member', $data_family_member);
                    }
                }
                $ja_fam_name = $this->session->userdata('__initial_regist_data9') ['ja_fam_name'];
                $ja_fam_date_birth = $this->session->userdata('__initial_regist_data9') ['ja_fam_date_birth'];
                $ja_fam_address = $this->session->userdata('__initial_regist_data9') ['ja_fam_address'];
                $residence_card_no = $this->session->userdata('__initial_regist_data9') ['residence_card_no'];
                $ja_fam_age = $this->session->userdata('__initial_regist_data9') ['ja_fam_age'];
                $ja_fam_relationship = $this->session->userdata('__initial_regist_data9') ['ja_fam_relationship'];
                $ja_fam_residing_applicant = $this->session->userdata('__initial_regist_data9') ['ja_fam_residing_applicant'];
                $ja_fam_nationality = $this->session->userdata('__initial_regist_data9') ['ja_fam_nationality'];
                $ja_fam_visa_status = $this->session->userdata('__initial_regist_data9') ['ja_fam_visa_status'];
                $ja_fam_work_place = $this->session->userdata('__initial_regist_data9') ['ja_fam_work_place'];
                $ja_certificate_alien = $this->session->userdata('__initial_regist_data9') ['ja_certificate_alien'];
                $count5 = count($this->session->userdata('__initial_regist_data9') ['ja_fam_name']);
                for ($i = 0;$i < $count5;$i++) {
                    if($ja_fam_name[$i] != Null){
                    $data_family_japan = array('applicant_id' => $applicant_id, 'ja_fam_name' => $ja_fam_name[$i],'ja_fam_date_birth' => $ja_fam_date_birth[$i],'ja_fam_address' => $ja_fam_address[$i],'residence_card_no' => $residence_card_no[$i], 'ja_fam_age' => $ja_fam_age[$i], 'ja_fam_relationship' => $ja_fam_relationship[$i], 'ja_fam_residing_applicant' => $ja_fam_residing_applicant[$i], 'ja_fam_nationality' => $ja_fam_nationality[$i], 'ja_fam_visa_status' => $ja_fam_visa_status[$i], 'ja_fam_work_place' => $ja_fam_work_place[$i], 'ja_certificate_alien' => $ja_certificate_alien[$i],);
                    $insertChecker8 = $this->db->insert('JLS_family_in_japan', $data_family_japan);
                    }
                }
                //var_dump($insertChecker8);
                $entry_date = $this->session->userdata('__initial_regist_data10') ['entry_date'];
                $arrival_date = $this->session->userdata('__initial_regist_data10') ['arrival_date'];
                $depature_date = $this->session->userdata('__initial_regist_data10') ['depature_date'];
                $pre_stay_visa = $this->session->userdata('__initial_regist_data10') ['pre_stay_visa'];
                $status = $this->session->userdata('__initial_regist_data10') ['status'];
                $entry_purpose = $this->session->userdata('__initial_regist_data10') ['entry_purpose'];
                $count6 = count($this->session->userdata('__initial_regist_data10') ['entry_date']);
                for ($i = 0;$i < $count6;$i++) {
                    if($entry_date[$i] != Null){
                    $data_previous_stay_japan = array('applicant_id' => $applicant_id, 'entry_date' => $entry_date[$i], 'arrival_date' => $arrival_date[$i], 'depature_date' => $depature_date[$i],'pre_stay_visa' => $pre_stay_visa[$i], 'status' => $status[$i], 'entry_purpose' => $entry_purpose[$i]);
                    $insertChecker9 = $this->db->insert('JLS_previous_stay_in_japan',$data_previous_stay_japan);
                    }
                }
                //var_dump($insertChecker9);
                // $insertChecker3 = $this->db->insert('JLS_educational_history', $data_edu_history);
                if ($applicant_id & $insertChecker & $insertChecker2 & $insertCheckerInfo) {
                    if ($this->session->has_userdata('__initial_regist_data')) {
                        $enroll = array('__initial_regist_data');
                        $this->session->unset_userdata($enroll);
                    }
                    redirect('adm/portal/jls_applicant/complete');
                }
            }
        }
        else {
            $this->session->set_flashdata('msg_error', 'Something wrong!');
            redirect('adm/portal/jls_applicant/confirm');
        }
    }

    // confirm
    //complete
    public function complete() 
    {
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), "pass" => ['complete' => 'adm/portal/jls_applicant/complete'], 'title' => "JLS Register Complete", 'uri' => array("langschoolapplicant", "jls_complete"), 'msg' => "Japanese Language School Applicant စာရင်းသွင်းမှုအောင်မြင်ပါသည်။",);
        $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);
        if ($this->session->has_userdata('__initial_regist_data')) {
            $enroll = array('__initial_regist_data');
            $this->session->unset_userdata($enroll);
        }
        if ($this->session->has_userdata('__initial_regist_data')) {
            $enroll = array('__initial_regist_data');
            $this->session->unset_userdata($enroll);
        }
        $this->load->view('dashboard/langschoolstudent/complete', $this->data);
    }

    //complete
    public function edit($id) 
    {
        /** User Permission Checker **/
        $this->__permissionChecker($this->key, $this->url);
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), 'title' => "Edit Student", 'msg' => "", 'uri' => array("langschoolapplicant", "jls_edit"), 'config' => $this->user_config,);
        $list = $this->Langschoolapplicant_Model->getJLSDetail($id);
        $list12 = $this->Langschoolapplicant_Model->getJLSDetailFin($id);
        $list4 = $this->Langschoolapplicant_Model->getJLSDetail1($id);
        $list5 = $this->Langschoolapplicant_Model->getJLSDetail2($id);
       // var_dump($list4);
        $list6 = $this->Langschoolapplicant_Model->getJLSDetail3($id);
        $list7 = $this->Langschoolapplicant_Model->getJLSDetail4($id);
        $list8 = $this->Langschoolapplicant_Model->getJLSDetail5($id);
        $list9 = $this->Langschoolapplicant_Model->getJLSDetail6($id);
        $list10 = $this->Langschoolapplicant_Model->getJLSDetail7($id);
        $list11 = $this->Langschoolapplicant_Model->getJLSDetail8($id);
        $list13 = $this->Langschoolapplicant_Model->getJLSDetail9($id);
        $list14 = $this->Langschoolapplicant_Model->getJLSDetail10($id);
       //var_dump($list14);
        //*** Current query value checker
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $list);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $list4);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $list5);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $list6);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $list7);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $list8);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $list9);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $list10);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $list11);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $list12);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $list13);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $list14);
        //*** Generate necessary key and value
        // // $Q_list = _transfer_key_prepare(object_key_checker($list));
        // // $Q_list4 = _transfer_key_prepare(object_key_checker($list4));
        // // $Q_list5 = _transfer_key_prepare(object_key_checker($list5));
        // // $Q_list6 = _transfer_key_prepare(object_key_checker($list6));
        // // $Q_list7 = _transfer_key_prepare(object_key_checker($list7));
        // // $Q_list8 = _transfer_key_prepare(object_key_checker($list8));
        // // $Q_list9 = _transfer_key_prepare(object_key_checker($list9));
        // // $Q_list10 = _transfer_key_prepare(object_key_checker($list10));
        // // $Q_list11 = _transfer_key_prepare(object_key_checker($list11));

        // $this->data['result'] = object_transfer($list, $Q_list);
        // $this->data['result4'] = object_transfer($list4, $Q_list4);
        // $this->data['result5'] = object_transfer($list5, $Q_list5);
        // $this->data['result6'] = object_transfer($list6, $Q_list6);
        // $this->data['result7'] = object_transfer($list7, $Q_list7);
        // $this->data['result8'] = object_transfer($list8, $Q_list8);
        // $this->data['result9'] = object_transfer($list9, $Q_list9);
        // $this->data['result10'] = object_transfer($list10, $Q_list10);
        // $this->data['result11'] = object_transfer($list11, $Q_list11);
         $this->data['result'] = $list;
        //  var_dump($list);
        $this->data['result4'] = $list4;
        $this->data['result5'] = $list5;
        $this->data['result6'] = $list6;
        $this->data['result7'] = $list7;
        $this->data['result8'] = $list8;
        $this->data['result9'] = $list9;
        $this->data['result10'] = $list10;
        $this->data['result11'] = $list11;
        $this->data['result12'] = $list12;
        $this->data['result13'] = $list13;
        $this->data['result14'] = $list14;
       // var_dump($this->data['result14']);
        $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
        $recent_image_photo = $this->data['result']->image_file;
        $recent_sign_photo = $this->data['result']->sign_file;
        $recent_familysign_photo = $this->data['result']->family_file;
        $recent_defray_photo = $this->data['result13']->defraying_sign;

        if ($_POST) {
            // $this->form_validation->set_rules('std_name', 'student name', 'trim|required|min_length[5]|is_unique[OSL_std_profile.name]|xss_clean');
            // $this->form_validation->set_rules('std_email', 'email', 'trim|required|valid_email|is_unique[OSL_student.email]|xss_clean');
            // $this->form_validation->set_rules('std_password', 'password', 'trim|required|min_length[6]|max_length[30]|xss_clean');
            // $this->form_validation->set_rules('conf_password', 'confirm password', 'trim|required|min_length[6]|max_length[30]|xss_clean|matches[std_password]');
            //$this->form_validation->set_rules('jls_name', 'jls name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('applicant_name', 'applicant name', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('applicant_name_kanji', 'applicant name kanji', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('date_of_birthday', 'date of birthday.', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('place_birth', 'place birth', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('age', 'age', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('nationality', 'nationality', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('gender', 'gender', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('martial_status', 'martial status', 'trim|required|xss_clean');
            // //$this->form_validation->set_rules('partaner_name', 'partaner name.', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('place_birth', 'place birth', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('std_email', 'std email', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('phone', 'phone', 'trim|required|numeric|xss_clean');
            // $this->form_validation->set_rules('std_facebook', 'facebook account', 'trim|xss_clean');
            // $this->form_validation->set_rules('userfile', 'Student photo', 'trim|xss_clean');
            // $this->form_validation->set_message('required', 'You must enter %s!');
            // $this->form_validation->set_message('is_unique', 'Your %s is already exits!');
            // $this->form_validation->set_message('numeric', 'The %s always allow only numbers!');
            // $this->form_validation->set_message('valid_email', 'The %s must be valid!');
            if ($this->form_validation->run() === false) {
                $this->load->view('dashboard/langschoolstudent/edit', $this->data);
            }
            else {
                $data_info = array('jls_name' => $this->input->post('jls_name'),'register_date' => $this->input->post('register_date'), 'interview_date' => $this->input->post('interview_date'), 'inter_fail_date' => $this->input->post('inter_fail_date'), 'admission_date' => $this->input->post('admission_date'), 'adm_complete_date' => $this->input->post('adm_complete_date'), 'tracking_code' => $this->input->post('tracking_code'), 'data_expired_date' => $this->input->post('data_expired_date'), 'coe_date' => $this->input->post('coe_date'), 'cancel_date' => $this->input->post('cancel_date'),'cancel_times' => $this->input->post('cancel_times'), 'coe_fail_date' => $this->input->post('coe_fail_date'), 'coe_pass_date' => $this->input->post('coe_pass_date'),  'applicant_name' => $this->input->post('applicant_name'), 'applicant_name_kanji' => $this->input->post('applicant_name_kanji'),'appli_status' => $this->input->post('appli_status'),'interview_date' => $this->input->post('interview_date'), 'date_of_birthday' => $this->input->post('date_of_birthday'), 'place_birth' => $this->input->post('place_birth'),'province' => $this->input->post('province'),'info_age' => $this->input->post('info_age'), 'info_nationality' => $this->input->post('info_nationality'), 'gender' => $this->input->post('gender'), 'martial_status' => $this->input->post('martial_status'), 'partaner_name' => $this->input->post('partaner_name'), 'std_email' => $this->input->post('std_email'), 'info_phone' => $this->input->post('info_phone'), 'address' => $this->input->post('address'), 'course_admission' => $this->input->post('course_admission'), 'course_study_lengh' => $this->input->post('course_study_lengh'), 'occupation' => $this->input->post('occupation'), 'place_employment_school' => $this->input->post('place_employment_school'), 'addr_employment_school' => $this->input->post('addr_employment_school'), 'tel_employment_school' => $this->input->post('tel_employment_school'), 'entry_age_ele_school' => $this->input->post('entry_age_ele_school'), 'duration_jp_language_study' => $this->input->post('duration_jp_language_study'), 'passport' => $this->input->post('passport'), 'educational_school_name' => $this->input->post('educational_school_name'), 'passport_no' => $this->input->post('passport_no'), 'passport_data_issue' => $this->input->post('passport_data_issue'), 'passport_data_exp' => $this->input->post('passport_data_exp'),'passport_issue_authority' => $this->input->post('passport_issue_authority'), 'military_service' => $this->input->post('military_service'),'military_service_details' => $this->input->post('military_service_details'), 'family_mail' => $this->input->post('family_mail'), 'family_tel' => $this->input->post('family_tel'), 'family_address' => $this->input->post('family_address'),'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s'),);
                // if($this->input->post('std_status') == 1) {
                //   $data['activate_date'] = date('Y-m-d H:i:s');
                // }else{
                //   $data['activate_date'] = "0000-00-00 00:00:00";
                // }
                if (!empty($_FILES['userfile']['name'])) {
                    if (!empty($recent_image_photo)) {
                        $preview_link = dirname(__FILE__) . "" . $this->file_path . "" . $recent_image_photo;
                        if (file_exists($preview_link)) {
                            unlink($preview_link);
                        }
                    }
                    //image upload sever and add database
                    $imgupload = $this->mainconfig->_fileUploadWithByName($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, true, true, false,'userfile');
                    if (!empty($imgupload['msg_error'])) {
                        $this->session->set_flashdata('msg_error', $imgupload['msg_error']);
                        redirect('adm/portal/jls_applicant/edit/' . $id, $data_info);
                    }
                    else {
                        $data_info['image_file'] = $imgupload['file_name'];
                    }
                }
                if (!empty($_FILES['signfile']['name'])) {
                    if (!empty($recent_sign_photo)) {
                        $preview_link = dirname(__FILE__) . "" . $this->file_path . "" . $recent_sign_photo;
                        if (file_exists($preview_link)) {
                            unlink($preview_link);
                        }
                    }
                    //image upload sever and add database
                    $signupload = $this->mainconfig->_fileUploadWithByName($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, true, true, false,'signfile');
                    if (!empty($signupload['msg_error'])) {
                        $this->session->set_flashdata('msg_error', $signupload['msg_error']);
                        redirect('adm/portal/jls_applicant/edit/' . $id, $data_info);
                    }
                    else {
                        $data_info['sign_file'] = $signupload['file_name'];
                    }
                }
                if (!empty($_FILES['familyfile']['name'])) {
                    if (!empty($recent_familysign_photo)) {
                        $preview_link = dirname(__FILE__) . "" . $this->file_path . "" . $recent_familysign_photo;
                        if (file_exists($preview_link)) {
                            unlink($preview_link);
                        }
                    }
                    //image upload sever and add database
                    $familysignupload = $this->mainconfig->_fileUploadWithByName($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, true, true, false,'familyfile');
                    if (!empty($familysignupload['msg_error'])) {
                        $this->session->set_flashdata('msg_error', $familysignupload['msg_error']);
                        redirect('adm/portal/jls_applicant/edit/' . $id, $data_info);
                    }
                    else {
                        $data_info['family_file'] = $familysignupload['file_name'];
                    }
                }
                $data_info = $this->__Xss($data_info);
                //Check validation
                $checkdata1 = $this->Langschoolapplicant_Model->JLSCheck($data_info, $id);
                $update_info_id = $this->Langschoolapplicant_Model->jlsAuthUpdate($data_info, $id);
                var_dump($update_info_id);
                $data_details = array('applicant_id' => $update_info_id, 'have_you_visited_jp' => $this->input->post('have_you_visited_jp'),'visited_jp_status' => $this->input->post('visited_jp_status'),'return_other' => $this->input->post('return_other'),'eligibility_non_issuance' => $this->input->post('eligibility_non_issuance'),'ja_plan_to_stay_with_them' => $this->input->post('ja_plan_to_stay_with_them'),'employment_experience' => $this->input->post('employment_experience'),'jplearn_experience' => $this->input->post('jplearn_experience'),'jplearn_achievement' => $this->input->post('jplearn_achievement'),'family_in_japan' => $this->input->post('family_in_japan'), 'visited_date' => $this->input->post('visited_date'),'entry_time' => $this->input->post('entry_time'), 'date_of_departure' => $this->input->post('date_of_departure'), 'visa_type' => $this->input->post('visa_type'), 'school_apply_before_japan' => $this->input->post('school_apply_before_japan'), 'aimed_occupational_category' => $this->input->post('aimed_occupational_category'), 'school_apply_date' => $this->input->post('school_apply_date'), 'school_apply_status' => $this->input->post('school_apply_status'), 'school_apply_name' => $this->input->post('school_apply_name'), 'immigration_office' => $this->input->post('immigration_office'), 'immigration_result' => $this->input->post('immigration_result'),'immigration_reason' => $this->input->post('immigration_reason'),'graduate_date' => $this->input->post('graduate_date'),'graduate_date' => $this->input->post('graduate_date'), 'COE_reject' => $this->input->post('COE_reject'), 'place_apply_visa' => $this->input->post('place_apply_visa'), 'family_language' => $this->input->post('family_language'),
                 'eligibility_have' => $this->input->post('eligibility_have'),
                //  'eligibility_time' => $this->input->post('eligibility_time'),
                //  'eligibility_purpose' => $this->input->post('eligibility_purpose'),
                //  'eligibility_date' => $this->input->post('eligibility_date'),
                'provide_english' => $this->input->post('provide_english'), 'accompanying_person' => $this->input->post('accompanying_person'),'accompanying_marital_status' => $this->input->post('accompanying_marital_status'), 'understand_language' => $this->input->post('understand_language'), 'criminal_record' => $this->input->post('criminal_record'), 'criminal_record_details' => $this->input->post('criminal_record_details'),'eligibility_details' => $this->input->post('eligibility_details'), 'criminal_record_when' => $this->input->post('criminal_record_when'), 'departure_deportation' => $this->input->post('departure_deportation'), 'current_status' => $this->input->post('current_status'), 'current_status_school_name' => $this->input->post('current_status_school_name'), 'current_status_school_major' => $this->input->post('current_status_school_major'), 'current_status_school_grade' => $this->input->post('current_status_school_grade'), 'expected_month' => $this->input->post('expected_month'), 'expected_year' => $this->input->post('expected_year'), 'specific_plans_after_graduating' => $this->input->post('specific_plans_after_graduating'), 'specific_plan_type_schools' => $this->input->post('specific_plan_type_schools'), 'specific_plan_school_name' => $this->input->post('specific_plan_school_name'), 'specific_plan_major' => $this->input->post('specific_plan_major'), 'will_you_return' => $this->input->post('will_you_return'), 'purpose_studying_in_japanese' => $this->input->post('purpose_studying_in_japanese'), 'entry_purpose1' => $this->input->post('entry_purpose1'),);
                var_dump($data_details);
                $data_details = $this->__Xss($data_details);
                //Check validation
                
                $checkdata2 = $this->Langschoolapplicant_Model->JLSCheck1($data_details, $update_info_id);
                $this->Langschoolapplicant_Model->jlsAuthUpdate1($data_details, $update_info_id);
                //$this->db->insert('JLS_other_details', $data_details);
                $data_info = array('select_name_of_course' => $this->input->post('select_name_of_course'),'future_plan_after_graduating' => $this->input->post('future_plan_after_graduating'),'future_plan_checkdata01' => $this->input->post('future_plan_checkdata01'),'spec_other' => $this->input->post('spec_other'),'twyrs_crs_start_date' => $this->input->post('twyrs_crs_start_date'),'twyrs_crs_end_date' => $this->input->post('twyrs_crs_end_date'),'onenine_crs_start_date' => $this->input->post('onenine_crs_start_date'),'onenine_crs_end_date' => $this->input->post('onenine_crs_end_date'),'onefive_crs_start_date' => $this->input->post('onefive_crs_start_date'),'onefive_crs_end_date' => $this->input->post('onefive_crs_end_date'),'onethree_crs_start_date' => $this->input->post('onethree_crs_start_date'),'onethree_crs_end_date' => $this->input->post('onethree_crs_end_date'),'one_crs_start_date' => $this->input->post('one_crs_start_date'),'one_crs_end_date' => $this->input->post('one_crs_end_date'),'student_work_details' => $this->input->post('student_work_details'),'eligibility_visa' => $this->input->post('eligibility_visa'),'issued_date' => $this->input->post('issued_date'),'intended_roll' => $this->input->post('intended_roll'),'defraying_details' => $this->input->post('defraying_details'),'family_inJpfri' => $this->input->post('family_inJpfri'),'japan_four_times' => $this->input->post('japan_four_times'), 'father_work_place' => $this->input->post('father_work_place'),'defraying_sign' => $this->input->post('defraying_sign'),  'type_work_father' => $this->input->post('type_work_father'), 'mother_work_place' => $this->input->post('mother_work_place'), 'type_work_mother' => $this->input->post('type_work_mother'), 'language_can_you_use' => $this->input->post('language_can_you_use'),'you_are_good_subject' => $this->input->post('you_are_good_subject'),'special_ability' => $this->input->post('special_ability'), 'hobbies' => $this->input->post('hobbies'), 'allergic_medicine' => $this->input->post('allergic_medicine'), 'allergic_medicine_details' => $this->input->post('allergic_medicine_details'), 'consent_name' => $this->input->post('consent_name'), 'consent_relation' => $this->input->post('consent_relation'), 'consent_address' => $this->input->post('consent_address'), 'consent_email' => $this->input->post('consent_email'), 'consent_tel' => $this->input->post('consent_tel'), 'registered_enrollment' => $this->input->post('registered_enrollment'), 'total_period_edu' => $this->input->post('total_period_edu'), 'jp_certificate_number' => $this->input->post('jp_certificate_number'), 'what_todo_japan' => $this->input->post('what_todo_japan'), 'defraying_name' => $this->input->post('defraying_name'), 'defraying_tel' => $this->input->post('defraying_tel'), 'defraying_address' => $this->input->post('defraying_address'), 'defraying_relation' => $this->input->post('defraying_relation'), 'defraying_company' => $this->input->post('defraying_company'), 'defraying_work_tel' => $this->input->post('defraying_work_tel'),'defraying_date' => $this->input->post('defraying_date'), 'six_tuition_fee' => $this->input->post('six_tuition_fee'),'first_year_tuitioin_fee' => $this->input->post('first_year_tuitioin_fee'),'second_year_tuitioin_fee' => $this->input->post('second_year_tuitioin_fee'), 'tuition_study_period' => $this->input->post('tuition_study_period'),'living_expense_amount' => $this->input->post('living_expense_amount'), 'payment_method' => $this->input->post('payment_method'),);
                if (!empty($_FILES['defraying_sign']['name'])) {
                    if (!empty($recent_defray_photo)) {
                        $preview_link = dirname(__FILE__) . "" . $this->file_path . "" . $recent_defray_photo;
                        if (file_exists($preview_link)) {
                            unlink($preview_link);
                        }
                    }
                    //image upload sever and add database
                    $defrayupload = $this->mainconfig->_fileUploadWithByName($this->filename, $this->upload_path, $this->max_size, $this->max_width, $this->max_height, $this->allow_type, true, true, false,'defraying_sign');
                    if (!empty($defrayupload['msg_error'])) {
                        $this->session->set_flashdata('msg_error', $defrayupload['msg_error']);
                        redirect('adm/portal/jls_applicant/edit/' . $id, $data_info);
                    }
                    else {
                        $data_info['defraying_sign'] = $defrayupload['file_name'];
                    }
                }
                $data_info = $this->__Xss($data_info);
                //Check validation
               // $checkdata2 = $this->Langschoolapplicant_Model->JLSCheck1($data_info, $update_info_id);
                $this->Langschoolapplicant_Model->jlsAuthUpdate11($data_info, $update_info_id);
                $data_financial_sponsor = array('applicant_id' => $update_info_id, 'fin_name' => $this->input->post('fin_name'), 'fin_age' => $this->input->post('fin_age'), 'fin_relationship' => $this->input->post('fin_relationship'), 'fin_address' => $this->input->post('fin_address'), 'tel' => $this->input->post('tel'), 'email' => $this->input->post('email'), 'fin_occupation' => $this->input->post('fin_occupation'), 'work_place' => $this->input->post('work_place'), 'fin_visa' => $this->input->post('fin_visa'),'annual_income' => $this->input->post('annual_income'), 'amount_saving_for_study_abroad' => $this->input->post('amount_saving_for_study_abroad'), 'amount_of_saving_which_proved' => $this->input->post('amount_of_saving_which_proved'), 'start_work_date' => $this->input->post('start_work_date'),);
                $data_financial_sponsor = $this->__Xss($data_financial_sponsor);
                //Check validation
                $checkdata3 = $this->Langschoolapplicant_Model->JLSCheck2($data_financial_sponsor, $update_info_id);
    
                $eduSubmitEdit = [
                    'edu_name' => $_POST['edu_name'],
                    'address' => $_POST['edu_address'],
                    'start_date' => $_POST['edu_start_date'],
                    'end_date' => $_POST['edu_end_date'],
                    'year' => $_POST['edu_year'],
                ];
                $eduHistory = [];
                foreach($eduSubmitEdit['edu_name'] as $data => $eduData) {
                    foreach($eduSubmitEdit as $key => $value) {
                        $eduFilterData["applicant_id"] = $id;
                        $eduFilterData[$key] = $eduSubmitEdit[$key][$data];
                    }
                    array_push($eduHistory, $eduFilterData);
                }
                $this->Langschoolapplicant_Model->eduHistoryDeleteByAppID($id);
                
                // print_r($eduHistory);

                foreach($eduHistory as $key=>$value) {                   
                        $this->db->insert('JLS_educational_history', $eduHistory[$key]);
                }

                // for ($i = 0;$i < $count1;$i++) {
                //     $data_edu_history = array('applicant_id' => $update_info_id, 'edu_name' => $edu_name[$i], 'address' => $edu_address[$i], 'start_date' => $edu_start_date[$i], 'end_date' => $edu_end_date[$i], 'year' => $edu_year[$i],);
                //     $this->db->update('JLS_educational_history', $data_edu_history);
                // }
              //  $this->db->update('JLS_educational_history', $data_edu_history);
                //$data_edu_history = array('applicant_id' => $update_info_id, 'edu_name' => $edu_name, 'address' => $edu_address, 'start_date' => $edu_start_date, 'end_date' => $edu_end_date, 'year' => $edu_year,);
                //$data_edu_history = $this->__Xss($data_edu_history);
                //Check validation
               // $checkdata4 = $this->Langschoolapplicant_Model->JLSCheck3($data_edu_history, $update_info_id);
               // $this->Langschoolapplicant_Model->jlsAuthUpdate3($data_edu_history, $update_info_id);
                
            //    $jp_name = $_POST['jp_name'];
            //     $jp_address = $_POST['jp_address'];
            //     $jp_start_date = $_POST['jp_start_date'];
            //     $jp_end_date = $_POST['jp_end_date'];
            //     $jp_hour = $_POST['jp_hour'];
            //     $data_lang_study = [];
            //     $data_lang_study = array('applicant_id' => $update_info_id, 'jp_name' => $jp_name, 'address' => $jp_address, 'start_date' => $jp_start_date, 'end_date' => $jp_end_date, 'hour' => $jp_hour,);
            //     $data_lang_study = $this->__Xss($data_lang_study);
            //     //Check validation
                //  $checkdata5 = $this->Langschoolapplicant_Model->JLSCheck4($data_lang_study, $update_info_id);
                
                $jpSubmitEdit = [
                    'jp_name' => $_POST['jp_name'],
                    'jp_level' => $_POST['jp_level'],
                    'jp_status' => $_POST['jp_status'],
                    'address' => $_POST['jp_address'],
                    'start_date' => $_POST['jp_start_date'],
                    'end_date' => $_POST['jp_end_date'],
                    'hour' => $_POST['jp_hour'],
                    'jp_year' => $_POST['jp_year'],
                ];
                $jpHistory = [];
                foreach($jpSubmitEdit['jp_name'] as $data => $jpData) {
                    foreach($jpSubmitEdit as $key => $value) {
                        $jpFilterData["applicant_id"] = $id;
                        $jpFilterData[$key] = $jpSubmitEdit[$key][$data];
                    }
                    array_push($jpHistory, $jpFilterData);
                }
                $this->Langschoolapplicant_Model->jpHistoryDeleteByAppID($id);
                
                // print_r($jpHistory);

                foreach($jpHistory as $key=>$value) {
                        $this->db->insert('JLS_previous_jp_lang_study', $jpHistory[$key]);
                }
                // JLS_achievement_jp_lang_test
                // $achiv_name = $_POST['achiv_name'];
                // $level = $_POST['level'];
                // $exam_year = $_POST['exam_year'];
                // $score = $_POST['score'];
                // $result = $_POST['result'];
                // $date_qualification = $_POST['date_qualification'];
                // $data_achievement_jp = [];
                // $data_achievement_jp = array('applicant_id' => $update_info_id, 'achiv_name' => $achiv_name, 'level' => $level, 'exam_year' => $exam_year, 'score' => $score, 'result' => $result, 'date_qualification' => $date_qualification,);
                // $data_achievement_jp = $this->__Xss($data_achievement_jp);
                //Check validation
               // $checkdata6 = $this->Langschoolapplicant_Model->JLSCheck5($data_achievement_jp, $update_info_id);
               
               $achiSubmitEdit = [
                'achiv_name' => $_POST['achiv_name'],
                'level' => $_POST['level'],
                'exam_year' => $_POST['exam_year'],
                'score' => $_POST['score'],
                'result' => $_POST['result'],
                'date_qualification' => $_POST['date_qualification'],
            ];
            $dataAchievementjp = [];
            foreach($achiSubmitEdit['achiv_name'] as $data => $achiData) {
                foreach($achiSubmitEdit as $key => $value) {
                    $achiFilterData["applicant_id"] = $id;
                    $achiFilterData[$key] = $achiSubmitEdit[$key][$data];
                }
                array_push($dataAchievementjp, $achiFilterData);
            }
            $this->Langschoolapplicant_Model->achivHistoryDeleteByAppID($id);
            
           // print_r($dataAchievementjp);

            foreach($dataAchievementjp as $key=>$value) {
                    $this->db->insert('JLS_achievement_jp_lang_test', $dataAchievementjp[$key]);
            }

               // JLS_achievement_jp_lang_test
                //JLS_name_jp_lang_tests_going_to_take
                // $going_name = $_POST['going_name'];
                // $going_level = $_POST['going_level'];
                // $data_jp_lang_going_to_take = array('applicant_id' => $update_info_id, 'going_name' => $going_name, 'going_level' => $going_level,);
                // $going_level = $this->__Xss($going_level);
                // //Check validation
                // //$checkdata7 = $this->Langschoolapplicant_Model->JLSCheck6($data_jp_lang_going_to_take, $update_info_id);
                
                $goingSubmitEdit = [
                    'going_name' => $_POST['going_name'],
                    'going_level' => $_POST['going_level'],
                    'going_date' => $_POST['going_date'],
                ];
                $jpLangGoing = [];
                foreach($goingSubmitEdit['going_name'] as $data => $goingData) {
                    foreach($goingSubmitEdit as $key => $value) {
                        $goingFilterData["applicant_id"] = $id;
                        $goingFilterData[$key] = $goingSubmitEdit[$key][$data];
                    }
                    array_push($jpLangGoing, $goingFilterData);
                }
                $this->Langschoolapplicant_Model->goingHistoryDeleteByAppID($id);
                
               // print_r($dataAchievementjp);
    
                foreach($jpLangGoing as $key=>$value) {
                        $this->db->insert('JLS_name_jp_lang_tests_going_to_take', $jpLangGoing[$key]);
                }

                $everBeenJapanEdit = [
                    'shortVisa_purpose' => $_POST['shortVisa_purpose'],
                    'shortVisa_status' => $_POST['shortVisa_status'],
                    'shortVisa_period' => $_POST['shortVisa_period'],
                    'shortVisa_prepare' => $_POST['shortVisa_prepare'],
                ];
                $everBeenjp = [];
                foreach($everBeenJapanEdit['shortVisa_purpose'] as $data => $jpBeenData) {
                    foreach($everBeenJapanEdit as $key => $value) {
                        $jpBeenFilterData["applicant_id"] = $id;
                        $jpBeenFilterData[$key] = $everBeenJapanEdit[$key][$data];
                    }
                    array_push($everBeenjp, $jpBeenFilterData);
                }
                $this->Langschoolapplicant_Model->jpeverbeenDeleteByAppID($id);
                
    
                foreach($everBeenjp as $key=>$value) {
                        $this->db->insert('JLS_ever_been_japan', $everBeenjp[$key]);
                }
                //JLS_name_jp_lang_tests_going_to_take
                //JLS_history_employment
                // $emp_name = $_POST['emp_name'];
                // $emp_address = $_POST['emp_address'];
                // $emp_start_date = $_POST['emp_start_date'];
                // $emp_end_date = $_POST['emp_start_date'];
                // $emp_year = $_POST['emp_year'];
                // $emp_job_description = $_POST['emp_job_description'];
                // $data_history_employment = array('applicant_id' => $update_info_id, 'emp_name' => $emp_name, 'address' => $emp_address, 'start_date' => $emp_start_date, 'end_date' => $emp_end_date, 'year' => $emp_year, 'job_description' => $emp_job_description,);
                // $data_history_employment = $this->__Xss($data_history_employment);
                // //Check validation
                // $checkdata8 = $this->Langschoolapplicant_Model->JLSCheck7($data_history_employment, $update_info_id);
                
                $empSubmitEdit = [
                    'emp_name' => $_POST['emp_name'],
                    'address' => $_POST['emp_address'],
                    'start_date' => $_POST['emp_start_date'],
                    'end_date' => $_POST['emp_end_date'],
                    'year' => $_POST['emp_year'],
                    'job_description' => $_POST['emp_job_description'],
                ];
                $dataHistoryEmployment = [];
                foreach($empSubmitEdit['emp_name'] as $data => $achiData) {
                    foreach($empSubmitEdit as $key => $value) {
                        $empFilterData["applicant_id"] = $id;
                        $empFilterData[$key] = $empSubmitEdit[$key][$data];
                    }
                    array_push($dataHistoryEmployment, $empFilterData);
                }
                $this->Langschoolapplicant_Model->empHistoryDeleteByAppID($id);
                
               // print_r($dataAchievementjp);
    
                foreach($dataHistoryEmployment as $key=>$value) {
                        $this->db->insert('JLS_history_employment', $dataHistoryEmployment[$key]);
                }

                //JLS_history_employment
                //JLS_family_member
                // $fam_name = $_POST['fam_name'];
                // $fam_relationship = $_POST['fam_relationship'];
                // $fam_work_place = $_POST['fam_work_place'];
                // $fam_birthday = $_POST['fam_birthday'];
                // $fam_occupation = $_POST['fam_occupation'];
                // $fam_annual_income = $_POST['fam_annual_income'];
                // $fam_address = $_POST['fam_address'];
                // $fam_length_sevice = $_POST['fam_length_sevice'];
                // $data_family_member = array('applicant_id' => $update_info_id, 'fam_name' => $fam_name, 'fam_relationship' => $fam_relationship, 'work_place' => $fam_work_place, 'birthday' => $fam_birthday, 'occupation' => $fam_occupation, 'annual_income' => $fam_annual_income, 'address' => $fam_address, 'length_sevice' => $fam_length_sevice,);
                // $data_family_member = $this->__Xss($data_family_member);
                // //Check validation
                // $checkdata9 = $this->Langschoolapplicant_Model->JLSCheck8($data_family_member, $update_info_id);
                
                $famSubmitEdit = [
                    'fam_name' => $_POST['fam_name'],
                    'fam_age' => $_POST['fam_age'],
                    'fam_gender' => $_POST['fam_gender'],
                    'fam_relationship' => $_POST['fam_relationship'],
                    'fam_nationality' => $_POST['fam_nationality'],
                    'work_place' => $_POST['fam_work_place'],
                    'birthday' => $_POST['fam_birthday'],
                    'occupation' => $_POST['fam_occupation'],
                    'annual_income' => $_POST['fam_annual_income'],
                    'address' => $_POST['fam_address'],
                    'length_sevice' => $_POST['fam_length_sevice'],
                ];
                $famHistoryEmployment = [];
                foreach($famSubmitEdit['fam_name'] as $data => $famData) {
                    foreach($famSubmitEdit as $key => $value) {
                        $famFilterData["applicant_id"] = $id;
                        $famFilterData[$key] = $famSubmitEdit[$key][$data];
                    }
                    array_push($famHistoryEmployment, $famFilterData);
                }
                $this->Langschoolapplicant_Model->famHistoryDeleteByAppID($id);
                
               // print_r($dataAchievementjp);
    
                foreach($famHistoryEmployment as $key=>$value) {
                        $this->db->insert('JLS_family_member', $famHistoryEmployment[$key]);
                }
                //JLS_family_member
                //JLS_family_in_japan
               // $ja_plan_to_stay_with_them = $_POST['ja_plan_to_stay_with_them'];
                // $ja_fam_name = $_POST['ja_fam_name'];
                // $ja_fam_age = $_POST['ja_fam_age'];
                // $ja_fam_relationship = $_POST['ja_fam_relationship'];
                // $ja_fam_residing_applicant = $_POST['ja_fam_residing_applicant'];
                // $ja_fam_nationality = $_POST['ja_fam_nationality'];
                // $ja_fam_visa_status = $_POST['ja_fam_visa_status'];
                // $ja_fam_work_place = $_POST['ja_fam_work_place'];
                // $data_family_japan = array('applicant_id' => $update_info_id, 'ja_fam_name' => $ja_fam_name, 'ja_fam_age' => $ja_fam_age, 'ja_fam_relationship' => $ja_fam_relationship, 'ja_fam_residing_applicant' => $ja_fam_residing_applicant, 'ja_fam_nationality' => $ja_fam_nationality, 'ja_fam_visa_status' => $ja_fam_visa_status, 'ja_fam_work_place' => $ja_fam_work_place,);
                // $data_family_japan = $this->__Xss($data_family_japan);
                // //Check validation
                // $checkdata10 = $this->Langschoolapplicant_Model->JLSCheck9($data_family_japan, $update_info_id);
                
                $jaFamSubmitEdit = [
                    'ja_fam_name' => $_POST['ja_fam_name'],
                    'ja_fam_date_birth' => $_POST['ja_fam_date_birth'],
                    'ja_fam_address' => $_POST['ja_fam_address'],
                    'residence_card_no' => $_POST['residence_card_no'],
                    'ja_fam_age' => $_POST['ja_fam_age'],
                    'ja_fam_relationship' => $_POST['ja_fam_relationship'],
                    'ja_fam_residing_applicant' => $_POST['ja_fam_residing_applicant'],
                    'ja_fam_nationality' => $_POST['ja_fam_nationality'],
                    'ja_fam_visa_status' => $_POST['ja_fam_visa_status'],
                    'ja_fam_work_place' => $_POST['ja_fam_work_place'],
                    'ja_certificate_alien' => $_POST['ja_certificate_alien'],
                ];
                $jaFamHistoryEmployment = [];
                foreach($jaFamSubmitEdit['ja_fam_name'] as $data => $jafamData) {
                    foreach($jaFamSubmitEdit as $key => $value) {
                        $jaFamFilterData["applicant_id"] = $id;
                        $jaFamFilterData[$key] = $jaFamSubmitEdit[$key][$data];
                    }
                    array_push($jaFamHistoryEmployment, $jaFamFilterData);
                }
                $this->Langschoolapplicant_Model->jaFamHistoryDeleteByAppID($id);
                
               // print_r($dataAchievementjp);
    
                foreach($jaFamHistoryEmployment as $key=>$value) {
                        $this->db->insert('JLS_family_in_japan', $jaFamHistoryEmployment[$key]);
                }
                //JLS_family_in_japan
                //JLS_previous_stay_in_japan
                // $entry_date = $_POST['entry_date'];
                // $arrival_date = $_POST['arrival_date'];
                // $depature_date = $_POST['depature_date'];
                // $status = $_POST['status'];
                // $entry_purpose = $_POST['entry_purpose'];
                // $data_previous_stay_japan = array('applicant_id' => $update_info_id, 'entry_date' => $entry_date, 'arrival_date' => $arrival_date, 'depature_date' => $depature_date, 'status' => $status, 'entry_purpose' => $entry_purpose,);
                // $data_previous_stay_japan = $this->__Xss($data_previous_stay_japan);
                // //Check validation
                // var_dump($data_previous_stay_japan);
                // $checkdata11 = $this->Langschoolapplicant_Model->JLSCheck10($data_previous_stay_japan, $update_info_id);
                
                $preJaFamSubmitEdit = [
                    'entry_date' => $_POST['entry_date'],
                    'arrival_date' => $_POST['arrival_date'],
                    'depature_date' => $_POST['depature_date'],
                    'pre_stay_visa' => $_POST['pre_stay_visa'],
                    'pre_stay_visa' => $_POST['pre_stay_visa'],
                    'status' => $_POST['status'],
                    'entry_purpose' => $_POST['entry_purpose'],
                ];
                $preJaFamHistoryEmployment = [];
                foreach($preJaFamSubmitEdit['entry_date'] as $data => $prejafamData) {
                    foreach($preJaFamSubmitEdit as $key => $value) {
                        $preJaFamFilterData["applicant_id"] = $id;
                        $preJaFamFilterData[$key] = $preJaFamSubmitEdit[$key][$data];
                    }
                    array_push($preJaFamHistoryEmployment, $preJaFamFilterData);
                }
                $this->Langschoolapplicant_Model->preJaFamHistoryDeleteByAppID($id);
                
               // print_r($dataAchievementjp);
    
                foreach($preJaFamHistoryEmployment as $key=>$value) {
                        $this->db->insert('JLS_previous_stay_in_japan', $preJaFamHistoryEmployment[$key]);
                }
                if (empty($checkdata1 & $checkdata2 & $checkdata3)) {
                    //$this->Langschoolapplicant_Model->jlsAuthUpdate($data_info, $id);
                 //   $this->Langschoolapplicant_Model->jlsAuthUpdate1($data_details, $update_info_id);
                     $this->Langschoolapplicant_Model->jlsAuthUpdate2($data_financial_sponsor, $update_info_id);
                    // $this->Langschoolapplicant_Model->jlsAuthUpdate3($data_edu_history, $update_info_id);
                    // $this->Langschoolapplicant_Model->jlsAuthUpdate4($data_lang_study, $update_info_id);
                    // $this->Langschoolapplicant_Model->jlsAuthUpdate5($data_achievement_jp, $update_info_id);
                    // $this->Langschoolapplicant_Model->jlsAuthUpdate6($data_jp_lang_going_to_take, $update_info_id);
                    // $this->Langschoolapplicant_Model->jlsAuthUpdate7($data_history_employment, $update_info_id);
                    // $this->Langschoolapplicant_Model->jlsAuthUpdate8($data_family_member, $update_info_id);
                    // $this->Langschoolapplicant_Model->jlsAuthUpdate9($data_family_japan, $update_info_id);
                    // $this->Langschoolapplicant_Model->jlsAuthUpdate10($data_previous_stay_japan, $update_info_id);
                    //$this->Langschoolapplicant_Model->jlsAuthUpdate11($data, $id);
                    $this->session->set_flashdata('msg_success', 'Your data has been update!');
                   redirect("adm/portal/jls_applicant");
                }
                // Auto Mail Sending
                // if($this->input->post('std_email') != ""  && $this->input->post('std_status') == 1) {
                //     $this->sendAutoMail(1, $this->input->post('std_email'), 'memAct');
                // }
                
            }
        }
        else {
            $this->load->view('dashboard/langschoolstudent/edit', $this->data);
        }
    }

    public function view($id) 
    {
        /** User Permission Checker **/
        $this->__permissionChecker($this->key, $this->url);
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), 'title' => "View Student", 'msg' => "", 'uri' => array("student", "std_lists"), 'config' => $this->user_config);
        $list = $this->Langschoolapplicant_Model->studentViewDetail($id);
        //*** Current query value checker
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $list);
        //*** Generate necessary key and value
        $Q_list = _transfer_key_prepare(object_key_checker($list));
        $this->data['result'] = object_transfer($list, $Q_list);
        $course = $this->Langschoolapplicant_Model->studentViewCourse($id);
        $Q_list = _transfer_key_prepare(array_keys_checker($course));
        $this->data['course'] = array_transfer($course, $Q_list);
        $this->data['record'] = $this->Langschoolapplicant_Model->studentViewRecord($id);
        $this->data['noted'] = $this->Langschoolapplicant_Model->studentViewNotes($id);
        $this->data['batch'] = $this->Langschoolapplicant_Model->getBatch();
        $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
        if ($_POST) {
            $this->form_validation->set_rules('std_id', 'std_id', 'trim|required|xss_clean');
            $this->form_validation->set_rules('batch_id', 'batch_id', 'trim|required|xss_clean');
            $this->form_validation->set_rules('pay_type', 'payment type', 'trim|required|xss_clean');
            $this->form_validation->set_rules('pay_info', 'payment info', 'trim|required|xss_clean');
            $this->form_validation->set_rules('note', 'note', 'trim|xss_clean');
            if ($this->form_validation->run() === false) {
                $data['msg'] = "Something wrong!";
                $this->load->view('dashboard/langschoolstudent/views', $this->data);
            }
            else {
                $lastid = $this->Langschoolapplicant_Model->getCourseID();
                $lastid = (isset($lastid) ? $lastid : 1);
                $invoice_number = serial_id_generate("Inv-", $lastid - 1, 6);
                $courseinfo = $this->Langschoolapplicant_Model->getBatchDetail($this->input->post('batch_id'));
                $data = array('std_id' => $this->input->post('std_id'), 'bat_id' => $this->input->post('batch_id'), 'cos_id' => $courseinfo->course_id, 'request_date' => date('Y-m-d H:i:s'), 'expired_date' => "0000-00-00 00:00:00", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'status' => $this->input->post('status'));
                if ($this->input->post('status') == 1) {
                    $data['activate_date'] = date('Y-m-d H:i:s');
                }
                else {
                    $data['activate_date'] = "0000-00-00 00:00:00";
                }
                $data = $this->security->xss_clean($data);
                $checkdata = $this->Langschoolapplicant_Model->batchCheck($data);
                if ($checkdata) {
                    $this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
                    redirect('adm/portal/langschoolstudent/view/' . $id);
                }
                $cos_id = $this->Langschoolapplicant_Model->insertBatch($data);
                $invoice = array('std_id' => $this->input->post('std_id'), 'std_cos_id' => $cos_id, 'invoice_number' => $invoice_number, 'pay_type' => $this->input->post('pay_type'), 'discount' => 0, 'txt' => 0, 'charge' => 0, 'sub_price' => $courseinfo->fees, 'total_price' => $courseinfo->fees, 'pay_info' => $this->input->post('pay_info'), 'description' => $this->input->post('note'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),);
                $this->Langschoolapplicant_Model->insertInvoice($invoice);
                $this->session->set_flashdata('msg_success', 'Your data has been insert!');
                redirect('adm/portal/langschoolstudent/view/' . $id);
            }
        }
        else {
            // print_r($this->data['noted']);
            $this->load->view('dashboard/langschoolstudent/views', $this->data);
        }
    }

    public function delete($id) 
    {
        /** User Permission Checker **/
        $this->__permissionChecker($this->key, $this->url);
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), 'title' => "Delete Applicant", 'msg' => "", 'uri' => array("student", ""), 'config' => $this->user_config,);
        $list = $this->Langschoolapplicant_Model->getJLSDetail($id);
        //*** Current query value checker
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $list);
        $recent_cover = $list->image_file;
        if (!empty($recent_cover)) {
            $preview_link = dirname(__FILE__) . "" . $this->file_path . "" . $recent_cover;
            if (file_exists($preview_link)) {
                unlink($preview_link);
            }
        }
        $this->Langschoolapplicant_Model->delete($id);
        $this->Langschoolapplicant_Model->detailsDelete($id);
        $this->Langschoolapplicant_Model->finDelete($id);
        $this->Langschoolapplicant_Model->eduDelete($id);
        $this->Langschoolapplicant_Model->preDelete($id);
        $this->Langschoolapplicant_Model->achivDelete($id);
        $this->Langschoolapplicant_Model->goingDdelete($id);
        $this->Langschoolapplicant_Model->hisDelete($id);
        $this->Langschoolapplicant_Model->famDelete($id);
        $this->Langschoolapplicant_Model->famJpDelete($id);
        $this->Langschoolapplicant_Model->prestayDelete($id);
        $this->session->set_flashdata('msg_success', 'Your data has been delete!');
        redirect('adm/portal/jls_applicant');
    }

    public function activated($id) 
    {
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), 'title' => "Activate Student", 'msg' => "", 'uri' => array("student", "std_lists"), 'config' => $this->user_config,);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $globalHeader);
        $data = array('activate_date' => date('Y-m-d H:i:s'), "status" => 1);
        $data['result'] = $this->Langschoolapplicant_Model->studentUpdate($data, $id);
        $this->session->set_flashdata('msg_success', 'Your data has been activated!');
        redirect("adm/portal/langschoolstudent", $data);
    }

    public function deactivated($id) 
    {
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), 'title' => "Deactivate Student", 'msg' => "", 'uri' => array("student", "std_lists"), 'config' => $this->user_config,);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $globalHeader);
        $data = array('activate_date' => date('0000-00-00 00:00:00'), "status" => 0);
        $data['result'] = $this->Langschoolapplicant_Model->studentUpdate($data, $id);
        $this->session->set_flashdata('msg_success', 'Your data has been deactivated!');
        redirect("adm/portal/langschoolstudent", $data);
    }

    public function permission_activated($id) 
    {
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), 'title' => "Activate Course", 'msg' => "", 'uri' => array("student", "std_lists"), 'config' => $this->user_config,);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $globalHeader);
        $data = array('updated_at' => date('Y-m-d H:i:s'), "permission" => 1);
        $data['result'] = $this->Langschoolapplicant_Model->studentUpdate($data, $id);
        $this->session->set_flashdata('msg_success', 'Your data has been activated!');
        redirect("adm/portal/langschoolstudent", $data);
    }

    public function permission_deactivated($id) 
    {
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), 'title' => "Deactivate Course", 'msg' => "", 'uri' => array("student", "std_lists"), 'config' => $this->user_config,);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $globalHeader);
        $data = array('updated_at' => date('Y-m-d H:i:s'), "permission" => 0);
        $data['result'] = $this->Langschoolapplicant_Model->studentUpdate($data, $id);
        $this->session->set_flashdata('msg_success', 'Your data has been deactivated!');
        redirect("adm/portal/langschoolstudent", $data);
    }

    public function invoice_view($id) 
    {
        /** User Permission Checker **/
        $this->__permissionChecker($this->key, $this->url);
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), 'title' => "View Student", 'msg' => "", 'uri' => array("student", "std_lists"), 'config' => $this->user_config);
        $list = $this->Langschoolapplicant_Model->studentCourseDetail($id);
        //*** Current query value checker
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $list);
        //*** Generate necessary key and value
        $Q_list = _transfer_key_prepare(object_key_checker($list));
        $this->data['result'] = object_transfer($list, $Q_list);
        $invoice = $this->Langschoolapplicant_Model->studentInvoiceDetail($id);
        $Q_list = _transfer_key_prepare(object_key_checker($invoice));
        $this->data['invoice'] = object_transfer($invoice, $Q_list);
        $payment = $this->Langschoolapplicant_Model->studentPaymentLists($id);
        $Q_list = _transfer_key_prepare(array_keys_checker($payment));
        $this->data['payment'] = array_transfer($payment, $Q_list);
        $this->data['type'] = $this->Langschoolapplicant_Model->getStudentPaymentMethod();
        $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, $this->data);
        $this->load->view('dashboard/langschoolstudent/course_views', $this->data);
    }

    public function purchase_add($id) 
    {
        /** User Permission Checker **/
        $this->__permissionChecker($this->key, $this->url);
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), 'title' => "Add Purchase Course", 'msg' => "", 'uri' => array("student", "std_lists"), 'config' => $this->user_config);
        $this->data = $this->mainconfig->_ArrayDataMarge($globalHeader, []);
        if ($_POST) {
            $this->form_validation->set_rules('ref_number', 'reference number', 'trim|required|xss_clean');
            $this->form_validation->set_rules('pay_from', 'receive from', 'trim|required|xss_clean');
            $this->form_validation->set_rules('cash', 'cash', 'trim|required|xss_clean');
            $this->form_validation->set_rules('desc', 'description', 'trim|required|xss_clean');
            if ($this->form_validation->run() === false) {
                $this->session->set_flashdata('msg_error', 'Empty Data! please fill data!');
                redirect('adm/portal/langschoolstudent/invoice/view/' . $id);
            }
            else {
                $lastid = $this->Langschoolapplicant_Model->getStudentPaymentID();
                $lastid = (isset($lastid) ? $lastid : 1);
                $pay_number = serial_id_generate("Pay-", $lastid - 1, 6);
                $c_total = $this->Langschoolapplicant_Model->CourseTotalPrice($id);
                $s_cash = $this->Langschoolapplicant_Model->studentPurchaseTotal($id);
                $this->__CheckStudentPurchaseChecker($c_total->total_price, $s_cash[0]->total_cash, $this->input->post('cash'), 'adm/portal/student/course/view/' . $id);
                $data = array('std_id' => $c_total->std_id, 'std_inv_id' => $this->input->post('id'), 'payment_id' => $pay_number, 'ref_number' => $this->input->post('ref_number'), 'cash_type' => $this->input->post('pay_from'), 'total_cash' => $this->input->post('cash'), 'description' => $this->input->post('desc'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),);
                $data = $this->security->xss_clean($data);
                $checkdata = $this->Langschoolapplicant_Model->studentPaymentCheck($data);
                if ($checkdata) {
                    $this->session->set_flashdata('msg_error', 'Your data already exits! please fill other data!');
                    redirect('adm/portal/langschoolstudent/invoice/view/' . $id);
                }
                $this->Langschoolapplicant_Model->insertStdPayment($data);
                $this->session->set_flashdata('msg_success', 'Your data has been insert!');
                redirect('adm/portal/langschoolstudent/invoice/view/' . $id);
            }
        }
        else {
            $this->session->set_flashdata('msg_error', 'Not allow! please try again!');
            redirect('adm/portal/langschoolstudent/invoice/view/' . $id);
        }
    }

    public function course_active($id) 
    {
        //global header
        $data['title'] = "Activate Course";
        $data['msg'] = "";
        //Define Aside bar value
        $data['uri'] = array("student", "");
        if (empty($id) || !is_numeric($id)) {
            $this->session->set_flashdata('msg_error', "Bad Request, Not allowed permission!");
            redirect('adm/langschoolstudent/lists', $data);
        }
        $data = array('activate_date' => date('Y-m-d H:i:s'), "status" => 1);
        $student_course = $this->Langschoolapplicant_Model->studentCourseDetail($id);
        $target = $this->Langschoolapplicant_Model->studentCourseTargetDate($student_course->bat_id);
        $data['result'] = $this->Langschoolapplicant_Model->studentEnrollUpdate($data, $id);
        $std_id = $this->Langschoolapplicant_Model->getStudentID($id);
        if ($target->liveclass == "on") {
            $initial = $target->start_date;
            $monthdue = $target->month_duration;
            $daydue = $target->day_duration;
            $target_date = explode(", ", $target->days);
            $description = $target->cos_title . " (" . $target->start_time . "~" . $target->end_time . ") ";
            $json = $this->__attendDateGenerate($target_date, $initial, $monthdue, $daydue);
            $data = array('std_cos_id' => $id, 'std_id' => $student_course->std_id, 'class_date' => $json, 'description' => $description, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),);
            $this->Langschoolapplicant_Model->insertLocalClass($data);
        }
        $this->session->set_flashdata('msg_success', 'Your data has been activated!');
        redirect("adm/portal/langschoolstudent/view/" . $std_id->std_id, $data);
    }

    public function course_deactive($id) 
    {
        //global header
        $data['title'] = "Deactivate Course";
        $data['msg'] = "";
        //Define Aside bar value
        $data['uri'] = array("student", "");
        if (empty($id) || !is_numeric($id)) {
            $this->session->set_flashdata('msg_error', "Bad Request, Not allowed permission!");
            redirect('adm/langschoolstudent/lists', $data);
        }
        $data = array('activate_date' => "0000-00-00 00:00:00", "status" => 0);
        $std_id = $this->Langschoolapplicant_Model->getStudentID($id);
        if (!empty($std_id->std_id)) {
            $this->Langschoolapplicant_Model->studentCalenderDelete($std_id->id, $std_id->std_id);
        }
        $data['result'] = $this->Langschoolapplicant_Model->studentEnrollUpdate($data, $id);
        $this->session->set_flashdata('msg_success', 'Your data has been deactivated!');
        redirect("adm/portal/langschoolstudent/view/" . $std_id->std_id, $data);
    }

    public function course_delete($id, $stdid)
     {
        /** User Permission Checker **/
        $this->__permissionChecker($this->key, $this->url);
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), 'title' => "Delete Invoice Record", 'msg' => "", 'uri' => array("student", ""), 'config' => $this->user_config,);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $globalHeader);
        $parentChecker = $this->Langschoolapplicant_Model->checkParentCourseInvoice($id);
        $Checker = $this->Langschoolapplicant_Model->checkParentCoursePayment($parentChecker[0]->id);
        if (count($Checker) > 0) {
            $this->session->set_flashdata('msg_error', "Request data can't delete! Purchase has value");
            redirect('adm/portal/langschoolstudent/view/' . $stdid);
        }
        else {
            $this->Langschoolapplicant_Model->studentCourseDelete($id);
            $this->Langschoolapplicant_Model->studentCourseEnrollDelete($id);
            $this->session->set_flashdata('msg_success', 'Your data has been delete!');
            redirect("adm/portal/langschoolstudent/view/" . $stdid);
        }
    }

    public function purchase_delete($id, $invid) {
        /** User Permission Checker **/
        $this->__permissionChecker($this->key, $this->url);
        $globalHeader = array("alert" => $this->mainconfig->_DefaultNotic(), 'title' => "Delete Purchase Record", 'msg' => "", 'uri' => array("student", ""), 'config' => $this->user_config,);
        $this->__resultEmptyChecker($id, $globalHeader, "adm/portal/langschoolstudent", $globalHeader);
        $this->Langschoolapplicant_Model->studentEnrollDelete($id);
        $this->session->set_flashdata('msg_success', 'Your data has been delete!');
        redirect("adm/portal/langschoolstudent/invoice/view/" . $invid);
    }
    //Auto Mail System
    public function sendAutoMail($admin, $email, $key) {
        $adminemail = $this->Langschoolapplicant_Model->selectAdminEmail($admin);
        $subject = $this->Langschoolapplicant_Model->selectEmailContent($key);
        $message = '
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PKT Online School</title>
    </head><body>';
        $message .= $subject->message;
        $message .= '</body></html>';
        $name = " PKT Online School " . $adminemail->name;
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = true;
        $config['validate'] = true;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
        $this->email->from($adminemail->email, $name);
        $this->email->to($email);
        $this->email->cc($adminemail->cc);
        $this->email->subject($subject->subject);
        $this->email->message($message);
        $this->email->send();
    }
    /******* Session Reassign and Distibute *********/
    private function __preSessionDataSet() {
        $this->current_id = isset($_SESSION['__admin_user_data']['user_id']) ? $_SESSION['__admin_user_data']['user_id'] : "";
        $this->current_user = isset($_SESSION['__admin_user_data']['user_name']) ? $_SESSION['__admin_user_data']['user_name'] : "";
        $this->current_role = isset($_SESSION['__admin_user_data']['user_role']) ? $_SESSION['__admin_user_data']['user_role'] : "";
        $this->current_csrf_key = isset($_SESSION['__admin_token_slug']) ? $_SESSION['__admin_token_slug'] : "";
        $this->current_permission = isset($_SESSION['__admin_user_data']['user_permission']) ? $_SESSION['__admin_user_data']['user_permission'] : "";
        $this->current_log_id = isset($_SESSION['__admin_session_id']) ? $_SESSION['__admin_session_id'] : "";
        $this->current_session_count = isset($_SESSION['__admin_user_data']['session']) ? $_SESSION['__admin_user_data']['session'] : "";
        $this->current_login_time = isset($_SESSION['__admin_user_data']['login_time']) ? $_SESSION['__admin_user_data']['login_time'] : "";
        $this->session_checker = isset($_SESSION['__pre_session_check']['check_point']) ? $_SESSION['__pre_session_check']['check_point'] : "";
    }
    /******* Site Configuration Reassign and Distibute *********/
    private function __preSiteConfigDataSet() {
        $config = $this->mainconfig->_getInitialSiteConfigData();
        if (!empty($config)) {
            $this->site_name = $config->site_name;
            $this->meta_tag = $config->meta_tag;
            $this->favicon = $config->favicon;
            $this->date_format = $config->date_format;
            $this->decimal_point = $config->decimal_point;
            $this->phone_format = $config->phone_format;
            $this->user_session = $config->user_session;
            $this->timezone = isset($config->timezone) ? $config->timezone : "Asia/Rangoon";
        }
        return $config;
    }
    /******* Security Configuration *********/
    private function __Xss($data) {
        return $this->security->xss_clean($data);
    }
    private function __passwordDataHashing($data) {
        return password_hash($data, PASSWORD_BCRYPT);
    }
    /******* Role And Permission Check Point *********/
    private function string_pos($find) {
        if (!empty($this->current_permission)) {
            return strpos($this->current_permission, $find);
        }
    }
    private function __permissionChecker($key, $url) {
        if ($this->string_pos($key) === false) {
            $this->session->set_flashdata('msg_error', "Your aren't permission for this config!");
            redirect($url);
        }
    }
    /******* Login Configuration and Token Checker *********/
    private function _user_query_Remove($id) {
        $this->db->where('id', $id);
        $this->db->delete('adm_config');
        return true;
    }
    private function _get_user_token($token, $slug) {
        $this->db->select('id,adm_id,csrf_token_key,csrf_slug_key');
        $this->db->from('adm_config');
        $this->db->where('csrf_token_key', $token);
        $this->db->where('csrf_slug_key', $slug);
        $query = $this->db->get();
        return $query->result();
    }
    private function __pretokenCheck() {
        if (empty($this->current_csrf_key) || $this->session_checker == false) {
            return false;
        }
        else {
            $data = $this->mainconfig->_mbSplit('_', $this->current_csrf_key);
            $key_info = $this->_get_user_token($data[0] . '_', $data[1]);
            if (count($key_info) == 1 && $key_info[0]->id == $this->current_log_id) {
                return true;
            }
            else {
                return false;
            }
        }
    }
    private function __tokenChecker() {
        if (empty($this->__pretokenCheck())) {
            $queryChecker = $this->_user_query_Remove($this->current_log_id);
            if ($queryChecker) {
                redirect('adm/portal/auth/logout');
            }
        }
    }
    private function __generate_auth_key($email) {
        $comp1 = [];
        $dd = "";
        $e = explode('@', $email);
        $e1 = $e[0];
        $e1 = "pkD" . $this->encrypt->encode($e1) . "@";
        $first_str = preg_replace("/[\/]/", "$1", $e1);
        $first_str = preg_replace("/[0-9+_=~]/", "$1", $first_str);
        for ($i = 0;$i < 2;$i++) {
            $comp1[] = mb_substr($first_str, (1 * $i), 10);
        }
        foreach ($comp1 as $row) {
            $dd .= $row;
        }
        $dd = substr($dd, 0, 21);
        return $dd . "@";
    }
    /******* Other necessary Configuration *********/
    public function __resultEmptyChecker($id, $return, $url, $data = Null) {
        if (empty($id) || !is_numeric($id) || empty($data)) {
            $this->session->set_flashdata('msg_error', "Bad Request, Not allowed permission!");
            redirect($url, $return);
        }
    }
    public function __CheckStudentPurchaseChecker($ctotal, $scash, $input, $url) {
        if ($ctotal < $scash + $input) {
            $this->session->set_flashdata('msg_error', 'Please check your purchase amount!');
            redirect($url);
        }
        else {
            return true;
        }
    }
    public function __attendDateGenerate(array $data, $initial, $month, $day) {
        // Add days to date and display it
        $add_month = date('Y-m-d', strtotime($initial . ' + ' . $month . ' months'));
        $final = date('Y-m-d', strtotime($add_month . ' + ' . $day . ' days'));
        $target_date = $this->mainconfig->targetDateGenerate($data, $initial, $final);
        return json_encode($target_date);
    }
}