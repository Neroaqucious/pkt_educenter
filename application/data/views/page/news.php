<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?> 

<!-- Blog four area start Here -->
<div class="blogfour-area">
  <div class="container">
    <div class="row">
      <?php foreach($lists as $row) { ?>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="single-blog">
          <div class="blog-img">
          <img src="<?php echo base_url('upload/assets/adm/new/'.$row->photo); ?>" alt="">
            <div class="blog-overlay">
              <ul>
                <li><a href="#"><i class="fa fa-tags"></i> <?php echo $row->name; ?></a></li>
                <li><a href="#"><i class="fa fa-clock-o"></i>  <?php echo date("d M, Y", strtotime($row->updated_at)); ?></a></li>
              </ul>
            </div>
          </div>
          <div class="blog-content">
            <h2><a href="<?php echo base_url('news/detail/'.$row->id); ?>"><?php echo $row->title; ?></a></h2>
            <?php echo $row->content; ?></p>
            <div class="blog-btn">
              <a href="<?php echo base_url('news/detail/'.$row->id); ?>" class="btn-hr">Read More </a>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
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
<!-- Blog four area end Here -->
<?php include(dirname(__FILE__) ."/../template/footer.php"); ?>