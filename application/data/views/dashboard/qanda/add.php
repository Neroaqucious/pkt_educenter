<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <h1 class="weight-300 h3 title">Add QandA</h1>
    </div>
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
        <div class="controls d-flex justify-content-center justify-content-md-end float-right">
			<a href="<?php echo base_url('adm/portal/qanda'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>
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
            echo form_open_multipart('adm/portal/qanda/add', $attributes);
          ?>

          <div class="col-lg-12 col-md-12">
            <div class="form-group">
              <?php echo form_label('Question', 'question', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
                echo form_input(array(
                'name' => 'question',
                'type' => 'text',
                'value' => html_escape(set_value('question',isset($result)?$result->question:''), ENT_QUOTES),
                'placeholder' => 'Enter question !',
                'class' => 'form-control',
                'id' => ''));
              ?>
              <span class="text-danger"><?php echo form_error('question'); ?></span>
            </div>
            
            <div class="form-group">
              <?php
                echo form_label('Answer','answer', array('class' => 'col-form-label'));
              ?>
              <span class="badge badge-danger">Required</span>
              <div class="col-md-12 col-sm-12 p-0">
                <?php 
                  $data = array(
                  'name' => 'answer',
                  'value' => '',
                  'rows' => '6',
                  'cols' => '',
                  'placeholder' => 'Enter answer',
                  'class' => "form-control",
                  'value' => html_escape(set_value('answer',isset($result)?$result->answer:''), ENT_NOQUOTES)
                );
                echo form_textarea($data); ?>
                <span class="text-danger"><?php echo form_error('answer'); ?></span>
              </div>
            </div>

            <div class="form-group">
              <?php echo form_label('Permission', 'status', array( 'class' => 'form-control-label', 'id'=> '')); ?>

              <div class="radio">
                <label class="col-md-2">
                  <input type="radio" name="status" value="1" > Public
                </label>
                <label class="col-md-2">
                  <input type="radio" name="status" value="0" checked="checked"> Private
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
    CKEDITOR.replace('answer');
</script>
<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>