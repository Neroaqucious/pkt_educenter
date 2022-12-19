<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?>  

<!-- coursetwo-area start Here -->
<div class="coursetwo-area">
  <div class="container">
    <!-- error report area -->
    <?php if(!empty($_SESSION['msg_error'])){ ?>
      <div class="alert alert-danger alert-dismissible show" role="alert">
        <strong>Success!</strong> <?php echo $_SESSION['msg_error']; ?> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" class="fa fa-close"></span>
        </button>
      </div>
    <?php } ?>
    <!-- error report area -->

      <!-- Blog one area start Here -->
      <div class="Blogone-area">
          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
          <?php if(!empty($lists)) { ?>
            <?php foreach($lists as $row) { ?>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="single-blog">
                  <div class="blog-img blogimg1">
                      <img src="<?php echo base_url('upload/assets/adm/cos/_thumb/'.$row->cos_thumb); ?>" class="blog-img-cus" alt="courch-img">
                  </div>
                  <div class="blog-content" style="font-size: 1.1em;">
                    <p class="p-1">
                      <span class="text-primary weight-800"><i class="fa fa-book"></i>&nbsp;<span class="span-1">Class Room</span>:&nbsp;&nbsp;<?php if($row->ref_key == "online") { echo "Onlineclass Room"; } else { echo "Localclass Room"; } ?></span><br>
                      <span><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;<span class="span-1">Course Level</span>:&nbsp;&nbsp;<?php echo strtoupper($row->level); ?> Level</span>
                    </p>
                    <h4>
                      <a href="<?php echo base_url('course/detail/'.$row->slug_name); ?>"><?php echo $row->cos_title; ?></a>
                    </h4> 
                    <div class="blog-btn">
                      <a href="<?php echo base_url('course/detail/'.$row->slug_name); ?>" class="btn-hr">More Detail</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } } else { ?>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="q_block">
                  <div class="que">
                    <span class="sub_q">!</span>
                    <p class="content_q">Error: There is no course here!</p>
                  </div>
                </div>
              </div>
            <?php } ?>

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
          <!-- sidebar -->
          <?php include(dirname(__FILE__) ."/../template/sidebar.php"); ?>
          <!-- sidebar -->
        </div>
      </div>
      <!-- Blog one area end Here -->
    </div>
<!-- coursetwo-area end Here -->
<?php include(dirname(__FILE__) ."/../template/footer.php"); ?>