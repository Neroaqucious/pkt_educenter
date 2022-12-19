<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?> 
<!-- courseone-area start Here -->
<div class="courseone-area">
  <div class="container">
    <div class="row">

      <?php if(!empty($_SESSION['msg_success'])){ ?>
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Success!</strong>  <?php echo $_SESSION['msg_success']; ?> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="material-icons md-18">clear</span>
          </button>
        </div>
      <?php } ?>    

      <?php if(!empty($_SESSION['msg_error'])){ ?>
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Warning!</strong>  <?php echo $_SESSION['msg_error']; ?> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="material-icons md-18">clear</span>
          </button>
        </div>
      <?php } ?>

        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
          <div class="courseone-view right-animate">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="view-area fix">
                  <div class="view-title floatleft">
                    <h4 class="heading-padding"><i class="fa fa-info-circle"></i>&nbsp; Enroll course confirmation</h4>
                  </div>
                </div>
              </div>
            </div>
  
            <?php if(!empty($_SESSION['__enroll_course_package'])) { ?>  
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">           
                <div class="checkout-progress">
                  <ul>
                    <li class="first-check"><a href="<?php echo base_url('student/enroll/course') ?>" data-toggle="tooltip" data-placement="top" title="Confirm">Course Confirm</a></li>
                    <li><a href="<?php echo base_url('student/enroll/payment') ?>" data-toggle="tooltip" data-placement="top" title="Payment">Payment Confirm</a></li>
                    <li><a href="<?php echo base_url('student/enroll/complete') ?>" data-toggle="tooltip" data-placement="top" title="Step">Enroll Step Complete</a></li>
                  </ul>
                </div>                        
              </div>

              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
               <!--  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
                  <img src="<?php echo base_url('upload/assets/adm/cos/'.$course->cos_image); ?>" alt="courch-img" style="width: 83%;padding: 20px;background: #ffffff;border: 1px solid #f3f3f3;margin-top: 45px;">
                </div> -->
                 
                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                  <h4><?php echo $course->cos_title; ?>
                    <?php if($batch->livecheck === true) { echo " & Live Online Class"; } ?>
                    &nbsp;&nbsp;(<span class="text-primary weight-800"><?php echo number_format($batch->fees); ?> MMK</span>)</h4>
                  <ul style="background: #efefef0d;padding: 10px;border: 1px solid #cccccc;">
                    <li><span class="row-list">Batch ID</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $batch->batch_id; ?></li>
                    <li><span class="row-list">Type of Class</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php if($course->ref_key == "online") { echo ucfirst($course->ref_key)." Course"; } else { echo "Local Classroom"; } ?></li>
                    <li><span class="row-list">Instructor</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $batch->name; ?></li>
                    <li><span class="row-list">Email</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $batch->email; ?></li>
                  </ul>
                  <?php if($batch->livecheck == 'offline' || $batch->livecheck === true){ ?>
                  <ul style="padding: 10px;background: #f0f2fb;border: 1px solid #cccccc;">
                    <li><span class="row-list">Days</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $batch->days; ?></li>
                    <li><span class="row-list">Times</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $batch->start_time." ~ ".$batch->end_time; ?></li>
                    <li><span class="row-list">Duration</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $batch->month_duration; ?> months<?php if($batch->day_duration != 0) { echo ", ".$batch->day_duration." days"; } ?></li>
                    <li><span class="row-list">Start Date</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo date('M d, Y', strtotime($batch->start_date)); ?>
                      <?php if(date_diff_Generate(date('d-m-Y'), $batch->start_date) > 1 ) { ?>
                        (<?php echo date_diff_Generate(date('d-m-Y'),$batch->start_date); ?>) days remain</br>
                      <?php } ?>
                    </li>
                  </ul>
                  <?php } ?>
                  <?php if($course->ref_key == "online") { ?>
                  <ul style="padding: 10px;background: #ffffff;border: 1px solid #cccccc;">
                    <li><span class="row-list">Lecutres</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $lesson->lectures; ?> Lectures</li>
                    <li><span class="row-list">Total Minutes</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $lesson->hours; ?></li>
                    <li><span class="row-list">Lessons</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $lesson->lessons; ?> Lessons</li>
                  </ul>
                  <?php } ?> 
                  
                </div> 
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                <hr>  
                <div style="padding:0px 10px;">
                  <a href="<?php echo base_url('student/enroll/cancel') ?>" class="backBtn">Back</a>
                  <a href="<?php echo base_url('enroll/payment') ?>" class="btn-icon confirmBtn">Confirm</a>
                </div>
              </div>
            <?php } else { ?>
              <h4><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;  No enroll course here!</h4>
            <?php } ?>
        </div> 
      </div>
    </div>
    <?php include("sidebar_dashboard.php"); ?> 
  </div>
</div>
<!-- courseone-area end Here -->
<?php include(dirname(__FILE__) ."/../template/footer.php"); ?> 