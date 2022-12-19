<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?> 
<!-- courseone-area start Here -->
<div class="coursedetails-area">
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
    
    <?php include("sidebar_dashboard.php"); ?> 
    <div class="courses-detels col-lg-9 col-md-9 col-sm-12 col-xs-12">
      <div class="courses-img"> 
        <img src="<?php echo base_url('upload/assets/adm/cos/'.$result->cos_image); ?>" alt="course img">
      </div>
      <hr>
      <div class="courses-info">
        <h3><?php echo $result->cos_title; ?><?php if($result->livecheck === true) { echo " & Live Online Class"; } ?></h3>
        <?php echo $result->course_description; ?>
        <br>
        <div class="courses-content">
          <div class="single-content ertification">
              <div class="feauter">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul>
                      <li>Batch ID : <?php echo $result->batch_id; ?></li>
                      <li>Class : <?php if($result->ref_key == "online") { echo ucfirst($result->ref_key)." Course"; } else { echo "Local Classroom"; } ?></li>
                      <li>Level : <?php echo ucfirst($result->level); ?> Level</li>
                      <li>Instructor : <?php echo strtolower($result->trainer); ?></li>
                      <li>Email : <?php echo strtolower($result->email); ?></li>
                    </ul>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <hr>
        <h4>Batch Description</h4>
        <?php echo $result->batch_description; ?>
        <br>
        <?php if($result->livecheck == "offline" || $result->livecheck === true) { ?>    
          <div class="courses-content">
            <h4>Live Online Class Detail</h4>
              <div class="single-content ertification">
                <div class="feauter">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <ul>
                        <li>Start Date : <?php echo date("M d, Y", strtotime($result->start_date)); ?>
                          <?php if(date_diff_Generate(date('d-m-Y'), $result->start_date) > 1 ) { ?>
                            (<?php echo date_diff_Generate(date('d-m-Y'),$result->start_date); ?> days remain)</br>
                          <?php } else {  ?>
                            Currently starting!</br>
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
          </div>
        <?php } ?>
        <br> 
        <?php if($result->ref_key == "online" ){ ?>
          <div class="courses-content">
            <h4>Lesson Content Detail</h4>
            <div class="single-content ertification">
              <div class="feauter">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul>
                      <li>Total Lecture : <?php echo $online->lectures; ?> Lectures</li>
                      <li>Total Lessons : <?php echo $online->lessons; ?> Nos</li>
                      <li>Total Minutes : <?php echo $online->hours; ?></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <hr>
        <h4>Enroll Fees And Payment Details</h4>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td>ဘဏ်အကောင့်အမည်</td>
                  <td><?php echo $payment->pay_name; ?></td>
                </tr>
                <tr>
                  <td>ငွေပေးသွင်းရမည့်အကောင့်</td>
                  <td><?php echo $payment->reference; ?></td>
                </tr>
                <tr>
                  <td>အကောင့်အမည်</td>
                  <td><?php echo $payment->usr_name; ?></td>
                </tr>
                <tr>
                  <td>သင်တန်းကြေး</td>
                  <td class="bg-success weight-900"><?php echo number_format($payment->total_price); ?> MMK</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div> 
        <br>
        <hr>
        <div class="blog-btn text-right">
          <a href="<?php echo base_url('student/dashboard'); ?>" class="btn-hr">Back</a>
        </div>  
      </div>
    </div>
  </div>
</div>
<!-- courseone-area end Here -->


<?php include(dirname(__FILE__) ."/../template/footer.php"); ?> 