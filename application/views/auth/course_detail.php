<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?> 
<!-- courseone-area start Here -->
<div class="coursedetails-area container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <?php if($permission->permission == 0){ ?>
      <div class="alert alert-danger alert-dismissible show" role="alert">
        <strong>Warning!</strong>  You haven't access for course permission. Please contant with admin!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span class="fa fa-close"></span>
        </button>
      </div>
    <?php } ?>
    
    <?php if($result->status == 0 ){ ?>
    <div class="alert alert-danger alert-dismissible show" role="alert">
      <strong>Warning!</strong>  Your requrest course is checking now! Please contact with admin!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span class="fa fa-close"></span>
      </button>
    </div>
    <?php } ?>

    <?php if(!empty($_SESSION['msg_success'])){ ?>
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Success!</strong>  <?php echo $_SESSION['msg_success']; ?> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-close"></span>
          </button>
        </div>
      <?php } ?>    

      <?php if(!empty($_SESSION['msg_error'])){ ?>
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Warning!</strong>  <?php echo $_SESSION['msg_error']; ?> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span class="fa fa-close"></span>
          </button>
        </div>
      <?php } ?>
    
   
    <div class="courses-detels col-lg-9 col-md-9 col-sm-12 col-xs-12">
      <div class="courses-img"> 
        <img src="<?php echo base_url('upload/assets/adm/cos/'.$result->cos_image); ?>" alt="course img">
      </div>
      
      <div class="courses-info">
        <h3>&nbsp;&nbsp;<?php echo $result->cos_title; ?><?php if($result->livecheck === true) { echo " & Live Online Class"; } ?></h3>
        <div style="background-color: #f0f2fb;display: block;width: 100%;padding: 10px;margin-bottom: 10px;">
          <span><i class="fa fa-book" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $result->batch_id; ?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
          <span><i class="fa fa-tags" aria-hidden="true"></i>&nbsp;&nbsp;<?php if($result->ref_key == "online") { echo ucfirst($result->ref_key)." Course"; } else { echo "Local Classroom"; } ?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
          <span><i class="fa fa-tags" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo ucfirst($result->level); ?> Level&nbsp;&nbsp;&nbsp;&nbsp;</span>
          <span><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo strtolower($result->trainer); ?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
          <span><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo strtolower($result->email); ?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>
        <span><?php echo $result->batch_description; ?></span>
        <hr>

      <?php if($result->livecheck === true) { ?>
        <h4>&nbsp;&nbsp;Online Training</h4>
        <div class="courses-content">
          <div class="single-content ertification">
            <div class="feauter">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <ul>
                    <li>Days : <?php echo $result->days; ?></li>
                    <li>Time : <?php echo $result->start_time."~".$result->end_time; ?></li>
                    <li>Duration : <?php echo $result->month_duration; ?> months<?php if($result->day_duration != 0) { echo ", ".$result->day_duration." days"; } ?> </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
       
          <div class="col-lg-8 col-md-8 col-sm-12 col-ls-12 batch-table">
            <table class="table table-responsive text-center">
              <thead>
                <tr>
                  <td>No.</td>
                  <td>Remain Date</td>
                  <td>Course & Batch Description</td>
                </tr>
              </thead>
              <tbody>
                <?php $today = date('Y-m-d'); $x = 1; foreach($localclass->calendar_day as $row) { ?>
                <tr class="days <?php if($today == date('Y-m-d', strtotime($row))) { echo "checked"; } ?>">
                  <td><?php echo $x; ?></td>
                  <td><?php echo date('l, M d-Y', strtotime($row)); ?></td>
                  <td><?php echo $localclass->description; ?></td>
                </tr>
                <?php $x++; } ?>
              </tbody>
            </table> 
          </div>
        </div>
        <br>
        <hr>  
      <?php } ?>
        
        <h4>Content Detail</h4>
          <div style="background-color: #f0f2fb;display: block;width: 100%;padding: 10px;margin-bottom: 10px;">
            <span><i class="fa fa-list" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $online->lectures; ?>&nbsp;lecture&nbsp;&nbsp;&nbsp;</span>
            <span><i class="fa fa-play-circle" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $online->lessons; ?>&nbsp;lessons&nbsp;&nbsp;&nbsp;</span>
            <span><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $online->hours; ?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
          </div>
        <?php print_r($online->lessons_description); ?>
        <br>
      <!-- <div class="col-lg-12 col-md-12 col-sm-12"> -->
        <h4>Lessons Detail</h4>
        <div class="col-lg-9 col-md-9 col-sm-12">
        <?php if(!empty($online) && !empty($lesson_parts) && isset($permission->permission) == 1 && $result->status == 1){ ?>  
            <?php
              $x = 1000;
              foreach($lesson_parts as $part){ 
            ?>
            <div class="single-recentnews">
              <div class="panel panel-default course-content">
                <div class="panel-heading tab-number1" role="tab" id="heading<?php echo $x; ?>">
                  <p class="panel-title">
                    <a class="collapsed recent" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $x; ?>" aria-expanded="false" aria-controls="collapse<?php echo $x; ?>">
                      <?php echo $part->name; ?>
                      <?php 
                        foreach($parts_detail as $total) { 
                          if($part->id == $total->part_id) {
                      ?>
                      <span class="video-timing">
                      <i class="fa fa-play-circle" aria-hidden="true"></i>&nbsp;<?php echo $total->count_less; ?> Lessons
                      </span>
                      <?php } } ?>
                      
                    </a>
                  </p>
                </div>
                
                <div id="collapse<?php echo $x; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $x; ?>">
                  <div class="order-review">
                    <ul class="recent-vd">
                    <?php    
                      foreach($lesson_lists as $row){ 
                        if($part->id == $row->part_id) {
                      ?>
                      <li>
                        <a href="<?php echo base_url('student/lessons/'.$row->less_id.'/'.$row->slug_name); ?>">
                        <i class="fa fa-play-circle"></i>
                        <span><?php echo $row->title; ?></span>
                        <span class="video-timing"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?php echo $row->minute; ?></span>
                        </a>
                      </li>
                      <?php } } ?>
                    </ul>           
                </div>
                </div>
              </div>
          <?php $x++; } } ?>
          </div>
        </div>
        <hr>
        <div class="blog-btn text-right">
          <a href="<?php echo base_url('student/dashboard'); ?>" class="btn-hr"> Back</a>
          <?php if(!empty($lists) && $permission->permission == 1 && $result->status == 1) { ?>
          <a href="<?php echo base_url('student/lessons/'.$lists[0]->less_id.'/'.$lists[0]->slug_name); ?>" class="btn-hr">Lesson</a>
          <?php } ?>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
        <?php include("sidebar_dashboard.php"); ?>    
      </div>
    </div>
  </div>
</div>
</div>
<!-- courseone-area end Here -->


<?php include(dirname(__FILE__) ."/../template/footer.php"); ?> 