<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?> 
<!-- courseone-area start Here -->
<div class="coursedetails-area">
  <div class="container">
  <div class="row">
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
      <hr>
        <div class="courses-info">
          <h3><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $result->cos_title; ?></h3>
          <div class="courses-content">
            <div class="single-content ertification">
                <div class="feauter">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <ul>
                        <li>Batch ID : <?php echo $result->batch_id; ?></li>
                        <li>Class : <?php if($result->ref_key == "online") { echo ucfirst($result->ref_key)." Course"; } else { echo "Local Classroom"; } ?></li>
                        <li>Level : <?php echo ucfirst($result->level); ?> Level</li>
                        <li>Instructor : <?php echo $result->trainer; ?></li>
                        <li>Email : <?php echo strtolower($result->email); ?></li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <hr>
          <h4><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Batch Description</h4>
          <?php echo $result->batch_description; ?>
          <br>
          <div class="courses-content">
            <div class="single-content ertification">
              <div class="feauter">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul>
                      <li>Start Date : <?php echo date("M d, Y", strtotime($result->start_date)); ?> 
                        <?php if(date_diff_Generate(date('d-m-Y'), $result->start_date) > 1 ) { ?>
                          (<?php echo date_diff_Generate(date('d-m-Y'),$result->start_date); ?> days remain)</br>
                        <?php } ?>    
                      </li>
                      <li>Days : <?php echo $result->days; ?></li>
                      <li>Time : <?php echo $result->start_time."~".$result->end_time; ?></li>
                      <li>Duration : <?php echo $result->month_duration; ?> months<?php if($result->day_duration != 0) { echo ", ".$result->day_duration." days"; } ?> </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12 col-ls-12 batch-table">
              <table class="table table-responsive text-center">
                <thead>
                  <tr>
                    <td>No.</td>
                    <td>Remain Date</td>
                    <td>Course & Batch Description</td>
                  </tr>
                </thead>
                <tbody>
                  <?php $today = date('Y-m-d', strtotime('2021-08-13')); $x = 1; foreach($localclass->calendar_day as $row) { ?>
                  <tr class="days <?php if($today == date('Y-m-d', strtotime($row))) { echo "checked"; } ?>">
                    <td><?php echo $x; ?></td>
                    <td style="text-align:right;"><?php echo date('l, M d-Y', strtotime($row)); ?></td>
                    <td><?php echo $localclass->description; ?></td>
                  </tr>
                  <?php $x++; } ?>
                </tbody>
              </table> 
            </div>
          </div>
          <hr>

          <div class="blog-btn text-right">
            <a href="<?php echo base_url('student/dashboard'); ?>" class="btn-hr">Back</a>
          </div>
            
      </div>
    </div>
    <?php include("sidebar_dashboard.php"); ?> 
  </div>
</div>
</div>
<!-- courseone-area end Here -->


<?php include(dirname(__FILE__) ."/../template/footer.php"); ?> 