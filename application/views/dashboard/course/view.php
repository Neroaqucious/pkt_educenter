<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
        <h1 class="weight-300 h3 title">Course Detail</h1>
    </div> 
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a class="btn btn-danger py-1 px-2" href="<?php echo base_url('adm/portal/course/edit/'.$result->id); ?>"><span class="material-icons align-text-bottom">edit</span></a>
      <a class="btn btn-secondary py-1 px-2" href="<?php echo base_url('adm/portal/course'); ?>"><span class="material-icons align-text-bottom">reorder</span></a>
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
      <div class="card mb-4">
        <div class="card-body">
          <div class="float-left col-md-3 text-center">
            <img src="<?php echo base_url('upload/assets/adm/cos/'.$result->cos_image); ?>" width="300" class="img-thumbnail">
          </div>
            
            <div class="col-md-5 float-left">
                <table class="table m-0">
                    <tr>
                        <th>Title</th>
                        <td class="text-primary weight-400"><?php echo $result->cos_title; ?></td>
                    </tr>
                    <tr>
                        <th>Slug Name</th>
                        <td>
					                <?php echo $result->slug_name; ?>
                            <a href="<?php echo base_url('course/detail/'.$result->slug_name); ?>" class="text-dark ml-1" data-toggle="tooltip" data-placement="top" title="View Course" target="_blank">
                                <span class="material-icons align-middle md-18 text-dark">more</span>
                            </a>
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

            <div class="col-md-4 float-left">
                <table class="table m-0">
                    <tr>
                        <th>Level</th>
                        <td><?php echo strtolower($result->level); ?></td>
                    </tr>
                    <tr>
                        <th>Subcategory</th>
                        <td><?php echo strtolower($result->subcategory); ?></td>
                    </tr>
                    <tr>
                        <th>Class</th>
                        <td><?php echo strtolower($result->ref_key); ?> class</td>
                    </tr>
                </table>
            </div>
            
          <div class="clearfix my-4"></div>

          <div class="card mb-4">
              <div class="card-body">
                <dl class="row">
                  <dt class="col-sm-3">Main Description</dt>
                  <dd class="col-sm-9 bg-light py-2"><?php echo $result->cos_des1; ?></dd>
                </dl>
              </div>
            </div>
        </div>
      </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-dark text-light">Register <span class="text-success">Batch Lists</span></div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped m-0">
                            <thead>
                            <tr class="text-center">
                                <th scope="col" class="border-top-0" width="1">No</th>
                                <th scope="col" class="border-top-0" width="1">Batch ID</th>
                                <th scope="col" class="border-top-0">Fees</th>
                                <th scope="col" class="border-top-0">Member</th>
                                <th scope="col" class="border-top-0">Status</th>
                                <th scope="col" class="border-top-0" width="1">Publish Date</th>
                                <th scope="col" class="border-top-0" width="1">End Date</th>
                                <th scope="col" class="border-top-0" width="1">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $x = 1;
                            foreach($batch as $row) { ?>
                            <tr>
                                <td class="text-right"><?php echo $x; ?></td>
                                <td>
                                    <a href="<?php echo base_url('adm/portal/batch/view/'.$row->id); ?>" class="text-dark weight-400" data-toggle="tooltip" data-placement="top" title="" data-original-title="Batch Detail">
                                        <?php echo $row->batch_id; ?>
                                    </a>
                                </td>
                                <td class="text-center"><?php echo number_format($row->fees); ?> MMK</td>
                                <td class="text-center"><?php if($row->member == 0){ echo "unlimited"; } else { echo $row->member; } ?></td>
                                <td class="text-center">
                                    <?php if($row->status == 1) { ?>
                                        <span class="badge badge-success text-white">Public</span>
                                    <?php } else { ?>
                                        <span class="badge badge-dark text-white">Private</span>
                                    <?php } ?>
                                </td>
                                <td class="text-center text-info weight-400">
                                    <?php echo $row->released_date; ?>
                                </td>
                                <td class="text-center text-info weight-400">
                                    <?php echo $row->closed_date; ?>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
                                        <span class="material-icons md-20 align-middle">more_vert</span></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url('adm/portal/batch/edit/'.$row->id); ?>">Edit</a>
                                    </div>
                                </td>
                            </tr>
                            <?php $x++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <div class="clearfix my-4"></div>
      <div class="row">
        <div class="col-lg-12">
        
          <div class="card">
              <div class="card-header bg-dark text-light">Enroll <span class="text-success">Student Lists</span></div>
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
                    <td>
                    <a href="<?php echo base_url('adm/portal/student/view/'.$row->std_id); ?>" class="text-dark weight-400" data-toggle="tooltip" data-placement="top" title="" data-original-title="Student Detail">
                      <?php echo $row->user_id; ?>
                    </a>
                    </td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td><?php echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $row->phone) ?></td>
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

<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>