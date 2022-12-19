<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title">Edit Student</h1>
    </div> 
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      
      <a href="<?php echo base_url('adm/portal/student'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>

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
							echo form_open_multipart('adm/portal/student/edit/'.$result->id, $attributes);
            ?>

          <div class="col-md-12">
            <div class="col-md-6 float-left">
              <div class="form-group">
                <?php echo form_label('Student Name', 'std_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                  echo form_input(array(
                    'name' => 'std_name',
                    'type' => 'text',
                    'value' => html_escape(set_value('std_name',isset($result)?$result->name:''), ENT_QUOTES),
                    'placeholder' => 'Enter student name!',
                    'class' => 'form-control',
                    'id' => 'std_name',
                    'autocomplete' => 'new-std_name'));
                  ?>
                <span class="text-danger"><?php echo form_error('std_name'); ?></span>
              </div>
              
              <div class="form-group">
                <?php echo form_label('Email', 'std_email', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_email')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                  echo form_input(array(
                    'name' => 'std_email',
                    'type' => 'text',
                    'value' => html_escape(set_value('std_email',isset($result)?$result->email:''), ENT_QUOTES),
                    'placeholder' => 'Enter email account!',
                    'class' => 'form-control',
                    'id' => 'std_email',
                    'autocomplete' => 'new-std_email'));
                ?>
                <span class="text-danger"><?php echo form_error('std_email'); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('Password', 'std_password', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_password')); ?>
                <span class="badge badge-danger">Required</span>
                <span class="badge badge-info text-light">Note! please default password for offline student (111111)</span>
                <?php
                  echo form_input(array(
                    'name' => 'std_password',
                    'type' => 'password',
                    'value' => "",
                    'placeholder' => 'Enter password!',
                    'class' => 'form-control',
                    'id' => 'std_password',
                    'autocomplete' => 'new-std_password'));
                ?>
                <span class="text-danger"><?php echo form_error('std_password'); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('Confirm Password', 'conf_password', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'conf_password')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                  echo form_input(array(
                    'name' => 'conf_password',
                    'type' => 'password',
                    'value' => "",
                    'placeholder' => 'Enter confirm password!',
                    'class' => 'form-control',
                    'id' => 'conf_password',
                    'autocomplete' => 'new-conf_password'));
                ?>
                <span class="text-danger"><?php echo form_error('conf_password'); ?></span>
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
                <?php
                  echo form_label('Student Photo','userfile', array('class' => 'col-form-label'));
                ?>
                <div class="col-md-12 col-sm-12 p-0">
                  <?php
                    echo form_input(array(
                    'name' => 'userfile',
                    'type' => 'file',
                    'class' => 'form-control',
                    'id' => 'clickImg',
                    'accept' => 'image/*'
                    ));
                  ?>
                </div>
                <span class="text-danger"><?php echo form_error('userfile'); ?></span>
              </div>
              <?php if(!empty($result->image_file)) { ?>
                <img src="<?php echo base_url('upload/assets/adm/usr/'.$result->image_file); ?>" width="200px;" class="pb-1">
              <?php } ?>
              <div class="form-group" id="showImg1"></div>


            </div>

            <div class="col-md-6 float-left">
              <div class="form-group">
                <?php echo form_label('Phone Number', 'phone', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                  echo form_input(array(
                    'name' => 'phone',
                    'type' => 'text',
                    'value' => html_escape(set_value('phone',isset($result)?$result->_phone:''), ENT_QUOTES),
                    'placeholder' => 'Enter phone number!',
                    'class' => 'form-control',
                    'id' => 'phone',
                    'autocomplete' => 'new-phone'));
                ?>
                <span class="text-danger"><?php echo form_error('phone'); ?></span>
              </div>
                  
              <div class="form-group">
                <?php echo form_label('Birthday', 'std_birthday', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_birthday')); ?>
                <?php
                  echo form_input(array(
                    'name' => 'std_birthday',
                    'type' => 'date',
                    'value' => html_escape(set_value('std_birthday',isset($result)?$result->birthday:''), ENT_QUOTES),
                    'placeholder' => 'Enter student birthday (00-00-0000) !',
                    'class' => 'form-control',
                    'id' => 'std_birthday',
                    'autocomplete' => 'new-std_birthday'));
                  ?>
                <span class="text-danger"><?php echo form_error('std_birthday'); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('NRC No.', 'std_nrc', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_nrc')); ?>
                <?php
                  echo form_input(array(
                    'name' => 'std_nrc',
                    'type' => 'text',
                    'value' => html_escape(set_value('std_nrc',isset($result)?$result->nrc:''), ENT_QUOTES),
                    'placeholder' => 'Enter student nrc number!',
                    'class' => 'form-control',
                    'id' => 'std_nrc',
                    'autocomplete' => 'new-std_nrc'));
                  ?>
                <span class="text-danger"><?php echo form_error('std_nrc'); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('Education', 'std_edu', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_nrc')); ?>
                <?php
                  echo form_input(array(
                    'name' => 'std_edu',
                    'type' => 'text',
                    'value' => html_escape(set_value('std_edu',isset($result)?$result->education:''), ENT_QUOTES),
                    'placeholder' => 'Enter education!',
                    'class' => 'form-control',
                    'id' => 'std_edu',
                    'autocomplete' => 'new-std_edu'));
                  ?>
                <span class="text-danger"><?php echo form_error('std_edu'); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('Social Account', 'std_facebook', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_facebook')); ?>
                <?php
                echo form_input(array(
                  'name' => 'std_facebook',
                  'type' => 'text',
                  'value' => html_escape(set_value('std_facebook',isset($result)?$result->social:''), ENT_QUOTES),
                  'placeholder' => 'Enter facebook account!',
                  'class' => 'form-control',
                  'id' => 'std_facebook',
                  'autocomplete' => 'new-std_facebook'));
                ?>
                <span class="text-danger"><?php echo form_error('std_facebook'); ?></span>
              </div>

            <div class="border border-secondary-light25 bg-light p-3 mb-3">
                <div class="form-group">
                    <?php echo form_label('Status', 'std_status', array( 'class' => 'form-control-label', 'id'=> '')); ?>
                    <div class="radio">
                    <label class="col-md-4">
                        <input type="radio" name="std_status" value="1" <?php if(($result->status) == 1) { echo "checked";}?>> Active
                    </label>
                    <label class="col-md-4">
                        <input type="radio" name="std_status" value="0" <?php if(($result->status) == 0) { echo "checked";}?>> Deactive
                    </label>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo form_label('Permission', 'std_permission', array( 'class' => 'form-control-label', 'id'=> '')); ?>
                    <div class="radio">
                    <label class="col-md-4">
                        <input type="radio" name="std_permission" value="1" <?php if(($result->permission) == 1) { echo "checked";}?>> Allow
                    </label>
                    <label class="col-md-4">
                        <input type="radio" name="std_permission" value="0" <?php if(($result->permission) == 0) { echo "checked";}?>> Request
                    </label>
                    </div>
                </div>
            </div>

            </div>
          </div>

          <div class="clearfix"></div>
          <hr class="my-4 dashed clearfix">

          <div class="text-right">
            <button type="submit" class="btn btn-primary text-white btn-sm py-1 px-2">
              <span class="material-icons align-top md-18 mr-1">update</span>Update
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
            $(div).html('<embed src="'+e.target.result+'" width="30%" height="30%">');
        };
        reader.readAsDataURL(input.files[0]);
    }
  }

  $("#clickImg").change(10,function () {
    filePreview(this,"#showImg1");
    $(".pb-1").hide(100);
  });
  </script>