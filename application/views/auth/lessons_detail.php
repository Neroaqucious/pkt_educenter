<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?>

<!--  Video.js -->
<link href="<?php echo base_url('asset/video.js/video-js.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('asset/video.js/index.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('asset/video.js/videojs-seek-buttons.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('asset/video.js/video.min.js') ?>"></script>
<script src="<?php echo base_url('asset/video.js/videojs-seek-buttons.min.js') ?>"></script>
<!--  Video.js -->

<!-- single course area start Here -->
<div class="coursedetails-area container">
  <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="courses-detels col-lg-9 col-md-9 col-sm-12 col-xs-12">
      <div class="courses-vd"> 
        <div class="vjs-playlist"></div>
        <span style="outline: none;">
          <video id="my-player" class="video-js vjs-16-9 vjs-default-skin" controls preload="auto" poster="" data-setup='{}' width="auto">
            <source src="<?php echo base_url('/upload/assets/adm/mov/int_/pkt_/_data/'.$result->movies); ?>" type="video/mp4"/>
          </video>
        </span>
      </div>
      <br>
      <div class="courses-info">
        <h2><?php echo ucfirst($result->title); ?></h2> 
        <?php echo ucfirst($result->desc1); ?>
        <br>
        <h3>Description</h3> 
        <?php echo ucfirst($result->desc2); ?>
      </div>
      <br>
      
      <div class="single-content">
        <h3>Note Area</h3> 
        <?php
          $attributes = array('class' => 'form-horizontal form-label-left');
          echo form_open('student/lessons/note', $attributes);
            echo form_input(array(
              'name' => 'data_id',
              'type' => 'hidden',
              'value' => $result->id
            ));

            echo form_input(array(
              'name' => 'cos_id',
              'type' => 'hidden',
              'value' => $course->cos_id
            ));
          ?>
          
          <textarea class="member_comment" name="member_note" placeholder="Write Your Notes" rows="9" required><?php echo (isset($note->note)?$note->note:""); ?></textarea>
          <button type="submit" name="comment" class="btn-hr edit-btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
        <?php echo form_close(); ?>
          <?php if(!empty($_SESSION['msg_success'])){ ?>
            <div class="alert alert-success alert-dismissible show" role="alert">
              <strong>Success!</strong>  <?php echo $_SESSION['msg_success']; ?> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="fa fa-close"></span>
              </button>
            </div>
          <?php } ?> 
        </div>
        <hr>
        <div class="row">
          <div class="relatate-courses">
              <div class="reletatecourses-title">
                <h3>Related Lessons</h3>
              </div>
            </div>
            <?php if(!empty($related)) { ?>
              <div class="reletate-list">
                <?php foreach($related as $row) { ?>
                  <div class="reletate-courses">
                      <div class="courses-img courses-img1">
                        <a href="<?php echo base_url('student/lessons/'.$row->less_id.'/'.$row->slug_name); ?>"><img src="<?php echo base_url('upload/assets/adm/cos/_thumb/'.$course->cos_thumb); ?>" alt="" class="img-thumbnail img-fluid rounded-circle" width="50"></a>
                      </div>
                      <div class="courses-info">
                        <span style="color: #f00;"><i class="fa fa-clock-o"></i>&nbsp;<?php echo ucfirst($result->minute); ?> Min</span>&nbsp;<br>
                        <h4><a href="<?php echo base_url('student/lessons/'.$row->less_id.'/'.$row->slug_name); ?>"><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $row->title; ?></a></h4>
                        <div class="blog-btn">
                          <a href="<?php echo base_url('student/lessons/'.$row->less_id.'/'.$row->slug_name); ?>" class="btn-hr">View</a>
                        </div>
                      </div>
                  </div>
                <?php } ?>
              </div>
            <?php }else{ ?>
              <div class="reletate-courses">
                <h4>There is no related lessons!</h4>
              </div>
            <?php } ?>
          </div>
        </div>
    <?php include("sidebar_dashboard.php"); ?>     
  </div>
</div>
</div>

<script>
  var player = videojs('my-player', {
      playbackRates: [0.5, 1, 1.5],
  });
  player.fluid(true);
  player.disablePictureInPicture(true);
  player.seekButtons({
    forward: 10,
    back: 10
  });
</script>

<?php include(dirname(__FILE__) ."/../template/footer.php"); ?> 