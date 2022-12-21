<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title">JLS Applicant Registration</h1>
    </div> 
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a href="<?php echo base_url('adm/portal/jls_applicant'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>
    </div>
  </div>
</div> 

<?php if(!empty($_SESSION['msg_success'])){ ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong>  <?php echo $_SESSION['msg_success']; ?> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" class="material-icons md-18">clear</span>
    </button>
  </div>
<?php } ?>    

<?php if(!empty($_SESSION['msg_error'])){ ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Warning!</strong>  <?php echo $_SESSION['msg_error']; ?> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" class="material-icons md-18">clear</span>
    </button>
  </div>
<?php } ?>

<style>
  label {
      font-weight: 400;
      font-size: 16px !important;
  }      
  .std_img{
      padding-top: 12px;
  }
  .list_label{
      padding-top: 12px;
  }
  .comfirm_val{
      /* padding-left: 12px; */
      font-size: 14px;
  }
  .tbl_comfirmVal{
    font-size: 14px;
  }
  p{
    margin-bottom: 0px;
  }
</style>

<div class="content">
<div class="row">
<div class="col-lg-12 col-md-12 mb-4 mb-lg-0">
<div class="card">
  <div class="card-body">
      <?php 
            $attr = array('class' => "");
            echo form_open('adm/portal/jls_applicant/store', $attr); 
        
            $data = array(
              'name'  => 'jls_name',
              'type' => 'hidden',
              'value' => $lists['jls_name'],
            );
            $data = array(
              'name'  => 'jls_name',
              'type' => 'hidden',
              'value' => $lists['jls_name'],
            );
            echo form_input($data);
            $data = array(
              'name'  => 'image_file',
              'type' => 'hidden',
              'value' => $lists['image_file'],
            );
            echo form_input($data);
            $data = array(
              'name'  => 'sign_file',
              'type' => 'hidden',
              'value' => $lists['sign_file'],
            );
            echo form_input($data);
            $data = array(
              'name'  => 'family_file',
              'type' => 'hidden',
              'value' => $lists['family_file'],
            );
            echo form_input($data);
            $data = array(
              'name'  => 'applicant_name',
              'type' => 'hidden',
              'value' => $lists['applicant_name'],
            );
            echo form_input($data);
              
            $data = array(
              'name'  => 'applicant_name_kanji',
              'type' => 'hidden',
              'value' => $lists['applicant_name_kanji'],
            );
            echo form_input($data);
            
            $data = array(
              'name'  => 'date_of_birthday',
              'type' => 'hidden',
              'value' => $lists['date_of_birthday'],
            );
            echo form_input($data);
            
            $data = array(
              'name'  => 'place_birth',
              'type' => 'hidden',
              'value' => $lists['place_birth'],
            );
            echo form_input($data);   
            $data = array(
              'name'  => 'have_you_visited_jp',
              'type' => 'hidden',
              'value' => $data_details['have_you_visited_jp'],
            );
            echo form_input($data);
            $data = array(
              'name'  => 'visited_date',
              'type' => 'hidden',
              'value' => $data_details['visited_date'],
            );
            echo form_input($data);               
      ?> 
      <?php
        $attributes = array('class' => 'form-horizontal form-label-left');
        echo form_open_multipart('adm/portal/jls_applicant/confirm', $attributes);
      ?>
    <div class="col-md-12">
      <!-- Student Photo -->
        <div class="col-md-6" style="display: flex;padding-top: 32px;">
          <?php
              echo form_label('Applicant Photo','image_file', array('class' => 'col-form-label')) ;
          ?>
          <div class="std_img">
            <?php echo $lists['image_file']; ?>
          </div>
        </div>
      <!-- Student Photo -->  
      <!-- Student Sign -->
        <div class="col-md-6" style="display: flex;padding-top: 12px;">
          <?php
              echo form_label('Applicant Sign','signfile', array('class' => 'col-form-label')) ;
          ?>
          <div class="std_img">
          <?php echo $lists['sign_file']; ?>
          </div>  
        </div>
      <!-- Student Sign -->

      <!-- JLS Name  -->
        <div class="col-md-6 school_list" name="" >
            <label class="list_label">JLS Name </label>
            <p name="jls_name" id="jls_name" class="list_label"><?php echo $lists['jls_name']; ?></p>
        </div>
      <!-- JLS Name -->

      <!-- Status  -->
        <div class="col-md-6 school_list" name="" >
            <label class="list_label">Status </label>
            <p name="appli_status" id="appli_status" class="list_label"><?php echo $lists['appli_status']; ?></p>
        </div>
      <!-- Status -->

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
        <?php echo form_label('Name (アルファベット)', 'applicant_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
        <p class="comfirm_val" id="applicant_name" name="applicant_name"><?php echo $lists['applicant_name']; ?></p>
    </div>

    <div class="form-group">
        <?php echo form_label(' Name (漢字)', 'applicant_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
        <p class="comfirm_val" id="applicant_name_kanji" name="applicant_name_kanji"><?php echo $lists['applicant_name_kanji']; ?></p>
    </div>

    <div class="form-group">
        <?php echo form_label('Date Of Birth', 'date_of_birthday', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_birthday')); ?>
        <p class="comfirm_val" id="date_of_birthday" name="date_of_birthday"><?php echo $lists['date_of_birthday']; ?></p>
    </div>

    <div class="form-group">
        <?php echo form_label('Place Of Birth Province', 'province', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'province')); ?>
        <p class="comfirm_val" id="province" name="province"><?php echo $lists['province']; ?></p>
    </div>

    <div class="form-group">
        <?php echo form_label('Place Of Birth City', 'place_birth', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
        <p class="comfirm_val" id="place_birth" name="place_birth"><?php echo $lists['place_birth']; ?></p>
    </div>

    <div class="form-group">
        <?php echo form_label('Age', 'info_age', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'info_age')); ?>
        <p class="comfirm_val" id="info_age" name="info_age"><?php echo $lists['info_age']; ?></p>
    </div>

    <div class="form-group">
        <?php echo form_label('Nationality', 'info_nationality', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'info_nationality')); ?>
        <p class="comfirm_val" id="info_nationality" name="info_nationality"><?php echo $lists['info_nationality']; ?></p>
    </div>

    <div class="form-group">
       <?php echo form_label('Gender', 'gender', array( 'class' => 'form-control-label', 'id'=> '')); ?>
       <p class="comfirm_val" id="gender" name="gender"><?php if($lists['gender'] == "1"){echo "Male";}else{echo "Female";} ?></p>
    </div> 
<script>
    $(function() {  
       if(($('#martial_status').text()) =="Single"){
         $('#partaner').hide();
        }else if(($('#martial_status').text())=="Married"){
        $('#partaner').show();
      }else{
        $('#partaner').hide();
      }
    });
</script>
    <div class="form-group">
      <?php echo form_label('Martial Status', 'martial_status', array( 'class' => 'form-control-label', 'id'=> '')); ?>
      <p class="comfirm_val" id="martial_status" name="martial_status"><?php if($lists['martial_status'] == "1"){echo "Single";}else{echo "Married";} ?></p>
    </div> 
     
    <div class="form-group " id="partaner">
        <?php echo form_label('Name of your Partaner', 'partaner_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
        <p class="comfirm_val" id="partaner_name" name="partaner_name"><?php echo $lists['partaner_name']; ?></p>
    </div>

    <div class="form-group">
        <?php echo form_label('Email', 'email', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_email')); ?>
        <p class="comfirm_val" id="std_email" name="email"><?php echo $lists['std_email']; ?></p>
    </div>

    <div class="form-group">
        <?php echo form_label('Phone Number', 'info_phone', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <p class="comfirm_val" id="info_phone" name="info_phone"><?php echo $lists['info_phone']; ?></p>
    </div>

    <div class="form-group">
        <?php echo form_label('Address','address', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'address')); ?>
        <p class="comfirm_val" id="address" name="address"><?php echo $lists['address']; ?></p>
    </div>

    <div class="form-group">
        <?php echo form_label('Course of Admission','course_admission', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'course_admission')); ?>
        <!-- <p class="addmission">Course of Admission</p> -->
        <p class="comfirm_val" id="course_admission" name="course_admission"><?php echo $lists['course_admission']; ?></p>
    </div>

    <div class="form-group">
        <?php echo form_label('Length of Study', 'course_study_lengh', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
        <p class="comfirm_val" id="course_study_lengh" name="course_study_lengh"><?php echo $lists['course_study_lengh']; ?></p>
    </div>

   <div class="form-group">
        <?php echo form_label('Have you visited Japan?', 'have_you_visited_jp', array( 'class' => 'form-control-label', 'id'=> '')); ?>
        <p class="comfirm_val" id="have_you_visited_jp" name="have_you_visited_jp"><?php if($data_details['have_you_visited_jp'] == "1"){echo "Yes";}else{echo "No";} ?></p>
  </div>

  <div class="form-group">
        <?php echo form_label('Have you visited Japan?', 'visited_jp_status', array( 'class' => 'form-control-label', 'id'=> '')); ?>
        <p class="comfirm_val" id="visited_jp_status" name="visited_jp_status"><?php echo $data_details['visited_jp_status']; ?></p>
  </div>

  <div class="form-group">
        <?php echo form_label('Date of Entry', 'visited_date', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <p class="comfirm_val" id="visited_date" name="visited_date"><?php echo $data_details['visited_date']; ?></p>
  </div>

  <div class="form-group">
        <?php echo form_label('Times of Entry', 'entry_time', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <p class="comfirm_val" id="entry_time" name="entry_time"><?php echo $data_details['entry_time']; ?></p>
  </div>

  <div class="form-group">
        <?php echo form_label('Date of Departure', 'date_of_departure', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <p class="comfirm_val" id="date_of_departure" name="date_of_departure"><?php echo $data_details['date_of_departure']; ?></p>
  </div>

  <div class="form-group">
        <?php echo form_label('Enter visa type if you visited Japan', 'visa type', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <p class="comfirm_val" id="visa_type" name="visa_type"><?php echo $data_details['visa_type']; ?></p>
  </div>

  <div class="form-group">
        <?php echo form_label('Departure by deportation / departure order or not', 'departure_deportation', array( 'class' => 'form-control-label', 'id'=> '')); ?>
        <p class="comfirm_val" id="departure_deportation" name="departure_deportation"><?php if($data_details['departure_deportation'] == "1"){echo "Yes";}else{echo "No";} ?></p>
  </div>

  <div class="form-group">
        <?php echo form_label('Current Status', 'current_status', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <p class="comfirm_val" id="current_status" name="current_status"><?php echo $data_details['current_status']; ?></p>
  </div>
 
  <div class="form-group">
        <?php echo form_label('(Expected month and year of graduating from the school.) ', 'expected_month_year_graduating', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <div class="graduating_month_year">
            <p class="comfirm_val" id="expected_month" name="expected_month" style="text-align: center;"><?php echo $data_details['expected_month']; ?></p>
            <p class="expected_txt">月</p>
            <p class="comfirm_val" id="expected_year" name="expected_year" style="text-align: center;"><?php echo $data_details['expected_year']; ?></p>
            <p class="expected_txt" >年</p>
        </div>
  </div>

  <div class="form-group">
        <?php echo form_label('Name of School', 'current_status_school_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <p class="comfirm_val" id="current_status_school_name" name="current_status_school_name"><?php echo $data_details['current_status_school_name']; ?></p>
  </div>

  <div class="form-group">
        <?php echo form_label('Department/Major', 'current_status_school_major', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <p class="comfirm_val" id="current_status_school_major" name="current_status_school_major"><?php echo $data_details['current_status_school_major']; ?></p>
  </div>

  <div class="form-group">
        <?php echo form_label('Grade', 'current_status_school_grade', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <p class="comfirm_val" id="current_status_school_grade" name="current_status_school_grade"><?php echo $data_details['current_status_school_grade']; ?></p>
  </div>

  <div class="form-group">
        <?php echo form_label('What do you want to do in Japan? ‌', 'what_todo_japan', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'what_todo_japan')); ?>
        <p class="comfirm_val" id="what_todo_japan" name="what_todo_japan"><?php echo $other_info['what_todo_japan']; ?></p>
  </div>

  <div class="form-group">
        <?php echo form_label('Others (If your are a student of Japanese language course, or neither a student nor a worker, explain your current situation in detail. ‌', 'student_work_details', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'student_work_details')); ?>
        <p class="comfirm_val" id="student_work_details" name="student_work_details"><?php echo $other_info['student_work_details']; ?></p>
  </div>

  <div class="form-group">
    <?php echo form_label('What language can you use?', 'language_can_you_use', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'COE_reject')); ?>
    <p class="comfirm_val" id="language_can_you_use" name="language_can_you_use"><?php echo $other_info['language_can_you_use']; ?></p>   
  </div>
 
  <div class="form-group" id="specific_plans">
      <h6 class="spec_plan">Specific Plans after Graduating</h6>
      <?php echo form_label('Specific Plans after Graduating', 'specific_plans_after_graduating', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <p class="comfirm_val" id="specific_plans_after_graduating" name="specific_plans_after_graduating"><?php echo $data_details['specific_plans_after_graduating']; ?></p>
  </div>

  <br>
  <h6 class="spec_plan">Higher Education in Japan</h6>
  <div class="form-group">
        <?php echo form_label('Type of Schools', 'specific_plan_type_schools', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <p class="comfirm_val" id="specific_plan_type_schools" name="specific_plan_type_schools"><?php echo $data_details['specific_plan_type_schools']; ?></p>
  </div>
  <div class="form-group">
        <?php echo form_label('Name of School', 'specific_plan_school_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <p class="comfirm_val" id="specific_plan_school_name" name="specific_plan_school_name"><?php echo $data_details['specific_plan_school_name']; ?></p>
  </div>
  <div class="form-group">
        <?php echo form_label('Major', 'specific_plan_major ', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <p class="comfirm_val" id="specific_plan_major" name="specific_plan_major"><?php echo $data_details['specific_plan_major']; ?></p>
  </div>
  <div class="form-group">
        <?php echo form_label('What is your special ability?', 'special_ability ', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'special_ability')); ?>
        <p class="comfirm_val" id="special_ability" name="special_ability"><?php echo $other_info['special_ability']; ?></p>
  </div>

  <div class="form-group">
        <?php echo form_label('What are your hobbies?', 'hobbies ', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <p class="comfirm_val" id="hobbies" name="hobbies"><?php echo $other_info['hobbies']; ?></p>
  </div>
</div>
<!-- leftside -->

<!-- rightside -->
<div class="col-md-6 float-left">
  <div class="form-group">
      <?php echo form_label('Occupation', 'occupation', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'occupation')); ?>
      <p class="comfirm_val" id="occupation" name="occupation"><?php echo $lists['occupation']; ?></p>
  </div>

  <div class="form-group">
      <?php echo form_label('Place of Employment or School', 'place_employment_school', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <p class="comfirm_val" id="place_employment_school" name="place_employment_school"><?php echo $lists['place_employment_school']; ?></p>
  </div>

  <div class="form-group">
      <?php echo form_label('Address of Employment or School', 'addr_employment_school', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <p class="comfirm_val" id="addr_employment_school" name="addr_employment_school"><?php echo $lists['addr_employment_school']; ?></p>
  </div>

  <style>
    .employment_text{
      margin-bottom: 10px;
    }
  </style>

  <div class="form-group">
      <?php echo form_label('Tel of Employment or School', 'tel_employment_school', array( 'class' => 'employment_text', 'id'=> '', 'style' => '', 'for' => 'phone'));?>
      <p class="comfirm_val" id="tel_employment_school" name="tel_employment_school"><?php echo $lists['tel_employment_school']; ?></p>
  </div>

  <div class="form-group">
      <?php echo form_label('Entrance Age to Elementary School', 'entry_age_ele_school', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <p class="comfirm_val" id="entry_age_ele_school" name="entry_age_ele_school"><?php echo $lists['entry_age_ele_school']; ?></p>
  </div>

  <div class="form-group">
      <?php echo form_label('Lastest Educational history School name', 'educational_school_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <p class="comfirm_val" id="educational_school_name" name="educational_school_name"><?php echo $lists['educational_school_name']; ?></p>
  </div>

  <div class="form-group">
      <?php echo form_label('Duration of JP Language study', 'duration_jp_language_study', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <p class="comfirm_val" id="duration_jp_language_study" name="duration_jp_language_study"><?php echo $lists['duration_jp_language_study']; ?></p>
  </div>

  <style>
    .passport_text{
      margin-bottom: 10px;
    }
  </style>

  <div class="form-group">
  <?php echo form_label('Passport', 'passport', array( 'class' => 'passport_text', 'id'=> '')); ?>
  <p class="comfirm_val" id="passport" name="passport"><?php if($lists['passport'] == "1"){echo "Yes";}else{echo "No";} ?></p>
  </div>

  <div class="form-group">
      <?php echo form_label('Passport Number', 'passport_no', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <p class="comfirm_val" id="passport_no" name="passport_no"><?php echo $lists['passport_no']; ?></p>
  </div>

  <div class="form-group">
      <?php echo form_label('Date of issue', 'passport_data_issue', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <p class="comfirm_val" id="passport_data_issue" name="passport_data_issue"><?php echo $lists['passport_data_issue']; ?></p>
  </div> 

  <div class="form-group">
      <?php echo form_label('Date of expiration', 'passport_data_exp', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <p class="comfirm_val" id="passport_data_exp" name="passport_data_exp"><?php echo $lists['passport_data_exp']; ?></p>
  </div>  

  <div class="form-group">
      <?php echo form_label('Passport Issue Authority', 'passport_issue_authority', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'passport_issue_authority')); ?>
      <p class="comfirm_val" id="passport_issue_authority" name="passport_issue_authority"><?php echo $lists['passport_issue_authority']; ?></p>
  </div>  

  <style>
    .military_txt{
      margin-bottom: 16px;
    }
  </style>

  <div class="form-group">
      <?php echo form_label('Blank period／Military service', 'military_service', array( 'class' => 'military_txt', 'id'=> '')); ?>
      <p class="comfirm_val" id="military_service" name="military_service"><?php if($lists['military_service'] == "1"){echo "Yes";}else{echo "No";} ?></p>
  </div>

  <div class="form-group">
      <?php echo form_label('Blank period／Military service details', 'military_service_details', array( 'class' => 'military_txt', 'id'=> '')); ?>
      <p class="comfirm_val" id="military_service_details" name="military_service_details"><?php echo $lists['military_service_details']; ?></p>
  </div>

  <div class="form-group">
      <?php echo form_label('Place to Apply for VISA', 'place_apply_visa', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'place_apply_visa')); ?>
      <p class="comfirm_val" id="place_apply_visa" name="place_apply_visa"><?php echo $data_details['place_apply_visa']; ?></p>
  </div>
  
  <div class="form-group">
      <?php echo form_label('Accompanying Persons,if Any', 'accompanying_person', array( 'class' => 'form-control-label', 'id'=> '')); ?>
      <p class="comfirm_val" id="accompanying_person" name="accompanying_person"><?php if($data_details['accompanying_person'] == "1"){echo "Yes";}else{echo "No";} ?></p>
  </div>

  <div class="form-group">
      <?php echo form_label('Accompanying Persons,if Any', 'accompanying_marital_status', array( 'class' => 'form-control-label', 'id'=> '')); ?>
      <p class="comfirm_val" id="accompanying_marital_status" name="accompanying_marital_status"><?php echo $data_details['accompanying_marital_status']; ?></p>
  </div>

  <div class="form-group">
      <?php echo form_label('Did you apply before in Japan?', 'school_apply_before_japan', array( 'class' => 'form-control-label', 'id'=> '')); ?>
      <p class="comfirm_val" id="school_apply_before_japan" name="school_apply_before_japan"><?php if($data_details['school_apply_before_japan'] == "1"){echo "Yes";}else{echo "No";} ?></p>
  </div>

  <div class="form-group">
      <?php echo form_label('when?', 'school_apply_date', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <p class="comfirm_val" id="school_apply_date" name="school_apply_date"><?php echo $data_details['school_apply_date']; ?></p>
  </div>

  <div class="form-group">
      <?php echo form_label('status?', 'school_apply_status', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <p class="comfirm_val" id="school_apply_status" name="school_apply_status"><?php echo $data_details['school_apply_status']; ?></p>
  </div>

  <div class="form-group">
      <?php echo form_label('Name of School?', 'school_apply_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <p class="comfirm_val" id="school_apply_name" name="school_apply_name"><?php echo $data_details['school_apply_name']; ?></p>   
  </div>

  <div class="form-group">
      <?php echo form_label('Which immigration office?', 'immigration_office', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'immigration_office')); ?>
      <p class="comfirm_val" id="immigration_office" name="immigration_office"><?php echo $data_details['immigration_office']; ?></p>   
  </div>

  <div class="form-group">
     <?php echo form_label('Result?', 'immigration_result', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'immigration_result')); ?>
     <p class="comfirm_val" id="immigration_result" name="immigration_result"><?php echo $data_details['immigration_result']; ?></p>   
  </div>

  <div class="form-group">
     <?php echo form_label('Reason?', 'immigration_reason', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'immigration_reason')); ?>
     <p class="comfirm_val" id="immigration_reason" name="immigration_reason"><?php echo $data_details['immigration_reason']; ?></p>   
  </div>  

  <div class="form-group">
      <?php echo form_label('Graduate Date', 'graduate_date', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <p class="comfirm_val" id="graduate_date" name="graduate_date"><?php echo $data_details['graduate_date']; ?></p>   
  </div>

  <div class="form-group">
  <?php echo form_label('Have you ever experienced COE rejection?', 'COE_reject', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'COE_reject')); ?>
  <p class="comfirm_val" id="COE_reject" name="COE_reject"><?php if($data_details['COE_reject'] == "1"){echo "Yes";}else{echo "No";} ?></p>   
  </div>

  <div class="form-group">
  <?php echo form_label('What subjects are you good at?', 'you_are_good_subject', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'you_are_good_subject')); ?>
  <p class="comfirm_val" id="you_are_good_subject" name="you_are_good_subject"><?php echo $other_info['you_are_good_subject']; ?></p>   
  </div>
  
  <h6 class="spec_plan" style="padding-top: 132px;">Employment</h6>
  <div class="form-group">
        <?php echo form_label('Aimed occupational category', 'aimed_occupational_category', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'aimed_occupational_category')); ?>
        <p class="comfirm_val" id="aimed_occupational_category" name="aimed_occupational_category"><?php echo $data_details['aimed_occupational_category']; ?></p>   
  </div>
  <h6 class="spec_plan" style="padding: 0px;margin-bottom:10px;">Return to home country</h6>
  <div class="form-group">
        <?php echo form_label('When will you return', 'will_you_return', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'will_you_return')); ?>
        <p class="comfirm_val" id="will_you_return" name="will_you_return"><?php echo $data_details['will_you_return']; ?></p>   
  </div>
  <div class="form-group">
        <?php echo form_label('Return Other', 'return_other', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'return_other')); ?>
        <p class="comfirm_val" id="return_other" name="return_other"><?php echo $data_details['return_other']; ?></p>   
  </div>
  <div class="form-group">
  <?php echo form_label('Is it possible to provide in English? ', 'provide_english', array( 'class' => 'form-control-label', 'id'=> '')); ?>
  <p class="comfirm_val" id="provide_english" name="provide_english"><?php if($data_details['provide_english'] == "1"){echo "Yes";}else{echo "No";} ?></p>   
  </div>

  <div class="form-group">
  <?php echo form_label('Are you allergic to any medicine or foods?', 'allergic_medicine', array( 'class' => 'form-control-label', 'id'=> '')); ?>
  <p class="comfirm_val" id="allergic_medicine" name="allergic_medicine"><?php if($other_info['allergic_medicine'] == "1"){echo "Yes";}else{echo "No";} ?></p>   
  </div>

  <div class="form-group">
  <?php echo form_label('If you select ”Yes”, please tell us in detal about your allegy.', 'allergic_medicine_details', array( 'class' => 'form-control-label', 'id'=> '')); ?>
  <p class="comfirm_val" id="allergic_medicine_details" name="allergic_medicine_details"><?php echo $other_info['allergic_medicine_details']; ?></p>   
  </div>
  

</div> 
<!-- rightside -->

<!-- co_leftside -->
<div class="float-left">
    <h6 class="txt" style="padding: 33px 10px 12px;">Is there any your family member who understands at least one  of the languages which we understand?And, who?</h6>
</div>
<div class="col-md-6 float-left">
  <div class="form-group">
        <?php echo form_label('Who?', 'understand_language', array( 'class' => 'understand_language', 'id'=> '', 'style' => '', 'for' => 'understand_language')); ?>
        <p class="comfirm_val" id="understand_language" name="understand_language"><?php echo $data_details['understand_language']; ?></p>   
  </div>

  <div class="form-group">
        <?php echo form_label('Criminal Record in Japan or Overseas', 'criminal_record', array( 'class' => 'form-control-label', 'id'=> '')); ?>
        <p class="comfirm_val" id="criminal_record" name="criminal_record"><?php if($data_details['criminal_record'] == "1"){echo "Yes";}else{echo "No";} ?></p>   
  </div>
   
  <div class="criminal float-left">
  <div class="">
        <?php echo form_label('Have you applied for Certificate of Eligibility?', 'eligibility_have', array( 'class' => 'form-control-label', 'id'=> '')); ?>
  </div>
  <div class="radio_record">
  <div class="criminal_record01">
      <p class="comfirm_val" id="eligibility_have" name="eligibility_have"><?php if($data_details['eligibility_have'] == "1"){echo "Yes";}else{echo "No";} ?></p>   
  </div>        
  <div class="">
      <label class="col-rd cri_text"><span>Times</span>
      <p class="comfirm_val" id="criminal_record_details" name="criminal_record_details"><?php echo $data_details['criminal_record_details']; ?></p>   
      </label> 
  </div>
  </div>  
</div>  
<br>
<div class="form-group">
        <?php echo form_label('Intended to enroll', 'intended_roll', array( 'class' => 'form-control-label', 'id'=> '')); ?>
        <p class="comfirm_val" id="intended_roll" name="intended_roll"><?php if($other_info['intended_roll'] == "1"){echo "issued";}else{echo "denied";} ?></p>   
</div>
<br><br><br>
<div class="form-group">
        <?php echo form_label('ビザの種類 type of visa', 'eligibility_visa', array( 'class' => '', 'id'=> 'eligibility_visa')); ?>
        <p class="comfirm_val" id="eligibility_visa" name="eligibility_visa"><?php echo $other_info['eligibility_visa']; ?></p>   
</div>
</div>

<div class="col-md-6 float-left">
 <div class="form-group">
    <label class="addmission">Language</label>
    <p class="comfirm_val" id="family_language" name="family_language"><?php echo $data_details['family_language']; ?></p>   
  </div>
  <div class="form-group">
    <?php echo form_label('Details', ' criminal_record_details', array( 'class' => 'eli_text', 'id'=> 'criminal_record_details', 'style' => '', 'for' => 'phone')); ?>
    <p class="comfirm_val" id="criminal_record_details" name="criminal_record_details"><?php echo $data_details['criminal_record_details']; ?></p>   
  </div>
  <div class="criminal form-group float-left">
    <div class="">
    <?php echo form_label('Have you applied for Certificate of Eligibility?', 'criminal_record', array( 'class' => 'form-control-label', 'id'=> '')); ?>
  </div>
  
  <div class="radio_record">
        <div class="">
            <label class="col-rd cri_text"><span>When:</span>
            <p class="comfirm_val" id="criminal_record_when" name="criminal_record_when"><?php echo $data_details['criminal_record_when']; ?></p> 
            </label>                
        </div>
        <div class="">
            <label class="col-rd cri_text"><span>Purpose of Entry:</span>
            <p class="comfirm_val" id="entry_purpose" name="entry_purpose1"><?php echo $data_details['entry_purpose1']; ?></p>
            </label> 
        </div>
    </div> 
    <div class="form-group">
    <?php echo form_label('Of these applications, the number of times of non-issuance', ' eligibility_non_issuance', array( 'class' => 'eli_text', 'id'=> 'eligibility_non_issuance', 'style' => '', 'for' => 'phone')); ?>
    <p class="comfirm_val" id="eligibility_non_issuance" name="eligibility_non_issuance"><?php echo $data_details['eligibility_non_issuance']; ?></p>   
</div> 
<div class="form-group">
    <?php echo form_label('Issued / Denied Date', ' issued_date', array( 'class' => '', 'id'=> 'issued_date', 'style' => '', 'for' => 'issued_date')); ?>
    <p class="comfirm_val" id="issued_date" name="criminal_record_details"><?php echo $other_info['issued_date']; ?></p>   
</div>

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
  .form-group {
    margin-bottom: 1rem;
    /* border: 1px solid; */
    height: 50px;
}
</style> 
  
</div>
<!-- co_leftside -->

<div class="criminal float-left" style="padding-left: 14px;">
<div>
  <label>Purpose of studying in Japanese </label>
  <p class="comfirm_val" id="purpose_studying_in_japanese" name="purpose_studying_in_japanese">
  <?php echo $data_details['purpose_studying_in_japanese']; ?>
  </p>  
</div>
</div>
<div>
<div class="col-md-6 float-left">
<h6 class="" style="padding: 33px 0px 12px;">Contact details of your family</h6>
<div class="form-group">
    <?php echo form_label('Email', 'family_mail', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'family_mail')); ?>
    <p class="comfirm_val" id="family_mail" name="family_mail"><?php echo $lists['family_mail']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Phone Number', 'family_tel', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'family_tel')); ?>
    <p class="comfirm_val" id="family_tel" name="family_tel"><?php echo $lists['family_tel']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Address','family_address', array('class' => '')); ?>
    <p class="comfirm_val" id="family_address" name="family_address"><?php echo $lists['family_address']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Name of the place where your father is working ','father_work_place', array('class' => '')); ?>
    <p class="comfirm_val" id="father_work_place" name="father_work_place"><?php echo $other_info['father_work_place']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Type of work/post father','type_work_father', array('class' => '')); ?>
    <p class="comfirm_val" id="type_work_father" name="type_work_father"><?php echo $other_info['type_work_father']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Name of the place where your mother is working ','mother_work_place', array('class' => '')); ?>
    <p class="comfirm_val" id="mother_work_place" name="mother_work_place"><?php echo $other_info['mother_work_place']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Type of work/post mother','type_work_mother', array('class' => '')); ?>
    <p class="comfirm_val" id="type_work_mother" name="type_work_mother"><?php echo $other_info['type_work_mother']; ?></p>
</div>
</div>
</div>
<!-- co_leftside -->
<!-- co_rightside -->
<div class="col-md-6 float-right">
<h6 class="" style="padding: 33px 0px 12px;">Name of person who gave the consent</h6>
<div class="form-group">
    <?php echo form_label('Consent Name', 'consent_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'consent_name')); ?>
    <p class="comfirm_val" id="consent_name" name="consent_name"><?php echo $other_info['consent_name']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Relation', 'consent_relation', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'consent_relation')); ?>
    <p class="comfirm_val" id="consent_relation" name="consent_relation"><?php echo $other_info['consent_relation']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Address','consent_address', array('class' => '')); ?>
    <p class="comfirm_val" id="consent_address" name="consent_address"><?php echo $other_info['consent_address']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Email','consent_email', array('class' => '')); ?>
    <p class="comfirm_val" id="consent_email" name="consent_email"><?php echo $other_info['consent_email']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Phone','consent_tel', array('class' => '')); ?>
    <p class="comfirm_val" id="consent_tel" name="consent_tel"><?php echo $other_info['consent_tel']; ?></p>
</div>
</div>
<!-- co_rightside -->
<!-- co_rightside -->
<div class="col-md-6 float-right">
<h6 class="" style="padding: 168px 0px 12px;">Written Oath for Defraying Expenses</h6>
<div class="form-group">
    <?php echo form_label('Tuition for 6 months', 'six_tuition_fee', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'six_tuition_fee')); ?>
    <p class="comfirm_val" id="six_tuition_fee" name="six_tuition_fee"><?php echo $other_info['six_tuition_fee']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Tuition for first year', 'first_year_tuitioin_fee', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'first_year_tuitioin_fee')); ?>
    <p class="comfirm_val" id="first_year_tuitioin_fee" name="first_year_tuitioin_fee"><?php echo $other_info['first_year_tuitioin_fee']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Tuition for second year','second_year_tuitioin_fee', array('class' => '')); ?>
    <p class="comfirm_val" id="second_year_tuitioin_fee" name="second_year_tuitioin_fee"><?php echo $other_info['second_year_tuitioin_fee']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Period Studying Required','tuition_study_period', array('class' => '')); ?>
    <p class="comfirm_val" id="tuition_study_period" name="tuition_study_period"><?php echo $other_info['tuition_study_period']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Living expense (Monthly Amount)','living_expense_amount', array('class' => '')); ?>
    <p class="comfirm_val" id="living_expense_amount" name="living_expense_amount"><?php echo $other_info['living_expense_amount']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Method of payment','payment_method', array('class' => '')); ?>
    <p class="comfirm_val" id="payment_method" name="payment_method"><?php echo $other_info['payment_method']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Below please explain in detail the circumstances for your defraying the costs of the applicant and your relationship to the applicant.','defraying_details', array('class' => '')); ?>
    <p class="comfirm_val" id="defraying_details" name="defraying_details"><?php echo $other_info['defraying_details']; ?></p>
</div>
</div>
<!-- co_rightside -->
<!-- co_leftside -->
<div class="col-md-6 float-left">
<h6 class="" style="padding: 33px 0px 12px;">Name of person defraying expenses</h6>
<div class="form-group">
    <?php echo form_label('Name', 'defraying_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'defraying_name')); ?>
    <p class="comfirm_val" id="defraying_name" name="defraying_name"><?php echo $other_info['defraying_name']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Relation', 'defraying_relation', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'defraying_relation')); ?>
    <p class="comfirm_val" id="defraying_relation" name="defraying_relation"><?php echo $other_info['defraying_relation']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Tel','defraying_tel', array('class' => '')); ?>
    <p class="comfirm_val" id="defraying_tel" name="defraying_tel"><?php echo $other_info['defraying_tel']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Address','defraying_address', array('class' => '')); ?>
    <p class="comfirm_val" id="defraying_address" name="defraying_address"><?php echo $other_info['defraying_address']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Company Name','father_work_place', array('class' => '')); ?>
    <p class="comfirm_val" id="defraying_company" name="defraying_company"><?php echo $other_info['defraying_company']; ?></p>
</div>

<div class="form-group">
    <?php echo form_label('Tel(workplace)','defraying_work_tel', array('class' => '')); ?>
    <p class="comfirm_val" id="defraying_work_tel" name="defraying_work_tel"><?php echo $other_info['defraying_work_tel']; ?></p>
</div>
<!-- 
<div class="form-group">
    <?php echo form_label('Signature','defraying_sign', array('class' => '')); ?>
    <p class="comfirm_val" id="defraying_sign" name="defraying_sign"><?php echo $other_info['defraying_sign']; ?></p>
</div> -->

<div class="form-group">
    <?php echo form_label('Date','defraying_date', array('class' => '')); ?>
    <p class="comfirm_val" id="defraying_date" name="defraying_date"><?php echo $other_info['defraying_date']; ?></p>
</div>
</div>

<!-- <p>２０<?php echo $other_info['course_start_date']; ?>年０４月--
   ２０<?php echo $other_info['course_end_date']; ?> 年０３月
</p> -->
<!-- co_leftside -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(function() {
       if(($('#select_name_of_course', this).text()) === "進学２年コ－ス"){
        console.log(true);
         $('.two_yrs_crs').show();
         $('.oneyrs_ninemths_crs').hide();
         $('.oneyrs_fivemths_crs').hide();
         $('.oneyrs_threemths_crs').hide();
         $('.one_yrs_course').hide();
        }else if(($('#select_name_of_course', this).text()) === "進学1年9ヶ月コ－ス"){
         $('.two_yrs_crs').hide();
         $('.oneyrs_ninemths_crs').show();
         $('.oneyrs_fivemths_crs').hide();
         $('.oneyrs_threemths_crs').hide();
         $('.one_yrs_course').hide();
      }else if(($('#select_name_of_course', this).text()) === "進学１.５年コ－ス"){
         $('.two_yrs_crs').hide();
         $('.oneyrs_ninemths_crs').hide();
         $('.oneyrs_fivemths_crs').show();
         $('.oneyrs_threemths_crs').hide();
         $('.one_yrs_course').hide();
      }else if(($('#select_name_of_course', this).text()) === "進学1年3ヶ月コ－ス"){
         $('.two_yrs_crs').hide();
         $('.oneyrs_ninemths_crs').hide();
         $('.oneyrs_fivemths_crs').hide();
         $('.oneyrs_threemths_crs').show();
         $('.one_yrs_course').hide();
      }else if(($('#select_name_of_course', this).text()) === "進学１年コ－ス"){
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

</script>
<div class="col-md-12 float-left" style="padding-bottom: 15px;">
<h6 class="" style="padding: 33px 0px 12px;">志望学科　Name of Course　* 東京日本橋校は4月期（2年,1年）と10月期（1.5年）のみ。</h6>
<div class="form-group">
    <p class="comfirm_val" id="select_name_of_course" name="select_name_of_course"><?php echo $other_info['select_name_of_course']; ?></p>
</div>
    <span name="twyrs_crs_start_date" id="twyrs_crs_start_date" class="two_yrs_crs" style="width:5%;">２－Year course
    ２０<?php echo $other_info['twyrs_crs_start_date']; ?>年０４月--
    </span> 
    <span name="twyrs_crs_end_date" id="twyrs_crs_end_date" class="two_yrs_crs" style="width:5%;">
    ２０<?php echo $other_info['twyrs_crs_end_date']; ?> 年０３月
    </span>

    <span name="onenine_crs_start_date" id="onenine_crs_start_date" class="oneyrs_ninemths_crs" style="width:5%;">1 Year and 9 Months course
     ２０ <?php echo $other_info['onenine_crs_start_date']; ?> 年０７月--
     </span>
     <span name="onenine_crs_end_date" id="onenine_crs_end_date" class="oneyrs_ninemths_crs" style="width:5%;"> 
     ２０  <?php echo $other_info['onenine_crs_end_date']; ?>年０３月
    </span>

    <span name="onefive_crs_start_date" id="onefive_crs_start_date" class="oneyrs_fivemths_crs" style="width:5%;">1.5－Year course
     ２０ <?php echo $other_info['onefive_crs_start_date']; ?> 年１０月--
    </span>
    <span name="onefive_crs_end_date" id="onefive_crs_end_date" class="oneyrs_fivemths_crs" style="width:5%;"> 
    ２０  <?php echo $other_info['onefive_crs_end_date']; ?>年０３月
    </span>

    <span name="onethree_crs_start_date" id="onethree_crs_start_date" class="oneyrs_threemths_crs" style="width:5%;">1 Year and 3 Months course 
    ２０<?php echo $other_info['onethree_crs_start_date']; ?> 年０１月--
   </span> 
   <span name="onethree_crs_end_date" id="onethree_crs_end_date" class="oneyrs_threemths_crs" style="width:5%;"> 
   ２０  <?php echo $other_info['onethree_crs_end_date']; ?>年０３月
   </span>

  <span name="one_crs_start_date" id="one_crs_start_date" class="one_yrs_course" style="width:5%;">１－Year course 
  ２０<?php echo $other_info['one_crs_start_date']; ?> 年０４月 --
  </span>
  <span name="one_crs_end_date" id="one_crs_end_date" class="one_yrs_course" style="width:5%;">
   ２０  <?php echo $other_info['one_crs_end_date']; ?>年０３月
  </span>
  
</div>
<!-- table -->
<script>
$(function() {  
       if(($('#future_plan_after_graduating', this).text()) =="A. 進学 Advancing to higher education"){
         $('.drop_checkbox').show();
         $('.specify').hide();
        }else if(($('#future_plan_after_graduating', this).text()) =="D. その他 < Other> (Specify)"){
         $('.drop_checkbox').hide();
         $('.specify').show();
      }else{
         $('.drop_checkbox').hide();
         $('.specify').hide();
      }
    });
    $(function() {  
       if(($('#jls_name', this).text()) =="shizuoka"){
         $('#specific_plans').hide();
         $('#future_plan').show();
        }else if(($('#jls_name', this).text()) =="ECC"){
          $('#specific_plans').show();
          $('#future_plan').hide();
        }else if(($('#jls_name', this).text()) =="JCLI"){
            $('#specific_plans').show();
            $('#future_plan').hide();
        }else if(($('#jls_name', this).text())=="OJLS"){
            $('#specific_plans').show();
            $('#future_plan').hide();
        }else if(($('#jls_name', this).text()) =="fukuoka"){
            $('#specific_plans').show();
            $('#future_plan').hide();
        }else{
          $('#specific_plans').hide();
          $('#future_plan').hide();
        }
    });
</script>
<div class="col-md-12 float-left" style="padding-bottom: 15px;" id="future_plan">
<h6 class="" style="padding: 33px 0px 12px;">この学校を卒業した後の予定 < Future plan after graduating from this school.></h6>
<div class="form-group">
    <p class="comfirm_val" id="future_plan_after_graduating" name="future_plan_after_graduating"><?php echo $other_info['future_plan_after_graduating']; ?></p>
</div>
<div class="drop_checkbox">
<p class="comfirm_val" id="future_plan_checkdata01" name="future_plan_checkdata01"><?php echo $other_info['future_plan_checkdata01']; ?></p>
</div>
<div class="specify">
<p class="comfirm_val" id="spec_other" name="spec_other"><?php echo $other_info['spec_other']; ?></p>
</div>
</div>
<!-- table -->
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
  
  <?php
        $x=1;
        $y=0;
        if($lists3['edu_name'] != null){
        // var_dump($lists3['edu_name']);
          foreach($lists3['edu_name'] as $key=>$rowData){
  ?>        
  <tr>
    <td>
      <p class="tbl_comfirmVal" name="edu_name[]" style="text-align: center;height: 18px;"><?php echo $lists3['edu_name'][$key] . "<br>";?></p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="edu_address[]" style="text-align: center;height: 18px;"><?php echo $lists3['edu_address'][$key];?></p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="edu_start_date[]" style="text-align: center;height: 18px;"><?php echo $lists3['edu_start_date'][$key];?></p>
    </td>
    <td>
      <p class="tbl_comfirmVal"  name="edu_end_date[]" style="text-align: center;height: 18px;"><?php echo $lists3['edu_end_date'][$key];?></p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="edu_year[]" style="text-align: right;height: 18px;" ><?php echo $lists3['edu_year'][$key];?>  
        <span class="study_year">years</span> 
      </p>
    </td>
  </tr>
  <?php } 
        }
  ?>
  </tbody>
</table>
<br>
<div class="col-md-6 float-left">
  <div class="form-group">
      <?php echo form_label('Registered enrollment','registered_enrollment', array('class' => '')); ?>
      <p class="comfirm_val" id="registered_enrollment" name="registered_enrollment"><?php echo $other_info['registered_enrollment']; ?></p>
  </div>
</div>
<div class="col-md-6 float-right">
  <div class="form-group">
      <?php echo form_label('Total period of education (from elementary school to the last school attended)','total_period_edu', array('class' => '')); ?>
      <p class="comfirm_val" id="total_period_edu" name="total_period_edu"><?php echo $other_info['total_period_edu']; ?></p>
  </div>
</div>
</div> 
</div>
<!-- Table -->

<!-- Table -->
<div class="col-md-12 float-left">
<h6 class="" style="padding: 33px 0px 12px;">Previous Japanese Language Study</h6>
<div class="form-group">
  <?php echo form_label('Previous Japanese Language Study', 'jplearn_experience', array( 'class' => 'passport_text', 'id'=> '')); ?>
  <p class="comfirm_val" id="jplearn_experience" name="jplearn_experience"><?php if($data_details['jplearn_experience'] == "1"){echo "Yes";}else{echo "No";} ?></p>
</div>
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
      <th>Term of year</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $x=1;
        $y=0;
        // var_dump($data_lang_study['edu_name']);
          foreach($data_lang_study['jp_name'] as $key=>$rowData){
  ?>  
  <tr>
    <td>
      <p class="tbl_comfirmVal" name="jp_name[]" style="text-align: center;height: 18px;" ><?php echo $data_lang_study['jp_name'][$key] . "<br>";?></p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="jp_level[]" style="text-align: center;height: 18px;" ><?php echo $data_lang_study['jp_level'][$key];?>  </p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="jp_status[]" style="text-align: center;height: 18px;" ><?php echo $data_lang_study['jp_status'][$key];?>  </p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="jp_address[]" style="text-align: center;height: 18px;" ><?php echo $data_lang_study['jp_address'][$key];?>  </p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="jp_start_date[]" style="text-align: center;height: 18px;" ><?php echo $data_lang_study['jp_start_date'][$key];?>  </p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="jp_end_date[]" style="text-align: center;height: 18px;" ><?php echo $data_lang_study['jp_end_date'][$key];?>  </p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="jp_hour[]" style="text-align: right;height: 18px;" ><?php echo $data_lang_study['jp_hour'][$key];?>  
         <span class="study_year">hours</span> 
      </p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="jp_year[]" style="text-align: right;height: 18px;" ><?php echo $data_lang_study['jp_year'][$key];?>  
         <span class="study_year">year</span> 
      </p>
    </td>
  </tr>
  <?php } 
  ?>
  </tbody>
</table>
</div>
</div>
<!-- Table -->

<!-- Table -->
<div class="col-md-7 float-left">
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
  <?php
        $x=1;
        $y=0;
        // var_dump($data_achievement_jp['edu_name']);
          foreach($data_achievement_jp['achiv_name'] as $key=>$rowData){
  ?>  
  <tr>
    <td>
      <p class="tbl_comfirmVal" name="achiv_name[]" style="text-align: center;height: 18px;"><?php echo $data_achievement_jp['achiv_name'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="level[]" style="text-align: center;height: 18px;" ><?php echo $data_achievement_jp['level'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="exam_year[]" style="text-align: center;height: 18px;" ><?php echo $data_achievement_jp['exam_year'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="score[]" style="text-align: center;height: 18px;" ><?php echo $data_achievement_jp['score'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="result[]" style="text-align: center;height: 18px;"><?php echo $data_achievement_jp['result'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="date_qualification[]" style="text-align: center;height: 18px;" ><?php echo $data_achievement_jp['date_qualification'][$key];?></p>
    </td>
  </tr>
  <?php } 
  ?>
  </tbody>
</table>
<br>
<div class="form-group">
  <?php echo form_label('Japanese Language Proficiency', 'jplearn_achievement', array( 'class' => 'passport_text', 'id'=> '')); ?>
  <p class="comfirm_val" id="jplearn_achievement" name="jplearn_achievement"><?php if($data_details['jplearn_achievement'] == "1"){echo "Yes";}else{echo "No";} ?></p>
  </div>
<div class="form-group">
  <?php echo form_label('Certificate Number', 'jp_certificate_number', array( 'class' => 'passport_text', 'id'=> '')); ?>
  <p class="comfirm_val" id="jp_certificate_number" name="jp_certificate_number"><?php echo $other_info['jp_certificate_number']; ?></p>
  </div>
</div>
</div>

<div class="col-md-5 float-left">
<h6 class="" style="padding: 33px 0px 12px;">Name of JP language tests you are going to take</h6>
<table class="table-bordered" name="applicant_id">
  <thead class="tbl_head">
    <tr>
      <th>Name of Japanese language test</th>
      <th>Level</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $x=1;
        $y=0;
        // var_dump($data_jp_lang_going_to_take['edu_name']);
          foreach($data_jp_lang_going_to_take['going_name'] as $key=>$rowData){
  ?>  
  <tr>
    <td>
      <p class="tbl_comfirmVal" name="going_name[]" style="text-align: center;height: 18px;" ><?php echo $data_jp_lang_going_to_take['going_name'][$key];?></p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="going_level[]" style="text-align: center;height: 18px;" ><?php echo $data_jp_lang_going_to_take['going_level'][$key];?></p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="going_date[]" style="text-align: center;height: 18px;" ><?php echo $data_jp_lang_going_to_take['going_date'][$key];?></p>
    </td>
  </tr>
  <?php } 
  ?>
  </tbody>
</table>
</div>

<!-- Table -->

<!-- Table -->
<div class="col-md-12 float-left">
<h6 class="" style="padding: 33px 0px 12px;">History of Employment (Write in order, ending with the most recent employment.)</h6>
<p class="comfirm_val" id="employment_experience" name="employment_experience"><?php if($data_details['employment_experience'] == "1"){echo "Yes";}else{echo "No";} ?></p>
<div class="tbl">
<table class="table-bordered" name="applicant_id">
  <thead class="tbl_head">
  <tr>
    <th>Placement of Employment</th>
    <th>Address</th>
    <th>Years</th>
    <th>Starting <br>Year/Month  </th>
    <th >Finishing <br>Year/Month </th>
    <th>Job Description</th>
  </tr>
  </thead>
  <tbody>
  <?php
        $x=1;
        $y=0;
        // var_dump($data_history_employment['edu_name']);
          foreach($data_history_employment['emp_name'] as $key=>$rowData){
  ?>  
  <tr>
    <td>
      <p class="tbl_comfirmVal" name="emp_name[]" style="text-align: center;height: 18px;" ><?php echo $data_history_employment['emp_name'][$key];?></p>  
    </td>
    <td>
      <p class="tbl_comfirmVal" name="emp_address[]" style="text-align: center;height: 18px;" ><?php echo $data_history_employment['emp_address'][$key];?></p>  
    </td>
    <td>
      <p class="tbl_comfirmVal" name="emp_year[]" style="text-align: center;height: 18px;" ><?php echo $data_history_employment['emp_year'][$key];?></p> 
    </td>
    <td>
      <p class="tbl_comfirmVal" name="emp_start_date[]" style="text-align: center;height: 18px;" ><?php echo $data_history_employment['emp_start_date'][$key];?></p> 
    </td>
    <td>
      <p class="tbl_comfirmVal" name="emp_end_date[]" style="text-align: center;height: 18px;" ><?php echo $data_history_employment['emp_end_date'][$key];?></p> 
    </td>
    <td>
      <p class="tbl_comfirmVal" name="emp_job_description[]" style="text-align: center;height: 18px;" ><?php echo $data_history_employment['emp_job_description'][$key];?></p> 
    </td>
  </tr>
  <?php } 
  ?>
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
    <th>Nationality</th>
    <th>Work Place	</th>
    <th>Date Of Birth</th>
    <th >Occupation </th>
    <th>Annual Income</th>
    <th>Address</th>
    <th>Length of service</th>
  </tr>
  </thead>
  <tbody>
  <?php
        $x=1;
        $y=0;
        // var_dump($data_family_member['edu_name']);
          foreach($data_family_member['fam_name'] as $key=>$rowData){
        //  var_dump($data_family_member);
  ?>  
  <tr>
    <td>
      <p class="tbl_comfirmVal" name="fam_name[]" style="text-align: center;height: 18px;" ><?php echo $data_family_member['fam_name'][$key];?></p> 
    </td>
    <td>
      <p class="tbl_comfirmVal" name="fam_age[]" style="text-align: center;height: 18px;" ><?php echo $data_family_member['fam_age'][$key];?></p> 
    </td>
    <td>
      <p class="tbl_comfirmVal" name="fam_gender[]" style="text-align: center;height: 18px;" ><?php echo $data_family_member['fam_gender'][$key];?></p> 
    </td>
    <td>
      <p class="tbl_comfirmVal" name="fam_relationship[]" style="text-align: center;height: 18px;" ><?php echo $data_family_member['fam_relationship'][$key];?></p> 
    </td>
    <td>
      <p class="tbl_comfirmVal" name="fam_relationship[]" style="text-align: center;height: 18px;" ><?php echo $data_family_member['fam_nationality'][$key];?></p> 
    </td>
    <td>
      <p class="tbl_comfirmVal" name="fam_work_place[]" style="text-align: center;height: 18px;" ><?php echo $data_family_member['fam_work_place'][$key];?></p> 
    </td>
    <td>
      <p class="tbl_comfirmVal" name="fam_birthday[]" style="text-align: center;height: 18px;" ><?php echo $data_family_member['fam_birthday'][$key];?></p> 
    </td>
    <td>
      <p class="tbl_comfirmVal" name="fam_occupation[]" style="text-align: center;height: 18px;" ><?php echo $data_family_member['fam_occupation'][$key];?></p> 
    </td>
    <td>
      <p class="tbl_comfirmVal" name="fam_annual_income[]" style="text-align: center;height: 18px;" ><?php echo $data_family_member['fam_annual_income'][$key];?></p> 
    </td>
    <td>
      <p class="tbl_comfirmVal" name="fam_address[]" style="text-align: center;height: 18px;" ><?php echo $data_family_member['fam_address'][$key];?></p> 
    </td>
    <td>
      <p class="tbl_comfirmVal" name="fam_length_sevice[]" style="text-align: center;height: 18px;" ><?php echo $data_family_member['fam_length_sevice'][$key];?></p> 
    </td>
  </tr>
  <?php } 
  ?>
  </tbody>
</table>
</div>
<br><br>
<div class="col-md-6" style="display: flex;padding-top: 12px;">
<?php
    echo form_label('Please attach the picture of you and your family below this','familyfile', array('class' => 'col-form-label')) ;
?>
<div class="std_img">
<?php echo $lists['family_file']; ?>
</div> 
</div>
<!-- Table -->
<!-- Table -->
<div class="col-md-12 float-left">
<h6 class="" style="padding: 33px 0px 12px;">Family in Japan (Father, Mother, Spouse, Child, Brother and Sisters, or Others) :</h6>
<p class="comfirm_val" id="ja_plan_to_stay_with_them" name="family_in_japan"><?php if($data_details['family_in_japan'] == "1"){echo "Yes";}else{echo "No";} ?></p>
<p>If yes, fill in all the family members in Japan.</p>
<br>
<div class="tbl">
<table class="table-bordered" name="applicant_id">
  <thead class="tbl_head">
  <tr>
    <th>Name</th>
    <th>Date of Birth	</th>
    <th>Address	</th>
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
  <?php
        $x=1;
        $y=0;
        // var_dump($data_family_member['edu_name']);
          foreach($data_family_japan['ja_fam_name'] as $key=>$rowData){
           //var_dump($data_family_japan);
  ?>  
  <tr>
    <td>
     <p class="tbl_comfirmVal" name="ja_fam_name[]" style="text-align: center;height: 18px;" ><?php echo $data_family_japan['ja_fam_name'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="ja_fam_date_birth[]" style="text-align: center;height: 18px;" ><?php echo $data_family_japan['ja_fam_date_birth'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="ja_fam_address[]" style="text-align: center;height: 18px;" ><?php echo $data_family_japan['ja_fam_address'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="ja_fam_age[]" style="text-align: center;height: 18px;" ><?php echo $data_family_japan['ja_fam_age'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="ja_fam_relationship[]" style="text-align: center;height: 18px;" ><?php echo $data_family_japan['ja_fam_relationship'][$key];?></p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="ja_fam_residing_applicant[]" style="text-align: center;height: 18px;" ><?php if($data_family_japan['ja_fam_residing_applicant'][$key] == "1"){echo "Yes";}else if($data_family_japan['ja_fam_residing_applicant'][$key] == "0"){echo "No";}else{echo "";} ?></p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="residence_card_no[]" style="text-align: center;height: 18px;" ><?php echo $data_family_japan['residence_card_no'][$key];?></p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="ja_fam_nationality[]" style="text-align: center;height: 18px;" ><?php echo $data_family_japan['ja_fam_nationality'][$key];?></p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="ja_fam_visa_status[]" style="text-align: center;height: 18px;" ><?php echo $data_family_japan['ja_fam_visa_status'][$key];?></p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="ja_fam_work_place[]" style="text-align: center;height: 18px;" ><?php echo $data_family_japan['ja_fam_work_place'][$key];?></p>
    </td>
    <td>
      <p class="tbl_comfirmVal" name="ja_certificate_alien[]" style="text-align: center;height: 18px;" ><?php echo $data_family_japan['ja_certificate_alien'][$key];?></p>
    </td>
  </tr>
  <?php } 
  ?>
  </tbody>
</table>
</div>
<br>
<div class="form-group">
    <?php echo form_label('Are you planning to stay with them in Japan? : ', 'ja_plan_to_stay_with_them', array( 'class' => 'form-control-label', 'id'=> '')); ?><br/>
    <p class="comfirm_val" id="ja_plan_to_stay_with_them" name="ja_plan_to_stay_with_them"><?php if($data_details['ja_plan_to_stay_with_them'] == "1"){echo "Yes";}else{echo "No";} ?></p>
  </div>
<div class="form-group">
    <?php echo form_label('you/your family have Japanese friends or acquaintances, please write his/her name, address,phone number, relationship, etc. ', 'family_inJpfri', array( 'class' => 'form-control-label', 'id'=> 'family_inJpfri')); ?><br/>
    <p class="comfirm_val" id="family_inJpfri" name="family_inJpfri"><?php echo $other_info['family_inJpfri']; ?></p>
  </div> 
</div>
</div>
<!-- Table -->
<!-- Table -->
<div class="col-md-12 float-left" style="padding-bottom: 15px;">
<h6 class="" style="padding: 33px 0px 12px;">Previous  stay in Japan</h6>
<div class="tbl">
<table class="table-bordered" name="applicant_id">
  <thead class="tbl_head">
  <tr>
    <th>Date of Entry	</th>
    <th>Date of Arrival	</th>
    <th>Date of Depature </th>
    <th >Visa	   </th>
    <th >Status	 </th>
    <th>Purpose of Entry</th>
  </tr>
  </thead>
  <tbody>
  <?php
        $x=1;
        $y=0;
        // var_dump($data_previous_stay_japan['edu_name']);
          foreach($data_previous_stay_japan['entry_date'] as $key=>$rowData){
  ?>  
  <tr>
    <td>
     <p class="tbl_comfirmVal" name="entry_date[]" style="text-align: center;height: 18px;" ><?php echo $data_previous_stay_japan['entry_date'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="arrival_date[]" style="text-align: center;height: 18px;" ><?php echo $data_previous_stay_japan['arrival_date'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="depature_date[]" style="text-align: center;height: 18px;" ><?php echo $data_previous_stay_japan['depature_date'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="pre_stay_visa[]" style="text-align: center;height: 18px;" ><?php echo $data_previous_stay_japan['pre_stay_visa'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="status[]" style="text-align: center;height: 18px;" ><?php echo $data_previous_stay_japan['status'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="entry_purpose[]" style="text-align: center;height: 18px;" ><?php echo $data_previous_stay_japan['entry_purpose'][$key];?></p>
    </td>
  </tr>
  <?php } 
  ?>
  </tbody>
</table>
</div>
<br>
<div class="form-group">
    <?php echo form_label('If you have stayed in Japan more than four times, please use the blank below.','japan_four_times', array('class' => '')); ?>
    <p class="comfirm_val" id="japan_four_times" name="japan_four_times"><?php echo $other_info['japan_four_times']; ?></p>
</div>
</div>
<!-- Table -->

<!-- Table -->
<div class="col-md-12 float-left" style="padding-bottom: 15px;">
<h6 class="" style="padding: 33px 0px 12px;">Have you ever been japan (Including 3 moth short visa)</h6>
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
  <?php
        $x=1;
        $y=0;
        // var_dump($data_previous_stay_japan['edu_name']);
          foreach($data_jp_ever_been_japan['shortVisa_purpose'] as $key=>$rowData){
  ?>  
  <tr>
    <td>
     <p class="tbl_comfirmVal" name="shortVisa_purpose[]" style="text-align: center;height: 18px;" ><?php echo $data_jp_ever_been_japan['shortVisa_purpose'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="shortVisa_status[]" style="text-align: center;height: 18px;" ><?php echo $data_jp_ever_been_japan['shortVisa_status'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="shortVisa_period[]" style="text-align: center;height: 18px;" ><?php echo $data_jp_ever_been_japan['shortVisa_period'][$key];?></p>
    </td>
    <td>
     <p class="tbl_comfirmVal" name="shortVisa_prepare[]" style="text-align: center;height: 18px;" ><?php echo $data_jp_ever_been_japan['shortVisa_prepare'][$key];?></p>
    </td>
  </tr>
  <?php } 
  ?>
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
.planning_select {
    width: 30%;
    margin: 12px 0px;
    padding: 8px;
    border: 1px solid #ced4db;
    border-radius: 3px;
}
.graduating_month_year{
  display: flex;
}
.expected_txt {
    margin-left: 13px;
    font-size: 17px;
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
.radio_record{
  width: 100%;
  margin-bottom: 20px;
  display: flex;
}
.criminal{
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
  width: 84%;
    border: none;
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
<!-- lists2 -->

<!-- dropdown FINANICIAL SPONSOR -->
<div class="content_detail">
  <input class="dropdown" type="checkbox" id="faq-3">
  <p class="drop_ttl"><label for="faq-3" class="drop_label">FINANICIAL SPONSOR</label></p>
  <div class="drop_txt">
  <h5 class="finial_ttl">Finanicial Sponsor</h5>
  <div class="col-md-6 float-left" name="applicant_id">
  <div class="form-group">
    <?php echo form_label('Name', 'fin_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'fin_name')); ?>
    <p class="comfirm_val" id="name" name="fin_name"><?php echo $data_financial_sponsor['fin_name']; ?></p>
  </div>
  <div class="form-group">
    <?php echo form_label('Age', 'fin_age', array( 'class' => '', 'id'=> 'fin_age', 'style' => '', 'for' => 'fin_age')); ?>
    <p class="comfirm_val" id="fin_age" name="fin_age"><?php echo $data_financial_sponsor['fin_age']; ?></p>   
  </div>
  <div class="form-group">
    <?php echo form_label('Relationship', 'fin_relationship', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'fin_relationship')); ?>
    <p class="comfirm_val" id="fin_relationship" name="fin_relationship"><?php echo $data_financial_sponsor['fin_relationship']; ?></p>   
  </div>
  <div class="form-group">
    <?php echo form_label('Address','fin_address', array('class' => 'col-form-label'));?>
    <p class="comfirm_val" id="fin_address" name="fin_address"><?php echo $data_financial_sponsor['fin_address']; ?></p>   
  </div>
  <div class="form-group">
  <?php echo form_label('Phone Number', 'tel', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'tel')); ?>
    <p class="comfirm_val" id="tel" name="tel"><?php echo $data_financial_sponsor['tel']; ?></p>   
  </div>
  <div class="form-group">
    <?php echo form_label('Email', 'email', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'email')); ?>
    <p class="comfirm_val" id="email" name="email"><?php echo $data_financial_sponsor['email']; ?></p>   
  </div>
  <div class="form-group">
    <?php echo form_label('Occupation', 'fin_occupation', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'fin_occupation')); ?>
    <p class="comfirm_val" id="fin_occupation" name="fin_occupation"><?php echo $data_financial_sponsor['fin_occupation']; ?></p>   
  </div>
  <div class="form-group">
    <?php echo form_label('Work Place', 'work_place', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'work_place')); ?>
    <p class="comfirm_val" id="work_place" name="work_place"><?php echo $data_financial_sponsor['work_place']; ?></p>      
  </div>
  <div class="form-group">
    <?php echo form_label('Visa', 'fin_visa', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'fin_visa')); ?>
    <p class="comfirm_val" id="fin_visa" name="fin_visa"><?php echo $data_financial_sponsor['fin_visa']; ?></p> 
  </div>
  <div class="form-group">
    <?php echo form_label('The amount of saving for study abroad ', 'amount_saving_for_study_abroad', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'amount_saving_for_study_abroad')); ?>
    <p class="comfirm_val" id="amount_saving_for_study_abroad" name="amount_saving_for_study_abroad"><?php echo $data_financial_sponsor['amount_saving_for_study_abroad']; ?></p> 
  </div>
  <div class="form-group">
    <?php echo form_label('The amount of saving which can be proved ', 'amount_of_saving_which_proved', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'amount_of_saving_which_proved')); ?>
    <p class="comfirm_val" id="amount_of_saving_which_proved" name="amount_of_saving_which_proved"><?php echo $data_financial_sponsor['amount_of_saving_which_proved']; ?></p> 
  </div>
  <div class="form-group">
      <?php echo form_label('Start of Work date', 'start_work_date ', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'start_work_date')); ?>
      <p class="comfirm_val" id="start_work_date" name="start_work_date"><?php echo $data_financial_sponsor['start_work_date']; ?></p> 
  </div>
  </div>
</div>
<!-- dropdown FINANICIAL SPONSOR -->
<div class="clearfix"></div>
          <hr class="my-4 dashed clearfix">

          <div class="text-right">
            <button type="submit" class="btn btn-primary text-white btn-sm py-1 px-2">
              <span class="material-icons align-top md-18 mr-1">add_circle</span>Submit
            </button>
            <button type="reset" class="btn btn-secondary text-white btn-sm py-1 px-2">
              <span class="material-icons align-top md-18 mr-1">sync</span>Reset
            </button>
          </div>
     <?php echo form_close(); ?> 
</div>
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

<style>
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
#showImg1 {
    margin: 10px 140px 0px;
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
}
/* input:checked ~ p .drop_label::before {
    margin-top: 5px;
    margin-right: 5px;
    border: 8px solid transparent;
    border-top: 12px solid white;
} */

.drop_label{
cursor: pointer;
position: relative;
display: flex;
align-items: center;
margin-bottom: 0px;
}
/* div.drop_txt{
max-height:0px;
overflow: hidden;
transition:max-height 0.9s;
} */
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
    margin: 7px 5px 7px 0px;
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
  width: 49%;
  font-size: 16px;
  margin: 0px;
}
.text-right {
    padding-bottom: 27px;
    text-align: right !important;
}
</style>