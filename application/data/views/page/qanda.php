<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?>  

<!-- Checkout Page Area Start-->
<div class="checkout-page-area"> 
  <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">           
        <h1 class="text-center">Frequently Asked Question and Answer</h1>      
    </div>
    <div class="row">
      <div class="checkout">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <?php foreach($lists as $row) { ?> 
            <div class="q_block">
              <div class="que">
                <span class="sub_q">Q.</span>
                <p class="content_q"><?php echo $row->question; ?></p>
              </div>
              <div class="ans">
                <span class="sub_ans">A.</span>
                <p class="content_ans"><?php echo $row->answer; ?></p>
              </div>
            </div>
          <?php } ?>
        </div>  
        <div class="pagination-area">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <ul>
                <?php echo $pagination; ?>
              </ul>
            </div>
          </div>
        </div>          
      </div>
    </div>
  </div>
</div>
<!-- Checkout Page Area End-->  
<?php include(dirname(__FILE__) ."/../template/footer.php"); ?>