<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?> 
<!-- courseone-area start Here -->
<style>
  span.row-list {
    width: 100px;
    display: inline-block;
  }
</style>
<div class="courseone-area">
  <div class="container">
    <div class="row">

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

      <?php if($permission->permission == 0){ ?>
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Warning!</strong>  You haven't access for course permission. Please contant with admin!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-close"></span>
          </button>
        </div>
      <?php } ?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
          <div class="courseone-view right-animate">
            <div class="row">
                <div class="view-area fix">
                  <div class="view-title floatleft">
                    <h4 class="heading-padding"><i class="fa fa-info-circle"></i>&nbsp; Your enrolled classes</h4>
                  </div>
                </div>
              </div>
            <div class="enroll">
              <?php 
              foreach($lists as $row) { ?>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="single-courses">
                    <div class="courses-img courses-img1">
                      <img src="<?php echo base_url('upload/assets/adm/cos/'.$row->cos_image); ?>" class="blog-img-cus" alt="courch-img">
                    </div>
                      <div class="courses-info">
                        <h4>
                        <?php if($row->status == 1) { ?>
                          <a href="<?php echo $row->url; ?>">&nbsp;<?php echo $row->cos_title; ?></a>
                        <?php } else { ?>
                          <a href="<?php echo $row->request; ?>">&nbsp;<?php echo $row->cos_title; ?></a>
                        <?php } ?>  
                        </h4>
                        <div>
                          <span class="row-list"><i class="fa fa-tags" aria-hidden="true"></i>&nbsp;Batch</span><?php echo $row->batch_id; ?></br>
                          <span class="row-list"><i class="fa fa-certificate" aria-hidden="true"></i>&nbsp;Class</span><?php if($row->ref_key == "online") { echo ucfirst($row->ref_key)." Course"; } else { echo "Local Classroom"; } ?></br>
                          <span class="row-list"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Instructor</span><?php echo $row->trainer; ?></br>
                          
                          <?php if($row->livecheck == "offline" || $row->livecheck === true) { ?>
                            <span class="row-list"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Date/Time</span><?php echo $row->start_time."~".$row->end_time." (".$row->days.") "; ?></br>
                            <span class="row-list"><i class="fa fa-hourglass" aria-hidden="true"></i>&nbsp;Duration</span><?php echo $row->month_duration; ?> months<?php if($row->day_duration != 0) { echo ", ".$row->day_duration." days"; } ?><br>
                            <span class="row-list"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Start Date</span><?php echo date("M d, Y", strtotime($row->start_date)); ?></br>
                            <?php if(date_diff_Generate(date('d-m-Y'), $row->start_date) > 1 ) { ?>
                              <span class="row-list"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i>&nbsp;Remaind</span>(<?php echo date_diff_Generate(date('d-m-Y'),$row->start_date); ?>) days remain!</br>
                            <?php } else {  ?>
                              <span class="row-list"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;State</span>Currently starting!</br>
                            <?php } ?>
                          <?php } else { ?>
                            <span class="row-list"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Released&nbsp;</span><?php echo date("M d, Y", strtotime($row->start_date)); ?></br></br>
                            <br><br>
                          <?php } ?>
                        </div>
                        <hr>
                        <?php if($row->status == 1) { ?>
                          <a href="<?php echo $row->url; ?>" class="btn-hr">View Detail</a>
                        <?php } else { ?>
                          <a href="<?php echo $row->request; ?>" class="btn-hr">Enroll Requested</a>
                        <?php } ?>
                    </div>
                  </div>
                </div>
              <?php }  ?>
            </div>

          <!-- paginisition-area start Here -->
          <div class="pagination-area">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul>
                  <?php echo $pagination; ?>
                </ul>
              </div>
            </div>
          </div>
          <!-- paginisition-area end Here -->
        </div> 
      </div>
       <?php include("sidebar_dashboard.php"); ?> 
    </div>
  </div>
</div>
<!-- courseone-area end Here -->
<?php include(dirname(__FILE__) ."/../template/footer.php"); ?> 

