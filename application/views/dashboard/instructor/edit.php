<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
	<div class="row page-tilte align-items-center">
		<div class="col-md-auto">
			<a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
			<h1 class="weight-300 h3 title border-left border-success pl-2 border-width-medium">Edit Instructor</h1>
		</div>

				<div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
			<div class="controls d-flex justify-content-center justify-content-md-end float-right">
			
			<a href="<?php echo base_url('adm/portal/instructor'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>
			
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
                echo form_open_multipart('adm/portal/instructor/edit/'.$result->id, $attributes);
            ?>
            <div class="form-group">
                <?php echo form_label('Instructor Name', 'tra_name', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                echo form_input(array(
                    'name' => 'tra_name',
                    'type' => 'text',
                    'value' => html_escape(set_value('tra_name',isset($result)?$result->name:''), ENT_QUOTES),
                    'placeholder' => 'Enter trainer name!',
                    'class' => 'form-control',
                    'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('tra_name'); ?></span>
            </div>

            <div class="form-group">
                <?php echo form_label('Email', 'tra_email', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                echo form_input(array(
                    'name' => 'tra_email',
                    'type' => 'text',
                    'value' => html_escape(set_value('tra_email',isset($result)?$result->email:''), ENT_QUOTES),
                    'placeholder' => 'Enter email !',
                    'class' => 'form-control',
                    'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('tra_email'); ?></span>
            </div>

            <div class="form-group">
                <?php echo form_label('Phone Number', 'tra_phone', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                echo form_input(array(
                    'name' => 'tra_phone',
                    'type' => 'text',
                    'value' => html_escape(set_value('tra_phone',isset($result)?$result->phone_:''), ENT_QUOTES),
                    'placeholder' => 'Enter phone number!',
                    'class' => 'form-control',
                    'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('tra_phone'); ?></span>
            </div>

            <div class="form-group">
                <?php echo form_label('Leature', 'tra_course', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                echo form_input(array(
                    'name' => 'tra_course',
                    'type' => 'text',
                    'value' => html_escape(set_value('tra_course',isset($result)?$result->course:''), ENT_QUOTES),
                    'placeholder' => 'Enter training course!',
                    'class' => 'form-control',
                    'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('tra_course'); ?></span>
            </div>

            <div class="form-group">
                <?php echo form_label('Education', 'tra_education', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                echo form_input(array(
                    'name' => 'tra_education',
                    'type' => 'text',
                    'value' => html_escape(set_value('tra_education',isset($result)?$result->education:''), ENT_QUOTES),
                    'placeholder' => 'Enter education!',
                    'class' => 'form-control',
                    'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('tra_education'); ?></span>
            </div>
            
            <div class="form-group">
                <?php echo form_label('Description', 'tra_description', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <?php
                echo form_input(array(
                    'name' => 'tra_description',
                    'type' => 'text',
                    'value' => html_escape(set_value('tra_description',isset($result)?$result->description:''), ENT_QUOTES),
                    'placeholder' => 'Enter education!',
                    'class' => 'form-control',
                    'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('tra_description'); ?></span>
            </div>
    
            <?php
            if(!empty($result->images)){
              echo '<img src="'.base_url().'upload/assets/adm/inst/'.$result->images.'" style="width:90px;">';
            } ?>
              <div class="form-group">
                <?php echo form_label('Upload Photo', 'userfile',  array( 'class' => '', 'id' => '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <span class="badge badge-warning text-light">Only <?php echo ini_get('upload_max_filesize'); ?>!</span>
            
              <?php
                echo form_input(array(
                  'name' => 'userfile',
                  'type' => 'file',
                  'class' => 'form-control-file'
                ));
              ?>
              <span class="text-danger"><?php echo form_error( 'userfile' ); ?></span>
            </div>
					
            <div class="form-group">
              <?php echo form_label('Permission', 'tra_status', array( 'class' => 'form-control-label', 'id'=> '')); ?>

              <div class="radio">
                <label class="col-md-2">
                  <input type="radio" name="tra_status" value="1" <?php if(($result->status) == 1) { echo "checked";}?>> Public
                </label>
                <label class="col-md-2">
                  <input type="radio" name="tra_status" value="0" <?php if(($result->status) == 0) { echo "checked";}?>> Privated
                </label>
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