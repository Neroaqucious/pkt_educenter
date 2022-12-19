<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?> 
<!-- Checkout Page Area Start-->
<section class="m-5">
  <div class="learning-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 align-center">
          <div class="">
            <div class="form-title">
              <h3> Member Register Complete</h3>
            </div>
            <p><?php echo $msg; ?></p>
              <?php if(isset($_SESSION['__enroll_course_package']) && $_SESSION['__enroll_course_package'] != "") { ?>
                <div class="box">
                  <a href="<?php echo base_url('enroll/course'); ?>" class="btn-icon confirmBtn">To Enroll</a>
                </div>
              <?php } else { ?>
                <div class="box">
                  <a href="<?php echo base_url('home'); ?>" class="btn-icon confirmBtn">&nbsp;To Home</a>
                </div>
              <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Checkout Page Area End-->   

<?php include(dirname(__FILE__) ."/../template/footer.php"); ?> 