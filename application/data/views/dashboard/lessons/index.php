<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>            
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title">Lessons Management</h1>
    </div> 
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <button class="btn btn-secondary py-1 px-2" data-toggle="modal" data-target="#addNoteModal"><span class="material-icons align-text-bottom">add_circle</span></button>
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

  <?php if(form_error('name') != "") {  ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Alert!</strong> <?php echo form_error('name'); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" class="material-icons md-18">clear</span>
      </button>
    </div>
  <?php } ?>

  <?php if(form_error('course') != "") {  ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Alert!</strong> <?php echo form_error('course'); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" class="material-icons md-18">clear</span>
      </button>
    </div>
  <?php } ?>
	
    <?php if(form_error('lecture') != "") {  ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Alert!</strong> <?php echo form_error('lecture'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" class="material-icons md-18">clear</span>
          </button>
      </div>
    <?php } ?>
	
	<?php if(form_error('hours') != "") {  ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Alert!</strong> <?php echo form_error('hours'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" class="material-icons md-18">clear</span>
          </button>
      </div>
	<?php } ?>

  <div class="card">
    <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped bg-white text-nowrap" id="studentDataOnline">
      <thead>
        <tr class="text-center">
        <th width="1">#</th>
        <th>Course Name</th>
        <th>Created Date</th>
        <th>Updated Date</th>
        <th>State </th>
        <th width="1">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $x = 1;
        foreach ($lists as $row) { ?>
        <tr>
          <th class="text-right"><?php echo $x; ?> </th>
          <td class="text-left">
            <?php echo $row->cos_title; ?>
            <a href="<?php echo base_url('adm/portal/lessons/view/'.$row->id); ?>" class="text-secondary ml-1" data-toggle="tooltip" data-placement="top" title="View Lessons"><span class="material-icons align-middle md-18 text-dark">video_library</span>
            </a>&nbsp;&nbsp;<a href="<?php echo base_url('adm/portal/lessons/part/'.$row->id); ?>" class="text-secondary ml-1" data-toggle="tooltip" data-placement="top" title="View Part List"><span class="material-icons align-middle md-18 text-dark">device_hub</span></a>
          </td>
          <td class="text-center"><?php echo $row->created_at; ?></td>
            <td class="text-center"><?php echo $row->updated_at; ?></td>
          <td class="text-center">
	          <?php if($row->status == 1) { ?>
                <span class="badge badge-success text-white">Public</span>
	          <?php } else { ?>
                <span class="badge badge-dark text-white">Private</span>
	          <?php } ?>
          </td>
          
          <td class="text-center"><a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
            <span class="material-icons md-20 align-middle">more_vert</span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="<?php echo base_url('adm/portal/lessons/edit/'.$row->id); ?>">Edit</a>
              <a onclick="return confirm('Are you want to delete this data?');" class="dropdown-item" href="<?php echo base_url('adm/portal/lessons/delete/'.$row->id); ?>">Delete</a>
            </div>
          </td>
        </tr>
        <?php $x++; } ?>
      </tbody>
    </table>
    </div>
    </div>
  </div>

  <?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>

  <!-- Modal -->
    <div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog col-11 p-0" role="document">
        <div class="modal-content">
          <?php
            $attributes = array('class' => '');
            echo form_open('adm/portal/lessons', $attributes);
          ?>
          <div class="modal-header px-4">
            <h5 class="modal-title" id="exampleModalLabel">Add Lesson Title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="material-icons ">close</span>
            </button>
          </div>

          <div class="modal-body p-4">
            <div class="form-group">
              <?php echo form_label('Course', 'course', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
              $setarray = array( 'class' => 'form-control', 'style' => '');
              echo form_dropdown(
                'course',  //dropdown name
                $course,
                set_value('course',isset($result)?$result->cos_id:''),
                $setarray
              );
              ?>
            </div>

          <div class="form-group">
            <?php
              echo form_label('Lesson Description','name', array('class' => ''));
            ?>
            <span class="badge badge-danger">Required</span>
            <div class="col-md-12 col-sm-12 p-0">
              <?php 
                $data = array(
                'name' => 'description',
                'value' => '',
                'rows' => '13',
                'cols' => '',
                'placeholder' => 'Enter Content',
                'class' => "form-control",
                'value' => html_escape(set_value('description',isset($result)?$result->description:''), ENT_NOQUOTES)
              );
              echo form_textarea($data); ?>
              <span class="text-danger"><?php echo form_error('description'); ?></span>
            </div>
          </div>
          
          <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0">Status</legend>
              <div class="col-sm-10">
                <div class="form-check col-md-3 float-left">
                  <input class="form-check-input" type="radio" id="status1" name="status" value="1">
                  <label class="form-check-label" for="status1">Public</label>
                </div>
                <div class="form-check col-md-3 float-left">
                  <input class="form-check-input" type="radio" id="status2" name="status" value="0" checked="checked">
                  <label class="form-check-label" for="status2">Private</label>
                </div>
              </div>
            </div>
          </fieldset>

          <div class="modal-footer px-4">
            <button type="button" class="btn btn-sm btn-secondary text-white" data-dismiss="modal"><span class="material-icons align-top md-18 mr-1">close</span> Close</button>
            <button type="submit" class="btn btn-sm btn-primary text-white"><span class="material-icons align-top md-18 mr-1">add_circle</span> Add New</button>
          </div>
        </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<!-- Modal -->
