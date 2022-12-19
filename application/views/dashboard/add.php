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

<div class="col-md-6" style="display: flex;padding-top: 32px;">
  <!-- Student Photo -->
    <?php
      echo form_label('Applicant Photo','userfile', array('class' => 'col-form-label')) ;
      
    ?>
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
    <?php
      echo form_label('Applicant Sign','sign_file', array('class' => 'col-form-label')) ;
      
    ?>
    <div class="col-md-6" style="width: 100%;padding-left:0px;padding-right: 0px;">
      <?php
        echo form_input(array(
        'name' => 'sign_file',
        'type' => 'file',
        'class' => 'form-control stu_label',
        'id' => 'clickImgs',
        'accept' => 'image/*'
        ));
      ?>
      <div class="form-group col-md-12 col-sm-12 p-0" id="showImg2"> </div>   
    </div>
  <span class="text-danger"><?php echo form_error('sign_file'); ?></span>
  </div> 
  <!-- Student Photo -->  
<!-- date -->
  <!-- <div class="col-md-6 float-left">
      <div class="form-group" style="padding-left: 165px;">
          <label class="weight-400" for="release" style="margin-bottom:10px">Date</label> 
          <span class="badge badge-danger">Required</span>
          <input type="datetime-local" step="1" name="release" id="release" class="form-control" placeholder="" value="">
          <span class="text-danger"><?php echo form_error( 'release' ); ?></span>
      </div>
  </div> -->
<!-- date-->
  <!-- JLS Name -->
<div class="col-md-6 school_list" name="" >
<p class="list_label">JLS Name </p>
<select name="jls_name" class="form-group col-md-6 school_select">
    <option value="">Please Select!</option>
    <option value="ECC">ECC</option>
    <option value="JCLI">JCLI</option>
    <option value="OJLS">OJLS</option>
    <option value="Fukuoka">fukuoka</option>
    <option value="Shizuoka">shizuoka</option>
