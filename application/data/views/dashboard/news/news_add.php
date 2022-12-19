<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
	<div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title">Add News</h1>
    </div>

        <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      
      <a href="<?php echo base_url('adm/portal/news'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>
      
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
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-body">
          <?php
            $attributes = array('class' => 'form-horizontal form-label-left');
            echo form_open_multipart('adm/portal/news/add', $attributes);
          ?>

          <div class="col-lg-12 col-md-12 float-left">
            <div class="form-group">
              <?php echo form_label('News Title', 'title', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
                echo form_input(array(
                'name' => 'title',
                'type' => 'text',
                'value' => html_escape(set_value('title',isset($result)?$result->title:''), ENT_QUOTES),
                'placeholder' => 'Enter course title!',
                'class' => 'form-control',
                'id' => ''));
              ?>
              <span class="text-danger"><?php echo form_error('title'); ?></span>
            </div>
            
            <div class="form-group">
              <?php
                echo form_label('Main Content','description', array('class' => 'col-form-label'));
              ?>
              <span class="badge badge-danger">Required</span>
              <div class="col-md-12 col-sm-12 p-0">
                <?php 
                  $data = array(
                  'name' => 'content',
                  'value' => '',
                  'rows' => '6',
                  'cols' => '',
                  'placeholder' => 'Enter Content',
                  'class' => "form-control",
                  'value' => html_escape(set_value('content',isset($result)?$result->content:''), ENT_NOQUOTES)
                );
                echo form_textarea($data); ?>
                <span class="text-danger"><?php echo form_error('content'); ?></span>
              </div>
						</div>
						

            <div class="form-group">
              <?php echo form_label('Tags', 'tags', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
              $setarray = array( 'class' => 'form-control', 'style' => '');
              echo form_dropdown(
                'tags',  //dropdown name
                $tags,
                set_value('tags',isset($result)?$result->tags_id:''),
                $setarray
              );
              ?>
              <span class="text-danger"><?php echo form_error('tags'); ?></span>
            </div>
							
						<?php
            if(isset($result->cos_image)){
              echo '<img src="'.base_url().'uploads/other/'.$result->cos_image.'">';
            } else { ?>
              <div class="form-group">
                <?php echo form_label('News Cover Image', 'userfile',  array( 'class' => '', 'id' => '', 'style' => 'margin-bottom:10px')); ?>
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
          <?php } ?>

            <div class="form-group">
              <?php echo form_label('Permission', 'status', array( 'class' => 'form-control-label', 'id'=> '')); ?>

              <div class="radio">
                <label class="col-md-2">
                  <input type="radio" name="status" value="1" > Public
                </label>
                <label class="col-md-2">
                  <input type="radio" name="status" value="0" checked="checked"> Privated
                </label>
              </div>
            </div>
					</div>          

        	<div class="clearfix"></div>
            <hr class="my-4 dashed clearfix">
            <button type="submit" class="btn btn-primary text-white btn-sm py-1 px-2 float-right">
              <span class="material-icons align-top md-18 mr-1">add_circle</span>Submit
            </button>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url('asset/admin/js/ckeditor/ckeditor.js'); ?>"></script>
<script>
    CKEDITOR.replace('content');
</script>
<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>