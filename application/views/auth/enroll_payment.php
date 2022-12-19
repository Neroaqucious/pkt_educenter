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
                    <h4 class="heading-padding"><i class="fa fa-info-circle"></i>&nbsp; Payment Confirm</h4>
                  </div>
                </div>
              </div>
            </div>

          <?php if(!empty($_SESSION['__enroll_course_package'])) { ?>  
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">           
              <div class="checkout-progress">
                <ul>
                  <li><a href="<?php echo base_url('student/enroll/course') ?>" data-toggle="tooltip" data-placement="top" title="confirm">Course Confirm</a></li>
                  <li class="second-check"><a href="<?php echo base_url('student/enroll/payment') ?>" data-toggle="tooltip" data-placement="top" title="payment">Payment Confirm</a></li>
                  <li><a href="p<?php echo base_url('student/enroll/complete') ?>" data-toggle="tooltip" data-placement="top" title="step">Enroll Step Complete</a></li>
                </ul>
              </div>                        
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
              <?php foreach ($this->cart->contents() as $items): ?>
                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                  <h4><?php echo $items['name']; ?><?php if($batch->livecheck === true ) { echo " & Live Online Class"; } ?>&nbsp;&nbsp;(<span class="text-primary weight-800"><?php echo number_format($items['price']); ?> MMK</span>)</h4>
                  <ul style="background: #c62d290d; padding: 10px;">
                    <li><span class="row-list">Batch ID</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $_SESSION['__enroll_course_package']['batch_id']; ?></li>
                    <li><span class="row-list">Type of Class</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php if($items['class'] == "online") { echo ucfirst($items['class'])." Course"; } else { echo "Local Classroom"; } ?></li>
                    <li><span class="row-list">Instructor</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $batch->name; ?></li>
                    <li><span class="row-list">Email</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $batch->email; ?></li>
                  </ul>
                  
                  <?php if($batch->livecheck == 'offline' || $batch->livecheck === true){ ?>
                  <ul style="padding: 10px;background: #aaccaa;">
                    <li><span class="row-list">Days</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $batch->days; ?></li>
                    <li><span class="row-list">Times</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $batch->start_time." ~ ".$batch->end_time; ?></li>
                    <li><span class="row-list">Duration</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $batch->month_duration; ?> months<?php if($batch->day_duration != 0) { echo ", ".$batch->day_duration." days"; } ?></li>
                    <li><span class="row-list">Start Date</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo date('M d, Y', strtotime($batch->start_date)); ?></li>
                  </ul>
                  <?php } ?>
                  
                  <?php if($items['class'] == "online") { ?>
                  <ul style="padding: 10px;background: #f3f3f3;">
                    <li><span class="row-list">Lecutres</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $lesson->lectures; ?> Lectures</li>
                    <li><span class="row-list">Total Minutes</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $lesson->hours; ?></li>
                    <li><span class="row-list">Lessons</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $lesson->lessons; ?> Lessons</li>
                  </ul>
                  <?php  } ?>
                </div> 
                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
                  <img src="<?php echo base_url('upload/assets/adm/cos/'.$items['image']); ?>" alt="courch-img" style="width: 83%;padding: 20px;background: #ffffff;border: 1px solid #f3f3f3;margin-top: 45px;">
                </div>  -->
              <?php endforeach; ?>  
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
              <?php
                $attributes = array('class' => '');
                echo form_open('enroll/enroll_check', $attributes);
                echo form_input(array(
                'name' => 'student_id',
                'type' => 'hidden',
                'value' => $_SESSION['__student_user_data']['student_id'],
                ));
              ?>
              <div class="row">
                <div class="checkout">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                  <br>
                  <h4>Payment Method</h4>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      <label for="phonenumber">ငွေလွှဲမည့် စနစ်</label>
                      <select name="payment_method" id="pay_method">
                        <option value="">Select Payment method</option>
                        <?php
                          foreach($payment as $row) { ?>
                            <option value="<?php echo $row->slug; ?>"><?php echo $row->pay_name; ?></option>
                        <?php } ?>
                      </select>
                      
                      <div class="info my-4" id="pay_state">
                        <table class="table table-bordered">
                        </table>
                      </div>

                      <div class="phone my-4">
                        <label for="phonenumber">ငွေလွှဲမည့်ဖုန်းနံပါတ်</label>
                          <?php
                            echo form_input(array(
                              'name' => 'phonenumber',
                              'type' => 'text',
                              'placeholder' => 'Enter Your Phone',
                              'class' => "form-control",
                              'value' => html_escape(set_value('phonenumber',isset($_SESSION['__student_user_data']['user_phone'])?$_SESSION['__student_user_data']['user_phone']:''), ENT_QUOTES),
                            ));
                          ?>
                        </div>
                      </div>
                    </div>            
                  </div>
                </div>
                  <span>
                    <em>
                      <?php
                        if(!empty($this->session->msg)) {
                          echo $this->session->msg;
                        }
                      ?>
                    </em>
                  </span>
                <br>
                <div class="checkout-progress">
                  <h5 class="text-danger">
                    <p>* သင်ငွေပေးချေလိုသည့် Payment Method ကိုနှိပ်၍ လိုအပ်သောအချက်အလက်များကိုဖြည့်သွင်းပါ</p>
                    <p>* ငွေလွှဲရာတွင် Student ID အား အကြောင်းအရာတွင် တစ်ခါတည်းဖြည့်ပြီး ငွေလွှဲပေးရန်</p>
                    <p>* အချက်အလက်များဖြည့်သွင်းပြီးပါက Continue ကိုနှိပ်၍ဆက်လက်ပါ။</p>
                  </h5>
                </div>
                <hr>
                <div style="padding: 0px 20px;">
                  <a href="<?php echo base_url('enroll/course'); ?>" class="btn-hr">Back</a>
                  <button type="submit" class="btn-hr float-right">Continue</button>
                </div>
              <?php echo form_close(); ?> 
              
            </div>
          <?php } else { ?>
            <h4><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;  Not enroll course here!</h4>
          <?php } ?>
        </div> 
      </div>
      <?php include("sidebar_dashboard.php"); ?> 
    </div>
  </div>
</div>
<!-- courseone-area end Here -->
<?php include(dirname(__FILE__) ."/../template/footer.php"); ?> 