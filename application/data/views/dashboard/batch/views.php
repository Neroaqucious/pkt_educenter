<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <h1 class="weight-300 h3 title">Batch Detail</h1>
    </div>
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a class="btn btn-danger py-1 px-2" href="<?php echo base_url('adm/portal/batch/edit/'.$result->id); ?>"><span class="material-icons align-text-bottom">edit</span></a>
      <a class="btn btn-secondary py-1 px-2" href="<?php echo base_url('adm/portal/batch'); ?>"><span class="material-icons align-text-bottom">reorder</span></a>
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
      <div class="card">
        <div class="card-body">
          <div class="col-md-2 float-left">
              <img src="<?php echo base_url('/upload/assets/adm/cos/_thumb/'.$result->cos_thumb); ?>" width="150" class="img-thumbnail bg-white img-fluid text-center">
          </div>
          <div class="col-md-5 float-left">
              <table class="table m-0">
                  <tr>
                      <th>Batch ID</th>
                      <td class="text-primary weight-400"><?php echo strtolower($result->batch_id); ?></td>
                  </tr>
                  <tr>
                      <th>Course Name</th>
                      <td>
	                      <?php echo $result->cos_title; ?>
                          <a href="<?php echo base_url('adm/portal/course/view/'.$result->course_id); ?>" class="text-secondary ml-1" data-toggle="tooltip" data-placement="top" title="View Course Detail">
                              <span class="material-icons align-middle md-18 text-dark">more</span></a>
                      </td>
                  </tr>
                  <tr>
                      <th>Course Level</th>
                      <td><?php echo $result->level; ?></td>
                  </tr>
                  <tr>
                      <th>Enroll Fees</th>
                      <td><?php echo number_format($result->fees); ?> MMK</td>
                  </tr>
                  <tr>
                      <th>Enroll Limited</th>
                      <td><?php if($result->member != 0) { echo $result->member." Nos"; } else { echo "Unlimited!"; } ?></td>
                  </tr>
                  <tr>
                      <th>Instructor</th>
                      <td>
	                      <?php echo $result->trainer; ?>
                          <a href="<?php echo base_url('adm/portal/instructor/view/'.$result->trainer_id); ?>" class="text-secondary ml-1" data-toggle="tooltip" data-placement="top" title="View Instructor Detail">
                              <span class="material-icons align-middle md-18 text-dark">more</span></a>
                      </td>
                  </tr>
                  <tr>
                      <th>Status</th>
                      <td>
                          <?php if($result->status == 1) { ?>
                            <span class="badge badge-success text-white">Public</span>
                          <?php } else { ?>
                            <span class="badge badge-dark text-white">Private</span>
                          <?php } ?>
                      </td>
                  </tr>
              </table>
          </div>
          <div class="col-md-5 float-left">
              <table class="table m-0">
                  <tr>
                    <th>Class</th>
                    <td class="text-primary"><strong><?php if($result->ref_key == "offline") { echo "Localclass room"; } else { echo "Online class"; } ?></strong></td>
                  </tr>
	              <?php if($result->liveclass == "on") { ?>
                  <tr>
                    <th>Duration</th>
                    <td><?php echo $result->month_duration; ?> Months <?php if($result->day_duration == 0) { echo ""; } else { echo $result->day_duration." days"; }?></td>
                  </tr>
                  <tr>
                    <th>Class Days</th>
                    <td><?php echo $result->days; ?></td>
                  </tr>
                  <tr>
                    <th>Class Times</th>
                    <td><?php echo $result->start_time." ~ ".$result->end_time; ?></td>
                  </tr>
                  <tr>
                    <th>Start Date</th>
                    <td><?php echo date('d-m-Y', strtotime($result->start_date)); ?>&nbsp;&nbsp;
                      <span class="text-info weight-800">(<?php if(date_different(date('d-m-Y'), $result->start_date) > 1) { echo date_different(date('d-m-Y'), $result->start_date).")days remain"; } else {  echo "class started)"; } ?></span>
                    </td>
                  </tr>
                  <?php } ?>
                  <tr>
                      <th>Released Date</th>
                      <td><?php echo $result->released_date; ?></td>
                  </tr>
                  <tr>
                      <th>End Released Date</th>
                      <td><?php echo $result->closed_date; ?></td>
                  </tr>
              </table>
          </div>

            <div class="col-md-12 float-left">
                <?php if ($result->description != "") { ?>
                      <dl class="row">
                          <dd class="col-sm-12 bg-light py-2"><?php echo $result->description; ?></dd>
                      </dl>
                <?php } ?>
                <?php if ($result->remark != "") { ?>
                      <dl class="row">
                          <dd class="col-sm-12 bg-light py-2"><?php echo $result->remark; ?></dd>
                      </dl>
	            <?php } ?>
            </div>
        </div>
      </div>

      <div class="clearfix"></div>
      <hr class="my-4 dashed clearfix">
      
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
              <div class="card-header bg-dark text-light">Enroll <span class="text-success">Student List</span></div>
              <div class="card-body table-responsive">
                <table class="table m-0" id="studentDataOnline">
                  <thead>
                    <tr class="text-center">
                      <th scope="col" class="border-top-0" width="1">Student Id</th>
                      <th scope="col" class="border-top-0">Name</th>
                      <th scope="col" class="border-top-0">Email</th>
                      <th scope="col" class="border-top-0">Phone</th>
                      <th scope="col" class="border-top-0">Request Date</th>
                      <th scope="col" class="border-top-0">Activate Date</th>
                      <th scope="col" class="border-top-0">Status</th>
                      <th scope="col" class="border-top-0" width="1">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($list as $row) { ?>
                    <tr>
                      <td><?php echo $row->student_id; ?></td>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->email; ?></td>
                      <td>
                      <?php echo $row->phone; ?>
                      </td>
                      <td>
                        <?php echo $row->request_date; ?>
                      </td>
                      <td>
                        <?php echo $row->activate_date; ?>
                      </td>
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
                          <a class="dropdown-item" href="<?php echo base_url('adm/portal/student/view/'.$row->std_id); ?>">View</a>
                        </div>
                      </td>
                    </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
<!-- /page content -->

<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>


