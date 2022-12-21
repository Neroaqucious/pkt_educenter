<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title">Edit JLS Applicant Registration</h1>
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
<div class="content">
<div class="row">
<div class="col-lg-12 col-md-12 mb-4 mb-lg-0">
<div class="card">
<div class="card-body">
  <?php
        $attributes = array('class' => 'form-horizontal form-label-left');
				echo form_open_multipart('adm/portal/jls_applicant/edit/'.$result->id, $attributes);
    ?>
    <!-- <?php var_dump($result); ?> -->
<div class="col-md-12">
<div class="col-md-6 " style="display: flex;padding-top: 32px;">
  <!-- Student Photo -->
    <?php
      echo form_label('Applicant Photo','userfile', array('class' => 'col-form-label')) ;
    ?>
   <div class="col-md-6" style="width: 100%;padding-left:0px;padding-right: 0px;">
        <?php
              echo form_input(array(
              'name' => 'userfile',
              'type' => 'file',
              'class' => 'form-control',
              'id' => 'clickImg',
              'accept' => 'image/*'
              ));
            ?>            
            <span class="text-danger"><?php echo form_error('userfile'); ?></span>
            <?php if(!empty($result->image_file)) { ?>
              <img src="<?php echo base_url('upload/assets/adm/usr/'.$result->image_file); ?>" width="100px;" class="pb-1">
            <?php } ?>
            <div class="form-group" id="showImg1"></div>               
    </div>
  <span class="text-danger"><?php echo form_error('userfile'); ?></span>
  </div>
  <!-- Student Photo -->  
  <div class="col-md-6 float-left" style="display: flex;padding-top: 12px;">
  <!-- Student Photo -->
  <?php
      echo form_label('Applicant Photo','signfile', array('class' => 'col-form-label')) ;    
  ?>
   <div class="col-md-6" style="width: 100%;padding-left:0px;padding-right: 0px;">
        <?php
              echo form_input(array(
              'name' => 'signfile',
              'type' => 'file',
              'class' => 'form-control',
              'id' => 'clickImg',
              'accept' => 'images/*'
              ));
            ?>            
            <span class="text-danger"><?php echo form_error('signfile'); ?></span>
            <?php if(!empty($result->image_file)) { ?>
              <img src="<?php echo base_url('upload/assets/adm/usr/'.$result->sign_file); ?>" width="100px;" class="pb-1">
            <?php } ?>
            <div class="form-group" id="showImg2"></div>               
    </div>
  <span class="text-danger"><?php echo form_error('sign_file'); ?></span>
  </div>
  <!-- Student Photo -->  

<!-- JLS Name -->
<div class="school_list" name="" >
<p class="list_label">JLS Name  </p>
<select name="jls_name" class="school_select" id="jls_name">
    <option value="" <?php if($result->jls_name== "") echo "selected"; ?>>Please Select!</option>
    <option value="ECC" <?php if($result->jls_name== "ECC") echo "selected"; ?>>ECC</option>
    <option value="JCLI" <?php if($result->jls_name== "JCLI") echo "selected"; ?>>JCLI</option>
    <option value="OJLS" <?php if($result->jls_name== "OJLS") echo "selected"; ?>>OJLS</option>
    <option value="fukuoka" <?php if($result->jls_name== "Fukuoka") echo "selected"; ?>>fukuoka</option>
    <option value="shizuoka" <?php if($result->jls_name== "Shizuoka") echo "selected"; ?>>shizuoka</option>
</select>
</div>
<!-- JLS Name -->

<!-- Status -->
<div class="status_popup" >
<div class="school_list status_select" name="" >
<p class="list_label">Status </p>
<select name="appli_status" id="appli_status" class="school_select" onchange="canceltimes(this.value)">
<option value="">Please Select!</option>
        <option value="Register" <?php if($result->appli_status== "Register") echo "selected"; ?>>Register</option>
        <option value="Interview" <?php if($result->appli_status== "Interview") echo "selected"; ?>>Interview</option>
        <option value="Interview Failed" <?php if($result->appli_status== "Interview Failed") echo "selected"; ?>>Interview Failed</option>
        <option value="Admission" <?php if($result->appli_status== "Admission") echo "selected"; ?>>Admission</option>
        <option value="Admission Complete" <?php if($result->appli_status== "Admission Complete") echo "selected"; ?>>Admission Complete</option>
        <option value="COE Waiting" <?php if($result->appli_status== "COE Waiting") echo "selected"; ?>>COE Waiting</option>
        <option value="Cancel" <?php if($result->appli_status== "Cancel") echo "selected"; ?>>Cancel</option>
        <option value="COE Passed" <?php if($result->appli_status== "COE Passed") echo "selected"; ?>>COE Passed</option>
        <option value="COE Failed" <?php if($result->appli_status== "COE Failed") echo "selected"; ?>>COE Failed</option>
