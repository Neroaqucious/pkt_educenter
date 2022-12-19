<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?>  

 <!-- Checkout Page Area Start-->
 <div class="checkout-page-area"> 
  <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">           
      <div class="checkout-progress">
        <ul>
          <li class="first-check"><a href="<?php echo base_url('enroll/course') ?>" data-toggle="tooltip" data-placement="top" title="Completed">Course Confirm</a></li>
          <li><a href="<?php echo base_url('enroll/payment') ?>" data-toggle="tooltip" data-placement="top" title="Completed">Payment Confirm</a></li>
          <li><a href="<?php echo base_url('enroll/complete') ?>" data-toggle="tooltip" data-placement="top" title="Completed">Payment Complete</a></li>
        </ul>
      </div>                        
    </div>

    <div class="row">
      <div class="checkout">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default total-area">
              <div class="panel-heading tab-number" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">အတန်းသစ်အပ်နှံမှုအားအတည်ပြုခြင်း</a>
                </h4>
              </div>
                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="order-review">
                      <div class="learning-area">

                        <div class="learning-img">
                          <table class="">
                              <tbody>
                                <tr>
                                  <th>Student ID</th>
                                  <td>: sdid_0000011</td>
                                </tr>
                                <tr>
                                  <th>Student Name</th>
                                  <td>: Tin Tun Naing</td>
                                </tr>
                                <tr>
                                  <th>Student Email</th>
                                  <td>: tintunnaing@maymyanmarlin.com</td>
                                </tr>
                            </tbody>
                          </table>
                        </div>

                        <div class="learning-content">
                          <img src="<?php echo base_url('upload/assets/adm/cos/'.$course->cos_image); ?>" alt="courch-img"  style="width:100px;">
                          <p><?php echo $course->cos_title; ?> (<?php echo $batch->batch_id; ?>)</p>
                          <p><?php if($course->ref_key == "online") { echo ucfirst($course->ref_key)." Class"; } else { echo "Local Class"; } ?></p>
                          <p><?php echo number_format($batch->fees); ?> MMK</p>  
                          <div class="box btn-confirm-box">
                            <a href="<?php echo base_url('enroll/cancel') ?>" class="backBtn">Back</a>
                            <a href="<?php echo base_url('enroll/payment') ?>" class="btn-icon confirmBtn">Confirm</a>
                          </div>
                        </div>                  

                      </div>                     
                    </div>
                  </div>
                </div>                    
              </div>            
            </div>            
          </div>
        </div>
      </div>
    </div>
    <!-- Checkout Page Area End-->  

    <style type="text/css">
  .tab-number a:after {
    position: absolute;
    content: "\f105";
    font-family: fontawesome;
    right: 0;
    top: 15px;
    font-size: 18px;
    font-weight: 700;
    color: #c61508;
    opacity: 0;
    transition: all 0.5s ease 0s;
}
.tab-number a {
    display: block;
    text-decoration: none;
    padding: 15px 0 15px 15px;
    color: #555;
}
.tab-number a:after {
    position: absolute;
    content: "\f105";
    font-family: fontawesome;
    right: 5px;
    top: 15px;
    font-size: 18px;
    font-weight: 700;
    color: #c61508;
    opacity: 0;
    transition: all 0.5s ease 0s;
}
.tab-number h4 {
    /* position: relative; */
    background: #f5f5f5;
}
.panel-default>.panel-heading {
    color: #333;
    /* background-color: #f5f5f5; */
    border-color: #ddd;
    border-bottom: none;
}
.panel-default>.panel-heading:hover {
    color: #ed1c24;
    border-bottom: none;
}
.collapse {
    display: block;
}
.learning-content {
    background: #fff;
    padding: 30px;
}
</style>

<?php include(dirname(__FILE__) ."/../template/footer.php"); ?>  