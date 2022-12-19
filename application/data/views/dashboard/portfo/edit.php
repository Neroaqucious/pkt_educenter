<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
	<div class="row page-tilte align-items-center">
		<div class="col-md-auto">
			<a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
			<h1 class="weight-300 h3 title border-left border-success pl-2 border-width-medium">Edit Portfolio</h1>
			<p class="text-muted m-0 desc">All activity portfolies</p>
		</div>

				<div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
			<div class="controls d-flex justify-content-center justify-content-md-end float-right">
			
			<a href="<?php echo base_url('adm/portfo'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>
			
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
            echo form_open_multipart('adm/portfo/edit/'.$result->id, $attributes);
          ?>

          <div class="col-lg-12 col-md-12 float-left">
            <div class="form-group">
              <?php echo form_label('Portfo Title', 'title', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
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
            if(isset($result->photo)){
              echo '<img src="'.base_url().'upload/other/'.$result->photo.'" style="width:250px;">';
            } ?>
              <div class="form-group">
                <?php echo form_label('Cover Image', 'userfile',  array( 'class' => '', 'id' => '', 'style' => 'margin-bottom:10px')); ?>
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
              <?php echo form_label('Permission', 'status', array( 'class' => 'form-control-label', 'id'=> '')); ?>

              <div class="radio">
                <label class="col-md-2">
                  <input type="radio" name="status" value="1" <?php if(($result->status) == 1) { echo "checked";}?>> Public
                </label>
                <label class="col-md-2">
                  <input type="radio" name="status" value="0" <?php if(($result->status) == 0) { echo "checked";}?>> Privated
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