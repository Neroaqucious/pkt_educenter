<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <h1 class="weight-300 h3 title">Change Admin Password </h1>
    </div> 

    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a class="btn btn-secondary py-1 px-2" href="<?php echo base_url('adm/portal/auth/profile'); ?>"><span class="material-icons align-text-bottom">account_circle</span></a>
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
          <div class="card-header bg-dark text-success"></div>
          <div class="card-body">
          <?php
            $attributes = array('class' => 'form-horizontal form-label-left');
            echo form_open('adm/portal/auth/password', $attributes);
          ?>
            <div class="col-lg-6 col-md-6 float-left">
            
            <div class="form-group">
                <?php echo form_label('Current Password', 'curr_user_pass', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                  echo form_input(array(
                  'name' => 'curr_user_pass',
                  'type' => 'password',
                  'value' => "",
                  'placeholder' => 'Enter current password!',
                  'class' => 'form-control',
                  'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('curr_user_pass'); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('New Password', 'new_user_pass', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                  echo form_input(array(
                  'name' => 'new_user_pass',
                  'type' => 'password',
                  'value' => "",
                  'placeholder' => 'Enter password!',
                  'class' => 'form-control',
                  'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('new_user_pass'); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('Confirm Password', 'user_conf_pass', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                  echo form_input(array(
                  'name' => 'user_conf_pass',
                  'type' => 'password',
                  'value' => "",
                  'placeholder' => 'Enter password!',
                  'class' => 'form-control',
                  'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('user_conf_pass'); ?></span>
              </div>
            </div>

            <div class="clearfix"></div>

            <hr class="my-4 dashed clearfix">
            <button type="submit" class="btn btn-primary btn-sm float-right"><span class="material-icons align-middle">update</span> update</button>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

</div>
<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>