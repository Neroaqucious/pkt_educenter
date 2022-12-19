<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>            
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>
  <div class="content-wrapper">
    <div class="row page-tilte align-items-center">
      <div class="col-md-auto">
        <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
        <h1 class="weight-300 h3 title">Course Management</h1>
      </div> 
      <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
        <div class="controls d-flex justify-content-center justify-content-md-end float-right">
        <a href="<?php echo base_url('adm/portal/course/add'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">add_circle</span></a>
        <span class="dropdown">
          <button type="button" id="downloadGrid1" data-toggle="dropdown" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">save_alt</span></button>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="downloadGrid1">
            <a class="dropdown-item" href="#">CSV (Online)</a>
            <a class="dropdown-item" href="#">CSV (Local)</a>
          </div>
        </span>
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

  <div class="card">
    <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped bg-white text-nowrap" id="studentDataOnline">
      <thead>
        <tr class="text-center">
            <th>#</th>
            <th>Cover</th>
            <th>Course Name</th>
            <th>Slug Name</th>
            <th>Subcategory</th>
            <th>Class</th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th>State </th>
            <th width="1">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $x = 1;
          foreach($lists as $row) { 
        ?>
        <tr>
          <th class="text-right"><?php echo $x; ?></th>
          <td>
            <div style="height: 50px;clear:both;overflow: hidden;text-align: center;">
            <a href="<?php echo base_url($row->cos_thumb); ?>" data-gallery="example-gallery" data-toggle="lightbox">
              <img src="<?php echo base_url($row->cos_thumb); ?>" width="60" class="img-thumbnail bg-white img-fluid mb-4">
            </a>
            </div>
          </td>
          <td class="text-left weight-400">
          <a href="<?php echo base_url('adm/portal/course/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Course Detail">
            <?php echo $row->cos_title; ?>
          </a>
          </td>
            <td class="text-center"><a href="<?php echo base_url('course/detail/'.$row->slug_name); ?>" class="text-primary ml-1" data-toggle="tooltip" data-placement="top" title="View Course Detail" target="_blank"><?php echo $row->slug_name; ?></a></td>
            <td class="text-center"><?php echo $row->subcategory; ?></td>
            <td class="text-center"><?php echo $row->ref_key; ?> class</td>
            <td><?php echo $row->created_at; ?></td>
            <td><?php echo $row->updated_at; ?></td>
            <td class="text-center">
	          <?php if($row->status == 1) { ?>
                <span class="badge badge-success text-white">public</span>
	          <?php } else { ?>
                <span class="badge badge-dark text-white">privated</span>
	          <?php } ?>
            </td>
            <td class="text-center">
                <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
                <span class="material-icons md-20 align-middle">more_vert</span></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
                  <a class="dropdown-item" href="<?php echo base_url('adm/portal/course/edit/'.$row->id); ?>">Edit</a>
                  <a onclick="return confirm('Are you want to delete this data?');"  class="dropdown-item" href="<?php echo base_url('adm/portal/course/delete/'.$row->id); ?>">Delete</a>
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