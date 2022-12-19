<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?>  

<!-- coursetwo-area start Here -->
<div class="coursetwo-area container">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="Blogone-area "> 
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <?php 
          if(!empty($lists)) {
          foreach($lists as $row) { ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="single-blog">
                <div class="blog-img blogimg1">
                  <img src="<?php echo base_url('upload/assets/adm/cos/_thumb/'.$row->cos_thumb); ?>" class="blog-img-cus" alt="courch-img">
                </div>
                <div class="blog-content" style="font-size: 1.1em;">
                <p class="p-1"><span class="text-info"><i class="fa fa-book"></i>&nbsp;<?php if($row->ref_key == "online") { echo ucfirst($row->ref_key)." Class"; } else { echo "Local Class"; } ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;<?php echo strtoupper($row->level); ?> Level</span>&nbsp;&nbsp;</p>
                  <h4><a href="<?php echo base_url('course/detail/'.$row->slug_name); ?>"><?php echo $row->cos_title; ?></a></h4>
                  <div class="blog-btn">
                    <a href="<?php echo base_url('course/detail/'.$row->slug_name); ?>" class="btn-hr"> More Detail</a>
                  </div>
                </div>
              </div>
            </div>
            <?php } } else { ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="q_block">
                <div class="que">
                  <span class="sub_q">!</span>
                  <p class="content_q">No Resuld Found</p>
                </div>
              </div>
              <h4>We didn't find any course!</h4>
            </div>
          <?php } ?>      
        </div> 
        <!-- sidebar -->
      <?php include(dirname(__FILE__) ."/../template/sidebar.php"); ?>
      <!-- sidebar -->
    </div>
  </div>
</div>
<!-- coursetwo-area end Here -->
<?php include(dirname(__FILE__) ."/../template/footer.php"); ?>