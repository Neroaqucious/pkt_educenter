<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>            
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title">Student Management</h1>
    </div>
    
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a href="<?php echo base_url('adm/portal/student/add'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">add_circle</span></a>
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
    <div class="">
      <table class="table table-striped bg-white text-nowrap table-responsive" id="studentDataOnline">
      <thead>
        <tr class="text-center">
          <th>#</th>
          <th width="1">Student ID&nbsp;<a href="#" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-secondary">notifications_active</span></a>&nbsp;</th>
          <th>Student Name</th>
          <th>Student Email</th>
          <th>Phone Number</th>
          <th>Address</th>
          <th>Request Date</th>
          <th>Activate Date</th>
          <th width="1">State/Permission/Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $x = 1;
          $y = 0;
          foreach ($lists as $row) {
        ?>
        <tr>
          <th class="text-right"><?php echo $x; ?></th>
          <th width="1" class="text-left">
          <?php echo $row->user_id; ?>
            <span class="text-left">
              <?php foreach($course as $result) {
                if($row->id == $result->std_id && $result->status == 0) { $y++;
                } else { $y = 0; } ?>
                <?php if($y > 0) { 
                  if($y == 1) { ?>
                  <a href="<?php echo base_url('adm/portal/student/view/'.$row->id); ?>" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-danger">notifications_active</span></a>
              <?php } } } ?>
            </span>
          </th>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/student/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->name; ?></a>
          </td>
          <td class="text-left"><?php echo $row->email; ?></td>
          <td class="text-center"><?php echo $row->phone; ?></td>
          <td class="text-left"><?php if($row->address != "") { echo $row->address; } else { echo "not set"; }?></td>
          <td class="text-center"><?php echo $row->request_date; ?></td>
          <td class="text-center"><?php if($row->activate_date == "30-11--0001 00:00:00"){ echo " - "; } else { echo $row->activate_date; } ?></td>
          <td class="text-center">
            <?php if($row->status == 1) { ?>
              <a class="text-success" onclick="return confirm('Are you want to deactive this student status?');" data-toggle="tooltip" data-placement="top" title="Active" href="<?php echo base_url('adm/portal/student/deactivated/'.$row->id); ?>"><span class="material-icons align-middle md-18">check_circle</span></a>
            <?php } else { ?>
              <a class="text-secondary" onclick="return confirm('Are you want to active this student status?');" data-toggle="tooltip" data-placement="top" title="Request" href="<?php echo base_url('adm/portal/student/activated/'.$row->id); ?>"><span class="material-icons align-middle md-18">remove_circle_outline</span></a>
            <?php } ?>
            <?php if($row->permission == 1) { ?>
              <a class="text-success" onclick="return confirm('Are you want to deactive this course permission?');" data-toggle="tooltip" data-placement="top" title="Allow" href="<?php echo base_url('adm/portal/student/permission/deactivated/'.$row->id); ?>"><span class="material-icons align-middle md-18">check_circle</span></a>
            <?php } else { ?>
              <a class="text-secondary" onclick="return confirm('Are you want to active this course permission?');" data-toggle="tooltip" data-placement="top" title="Request" href="<?php echo base_url('adm/portal/student/permission/activated/'.$row->id); ?>"><span class="material-icons align-middle md-18">remove_circle_outline</span></a>
            <?php } ?>
          <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
            <span class="material-icons md-20 align-middle">more_vert</span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="<?php echo base_url('adm/portal/student/view/'.$row->id); ?>">View</a>
              <a class="dropdown-item" href="<?php echo base_url('adm/portal/student/edit/'.$row->id); ?>">Edit</a>
              <a onclick="return confirm('Are you want to delete this data?');" class="dropdown-item" href="<?php echo base_url('adm/portal/student/delete/'.$row->id); ?>">Delete</a>
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