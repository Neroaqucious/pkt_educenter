<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title">Edit Course</h1>
    </div>

    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a href="<?php echo base_url('adm/portal/course'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>
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
            echo form_open_multipart('adm/portal/course/edit/'.$result->id, $attributes);
          ?>

          <div class="col-lg-8 col-md-8 float-left">
            <div class="form-group">
              <?php echo form_label('Course Title', 'name', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
                echo form_input(array(
                'name' => 'name',
                'type' => 'text',
                'value' => html_escape(set_value('name',isset($result)?$result->cos_title:''), ENT_QUOTES),
                'placeholder' => 'Enter course title!',
                'class' => 'form-control',
                'id' => ''));
              ?>
              <span class="text-danger"><?php echo form_error('name'); ?></span>
            </div>
            

            <div class="form-group">
              <?php
                echo form_label('Description','desc', array('class' => 'col-form-label'));
              ?>
              <span class="badge badge-danger">Required</span>

              <textarea name="desc" cols="" rows="6" placeholder="Enter description" class="form-control">
                <?php echo html_escape(set_value('desc',isset($result)?$result->cos_des1:''), ENT_NOQUOTES); ?>
              </textarea>
                <span class="text-danger"><?php echo form_error('desc'); ?></span>
            </div>
	
            <?php
	          if(!empty($result->cos_image)){
		          echo '<img src="'.base_url().'upload/assets/adm/cos/'.$result->cos_image.'" style="width:90px;">';
	          } ?>
              <div class="form-group">
                  <?php echo form_label('Course Cover', 'userfile',  array( 'class' => '', 'id' => '', 'style' => 'margin-bottom:10px')); ?>
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
          </div>
          
          <div class="col-lg-4 col-md-4 float-left">

            <div class="form-group">
              <?php echo form_label('Slug Name', 'slug', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
                echo form_input(array(
                'name' => 'slug',
                'type' => 'text',
                'value' => html_escape(set_value('slug',isset($result)?$result->slug_name:''), ENT_QUOTES),
                'placeholder' => 'Enter course slug!',
                'class' => 'form-control',
                'id' => ''));
              ?>
              <span class="text-danger"><?php echo form_error('slug'); ?></span>
            </div>

            <div class="form-group">
              <?php echo form_label('Subcategory', 'subcategory', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
              $setarray = array( 'class' => 'form-control', 'style' => '');
              echo form_dropdown(
                'subcategory',  //dropdown name
                $topic,
                set_value('subcategory',isset($result)?$result->subcat_id:''),
                $setarray
              );
              ?>
              <span class="text-danger"><?php echo form_error('subcategory'); ?></span>
            </div>
            
            <div class="form-group">
              <?php echo form_label('Course Level', 'level', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
              $setarray = array( 'class' => 'form-control', 'style' => '');
              echo form_dropdown(
                'level',  //dropdown name
                $level,
                set_value('level',isset($result)?$result->level_id:''),
                $setarray
              );
              ?>
              <span class="text-danger"><?php echo form_error('level'); ?></span>
            </div>
              
              <div class="border border-secondary-light25 bg-light p-3 mb-3">
              <div class="form-group">
                <?php echo form_label('Class', 'default_key', array( 'class' => 'form-control-label', 'id'=> '')); ?>

                <div class="form-check">
                  <label class="weight-400 col-md-4 p-0 form-check-label">
                    <input type="radio" name="default_key" value="online" <?php if(($result->ref_key) == "online") { echo "checked";}?>> Online
                  </label>
                  <label class="weight-400 col-md-4 p-0 form-check-label">
                    <input type="radio" name="default_key" value="offline" <?php if(($result->ref_key) == "offline") { echo "checked";}?>> Offline
                  </label>
                </div>
              </div>

              <div class="form-group">
                <?php echo form_label('Permission', 'status', array( 'class' => 'form-control-label', 'id'=> '')); ?>
                <div class="form-check">
                  <label class="weight-400 col-md-4 p-0 form-check-label">
                    <input type="radio" name="status" value="1" <?php if(($result->status) == 1) { echo "checked";}?>> Public
                  </label>
                  <label class="weight-400 col-md-4 p-0 form-check-label">
                    <input type="radio" name="status" value="0" <?php if(($result->status) == 0) { echo "checked";}?>> Private
                  </label>
                </div>
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

<script type="text/javascript" src="<?php echo base_url('asset/admin/js/ckeditor/ckeditor.js'); ?>"></script>
<script>
    CKEDITOR.replace('desc');
</script>
<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>