</select>
</div>
  <!-- Status Name -->
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
<!-- interview date -->
<div class="col-md-10" id="interview_date"  style="display: none;">
    <div class="form-group school_list"  style="width:60% ;padding-left: 0px;">
    <p class="list_label" style="width: 48.5%;">
       <label style="margin-bottom: 0px;margin-top: 12px;">Interview Date</label>
       <span class="badge badge-danger" >Required</span>

    </p>
        <?php
          echo form_input(array(
            'name' => 'interview_date',
            'type' => 'date',
            'value' => html_escape(set_value('interview_date',isset($result)?$result->interview_date:''), ENT_QUOTES),
            'class' => 'form-control',
            'id' => 'interview_date',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('interview_date'); ?></span>
    </div>
  </div>
<!-- interview date -->
<!-- interview failed date -->
<div class="col-md-10" id="inter_fail_date"  style="display: none;">
    <div class="form-group school_list"  style="width:60% ;padding-left: 0px;">
    <p class="list_label" style="width: 48.5%;">
       <label style="margin-bottom: 0px;margin-top: 12px;">Interview Failed Date</label>
       <span class="badge badge-danger" >Required</span>

    </p>
        <?php
          echo form_input(array(
            'name' => 'inter_fail_date',
            'type' => 'date',
            'value' => html_escape(set_value('inter_fail_date',isset($result)?$result->inter_fail_date:''), ENT_QUOTES),
            'class' => 'form-control',
            'id' => 'inter_fail_date',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('inter_fail_date'); ?></span>
    </div>
  </div>
<!-- interview failed date -->
<!-- admission date -->
<div class="col-md-10" id="admission_date" style="display: none;">
    <div class="form-group school_list"  style="width:60% ;padding-left: 0px;">
    <p class="list_label" style="width: 48.5%;">
       <label  style="margin-bottom: 0px;margin-top: 12px;">Admission Date</label>
       <span class="badge badge-danger">Required</span>
    </p>
        <?php
          echo form_input(array(
            'name' => 'admission_date',
            'type' => 'date',
            'value' => html_escape(set_value('admission_date',isset($result)?$result->admission_date:''), ENT_QUOTES),
            'class' => 'form-control',
            'id' => 'admission_date',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('admission_date'); ?></span>
    </div>
</div>
<!-- admission date -->

<!-- collect data expired date -->
<div class="col-md-10" id="data_expired_date" style="display: none;">
    <div class="form-group school_list"  style="width:60% ;padding-left: 0px;">
    <p class="list_label" style="width: 48.5%;">
       <label  style="margin-bottom: 0px;margin-top: 12px;">Collect Data EXP Date</label>
       <span class="badge badge-danger" >Required</span>
    </p>
        <?php
          echo form_input(array(
            'name' => 'data_expired_date',
            'type' => 'date',
            'value' => html_escape(set_value('data_expired_date',isset($result)?$result->data_expired_date:''), ENT_QUOTES),
            'class' => 'form-control',
            'id' => 'data_expired_date',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('data_expired_date'); ?></span>
    </div>
</div>
<!-- collect data expired date -->

<!-- admission date -->
<div class="col-md-10" id="adm_complete_date" style="display: none;">
    <div class="form-group school_list" style="width:60% ;padding-left: 0px;">
    <p class="list_label" style="width: 48.5%;">
       <label  style="margin-bottom: 0px;margin-top: 12px;">Complete Date</label>
       <span class="badge badge-danger">Required</span>
    </p>
        <?php
          echo form_input(array(
            'name' => 'adm_complete_date',
            'type' => 'date',
            'value' => html_escape(set_value('adm_complete_date',isset($result)?$result->adm_complete_date:''), ENT_QUOTES),
            'class' => 'form-control',
            'id' => 'adm_complete_date',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('adm_complete_date'); ?></span>
    </div>
</div>
<!-- admission date -->

<!-- tracking code -->
<div class="col-md-10" id="tracking_code" style="display: none;">
    <div class="form-group school_list"  style="width:60% ;padding-left: 0px;">
    <p class="list_label" style="width: 48.5%;">
       <label  style="margin-bottom: 0px;margin-top: 12px;">Tracking Code</label>
       <!-- <span class="badge badge-danger">Required</span> -->
    </p>
        <?php
          echo form_input(array(
            'name' => 'tracking_code',
            'type' => 'input',
            'value' => html_escape(set_value('tracking_code',isset($result)?$result->tracking_code:''), ENT_QUOTES),
            'class' => 'form-control',
            'id' => 'tracking_code',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('tracking_code'); ?></span>
    </div>
</div>
<!-- tracking code -->
<!-- interview date -->
<div class="col-md-10" id="coe_date"  style="display: none;">
    <div class="form-group school_list"  style="width:60% ;padding-left: 0px;">
    <p class="list_label" style="width: 48.5%;">
       <label style="margin-bottom: 0px;margin-top: 12px;">COE Date</label>
       <span class="badge badge-danger" >Required</span>

    </p>
        <?php
          echo form_input(array(
            'name' => 'coe_date',
            'type' => 'date',
            'value' => html_escape(set_value('coe_date',isset($result)?$result->coe_date:''), ENT_QUOTES),
            'class' => 'form-control',
            'id' => 'coe_date',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('coe_date'); ?></span>
    </div>
  </div>
<!-- interview date -->
<!-- interview date -->
<div class="col-md-10" id="coe_pass_date"  style="display: none;">
    <div class="form-group school_list"  style="width:60% ;padding-left: 0px;">
    <p class="list_label" style="width: 48.5%;">
       <label style="margin-bottom: 0px;margin-top: 12px;">COE Passed</label>
       <span class="badge badge-danger" >Required</span>

    </p>
        <?php
          echo form_input(array(
            'name' => 'coe_pass_date',
            'type' => 'date',
            'value' => html_escape(set_value('coe_pass_date',isset($result)?$result->coe_pass_date:''), ENT_QUOTES),
            'class' => 'form-control',
            'id' => 'coe_pass_date',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('coe_pass_date'); ?></span>
    </div>
  </div>
<!-- interview date -->
<!-- interview date -->
<div class="col-md-10" id="coe_fail_date"  style="display: none;">
    <div class="form-group school_list"  style="width:60% ;padding-left: 0px;">
    <p class="list_label" style="width: 48.5%;">
       <label style="margin-bottom: 0px;margin-top: 12px;">COE Failed</label>
       <span class="badge badge-danger" >Required</span>

    </p>
        <?php
          echo form_input(array(
            'name' => 'coe_fail_date',
            'type' => 'date',
            'value' => html_escape(set_value('coe_fail_date',isset($result)?$result->coe_fail_date:''), ENT_QUOTES),
            'class' => 'form-control',
            'id' => 'coe_fail_date',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('coe_fail_date'); ?></span>
    </div>
  </div>
<!-- interview date -->
<!-- coe failed times -->
<div class="col-md-10" id="coe_fail_times"  style="display: none;">
    <div class="form-group school_list"  style="width:60% ;padding-left: 0px;">
    <p class="list_label" style="width: 48.5%;">
       <label style="margin-bottom: 0px;margin-top: 12px;">COE Failed Times</label>
       <span class="badge badge-danger" >Required</span>

    </p>
        <?php
          echo form_input(array(
            'name' => 'coe_fail_times',
            'type' => 'text',
            'value' => html_escape(set_value('coe_fail_times',isset($result)?$result->coe_fail_times:''), ENT_QUOTES),
            'class' => 'form-control',
            'id' => 'coefail',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('coe_fail_times'); ?></span>
    </div>
  </div>
<!-- coe failed times -->
<!-- cancel dates -->
<div class="col-md-10" id="cancel_date"  style="display: none;">
    <div class="form-group school_list"  style="width:60% ;padding-left: 0px;">
    <p class="list_label" style="width: 48.5%;">
       <label style="margin-bottom: 0px;margin-top: 12px;">Cancel Date</label>
       <span class="badge badge-danger" >Required</span>

    </p>
        <?php
          echo form_input(array(
            'name' => 'cancel_date',
            'type' => 'date',
            'value' => html_escape(set_value('cancel_times',isset($result)?$result->cancel_date:''), ENT_QUOTES),
            'class' => 'form-control',
            'id' => 'cancel_date',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('cancel_date'); ?></span>
    </div>
  </div>
<!-- cancel date -->
<!-- cancel times -->
<div class="col-md-10" id="cancel_times"  style="display: none;">
    <div class="form-group school_list"  style="width:60% ;padding-left: 0px;">
    <p class="list_label" style="width: 48.5%;">
       <label style="margin-bottom: 0px;margin-top: 12px;">Cancel Times</label>
       <span class="badge badge-danger" >Required</span>

    </p>
    <?php
          echo form_input(array(
            'name' => 'cancel_times',
            'type' => 'text',
            'value' => html_escape(set_value('cancel_times',isset($result)?$result->cancel_times:''), ENT_QUOTES ),
            'class' => 'form-control',
            'id' => 'cancel',
            'readonly' => 'readonly',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('cancel_times'); ?></span>
    </div>
  </div>
  <!-- cancel times record -->
  <script>
        function canceltimes(statusData) {
          var canceltimes;
          var interfailtimes;
          // var appliStatus = document.getElementById('appli_status').value;
          var canceltimes = document.getElementById('cancel').value;
          var interfailtimes = document.getElementById('interfail').value;
          var coefailtimes = document.getElementById('coefail').value;
            if(statusData == "Cancel"){
            counter = 1;
            for(var i = 0; i < 1; i++){
                canceltimes++;
              }
              document.getElementById("cancel").value = canceltimes;
            }else if(statusData == "Interview Failed"){
              console.log(true);
              counter = 1;
              for(var j = 0; j < 1; j++){
                interfailtimes++;
                }
                document.getElementById("interfail").value = interfailtimes;
            }else if(statusData == "COE Failed"){
              console.log(true);
              counter = 1;
              for(var k = 0; k < 1; k++){
                coefailtimes++;
                }
                document.getElementById("coefail").value = coefailtimes;
            }else{

            }
        }
               
</script>
<!-- cancel times -->
<!-- interview failed times -->
<div class="col-md-10" id="inter_fail_times"  style="display: none;">
    <div class="form-group school_list"  style="width:60% ;padding-left: 0px;">
    <p class="list_label" style="width: 48.5%;">
       <label style="margin-bottom: 0px;margin-top: 12px;">Inter Fail Times</label>
       <span class="badge badge-danger" >Required</span>

    </p>
        <?php
          echo form_input(array(
            'name' => 'inter_fail_times',
            'type' => 'text',
            'value' => html_escape(set_value('inter_fail_times',isset($result)?$result->inter_fail_times:''), ENT_QUOTES),
            'class' => 'form-control',
            'id' => 'interfail',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('inter_fail_times'); ?></span>
    </div>
  </div>
<!-- interview failed times -->
</div>
<!-- Status -->
</div>
<!-- </div> -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(function() { 
  const jlsNameSelector = (jlschool_name) =>{
       if(jlschool_name == "Register"){
         $('#register_date').show();
         $('#inter_fail_date').hide();
         $('#interview_date').hide();
         $('#data_expired_date').hide();
         $('#admission_date').hide();
         $('#tracking_code').hide();
         $('#adm_complete_date').hide();
         $('#coe_date').hide();
         $('#coe_fail_date').hide();
         $('#coe_pass_date').hide();
         $('#coe_fail_times').hide();
         $('#cancel_date').hide();
         $('#cancel_times').hide();
         $('#inter_fail_times').hide();

        }else if(jlschool_name == "Interview"){
         $('#interview_date').show();
         $('#inter_fail_date').hide();
         $('#register_date').hide();
         $('#data_expired_date').hide();
         $('#admission_date').hide();
         $('#tracking_code').hide();
         $('#adm_complete_date').hide();
         $('#coe_date').hide();
         $('#coe_fail_date').hide();
         $('#coe_pass_date').hide();
         $('#coe_fail_times').hide();
         $('#cancel_date').hide();
         $('#cancel_times').hide();
         $('#inter_fail_times').hide();

        }else if(jlschool_name == "Interview Failed"){
         $('#interview_date').hide();
         $('#inter_fail_date').show();
         $('#register_date').hide();
         $('#data_expired_date').hide();
         $('#admission_date').hide();
         $('#tracking_code').hide();
         $('#adm_complete_date').hide();
         $('#coe_date').hide();
         $('#coe_fail_date').hide();
         $('#coe_pass_date').hide();
         $('#coe_fail_times').hide();
         $('#cancel_date').hide();
         $('#cancel_times').hide();
         $('#inter_fail_times').show();

        }else if(jlschool_name == "Admission"){
        $('#data_expired_date').show();
        $('#admission_date').show();
        $('#inter_fail_date').hide();
        $('#interview_date').hide();
        $('#register_date').hide();
        $('#tracking_code').hide();
        $('#adm_complete_date').hide();
        $('#coe_date').hide();
        $('#coe_fail_date').hide();
        $('#coe_pass_date').hide();
        $('#coe_fail_times').hide();
        $('#cancel_date').hide();
         $('#cancel_times').hide();
         $('#inter_fail_times').hide();

      }else if(jlschool_name == "Admission Complete"){
        $('#data_expired_date').hide();
        $('#admission_date').hide();
        $('#inter_fail_date').hide();
        $('#interview_date').hide();
        $('#register_date').hide();
        $('#tracking_code').show();
        $('#adm_complete_date').show();
        $('#coe_date').hide();
        $('#coe_fail_date').hide();
        $('#coe_pass_date').hide();
        $('#coe_fail_times').hide();
        $('#cancel_date').hide();
         $('#cancel_times').hide();
         $('#inter_fail_times').hide();

      }else if(jlschool_name == "COE Waiting"){
        $('#data_expired_date').hide();
        $('#admission_date').hide();
        $('#inter_fail_date').hide();
        $('#interview_date').hide();
        $('#register_date').hide();
        $('#tracking_code').hide();
        $('#coe_date').show();
        $('#coe_fail_date').hide();
        $('#coe_pass_date').hide();
        $('#adm_complete_date').hide();
        $('#coe_fail_times').hide();
        $('#cancel_date').hide();
         $('#cancel_times').hide();
         $('#inter_fail_times').hide();

      }else if(jlschool_name == "COE Failed"){
        $('#data_expired_date').hide();
        $('#admission_date').hide();
        $('#inter_fail_date').hide();
        $('#interview_date').hide();
        $('#register_date').hide();
        $('#tracking_code').hide();
        $('#coe_date').hide();
        $('#coe_pass_date').hide();
        $('#coe_fail_date').show();
        $('#coe_fail_times').show();
        $('#adm_complete_date').hide();
        $('#cancel_date').hide();
         $('#cancel_times').hide();
         $('#inter_fail_times').hide();

      }else if(jlschool_name == "COE Passed"){
        $('#data_expired_date').hide();
        $('#admission_date').hide();
        $('#inter_fail_date').hide();
        $('#interview_date').hide();
        $('#register_date').hide();
        $('#tracking_code').hide();
        $('#coe_pass_date').show();
        $('#coe_date').hide();
        $('#coe_fail_date').hide();
        $('#adm_complete_date').hide();
        $('#coe_fail_times').hide();
        $('#cancel_date').hide();
         $('#cancel_times').hide();
         $('#inter_fail_times').hide();

      }else if(jlschool_name =="COE Failed"){
        $('#data_expired_date').hide();
        $('#admission_date').hide();
        $('#inter_fail_date').hide();
        $('#interview_date').hide();
        $('#register_date').hide();
        $('#tracking_code').hide();
        $('#coe_pass_date').hide();
        $('#coe_date').hide();
        $('#coe_fail_date').show();
        $('#adm_complete_date').hide();
        $('#coe_fail_times').show();
        $('#cancel_date').hide();
         $('#cancel_times').hide();
         $('#inter_fail_times').hide();

      }else if(jlschool_name =="Cancel"){
        $('#data_expired_date').hide();
        $('#admission_date').hide();
        $('#inter_fail_date').hide();
        $('#interview_date').hide();
        $('#register_date').hide();
        $('#tracking_code').hide();
        $('#coe_pass_date').hide();
        $('#coe_date').hide();
        $('#coe_fail_date').hide();
        $('#adm_complete_date').hide();
        $('#coe_fail_times').hide();
        $('#cancel_date').show();
        $('#cancel_times').show();
        $('#inter_fail_times').hide();

      }else{
        $('#data_expired_date').hide();
        $('#admission_date').hide();
        $('#inter_fail_date').hide();
        $('#interview_date').hide();
        $('#register_date').hide();
        $('#tracking_code').hide();
        $('#adm_complete_date').hide();
        $('#coe_date').hide();
        $('#coe_fail_date').hide();
        $('#coe_pass_date').hide();
        $('#coe_fail_times').hide();
        $('#cancel_date').hide();
        $('#cancel_times').hide();
        $('#inter_fail_times').hide();
      }
    }
    $(".school_select").change(function() {
       const jlschoolame = $('option:selected', this).text();
       jlsNameSelector(jlschoolame);

    });
    const selectJLSchoolName = '<?php echo $result->appli_status; ?>';
     if(selectJLSchoolName){
      jlsNameSelector(selectJLSchoolName);
     }else{
      console.log(123);
      $('#data_expired_date').hide();
        $('#admission_date').hide();
        $('#inter_fail_date').hide();
        $('#interview_date').hide();
        $('#register_date').hide();
        $('#tracking_code').hide();
        $('#adm_complete_date').hide();
        $('#coe_date').hide();
        $('#coe_fail_date').hide();
        $('#coe_pass_date').hide();
        $('#coe_fail_times').hide();
        $('#cancel_date').hide();
        $('#cancel_times').hide();
        $('#inter_fail_times').hide();
     }
    });
</script>


<style>
 #register_date,
 #interview_date,
 #data_expired_date,
 #admission_date,
 #tracking_code,
 #adm_complete_date{
  margin-top: 9px;
} 
.status_select{
    display: inline;
}
.school_list.status_select {
    padding-left: 14px;
}
select.form-group.col-md-9.school_select{
    padding: 8px;
    margin: 7px 7px 7px 35px;
    border: 1px solid #ced4db;
    border-radius: 3px;
}
input#register_date,
input#interview_date,
input#inter_fail_date,
input#interfail,
input#admission_date,
input#data_expired_date,
input#adm_complete_date,
input#tracking_code,
input#coe_date,
input#cancel_date,
input#cancel,
input#coe_pass_date,
input#coe_fail_date,
input#coefail
 {
    width: 49%;
}
</style>
<!-- Start dropdown APPLICANT INFORMATION -->
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
            'placeholder' => "Enter student's Age!",
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
            'placeholder' => "Please Enter",
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
            'placeholder' => "Please Enter!",
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
            'placeholder' => 'Enter Place Of Birth!',
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
            'placeholder' => "Please Enter",
            'class' => 'form-control',
            'id' => 'place_birth',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('place_birth'); ?></span>
      </div>

      <div class="form-group">
        <?php echo form_label('Age', 'info_agege', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'info_age')); ?>
        <?php
          echo form_input(array(
            'name' => 'info_age',
            'type' => 'text',
            'value' => html_escape(set_value('info_age',isset($result)?$result->info_age:''), ENT_QUOTES),
            'placeholder' => "Please Enter",
            'class' => 'form-control',
            'id' => 'info_age',
            'autocomplete' => ''));
          ?>
        <span class="text-danger"><?php echo form_error('info_age'); ?></span>
      </div>
      <div class="form-group">
        <?php echo form_label('Nationality', 'nationality', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'info_nationality',
            'type' => 'text',
            'value' => html_escape(set_value('nationality',isset($result)?$result->info_nationality:''), ENT_QUOTES),
            'placeholder' => "",
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
          <option value="1" <?php if($result->gender== "1") {echo "selected";} ?>>Male</option>
          <option value="0" <?php if($result->gender== "0") {echo "selected";} ?>>Female</option>
        </select>
      </div> 

      <div class="form-group">
      <?php echo form_label('Martial Status', 'martial_status', array( 'class' => 'form-control-label', 'id'=> '')); ?>
      <span class="badge badge-danger">Required</span>
        <select name="martial_status" id="martial_status" class="admission_select">
            <option value="1" <?php if($result->martial_status== "1") {echo "selected";} ?>>Single</option>
            <option value="0" <?php if($result->martial_status== "0") {echo "selected";} ?>>Married</option>
        </select>
      </div> 

      <div class="form-group " id="partaner" style="display:none;">
        <?php echo form_label('Name of your Partaner', 'partaner_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
        <span class="badge badge-danger">Required</span>
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
        <?php echo form_label('Email', 'std_email', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_email')); ?>
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
        <span class="text-danger"><?php echo form_error('std_email'); ?></span>
       </div>

       <div class="form-group">
        <?php echo form_label('Phone Number', 'phone', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'info_phone',
            'type' => 'text',
            'value' => html_escape(set_value('info_phone',isset($result)?$result->info_phone:''), ENT_QUOTES),
            'placeholder' => 'Enter phone number!',
            'class' => 'form-control',
            'id' => 'info_phone',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('phone'); ?></span>
       </div>

       <div class="form-group">
        <?php echo form_label('Address','address', array('class' => 'col-form-label')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'address',
            'type' => 'text',
            'value' => html_escape(set_value('address',isset($result)?$result->address:''), ENT_QUOTES),
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
        <option value="一般" <?php if($result->course_admission == "一般") {echo "selected";} ?>>一般</option>
        <option value="進学" <?php if($result->course_admission == "進学") {echo "selected";} ?>>進学</option>
        <option value="ビジネス" <?php if($result->course_admission == "ビジネス") {echo "selected";} ?>>ビジネス</option>
        <option value="SSW" <?php if($result->course_admission == "SSW") {echo "selected";} ?>>SSW</option>
    </select>
  </div>

  <div class="form-group">
      <?php echo form_label('Length of Study', 'course_study_lengh', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'course_study_lengh')); ?>
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
        <option value="1" <?php if($result->have_you_visited_jp== "1") {echo "selected";} ?>>Yes</option>
        <option value="0" <?php if($result->have_you_visited_jp== "0") {echo "selected";} ?>>No</option>
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
        <?php echo form_label('Date of Entry', 'visited_date', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'visited_date')); ?>
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
        <?php echo form_label('Date of Departure', 'date_of_departure', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'date_of_departure')); ?>
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
        <?php echo form_label('Enter visa type if you visited Japan', 'visa_type', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'visa_type')); ?>
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
        <option value="1" <?php if($result->departure_deportation== "1") {echo "selected";} ?>>Yes</option>
        <option value="0" <?php if($result->departure_deportation== "0") {echo "selected";} ?>>No</option>
    </select>
  </div>

  <div class="form-group">
        <?php echo form_label('Current Status', 'current_status', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'current_status')); ?>
        <?php
          echo form_input(array(
            'name' => 'current_status',
            'type' => 'text',
            'value' => html_escape(set_value('current_status',isset($result)?$result->current_status:''), ENT_QUOTES),
            'placeholder' => 'Enter phone number!',
            'class' => 'form-control',
            'id' => 'current_status',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('current_status'); ?></span>
  </div>
 

  <div class="form-group">
        <?php echo form_label('(Expected month and year of graduating from the school.) ', 'expected_month_year_graduating', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'expected_month_year_graduating')); ?>
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
        <span class="text-danger"><?php echo form_error('expected_month_year_graduating'); ?></span>
  </div>

  <div class="form-group">
        <?php echo form_label('Name of School', 'current_status_school_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'current_status_school_name')); ?>
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
        <?php echo form_label('Department/Major', 'current_status_school_major', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'current_status_school_major')); ?>
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
        <?php echo form_label('Grade', 'current_status_school_grade', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'current_status_school_grade')); ?>
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
        <?php echo form_label('What do you want to do in Japan?‌', 'what_todo_japan', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'three_month_visa')); ?>
        <?php
          echo form_input(array(
            'name' => 'what_todo_japan',
            'type' => 'text',
            'value' => html_escape(set_value('what_todo_japan',isset($result13)?$result13->what_todo_japan:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'what_todo_japan',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('what_todo_japan'); ?></span>
  </div>
  <div class="form-group" style="margin-bottom: 270px;">
        <?php echo form_label('‌Others (If your are a student of Japanese language course, or neither a student nor a worker, explain your current situation in detail. )', 'student_work_details', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'student_work_details')); ?>
        <?php
          echo form_input(array(
            'name' => 'student_work_details',
            'type' => 'text',
            'value' => html_escape(set_value('student_work_details',isset($result13)?$result13->student_work_details:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'student_work_details',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('current_status_school_grade'); ?></span>
  </div>
  
  <div class="form-group" style="display:none;"  id="specific_plans">
  <h6 class="spec_plan">Specific Plans after Graduating</h6>
   <p class="addmission" style="margin-bottom:19px ;">Specific Plans after Graduating</p>
   <select name="specific_plans_after_graduating" class="admission_select" id="specific_plans_after_graduating">
        <option value="Advancing to higher education" <?php if($result->specific_plans_after_graduating== "Advancing to higher education") {echo "selected";} ?>>Advancing to higher education</option>
        <option value="Planning to work" <?php if($result->specific_plans_after_graduating== "Planning to work") {echo "selected";} ?>>Planning to work</option>
        <option value="帰国 /Return to Home Country" <?php if($result->specific_plans_after_graduating== "帰国 /Return to Home Country") {echo "selected";} ?>>帰国 /Return to Home Country</option>
        <option value="日本での進学 /Attend School in Japan" <?php if($result->specific_plans_after_graduating== "日本での進学 /Attend School in Japan") {echo "selected";} ?>>日本での進学 /Attend School in Japan</option>
        <option value="Postgraduate Course" <?php if($result->specific_plans_after_graduating== "Postgraduate Course") {echo "selected";} ?>>Postgraduate Course</option>
        <option value="Junior College" <?php if($result->specific_plans_after_graduating== "Junior College") {echo "selected";} ?>>Junior College</option>
        <option value="Undergraduate Course" <?php if($result->specific_plans_after_graduating== "Undergraduate Course") {echo "selected";} ?>>Undergraduate Course</option>
        <option value="Professional School" <?php if($result->specific_plans_after_graduating== "Professional School") {echo "selected";} ?>>Professional School</option>
        <option value="その他 /Other" <?php if($result->specific_plans_after_graduating== "その他 /Other") {echo "selected";} ?>>その他 /Other</option>
    </select>
  </div>
  <h6 class="spec_plan">Higher Education in Japan</h6>
  <div class="form-group">
        <?php echo form_label('Type of Schools', 'specific_plan_type_schools', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'specific_plan_type_schools')); ?>
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
        <?php echo form_label('Name of School', 'specific_plan_school_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'specific_plan_school_name')); ?>
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
        <?php echo form_label('Major', 'specific_plan_major', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'specific_plan_major')); ?>
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
        <?php echo form_label('What is your special ability?', 'special_ability', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <?php
          echo form_input(array(
            'name' => 'special_ability',
            'type' => 'text',
            'value' => html_escape(set_value('special_ability',isset($result13)?$result13->special_ability :''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'special_ability',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('special_ability'); ?></span>
  </div>
  <div class="form-group">
        <?php echo form_label(' What are your hobbies?', 'hobbies', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <?php
          echo form_input(array(
            'name' => 'hobbies',
            'type' => 'text',
            'value' => html_escape(set_value('hobbies',isset($result13)?$result13->hobbies :''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'hobbies',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('hobbies'); ?></span>
  </div>
</div>
<!-- leftside -->

<!-- rightside -->
<div class="col-md-6 float-left">
  <div class="form-group">
      <?php echo form_label('Occupation', 'occupation', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'occupation')); ?>
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
      <?php echo form_label('Place of Employment or School', 'place_employment_school', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'place_employment_school')); ?>
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
      <?php echo form_label('Address of Employment or School', 'addr_employment_school', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'addr_employment_school')); ?>
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
  
  <div class="form-group">
      <?php echo form_label('Tel of Employment or School', 'tel_employment_school', array( 'class' => 'employment_text', 'id'=> '', 'style' => '', 'for' => 'tel_employment_school'));?>
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
      <?php echo form_label('Entrance Age to Elementary School', 'entry_age_ele_school', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'entry_age_ele_school')); ?>
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
      <?php echo form_label('Lastest Educational history School name', 'educational_school_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'educational_school_name')); ?>
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
      <?php echo form_label('Duration of JP Language study', 'duration_jp_language_study', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'duration_jp_language_study')); ?>
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
  
  <div class="form-group">
  <?php echo form_label('Passport', 'passport', array( 'class' => 'passport_text', 'id'=> '')); ?>
    <select name="passport" id="passport" class="admission_select">
          <option value="1" <?php if($result->passport== "1") {echo "selected";} ?>>Yes</option>
          <option value="0" <?php if($result->passport== "0") {echo "selected";} ?>>No</option>
    </select>
  </div>
  <div class="form-group">
      <?php echo form_label('Passport Number', 'passport_no', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'passport_no')); ?>
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
      <?php echo form_label('Date of issue', 'passport_data_issue', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'passport_data_issue')); ?>
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
      <?php echo form_label('Date of expiration', 'passport_data_exp', array( 'class' => '', 'id'=> 'passport_data_exp_ttl', 'style' => '', 'for' => 'passport_data_exp')); ?>
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
  <div class="form-group">
  <?php echo form_label('Blank period／Military service', 'military_service', array( 'class' => 'military_txt', 'id'=> '')); ?>
    <select name="military_service" id="military_service" class="admission_select">
          <option value="1" <?php if($result->military_service== "1") {echo "selected";} ?>>Yes</option>
          <option value="0" <?php if($result->military_service== "0") {echo "selected";} ?>>No</option>
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
      <?php echo form_label('Place to Apply for VISA', 'place_apply_visa', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'place_apply_visa')); ?>
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
          <option value="1" <?php if($result->accompanying_person== "1") {echo "selected";} ?>>Yes</option>
          <option value="0" <?php if($result->accompanying_person== "0") {echo "selected";} ?>>No</option>
    </select>
  </div>
  <div class="form-group">
      <?php echo form_label('Accompanying marital status', 'accompanying_marital_status', array( 'class' => '', 'id'=> 'accompanying_marital_status', 'style' => 'margin-bottom: 13px;', 'for' => 'accompanying_marital_status')); ?>
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
  <?php echo form_label('Did you apply before in Japan?', 'school_apply_before_japan', array( 'class' => 'form-control-label', 'id'=> '')); ?>
  <select name="school_apply_before_japan" id="school_apply_before_japan" class="admission_select">
          <option value="1" <?php if($result->school_apply_before_japan== "1") {echo "selected";} ?>>Yes</option>
          <option value="0" <?php if($result->school_apply_before_japan== "0") {echo "selected";} ?>>No</option>
    </select>
  </div>
  <div class="form-group">
      <?php echo form_label('when?', 'school_apply_date', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'school_apply_date')); ?>
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
      <?php echo form_label('status?', 'school_apply_status', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'school_apply_status')); ?>
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
      <?php echo form_label('Name of School?', 'school_apply_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'school_apply_name')); ?>
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
      <?php echo form_label('Which immigration office?', 'immigration_office', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phimmigration_officeone')); ?>
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
    <select name="immigration_result" class="admission_select">
        <option value="交付" <?php if($result->immigration_result== "交付") {echo "selected";} ?>>交付</option>
        <option value="不交付" <?php if($result->immigration_result== "不交付") {echo "selected";} ?>>不交付</option>
        <option value="取下げ" <?php if($result->immigration_result== "取下げ") {echo "selected";} ?>>取下げ</option>
        <option value="交付後の未入国" <?php if($result->immigration_result== "交付後の未入国") {echo "selected";} ?>>交付後の未入国</option>
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
  <?php echo form_label('Have you ever experienced COE rejection?', 'COE_reject', array( 'class' => 'form-control-label', 'id'=> '')); ?>
  <span class="badge badge-danger">Required</span>
    <select name="COE_reject" id="COE_reject" class="admission_select">
        <option value="1" <?php if($result->COE_reject== "1") echo "selected"; ?>>Yes</option>
        <option value="0" <?php if($result->COE_reject== "0") echo "selected"; ?>>No</option>
    </select>
  </div>
  <div class="form-group">
  <?php echo form_label('What language can you use?', 'language_can_you_use', array( 'class' => 'form-control-label', 'id'=> '')); ?>
  <?php
          echo form_input(array(
            'name' => 'language_can_you_use',
            'type' => 'text',
           'value' => html_escape(set_value('language_can_you_use',isset($result13)?$result13->language_can_you_use:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'language_can_you_use',
            'autocomplete' => ''));
  ?>
  <span class="text-danger"><?php echo form_error('language_can_you_use'); ?></span>
  </div>
  <div class="form-group">
  <?php echo form_label('What subjects are you good at?', 'you_are_good_subject', array( 'class' => 'form-control-label', 'id'=> '')); ?>
  <?php
          echo form_input(array(
            'name' => 'you_are_good_subject',
            'type' => 'text',
           'value' => html_escape(set_value('you_are_good_subject',isset($result13)?$result13->you_are_good_subject:''), ENT_QUOTES),
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
        <option value="1" <?php if($result->provide_english== "1") echo "selected"; ?>>Yes</option>
        <option value="0" <?php if($result->provide_english== "0") echo "selected"; ?>>No</option>
    </select>
  </div>
  <div class="form-group">
  <?php echo form_label('Are you allergic to any medicine or foods?', 'allergic_medicine', array( 'class' => 'form-control-label', 'id'=> 'allergic_medicine')); ?>
  <span class="badge badge-danger">Required</span>
    <select name="allergic_medicine" id="allergic_medicine" class="admission_select">
        <option value="1" <?php if($result13->allergic_medicine== "1") {echo "selected";} ?>>Yes</option>
        <option value="0" <?php if($result13->allergic_medicine== "0") {echo "selected";} ?>>No</option>
    </select>
  </div>
  <div class="form-group">
        <?php echo form_label('If you select ”Yes”, please tell us in detal about your allegy.', 'allergic_medicine_details', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
        <?php
          echo form_input(array(
            'name' => 'allergic_medicine_details',
            'type' => 'text',
            'value' => html_escape(set_value('will_you_return',isset($result13)?$result13->allergic_medicine_details:''), ENT_QUOTES),
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
          <option value="1" <?php if($result->criminal_record== "1") {echo "selected";} ?>>Yes</option>
          <option value="0" <?php if($result->criminal_record== "0") {echo "selected";} ?>>No</option>
      </select>
    </div>
   
<div class="criminal form-group float-left">
    <div class="">
    <?php echo form_label('Have you applied for Certificate of Eligibility?', 'eligibility_have', array( 'class' => 'form-control-label', 'id'=> '')); ?>
      <span class="badge badge-danger">Required</span>
    </div>
  
    <div class="">
        <div class="criminal_record01" style="float: left;">
        <select name="eligibility_have" id="eligibility_have" class="admission_select">
          <option value="1" <?php if($result->eligibility_have== "1") {echo "selected";} ?>>Yes</option>
          <option value="0" <?php if($result->eligibility_have== "0") {echo "selected";} ?>>No</option>
        </select>
        </div>
        <div
        <label class="col-rd cri_text"><span style="padding-left:30px ;margin-top: 7px;">Times</span>
            <?php
          echo form_input(array(
            'name' => 'eligibility_details',
            'type' => 'text',
            'placeholder' => 'Please Enter!',
            'value' => html_escape(set_value('eligibility_details',isset($result)?$result->eligibility_details:''), ENT_QUOTES),
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
  <?php echo form_label('Intended to enroll', 'intended_roll', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    <span class="badge badge-danger">Required</span>
    <select name="intended_roll" id="intended_roll" class="admission_select">
          <option value="1" <?php if($result13->intended_roll== "1") {echo "selected";} ?>>issued</option>
          <option value="0" <?php if($result13->intended_roll== "0") {echo "selected";} ?>>denied</option>
      </select>
</div>
<div class="form-group">
       <?php echo form_label('ビザの種類 type of visa', 'eligibility_visa', array( 'class' => 'form-control-label', 'id'=> '')); ?>
       <span class="badge badge-danger">Required</span>
       <select name="eligibility_visa" id="eligibility_visa" class="admission_select">
          <option value="Student" <?php if($result13->eligibility_visa== "Student") {echo "selected";} ?>>Student</option>
          <option value="Trainee" <?php if($result13->eligibility_visa== "Trainee") {echo "selected";} ?>>Trainee</option>
          <option value="Technical" <?php if($result13->eligibility_visa== "Technical") {echo "selected";} ?>>Technical</option>
          <option value="Others" <?php if($result13->eligibility_visa== "Others") {echo "selected";} ?>>Others</option>
        </select>
      </div> 
</div>



<div class="col-md-6 float-left">
 <div class="form-group">
    <p class="addmission">Language</p>
    
    <select name="family_language" class="school_select">
    <option value="" <?php if($result->family_language== "") echo "selected"; ?>>Please Select!</option>
    <option value="English" <?php if($result->family_language== "English") echo "selected"; ?>>English</option>
    <option value="Chinese" <?php if($result->family_language== "Chinese") echo "selected"; ?>>Chinese</option>
    <option value="Korean" <?php if($result->family_language== "Korean") echo "selected"; ?>>Korean</option>
    <option value="Thai" <?php if($result->family_language== "Thai") echo "selected"; ?>>Thai</option>
    <option value="Vietnamese" <?php if($result->family_language== "Vietnamese") echo "selected"; ?>>Vietnamese</option>
    <option value="Japanese" <?php if($result->family_language== "Japanese") echo "selected"; ?>>Japanese</option>
</select>
  </div>
  <!-- <div class="criminal_record02">
            <label class="col-rd cri_text"><span style="padding-left:4px ;">Details</span>
                <input type="text" class="details form-control col-md-12" name="criminal_record_details" value="" checked="checked">
            </label> 
        </div> -->
        <div class="form-group">
        <?php echo form_label('Details', 'criminal_record_details', array( 'class' => 'eli_text', 'id'=> 'criminal_record_details', 'style' => '', 'for' => 'criminal_record_details')); ?>
        <?php
          echo form_input(array(
            'name' => 'criminal_record_details',
            'type' => 'text',
            'value' => html_escape(set_value('criminal_record_details',isset($result)?$result->criminal_record_details:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'criminal_record_details',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('criminal_record_details'); ?></span>
  </div>
  <div class="criminal form-group float-left">
    <div class="">
    <?php echo form_label('Have you applied for Certificate of Eligibility?', 'criminal_record', array( 'class' => 'form-control-label', 'id'=> '')); ?>
      <span class="badge badge-danger">Required</span>
    </div>
  
    <div class="radio_record">
            <!-- <label class="col-rd cri_text"><span style="margin-top: 7px;">When:</span>
                <input type="text" class="details form-control col-md-8" name="criminal_record_details" value="" checked="checked" style="margin-left: 16px;margin-right: 0px;">
            </label>  -->
        <div class="">
        <label class="col-rd cri_text"><span style="margin-top: 7px;">When:</span>
        <?php
          echo form_input(array(
            'name' => 'criminal_record_when',
            'type' => 'date',
            'value' => html_escape(set_value('criminal_record_when',isset($result)?$result->criminal_record_when:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'criminal_record_when',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('criminal_record_when'); ?></span>
        </label>
        </div>
      
       <div class="" style=" padding-left: 22px;">
        <label class="col-rd cri_text"><span style="width: 85%;">Purpose of Entry:</span>
        <?php
          echo form_input(array(
            'name' => 'entry_purpose1',
            'type' => 'text',
            'value' => html_escape(set_value('entry_purpose1',isset($result)?$result->entry_purpose1:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'entry_purpose1',
            'autocomplete' => ''));
        ?>
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
  <span class="text-danger"><?php echo form_error('eligibility_non_issuance'); ?></span>
  </div>
<div class="form-group">
  <?php echo form_label('Issued / Denied Date', 'issued_date', array( 'class' => 'form-control-label', 'id'=> '')); ?>
  <?php
          echo form_input(array(
            'name' => 'issued_date',
            'type' => 'date',
            'value' => html_escape(set_value('issued_date',isset($result13)?$result13->issued_date:''), ENT_QUOTES),
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'issued_date',
            'autocomplete' => ''));
  ?>
  <span class="text-danger"><?php echo form_error('issued_date'); ?></span>
  </div>
  
</div>
<!-- co_leftside -->

<div class="criminal form-group float-left">
      <label>Purpose of studying in Japanese </label>
      <div class="col-md-12 col-sm-12 p-0">
          <?php 
            $data = array(
            'name' => 'purpose_studying_in_japanese',
            'type' => 'text',
            'placeholder' => 'Please Enter!',
            'class' => 'form-control',
            'id' => 'purpose_studying_in_japanese',
            'autocomplete' => '',
            'value' => set_value('purpose_studying_in_japanese',isset($result)?$result->purpose_studying_in_japanese:'')
          );
          echo form_textarea($data); ?>
          <span class="text-danger"><?php echo form_error('purpose_studying_in_japanese'); ?></span>
      </div>
      
</div>
<div class="col-md-6 float-left">
<h6 class="" style="padding: 33px 0px 12px;">Contact details of your family</h6>
<div class="form-group">
        <?php echo form_label('Email', 'family_mail', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'family_mail')); ?>
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
        <?php echo form_label('Phone Number', 'family_tel', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'family_tel')); ?>
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
        <?php echo form_label('Address','family_address', array('class' => '')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'family_address',
            'type' => 'text',
            'value' => html_escape(set_value('family_address',isset($result)?$result->family_address:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
            'class' => 'form-control',
            'id' => 'family_address',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('family_address'); ?></span>
       </div>
       <div class="form-group">
        <?php echo form_label('Name of the place where your father is working', 'father_work_place', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'father_work_place')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'father_work_place',
            'type' => 'text',
            'value' => html_escape(set_value('father_work_place',isset($result13)?$result13->father_work_place:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
            'class' => 'form-control',
            'id' => 'father_work_place',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('father_work_place'); ?></span>
       </div>
       <div class="form-group">
        <?php echo form_label('Type of work/post father','type_work_father', array('class' => '')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'type_work_father',
            'type' => 'text',
            'value' => html_escape(set_value('type_work_father',isset($result13)?$result13->type_work_father:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
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
            'value' => html_escape(set_value('mother_work_place',isset($result13)?$result13->mother_work_place:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
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
            'value' => html_escape(set_value('phone',isset($result13)?$result13->type_work_mother:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
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
            'value' => html_escape(set_value('consent_name',isset($result13)?$result13->consent_name:''), ENT_QUOTES),
            'placeholder' => 'Enter email account!',
            'class' => 'form-control',
            'id' => 'consent_name',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('family_mail'); ?></span>
       </div>

       <div class="form-group">
        <?php echo form_label('Relation', 'consent_relation', array( 'class' => '', 'id'=> '')); ?>
          <select name="consent_relation" id="consent_relation" class="admission_select">
              <option value="father" <?php if($result13->consent_relation== "father") {echo "selected";} ?>>Father</option>
              <option value="mother" <?php if($result13->consent_relation== "mother") {echo "selected";} ?>>Mother</option>
              <option value="brother" <?php if($result13->consent_relation== "brother") {echo "selected";} ?>>Brother/Sister</option>
              <option value="other" <?php if($result13->consent_relation== "other") {echo "selected";} ?>>Others</option>
          </select>
      </div>

    <div class="form-group">
        <?php echo form_label('Address','consent_address', array('class' => '')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'consent_address',
            'type' => 'text',
            'value' => html_escape(set_value('consent_address ',isset($result13)?$result13->consent_address:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
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
            'value' => html_escape(set_value('consent_email',isset($result13)?$result13->consent_email:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
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
            'value' => html_escape(set_value('consent_tel',isset($result13)?$result13->consent_tel:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
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
<h6 class="" style="padding: 33px 0px 12px;">Written Oath for Defraying Expenses</h6>
<div class="form-group">
        <?php echo form_label('Tuition for 6 months', 'six_tuition_fee', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_email')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'six_tuition_fee',
            'type' => 'text',
            'value' => html_escape(set_value('six_tuition_fee',isset($result13)?$result13->six_tuition_fee:''), ENT_QUOTES),
            'placeholder' => 'Enter email account!',
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
            'value' => html_escape(set_value('first_year_tuitioin_fee',isset($result13)?$result13->first_year_tuitioin_fee:''), ENT_QUOTES),
            'placeholder' => 'Enter phone number!',
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
            'value' => html_escape(set_value('second_year_tuitioin_fee',isset($result13)?$result13->second_year_tuitioin_fee:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
            'class' => 'form-control',
            'id' => 'second_year_tuitioin_fee',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('second_year_tuitioin_fee'); ?></span>
       </div>
       <div class="form-group">
        <?php echo form_label(' Period Studying','tuition_study_period', array('class' => 'col-form-labels')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'tuition_study_period',
            'type' => 'text',
            'value' => html_escape(set_value('tuition_study_period',isset($result13)?$result13->tuition_study_period:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
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
            'value' => html_escape(set_value('living_expense_amount',isset($result13)?$result13->living_expense_amount:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
            'class' => 'form-control',
            'id' => 'living_expense_amount',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('living_expense_amount'); ?></span>
       </div>
       <div class="form-group">
        <?php echo form_label('Method of payment', 'payment_method', array( 'class' => '', 'id'=> '')); ?>
          <select name="payment_method" id="payment_method" class="admission_select">
              <option value="Bank Transfer (Overseas Remittance)" <?php if($result13->payment_method== "Bank Transfer (Overseas Remittance)") {echo "selected";} ?>>Bank Transfer (Overseas Remittance)</option>
              <option value="Credit Card" <?php if($result13->payment_method== "Credit Card") {echo "selected";} ?>>Credit Card</option>
              <option value="Others" <?php if($result13->payment_method== "Others") {echo "selected";} ?>>Others</option>
          </select>
      </div>
      <div class="form-group">
        <?php echo form_label('Below please explain in detail the circumstances for your defraying the costs of the
applicant and your relationship to the applicant.','defraying_details', array('class' => '')); ?>
        <?php
          echo form_input(array(
            'name' => 'defraying_details',
            'type' => 'text',
            'value' => html_escape(set_value('defraying_details ',isset($result13)?$result13->defraying_details:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
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
            'value' => html_escape(set_value('defraying_name',isset($result13)?$result13->defraying_name:''), ENT_QUOTES),
            'placeholder' => 'Enter email account!',
            'class' => 'form-control',
            'id' => 'defraying_name',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('defraying_name'); ?></span>
       </div>

       <div class="form-group">
        <?php echo form_label('Relation', 'defraying_relation', array( 'class' => '', 'id'=> '')); ?>
          <select name="defraying_relation" id="defraying_relation" class="admission_select">
              <option value="father" <?php if($result13->defraying_relation== "father") {echo "selected";} ?>>Father</option>
              <option value="mother" <?php if($result13->defraying_relation== "mother") {echo "selected";} ?>>Mother</option>
              <option value="brother" <?php if($result13->defraying_relation== "brother") {echo "selected";} ?>>Brother/Sister</option>
              <option value="other" <?php if($result13->defraying_relation== "other") {echo "selected";} ?>>Others</option>
          </select>
      </div>

    <div class="form-group">
        <?php echo form_label('Tel','defraying_tel', array('class' => '')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'defraying_tel',
            'type' => 'text',
            'value' => html_escape(set_value('defraying_tel',isset($result13)?$result13->defraying_tel:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
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
            'value' => html_escape(set_value('defraying_address',isset($result13)?$result13->defraying_address:''), ENT_QUOTES),
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
            'value' => html_escape(set_value('defraying_company',isset($result13)?$result13->defraying_company:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
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
            'value' => html_escape(set_value('defraying_work_tel',isset($result13)?$result13->defraying_work_tel:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
            'class' => 'form-control',
            'id' => 'defraying_work_tel',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('defraying_work_tel'); ?></span>
       </div>
       <!-- <div class="form-group">
        <?php echo form_label('Signature','defraying_sign', array('class' => '')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'defraying_sign',
            'type' => 'text',
            'value' => html_escape(set_value('defraying_sign',isset($result13)?$result13->defraying_sign:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
            'class' => 'form-control',
            'id' => 'defraying_sign',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('defraying_sign'); ?></span>
       </div> -->
       <div class="form-group">
        <?php echo form_label('Date','defraying_date', array('class' => '')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'defraying_date',
            'type' => 'date',
            'value' => html_escape(set_value('defraying_date',isset($result13)?$result13->defraying_date:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
            'class' => 'form-control',
            'id' => 'defraying_date',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('defraying_date'); ?></span>
       </div>
</div>
<!-- co_leftside -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

let educationHistory = $('#edu_history tbody tr:last-child .rowID').text();
let previous_jp = $('#previousJp tbody tr:last-child .rowID').text();
let achievement_jp = $('#achievementJp tbody tr:last-child .rowID').text();
let jpLangGoing = $('#going_to_take tbody tr:last-child .rowID').text();
let employment_history = $('#employHistory tbody tr:last-child .rowID').text();
let family_member = $('#familyMember tbody tr:last-child .rowID').text();
let family_inJP = $('#familyInJp tbody tr:last-child .rowID').text();
let previous_stay = $('#preStayInJP tbody tr:last-child .rowID').text();
//  Add  Row
$(function() {
$('#addNewRow01').click(function(e) {
            e.preventDefault();
            console.log(true);
            educationHistory++;
            console.log(educationHistory);
            const cloned = $('#edu_history tbody tr:last-child').clone();
            cloned.find("input").val("");
            cloned.find("#edu_name").val("");
            $('#edu_history tbody tr:last-child').after(cloned);
          });
$('#addNewRow02').click(function(e) {
            e.preventDefault();
            console.log(true);
            previous_jp++;
            console.log(previous_jp);
            const cloned = $('#previousJp tbody tr:last-child').clone();
            cloned.find("input").val("");
            cloned.find("#jp_name").val("");
            $('#previousJp tbody tr:last-child').after(cloned);
          });
$('#addNewRow03').click(function(e) {
            e.preventDefault();
            console.log(true);
            achievement_jp++;
            console.log(achievement_jp);
            const cloned = $('#achievementJp tbody tr:last-child').clone();
            cloned.find("input").val("");
            cloned.find("#achiv_name").val("");
            $('#achievementJp tbody tr:last-child').after(cloned);
          });    
$('#addNewRow04').click(function(e) {
            e.preventDefault();
            console.log(true);
            jpLangGoing++;
            console.log(jpLangGoing);
            const cloned = $('#going_to_take tbody tr:last-child').clone();
            cloned.find("input").val("");
            cloned.find("#going_name").val("");
            $('#going_to_take tbody tr:last-child').after(cloned);
          });   
$('#addNewRow05').click(function(e) {
            e.preventDefault();
            console.log(true);
            family_member++;
            console.log(employHistory);
            const cloned = $('#employHistory tbody tr:last-child').clone();
            cloned.find("input").val("");
            cloned.find("#emp_name").val("");
            $('#employHistory tbody tr:last-child').after(cloned);
          });
$('#addNewRow06').click(function(e) {
            e.preventDefault();
            console.log(true);
            family_member++;
            console.log(family_member);
            const cloned = $('#familyMember tbody tr:last-child').clone();
            cloned.find("input").val("");
            cloned.find("#fam_name").val("");
            $('#familyMember tbody tr:last-child').after(cloned);
          });
$('#addNewRow07').click(function(e) {
            e.preventDefault();
            console.log(true);
            family_inJP++;
            console.log(family_inJP);
            const cloned = $('#familyInJp tbody tr:last-child').clone();
            cloned.find("input").val("");
            cloned.find("#ja_fam_name").val("");
            $('#familyInJp tbody tr:last-child').after(cloned);
          });    
$('#addNewRow08').click(function(e) {
            e.preventDefault();
            console.log(true);
            previous_stay++;
            console.log(previous_stay);
            const cloned = $('#preStayInJP tbody tr:last-child').clone();
            cloned.find("input").val("");
            cloned.find("#entry_date").val("");
            $('#preStayInJP tbody tr:last-child').after(cloned);
          });   
 
});
//  Add  Row 
//  Remove  Row
$(function() {
$('#removeRow01').on('click', function(e) {
            e.preventDefault();
            let dataLength = $('#edu_history tbody tr').length;
            let $itemChecked = $('.productCheck:checked');       
            let rowID = $('.rowID');
            let serial_no = [];
            if (dataLength > 1 && (dataLength != $itemChecked.length)) {
                $itemChecked.each(function() {
                    let dataItem = $(this).data('item');
                    let productName = $(`.productItem[data-item='${dataItem}']`).val();
                        if (productName != '') {
                          educationHistory--;
                        $(this).closest('tr').remove();
                        let dataNewLength = $('#edu_history tbody tr').length;
                        for (var i = 0; i <= rowID.length; i++) {
                            serial_no.push(i + 1);
                        }
                      }
                      
                      });
                      };
                        
});
$('#removeRow02').on('click', function(e) {
            e.preventDefault();
            let dataLength = $('#previousJp tbody tr').length;
            let $itemChecked = $('.productCheck:checked');       
            let rowID = $('.rowID');
            let serial_no = [];
            if (dataLength > 1 && (dataLength != $itemChecked.length)) {
                $itemChecked.each(function() {
                    let dataItem = $(this).data('item');
                    let productName = $(`.productItem[data-item='${dataItem}']`).val();
                        if (productName != '') {
                          previous_jp--;
                        $(this).closest('tr').remove();
                        let dataNewLength = $('#previousJp tbody tr').length;
                        for (var i = 0; i <= rowID.length; i++) {
                            serial_no.push(i + 1);
                        }
                      }
                      
                      });
                      };
                        
});
$('#removeRow03').on('click', function(e) {
            e.preventDefault();
            let dataLength = $('#achievementJp tbody tr').length;
            let $itemChecked = $('.productCheck:checked');       
            let rowID = $('.rowID');
            let serial_no = [];
            if (dataLength > 1 && (dataLength != $itemChecked.length)) {
                $itemChecked.each(function() {
                    let dataItem = $(this).data('item');
                    let productName = $(`.productItem[data-item='${dataItem}']`).val();
                        if (productName != '') {
                          achievement_jp--;
                        $(this).closest('tr').remove();
                        let dataNewLength = $('#achievementJp tbody tr').length;
                        for (var i = 0; i <= rowID.length; i++) {
                            serial_no.push(i + 1);
                        }
                      }
                      
                      });
                      };
                        
});
$('#removeRow04').on('click', function(e) {
            e.preventDefault();
            let dataLength = $('#going_to_take tbody tr').length;
            let $itemChecked = $('.productCheck:checked');       
            let rowID = $('.rowID');
            let serial_no = [];
            if (dataLength > 1 && (dataLength != $itemChecked.length)) {
                $itemChecked.each(function() {
                    let dataItem = $(this).data('item');
                    let productName = $(`.productItem[data-item='${dataItem}']`).val();
                        if (productName != '') {
                          jpLangGoing--;
                        $(this).closest('tr').remove();
                        let dataNewLength = $('#going_to_take tbody tr').length;
                        for (var i = 0; i <= rowID.length; i++) {
                            serial_no.push(i + 1);
                        }
                      }
                      
                      });
                      };
                        
});
$('#removeRow05').on('click', function(e) {
            e.preventDefault();
            let dataLength = $('#employHistory tbody tr').length;
            let $itemChecked = $('.productCheck:checked');       
            let rowID = $('.rowID');
            let serial_no = [];
            if (dataLength > 1 && (dataLength != $itemChecked.length)) {
                $itemChecked.each(function() {
                    let dataItem = $(this).data('item');
                    let productName = $(`.productItem[data-item='${dataItem}']`).val();
                        if (productName != '') {
                          employment_history--;
                        $(this).closest('tr').remove();
                        let dataNewLength = $('#employHistory tbody tr').length;
                        for (var i = 0; i <= rowID.length; i++) {
                            serial_no.push(i + 1);
                        }
                      }
                      
                      });
                      };
                        
});
$('#removeRow06').on('click', function(e) {
            e.preventDefault();
            let dataLength = $('#familyMember tbody tr').length;
            let $itemChecked = $('.productCheck:checked');       
            let rowID = $('.rowID');
            let serial_no = [];
            if (dataLength > 1 && (dataLength != $itemChecked.length)) {
                $itemChecked.each(function() {
                    let dataItem = $(this).data('item');
                    let productName = $(`.productItem[data-item='${dataItem}']`).val();
                        if (productName != '') {
                          family_member--;
                        $(this).closest('tr').remove();
                        let dataNewLength = $('#familyMember tbody tr').length;
                        for (var i = 0; i <= rowID.length; i++) {
                            serial_no.push(i + 1);
                        }
                      }
                      
                      });
                      };
                        
});
$('#removeRow07').on('click', function(e) {
            e.preventDefault();
            let dataLength = $('#familyInJp tbody tr').length;
            let $itemChecked = $('.productCheck:checked');       
            let rowID = $('.rowID');
            let serial_no = [];
            if (dataLength > 1 && (dataLength != $itemChecked.length)) {
                $itemChecked.each(function() {
                    let dataItem = $(this).data('item');
                    let productName = $(`.productItem[data-item='${dataItem}']`).val();
                        if (productName != '') {
                          family_inJP--;
                        $(this).closest('tr').remove();
                        let dataNewLength = $('#familyInJp tbody tr').length;
                        for (var i = 0; i <= rowID.length; i++) {
                            serial_no.push(i + 1);
                        }
                      }
                      
                      });
                      };
                        
});
$('#removeRow08').on('click', function(e) {
            e.preventDefault();
            let dataLength = $('#preStayInJP tbody tr').length;
            let $itemChecked = $('.productCheck:checked');       
            let rowID = $('.rowID');
            let serial_no = [];
            if (dataLength > 1 && (dataLength != $itemChecked.length)) {
                $itemChecked.each(function() {
                    let dataItem = $(this).data('item');
                    let productName = $(`.productItem[data-item='${dataItem}']`).val();
                        if (productName != '') {
                          previous_stay--;
                        $(this).closest('tr').remove();
                        let dataNewLength = $('#preStayInJP tbody tr').length;
                        for (var i = 0; i <= rowID.length; i++) {
                            serial_no.push(i + 1);
                        }
                      }
                      
                      });
                      };
                        
});
});
//  Remove  Row
 </script> 

<!-- Name of Course -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(function() {  
  const courseNameSelector = (course_name) =>{
      if(course_name =="進学２年コ－ス"){
         $('.two_yrs_crs').show();
         $('.oneyrs_ninemths_crs').hide();
         $('.oneyrs_fivemths_crs').hide();
         $('.oneyrs_threemths_crs').hide();
         $('.one_yrs_course').hide();
        }else if(course_name =="進学1年9ヶ月コ－ス"){
         $('.two_yrs_crs').hide();
         $('.oneyrs_ninemths_crs').show();
         $('.oneyrs_fivemths_crs').hide();
         $('.oneyrs_threemths_crs').hide();
         $('.one_yrs_course').hide();
      }else if(course_name =="進学１.５年コ－ス"){
         $('.two_yrs_crs').hide();
         $('.oneyrs_ninemths_crs').hide();
         $('.oneyrs_fivemths_crs').show();
         $('.oneyrs_threemths_crs').hide();
         $('.one_yrs_course').hide();
      }else if(course_name =="進学1年3ヶ月コ－ス"){
         $('.two_yrs_crs').hide();
         $('.oneyrs_ninemths_crs').hide();
         $('.oneyrs_fivemths_crs').hide();
         $('.oneyrs_threemths_crs').show();
         $('.one_yrs_course').hide();
      }else if(course_name =="進学１年コ－ス"){
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
    }

    $("#select_name_of_course").change(function() {
       const courseName = $('option:selected', this).text();
       courseNameSelector(courseName);

    });
    const selectCourseName = '<?php echo $result13->select_name_of_course; ?>';
     if(selectCourseName){
      courseNameSelector(selectCourseName);
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
  <select name="select_name_of_course" id="select_name_of_course" class="course_select">
    <option value="">Please Select!</option>
    <option value="進学２年コ－ス" <?php if($result13->select_name_of_course== "進学２年コ－ス") {echo "selected";} ?>>進学２年コ－ス</option>
    <option value="進学1年9ヶ月コ－ス" <?php if($result13->select_name_of_course== "進学1年9ヶ月コ－ス") {echo "selected";} ?>>進学1年9ヶ月コ－ス</option>
    <option value="進学１.５年コ－ス" <?php if($result13->select_name_of_course== "進学１.５年コ－ス") {echo "selected";} ?>>進学１.５年コ－ス</option>
    <option value="進学1年3ヶ月コ－ス" <?php if($result13->select_name_of_course== "進学1年3ヶ月コ－ス") {echo "selected";} ?>>進学1年3ヶ月コ－ス</option>
    <option value="進学１年コ－ス" <?php if($result13->select_name_of_course== "進学１年コ－ス") {echo "selected";} ?>>進学１年コ－ス</option>
  </select>
</div>
<p style="border-bottom:none !important;border-top:none !important;" class="two_yrs_crs">
    <span>２－Year course</span>
    <span>２０
    <?php
          echo form_input(array(
            'name' => 'twyrs_crs_start_date',
            'type' => 'text',
            'value' => html_escape(set_value('twyrs_crs_start_date',isset($result13)?$result13->twyrs_crs_start_date:''), ENT_QUOTES),
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
            'value' => html_escape(set_value('twyrs_crs_end_date',isset($result13)?$result13->twyrs_crs_end_date:''), ENT_QUOTES),
            'class' => '',
            'id' => 'twyrs_crs_end_date',
            'style' => 'width:5%',
            'autocomplete' => ''));
        ?> 年０３月</span>
</p>
<p style="border-bottom:none !important;border-top:none !important;" class="oneyrs_ninemths_crs">
    <span>1 Year and 9 Months course</span>
    <span>２０ <?php
          echo form_input(array(
            'name' => 'onenine_crs_start_date',
            'type' => 'text',
            'value' => html_escape(set_value('onenine_crs_start_date',isset($result13)?$result13->onenine_crs_start_date:''), ENT_QUOTES),
            'class' => '',
            'id' => 'onenine_crs_start_date',
            'style' => 'width:5%',
            'autocomplete' => ''));
        ?> 年０７月 -- ２０ <?php
        echo form_input(array(
          'name' => 'onenine_crs_end_date',
          'type' => 'text',
          'value' => html_escape(set_value('onenine_crs_end_date',isset($result13)?$result13->onenine_crs_end_date:''), ENT_QUOTES),
          'class' => '',
          'id' => 'onenine_crs_end_date',
          'style' => 'width:5%',
          'autocomplete' => ''));
      ?>年０３月</span>
</p>
<p style="border-bottom:none !important;border-top:none !important;" class="oneyrs_fivemths_crs">
    <span>1.5－Year course</span>
    <span>２０ <?php
          echo form_input(array(
            'name' => 'onefive_crs_start_date',
            'type' => 'text',
            'value' => html_escape(set_value('onefive_crs_start_date',isset($result13)?$result13->onefive_crs_start_date:''), ENT_QUOTES),
            'class' => '',
            'id' => 'onefive_crs_start_date',
            'style' => 'width:5%',
            'autocomplete' => ''));
        ?>年１０月 -- ２０ <?php
        echo form_input(array(
          'name' => 'onefive_crs_end_date',
          'type' => 'text',
          'value' => html_escape(set_value('onefive_crs_end_date',isset($result13)?$result13->onefive_crs_end_date:''), ENT_QUOTES),
          'class' => '',
          'id' => 'onefive_crs_end_date',
          'style' => 'width:5%',
          'autocomplete' => ''));
      ?>年０３月</span>
</p>
<p style="border-bottom:none !important;border-top:none !important;" class="oneyrs_threemths_crs">
    <span>1 Year and 3 Months course</span>
    <span>２０  <?php
          echo form_input(array(
            'name' => 'onethree_crs_start_date',
            'type' => 'text',
            'value' => html_escape(set_value('onethree_crs_start_date',isset($result13)?$result13->onethree_crs_start_date:''), ENT_QUOTES),
            'class' => '',
            'id' => 'onethree_crs_start_date',
            'style' => 'width:5%',
            'autocomplete' => ''));
        ?> 年０１月 -- ２０ <?php
        echo form_input(array(
          'name' => 'onethree_crs_end_date',
          'type' => 'text',
          'value' => html_escape(set_value('onethree_crs_end_date',isset($result13)?$result13->onethree_crs_end_date:''), ENT_QUOTES),
          'class' => '',
          'id' => 'onethree_crs_end_date',
          'style' => 'width:5%',
          'autocomplete' => ''));
      ?> 年０３月</span>
</p>
<p style="border-bottom:none !important;border-top:none !important;" class="one_yrs_course">
    <span>１－Year course<?php
          echo form_input(array(
            'name' => 'one_crs_start_date',
            'type' => 'text',
            'value' => html_escape(set_value('one_crs_start_date',isset($result13)?$result13->one_crs_start_date:''), ENT_QUOTES),
            'class' => '',
            'id' => 'one_crs_start_date',
            'style' => 'width:5%',
            'autocomplete' => ''));
        ?> 年０４月 -- ２０ <?php
        echo form_input(array(
          'name' => 'one_crs_end_date',
          'type' => 'text',
          'value' => html_escape(set_value('one_crs_end_date',isset($result13)?$result13->one_crs_end_date:''), ENT_QUOTES),
          'class' => '',
          'id' => 'one_crs_end_date',
          'style' => 'width:5%',
          'autocomplete' => ''));
      ?>年０３月</span>
</p>
</div>
<!-- Name of Course -->

<style>
.align-middle span>.btn:hover{
    color:#ffffff;
  }
</style>


<script>
$(function() {      
     const futurePlanSelector = (future_plan) =>{
      if(future_plan =="A. 進学 Advancing to higher education"){
        $('.drop_checkbox').show();
        $('.specify').hide();
      }else if(future_plan =="D. その他 < Other> (Specify)"){
        $('.drop_checkbox').hide();
        $('.specify').show();
      }else{
        $('.drop_checkbox').hide();
        $('.specify').hide();
      }
     }
     $("#future_plan_after_graduating").change(function() {
       const futurePlanName = $('option:selected', this).text();
       futurePlanSelector(futurePlanName);

    });
    const selectfuturePlan = '<?php echo $result13->future_plan_after_graduating; ?>';
     if(selectfuturePlan){
      futurePlanSelector(selectfuturePlan);
     }else{
      $('.drop_checkbox').hide();
      $('.specify').hide();
     }
});
$(function() {  
     const afterGraduating = (graduate_plan) =>{
       if(graduate_plan =="shizuoka"){
         $('#specific_plans').hide();
         $('#future_plan').show();
        }else if(graduate_plan =="ECC"){
          $('#specific_plans').show();
          $('#future_plan').hide();
      }else if(graduate_plan =="JCLI"){
          $('#specific_plans').show();
          $('#future_plan').hide();
      }else if(graduate_plan =="OJLS"){
          $('#specific_plans').show();
          $('#future_plan').hide();
      }else if(graduate_plan =="fukuoka"){
          $('#specific_plans').show();
          $('#future_plan').hide();
      }else{
         $('#specific_plans').hide();
         $('#future_plan').hide();
      }
    }
    $("#jls_name").change(function() {
       const specificPlanName = $('option:selected', this).text();
       afterGraduating(specificPlanName);

    });
    const selectspecificPlan = '<?php echo $result->jls_name; ?>';
     if(selectspecificPlan){
      afterGraduating(selectspecificPlan);
     }else{
      $('#specific_plans').hide();
      $('#future_plan').hide();
     }
});
</script>
<div class="col-md-12 float-left" style="padding-bottom: 15px;display:none;" id="future_plan">
<h6 class="" style="padding: 33px 0px 12px;"> この学校を卒業した後の予定 < Future plan after graduating from this school.></h6>
<div class="form-group">
  <select name="future_plan_after_graduating" id="future_plan_after_graduating" class="course_select">
    <option value="">Please Select!</option>
    <option value="A. 進学 Advancing to higher education" <?php if($result13->future_plan_after_graduating== "A. 進学 Advancing to higher education") {echo "selected";} ?>>A. 進学 Advancing to higher education</option>
    <option value="B. 就職 Planning to work" <?php if($result13->future_plan_after_graduating== "B. 就職 Planning to work") {echo "selected";} ?>>B. 就職 Planning to work</option>
    <option value="C. 帰国 Returning home" <?php if($result13->future_plan_after_graduating== "C. 帰国 Returning home") {echo "selected";} ?>>C. 帰国 Returning home</option>
    <option value="D. その他 < Other> (Specify)" <?php if($result13->future_plan_after_graduating== "D. その他 < Other> (Specify)") {echo "selected";} ?>>D. その他 < Other> (Specify)</option>
  </select>
</div>
<div class="drop_checkbox">
<select name="future_plan_checkdata01" id="future_plan_checkdata01" class="course_select">
    <option value="">Please Select!</option>
    <option value="大学院( Master's degree / Doctoral course)" <?php if($result13->future_plan_checkdata01== "大学院( Master's degree / Doctoral course)") {echo "selected";} ?>>大学院( Master's degree / Doctoral course)</option>
    <option value="短期大学( Junior College )" <?php if($result13->future_plan_checkdata01== "短期大学( Junior College )") {echo "selected";} ?>>短期大学( Junior College )</option>
    <option value="大学( Undergraduate(Bachelor) )" <?php if($result13->future_plan_checkdata01== "大学( Undergraduate(Bachelor) )") {echo "selected";} ?>>大学( Undergraduate(Bachelor) )</option>
    <option value="専門学校( Vocational School )" <?php if($result13->future_plan_checkdata01== "専門学校( Vocational School )") {echo "selected";} ?>>専門学校( Vocational School )</option>
    <option value="その他 ( Other )" <?php if($result13->future_plan_checkdata01== "その他 ( Other )") {echo "selected";} ?>>その他 ( Other )</option>
</select>
</div>
<div class="specify">
  <?php
      echo form_input(array(
        'name' => 'spec_other',
        'type' => 'text',
        'value' => html_escape(set_value('spec_other',isset($result13)?$result13->spec_other:''), ENT_QUOTES),
        'class' => 'form-control',
        'id' => 'spec_other',
        'placeholder' => '-',
        'style' => 'width:49%;',
        'autocomplete' => ''));
    ?>
  </div>
</div>







<!-- Table -->
<div class="col-md-12 float-left">
<h6 class="" style="padding: 33px 0px 12px;">Educational History : from Elementary School to the Most Recent School</h6>
<div class="tbl">
<table class="table-bordered" name="applicant_id"  id="edu_history">
  <thead class="tbl_head" >
    <tr>
    <th></th>
      <th>Name of institution</th>
      <th>Address</th>
      <th>Starting <br>Year/Month  </th>
      <th >Finishing <br>Year/Month </th>
      <th>Term of Study</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $x=1;
        $y=0;
        // var_dump($lists3['edu_name']);
          foreach($result4 as $row){
  ?>   
    <tr>
    <td class="text-center">
       <input type="checkbox" name="productCheck[]" class="productCheck" data-item="1">
  </td>
      <td class="rowID">
      <?php
          echo form_input(array(
            'name' => 'edu_name[]',
            'type' => 'text',
            'value' => html_escape(set_value('edu_name',isset($row)?$row->edu_name:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'edu_name',
            'autocomplete' => ''));
        ?>
      </td>
      <td class="rowID">
      <?php
          echo form_input(array(
            'name' => 'edu_address[]',
            'type' => 'text',
            'value' => html_escape(set_value('edu_address',isset($row)?$row->address:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'edu_address',
            'autocomplete' => ''));
        ?>
      </td>
      <td class="rowID" style="text-align:center;">
      <?php
          echo form_input(array(
            'name' => 'edu_start_date[]',
            'type' => 'month',
            'value' => html_escape(set_value('edu_start_date',isset($row)?$row->start_date:''), ENT_QUOTES),
            'class' => 'table-control productItem strEnd',
            'id' => 'edu_start_date',
            'autocomplete' => ''));
        ?>
      </td>
      <td class="rowID" style="text-align:center;">
      <?php
          echo form_input(array(
            'name' => 'edu_end_date[]',
            'type' => 'month',
            'value' => html_escape(set_value('edu_end_date',isset($row)?$row->end_date:''), ENT_QUOTES),
            'class' => 'table-control productItem strEnd',
            'id' => 'edu_end_date',
            'autocomplete' => ''));
        ?>
      </td>
      <td class="rowID">
      <?php
          echo form_input(array(
            'name' => 'edu_year[]',
            'type' => 'text',
            'value' => html_escape(set_value('edu_year',isset($row)?$row->year:''), ENT_QUOTES),
            'class' => 'table-control productItem term',
            'id' => 'edu_year',
            'autocomplete' => ''));
        ?>
        <span class="study_year">year</span> 
      </td>
    </tr>
    <?php }
    ?>
  </tbody>
  
</table>
<table class="table-bordered" name="applicant_id">
<tr>
<th scope="row" colspan="9" class="align-middle" style="padding: 3px;">
      <span class="float-left">
        <a class="btn btn-sm btn-outline-secondary px-2 rounded-1 overlay" id="addNewRow01" style="font-size: 0.8rem;"><strong><i class="fas fa-plus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">add_circle</span>Add row</a>
        <a class="btn btn-sm btn-outline-danger px-2 rounded-1 overlay" id="removeRow01" style="font-size: 0.8rem;"><strong><i class="fas fa-minus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">delete</span>Remove</a>
      </span>
</th>
</tr>
</table>
</div>
       
</div>
<!-- Table -->
<div class="col-md-6 float-left">
<div class="form-group ">
      <?php echo form_label('Registered enrollment', 'registered_enrollment', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'registered_enrollment')); ?>
      <?php
        echo form_input(array(
          'name' => 'registered_enrollment',
          'type' => 'text',
          'value' => html_escape(set_value('registered_enrollment',isset($result13)?$result13->registered_enrollment:''), ENT_QUOTES),
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
          'value' => html_escape(set_value('total_period_edu',isset($result13)?$result13->total_period_edu:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'total_period_edu',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('total_period_edu'); ?></span>
  </div>        
</div>
<!-- Table -->
<div class="col-md-12 float-left">
<h6 class="" style="padding: 33px 0px 12px;">Previous Japanese Language Study</h6>
<select name="jplearn_experience" id="jplearn_experience" class="admission_select" style="margin-bottom: 1rem;";>
        <option value="1" <?php if($result->jplearn_experience== "1") {echo "selected";} ?>>Yes</option>
        <option value="0" <?php if($result->jplearn_experience== "0") {echo "selected";} ?>>No</option>
</select>
<div class="tbl">
<table class="table-bordered" name="applicant_id" id="previousJp">
  <thead class="tbl_head">
    <tr>
    <th></th>
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
        // var_dump($lists3['edu_name']);
          foreach($result5 as $row1){
  ?>   
  <tr>
  <td class="text-center">
       <input type="checkbox" name="productCheck[]" class="productCheck" data-item="1">
  </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'jp_name[]',
            'type' => 'text',
            'value' => html_escape(set_value('jp_name',isset($result)?$row1->jp_name:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'jp_name',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'jp_level[]',
            'type' => 'text',
            'value' => html_escape(set_value('jp_level',isset($result)?$row1->jp_level:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'jp_level',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
        <div class="">
         <select name="jp_status[]" class="table-control col-md-12">
          <option value="0" <?php if($row1->jp_status== "") {echo "selected";} ?>></option>
          <option value="1" <?php if($row1->jp_status== "1") {echo "selected";} ?>>Completed</option>
          <option value="0" <?php if($row1->jp_status== "0") {echo "selected";} ?>>Still studying</option>
        </select>
        </div>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'jp_address[]',
            'type' => 'text',
            'value' => html_escape(set_value('jp_address',isset($result)?$row1->address:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'jp_address',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID"  style="text-align:center;">
      <?php
          echo form_input(array(
            'name' => 'jp_start_date[]',
            'type' => 'month',
            'value' => html_escape(set_value('jp_start_date',isset($result)?$row1->start_date:''), ENT_QUOTES),
            'class' => 'table-control productItem strEnd',
            'id' => 'jp_start_date',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID"  style="text-align:center;">
      <?php
          echo form_input(array(
            'name' => 'jp_end_date[]',
            'type' => 'month',
            'value' => html_escape(set_value('jp_end_date',isset($result)?$row1->end_date:''), ENT_QUOTES),
            'class' => 'table-control productItem strEnd',
            'id' => 'jp_end_date',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'jp_hour[]',
            'type' => 'text',
            'value' => html_escape(set_value('jp_hour',isset($result)?$row1->hour:''), ENT_QUOTES),
            'class' => 'table-control productItem term',
            'id' => 'jp_hour',
            'autocomplete' => ''));
        ?>
      <span class="study_year">hour</span> 
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'jp_year[]',
            'type' => 'text',
            'value' => html_escape(set_value('jp_year',isset($result)?$row1->jp_year:''), ENT_QUOTES),
            'class' => 'table-control productItem term',
            'id' => 'jp_year',
            'autocomplete' => ''));
        ?>
      <span class="study_year">year</span> 
      </td>
    </tr>
    <?php }
    ?>
  </tbody>
</table>
<table class="table-bordered" name="applicant_id">
<tr>
<th scope="row" colspan="9" class="align-middle" style="padding: 3px;">
      <span class="float-left">
        <a class="btn btn-sm btn-outline-secondary px-2 rounded-1 overlay" id="addNewRow02" style="font-size: 0.8rem;"><strong><i class="fas fa-plus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">add_circle</span>Add row</a>
        <a class="btn btn-sm btn-outline-danger px-2 rounded-1 overlay" id="removeRow02" style="font-size: 0.8rem;"><strong><i class="fas fa-minus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">delete</span>Remove</a>
      </span>
</th>
</tr>
</table>
</div>

</div>
<!-- Table -->


<div class="col-md-8 float-left">
<h6 class="" style="padding: 33px 0px 12px;">Achievement in JP language tests</h6>
<p>Japanese Language Proficiency </p>
<select name="jplearn_achievement" id="jplearn_achievement" class="admission_select" style="margin-bottom: 1rem;";>
        <option value="1" <?php if($result->jplearn_achievement== "1") {echo "selected";} ?>>Yes</option>
        <option value="0" <?php if($result->jplearn_achievement== "0") {echo "selected";} ?>>No</option>
</select>
<div class="tbl">
<table class="table-bordered" name="applicant_id" id="achievementJp">
  <thead class="tbl_head">
    <tr>
      <th></th>
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
        // var_dump($lists3['edu_name']);
          foreach($result6 as $row2){
  ?> 
    <tr>
    <td class="text-center">
       <input type="checkbox" name="productCheck[]" class="productCheck" data-item="1">
  </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'achiv_name[]',
            'type' => 'text',
            'value' => html_escape(set_value('achiv_name',isset($result)?$row2->achiv_name:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'achiv_name',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'level[]',
            'type' => 'text',
            'value' => html_escape(set_value('level',isset($result)?$row2->level:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'level',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'exam_year[]',
            'type' => 'text',
            'value' => html_escape(set_value('exam_year',isset($result)?$row2->exam_year:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'exam_year',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'score[]',
            'type' => 'text',
            'value' => html_escape(set_value('score',isset($result)?$row2->score:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'score',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
  
      <?php
          echo form_input(array(
            'name' => 'result[]',
            'type' => 'text',
            'value' => html_escape(set_value('result',isset($result)?$row2->result:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'result',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'date_qualification[]',
            'type' => 'date',
            'value' => html_escape(set_value('date_qualification',isset($result)?$row2->date_qualification:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'date_qualification',
            'autocomplete' => ''));
        ?>
      </td>
    </tr>
    <?php }
    ?>
  </tbody>
</table>
<table class="table-bordered" name="applicant_id">
<tr>
<th scope="row" colspan="9" class="align-middle" style="padding: 3px;">
      <span class="float-left">
        <a class="btn btn-sm btn-outline-secondary px-2 rounded-1 overlay" id="addNewRow03" style="font-size: 0.8rem;"><strong><i class="fas fa-plus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">add_circle</span>Add row</a>
        <a class="btn btn-sm btn-outline-danger px-2 rounded-1 overlay" id="removeRow03" style="font-size: 0.8rem;"><strong><i class="fas fa-minus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">delete</span>Remove</a>
      </span>
</th>
</tr>
</table>
<br>
<div class="form-group">
        <?php echo form_label('Certificate Number','jp_certificate_number', array('class' => '')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'jp_certificate_number',
            'type' => 'text',
            'value' => html_escape(set_value('phone',isset($result13)?$result13->jp_certificate_number:''), ENT_QUOTES),
            'placeholder' => 'Enter address!',
            'class' => 'form-control',
            'id' => 'jp_certificate_number',
            'autocomplete' => ''));
        ?>
        <span class="text-danger"><?php echo form_error('address'); ?></span>
       </div>
</div>
</div>
<div class="col-md-4 float-left">
<h6 class="" style="padding: 33px 0px 12px;">Name of JP language tests you are going to take</h6>
<table class="table-bordered" name="applicant_id" id="going_to_take">
  <thead class="tbl_head">
    <tr>
      <th></th>
      <th>Name of Japanese language test</th>
      <th>Level</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $x=1;
        $y=0;
        // var_dump($lists3['edu_name']);
          foreach($result7 as $row3){
  ?> 
    <tr>
    <td class="text-center">
       <input type="checkbox" name="productCheck[]" class="productCheck" data-item="1">
  </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'going_name[]',
            'type' => 'text',
            'value' => html_escape(set_value('going_name',isset($result)?$row3->going_name:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'going_name',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'going_level[]',
            'type' => 'text',
            'value' => html_escape(set_value('going_level',isset($result)?$row3->going_level:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'going_level',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'going_date[]',
            'type' => 'date',
            'value' => html_escape(set_value('going_date',isset($result)?$row3->going_date:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'going_date',
            'autocomplete' => ''));
        ?>
      </td>
    </tr>
    <?php }
    ?>
  </tbody>
</table>
<table class="table-bordered" name="applicant_id">
<tr>
<th scope="row" colspan="9" class="align-middle" style="padding: 3px;">
      <span class="float-left">
        <a class="btn btn-sm btn-outline-secondary px-2 rounded-1 overlay" id="addNewRow04" style="font-size: 0.8rem;"><strong><i class="fas fa-plus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">add_circle</span>Add row</a>
        <a class="btn btn-sm btn-outline-danger px-2 rounded-1 overlay" id="removeRow04" style="font-size: 0.8rem;"><strong><i class="fas fa-minus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">delete</span>Remove</a>
      </span>
</th>
</tr>
</table>
</div>

<!-- Table -->

<!-- Table -->
<div class="col-md-12 float-left">
<h6 class="" style="padding: 33px 0px 12px;">History of Employment (Write in order, ending with the most recent employment.)</h6>
<select name="employment_experience" id="employment_experience" class="admission_select" style="margin-bottom: 1rem;";>
        <option value="1" <?php if($result->employment_experience== "1") {echo "selected";} ?>>Yes</option>
        <option value="0" <?php if($result->employment_experience== "0") {echo "selected";} ?>>No</option>
</select>
<div class="tbl">
<table class="table-bordered" name="applicant_id" id="employHistory">
  <thead class="tbl_head">
    <tr>
      <th></th>
      <th>Name of Employment</th>
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
        // var_dump($lists3['edu_name']);
          foreach($result8 as $row4){
  ?> 
    <tr>
    <td class="text-center">
       <input type="checkbox" name="productCheck[]" class="productCheck" data-item="1">
  </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'emp_name[]',
            'type' => 'text',
            'value' => html_escape(set_value('emp_name',isset($result)?$row4->emp_name:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'emp_name',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'emp_address[]',
            'type' => 'text',
            'value' => html_escape(set_value('emp_address',isset($result)?$row4->address:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'emp_address',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'emp_year[]',
            'type' => 'text',
            'value' => html_escape(set_value('emp_year',isset($result)?$row4->year:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'emp_year',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'emp_start_date[]',
            'type' => 'month',
            'value' => html_escape(set_value('emp_start_date',isset($result)?$row4->start_date:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'emp_start_date',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'emp_end_date[]',
            'type' => 'month',
            'value' => html_escape(set_value('emp_end_date',isset($result)?$row4->end_date:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'emp_end_date',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'emp_job_description[]',
            'type' => 'text',
            'value' => html_escape(set_value('emp_job_description',isset($result)?$row4->job_description:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'emp_job_description',
            'autocomplete' => ''));
        ?>
      </td>
    </tr>
    <?php }
    ?>
  </tbody>
</table>
<table class="table-bordered" name="applicant_id">
<tr>
<th scope="row" colspan="9" class="align-middle" style="padding: 3px;">
      <span class="float-left">
        <a class="btn btn-sm btn-outline-secondary px-2 rounded-1 overlay" id="addNewRow05" style="font-size: 0.8rem;"><strong><i class="fas fa-plus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">add_circle</span>Add row</a>
        <a class="btn btn-sm btn-outline-danger px-2 rounded-1 overlay" id="removeRow05" style="font-size: 0.8rem;"><strong><i class="fas fa-minus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">delete</span>Remove</a>
      </span>
</th>
</tr>
</table>
</div>
</div>
<!-- Table -->

<!-- Table -->
<div class="col-md-12 float-left">
<h6 class="" style="padding: 33px 0px 12px;">Family Member</h6>
<div class="tbl">
<table class="table-bordered" name="applicant_id" id="familyMember">
  <thead class="tbl_head">
    <tr>
      <th></th>
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
  <?php
        $x=1;
        $y=0;
        // var_dump($lists3['edu_name']);
          foreach($result9 as $row5){
  ?> 
    <tr>
    <td class="text-center">
       <input type="checkbox" name="productCheck[]" class="productCheck" data-item="1">
  </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'fam_name[]',
            'type' => 'text',
            'value' => html_escape(set_value('fam_name',isset($result)?$row5->fam_name:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'fam_name',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'fam_age[]',
            'type' => 'text',
            'value' => html_escape(set_value('fam_age',isset($result)?$row5->fam_age:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'fam_age',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'fam_gender[]',
            'type' => 'text',
            'value' => html_escape(set_value('fam_gender',isset($result)?$row5->fam_gender:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'fam_gender',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'fam_relationship[]',
            'type' => 'text',
            'value' => html_escape(set_value('fam_relationship',isset($result)?$row5->fam_relationship:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'fam_relationship',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'fam_nationality[]',
            'type' => 'text',
            'value' => html_escape(set_value('fam_nationality',isset($result)?$row5->fam_nationality:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'fam_nationality',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'fam_work_place[]',
            'type' => 'text',
            'value' => html_escape(set_value('fam_work_place',isset($result)?$row5->work_place:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'fam_work_place',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'fam_birthday[]',
            'type' => 'date',
            'value' => html_escape(set_value('fam_birthday',isset($result)?$row5->birthday:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'fam_birthday',
            'autocomplete' => ''));
        ?>
      </td>
      
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'fam_occupation[]',
            'type' => 'text',
            'value' => html_escape(set_value('fam_occupation',isset($result)?$row5->occupation:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'fam_occupation',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'fam_annual_income[]',
            'type' => 'text',
            'value' => html_escape(set_value('fam_annual_income',isset($result)?$row5->annual_income:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'fam_annual_income',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'fam_address[]',
            'type' => 'text',
            'value' => html_escape(set_value('fam_address',isset($result)?$row5->address:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'fam_address',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'fam_length_sevice[]',
            'type' => 'text',
            'value' => html_escape(set_value('fam_length_sevice',isset($result)?$row5->length_sevice:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'fam_length_sevice',
            'autocomplete' => ''));
        ?>
      </td>
    </tr>
    <?php }
    ?>
  </tbody>
</table>
<table class="table-bordered" name="applicant_id">
<tr>
<th scope="row" colspan="9" class="align-middle" style="padding: 3px;">
      <span class="float-left">
        <a class="btn btn-sm btn-outline-secondary px-2 rounded-1 overlay" id="addNewRow06" style="font-size: 0.8rem;"><strong><i class="fas fa-plus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">add_circle</span>Add row</a>
        <a class="btn btn-sm btn-outline-danger px-2 rounded-1 overlay" id="removeRow06" style="font-size: 0.8rem;"><strong><i class="fas fa-minus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">delete</span>Remove</a>
      </span>
</th>
</tr>
</table>
</div>
<div class="form-group">
  <?php echo form_label('Are you planning to stay with them in Japan? : ', 'plan_to_stay_with_them', array( 'class' => 'form-control-label', 'id'=> '')); ?><br/>
    <select name="ja_plan_to_stay_with_them" id="ja_plan_to_stay_with_them" class="admission_select">
        <option value="1" <?php if($result->ja_plan_to_stay_with_them== "1") {echo "selected";} ?>>Yes</option>
        <option value="0" <?php if($result->ja_plan_to_stay_with_them== "0") {echo "selected";} ?>>No</option>
    </select>
  </div>
  <div class="form-group">
        <?php
          echo form_label('you/your family have Japanese friends or acquaintances, please write his/her name, address,phone number, relationship, etc.','family_inJpfri', array('class' => ''));
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
            'value' => set_value('family_inJpfri',isset($result13)?$result13->family_inJpfri:'',ENT_QUOTES),
          );
          echo form_textarea($data); ?>
          <span class="text-danger"><?php echo form_error('family_inJpfri'); ?></span>
  </div>
  </div>
  <!-- <div class="col-md-6">
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
  </div> -->
  <div class="col-md-6 float-left" style="display: flex;padding-top: 12px;">
  <!-- Student Photo -->
  <?php
      echo form_label('Please attach the picture of you and your family below this','familyfile', array('class' => 'col-form-label')) ;    
  ?>
   <div class="col-md-6" style="width: 100%;padding-left:0px;padding-right: 0px;">
        <?php
              echo form_input(array(
              'name' => 'familyfile',
              'type' => 'file',
              'class' => 'form-control',
              'id' => 'clickImg',
              'accept' => 'images/*'
              ));
            ?>            
            <span class="text-danger"><?php echo form_error('familyfile'); ?></span>
            <?php if(!empty($result->image_file)) { ?>
              <img src="<?php echo base_url('upload/assets/adm/usr/'.$result->family_file); ?>" width="100px;" class="pb-1">
            <?php } ?>
            <div class="form-group" id="showImg3"></div>               
    </div>
  <span class="text-danger"><?php echo form_error('family_file'); ?></span>
  </div>
</div>
<!-- Table -->
<!-- Table -->
<div class="col-md-12 float-left">
<h6 class="" style="padding: 33px 0px 12px;">Family in Japan (Father, Mother, Spouse, Child, Brother and Sisters, or Others) :</h6>
<select name="family_in_japan" id="family_in_japan" class="admission_select" style="margin-bottom: 1rem;";>
        <option value="1" <?php if($result->family_in_japan== "1") {echo "selected";} ?>>Yes</option>
        <option value="0" <?php if($result->family_in_japan== "0") {echo "selected";} ?>>No</option>
    </select>
<p>If yes, fill in all the family members in Japan.</p>

<div class="tbl">
<table class="table-bordered" name="applicant_id" id="familyInJp">
  <thead class="tbl_head">
    <tr>
      <th></th>
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
  <?php
        $x=1;
        $y=0;
        // var_dump($lists3['edu_name']);
          foreach($result10 as $result){
  ?> 
    <tr>
    <td class="text-center">
       <input type="checkbox" name="productCheck[]" class="productCheck" data-item="1">
  </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'ja_fam_name[]',
            'type' => 'text',
            'value' => html_escape(set_value('ja_fam_name',isset($result)?$result->ja_fam_name:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'ja_fam_name',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'ja_fam_date_birth[]',
            'type' => 'date',
            'value' => html_escape(set_value('ja_fam_date_birth',isset($result)?$result->ja_fam_date_birth:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'ja_fam_date_birth',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'ja_fam_address[]',
            'type' => 'text',
            'value' => html_escape(set_value('ja_fam_address',isset($result)?$result->ja_fam_address:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'ja_fam_address',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'ja_fam_age[]',
            'type' => 'text',
            'value' => html_escape(set_value('ja_fam_age',isset($result)?$result->ja_fam_age:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'ja_fam_age',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'ja_fam_relationship[]',
            'type' => 'text',
            'value' => html_escape(set_value('ja_fam_relationship',isset($result)?$result->ja_fam_relationship:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'ja_fam_relationship',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <div class="">
      <select name="ja_fam_residing_applicant[]" class="table-control col-md-12">
        <option value="" <?php if($result->ja_fam_residing_applicant== "") {echo "selected";} ?>></option>
        <option value="1" <?php if($result->ja_fam_residing_applicant== "1") {echo "selected";} ?>>Yes</option>
        <option value="0" <?php if($result->ja_fam_residing_applicant== "0") {echo "selected";} ?>>No</option>
      </select>
     </div>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'residence_card_no[]',
            'type' => 'text',
            'value' => html_escape(set_value('residence_card_no',isset($result)?$result->residence_card_no:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'residence_card_no',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'ja_fam_nationality[]',
            'type' => 'text',
            'value' => html_escape(set_value('ja_fam_nationality',isset($result)?$result->ja_fam_nationality:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'ja_fam_nationality',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'ja_fam_visa_status[]',
            'type' => 'text',
            'value' => html_escape(set_value('ja_fam_visa_status',isset($result)?$result->ja_fam_visa_status:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'ja_fam_visa_status',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'ja_fam_work_place[]',
            'type' => 'text',
            'value' => html_escape(set_value('ja_fam_work_place',isset($result)?$result->ja_fam_work_place:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'ja_fam_work_place',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'ja_certificate_alien[]',
            'type' => 'text',
            'value' => html_escape(set_value('ja_certificate_alien',isset($result)?$result->ja_certificate_alien:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'ja_certificate_alien',
            'autocomplete' => ''));
        ?>
      </td>
    </tr>
    <?php }
    ?>
  </tbody>
</table>
<table class="table-bordered" name="applicant_id">
<tr>
<th scope="row" colspan="9" class="align-middle" style="padding: 3px;">
      <span class="float-left">
        <a class="btn btn-sm btn-outline-secondary px-2 rounded-1 overlay" id="addNewRow07" style="font-size: 0.8rem;"><strong><i class="fas fa-plus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">add_circle</span>Add row</a>
        <a class="btn btn-sm btn-outline-danger px-2 rounded-1 overlay" id="removeRow07" style="font-size: 0.8rem;"><strong><i class="fas fa-minus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">delete</span>Remove</a>
      </span>
</th>
</tr>
</table>
</div>
</div>
<!-- Table -->
<!-- Table -->
<div class="col-md-12 float-left" style="padding-bottom: 15px;">
<h6 class="" style="padding: 33px 0px 12px;">Previous  stay in Japan</h6>
<div class="tbl">
<table class="table-bordered" name="applicant_id" id="preStayInJP">
  <thead class="tbl_head">
    <tr>
      <th></th>
      <th>Date of Entry	</th>
      <th>Date of Arrival	</th>
      <th>Date of Depature </th>
      <th >Visa	 </th>
      <th >Status	 </th>
      <th>Purpose of Entry</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $x=1;
        $y=0;
        // var_dump($lists3['edu_name']);
          foreach($result11 as $result){
  ?> 
    <tr>
    <td class="text-center">
       <input type="checkbox" name="productCheck[]" class="productCheck" data-item="1">
  </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'entry_date[]',
            'type' => 'date',
            'value' => html_escape(set_value('entry_date',isset($result)?$result->entry_date:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'entry_date',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'arrival_date[]',
            'type' => 'date',
            'value' => html_escape(set_value('arrival_date',isset($result)?$result->arrival_date:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'arrival_date',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'depature_date[]',
            'type' => 'date',
            'value' => html_escape(set_value('depature_date',isset($result)?$result->depature_date:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'depature_date',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'pre_stay_visa[]',
            'type' => 'text',
            'value' => html_escape(set_value('pre_stay_visa',isset($result)?$result->pre_stay_visa:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'depature_date',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'status[]',
            'type' => 'text',
            'value' => html_escape(set_value('status',isset($result)?$result->status:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'status',
            'autocomplete' => ''));
        ?>
      </td>
      <td  class="rowID">
      <?php
          echo form_input(array(
            'name' => 'entry_purpose[]',
            'type' => 'text',
            'value' => html_escape(set_value('entry_purpose',isset($result)?$result->entry_purpose:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'entry_purpose',
            'autocomplete' => ''));
        ?>
      </td>
    </tr>
    <?php }
    ?>
  </tbody>
</table>
<table class="table-bordered" name="applicant_id">
<tr>
<th scope="row" colspan="9" class="align-middle" style="padding: 3px;">
      <span class="float-left">
        <a class="btn btn-sm btn-outline-secondary px-2 rounded-1 overlay" id="addNewRow08" style="font-size: 0.8rem;"><strong><i class="fas fa-plus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">add_circle</span>Add row</a>
        <a class="btn btn-sm btn-outline-danger px-2 rounded-1 overlay" id="removeRow08" style="font-size: 0.8rem;"><strong><i class="fas fa-minus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">delete</span>Remove</a>
      </span>
</th>
</tr>
</table>
</div>
<br>
<div class="form-group">
        <?php echo form_label('If you have stayed in Japan more than four times, please use the blank below.','japan_four_times', array('class' => '')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'japan_four_times',
            'type' => 'text',
            'value' => html_escape(set_value('japan_four_times',isset($result13)?$result13->japan_four_times:''), ENT_QUOTES),
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
      <th></th>
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
        // var_dump($result14);
          foreach($result14 as $result){
  ?> 
    <tr>
    <td class="text-center">
       <input type="checkbox" name="productCheck[]" class="productCheck" data-item="1">
  </td>
      <td class="text-center" class="rowID">
      <?php
          echo form_input(array(
            'name' => 'shortVisa_purpose[]',
            'type' => 'text',
            'value' => html_escape(set_value('shortVisa_purpose',isset($result)?$result->shortVisa_purpose:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'shortVisa_purpose',
            'autocomplete' => ''));
      ?>
      </td>
      
      <td class="rowID">
      <?php
          echo form_input(array(
            'name' => 'shortVisa_status[]',
            'type' => 'text',
            'value' => html_escape(set_value('shortVisa_status',isset($result)?$result->shortVisa_status:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'shortVisa_status',
            'autocomplete' => ''));
      ?>
      </td>
      <td class="rowID">
      <?php
          echo form_input(array(
            'name' => 'shortVisa_period[]',
            'type' => 'date',
            'value' => html_escape(set_value('shortVisa_period',isset($result)?$result->shortVisa_period:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'shortVisa_period',
            'autocomplete' => ''));
      ?>
      </td>
      <td class="rowID">
      <?php
          echo form_input(array(
            'name' => 'shortVisa_prepare[]',
            'type' => 'text',
            'value' => html_escape(set_value('shortVisa_prepare',isset($result)?$result->shortVisa_prepare:''), ENT_QUOTES),
            'class' => 'table-control productItem',
            'id' => 'shortVisa_prepare',
            'autocomplete' => ''));
      ?>
      </td>
    </tr>
    <?php }
    ?>
  </tbody>
</table>
<table class="table-bordered" name="applicant_id">
<tr>
<th scope="row" colspan="9" class="align-middle" style="padding: 3px;">
      <span class="float-left">
        <a class="btn btn-sm btn-outline-secondary px-2 rounded-1 overlay" id="addNewRow08" style="font-size: 0.8rem;"><strong><i class="fas fa-plus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">add_circle</span>Add row</a>
        <a class="btn btn-sm btn-outline-danger px-2 rounded-1 overlay" id="removeRow08" style="font-size: 0.8rem;"><strong><i class="fas fa-minus-circle"></i></strong><span class="material-icons align-top md-20 mr-1">delete</span>Remove</a>
      </span>
</th>
</tr>
</table>
</div>
<!-- Table -->
</div>
<!-- Table -->
</div>
</div>

<!-- End dropdown APPLICANT INFORMATION -->
<!--Start dropdown FINANICIAL SPONSOR -->
<div class="content_detail">
  <input class="dropdown" type="checkbox" id="faq-3">
  <p class="drop_ttl"><label for="faq-3" class="drop_label">FINANICIAL SPONSOR</label></p>
  <div class="drop_txt">
  <h5 class="finial_ttl">Finanicial Sponsor</h5>
  <div class="col-md-6 float-left" name="applicant_id">
      <div class="form-group">
        <?php echo form_label('Name', 'fin_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'fin_name')); ?>
        <span class="badge badge-danger">Required</span>
       <!-- <?  var_dump($result); ?> -->
        <?php
          echo form_input(array(
            'name' => 'fin_name',
            'type' => 'text',
            'value' => html_escape(set_value('fin_name',isset($result12)?$result12->fin_name:''), ENT_QUOTES),
            'placeholder' => 'Enter name!',
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
            'value' => html_escape(set_value('fin_age',isset($result12)?$result12->fin_age:''), ENT_QUOTES),
            'placeholder' => "Enter Age!",
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
            'value' => html_escape(set_value('fin_relationship',isset($result12)?$result12->fin_relationship:''), ENT_QUOTES),
            'placeholder' => "",
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
            'placeholder' => 'Enter address',
            'class' => "form-control",
            'value' => html_escape(set_value('fin_address',isset($result12)?$result12->fin_address:''), ENT_QUOTES),
          );
          echo form_textarea($data); ?>
          <span class="text-danger"><?php echo form_error('address'); ?></span>
        </div>
       </div>
       <div class="form-group">
        <?php echo form_label('Phone Number', 'tel', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'tel')); ?>
        <span class="badge badge-danger">Required</span>
        <?php
          echo form_input(array(
            'name' => 'tel',
            'type' => 'text',
            'value' => html_escape(set_value('tel',isset($result12)?$result12->tel:''), ENT_QUOTES),
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
            'value' => html_escape(set_value('email',isset($result12)?$result12->email:''), ENT_QUOTES),
            'placeholder' => 'Enter email account!',
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
          'value' => html_escape(set_value('fin_occupation',isset($result12)?$result12->fin_occupation:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'fin_occupation',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('fin_occupation'); ?></span>
  </div>
  <div class="form-group">
      <?php echo form_label('Work Place', 'work_place', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'work_place')); ?>
      <?php
        echo form_input(array(
          'name' => 'work_place',
          'type' => 'text',
          'value' => html_escape(set_value('work_place',isset($result12)?$result12->work_place:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'work_place',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('work_place'); ?></span>
  </div>
  <div class="form-group">
      <?php echo form_label('Visa', 'fin_visa', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'fin_visa')); ?>
      <?php
        echo form_input(array(
          'name' => 'fin_visa',
          'type' => 'text',
          'value' => html_escape(set_value('fin_visa',isset($result12)?$result12->fin_visa:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'fin_visa',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('fin_visa'); ?></span>
  </div>
  <div class="form-group">
      <?php echo form_label('Annual Income', 'annual_income', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'annual_income')); ?>
      <?php
        echo form_input(array(
          'name' => 'annual_income',
          'type' => 'text',
          'value' => html_escape(set_value('annual_income',isset($result12)?$result12->annual_income:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'annual_income',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('annual_income'); ?></span>
  </div>
  <div class="form-group">
      <?php echo form_label('The amount of saving for study abroad', 'amount_saving_for_study_abroad', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'amount_saving_for_study_abroad')); ?>
      <?php
        echo form_input(array(
          'name' => 'amount_saving_for_study_abroad',
          'type' => 'text',
          'value' => html_escape(set_value('amount_saving_for_study_abroad',isset($result12)?$result12->amount_saving_for_study_abroad :''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'amount_saving_for_study_abroad',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('amount_saving_for_study_abroad'); ?></span>
  </div>
  <div class="form-group">
      <?php echo form_label('The amount of saving which can be proved ', 'amount_of_saving_which_proved', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'amount_of_saving_which_proved')); ?>
      <?php
        echo form_input(array(
          'name' => 'amount_of_saving_which_proved',
          'type' => 'text',
          'value' => html_escape(set_value('amount_of_saving_which_proved',isset($result12)?$result12->amount_of_saving_which_proved:''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'amount_of_saving_which_proved',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('amount_of_saving_which_proved'); ?></span>
  </div>
  <div class="form-group">
      <?php echo form_label('Start of Work date', 'start_work_date', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'start_work_date')); ?>
      <?php
        echo form_input(array(
          'name' => 'start_work_date',
          'type' => 'date',
          'value' => html_escape(set_value('start_work_date',isset($result12)?$result12->start_work_date :''), ENT_QUOTES),
          'placeholder' => 'Please Enter!',
          'class' => 'form-control',
          'id' => 'start_work_date ',
          'autocomplete' => ''));
      ?>
      <span class="text-danger"><?php echo form_error('start_work_date'); ?></span>
  </div>
  </div>
</div>
<!--End dropdown FINANICIAL SPONSOR -->
<div class="clearfix"></div>
  <hr class="my-4 dashed clearfix">
  <div class="text-right">
            <button type="submit" class="btn btn-primary text-white btn-sm py-1 px-2">
              <span class="material-icons align-top md-20 mr-1">update</span>Update
            </button>
            <button type="reset" class="btn btn-secondary text-white btn-sm py-1 px-2">
              <span class="material-icons align-top md-20 mr-1">sync</span>Reset
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

<style>
.table-bordered thead th, .table-bordered thead td {
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
    margin: 10px 120px 0px;
}
div.content_detail{
position: relative;
margin:0 2em 1em;
}
.dropdown{
position: absolute;
left: 0;
top: 0;
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
    width: 45.3%;
    padding: 8px;
    /* margin: 7px 1px 7px 0px; */
    border: 1px solid #ced4db;
    border-radius: 3px;
}
.school_list{
  width: 55%;
  padding: 17px 12px;
  align-items: center;
  display: flex;
}
.list_label{
  width: 44%;
  font-size: 16px;
  margin: 0px;
}
.text-right {
    padding-bottom: 27px;
    text-align: right !important;
}
</style>
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
.course_select{
  width: 49%;
  padding: 8px;
  /* margin: 7px; */
  border: 1px solid #ced4db;
  border-radius: 3px;
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
  width: 74% !important;
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
.stu_label{
  /* margin-left: 57% */
}
.employment_text{
  margin-bottom: 10px;
}
.passport_text{
  margin-bottom: 10px;
}
/* #passport_data_exp_ttl{
  margin-top: 7px;
} */
.military_txt{
  margin-bottom: 18px;
}
.wholanguage{
  margin-bottom: 19px;
}
.criminal_record01 {
    width: 34%;
}
.criminal_record03{
  position: relative;
  top: 0px;
  left: 25%;
}
a.btn:hover{
  color:#ffffff;
}
</style> 