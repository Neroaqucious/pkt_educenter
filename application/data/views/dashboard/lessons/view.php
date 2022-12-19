<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title">Lesson Detail</h1>
    </div> 
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a href="<?php echo base_url('adm/portal/lessons/add_movies/'.$course->id); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">add_circle</span></a>
      <a href="<?php echo base_url('adm/portal/lessons'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>
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
            <img src="<?php echo base_url('upload/assets/adm/cos/'.$course->cos_image); ?>" width="250">
          </div>
           <div class="float-left col-md-4">
               <table class="table m-0">
                   <tr>
                       <th>Course Name</th>
                       <td class="weight-400"><?php echo $course->cos_title; ?></td>
                   </tr>
                   <tr>
                       <th>Course Level </th>
                       <td><?php echo strtoupper($course->level); ?></td>
                   </tr>
                   <tr>
                       <th>Status</th>
                       <td>
                           <?php if($course->status == 1) { ?>
                             <span class="badge badge-success text-white">Public</span>
                           <?php } else { ?>
                             <span class="badge badge-dark text-white">Private</span>
                           <?php } ?>
                       </td>
                   </tr>
               </table>
           </div>
           <div class="float-left col-md-5">
                <table class="table m-0">
                    <tr>
                        <th>Total Lectures</th>
                        <td class="text-danger weight-400"><?php echo $detail->lectures; ?> lectures</td>
                    </tr>
                    <tr>
                        <th>Total Minutes</th>
                        <td class="text-danger weight-400"><?php echo $detail->hours; ?></td>
                    </tr>
                    <tr>
                        <th>Total Lessons</th>
                        <td><?php echo $total_less; ?> Lessons</td>
                    </tr>
                    
                </table>
           </div> 
        </div>
        <hr>
        <div class="col-md-12 mt-1 m-4">
          <h5>Lesson Description</h5>
          <p></p><?php echo $course->description; ?></p>
        </div>
      </div>

    <div class="card mb-4">
      <div class="card-header bg-dark text-light">Batch <span class="text-success">List</span></div>
          <table class="table">
              <thead>
              <tr class="text-center">
                  <th scope="col" class="border-top-0" width="1">No</th>
                  <th scope="col" class="border-top-0" width="1">Batch ID</th>
                  <th scope="col" class="border-top-0">Fees</th>
                  <th scope="col" class="border-top-0">Member</th>
                  <th scope="col" class="border-top-0">Instructor</th>
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
                      <td class="text-center"><?php echo $row->trainer; ?></td>
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

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
          <div class="card-header bg-dark text-light">Lessons <span class="text-success">List</span></div>
            <div class="card-body table-responsive">
            <div class="row">
          <div class="col-md-12">
          <?php
            $x = 1;
            foreach($parts as $part){ ?>
              <ul class="list-group">
                <a data-toggle="collapse" href="#level-<?php echo $x; ?>" class="list-group-item list-group-item-action bg-info text-light collapsed" aria-expanded="true">
                  <span class="material-icons mr-1 align-text-bottom md-18">keyboard_arrow_right</span> <?php echo $part->name; ?></a>
                  <li id="level-<?php echo $x; ?>" class="list-group-item collapse show py-3">
                <?php
                  foreach($lists as $row){ 
                    if($part->id == $row->part_id) {
                  ?>
                    <ul class="p-0 mb-1">
                      <li class="list-group-item">
                        <a href="<?php echo base_url('adm/portal/lessons/view_movies/'.$row->id."/".$row->less_id); ?>" class="text-dark weight-400" data-toggle="tooltip" data-placement="top" title="Movies Detail">
                          <?php echo $row->title; ?>
                          <span> ~ <?php echo $row->minute; ?></span>&nbsp;&nbsp;&nbsp;
                          <?php if($row->status == 1) { ?>
                            <span class="material-icons align-middle md-18 text-success">check_circle</span>
                          <?php } else { ?>
                            <span class="material-icons align-middle md-18 text-secondary">remove_circle_outline</span>
                          <?php } ?>
                          <div class="d-inline float-right">
                            <a class="text-secondary" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo base_url('adm/portal/lessons/edit_movies/'.$row->id."/".$row->less_id); ?>"><span class="material-icons align-middle md-18">edit</span></a>
                            <a class="text-secondary" onclick="return confirm('Are you want to delete this data?');" data-toggle="tooltip" data-placement="top" title="Delete" href="<?php echo base_url('adm/portal/lessons/delete_movies/'.$row->id."/".$row->less_id); ?>"><span class="material-icons align-middle md-18">delete</span></a>
                          </div>
                        </a>
                      </li>
                    </ul>
                    <?php } } ?>
                  </li>
                </ul>
                <?php $x++; } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>