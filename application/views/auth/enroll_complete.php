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
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
          <div class="courseone-view right-animate">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="view-area fix">
                  <div class="view-title floatleft">
                    <h4 class="heading-padding"><i class="fa fa-info-circle"></i>&nbsp; Enroll Step Complete</h4>
                  </div>
                </div>
              </div>
            </div>

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">           
            <div class="checkout-progress">
              <ul>
                <li><a href="<?php echo base_url('student/enroll/course') ?>" data-toggle="tooltip" data-placement="top" title="confirm">Course Confirm</a></li>
                <li><a href="<?php echo base_url('student/enroll/payment') ?>" data-toggle="tooltip" data-placement="top" title="payment">Payment Confirm</a></li>
                <li class="third-check"><a href="p<?php echo base_url('student/enroll/complete') ?>" data-toggle="tooltip" data-placement="top" title="step">Enroll Step Complete</a></li>
              </ul>
            </div>                        
          </div>

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">     
            <div>
              <h4>အတန်းသစ်အပ်နှံမှုအား ကျေးဇူးတင်ရှိပါသည်။</h4>
              <p class="text-danger">
                <span>* ကျေးဇူးပြု၍ အောက်ဖော်ပြပါအချက်အလက်များအတိုင်း သင်တန်းကြေးဖြည့်သွင်းပေးပါ။</span><br>
                <span>* သင်ဖြည့်စွက်ထားသော အချက်အလက်များကိုအတည်ပြုပြီးပါက ကျောင်းမှဆက်သွယ်အကြောင်းကြားပေးပါမည်။</span>
              </p>
              <hr>
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td>ဘဏ်အကောင့်အမည်</td>
                      <td><?php echo $payment->pay_name; ?></td>
                    </tr>
                    <tr>
                      <td>ငွေပေးသွင်းရမည့်အကောင့်</td>
                      <td><?php echo $payment->reference; ?></td>
                    </tr>
                    <tr>
                      <td>အကောင့်အမည်</td>
                      <td><?php echo $payment->usr_name; ?></td>
                    </tr>
                  </tbody>
                </table>
              
              <div id="mypage">
                <a href="<?php echo base_url('student/dashboard'); ?>" class="backBtn float-right">My Page</a>
              </div>
            </div>   
        </div> 
      </div>
      </div>
      <?php include("sidebar_dashboard.php"); ?> 
  </div>
</div>
</div>
<!-- courseone-area end Here -->
<?php include(dirname(__FILE__) ."/../template/footer.php"); ?> 