<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>            
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

  <div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title">Batch Management</h1>
    </div> 
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a href="<?php echo base_url('adm/portal/batch/add'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">add_circle</span></a>
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
    <div class="card-header bg-dark text-light">Online <span class="text-success">Batches</span></div>
    <div class="card-body">
    <div class="">
    <table class="table table-striped bg-white text-nowrap table-responsive" id="studentDataOnline">
      <thead>
        <tr class="text-center">
          <th>#</th>
          <th>Batch ID</th>
          <th>Course Name</th>
          <th>Total Member</th>
          <th>Course Fees</th>
          <th>Start Date</th>
          <th>Duration</th>
          <th>Released Date</th>
          <th>Closed Date</th>
          <th width="1">Live/State</th>
          <th width="1">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $x = 1;
          $remainder = "";
          foreach($lists1 as $row) { 
            if(date_different(date('d-m-Y'), $row->start_date) > 1) {
              $remainder = date_different(date('d-m-Y'), $row->start_date)." days remain!";
            } else {
              $remainder = date_different(date('d-m-Y'), $row->start_date)." days over!";
            }
          ?>
          <tr>
            <th class="text-right"><?php echo $x; ?></th>
            <th class="text-left">
            <a href="<?php echo base_url('adm/portal/batch/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Batch Detail">
                <?php echo $row->batch_id; ?>
              </a>
            </th>
            <td><?php echo $row->title; ?></td>
            <td class="text-center"><?php if($row->member == 0) { echo "unlimited!"; } else { echo $row->member." Nos"; } ?></td>
            <td class="text-right"><?php echo number_format($row->fees); ?> MMK</td>
            <td class="text-center text-info weight-300">
            <?php if($row->liveclass == "on") { ?>
              <a href="#"data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $remainder; ?>"><?php echo date('d-m-Y', strtotime($row->start_date)); ?></a>
              <?php } else { ?>
                -
              <?php } ?>
            </td>
            <td class="text-center">
              <?php if($row->liveclass == "on") { ?>
                <?php echo $row->month_duration; ?> Months <?php if($row->day_duration == 0) { echo ""; } else { echo $row->day_duration." days"; }?>
              <?php } else { ?>
                -
              <?php } ?>
            </td>
            <td class="text-center"><?php echo $row->released_date; ?></td>
            <td class="text-center"><?php echo $row->closed_date; ?></td>
            <td class="text-center">
              <?php if(compare_date(date('Y-m-d', strtotime($row->released_date)), date('Y-m-d', strtotime($row->closed_date))) ) { ?>
                <a href="#" class="text-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Batch is live now!"><span class="material-icons align-middle md-18 text-success">check_circle</span></a>
              <?php } else { ?>
                <a href="#" class="text-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Batch is expired!"><span class="material-icons align-middle md-18 text-dark">remove_circle_outline</span></a>
              <?php } ?>
	            <?php if($row->status == 1) { ?>
                  <span class="badge badge-success text-white">public</span>
	            <?php } else { ?>
                  <span class="badge badge-dark text-white">privated</span>
	            <?php } ?>
            </td>
            <td class="text-center"><a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
              <span class="material-icons md-20 align-middle">more_vert</span></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
                <a class="dropdown-item" href="<?php echo base_url('adm/portal/batch/edit/'.$row->id); ?>">Edit</a>
                <a onclick="return confirm('Are you want to delete this data?');" class="dropdown-item" href="<?php echo base_url('adm/portal/batch/delete/'.$row->id); ?>">Delete</a>
              </div>
            </td>
          </tr>
        <?php $x++; } ?>
      </tbody>
    </table>
    </div>
    </div>
  </div>

  <div class="clearfix"></div>
  <hr class="my-4 dashed clearfix">
  
  <div class="card">
  <div class="card-header bg-dark text-light">Offline <span class="text-success">Batches</span></div>
    <div class="card-body">
    <div class="">
      <table class="table table-striped bg-white text-nowrap table-responsive" id="">
      <thead>
        <tr class="text-center">
          <th>#</th>
          <th>Batch ID</th>
          <th>Course Name</th>
          <th>Total Member</th>
          <th>Course Fees</th>
          <th>Start Date</th>
          <th>Duration</th>
          <th>Released Date</th>
          <th>Closed Date</th>
          <th width="1">Live/State</th>
          <th width="1">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $x = 1;
          $remainder = "";
          foreach($lists2 as $row) { 
            if(date_different(date('d-m-Y'), $row->start_date) > 1) {
              $remainder = date_different(date('d-m-Y'), $row->start_date)." days remain!";
            } else {
              $remainder = date_different(date('d-m-Y'), $row->start_date)." days over!";
            }
          ?>
          <tr>
            <th class="text-right"><?php echo $x; ?></th>
            <th class="text-left">
            <a href="<?php echo base_url('adm/portal/batch/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Batch Detail">
                <?php echo $row->batch_id; ?>
              </a>
            </th>
            <td><?php echo $row->title; ?></td>
            <td class="text-center"><?php if($row->member == 0) { echo "unlimited!"; } else { echo $row->member." Nos"; } ?></td>
            <td class="text-right"><?php echo number_format($row->fees); ?> MMK</td>
            <td class="text-center text-info weight-300"><a href="#"data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $remainder; ?>"><?php echo date('d-m-Y', strtotime($row->start_date)); ?></a></td>
            <td class="text-center"><?php echo $row->month_duration; ?> Months <?php if($row->day_duration == 0) { echo ""; } else { echo $row->day_duration." days"; }?></td>
            <td class="text-center"><?php echo $row->released_date; ?></td>
            <td class="text-center"><?php echo $row->closed_date; ?></td>
            <td class="text-center">
              <?php if(compare_date(date('Y-m-d', strtotime($row->released_date)), date('Y-m-d', strtotime($row->closed_date))) ) { ?>
                <a href="#" class="text-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Batch is live now!"><span class="material-icons align-middle md-18 text-success">check_circle</span></a>
              <?php } else { ?>
                <a href="#" class="text-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Batch is expired!"><span class="material-icons align-middle md-18 text-dark">remove_circle_outline</span></a>
              <?php } ?>
	            <?php if($row->status == 1) { ?>
                  <span class="badge badge-success text-white">public</span>
	            <?php } else { ?>
                  <span class="badge badge-dark text-white">privated</span>
	            <?php } ?>
            </td>
            <td class="text-center"><a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
              <span class="material-icons md-20 align-middle">more_vert</span></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
                <a class="dropdown-item" href="<?php echo base_url('adm/portal/batch/edit/'.$row->id); ?>">Edit</a>
                <a onclick="return confirm('Are you want to delete this data?');" class="dropdown-item" href="<?php echo base_url('adm/portal/batch/delete/'.$row->id); ?>">Delete</a>
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
