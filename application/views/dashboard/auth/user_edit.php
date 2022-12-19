<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <h1 class="weight-300 h3 title">Edit Admin User</h1>
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
          <div class="card-body">
          <?php
            $attributes = array('class' => 'form-horizontal form-label-left');
            echo form_open('adm/portal/auth/useredit', $attributes);
          ?>
            <div class="col-lg-6 col-md-6 float-left">
              <div class="form-group">
                <?php echo form_label('Full Name', 'admin_name', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                  echo form_input(array(
                  'name' => 'admin_name',
                  'type' => 'text',
                  'value' => html_escape(set_value('admin_name',isset($result)?$result->full_name:''), ENT_QUOTES),
                  'placeholder' => 'Enter full name!',
                  'class' => 'form-control',
                  'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('admin_name'); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('Email', 'admin_email', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                  echo form_input(array(
                    'name' => 'admin_email',
                    'type' => 'email',
                    'value' => html_escape(set_value('admin_email',isset($result)?$result->email:''), ENT_QUOTES),
                    'placeholder' => 'Enter email name!',
                    'class' => 'form-control',
                    'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('admin_email'); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('Phone Number', 'admin_phone', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                  echo form_input(array(
                    'name' => 'admin_phone',
                    'type' => 'text',
                    'value' => html_escape(set_value('admin_phone',isset($result)?$result->phone:''), ENT_QUOTES),
                    'placeholder' => 'Enter phone number!',
                    'class' => 'form-control',
                    'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('admin_phone'); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('Address' ,'admin_address' , array( 'id' => '', 'class' => '', 'style' => 'margin-bottom:10px;')); ?>
                <?php echo form_textarea(array(
                  'name'        => 'admin_address',
                  'type'        => 'text',
                  'value'       => html_escape(set_value( 'admin_address' , isset($result)?$result->address:''), ENT_QUOTES),
                  'placeholder' => 'Enter Content Text!',
                  'class'       => 'form-control',
                  'rows'          => '5'	));
                ?>
                <span class="text-danger"><?php echo form_error('admin_address'); ?></span>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 float-right">
              <div class="form-group">
                <?php echo form_label('Facebook', 'admin_facebook', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <?php
                  echo form_input(array(
                    'name' => 'admin_facebook',
                    'type' => 'text',
                    'value' => html_escape(set_value('admin_facebook',isset($result)?$result->facebook:''), ENT_QUOTES),
                    'placeholder' => 'Enter facebook!',
                    'class' => 'form-control',
                    'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('admin_facebook'); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('Twitter', 'admin_twitter', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <?php
                  echo form_input(array(
                    'name' => 'admin_twitter',
                    'type' => 'text',
                    'value' => html_escape(set_value('admin_twitter',isset($result)?$result->twitter:''), ENT_QUOTES),
                    'placeholder' => 'Enter Twitter!',
                    'class' => 'form-control',
                    'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('admin_twitter'); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('Instagram', 'admin_instagram', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                  <?php
                  echo form_input(array(
                      'name' => 'admin_instagram',
                      'type' => 'text',
                      'value' => html_escape(set_value('admin_instagram',isset($result)?$result->instagram:''), ENT_QUOTES),
                      'placeholder' => 'Enter Instagram!',
                      'class' => 'form-control',
                      'id' => ''));
                  ?>
                <span class="text-danger"><?php echo form_error('admin_instagram'); ?></span>
              </div>

            </div>
            <div class="clearfix"></div>
            <hr class="my-4 dashed clearfix">
            <button type="submit" class="btn btn-primary btn-sm float-right"><span class="material-icons align-middle">update</span> Update</button>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>