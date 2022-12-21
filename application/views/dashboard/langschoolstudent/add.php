<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>
<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
       <a href="#" class="mt-3 d-md-none toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
       <h1 class="weight-300 h3 title">JLS Applicant Registration</h1>
    </div> 
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
       <a href="<?php echo base_url('adm/portal/jls_applicant'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>
      </div>
    </div>
  </div> 
<?php
    $attributes = array('class' => 'form-horizontal form-label-left');
    echo form_open_multipart('adm/portal/jls_applicant/add', $attributes);
?>
<div class="content">
<div class="row">
<div class="col-lg-12 col-md-12 mb-4 mb-lg-0">
<div class="card">
<div class="card-body">
<div class="col-md-12">

  <span class="text-danger"><?php echo form_error('applicant_name'); ?></span>
  <span class="text-danger"><?php echo form_error('applicant_name_kanji'); ?></span>
  <span class="text-danger"><?php echo form_error('date_of_birthday'); ?></span>

<!-- Student Photo -->
<div class="col-md-6" style="display: flex;padding-top: 32px;">
    <?php echo form_label('Applicant Photo','userfile', array('class' => 'col-form-label')) ;?>
    <div class="col-md-6" style="width: 100%;padding-left:0px;padding-right: 0px;">
      <?php
        echo form_input(array(
        'name' => 'userfile',
        'type' => 'file',
        'class' => 'form-control stu_label',
        'id' => 'clickImg',
        'accept' => 'image/*'
        ));
      ?>
    <div class="form-group col-md-12 col-sm-12 p-0" id="showImg1"> </div>   
    </div>
    <span class="text-danger"><?php echo form_error('userfile'); ?></span>
</div>
<!-- Student Photo -->  
<div class="col-md-6" style="display: flex;padding-top: 12px;">
    <?php echo form_label('Applicant Sign','signfile', array('class' => 'col-form-label')) ;?>
    <div class="col-md-6" style="width: 100%;padding-left:0px;padding-right: 0px;">
      <?php
        echo form_input(array(
        'name' => 'signfile',
        'type' => 'file',
        'class' => 'form-control stu_label',
        'id' => 'clickImgs',
        'accept' => 'image/*'
        ));
      ?>
      <div class="form-group col-md-12 col-sm-12 p-0" id="showImg2"> </div>   
    </div>
  <span class="text-danger"><?php echo form_error('signfile'); ?></span>
</div> 
<!-- Student Photo -->  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(function() {  
    $(".status_select").change(function() {
       if($('option:selected', this).text() =="Register"){
         $('#register_date').show();
        }else{
        $('#register_date').hide();
      }
    });
});
</script>
  <!-- JLS Name -->
<div class="col-md-6 school_list" name="" >
<lable class="list_label">JLS Name </lable>
<select name="jls_name" class="form-group col-md-6 school_select" id="jls_name">
    <option value="">Please Select!</option>
    <option value="ECC">ECC</option>
    <option value="JCLI">JCLI</option>
    <option value="OJLS">OJLS</option>
    <option value="fukuoka">fukuoka</option>
    <option value="shizuoka">shizuoka</option>
</select>
</div>
<!-- JLS Name -->
<!-- status -->
<div class="col-md-6 school_list" name="" >
<lable class="list_label">Status </lable>
<select name="appli_status" id="sele_popup " class="status_select form-group col-md-6 school_select">
    <option value="">Please Select!</option>
    <option value="Register">Register</option>
</select>
</div>
<!-- status -->
<br>
 <!-- Register date -->
