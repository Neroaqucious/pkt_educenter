<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?>  

<!-- blog detels area start Here -->
<div class="blogdetels-area">
  <div class="container">
    <div class="row">

      <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="single-blog">
              <div class="blog-img blogimg1">
                <img src="<?php echo base_url('upload/assets/adm/new/'.$result->photo); ?>" alt="">
              </div>
              <div class="blog-content">
                <ul> 
                  <li><i class="fa fa-tags"></i>&nbsp;&nbsp;<?php echo $result->name; ?></li>
                  <li><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo date("d M, Y", strtotime($result->updated_at)); ?></li>
                </ul>
                <h2><a href="#"><?php echo $result->title; ?></a></h2>
                <br>
                <?php echo $result->content; ?>
                <div class="blog-btn">
                  <a href="<?php echo base_url('news'); ?>" class="btn-hr">Back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       <!-- sidebar -->
      <?php include(dirname(__FILE__) ."/../template/sidebar_new.php"); ?>
      <!-- sidebar -->
    </div>
  </div>
</div>
<!-- Blog Details area end Here -->

<?php include(dirname(__FILE__) ."/../template/footer.php"); ?>  