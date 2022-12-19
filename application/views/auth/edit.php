<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?> 
<div class="courseone-area">
  <div class="container">
    <div class="row">
      <?php include("sidebar_dashboard.php"); ?> 
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
  
        <?php if(!empty($_SESSION['msg_success'])){ ?>
          <div class="alert alert-success alert-dismissible show" role="alert">
            <strong>Success!</strong>  <?php echo $_SESSION['msg_success']; ?> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span class="fa fa-close"></span>
            </button>
          </div>
        <?php } ?>    

        <?php if(!empty($_SESSION['msg_error'])){ ?>
          <div class="alert alert-danger alert-dismissible show" role="alert">
            <strong>Warning!</strong>  <?php echo $_SESSION['msg_error']; ?> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-close"></span>
            </button>
          </div>
        <?php } ?>

        <div class="courseone-view right-animate">
          <div class="profile-view right-animate">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="view-area fix">
                  <div class="view-title floatleft">
                    <h4 class="heading-padding"><i class="fa fa-info-circle"></i>&nbsp; Edit Profiles</h4>
                  </div>
                </div>
              </div>
            </div>

            <div class="profile">
              <?php if($result->image_file == "" || file_exists('upload/assets/adm/usr/'.$result->image_file) != 1) { ?>
                <img src="<?php echo base_url('asset/admin/images/user.png'); ?>">
              <?php } else { ?>
                <img src="<?php echo base_url('upload/assets/adm/usr/'.$result->image_file); ?>">
              <?php } ?>
            </div>                    
            <!-- Registration-area start Here -->
              <div class="registration-area">
                <div class="form-controls">
                  <?php
                    $attributes = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('student/edit/', $attributes);
                  ?>
                
                  <div class="registration-form">
                    <label for="name">Student ID</label>
                    <p class="student text-muted"><?php echo $result->student_id; ?></p>

                    <label for="name">Email Address</label>
                    <p class="student text-muted"><?php echo $result->email; ?></p>
                    
                    <?php echo form_label('Name *', 'std_name', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
                    <span class="text-danger"><?php echo form_error('std_name'); ?></span>
                    <?php
                      echo form_input(array(
                        'name' => 'std_name',
                        'type' => 'text',
                        'value' => html_escape(set_value('std_name',isset($result)?$result->name:''), ENT_QUOTES),
                        'placeholder' => 'Enter student name!',
                        'class' => 'form-control',
                        'id' => 'name',
                        'autocomplete' => 'new-name'));
                    ?>
                    
                    <?php echo form_label('Phone Number *', 'phone', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'phone')); ?>
                    <span class="text-danger"><?php echo form_error('phone'); ?></span>
                      <?php
                        echo form_input(array(
                          'name' => 'phone',
                          'type' => 'text',
                          'value' => html_escape(set_value('phone',isset($result)?$result->phone:''), ENT_QUOTES),
                          'placeholder' => 'Enter phone number!',
                          'class' => 'form-control',
                          'id' => 'phone',
                          'autocomplete' => 'new-phone'));
                      ?>
                      
                      <?php echo form_label('Password', 'std_password', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_password')); ?>
                      <span class="text-danger"><?php echo form_error('std_password'); ?></span>
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
                      
                      <?php echo form_label('Confirm Password', 'conf_password', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'conf_password')); ?>
                      <span class="text-danger"><?php echo form_error('conf_password'); ?></span>
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
                      
                    <?php
                      echo form_label('Address','address', array('class' => 'col-form-label'));
                    ?>
                    <span class="text-danger"><?php echo form_error('address'); ?></span>
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
                    
                    <?php echo form_label('Birthday', 'std_birthday', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_birthday')); ?>
                    <span class="text-danger"><?php echo form_error('std_birthday'); ?></span>
                    <?php
                      echo form_input(array(
                        'name' => 'std_birthday',
                        'type' => 'text',
                        'value' => html_escape(set_value('std_birthday',isset($result)?$result->birthday:''), ENT_QUOTES),
                        'placeholder' => 'Enter student birthday!',
                        'class' => 'form-control',
                        'id' => 'std_birthday',
                        'autocomplete' => 'new-std_birthday'));
                      ?>
                    
                    <?php echo form_label('NRC No.', 'std_nrc', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_nrc')); ?>
                    <span class="text-danger"><?php echo form_error('std_nrc'); ?></span>
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
                    
                    <?php echo form_label('Education', 'std_edu', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_nrc')); ?>
                    <span class="text-danger"><?php echo form_error('std_edu'); ?></span>
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

                    <?php echo form_label('Social Account', 'std_facebook', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_facebook')); ?>
                    <span class="text-danger"><?php echo form_error('std_facebook'); ?></span>
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
                  </div>

                    <?php
                    echo form_label('Student Photo','userfile', array('class' => 'col-form-label'));
                    ?>
                    <span class="text-warning" style="font-size: 12px;">(max size - 1024px x 1024px)</span>
                    <span class="text-danger"><?php echo form_error('userfile'); ?></span>
                      <?php
                        echo form_input(array(
                        'name' => 'userfile',
                        'type' => 'file',
                        'class' => 'form-control',
                        'id' => 'clickImg',
                        'accept' => 'image/*'
                        ));
                      ?>
                  <button href="edit_profile.html" class="btn-hr edit-btn">&nbsp;Update Profile</button>
                </form>
              </div>
            </div>
            <!-- Registration-area start Here -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
  .form-controls {
    width: 80%;
    margin: 0 auto;
}
.profile-view h2 {
    text-align: center;
    margin-bottom: 0px;
    color: #c71507;
    padding-bottom: 10px;
    position: relative;
}
.profile-view h2:after {
    position: absolute;
    content: "";
    width: 60px;
    height: 3px;
    background: #c61508;
    left: 39%;
    bottom: 0;
}
.registration-area {
    padding: 15px 0;
    overflow: hidden;
}
.form-controls form textarea {
    width: 100%;
    margin-bottom: 20px;
    height: 70px;
    padding: 10px;
    font-size: 16px;
    color: #444444;
    border: 1px solid #dddddd;
    resize: none;
}
textarea:focus {
    outline: none;
}
.profile-view p.student {
    width: 100%;
    /* margin-bottom: 20px; */
    height: 45px;
    /* padding: 10px; */
    font-size: 16px;
    /* color: #444444; */
    text-align: left;
    /* border: 1px solid #dddddd; */
}
.form-controls form input.addr{
    width: 100%;
    margin-bottom: 20px;
    height: 80px;
    padding: 10px;
    font-size: 16px;
    color: #444444;
    border: 1px solid #dddddd;
}
.profile {
    width: 150px;
    height: 150px;
    overflow: hidden;
    margin: 20px auto;
    border-radius: 100px;
}
@media screen and (max-width: 768px)
{
.form-controls {
    width: 100%;
    margin: 0 auto;
}
.profile {
    width: 100px;
    height: 100px;
    overflow: hidden;
    margin: 20px auto;
    border-radius: 100px;
}
.profile-view p.student {
    width: 100%;
    /* margin-bottom: 20px; */
    height: 45px;
    /* padding: 10px; */
    font-size: 16px;
    color: #444444;
    text-align: left;
    /* border: 1px solid #dddddd; */
}
textarea:focus {
    outline: none;
}
.profile-view h2:after {
    position: absolute;
    content: "";
    width: 60px;
    height: 3px;
    background: #c61508;
    left: 42%;
    bottom: 0;
}
.form-controls form label {
    display: block;
    font-size: 16px;
}
.form-controls form label {
    margin-bottom: 0px;
}
}
</style>

<?php include(dirname(__FILE__) ."/../template/footer.php"); ?> 