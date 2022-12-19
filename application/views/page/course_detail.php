<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?>  
<!-- single course area start Here -->
<div class="coursedetails-area">
  <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
          <div class="row">
            <div class="courses-detels">
              <div class="courses-img"> 
                <img src="<?php echo base_url('upload/assets/adm/cos/'.$result->cos_image); ?>" alt="course img">
              </div>
              <h2><?php echo $result->cos_title; ?></h2>
              <div class="courses-content">
                <span><?php echo $result->cos_des1; ?></span>
                <br>
                <!--<div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul style="padding: 10px;font-size: 1.1em;">
                      <li><span class="row-list">Type Of Class</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php if($result->ref_key == "online") { echo ucfirst($result->ref_key)." Class"; } else { echo "Local Class"; } ?></li>
                      <li><span class="row-list">Course Level</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo ucfirst($result->level); ?> Level</li>
                      <li><span class="row-list">Categories</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo ucfirst($result->subcategory); ?></li>
                    </ul>
                  </div>
                </div> -->
              </div>
              <hr>
              <div class="batch_info">
                
                <?php if(!empty($batch)){ ?>
                <h3>Enroll Batch Information</h3>  
                <?php foreach($batch as $row) { ?>
                  <div class="single-content" style="padding:20px 0px;border: 1px solid #ccc;font-size: 1.1em;background: #ffffff;">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h4><?php echo $result->cos_title; ?><?php if($row->livecheck === true) { echo " & Live Online Class"; } ?> ( <?php echo $row->batch_id; ?> )</h4>
                        <ul class="feauter" style="padding: 10px;">
                          <?php if($row->livecheck == true || $row->livecheck == "offline") { ?>
                            <li><span class="row-list">Start Date</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo date('M d, Y', strtotime($row->start_date)); ?>&nbsp;&nbsp;
                            <?php if(date_diff_Generate(date('d-m-Y'), $row->start_date) > 1) { ?>
                              <span class="text-primary weight-800 succ-info">(<?php echo date_diff_Generate(date('d-m-Y'), $row->start_date); ?>) days remain</span>
                            <?php } else { ?>
                              <span class="text-danger weight-800 warn-info">Currently starting</span>
                            <?php } ?>
                            </li>
                            <li><span class="row-list">Class Day/Time</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $row->days; ?> (<?php echo $row->start_time." ~ ".$row->end_time; ?>)</li>
                            <li><span class="row-list">Duration</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $row->month_duration; ?> Month&nbsp;<?php if($row->day_duration != 0) { echo $row->day_duration." days"; } ?></li>
                            <?php if($row->member != 0) { ?>
                              <li><span class="row-list">Student limit</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $row->member." Nos"; ?></li>
                            <?php } ?>
                          <?php } ?>
                          <li><span class="row-list">Instructor</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $row->name; ?></li>
                        </ul>
                        <br>
                        <h4><span class="row-list">Enroll Fees</span><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo number_format($row->fees); ?> MMK</h4>
                        <span style="font-size: 1em; color:#505050;"><?php if($row->description != ""){ echo $row->description; } else { echo ""; } ?><?php if($row->remark != ""){ echo $row->remark; } else { echo ""; } ?></span>
                      </div>
                    </div>
                    <hr>
                    <?php if(isset($auth->bat_id) && $auth->bat_id == $row->id) { ?>
                      <div class="blog-btn text-right">
                        <?php if(isset($auth->status) & $auth->status == 1) { ?>
                          <a href="<?php echo base_url('student/course/'.$auth->id."/".$result->ref_key."/".$auth->slug_name); ?>" class="btn-hr">Course Detail</a>
                        <?php } else { ?>
                          <a href="<?php echo base_url('student/course/'.$auth->id."/".$result->ref_key."/".$auth->slug_name); ?>" class="btn-hr">Course Detail</a>
                        <?php } ?>
                      </div>
                    <?php } else { ?>
                      <div class="blog-btn text-right">
                        <?php
                          $attributes = array('class' => 'form-horizontal');
                          echo form_open('student/enroll', $attributes);

                          echo form_input(array(
                            'name' => 'course_id',
                            'type' => 'hidden',
                            'value' => html_escape(set_value('course_id',isset($result)?$result->id:''), ENT_QUOTES)
                          ));

                          echo form_input(array(
                            'name' => 'batch_id',
                            'type' => 'hidden',
                            'value' => html_escape(set_value('batch_id',isset($row)?$row->id:''), ENT_QUOTES)
                          ));

                          echo form_input(array(
                            'name' => 'batch_code',
                            'type' => 'hidden',
                            'value' => html_escape(set_value('batch_code',isset($row)?$row->batch_id:''), ENT_QUOTES)
                          ));
                        ?>
                          <button type="submit" class="btn-hr"> Enroll Now</button>
                        <?php echo form_close(); ?>
                      </div>     
                    <?php } ?>
                  </div>
                <br>
                <?php } } else { ?>
                  
                  <h3><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;Batch Coming Soon!</h3>  
                  <p class="text-danger" style="padding-left:20px; font-size:1.1em;">Our new batch will be coming soon shortly. So please be patient and look at other courses.<br> Thank you for visiting.</p>
                
                <?php } ?>
              </div>
            </div>
         
            <div class="relatate-courses">
                <div class="reletatecourses-title">
                  <h3>Related Courses</h3>
                </div>
              <?php if(!empty($related)) { ?>
                <div class="reletate-list">
                  <?php foreach($related as $row) { ?>
                    <div class="reletate-courses">
                        <div class="courses-img courses-img1">
                          <a href="#"><img src="<?php echo base_url('upload/assets/adm/cos/_thumb/'.$row->cos_thumb); ?>" class="blog-img-cus" alt="courch-img"></a>
                        </div>
                        <div class="courses-info">
                          <span class="text-info"><i class="fa fa-book"></i>&nbsp;<?php if($row->ref_key == "online") { echo ucfirst($row->ref_key)." Class"; } else { echo "Local Class"; } ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;<?php echo strtoupper($row->level); ?> Level</span>&nbsp;&nbsp;<br>
                          <h4><a href="<?php echo base_url('course/detail/'.$row->slug_name); ?>"><?php echo $row->cos_title; ?></a></h4>
                          <!-- <div class="blog-btn">
                            <a href="<?php echo base_url('course/detail/'.$row->slug_name); ?>" class="btn-hr">More Detail</a>
                          </div> -->
                        </div>
                    </div>
                  <?php } ?>
                </div>
              <?php }else{ ?>
                <div class="reletate-courses">
                  <h4>There is no related course!</h4>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <!-- sidebar -->
        <?php include(dirname(__FILE__) ."/../template/sidebar.php"); ?>  
        <!-- sidebar -->
      </div>
    </div>
</div>
<!-- single course area end Here -->

<?php include(dirname(__FILE__) ."/../template/footer.php"); ?>  