<div class="col-md-10" id="register_date"  style="display: none;">
  <div class="form-group school_list"  style="width:60% ;padding: 0px;">
    <p class="list_label" style="width: 48.5%;">
      <label style="margin-bottom: 0px;margin-top: 12px;">Register Date</label>
      <span class="badge badge-danger" >Required</span>
    </p>
    <?php
      echo form_input(array(
        'name' => 'register_date',
        'type' => 'date',
        'value' => html_escape(set_value('register_date',isset($result)?$result->register_date:''), ENT_QUOTES),
        'class' => 'form-control',
        'id' => 'register_date',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('register_date'); ?></span>
  </div>
</div>
<!-- Register date -->
</div>
</div>
<!-- dropdown APPLICANT INFORMATION -->
<div class="content_detail">
<input class="dropdown" type="checkbox" id="faq-2">
<p class="drop_ttl"><label for="faq-2" class="drop_label">APPLICANT INFORMATION  </label></p>
<div class="drop_txt">
<h4 class="appl_ttl"><span>※</span>Contact Details</h4>
<!-- leftside -->
<div class="col-md-6 float-left">
  <div class="form-group">
    <?php echo form_label('Name (アルファベット)', 'applicant_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'applicant_name')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'applicant_name',
        'type' => 'text',
        'value' => html_escape(set_value('applicant_name',isset($result)?$result->applicant_name:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'applicant_name',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('applicant_name'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label(' Name (漢字)', 'applicant_name_kanji', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'applicant_name_kanji')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'applicant_name_kanji',
        'type' => 'text',
        'value' => html_escape(set_value('applicant_name_kanji',isset($result)?$result->applicant_name_kanji:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'applicant_name_kanji',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('applicant_name_kanji'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Date Of Birth', 'date_of_birthday', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'date_of_birthday')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'date_of_birthday',
        'type' => 'date',
        'value' => html_escape(set_value('date_of_birthday',isset($result)?$result->date_of_birthday:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'date_of_birthday',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('date_of_birthday'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Place Of Birth Province', 'province', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'province')); ?>
    <?php
      echo form_input(array(
        'name' => 'province',
        'type' => 'text',
        'value' => html_escape(set_value('province',isset($result)?$result->province:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'province',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('place_birth'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Place Of Birth City', 'place_birth', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
    <?php
      echo form_input(array(
        'name' => 'place_birth',
        'type' => 'text',
        'value' => html_escape(set_value('place_birth',isset($result)?$result->place_birth:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'place_birth',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('place_birth'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Age', 'info_age', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'info_age')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'info_age',
        'type' => 'text',
        'value' => html_escape(set_value('info_age',isset($result)?$result->info_age:''), ENT_QUOTES),
        'placeholder' => "Please Enter!",
        'class' => 'form-control',
        'id' => 'info_age',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('info_age'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Nationality', 'nationality', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'nationality')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'info_nationality',
        'type' => 'text',
        'value' => html_escape(set_value('info_nationality',isset($result)?$result->info_nationality:''), ENT_QUOTES),
        'placeholder' => "Please Enter!",
        'class' => 'form-control',
        'id' => 'info_nationality',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('nationality'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Gender', 'gender', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    <span class="badge badge-danger">Required</span>
    <select name="gender" id="gender" class="admission_select">
      <option value="1">Male</option>
      <option value="0">Female</option>
    </select>
  </div> 
  <div class="form-group">
    <?php echo form_label('Martial Status', 'martial_status', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    <span class="badge badge-danger">Required</span>
    <select name="martial_status" id="martial_status" class="admission_select">
      <option value="1">Single</option>
      <option value="0">Married</option>
    </select>
  </div> 
  <div class="form-group " id="partaner" style="display:none;">
    <?php echo form_label('Name of your Partaner', 'partaner_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
    <?php
      echo form_input(array(
        'name' => 'partaner_name',
        'type' => 'text',
        'value' => html_escape(set_value('partaner_name',isset($result)?$result->partaner_name:''), ENT_QUOTES),
        'placeholder' => "Please Enter!",
        'class' => 'form-control',
        'id' => 'partaner_name',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('partaner_name'); ?></span>
  </div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
   $(function() {  
    $("#martial_status").change(function() {
       if($('option:selected', this).text() =="Single"){
         $('#partaner').hide();
        }else if($('option:selected', this).text() =="Married"){
        $('#partaner').show();
      }else{
        $('#partaner').hide();
      }
    });
   });
  </script>
  <div class="form-group">
    <?php echo form_label('Email', 'email', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_email')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'std_email',
        'type' => 'text',
        'value' => html_escape(set_value('std_email',isset($result)?$result->std_email:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'std_email',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('email'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Phone Number', 'info_phone', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'info_phone')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'info_phone',
        'type' => 'text',
        'value' => html_escape(set_value('info_phone',isset($result)?$result->info_phone:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'info_phone',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('phone'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Address','address', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'address',
        'type' => 'text',
        'value' => html_escape(set_value('phone',isset($result)?$result->address:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'address',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('address'); ?></span>
  </div>
  <div class="form-group">
    <p class="addmission">Course of Admission</p>
    <select name="course_admission" id="course_admission" class="admission_select">
      <option value="一般">一般</option>
      <option value="進学">進学</option>
      <option value="ビジネス">ビジネス</option>
      <option value="SSW">SSW</option>
    </select>
  </div>
  <div class="form-group">
    <?php echo form_label('Length of Study', 'course_study_lengh', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'course_study_lengh',
        'type' => 'text',
        'value' => html_escape(set_value('course_study_lengh',isset($result)?$result->course_study_lengh:''), ENT_QUOTES),
        'placeholder' => "Please Enter!",
        'class' => 'form-control',
        'id' => 'course_study_lengh',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('course_study_lengh'); ?></span>
  </div>

  <div class="form-group">
    <?php echo form_label('Have you visited Japan?', 'have_you_visited_jp', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    <select name="have_you_visited_jp" id="have_you_visited_jp" class="admission_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
  </div>
  <div class="form-group">
    <?php echo form_label('Visited Status', 'visited_jp_status', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'visited_jp_status',
        'type' => 'text',
        'value' => html_escape(set_value('visited_jp_status',isset($result)?$result->visited_jp_status:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'visited_jp_status',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('visited_jp_status'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Date of Entry', 'visited_date', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'visited_date',
        'type' => 'date',
        'value' => html_escape(set_value('visited_date',isset($result)?$result->visited_date:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'visited_date',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('visited_date'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Times of Entry', 'entry_time', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'entry_time',
        'type' => 'text',
        'value' => html_escape(set_value('entry_time',isset($result)?$result->entry_time:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'entry_time',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('entry_time'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Date of Departure', 'date_of_departure', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'date_of_departure',
        'type' => 'date',
        'value' => html_escape(set_value('date_of_departure',isset($result)?$result->date_of_departure:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'date_of_departure',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('date_of_departure'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Enter visa type if you visited Japan', 'visa_type', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'visa_type',
        'type' => 'text',
        'value' => html_escape(set_value('visa_type',isset($result)?$result->visa_type:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'visa_type',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('visa_type'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Departure by deportation / departure order or not', 'departure_deportation', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    <select name="departure_deportation" id="departure_deportation" class="admission_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
  </div>
  <div class="form-group">
    <?php echo form_label('Current Status', 'current_status', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'current_status',
        'type' => 'text',
        'value' => html_escape(set_value('current_status',isset($result)?$result->current_status:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'current_status',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('current_status'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('(Expected month and year of graduating from the school.) ', 'expected_month_year_graduating', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <div class="graduating_month_year">
      <?php
        echo form_input(array(
          'name' => 'expected_month',
          'type' => 'text',
          'value' => html_escape(set_value('expected_month',isset($result)?$result->expected_month:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'expected_month',
          'autocomplete' => ''));
      ?><p class="expected_txt" style="padding-left: 22px;font-size:17px">月</p>
      <?php
        echo form_input(array(
          'name' => 'expected_year',
          'type' => 'text',
          'value' => html_escape(set_value('expected_year',isset($result)?$result->expected_year:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'expected_year',
          'autocomplete' => ''));
      ?><p class="expected_txt" style="padding-left: 22px;font-size:17px">年</p>
    </div>
    <span class="text-danger"><?php echo form_error('expected_year'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Name of School', 'current_status_school_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'current_status_school_name',
        'type' => 'text',
        'value' => html_escape(set_value('current_status_school_name',isset($result)?$result->current_status_school_name:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'current_status_school_name',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('current_status_school_name'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Department/Major', 'current_status_school_major', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'current_status_school_major',
        'type' => 'text',
        'value' => html_escape(set_value('current_status_school_major',isset($result)?$result->current_status_school_major:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'current_status_school_major',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('current_status_school_major'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Grade', 'current_status_school_grade', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'current_status_school_grade',
        'type' => 'text',
        'value' => html_escape(set_value('current_status_school_grade',isset($result)?$result->current_status_school_grade:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'current_status_school_grade',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('current_status_school_grade'); ?></span>
  </div>
  <div class="form-group" >
    <?php echo form_label('What do you want to do in Japan?‌', 'what_todo_japan', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'what_todo_japan')); ?>
    <?php
      echo form_input(array(
        'name' => 'what_todo_japan',
        'type' => 'text',
        'value' => html_escape(set_value('what_todo_japan',isset($result)?$result->what_todo_japan:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'what_todo_japan',
        'autocomplete' => ''));
    ?>
  <span class="text-danger"><?php echo form_error('what_todo_japan'); ?></span>
  </div>
  <div class="form-group" style="">
    <?php echo form_label('Others (If your are a student of Japanese language course, or neither a student nor a worker, explain your current situation in detail. )', 'student_work_details', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'student_work_details')); ?>
    <?php
      echo form_input(array(
        'name' => 'student_work_details',
        'type' => 'text',
        'value' => html_escape(set_value('student_work_details',isset($result)?$result->student_work_details:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'student_work_details',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('student_work_details'); ?></span>
  </div>
  <div class="form-group" style="display:none;"  id="specific_plans">
   <h6 class="spec_plan">Specific Plans after Graduating</h6>
    <p class="addmission" style="margin-bottom:19px ;">Specific Plans after Graduating</p>
    <select name="specific_plans_after_graduating" class="admission_select">
        <option value="Advancing to higher education">Advancing to higher education</option>
        <option value="Planning to work">Planning to work</option>
        <option value="帰国 /Return to Home Country">帰国 /Return to Home Country</option>
        <option value="日本での進学 /Attend School in Japan">日本での進学 /Attend School in Japan</option>
        <option value="Postgraduate Course">Postgraduate Course</option>
        <option value="Junior College">Junior College</option>
        <option value="Undergraduate Course">Undergraduate Course</option>
        <option value="Professional School">Professional School</option>
        <option value="その他 /Other">その他 /Other</option>
    </select>
  </div>
  <h6 class="spec_plan">Higher Education in Japan</h6>
  <div class="form-group">
    <?php echo form_label('Type of Schools', 'specific_plan_type_schools', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'specific_plan_type_schools',
        'type' => 'text',
        'value' => html_escape(set_value('specific_plan_type_schools',isset($result)?$result->specific_plan_type_schools:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'specific_plan_type_schools',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('specific_plan_type_schools'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Name of School', 'specific_plan_school_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'specific_plan_school_name',
        'type' => 'text',
        'value' => html_escape(set_value('specific_plan_school_name',isset($result)?$result->specific_plan_school_name:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'specific_plan_school_name',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('specific_plan_school_name'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Major', 'specific_plan_major', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'specific_plan_major',
        'type' => 'text',
        'value' => html_escape(set_value('specific_plan_major',isset($result)?$result->specific_plan_major:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'specific_plan_major',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('specific_plan_major'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('What is your special ability?', 'special_ability ', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'special_ability',
        'type' => 'text',
        'value' => html_escape(set_value('special_ability',isset($result)?$result->special_ability :''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'special_ability',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('special_ability '); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label(' What are your hobbies?', 'hobbies ', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'hobbies',
        'type' => 'text',
        'value' => html_escape(set_value('hobbies',isset($result)?$result->hobbies :''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'hobbies',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('specific_plan_major '); ?></span>
  </div>
</div>
<!-- leftside -->
<!-- rightside -->
<div class="col-md-6 float-left">
  <div class="form-group">
    <?php echo form_label('Occupation', 'occupation', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'occupation',
        'type' => 'text',
        'value' => html_escape(set_value('occupation',isset($result)?$result->phone:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'occupation',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('occupation'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Place of Employment or School', 'place_employment_school', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'place_employment_school',
        'type' => 'text',
        'value' => html_escape(set_value('place_employment_school',isset($result)?$result->place_employment_school:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'place_employment_school',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('place_employment_school'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Address of Employment or School', 'addr_employment_school', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'addr_employment_school',
        'type' => 'text',
        'value' => html_escape(set_value('addr_employment_school',isset($result)?$result->addr_employment_school:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'addr_employment_school',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('addr_employment_school'); ?></span>
  </div>
  <style>
    .employment_text{
      margin-bottom: 10px;
    }
    input#register_date {
    width: 49%;
    }
  </style>
  <div class="form-group">
    <?php echo form_label('Tel of Employment or School', 'tel_employment_school', array( 'class' => 'employment_text', 'id'=> '', 'style' => '', 'for' => 'phone'));?>
    <?php
      echo form_input(array(
        'name' => 'tel_employment_school',
        'type' => 'text',
        'value' => html_escape(set_value('tel_employment_school',isset($result)?$result->tel_employment_school:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'tel_employment_school',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('tel_employment_school'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Entrance Age to Elementary School', 'entry_age_ele_school', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'entry_age_ele_school',
        'type' => 'text',
        'value' => html_escape(set_value('entry_age_ele_school',isset($result)?$result->entry_age_ele_school:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'entry_age_ele_school',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('entry_age_ele_school'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Lastest Educational history School name', 'educational_school_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'educational_school_name',
        'type' => 'text',
        'value' => html_escape(set_value('educational_school_name',isset($result)?$result->educational_school_name:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'educational_school_name',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('educational_school_name'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Duration of JP Language study', 'duration_jp_language_study', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'duration_jp_language_study',
        'type' => 'text',
        'value' => html_escape(set_value('duration_jp_language_study',isset($result)?$result->duration_jp_language_study:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'duration_jp_language_study',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('duration_jp_language_study'); ?></span>
  </div>
  <style>
    .passport_text{
      margin-bottom: 13px;
    }
  </style>
  <div class="form-group">
    <?php echo form_label('Passport', 'passport', array( 'class' => 'passport_text', 'id'=> '')); ?>
    <select name="passport" id="passport" class="admission_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
  </div>
  <div class="form-group">
    <?php echo form_label('Passport Number', 'passport_no', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'passport_no',
        'type' => 'text',
        'value' => html_escape(set_value('passport_no',isset($result)?$result->passport_no:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'passport_no',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('passport_no'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Date of issue', 'passport_data_issue', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'passport_data_issue',
        'type' => 'date',
        'value' => html_escape(set_value('passport_data_issue',isset($result)?$result->passport_data_issue:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'passport_data_issue',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('passport_data_issue'); ?></span>
  </div> 
  <div class="form-group">
    <?php echo form_label('Date of expiration', 'passport_data_exp', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'passport_data_exp',
        'type' => 'date',
        'value' => html_escape(set_value('passport_data_exp',isset($result)?$result->passport_data_exp:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'passport_data_exp',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('passport_data_exp'); ?></span>
  </div>  
  <div class="form-group">
    <?php echo form_label('Passport Issue Authority', 'passport_issue_authority', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'passport_issue_authority',
        'type' => 'text',
        'value' => html_escape(set_value('passport_issue_authority',isset($result)?$result->passport_issue_authority:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'passport_issue_authority',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('passport_no'); ?></span>
  </div>
  <style>
    .military_txt{
      margin-bottom: 16px;
    }
  </style>
  <div class="form-group">
    <?php echo form_label('Blank period／Military service', 'military_service', array( 'class' => 'military_txt', 'id'=> '')); ?>
    <select name="military_service" id="military_service" class="admission_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
  </div>
  <div class="form-group">
    <?php echo form_label('Blank period／Military service details', 'military_service_details', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'military_service_details')); ?>
    <?php
      echo form_input(array(
        'name' => 'military_service_details',
        'type' => 'text',
        'value' => html_escape(set_value('military_service_details',isset($result)?$result->military_service_details:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'military_service_details',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('place_apply_visa'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Place to Apply for VISA', 'place_apply_visa', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'place_apply_visa',
        'type' => 'text',
        'value' => html_escape(set_value('place_apply_visa',isset($result)?$result->place_apply_visa:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'place_apply_visa',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('place_apply_visa'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Accompanying Persons,if Any', 'accompanying_person', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    <select name="accompanying_person" id="accompanying_person" class="admission_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
  </div>
  <div class="form-group">
    <?php echo form_label('Accompanying marital status', 'accompanying_marital_status', array( 'class' => '', 'id'=> 'accompanying_marital_status', 'style' => 'margin-bottom: 11px;', 'for' => 'accompanying_marital_status')); ?>
    <?php
      echo form_input(array(
        'name' => 'accompanying_marital_status',
        'type' => 'text',
        'value' => html_escape(set_value('accompanying_marital_status',isset($result)?$result->accompanying_marital_status:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'accompanying_marital_status',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('accompanying_marital_status'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Did you apply before in Japan?', 'school_apply_before_japan', array( 'class' => 'form-control-label','style' => '', 'id'=> '')); ?>
    <select name="school_apply_before_japan" id="school_apply_before_japan" class="admission_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
  </div>
  <div class="form-group">
    <?php echo form_label('when?', 'school_apply_date', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'school_apply_date',
        'type' => 'date',
        'value' => html_escape(set_value('school_apply_date',isset($result)?$result->school_apply_date:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'school_apply_date',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('school_apply_date'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('status?', 'school_apply_status', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'school_apply_status',
        'type' => 'text',
        'value' => html_escape(set_value('school_apply_status',isset($result)?$result->school_apply_status:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'school_apply_status',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('school_apply_status'); ?></span>
  </div>
  <div class="form-group">
      <?php echo form_label('Name of School?', 'school_apply_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <?php
        echo form_input(array(
          'name' => 'school_apply_name',
          'type' => 'text',
          'value' => html_escape(set_value('school_apply_name',isset($result)?$result->school_apply_name:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'school_apply_name',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('school_apply_name'); ?></span>
  </div>
  <div class="form-group">
      <?php echo form_label('Which immigration office?', 'immigration_office', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <?php
        echo form_input(array(
          'name' => 'immigration_office',
          'type' => 'text',
          'value' => html_escape(set_value('immigration_office',isset($result)?$result->immigration_office:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'immigration_office',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('immigration_office'); ?></span>
  </div>
  <div class="form-group">
    <p class="addmission"  style="margin-bottom: 7px;">Result?</p>
    <select name="immigration_result" class="admission_select" id="immigration_result">
        <option value="交付">交付</option>
        <option value="不交付">不交付</option>
        <option value="取下げ">取下げ</option>
        <option value="交付後の未入国">交付後の未入国</option>
    </select>
  </div>
  <div class="form-group">
      <?php echo form_label('Reason?', 'immigration_reason', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'immigration_reason')); ?>
      <?php
        echo form_input(array(
          'name' => 'immigration_reason',
          'type' => 'text',
          'value' => html_escape(set_value('immigration_reason',isset($result)?$result->immigration_reason:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'immigration_reason',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('immigration_reason'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('When did (will) you graduate?', 'graduate_date', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    <?php
      echo form_input(array(
        'name' => 'graduate_date',
        'type' => 'date',
        'value' => html_escape(set_value('graduate_date',isset($result)?$result->graduate_date:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'graduate_date',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('graduate_date'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Have you ever experienced COE rejection?', 'COE_reject', array( 'class' => 'form-control-label','style' => 'margin-bottom: 4px;', 'id'=> '')); ?>
    <span class="badge badge-danger">Required</span>
    <select name="COE_reject" id="COE_reject" class="admission_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
  </div>
  <div class="form-group">
    <?php echo form_label('What language can you use?', 'language_can_you_use', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    <?php
      echo form_input(array(
        'name' => 'language_can_you_use',
        'type' => 'text',
        'value' => html_escape(set_value('language_can_you_use',isset($result)?$result->language_can_you_use:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'language_can_you_use',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('language_can_you_use'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('What subjects are you good at?', 'you_are_good_subject', array( 'style' => 'margin-top: 21px;','class' => 'form-control-label', 'id'=> '')); ?>
    <?php
      echo form_input(array(
        'name' => 'you_are_good_subject',
        'type' => 'text',
        'value' => html_escape(set_value('you_are_good_subject',isset($result)?$result->you_are_good_subject:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'you_are_good_subject',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('you_are_good_subject'); ?></span>
  </div>
  <h6 class="spec_plan">Employment</h6>
  <div class="form-group">
    <?php echo form_label('Aimed occupational category', 'aimed_occupational_category', array( 'class' => 'employment', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'aimed_occupational_category',
        'type' => 'text',
        'value' => html_escape(set_value('aimed_occupational_category',isset($result)?$result->aimed_occupational_category:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'aimed_occupational_category',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('aimed_occupational_category'); ?></span>
  </div>
  <h6 class="spec_plan">Return to home country</h6>
  <div class="form-group">
    <?php echo form_label('When will you return', 'will_you_return', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'will_you_return',
        'type' => 'text',
        'value' => html_escape(set_value('will_you_return',isset($result)?$result->will_you_return:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'will_you_return',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('will_you_return'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Return Other', 'return_other', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'return_other',
        'type' => 'text',
        'value' => html_escape(set_value('return_other',isset($result)?$result->return_other:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'return_other',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('return_other'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Is it possible to provide in English? ', 'provide_english', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    <span class="badge badge-danger">Required</span>
    <select name="provide_english" id="provide_english" class="admission_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
  </div>
  <div class="form-group">
    <?php echo form_label('Are you allergic to any medicine or foods?', 'allergic_medicine', array( 'class' => 'form-control-label','style' => 'margin-bottom: 6px;', 'id'=> '')); ?>
    <span class="badge badge-danger">Required</span>
    <select name="allergic_medicine" id="allergic_medicine" class="admission_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
  </div>
  <div class="form-group">
    <?php echo form_label('If you select ”Yes”, please tell us in detal about your allegy.', 'allergic_medicine_details', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'allergic_medicine_details')); ?>
    <?php
      echo form_input(array(
        'name' => 'allergic_medicine_details',
        'type' => 'text',
        'value' => html_escape(set_value('allergic_medicine_details',isset($result)?$result->allergic_medicine_details:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'allergic_medicine_details',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('allergic_medicine_details'); ?></span>
  </div>
</div> 
<!-- rightside -->

<!-- co_leftside -->
<div class="float-left">
    <h6 class="txt" style="padding: 33px 10px 12px;">Is there any your family member who understands at least one  of the languages which we understand?And, who?</h6>
</div>
<style>
  .wholanguage{
    margin-bottom: 19px;
  }
</style>
<div class="col-md-6 float-left">
  <div class="form-group">
    <?php echo form_label('Who?', 'understand_language', array( 'class' => 'wholanguage', 'id'=> '', 'style' => '', 'for' => 'understand_language')); ?>
    <?php
      echo form_input(array(
        'name' => 'understand_language',
        'type' => 'text',
        'value' => html_escape(set_value('understand_language',isset($result)?$result->understand_language:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'understand_language',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('understand_language'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Criminal Record in Japan or Overseas', 'criminal_record', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    <span class="badge badge-danger">Required</span>
      <select name="criminal_record" id="criminal_record" class="admission_select">
          <option value="1">Yes</option>
          <option value="0">No</option>
      </select>
  </div>
  <div class="criminal form-group float-left">
    <div class="">
      <?php echo form_label('Have you applied for Certificate of Eligibility?', 'criminal_record', array( 'class' => 'form-control-label', 'id'=> '')); ?>
      <span class="badge badge-danger">Required</span>
    </div>
    <div class="radio_record">
      <div class="criminal_record01">
        <select name="eligibility_have" id="eligibility_have" class="col-md-12 admission_select">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
      </div>
      <div>
        <label class="col-rd cri_text"><span style="padding-left:30px ;margin-top: 7px;">Times</span>
          <?php
            echo form_input(array(
              'name' => 'eligibility_details',
              'type' => 'text',
              'placeholder' => 'Please Enter!',
              'class' => 'form-control',
              'id' => 'eligibility_details',
              'class' => 'details form-control col-md-8',
              'autocomplete' => ''));
          ?>
        </label> 
      </div>
    </div>  
  </div>
  <div class="form-group">
    <?php echo form_label('Intended to enroll', 'intended_roll', array( 'class' => '', 'id'=> 'intended_roll')); ?>
    <select name="intended_roll" id="intended_roll" class="admission_select">
        <option value="1">issued</option>
        <option value="0">denied</option>
    </select>
  </div>
  <div class="form-group">
    <?php echo form_label('ビザの種類 type of visa', 'eligibility_visa', array( 'class' => '', 'id'=> 'eligibility_visa')); ?>
    <select name="eligibility_visa" id="eligibility_visa" class="admission_select">
        <option value="Student">Student</option>
        <option value="Trainee">Trainee</option>
        <option value="Technical">Technical</option>
        <option value="Others">Others</option>
    </select>
  </div>
</div>
<div class="col-md-6 float-left">
  <div class="form-group">
    <p class="addmission">Language</p>
    <select name="family_language" class="admission_select">
        <option value="English">English</option>
        <option value="Chinese">Chinese</option>
        <option value="Korean">Korean</option>
        <option value="Thai">Thai</option>
        <option value="Vietnamese">Vietnamese</option>
        <option value="Japanese">Japanese</option>
    </select>
  </div>
  <div class="form-group">
    <?php echo form_label('Details', 'criminal_record_details', array( 'class' => 'eli_text', 'id'=> 'criminal_record_details', 'style' => '', 'for' => 'phone')); ?>
    <?php
      echo form_input(array(
        'name' => 'criminal_record_details',
        'type' => 'text',
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => ' criminal_record_details',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('criminal_record_details '); ?></span>
  </div>
  <div class="criminal form-group float-left">
    <div class="">
      <?php echo form_label('Have you applied for Certificate of Eligibility?', 'criminal_record', array( 'class' => 'form-control-label', 'id'=> '')); ?>
      <span class="badge badge-danger">Required</span>
    </div>
    <div class="radio_record">
      <div class="">
          <label class="col-rd cri_text"><span style="margin-top: 7px;">When:</span>
              <input type="date" class="details form-control col-md-8" name="criminal_record_when" value="" checked="checked" style="margin-left: 16px;margin-right: 0px;">
          </label> 
      </div>
      <div class="">
          <label class="col-rd cri_text"><span>Purpose of Entry:</span>
              <input type="text" class="details form-control col-md-8" name="entry_purpose1" value="" checked="checked" style="margin: 0px;">
          </label> 
      </div>
    </div>  
  </div>
  <div class="form-group">
    <?php echo form_label('Of these applications, the number of times of non-issuance', 'eligibility_non_issuance', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    <?php
      echo form_input(array(
        'name' => 'eligibility_non_issuance',
        'type' => 'text',
        'value' => html_escape(set_value('eligibility_non_issuance',isset($result)?$result->eligibility_non_issuance:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'eligibility_non_issuance',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('issued_date'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Issued / Denied Date', 'issued_date', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    <?php
      echo form_input(array(
        'name' => 'issued_date',
        'type' => 'date',
        'value' => html_escape(set_value('issued_date',isset($result)?$result->issued_date:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'issued_date',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('issued_date'); ?></span>
  </div>
  <style>
    .criminal_record01 {
      width: 34%;
    }
    .criminal_record03{
      position: relative;
      top: 0px;
      left: 25%;
    }
  </style> 
</div>
<!-- co_leftside -->
<div class="criminal form-group float-left">
  <label>Purpose of studying in Japanese </label>
  <div class="col-md-12 col-sm-12 p-0">
      <?php 
        $data = array(
        'name' => 'purpose_studying_in_japanese',
        'type' => 'text',
        'value' => set_value('purpose_studying_in_japanese',isset($result)?$result->purpose_studying_in_japanese:'',ENT_QUOTES),
        'id'=> 'purpose_studying_in_japanese',
        'placeholder' => 'Please Enter!',
        'class' => "form-control",
      );
      echo form_textarea($data); ?>
      <span class="text-danger"><?php echo form_error('purpose_studying_in_japanese '); ?></span>
  </div>
</div>
<div class="col-md-6 float-left">
  <h6 class="" style="padding: 33px 0px 12px;">Contact details of your family</h6>
  <div class="form-group">
    <?php echo form_label('Email', 'family_mail', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_email')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'family_mail',
        'type' => 'text',
        'value' => html_escape(set_value('family_mail',isset($result)?$result->family_mail:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'family_mail',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('family_mail'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Phone Number', 'family_tel', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'family_tel',
        'type' => 'text',
        'value' => html_escape(set_value('family_tel',isset($result)?$result->family_tel:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'family_tel',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('family_tel'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Address','family_address', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'family_address',
        'type' => 'text',
        'value' => html_escape(set_value('family_address',isset($result)?$result->family_address:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'family_address',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('family_address'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label(' Name of the place where your father is working','father_work_place', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'father_work_place',
        'type' => 'text',
        'value' => html_escape(set_value('father_work_place',isset($result)?$result->father_work_place:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'father_work_place',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('address'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Type of work/post father','type_work_father', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'type_work_father',
        'type' => 'text',
        'value' => html_escape(set_value('type_work_father',isset($result)?$result->type_work_father:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'type_work_father',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('address'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Name of the place where your mother is working ','mother_work_place', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'mother_work_place',
        'type' => 'text',
        'value' => html_escape(set_value('mother_work_place',isset($result)?$result->mother_work_place:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'mother_work_place',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('address'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Type of work/post mother','type_work_mother', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'type_work_mother',
        'type' => 'text',
        'value' => html_escape(set_value('phone',isset($result)?$result->type_work_mother:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'type_work_mother',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('address'); ?></span>
  </div>
</div>
<div class="col-md-6 float-right">
  <h6 class="" style="padding: 33px 0px 12px;">Name of person who gave the consent</h6>
  <div class="form-group">
    <?php echo form_label('Consent Name', 'consent_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'consent_name')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'consent_name',
        'type' => 'text',
        'value' => html_escape(set_value('consent_name',isset($result)?$result->consent_name:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'consent_name',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('family_mail'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Relation', 'consent_relation', array( 'class' => '', 'id'=> '')); ?>
      <select name="consent_relation" id="consent_relation" class="admission_select">
          <option value="father">Father</option>
          <option value="mother">Mother</option>
          <option value="brother">Brother/Sister</option>
          <option value="other">Others</option>
      </select>
  </div>
  <div class="form-group">
    <?php echo form_label('Address','consent_address', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'consent_address',
        'type' => 'text',
        'value' => html_escape(set_value('phone',isset($result)?$result->consent_address:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'consent_address',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('address'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label(' Email','consent_email', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'consent_email',
        'type' => 'text',
        'value' => html_escape(set_value('consent_email',isset($result)?$result->consent_email:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'consent_email',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('address'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label(' Phone','consent_tel', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'consent_tel',
        'type' => 'text',
        'value' => html_escape(set_value('consent_tel',isset($result)?$result->consent_tel:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'consent_tel',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('address'); ?></span>
  </div>
  <br><br><br>
</div>
<!-- co_leftside -->
<div class="col-md-6 float-right">
  <h6 class="" style="padding: 133px 0px 12px;">Written Oath for Defraying Expenses</h6>
  <div class="form-group">
    <?php echo form_label('Tuition for 6 months', 'six_tuition_fee', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_email')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'six_tuition_fee',
        'type' => 'text',
        'value' => html_escape(set_value('six_tuition_fee',isset($result)?$result->six_tuition_fee:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'six_tuition_fee',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('family_mail'); ?></span>
  </div>
  <div class="form-group">
      <?php echo form_label('Tuition for first year', 'first_year_tuitioin_fee', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'first_year_tuitioin_fee')); ?>
      <span class="badge badge-danger">Required</span>
      <?php
        echo form_input(array(
          'name' => 'first_year_tuitioin_fee',
          'type' => 'text',
          'value' => html_escape(set_value('first_year_tuitioin_fee',isset($result)?$result->first_year_tuitioin_fee:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'first_year_tuitioin_fee',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('first_year_tuitioin_fee'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Tuition for second year','second_year_tuitioin_fee', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'second_year_tuitioin_fee',
        'type' => 'text',
        'value' => html_escape(set_value('phone',isset($result)?$result->second_year_tuitioin_fee:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'second_year_tuitioin_fee',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('second_year_tuitioin_fee'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label(' Period Studying','tuition_study_period', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'tuition_study_period',
        'type' => 'text',
        'value' => html_escape(set_value('tuition_study_period',isset($result)?$result->tuition_study_period:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'tuition_study_period',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('tuition_study_period'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Living expense (Monthly Amount)','living_expense_amount', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'living_expense_amount',
        'type' => 'text',
        'value' => html_escape(set_value('phone',isset($result)?$result->living_expense_amount:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'living_expense_amount',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('living_expense_amount'); ?></span>
  </div>
  <div class="form-group">
      <?php echo form_label('Method of payment', 'payment_method', array( 'class' => '', 'id'=> '')); ?>
      <select name="payment_method" id="payment_method" class="admission_select">
          <option value="Bank Transfer (Overseas Remittance)">Bank Transfer (Overseas Remittance)</option>
          <option value="Credit Card">Credit Card</option>
          <option value="Others">Others</option>
      </select>
  </div>
  <div class="form-group">
      <?php echo form_label('Below please explain in detail the circumstances for your defraying the costs of the applicant and your relationship to the applicant.','defraying_details', array('class' => '')); ?>
      <?php
        echo form_input(array(
          'name' => 'defraying_details',
          'type' => 'text',
          'value' => html_escape(set_value('phone',isset($result)?$result->defraying_details:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'defraying_details',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('defraying_details'); ?></span>
  </div>
</div>
<div class="col-md-6 float-left">
  <h6 class="" style="padding: 33px 0px 12px;"> Name of person defraying expenses</h6>
  <div class="form-group">
    <?php echo form_label('Name', 'defraying_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'defraying_name')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'defraying_name',
        'type' => 'text',
        'value' => html_escape(set_value('defraying_name',isset($result)?$result->defraying_name:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'defraying_name',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('defraying_name'); ?></span>
  </div>
  <div class="form-group">
      <?php echo form_label('Relation', 'defraying_relation', array( 'class' => '', 'id'=> '')); ?>
      <select name="defraying_relation" id="defraying_relation" class="admission_select">
          <option value="father">Father</option>
          <option value="mother">Mother</option>
          <option value="brother">Brother/Sister</option>
          <option value="other">Others</option>
      </select>
  </div>
  <div class="form-group">
      <?php echo form_label('Tel','defraying_tel', array('class' => '')); ?>
      <span class="badge badge-danger">Required</span>
      <?php
        echo form_input(array(
          'name' => 'defraying_tel',
          'type' => 'text',
          'value' => html_escape(set_value('defraying_tel',isset($result)?$result->defraying_tel:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'defraying_tel',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('defraying_tel'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Address','defraying_address', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'defraying_address',
        'type' => 'text',
        'value' => html_escape(set_value('defraying_address',isset($result)?$result->defraying_address:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'defraying_address',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('defraying_address'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Company Name','defraying_company', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'defraying_company',
        'type' => 'text',
        'value' => html_escape(set_value('defraying_company',isset($result)?$result->defraying_company:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'defraying_company',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('defraying_company'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Tel(workplace)','defraying_work_tel', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'defraying_work_tel',
        'type' => 'text',
        'value' => html_escape(set_value('defraying_work_tel',isset($result)?$result->defraying_work_tel:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'defraying_work_tel',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('defraying_work_tel'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Signature','defraying_sign', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'defraying_sign',
        'type' => 'text',
        'value' => html_escape(set_value('defraying_sign',isset($result)?$result->defraying_sign:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'defraying_sign',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('defraying_sign'); ?></span>
  </div>
  <div class="form-group">
    <?php echo form_label('Date','defraying_date', array('class' => '')); ?>
    <span class="badge badge-danger">Required</span>
    <?php
      echo form_input(array(
        'name' => 'defraying_date',
        'type' => 'date',
        'value' => html_escape(set_value('defraying_date',isset($result)?$result->defraying_date:''), ENT_QUOTES),
        'placeholder' => 'Please Enter!',
        'class' => 'form-control',
        'id' => 'defraying_date',
        'autocomplete' => ''));
    ?>
    <span class="text-danger"><?php echo form_error('defraying_date'); ?></span>
  </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
  $(function() {  
      $("#select_name_of_course").change(function() {
        if($('option:selected', this).text() =="進学２年コ－ス"){
          $('.two_yrs_crs').show();
          $('.oneyrs_ninemths_crs').hide();
          $('.oneyrs_fivemths_crs').hide();
          $('.oneyrs_threemths_crs').hide();
          $('.one_yrs_course').hide();
          }else if($('option:selected', this).text() =="進学1年9ヶ月コ－ス"){
          $('.two_yrs_crs').hide();
          $('.oneyrs_ninemths_crs').show();
          $('.oneyrs_fivemths_crs').hide();
          $('.oneyrs_threemths_crs').hide();
          $('.one_yrs_course').hide();
        }else if($('option:selected', this).text() =="進学１.５年コ－ス"){
          $('.two_yrs_crs').hide();
          $('.oneyrs_ninemths_crs').hide();
          $('.oneyrs_fivemths_crs').show();
          $('.oneyrs_threemths_crs').hide();
          $('.one_yrs_course').hide();
        }else if($('option:selected', this).text() =="進学1年3ヶ月コ－ス"){
          $('.two_yrs_crs').hide();
          $('.oneyrs_ninemths_crs').hide();
          $('.oneyrs_fivemths_crs').hide();
          $('.oneyrs_threemths_crs').show();
          $('.one_yrs_course').hide();
        }else if($('option:selected', this).text() =="進学１年コ－ス"){
          $('.two_yrs_crs').hide();
          $('.oneyrs_ninemths_crs').hide();
          $('.oneyrs_fivemths_crs').hide();
          $('.oneyrs_threemths_crs').hide();
          $('.one_yrs_course').show();
        }else{
          $('.two_yrs_crs').hide();
          $('.oneyrs_ninemths_crs').hide();
          $('.oneyrs_fivemths_crs').hide();
          $('.oneyrs_threemths_crs').hide();
          $('.one_yrs_course').hide();
        }
      });
  });

</script>
<div class="col-md-12 float-left" style="padding-bottom: 15px;">
  <h6 class="" style="padding: 33px 0px 12px;">志望学科　Name of Course　* 東京日本橋校は4月期（2年,1年）と10月期（1.5年）のみ。</h6>
  <div class="form-group">
    <select name="select_name_of_course" id="select_name_of_course" class="course_select">
      <option value="">Please Select!</option>
      <option value="進学２年コ－ス">進学２年コ－ス</option>
      <option value="進学1年9ヶ月コ－ス">進学1年9ヶ月コ－ス</option>
      <option value="進学１.５年コ－ス">進学１.５年コ－ス</option>
      <option value="進学1年3ヶ月コ－ス">進学1年3ヶ月コ－ス</option>
      <option value="進学１年コ－ス">進学１年コ－ス</option>
    </select>
  </div>
  <p></p>
  <p style="display:none;" class="two_yrs_crs">
    <span>２－Year course</span>
    <span>２０
    <?php
      echo form_input(array(
        'name' => 'twyrs_crs_start_date',
        'type' => 'text',
        'value' => html_escape(set_value('twyrs_crs_start_date',isset($result)?$result->twyrs_crs_start_date:''), ENT_QUOTES),
        'class' => '',
        'id' => 'twyrs_crs_start_date',
        'style' => 'width:5%',
        'autocomplete' => ''));
    ?>
    <span>年０４月 -- ２０ </span>
    <?php
      echo form_input(array(
        'name' => 'twyrs_crs_end_date',
        'type' => 'text',
        'value' => html_escape(set_value('twyrs_crs_end_date',isset($result)?$result->twyrs_crs_end_date:''), ENT_QUOTES),
        'class' => '',
        'id' => 'twyrs_crs_end_date',
        'style' => 'width:5%',
        'autocomplete' => ''));
    ?> 年０３月</span>
  </p>
  <p style="display:none;" class="oneyrs_ninemths_crs">
    <span>1 Year and 9 Months course</span>
    <span>２０ 
      <?php
        echo form_input(array(
          'name' => 'onenine_crs_start_date',
          'type' => 'text',
          'value' => html_escape(set_value('onenine_crs_start_date',isset($result)?$result->onenine_crs_start_date:''), ENT_QUOTES),
          'class' => '',
          'id' => 'onenine_crs_start_date',
          'style' => 'width:5%',
          'autocomplete' => ''));
      ?> 年０７月 -- ２０ 
      <?php
        echo form_input(array(
          'name' => 'onenine_crs_end_date',
          'type' => 'text',
          'value' => html_escape(set_value('onenine_crs_end_date',isset($result)?$result->onenine_crs_end_date:''), ENT_QUOTES),
          'class' => '',
          'id' => 'onenine_crs_end_date',
          'style' => 'width:5%',
          'autocomplete' => ''));
      ?>年０３月</span>
  </p>
  <p style="display:none;" class="oneyrs_fivemths_crs">
    <span>1.5－Year course</span>
    <span>２０ <?php
          echo form_input(array(
            'name' => 'onefive_crs_start_date',
            'type' => 'text',
            'value' => html_escape(set_value('onefive_crs_start_date',isset($result)?$result->onefive_crs_start_date:''), ENT_QUOTES),
            'class' => '',
            'id' => 'onefive_crs_start_date',
            'style' => 'width:5%',
            'autocomplete' => ''));
        ?>年１０月 -- ２０ <?php
        echo form_input(array(
          'name' => 'onefive_crs_end_date',
          'type' => 'text',
          'value' => html_escape(set_value('onefive_crs_end_date',isset($result)?$result->onefive_crs_end_date:''), ENT_QUOTES),
          'class' => '',
          'id' => 'onefive_crs_end_date',
          'style' => 'width:5%',
          'autocomplete' => ''));
      ?>年０３月</span>
  </p>
  <p style="display:none;" class="oneyrs_threemths_crs">
    <span>1 Year and 3 Months course</span>
    <span>２０  <?php
          echo form_input(array(
            'name' => 'onethree_crs_start_date',
            'type' => 'text',
            'value' => html_escape(set_value('onethree_crs_start_date',isset($result)?$result->onethree_crs_start_date:''), ENT_QUOTES),
            'class' => '',
            'id' => 'onethree_crs_start_date',
            'style' => 'width:5%',
            'autocomplete' => ''));
        ?> 年０１月 -- ２０ <?php
        echo form_input(array(
          'name' => 'onethree_crs_end_date',
          'type' => 'text',
          'value' => html_escape(set_value('onethree_crs_end_date',isset($result)?$result->onethree_crs_end_date:''), ENT_QUOTES),
          'class' => '',
          'id' => 'onethree_crs_end_date',
          'style' => 'width:5%',
          'autocomplete' => ''));
      ?> 年０３月</span>
  </p>
  <p style="display:none;" class="one_yrs_course">
    <span>１－Year course<?php
          echo form_input(array(
            'name' => 'one_crs_start_date',
            'type' => 'text',
            'value' => html_escape(set_value('one_crs_start_date',isset($result)?$result->one_crs_start_date:''), ENT_QUOTES),
            'class' => '',
            'id' => 'one_crs_start_date',
            'style' => 'width:5%',
            'autocomplete' => ''));
        ?> 年０４月 -- ２０ <?php
        echo form_input(array(
          'name' => 'one_crs_end_date',
          'type' => 'text',
          'value' => html_escape(set_value('one_crs_end_date',isset($result)?$result->one_crs_end_date:''), ENT_QUOTES),
          'class' => '',
          'id' => 'one_crs_end_date',
          'style' => 'width:5%',
          'autocomplete' => ''));
      ?>年０３月</span>
  </p>
</div>
<script>
  $(function() {  
    $("#future_plan_after_graduating").change(function() {
       if($('option:selected', this).text() =="A. 進学 Advancing to higher education"){
         $('.drop_checkbox').show();
         $('.specify').hide();
        }else if($('option:selected', this).text() =="D. その他 < Other> (Specify)"){
         $('.drop_checkbox').hide();
         $('.specify').show();
      }else{
         $('.drop_checkbox').hide();
         $('.specify').hide();
      }
    });
  });

  $(function() {  
    $("#jls_name").change(function() {
       if($('option:selected', this).text() =="shizuoka"){
         $('#specific_plans').hide();
         $('#future_plan').show();
        }else if($('option:selected', this).text() =="ECC"){
          $('#specific_plans').show();
          $('#future_plan').hide();
      }else if($('option:selected', this).text() =="JCLI"){
          $('#specific_plans').show();
          $('#future_plan').hide();
      }else if($('option:selected', this).text() =="OJLS"){
          $('#specific_plans').show();
          $('#future_plan').hide();
      }else if($('option:selected', this).text() =="fukuoka"){
          $('#specific_plans').show();
          $('#future_plan').hide();
      }else{
         $('#specific_plans').hide();
         $('#future_plan').hide();
      }
    });
  });
</script>
<div class="col-md-12 float-left" style="padding-bottom: 15px;display:none;" id="future_plan">
  <h6 class="" style="padding: 33px 0px 12px;"> この学校を卒業した後の予定 < Future plan after graduating from this school.></h6>
  <div class="form-group" >
    <select name="future_plan_after_graduating" id="future_plan_after_graduating" class="course_select">
      <option value="">Please Select!</option>
      <option value="A. 進学 Advancing to higher education">A. 進学 Advancing to higher education</option>
      <option value="B. 就職 Planning to work">B. 就職 Planning to work</option>
      <option value="C. 帰国 Returning home">C. 帰国 Returning home</option>
      <option value="D. その他 < Other> (Specify)">D. その他 < Other> (Specify)</option>
    </select>
  </div>
  <div class="drop_checkbox" style="display:none;">
    <select name="future_plan_checkdata01" id="future_plan_checkdata01" class="course_select">
        <option value="">Please Select!</option>
        <option value="大学院( Master's degree / Doctoral course)">大学院( Master's degree / Doctoral course)</option>
        <option value="短期大学( Junior College )">短期大学( Junior College )</option>
        <option value="大学( Undergraduate(Bachelor) )">大学( Undergraduate(Bachelor) )</option>
        <option value="専門学校( Vocational School )">専門学校( Vocational School )</option>
        <option value="その他 ( Other )">その他 ( Other )</option>
    </select>
  </div>
  <div class="specify" style="display:none;">
    <?php
        echo form_input(array(
          'name' => 'spec_other',
          'type' => 'text',
          'value' => html_escape(set_value('spec_other',isset($result)?$result->spec_other:''), ENT_QUOTES),
          'class' => 'form-control',
          'id' => 'spec_other',
          'placeholder' => 'Please Enter!',
          'style' => 'width:49%;',
          'autocomplete' => ''));
      ?>
  </div>
</div>

<!-- Table -->
<div class="col-md-12 float-left">
  <h6 class="" style="padding: 33px 0px 12px;">Educational History : from Elementary School to the Most Recent School</h6>
  <div class="tbl">
    <table class="table-bordered" name="applicant_id">
      <thead class="tbl_head" >
        <tr>
          <th>Name of institution</th>
          <th>Address</th>
          <th>Starting <br>Year/Month  </th>
          <th>Finishing <br>Year/Month </th>
          <th>Term of Study</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="edu_name[]" id="edu_name" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="edu_address[]" id="address" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="edu_start_date[]" id="start_date" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="edu_end_date[]" id="end_date" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="edu_year[]" id="year" value=""><span class="study_year">year</span> 
          </td>
        </tr>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="edu_name[]" id="edu_name" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="edu_address[]" id="address" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="edu_start_date[]" id="start_date" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="edu_end_date[]" id="end_date" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="edu_year[]" id="year" value=""><span class="study_year">year</span> 
          </td>
        </tr>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="edu_name[]" id="edu_name" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="edu_address[]" id="address" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="edu_start_date[]" id="start_date" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="edu_end_date[]" id="end_date" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="edu_year[]" id="year" value=""><span class="study_year">year</span> 
          </td>
        </tr>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="edu_name[]" id="edu_name" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="edu_address[]" id="address" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="edu_start_date[]" id="start_date" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="edu_end_date[]" id="end_date" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="edu_year[]" id="year" value=""><span class="study_year">year</span> 
          </td>
        </tr>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="edu_name[]" id="edu_name" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="edu_address[]" id="address" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="edu_start_date[]" id="start_date" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="edu_end_date[]" id="end_date" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="edu_year[]" id="year" value=""><span class="study_year">year</span> 
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <br>
  <div class="col-md-6 float-left">
    <div class="form-group ">
      <?php echo form_label('Registered enrollment', 'registered_enrollment', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'registered_enrollment')); ?>
      <?php
        echo form_input(array(
          'name' => 'registered_enrollment',
          'type' => 'text',
          'value' => html_escape(set_value('registered_enrollment',isset($result)?$result->registered_enrollment:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'registered_enrollment',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('registered_enrollment'); ?></span>
    </div>
  </div>
  <div class="col-md-6 float-right">
      <div class="form-group">
        <?php echo form_label('Total period of education (from elementary school to the last school attended)', 'total_period_edu', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'total_period_edu')); ?>
        <?php
          echo form_input(array(
            'name' => 'total_period_edu',
            'type' => 'text',
            'value' => html_escape(set_value('total_period_edu',isset($result)?$result->total_period_edu:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'total_period_edu',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('total_period_edu'); ?></span>
      </div>      
   </div> 

</div>
<!-- Table -->

<!-- Table -->
<div class="col-md-12 float-left">
  <h6 class="" style="padding: 33px 0px 12px;">Previous Japanese Language Study</h6>
  <select name="jplearn_experience" id="jplearn_experience" class="planning_select" style="margin-top: 0px;margin-bottom: 20px;">
          <option value="1">Yes</option>
          <option value="0">No</option>
  </select>
  <div class="tbl">
    <table class="table-bordered" name="applicant_id">
      <thead class="tbl_head">
        <tr>
          <th>Name of institution</th>
          <th>Level</th>
          <th>Status(Completed/Still Studying)</th>
          <th>Address</th>
          <th>Starting <br>Year/Month  </th>
          <th >Finishing <br>Year/Month </th>
          <th>Total hour of Study</th>
          <th>Term of Studyy</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="jp_name[]" id="jp_name" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="jp_level[]" id="jp_level" value="">
          </td>
          <td>
          <div class="">
          <select name="jp_status[]" class="table-control col-md-12">
                <option value=""></option>
                <option value="1">Completed</option>
                <option value="0">Still studying</option>
            </select>
        </div>
          </td>
          <td>
          <input type="text" class=" table-control"  name="jp_address[]" id="jp_address" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="jp_start_date[]" id="jp_address" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="jp_end_date[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="jp_hour[]" value=""><span class="study_year">hour</span> 
          </td>
          <td>
          <input type="text" class=" table-control term" name="jp_year[]" value=""><span class="study_year">year</span> 
          </td>
        </tr>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="jp_name[]" id="jp_name" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="jp_level[]" id="jp_level" value="">
          </td>
          <td>
          <div class="">
          <select name="jp_status[]" class="table-control col-md-12">
                <option value=""></option>
                <option value="1">Completed</option>
                <option value="0">Still studying</option>
            </select>
        </div>
          </td>
          <td>
          <input type="text" class=" table-control"  name="jp_address[]" id="jp_address" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="jp_start_date[]" id="jp_address" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="jp_end_date[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="jp_hour[]" value=""><span class="study_year">hour</span> 
          </td>
          <td>
          <input type="text" class=" table-control term" name="jp_year[]" value=""><span class="study_year">year</span> 
          </td>
        </tr>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="jp_name[]" id="jp_name" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="jp_level[]" id="jp_level" value="">
          </td>
          <td>
          <div class="">
          <select name="jp_status[]" class="table-control col-md-12">
                <option value=""></option>
                <option value="1">Completed</option>
                <option value="0">Still studying</option>
            </select>
        </div>
          </td>
          <td>
          <input type="text" class=" table-control"  name="jp_address[]" id="jp_address" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="jp_start_date[]" id="jp_address" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="jp_end_date[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="jp_hour[]" value=""><span class="study_year">hour</span> 
          </td>
          <td>
          <input type="text" class=" table-control term" name="jp_year[]" value=""><span class="study_year">year</span> 
          </td>
        </tr>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="jp_name[]" id="jp_name" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="jp_level[]" id="jp_level" value="">
          </td>
          <td>
          <div class="">
          <select name="jp_status[]" class="table-control col-md-12">
                <option value=""></option>
                <option value="1">Completed</option>
                <option value="0">Still studying</option>
            </select>
        </div>
          </td>
          <td>
          <input type="text" class=" table-control"  name="jp_address[]" id="jp_address" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="jp_start_date[]" id="jp_address" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="jp_end_date[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="jp_hour[]" value=""><span class="study_year">hour</span> 
          </td>
          <td>
          <input type="text" class=" table-control term" name="jp_year[]" value=""><span class="study_year">year</span> 
          </td>
        </tr>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="jp_name[]" id="jp_name" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="jp_level[]" id="jp_level" value="">
          </td>
          <td>
          <div class="">
          <select name="jp_status[]" class="table-control col-md-12">
                <option value=""></option>
                <option value="1">Completed</option>
                <option value="0">Still studying</option>
            </select>
        </div>
          </td>
          <td>
          <input type="text" class=" table-control"  name="jp_address[]" id="jp_address" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="jp_start_date[]" id="jp_address" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="jp_end_date[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="jp_hour[]" value=""><span class="study_year">hour</span> 
          </td>
          <td>
          <input type="text" class=" table-control term" name="jp_year[]" value=""><span class="study_year">year</span> 
          </td>
        </tr>
      </tbody>
    </table>
  </div>

</div>
<!-- Table -->

<!-- Table -->
<div class="col-md-8 float-left">
  <h6 class="" style="padding: 33px 0px 12px;">Achievement in JP language tests</h6>
  <div class="tbl">
    <table class="table-bordered" name="applicant_id">
      <thead class="tbl_head">
        <tr>
          <th>Name of Japanese language test</th>
          <th>Level</th>
          <th>Exam Years</th>
          <th >Score</th>
          <th>Result</th>
          <th>Date of Qualification</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="achiv_name[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="achiv_level[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="achiv_exam_year[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="achiv_score[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="achiv_result[]" value="">
          </td>
          <td>
          <input type="date" class=" table-control" name="date_qualification[]" value="">
          </td>
        </tr>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="achiv_name[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="achiv_level[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="achiv_exam_year[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="achiv_score[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="achiv_result[]" value=""> 
          </td>
          <td>
          <input type="date" class=" table-control" name="date_qualification[]" value="">
          </td>
        </tr>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="achiv_name[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="achiv_level[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="achiv_exam_year[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="achiv_score[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="achiv_result[]" value=""> 
          </td>
          <td>
          <input type="date" class=" table-control" name="date_qualification[]" value="">
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <p style="width: 40%;margin: 0;float: left;">Japanese Language Proficiency </p>
    <select name="jplearn_achievement" id="jplearn_achievement" class="planning_select" style="margin-top: 0px;margin-bottom: 20px;">
            <option value="1">Yes</option>
            <option value="0">No</option>
    </select>
    <div class="form-group">
            <?php echo form_label('Certificate Number','jp_certificate_number', array('class' => '')); ?>
            <span class="badge badge-danger">Required</span>
            <?php
              echo form_input(array(
                'name' => 'jp_certificate_number',
                'type' => 'text',
                'value' => html_escape(set_value('phone',isset($result)?$result->jp_certificate_number:''), ENT_QUOTES),
                'placeholder' => 'Please Enter!',
                'class' => 'form-control',
                'id' => 'jp_certificate_number',
                'autocomplete' => ''));
            ?>
            <span class="text-danger"><?php echo form_error('address'); ?></span>
     </div>
  </div>
</div>
<!-- table -->

<!-- table -->
<div class="col-md-4 float-left">
  <h6 class="" style="padding: 33px 0px 12px;">Name of JP language tests going to take</h6>
    <table class="table-bordered" name="applicant_id" id="going_to_take">
      <thead class="tbl_head">
        <tr>
          <th>Name of Japanese language test</th>
          <th>Level</th>
          <th>Date</th>
          
        </tr>
      </thead>
      <tbody>
        
        <tr>
          <td>
          <input type="text" class=" table-control term" name="going_name[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control" name="going_level[]" value="">
          </td>
          <td>
          <input type="date" class=" table-control" name="going_date[]" value="">
          </td>
        </tr>
        <tr>
          <td>
          <input type="text" class=" table-control term" name="going_name[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control" name="going_level[]" value="">
          </td>
          <td>
          <input type="date" class=" table-control" name="going_date[]" value="">
          </td>
        </tr>
        <tr>
          <td>
          <input type="text" class=" table-control term" name="going_name[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control" name="going_level[]" value="">
          </td>
          <td>
          <input type="date" class=" table-control" name="going_date[]" value="">
          </td>
        </tr>
      </tbody>
    </table>
</div>
<!-- Table -->

<!-- Table -->
<div class="col-md-12 float-left">
  <h6 class="" style="padding: 33px 0px 12px;">History of Employment (Write in order, ending with the most recent employment.)</h6>
  <select name="employment_experience" id="employment_experience" class="planning_select" style="margin-top: 0px;margin-bottom: 20px;">
          <option value="1">Yes</option>
          <option value="0">No</option>
  </select>
 <div class="tbl">
    <table class="table-bordered" name="applicant_id">
      <thead class="tbl_head">
        <tr>
          <th>Name of Employment</th>
          <th>Address</th>
          <th>Years</th>
          <th>Starting <br>Year/Month  </th>
          <th >Finishing <br>Year/Month </th>
          <th>Job Description</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="emp_name[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="emp_address[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="emp_year[]" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="emp_start_date[]" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="emp_end_date[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control" name="emp_job_description[]" value="">
          </td>
        </tr>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="emp_name[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="emp_address[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="emp_year[]" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="emp_start_date[]" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="emp_end_date[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control" name="emp_job_description[]" value="">
          </td>
        </tr>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="emp_name[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="emp_address[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control term" name="emp_year[]" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="emp_start_date[]" value="">
          </td>
          <td>
          <input type="month" class=" table-control strEnd"  name="emp_end_date[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control" name="emp_job_description[]" value="">
          </td>
        </tr>
      </tbody>
    </table>
 </div>
</div>
<!-- Table -->

<!-- Table -->
<div class="col-md-12 float-left">
 <h6 class="" style="padding: 33px 0px 12px;">Family Member</h6>
  <div class="tbl">
    <table class="table-bordered" name="applicant_id">
      <thead class="tbl_head">
        <tr>
          <th>Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Relationship	</th>
          <th>Nationality	</th>
          <th>Work Place	</th>
          <th>Date Of Birth</th>
          <th >Occupation </th>
          <th>Annual Income</th>
          <th>Address</th>
          <th>Length of service</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
          <input type="text" class=" table-control"  name="fam_name[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_age[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_gender[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_relationship[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_nationality[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_work_place[]" value="">
          </td>
          <td>
          <input type="date" class=" table-control"  name="fam_birthday[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_occupation[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_annual_income[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control " name="fam_address[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control" name="fam_length_sevice[]" value="">
          </td>
        </tr>
        <tr>
        <td>
          <input type="text" class=" table-control"  name="fam_name[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_age[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_gender[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_relationship[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_nationality[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_work_place[]" value="">
          </td>
          <td>
          <input type="date" class=" table-control"  name="fam_birthday[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_occupation[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_annual_income[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control " name="fam_address[]" value=""> 
          </td>
          <td>
          <input type="text" class=" table-control" name="fam_length_sevice[]" value="">
          </td>
        </tr>
        <tr>
        <td>
          <input type="text" class=" table-control"  name="fam_name[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_age[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_gender[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_relationship[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_nationality[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_work_place[]" value="">
          </td>
          <td>
          <input type="date" class=" table-control"  name="fam_birthday[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_occupation[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_annual_income[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control " name="fam_address[]" value=""> 
          </td>
          <td>
          <input type="text" class=" table-control" name="fam_length_sevice[]" value="">
          </td>
        </tr>
        <tr>
        <td>
          <input type="text" class=" table-control"  name="fam_name[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_age[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_gender[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_relationship[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_nationality[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_work_place[]" value="">
          </td>
          <td>
          <input type="date" class=" table-control"  name="fam_birthday[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_occupation[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_annual_income[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control " name="fam_address[]" value=""> 
          </td>
          <td>
          <input type="text" class=" table-control" name="fam_length_sevice[]" value="">
          </td>
        </tr>
        <tr>
        <td>
          <input type="text" class=" table-control"  name="fam_name[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_age[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_gender[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_relationship[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_nationality[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_work_place[]" value="">
          </td>
          <td>
          <input type="date" class=" table-control"  name="fam_birthday[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_occupation[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control"  name="fam_annual_income[]" value="">
          </td>
          <td>
          <input type="text" class=" table-control " name="fam_address[]" value=""> 
          </td>
          <td>
          <input type="text" class=" table-control" name="fam_length_sevice[]" value="">
          </td>
        </tr>
      </tbody>
    </table>
 </div>
  <br>
 <div class="col-md-6">
  <label>Please attach the picture of you and your family below this</label>
    <div class="col-md-6" style="width: 100%;padding-left:0px;padding-right: 0px;">
      <?php
        echo form_input(array(
        'name' => 'familyfile',
        'type' => 'file',
        'class' => 'form-control stu_label',
        'id' => 'clickImage',
        'accept' => 'image/*'
        ));
      ?>
      <div class="form-group col-md-12 col-sm-12 p-0" id="showImg3"> </div>   
    </div>
  <span class="text-danger"><?php echo form_error('familyfile'); ?></span>
  </div>
</div>
<!-- Table -->

<!-- Table -->
<div class="col-md-12 float-left">
 <h6 class="" style="padding: 33px 0px 12px;">Family in Japan (Father, Mother, Spouse, Child, Brother and Sisters, or Others) :</h6>
  <select name="family_in_japan" id="family_in_japan" class="planning_select" style="margin-top: 0px;margin-bottom: 20px;">
          <option value="1">Yes</option>
          <option value="0">No</option>
  </select>
  <p >If yes, fill in all the family members in Japan.</p>
  <div class="tbl">
  <table class="table-bordered" name="applicant_id">
    <thead class="tbl_head">
      <tr>
        <th>Name</th>
        <th>Date Of Birth	</th>
        <th>Address</th>
        <th>Age	</th>
        <th>Relatonship</th>
        <th>Residing with Applicant or Not	</th>
        <th>Residing Card No	</th>
        <th >Nationality </th>
        <th>Visa status	</th>
        <th>Work Place	</th>
        <th>Certificate of Alien Registration No</th>
      </tr>
    </thead>
    <tbody>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_name[]" value="">
      </td>
      <td>
      <input type="date" class=" table-control"  name="ja_fam_date_birth[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_address[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_age[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_relationship[]" value="">
      </td>
      <td>
      <div class="">
      <select name="ja_fam_residing_applicant[]" class="table-control col-md-12">
            <option value=""></option>
            <option value="0">Yes</option>
            <option value="1">No</option>
        </select>
     </div>
      </td>
      <td>
      <input type="text" class=" table-control"  name="residence_card_no[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_nationality[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control " name="ja_fam_visa_status[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control" name="ja_fam_work_place[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control" name="ja_certificate_alien[]" value="">
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_name[]" value="">
      </td>
      <td>
      <input type="date" class=" table-control"  name="ja_fam_date_birth[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_address[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_age[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_relationship[]" value="">
      </td>
      <td>
      <div class="">
      <select name="ja_fam_residing_applicant[]" class="table-control col-md-12">
            <option value=""></option>
            <option value="0">Yes</option>
            <option value="1">No</option>
        </select>
     </div>
      </td>
      <td>
      <input type="text" class=" table-control"  name="residence_card_no[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_nationality[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control " name="ja_fam_visa_status[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control" name="ja_fam_work_place[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control" name="ja_certificate_alien[]" value="">
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_name[]" value="">
      </td>
      <td>
      <input type="date" class=" table-control"  name="ja_fam_date_birth[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_address[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_age[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_relationship[]" value="">
      </td>
      <td>
      <div class="">
      <select name="ja_fam_residing_applicant[]" class="table-control col-md-12">
            <option value=""></option>
            <option value="0">Yes</option>
            <option value="1">No</option>
        </select>
     </div>
      </td>
      <td>
      <input type="text" class=" table-control"  name="residence_card_no[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_nationality[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control " name="ja_fam_visa_status[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control" name="ja_fam_work_place[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control" name="ja_certificate_alien[]" value="">
      </td>
    </tr>
    <tr>
      
      <td>
      <input type="text" class=" table-control"  name="ja_fam_name[]" value="">
      </td>
      <td>
      <input type="date" class=" table-control"  name="ja_fam_date_birth[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_address[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_age[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_relationship[]" value="">
      </td>
      <td>
      <div class="">
      <select name="ja_fam_residing_applicant[]" class="table-control col-md-12">
            <option value=""></option>
            <option value="0">Yes</option>
            <option value="1">No</option>
        </select>
     </div>
      </td>
      <td>
      <input type="text" class=" table-control"  name="residence_card_no[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_nationality[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control " name="ja_fam_visa_status[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control" name="ja_fam_work_place[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control" name="ja_certificate_alien[]" value="">
      </td>
    </tr>
    
  </tbody>
 </table>
 </div>
 <br>
 <div class="form-group">
  <?php echo form_label('Are you planning to stay with them in Japan? : ', 'ja_plan_to_stay_with_them', array( 'class' => 'form-control-label', 'id'=> '')); ?><br/>
    <select name="ja_plan_to_stay_with_them" id="ja_plan_to_stay_with_them" class="planning_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
  </div>
  <div class="form-group">
        <?php
          echo form_label('you/your family have Japanese friends or acquaintances, please write his/her name, address,phone number, relationship, etc.','fin_address', array('class' => ''));
        ?>
        <div class="col-md-12 col-sm-12 p-0">
          <?php 
            $data = array(
            'name' => 'family_inJpfri',
            'value' => '',
            'rows' => '3',
            'cols' => '',
            'placeholder' => 'Please Enter!',
            'class' => "form-control",
            'value' => set_value('family_inJpfri',isset($result)?$result->family_inJpfri:'',ENT_QUOTES),
          );
          echo form_textarea($data); ?>
          <span class="text-danger"><?php echo form_error('family_inJpfri'); ?></span>
  </div>
 </div>
</div>
<!-- Table -->

<!-- Table -->
<div class="col-md-12 float-left" style="padding-bottom: 15px;">
 <h6 class="" style="padding: 33px 0px 12px;">Previous stay in Japan</h6>
 <div class="tbl">
 <table class="table-bordered" name="applicant_id">
  <thead class="tbl_head">
    <tr>
      <th>Date of Entry	</th>
      <th>Date of Arrival	</th>
      <th>Date of Depature </th>
      <th >Visa	 </th>
      <th >Status	 </th>
      <th>Purpose of Entry</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
      <input type="date" class=" table-control"  name="entry_date[]" value="">
      </td>
      <td>
      <input type="date" class=" table-control"  name="arrival_date[]" value="">
      </td>
      <td>
      <input type="date" class=" table-control"  name="depature_date[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="pre_stay_visa[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="status[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="entry_purpose[]" value="">
      </td>
    </tr>
    <tr>
      <td>
      <input type="date" class=" table-control"  name="entry_date[]" value="">
      </td>
      <td>
      <input type="date" class=" table-control"  name="arrival_date[]" value="">
      </td>
      <td>
      <input type="date" class=" table-control"  name="depature_date[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="pre_stay_visa[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="status[]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="entry_purpose[]" value="">
      </td>
    </tr>
  </tbody>
 </table>
 </div>
 <br>
  <div class="form-group">
        <?php echo form_label('If you have stayed in Japan more than four times, please use the blank below.', 'japan_four_times', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'japan_four_times')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'japan_four_times',
            'type' => 'text',
            'value' => html_escape(set_value('japan_four_times',isset($result)?$result->japan_four_times:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'japan_four_times',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('japan_four_times'); ?></span>
  </div>
</div>
<!-- Table -->

<!-- Table -->
<div class="col-md-12 float-left" style="padding-bottom: 15px;">
  <h6 class="" style="padding: 20px 0px 12px;">Have you ever been japan (Including 3 moth short visa)</h6>
  <div class="tbl">
  <table class="table-bordered" name="applicant_id">
    <thead class="tbl_head">
      <tr>
        <th>Purpose	</th>
        <th>Status	</th>
        <th>Period of Stay </th>
        <th >Preparation	 </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
        <input type="text" class=" table-control"  name="shortVisa_purpose[]" value="">
        </td>
        <td>
        <input type="text" class=" table-control"  name="shortVisa_status[]" value="">
        </td>
        <td>
        <input type="month" class=" table-control"  name="shortVisa_period[]" value="">
        </td>
        <td>
        <input type="text" class=" table-control"  name="shortVisa_prepare[]" value="">
        </td>
      </tr>
      <tr>
        <td>
        <input type="text" class=" table-control"  name="shortVisa_purpose[]" value="">
        </td>
        <td>
        <input type="text" class=" table-control"  name="shortVisa_status[]" value="">
        </td>
        <td>
        <input type="month" class=" table-control"  name="shortVisa_period[]" value="">
        </td>
        <td>
        <input type="text" class=" table-control"  name="shortVisa_prepare[]" value="">
        </td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
<!-- Table -->

</div>
</div>

<!-- dropdown APPLICANT INFORMATION -->
<style>
  .appl_ttl {
      padding: 16px;
      text-align: center;
  }
  .addmission{
    padding: 0px;
    /* margin: 0px; */
  }
  .admission_select{
    width: 100%;
    padding: 8px;
    /* margin: 7px; */
    border: 1px solid #ced4db;
    border-radius: 3px;
  }
  .course_select{
    width: 49%;
    padding: 8px;
    /* margin: 7px; */
    border: 1px solid #ced4db;
    border-radius: 3px;
  }
  .planning_select {
      width: 30%;
      margin: 12px 0px;
      padding: 8px;
      border: 1px solid #ced4db;
      border-radius: 3px;
  }
  #expected_year {
      margin-left: 17px;
      width: 40%;
  }
  #expected_month{
    width: 40%;

  }
  .graduating_month_year{
    display: flex;
  }
  .expected_txt{
    padding-left: 22px;
    font-size: 17px;
    margin-bottom: 0px;
    margin-top: 11px;
  }
  .col-rd{
    margin: 0px 50px 0px 0px;
  }
  .details {
      padding: 8px 10px 7px 9px;
      border: 1px solid #ced4db;
      border-radius: 3px;
      margin: 0px 54px 12px 27px;
  }
  .employment{
    padding-bottom: 12px;
  }
  .radio_record{
    width: 100%;
    /* margin-bottom: 20px; */
    display: flex;
  }
  .criminal{
    /* padding-left: 12px; */
    width: 100%;
  }
  .cri_text{
    display: flex;
  }
  .muti_txt{
    margin-right: 0px;
  }
  .appli{
    margin-left: 11px;

  }
  .table-control{
    width: 100%;
      border: none;
    }
    input.table-control.term{
    width: 76% !important;
  }
  .strEnd{
    text-align: center;
  }
  .tbl_head{
    text-align: center;
  }
  .table-bordered{
    width: 100%;
  }
  .study_year{
    margin-right: 0px;
  }
  .finial_ttl{
    padding: 20px 12px;
  }
  .radio .col-md-2{
    padding: 0px;
  }

</style>




<!-- dropdown FINANICIAL SPONSOR -->
 <div class="content_detail">
  <input class="dropdown" type="checkbox" id="faq-3">
  <p class="drop_ttl"><label for="faq-3" class="drop_label">FINANICIAL SPONSOR</label></p>
  <div class="drop_txt">
  <h5 class="finial_ttl">Finanicial Sponsor</h5>
  <div class="col-md-6 float-left" name="applicant_id">
      <div class="form-group">
        <?php echo form_label('Name', 'name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'fin_name',
            'type' => 'text',
            'value' => html_escape(set_value('fin_name',isset($result)?$result->fin_name:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'fin_name',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('name'); ?></span>
      </div>
      <div class="form-group">
        <?php echo form_label('Age', 'fin_age', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'fin_age')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'fin_age',
            'type' => 'text',
            'value' => html_escape(set_value('fin_age',isset($result)?$result->fin_age:''), ENT_QUOTES),
            'placeholder' => "Please Enter!",
            'class' => 'form-control',
            'id' => 'fin_age',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('fin_age'); ?></span>
      </div>
      <div class="form-group">
        <?php echo form_label('Relationship', 'fin_relationship', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'fin_relationship',
            'type' => 'text',
            'value' => html_escape(set_value('fin_relationship',isset($result)?$result->fin_relationship:''), ENT_QUOTES),
            'placeholder' => "Please Enter!",
            'class' => 'form-control',
            'id' => 'fin_relationship',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('fin_relationship'); ?></span>
      </div>
      <div class="form-group">
        <?php
          echo form_label('Address','fin_address', array('class' => 'col-form-label'));
        ?>
        <div class="col-md-12 col-sm-12 p-0">
          <?php 
            $data = array(
            'name' => 'fin_address',
            'value' => '',
            'rows' => '3',
            'cols' => '',
            'placeholder' => 'Please Enter!',
            'class' => "form-control",
            'value' => set_value('fin_address',isset($result)?$result->fin_address:'')
          );
          echo form_textarea($data); ?>
          <span class="text-danger"><?php echo form_error('address'); ?></span>
        </div>
      </div>
      <div class="form-group">
        <?php echo form_label('Phone Number', 'tel', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'tel',
            'type' => 'text',
            'value' => html_escape(set_value('tel',isset($result)?$result->tel:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'tel',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('tel'); ?></span>
      </div>
      <div class="form-group">
        <?php echo form_label('Email', 'email', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_email')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'email',
            'type' => 'text',
            'value' => html_escape(set_value('email',isset($result)?$result->email:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'email',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('email'); ?></span>
      </div>
      <div class="form-group">
        <?php echo form_label('Occupation', 'fin_occupation', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'fin_occupation')); ?>
        <?php
          echo form_input(array(
            'name' => 'fin_occupation',
            'type' => 'text',
            'value' => html_escape(set_value('fin_occupation',isset($result)?$result->fin_occupation:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'fin_occupation',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('occupation'); ?></span>
      </div>
      <div class="form-group">
        <?php echo form_label('Work Place', 'work_place', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <?php
          echo form_input(array(
            'name' => 'work_place',
            'type' => 'text',
            'value' => html_escape(set_value('work_place',isset($result)?$result->work_place:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'work_place',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('fin_visa'); ?></span>
      </div>
      <div class="form-group">
        <?php echo form_label('Visa', 'fin_visa', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'fin_visa')); ?>
        <?php
          echo form_input(array(
            'name' => 'fin_visa',
            'type' => 'text',
            'value' => html_escape(set_value('work_place',isset($result)?$result->fin_visa:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'fin_visa',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('work_place'); ?></span>
      </div>
      <div class="form-group">
        <?php echo form_label('Annual Income', 'annual_income', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <?php
          echo form_input(array(
            'name' => 'annual_income',
            'type' => 'text',
            'value' => html_escape(set_value('annual_income',isset($result)?$result->annual_income:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'annual_income',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('annual_income'); ?></span>
      </div>
      <div class="form-group">
        <?php echo form_label('The amount of saving for study abroad ', 'amount_saving_for_study_abroad', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <?php
          echo form_input(array(
            'name' => 'amount_saving_for_study_abroad',
            'type' => 'text',
            'value' => html_escape(set_value('amount_saving_for_study_abroad',isset($result)?$result->amount_saving_for_study_abroad:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'amount_saving_for_study_abroad',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('amount_saving_for_study_abroad'); ?></span>
      </div>
      <div class="form-group">
        <?php echo form_label('The amount of saving which can be proved ', 'amount_of_saving_which_proved', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <?php
          echo form_input(array(
            'name' => 'amount_of_saving_which_proved',
            'type' => 'text',
            'value' => html_escape(set_value('amount_of_saving_which_proved',isset($result)?$result->amount_of_saving_which_proved:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'amount_of_saving_which_proved',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('amount_of_saving_which_proved'); ?></span>
      </div>
      <div class="form-group">
        <?php echo form_label('Start of Work date', 'start_work_date', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <?php
          echo form_input(array(
            'name' => 'start_work_date',
            'type' => 'date',
            'value' => html_escape(set_value('start_work_date',isset($result)?$result->start_work_date :''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'start_work_date ',
            'autocomplete' => ''));
        ?>
       <span class="text-danger"><?php echo form_error('start_work_date'); ?></span>
      </div>
  </div>
 </div>
<!-- dropdown FINANICIAL SPONSOR -->
    <div class="clearfix"></div>
        <hr class="my-4 dashed clearfix">
        <div class="text-right">
          <button type="submit" class="btn btn-primary text-white btn-sm py-1 px-2">
            <span class="material-icons align-top md-18 mr-1">add_circle</span>Confirm
          </button>
          <button type="reset" class="btn btn-secondary text-white btn-sm py-1 px-2">
            <span class="material-icons align-top md-18 mr-1">sync</span>Reset
          </button>
        </div>
    </div>
    <?php echo form_close(); ?> 
</div>
</div>
</div>
</div>

<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>
<script>
  function filePreview(input,div){
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $(div).empty();
          $(div).html('<embed src="'+e.target.result+'" width="50%" >');
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#clickImg").change(function () {
    filePreview(this,"#showImg1");
  });
</script>

<script>
  function filePreview(input,div){
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $(div).empty();
          $(div).html('<embed src="'+e.target.result+'" width="50%" >');
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#clickImgs").change(function () {
    filePreview(this,"#showImg2");
  });
  
</script>

<script>
  function filePreview(input,div){
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $(div).empty();
          $(div).html('<embed src="'+e.target.result+'" width="50%" >');
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#clickImage").change(function () {
    filePreview(this,"#showImg3");
  });
</script>

<style>
  label {
      font-weight: initial;
  }   
    .table-bordered thead th, .table-bordered thead td {
      font-size: 15px;
      font-weight: 400;
      border-bottom-width: 2px;
  }
  input#clickImg {
      /* width: 252px; */
      padding: 3.5px;
  }
  .col-form-label {
    width:49%;
    padding-top: 7px;
    padding-bottom: 10px;
  }
  .col-form-labels {
    width:60%;
    padding-top: 7px;
    padding-bottom: 10px;
  }
  #showImg1 {
      /* margin: 10px 140px 0px; */
  }
  div.content_detail{
  position: relative;
  margin:0 2em 1em;
  }
  .dropdown{
  position: absolute;
  left: 0;
  top: 0;
  /* height: 100%; */
  width: 100%;
  opacity:0;
  visibility: 0;
  }
  .drop_ttl{
  background:#f1797b;
  color:white;
  padding: 0.75rem 1.25rem;
  position: relative;
  margin: 0px;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 5px;
  }
  .drop_label::before {
  content: "";
  display: inline-block;
  border: 9px solid transparent;
  border-left: 10px solid white;
  }
  .drop_label{
    cursor: pointer;
    position: relative;
    display: flex;
    align-items: center;
  }
  input:checked ~ p .drop_label::before {
      margin-top: 5px;
      margin-right: 5px;
      border: 8px solid transparent;
      border-top: 12px solid white;
  }

  .drop_label{
  cursor: pointer;
  position: relative;
  display: flex;
  align-items: center;
  margin-bottom: 0px;
  }
  div.drop_txt{
  max-height:0px;
  overflow: hidden;
  transition:max-height 0.9s;
  }
  /* div.drop_txt p {
  padding:2em;
  } */
  .dropdown:checked ~ .drop_ttl ~ div.drop_txt{
  max-height:100%;
  }
  a{
  color:#48a1af;
  }
  .school_select {
      padding: 8px;
      margin: 16px 5px 7px 0px;
      border: 1px solid #ced4db;
      border-radius: 3px;
  }
  .school_list{
    width: 55%;
    padding: 5px 12px;
    align-items: center;
    display: flex;
  }
  .list_label{
    width: 50%;
    font-size: 16px;
    margin: 0px;
  }
  .text-right {
      padding-bottom: 27px;
      text-align: right !important;
  }
</style>