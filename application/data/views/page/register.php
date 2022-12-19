<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?> 
<!-- Registration-area start Here -->
  <div class="registration-area">
    <div class="container">
      <div class="row">
        <div class="form-controls">
          <?php
            $attributes = array('class' => 'form-horizontal form-label-left');
            echo form_open('auth/regist', $attributes);
          ?>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 align-center">
              <div class="form-title">
                <h3>Sign up your information</h3>
              </div>
              <div class="registration-form">
                <?php echo form_label('Name *', 'std_name', array( 'class' => '', 'id'=> 'name', 'style' => '', 'for' => 'std_name')); ?>
                <?php
                  echo form_input(array(
                    'name' => 'std_name',
                    'type' => 'text',
                    'value' => html_escape(set_value('std_name',isset($result)?$result->name:''), ENT_QUOTES),
                    'id' => 'name',
                    'required' => 'required',
                    'autocomplete' => 'new-std_name'));
                ?>

                <?php echo form_label('Email *', 'std_email', array( 'class' => '', 'id'=> 'emailaddress', 'style' => '', 'for' => 'std_email')); ?>
                <?php
                  echo form_input(array(
                    'name' => 'std_email',
                    'type' => 'text',
                    'value' => html_escape(set_value('std_email',isset($result)?$result->email:''), ENT_QUOTES),
                    'id' => 'emailaddress',
                    'required' => 'required',
                    'autocomplete' => 'new-std_email'));
                ?>

                <?php echo form_label('Phone *', 'phone', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
                <?php
                  echo form_input(array(
                    'name' => 'phone',
                    'type' => 'text',
                    'value' => html_escape(set_value('phone',isset($result)?$result->phone:''), ENT_QUOTES),
                    'id' => 'phone',
                    'required' => 'required',
                    'autocomplete' => 'new-phone'));
                ?>

                <?php echo form_label('Password *', 'std_password', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_password')); ?>
                <?php
                  echo form_input(array(
                    'name' => 'std_password',
                    'type' => 'password',
                    'value' => html_escape(set_value('std_password',isset($result)?$result->password:''), ENT_QUOTES),
                    'id' => 'std_password',
                    'required' => 'required',
                    'autocomplete' => 'new-std_password'));
                ?>

                <?php echo form_label('Confirm Password *', 'conf_password', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'conf_password')); ?>
                <?php
                  echo form_input(array(
                    'name' => 'conf_password',
                    'type' => 'password',
                    'value' => html_escape(set_value('conf_password',isset($result)?$result->password:''), ENT_QUOTES),
                    'id' => 'conf_password',
                    'required' => 'required',
                    'autocomplete' => 'new-conf_password'));
                ?>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 align-center">
              <div class="registaration-btn">
                <button class="btn-icon">&nbsp;Sign up</button>
                  <a href="<?php echo base_url('auth/login'); ?>" class="float-right">Do you have an account?</a>
              </div>
              <br>
              <!-- error report area -->
                <?php if(!empty($this->form_validation->error_array())) { 
                  foreach($this->form_validation->error_array() as $row) { 
                ?>
                  <div class="alert alert-danger alert-dismissible show" role="alert">
                    <?php echo $row; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true" class="fa fa-close"></span>
                    </button>
                  </div>
                <?php } } ?>
              <!-- error report area -->
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
<!-- Registration-area end Here -->
<?php include(dirname(__FILE__) ."/../template/footer.php"); ?> 