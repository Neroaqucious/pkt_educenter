<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <h1 class="weight-300 h3 title">Edit Admin Role</h1>
    </div> 

    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">

      <a class="btn btn-secondary py-1 px-2" href="<?php echo base_url('adm/portal/auth/role'); ?>"><span class="material-icons align-text-bottom">reorder</span></a>

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
            echo form_open('adm/portal/auth/role_edit/'.$result->id, $attributes);
          ?>
            <div class="col-lg-6 col-md-6 float-left">

              <div class="form-group">
                <?php echo form_label('Role Name', 'role_name', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                  echo form_input(array(
                  'name' => 'role_name',
                  'type' => 'text',
                  'value' => html_escape(set_value('role_name',isset($result)?$result->name:''), ENT_QUOTES),
                  'placeholder' => 'Enter role name!',
                  'class' => 'form-control',
                  'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('role_name'); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('Session', 'session', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <span class="badge badge-warning text-light">Only Minutes</span>
                <?php
                  echo form_input(array(
                    'name' => 'session',
                    'type' => 'text',
                    'value' => html_escape(set_value('session',isset($result)?$result->session/60:''), ENT_QUOTES),
                    'placeholder' => 'Enter session!',
                    'class' => 'form-control',
                    'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('session'); ?></span>
              </div>

            <?php 
              $array = explode(', ', $result->config); 
              $data = [];

              if(count($array) == 8){
                $data = [
                  "admin" => true,
                  "student" => true,
                  "course" => true,
                  "event_new" => true,
                  "instructor" => true,
                  "q_a" => true,
                  "data" => true,
                  "payment" => true,
                ];
              } else {
                if(in_array("pe_admin",$array)){
                  $data["pe_admin"] = true;
                }
                if(in_array("pe_student",$array)){
                  $data["pe_student"] = true;
                }
                if(in_array("pe_course",$array)){
                  $data["pe_course"] = true;
                }
                if(in_array("pe_activity",$array)){
                  $data["pe_activity"] = true;
                }
                if(in_array("pe_data",$array)){
                  $data["pe_data"] = true;
                }
                if(in_array("pe_payment",$array)){
                  $data["pe_payment"] = true;
                }
                if(in_array("pe_config",$array)){
                  $data["pe_config"] = true;
                }
              }            
            ?>


          <div class="form-group">
            <?php echo form_label('Configuration', 'permission', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?><span class="badge badge-danger">Required</span>
            <div class="input-group">
              <div class="custom-control mb-2 mr-4 custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="per1" name="permission[]" value="pe_admin" <?php if(isset($data['pe_admin'])){ echo "checked"; } ?>>
                <label class="custom-control-label" for="per1">Admin Management</label>
              </div>

              <div class="custom-control mb-2 mr-4 custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="per2" name="permission[]" value="pe_student" <?php if(isset($data['pe_student'])){ echo "checked"; } ?>>
                <label class="custom-control-label" for="per2">Student Management</label>
              </div>

              <div class="custom-control mb-2 mr-4 custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="per3" name="permission[]" value="pe_course" <?php if(isset($data['pe_course'])){ echo "checked"; } ?>>
                <label class="custom-control-label" for="per3">Course Management</label>
              </div>

              <div class="custom-control mb-2 mr-4 custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="per4" name="permission[]" value="pe_activity" <?php if(isset($data['pe_activity'])){ echo "checked"; } ?>>
                <label class="custom-control-label" for="per4">Activity Management</label>
              </div>

              <div class="custom-control mb-2 mr-4 custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="per5" name="permission[]" value="pe_data" <?php if(isset($data['pe_data'])){ echo "checked"; } ?>>
                <label class="custom-control-label" for="per5">Data Management</label>
              </div>

              <div class="custom-control mb-2 mr-4 custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="per6" name="permission[]" value="pe_payment" <?php if(isset($data['pe_payment'])){ echo "checked"; } ?>>
                <label class="custom-control-label" for="per6">Payment Management</label>
              </div>

              <div class="custom-control mb-2 mr-4 custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="per7" name="permission[]" value="pe_config" <?php if(isset($data['pe_config'])){ echo "checked"; } ?>>
                <label class="custom-control-label" for="per7">Configuration Management</label>
              </div>

            </div>
            <div class="clearfix d-block">
                <span class="text-danger"><?php echo form_error('permission[]'); ?></span>
              </div>
          </div>
          
          <div class="form-group">
            <?php echo form_label('Permission', 'status', array( 'class' => 'form-control-label', 'id'=> '')); ?>
    
            <div class="radio">
                <label class="col-md-4">
                  <input type="radio" name="status" value="1" <?php if(($result->status) == 1) { echo "checked";}?>> Public
                </label>
                <label class="col-md-4">
                  <input type="radio" name="status" value="0" <?php if(($result->status) == 0) { echo "checked";}?>> Private
                </label>
            </div>
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