</select>
</div>
<!-- JLS Name -->

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
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'applicant_name',
            'type' => 'text',
            'value' => html_escape(set_value('applicant_name',isset($result)?$result->applicant_name:''), ENT_QUOTES),
            'placeholder' => 'Enter student name!',
            'class' => 'form-control',
            'id' => 'applicant_name',
            'autocomplete' => ''));
          ?>
        <!-- <span class="text-danger"><?php echo form_error('applicant_name'); ?></span> -->
      </div>

      <div class="form-group">
        <?php echo form_label(' Name (漢字)', 'applicant_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'applicant_name_kanji',
            'type' => 'text',
            'value' => html_escape(set_value('applicant_name',isset($result)?$result->applicant_name:''), ENT_QUOTES),
            'placeholder' => 'Enter student name!',
            'class' => 'form-control',
            'id' => 'applicant_name_kanji',
            'autocomplete' => ''));
          ?>
        <!-- <span class="text-danger"><?php echo form_error('applicant_name_kanji'); ?></span> -->
      </div>
      <div class="form-group">
        <?php echo form_label('Date Of Birth', 'date_of_birthday', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_birthday')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'date_of_birthday',
            'type' => 'date',
            'value' => html_escape(set_value('date_of_birthday',isset($result)?$result->date_of_birthday:''), ENT_QUOTES),
            'placeholder' => 'Enter Date Of Birth!',
            'class' => 'form-control',
            'id' => 'date_of_birthday',
            'autocomplete' => ''));
          ?>
        <!-- <span class="text-danger"><?php echo form_error('date_of_birthday'); ?></span> -->
      </div>

      <div class="form-group">
        <?php echo form_label('Place Of Birth', 'place_birth', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
        <?php
          echo form_input(array(
            'name' => 'place_birth',
            'type' => 'text',
            'value' => html_escape(set_value('place_birth',isset($result)?$result->place_birth:''), ENT_QUOTES),
            'placeholder' => 'Enter Place Of Birth!',
            'class' => 'form-control',
            'id' => 'place_birth',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('place_birth'); ?></span>
      </div>

      <div class="form-group">
        <?php echo form_label('Age', 'age', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'age')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'age',
            'type' => 'text',
            'value' => html_escape(set_value('age',isset($result)?$result->age:''), ENT_QUOTES),
            'placeholder' => "Enter student's Age!",
            'class' => 'form-control',
            'id' => 'age',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('age'); ?></span>
      </div>

      <div class="form-group">
        <?php echo form_label('Nationality', 'nationality', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'nationality')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'nationality',
            'type' => 'text',
            'value' => html_escape(set_value('nationality',isset($result)?$result->nationality:''), ENT_QUOTES),
            'placeholder' => "Enter student's Nationality!",
            'class' => 'form-control',
            'id' => 'nationality',
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
     
      <div class="form-group " id="partaner">
        <?php echo form_label('Name of your Partaner', 'partaner_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
        <!-- <span class="badge badge-danger">Required</span> -->
        <?php
          echo form_input(array(
            'name' => 'partaner_name',
            'type' => 'text',
            'value' => html_escape(set_value('partaner_name',isset($result)?$result->partaner_name:''), ENT_QUOTES),
            'placeholder' => "Enter Name of your Partaner",
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
            'placeholder' => 'Enter email account!',
            'class' => 'form-control',
            'id' => 'std_email',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('email'); ?></span>
       </div>

       <div class="form-group">
        <?php echo form_label('Phone Number', 'phone', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'phone',
            'type' => 'text',
            'value' => html_escape(set_value('phone',isset($result)?$result->phone:''), ENT_QUOTES),
            'placeholder' => 'Enter phone number!',
            'class' => 'form-control',
            'id' => 'phone',
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
            'placeholder' => 'Enter address!',
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


  <!-- <div class="form-group">
        <?php echo form_label('Have you visited Japan?', 'have_you_visited_jp', array( 'class' => 'form-control-label', 'id'=> '')); ?>
        <span class="badge badge-danger">Required</span>
          <div class="radio">
              <label class="col-md-2">
                  <input type="radio" name="have_you_visited_jp" value="1" checked="checked"> Yes
              </label>
              <label class="col-md-2">
                  <input type="radio" name="have_you_visited_jp" value="0" > No
              </label>
        </div>
  </div> -->

  <div class="form-group">
  <?php echo form_label('Have you visited Japan?', 'have_you_visited_jp', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    <select name="have_you_visited_jp" id="have_you_visited_jp" class="admission_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
  </div>

  <div class="form-group">
        <?php echo form_label('Date of Entry', 'visited_date', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <?php
          echo form_input(array(
            'name' => 'visited_date',
            'type' => 'text',
            'value' => html_escape(set_value('visited_date',isset($result)?$result->visited_date:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'visited_date',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('visited_date'); ?></span>
  </div>
 

  <div class="form-group">
        <?php echo form_label('Date of Departure', 'date_of_departure', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <?php
          echo form_input(array(
            'name' => 'date_of_departure',
            'type' => 'text',
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
            'value' => html_escape(set_value('visa type',isset($result)?$result->visa_type:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'visa_type',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('visa type'); ?></span>
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
        ?>
         <p class="expected_txt" style="padding-left: 22px;font-size:17px">年</p>
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
  <h6 class="spec_plan">Specific Plans after Graduating</h6>
  <div class="form-group">
    <p class="addmission" style="margin-bottom:19px ;">Specific Plans after Graduating</p>
    <select name="specific_plans_after_graduating" class="admission_select" id="specific_plans_after_graduating">
        <option value="Return to Home Country">帰国 /Return to Home Country</option>
        <option value="Attend School in Japan">日本での進学 /Attend School in Japan</option>
        <option value="Other">その他 /Other</option>
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
        <?php echo form_label('Major', 'specific_plan_major ', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <?php
          echo form_input(array(
            'name' => 'specific_plan_major',
            'type' => 'text',
            'value' => html_escape(set_value('specific_plan_major',isset($result)?$result->specific_plan_major :''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'specific_plan_major',
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
      margin-bottom: 10px;
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
          'type' => 'text',
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
          'type' => 'text',
          'value' => html_escape(set_value('passport_data_exp',isset($result)?$result->passport_data_exp:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'passport_data_exp',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('passport_data_exp'); ?></span>
  </div>  
  <!-- <div class="form-group">
        <?php echo form_label('Blank period／Military service', 'military_service', array( 'class' => 'form-control-label', 'id'=> '')); ?>
        <span class="badge badge-danger">Required</span>
          <div class="radio">
              <label class="col-md-2">
                  <input type="radio" name="military_service" value="1" checked="checked"> Yes
              </label>
              <label class="col-md-2">
                  <input type="radio" name="military_service" value="0" > No
              </label>
        </div>
  </div> -->
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
  <!-- <div class="form-group" style="margin-bottom: 17px;">
        <?php echo form_label('Accompanying Persons,if Any', 'accompanying_person', array( 'class' => 'form-control-label', 'id'=> '')); ?>
        <span class="badge badge-danger">Required</span>
          <div class="radio">
              <label class="col-md-2">
                  <input type="radio" name="accompanying_person" value="1" checked="checked"> Yes
              </label>
              <label class="col-md-2">
                  <input type="radio" name="accompanying_person" value="0" > No
              </label>
        </div>
  </div> -->
  <div class="form-group">
  <?php echo form_label('Accompanying Persons,if Any', 'accompanying_person', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    <select name="accompanying_person" id="accompanying_person" class="admission_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
  </div>
  <div class="form-group">
  <?php echo form_label('Did you apply before in Japan?', 'school_apply_before_japan', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    <select name="school_apply_before_japan" id="school_apply_before_japan" class="admission_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
  </div>
<!--   
  <div class="form-group" style="margin-bottom: 0px;">
        <?php echo form_label('Did you apply before in Japan?', 'school_apply_before_japan', array( 'class' => 'form-control-label', 'id'=> '')); ?>
        <span class="badge badge-danger">Required</span>
          <div class="radio">
              <label class="col-md-2">
                  <input type="radio" name="school_apply_before_japan" value="1" checked="checked"> Yes
              </label>
              <label class="col-md-2">
                  <input type="radio" name="school_apply_before_japan" value="0" > No
              </label>
        </div>
  </div> -->
  <div class="form-group">
      <?php echo form_label('when?', 'school_apply_date', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <?php
        echo form_input(array(
          'name' => 'school_apply_date',
          'type' => 'text',
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
  <?php echo form_label('Have you ever experienced COE rejection?', 'COE_reject', array( 'class' => 'form-control-label', 'id'=> '')); ?>
  <span class="badge badge-danger">Required</span>
    <select name="COE_reject" id="COE_reject" class="admission_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
  </div>
  
  <br><br><br><br><br><br><br><br><br><br>
  <h6 class="spec_plan" style="padding-top:20px;">Employment</h6>
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
  <!-- <div class="form-group">
        <?php echo form_label('Is it possible to provide in English? ', 'provide_english', array( 'class' => 'form-control-label', 'id'=> '')); ?>
        <span class="badge badge-danger">Required</span>
          <div class="radio" style="padding-top: 12px;">
              <label class="col-md-2">
                  <input type="radio" name="provide_english" value="1" checked="checked"> Yes
              </label>
              <label class="col-md-2">
                  <input type="radio" name="provide_english" value="0" > No
              </label>
        </div>
  </div> -->

  <div class="form-group">
  <?php echo form_label('Is it possible to provide in English? ', 'provide_english', array( 'class' => 'form-control-label', 'id'=> '')); ?>
  <span class="badge badge-danger">Required</span>
    <select name="provide_english" id="provide_english" class="admission_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
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
        <?php echo form_label('Who?', 'understand_language', array( 'class' => 'wholanguage', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <?php
          echo form_input(array(
            'name' => 'understand_language',
            'type' => 'text',
            // 'value' => html_escape(set_value('understand_language',isset($result)?$result->understand_language:''), ENT_QUOTES),
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
        <div class="">
            <label class="col-rd cri_text"><span style="padding-left:30px ;margin-top: 7px;">Details</span>
                <input type="text" class="details form-control col-md-8" name="eligibility_time" value="" checked="checked">
            </label> 
        </div>
    </div>  
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
  <!-- <div class="criminal_record02">
            <label class="col-rd cri_text"><span style="padding-left:4px ;">Details</span>
                <input type="text" class="details form-control col-md-12" name="criminal_record_details" value="" checked="checked">
            </label> 
        </div> -->
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
                <input type="text" class="details form-control col-md-8" name="criminal_record_when" value="" checked="checked" style="margin-left: 16px;margin-right: 0px;">
            </label> 
        </div>
        <div class="">
            <label class="col-rd cri_text"><span>Purpose of Entry:</span>
                <input type="text" class="details form-control col-md-8" name="entry_purpose1" value="" checked="checked" style="margin: 0px;">
            </label> 
        </div>
    </div>  
</div>
  <style>
  .criminal_record01 {
    width: 34%;
    /* position: absolute; */
  }
  /* .criminal_record02 {
    position: relative;
    top: 0px;
    left: 25%;
  } */
  .criminal_record03{
    position: relative;
    top: 0px;
    left: 25%;
  }
  /* .eli_text{
    padding-left: 37px;
  } */
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
            //'value' => html_escape(set_value('purpose_studying_in_japanese',isset($result)?$result->purpose_studying_in_japanese:''), ENT_QUOTES),
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
            'placeholder' => 'Enter email account!',
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
            'placeholder' => 'Enter phone number!',
            'class' => 'form-control',
            'id' => 'family_tel',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('family_tel'); ?></span>
       </div>

<div class="form-group">
        <?php echo form_label('Address','family_address', array('class' => 'col-form-label')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'family_address',
            'type' => 'text',
            'value' => html_escape(set_value('phone',isset($result)?$result->family_address:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
            'class' => 'form-control',
            'id' => 'family_address',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('address'); ?></span>
       </div>
</div>
<!-- co_leftside -->

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
      <input type="text" class=" table-control"  name="edu_start_date[]" id="start_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="edu_end_date[]" id="end_date" value="">
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
      <input type="text" class=" table-control"  name="edu_start_date[]" id="start_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="edu_end_date[]" id="end_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control term" name="edu_year[]" id="year" value=""><span class="study_year">year</span> 
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="name" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="address" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="start_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="end_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control term" name="year" value=""><span class="study_year">year</span> 
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="name" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="address" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="start_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="end_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control term" name="year" value=""><span class="study_year">year</span> 
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="name" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="address" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="start_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="end_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control term" name="year" value=""><span class="study_year">year</span> 
      </td>
    </tr>
  </tbody>
</table>
</div>
      

       
</div>
<!-- Table -->
<!-- Table -->
<div class="col-md-12 float-left">
<h6 class="" style="padding: 33px 0px 12px;">Previous Japanese Language Study</h6>
<div class="tbl">
<table class="table-bordered" name="applicant_id">
  <thead class="tbl_head">
    <tr>
      <th>Name of institution</th>
      <th>Address</th>
      <th>Starting <br>Year/Month  </th>
      <th >Finishing <br>Year/Month </th>
      <th>Total hour of Studyy</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="jp_name[0]" id="jp_name" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="jp_address[0]" id="jp_address" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="jp_start_date[0]" id="jp_address" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="jp_end_date[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control term" name="jp_hour[0]" value=""><span class="study_year">hour</span> 
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="jp_name[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="jp_address[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="jp_start_date[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="jp_end_date[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control term" name="jp_hour[1]" value=""><span class="study_year">hour</span> 
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="name" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="address" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="start_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="end_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control term" name="hour" value=""><span class="study_year">hour</span> 
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="name" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="address" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="start_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="end_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control term" name="hour" value=""><span class="study_year">hour</span> 
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="name" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="address" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="start_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="end_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control term" name="hour" value=""><span class="study_year">hour</span> 
      </td>
    </tr>
  </tbody>
</table>
</div>

</div>
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
      <input type="text" class=" table-control"  name="achiv_name[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="achiv_level[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="achiv_exam_year[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="achiv_score[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control term" name="achiv_result[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control" name="achiv_date_qualification[0]" value="">
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="achiv_name[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="achiv_level[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="achiv_exam_year[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="achiv_score[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control term" name="achiv_result[1]" value=""> 
      </td>
      <td>
      <input type="text" class=" table-control" name="achiv_date_qualification[1]" value="">
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="name" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="level" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="exam_year" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="score" value="">
      </td>
      <td>
      <input type="text" class=" table-control term" name="result" value=""> 
      </td>
      <td>
      <input type="text" class=" table-control" name="date_qualification" value="">
      </td>
    </tr>
  </tbody>
</table>
</div>
</div>
<div class="col-md-4 float-left">
<h6 class="" style="padding: 33px 0px 12px;">Name of JP language tests you are going to take</h6>
<table class="table-bordered" name="applicant_id">
  <thead class="tbl_head">
    <tr>
      <th>Name of Japanese language test</th>
      <th>Level</th>
      
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>
      <input type="text" class=" table-control term" name="going_name[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control" name="going_level[0]" value="">
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control term" name="going_name[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control" name="going_level[1]" value="">
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control term" name="name" value="">
      </td>
      <td>
      <input type="text" class=" table-control" name="level" value="">
      </td>
    </tr>
  </tbody>
</table>
</div>

<!-- Table -->

<!-- Table -->
<div class="col-md-12 float-left">
<h6 class="" style="padding: 33px 0px 12px;">History of Employment (Write in order, ending with the most recent employment.)</h6>
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
    
    <tr>
      <td>
      <input type="text" class=" table-control"  name="emp_name[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="emp_address[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="emp_start_date[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="emp_end_date[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control term" name="emp_year[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control" name="emp_job_description[0]" value="">
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="emp_name[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="emp_address[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="emp_start_date[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="emp_end_date[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control term" name="emp_year[1]" value=""> 
      </td>
      <td>
      <input type="text" class=" table-control" name="emp_job_description[1]" value="">
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="name" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="address" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="start_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="end_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control term" name="year" value=""> 
      </td>
      <td>
      <input type="text" class=" table-control" name="job_description" value="">
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
      <th>Relationship	</th>
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
      <input type="text" class=" table-control"  name="fam_name[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="fam_relationship[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="fam_work_place[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="fam_birthday[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="fam_occupation[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="fam_annual_income[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control " name="fam_address[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control" name="fam_length_sevice[0]" value="">
      </td>
    </tr>
    <tr>
    <td>
      <input type="text" class=" table-control"  name="fam_fam_name[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="fam_relationship[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="fam_work_place[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="fam_birthday[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="fam_occupation[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="fam_annual_income[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control " name="fam_address[1]" value=""> 
      </td>
      <td>
      <input type="text" class=" table-control" name="fam_length_sevice[1]" value="">
      </td>
    </tr>
    <tr>
    <td>
      <input type="text" class=" table-control"  name="name" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="relationship" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="work_place" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="birthday" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="occupation" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="annual_income" value="">
      </td>
      <td>
      <input type="text" class=" table-control " name="address" value=""> 
      </td>
      <td>
      <input type="text" class=" table-control" name="length_sevice" value="">
      </td>
    </tr>
    <tr>
    <td>
      <input type="text" class=" table-control"  name="name" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="relationship" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="work_place" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="birthday" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="occupation" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="annual_income" value="">
      </td>
      <td>
      <input type="text" class=" table-control " name="address" value=""> 
      </td>
      <td>
      <input type="text" class=" table-control" name="length_sevice" value="">
      </td>
    </tr>
    <tr>
    <td>
      <input type="text" class=" table-control"  name="name" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="relationship" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="work_place" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="birthday" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="occupation" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="annual_income" value="">
      </td>
      <td>
      <input type="text" class=" table-control " name="address" value=""> 
      </td>
      <td>
      <input type="text" class=" table-control" name="length_sevice" value="">
      </td>
    </tr>
  </tbody>
</table>
</div>
</div>
<!-- Table -->
<!-- Table -->
<div class="col-md-12 float-left">
<h6 class="" style="padding: 33px 0px 12px;">Family in Japan (Father, Mother, Spouse, Child, Brother and Sisters, or Others) :</h6>
<p >If yes, fill in all the family members in Japan.</p>
  <div class="form-group">
  <?php echo form_label('Are you planning to stay with them in Japan? : ', 'plan_to_stay_with_them', array( 'class' => 'form-control-label', 'id'=> '')); ?><br/>
    <select name="ja_plan_to_stay_with_them" id="ja_plan_to_stay_with_them" class="planning_select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
  </div>
<div class="tbl">
<table class="table-bordered" name="applicant_id">
  <thead class="tbl_head">
    <tr>
      <th>Name</th>
      <th>Age	</th>
      <th>Relatonship</th>
      <th>Residing with Applicant or Not	</th>
      <th >Nationality </th>
      <th>Visa status	</th>
      <th>Work Place	</th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      
      <td>
      <input type="text" class=" table-control"  name="ja_fam_name[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_age[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_relationship[0]" value="">
      </td>
      <td>
      <div class="">
      <select name="ja_fam_residing_applicant[0]" class="table-control col-md-12">
            <option value=""></option>
            <option value="0">Yes</option>
            <option value="1">No</option>
        </select>
     </div>
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_nationality[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control " name="ja_fam_visa_status[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control" name="ja_fam_work_place[0]" value="">
      </td>
    </tr>
    <tr>
    
      <td>
      <input type="text" class=" table-control"  name="ja_fam_name[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_age[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_relationship[1]" value="">
      </td>
      <td>
      <div class="">
      <select name="ja_fam_residing_applicant[1]" class="table-control col-md-12">
            <option value=""></option>
            <option value="0">Yes</option>
            <option value="1">No</option>
        </select>
     </div>
      </td>
      <td>
      <input type="text" class=" table-control"  name="ja_fam_nationality[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control " name="ja_fam_visa_status[1]" value=""> 
      </td>
      <td>
      <input type="text" class=" table-control" name="ja_fam_work_place[1]" value="">
      </td>
    </tr>
    <tr>
    
      <td>
      <input type="text" class=" table-control"  name="name" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="fa_age" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="relationship" value="">
      </td>
      <td>
      <div class="">
      <select name="residing_applicant" class="table-control col-md-12">
            <option value=""></option>
            <option value="0">Yes</option>
            <option value="1">No</option>
        </select>
     </div>
      </td>
      <td>
      <input type="text" class=" table-control"  name="nationalitys" value="">
      </td>
      <td>
      <input type="text" class=" table-control " name="visa_status" value=""> 
      </td>
      <td>
      <input type="text" class=" table-control" name="work_place" value="">
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="name" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="fa_age" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="relationship" value="">
      </td>
      <td>
      <div class="">
        <select name="residing_applicant " class="table-control col-md-12">
            <option value=""></option>
            <option value="0">Yes</option>
            <option value="1">No</option>
        </select>
     </div>
      </td>
      <td>
      <input type="text" class=" table-control"  name="nationalitys" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="visa_status" value="">
      </td>
      <td>
      <input type="text" class=" table-control " name="work_place" value=""> 
      </td>
    </tr>
    
  </tbody>
</table>
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
      <th >Status	 </th>
      <th>Purpose of Entry</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="entry_date[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="arrival_date[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="depature_date[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="status[0]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="entry_purpose[0]" value="">
      </td>
    </tr>
    <tr>
      <td>
      <input type="text" class=" table-control"  name="entry_date[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="arrival_date[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="depature_date[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="status[1]" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="entry_purpose[1]" value="">
      </td>
     
    </tr>
    <!-- <tr>
      <td>
      <input type="text" class=" table-control"  name="entry_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="arrival_date" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="depature_data" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="status" value="">
      </td>
      <td>
      <input type="text" class=" table-control"  name="entry_purpose" value="">
      </td>
    </tr> -->
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
  margin-bottom: 20px;
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
  width: 84%;
    border: none;
  }
 
/* .tbl{
   width: 100%;
  } */

/* .term{
  position: relative;
} */
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
            'name' => 'name',
            'type' => 'text',
            'value' => html_escape(set_value('name',isset($result)?$result->name:''), ENT_QUOTES),
            'placeholder' => 'Enter name!',
            'class' => 'form-control',
            'id' => 'name',
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
            'placeholder' => "Enter Age!",
            'class' => 'form-control',
            'id' => 'fin_age',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('fin_age'); ?></span>
      </div>
      <div class="form-group">
        <?php echo form_label('Relationship', 'relationship', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'relationship',
            'type' => 'text',
            'value' => html_escape(set_value('relationship',isset($result)?$result->relationship:''), ENT_QUOTES),
            'placeholder' => "Enter student's Age!",
            'class' => 'form-control',
            'id' => 'relationship',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('relationship'); ?></span>
      </div>
      <div class="form-group">
        <?php
          echo form_label('Address','address', array('class' => 'col-form-label'));
        ?>
        <div class="col-md-12 col-sm-12 p-0">
          <?php 
            $data = array(
            'name' => 'address',
            'value' => '',
            'rows' => '3',
            'cols' => '',
            'placeholder' => 'Enter address',
            'class' => "form-control",
            'value' => set_value('address',isset($result)?$result->address:'')
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
            'placeholder' => 'Enter phone number!',
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
            'placeholder' => 'Enter email account!',
            'class' => 'form-control',
            'id' => 'email',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('email'); ?></span>
       </div>
       <div class="form-group">
      <?php echo form_label('Occupation', 'occupation', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <?php
        echo form_input(array(
          'name' => 'occupation',
          'type' => 'text',
          'value' => html_escape(set_value('occupation',isset($result)?$result->occupation:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'occupation',
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
      <?php echo form_label('The amount of saving for study abroad ', 'amount_saving_for_study_abroad ', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <?php
        echo form_input(array(
          'name' => 'amount_saving_for_study_abroad ',
          'type' => 'text',
          'value' => html_escape(set_value('amount_saving_for_study_abroad ',isset($result)?$result->amount_saving_for_study_abroad :''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'amount_saving_for_study_abroad ',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('amount_saving_for_study_abroad '); ?></span>
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
      <?php echo form_label('Start of Work date', 'start_work_date ', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
      <?php
        echo form_input(array(
          'name' => 'start_work_date  ',
          'type' => 'text',
          'value' => html_escape(set_value('start_work_date ',isset($result)?$result->start_work_date :''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'start_work_date ',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('start_work_date '); ?></span>
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
  width: 50%;
  font-size: 16px;
  margin: 0px;
}
.text-right {
    padding-bottom: 27px;
    text-align: right !important;
}
</style>