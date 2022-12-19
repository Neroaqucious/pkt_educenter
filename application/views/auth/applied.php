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

      <?php include("sidebar_dashboard.php"); ?> 
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <div class="courseone-view right-animate">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="view-area fix">
                  <div class="view-title floatleft">
                    <h4 class="heading-padding"><i class="fa fa-info-circle"></i>&nbsp; Other Enroll Classes [batches]</h4>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <?php foreach($lists as $row) { ?>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="single-courses">
                  <div class="courses-img courses-img1">
                    <a href="#"><img src="<?php echo base_url('upload/images/'.$row->cos_image); ?>" alt="courch-img"></a>
                        <div class="overlay">
                            <div class="price">
                                <a href="#"><?php echo strtoupper($row->ref_key); ?> CLASS</a>
                            </div>
                        </div>
                    </div>
                    <div class="courses-info">
                      <h4><a href="<?php echo base_url('student/course/detail/'.$row->bat_id); ?>"><?php echo $row->cos_title; ?></a>
                      </h4>
                      <h5>Instructor:  <a href="#"><?php echo $row->trainer; ?> &nbsp;<i class="fa fa-calendar"></i>&nbsp; <span><?php echo date("M d, Y", strtotime($row->activate_date)); ?></span></a>
                      </h5>

                      <?php if($row->status == 1) { ?>
                        <!-- <p class="bg-danger text-center">&nbsp;</p> -->
                        <a href="<?php echo base_url('student/course/detail/'.$row->bat_id); ?>" class="btn-hr">View Detail</a>
                      <?php } else { ?>
                        <p class="bg-danger text-center">Waiting admin pass!</p>
                        <a href="<?php echo base_url('student/course/request/'.$row->bat_id); ?>" class="btn-hr">Enroll Requested</a>
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
    </div>
  </div>
</div>
<!-- courseone-area end Here -->
<?php include(dirname(__FILE__) ."/../template/footer.php"); ?> 