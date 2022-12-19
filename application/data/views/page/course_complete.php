<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?>  

<!-- Checkout Page Area Start-->
<div class="checkout-page-area"> 
  <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">           
      <div class="checkout-progress">
       <ul>
          <li><a href="course_confirm.html" data-toggle="tooltip" data-placement="top" title="Completed">Course Confirm</a></li>
          <li><a href="payment_confirm.html" data-toggle="tooltip" data-placement="top" title="Completed">Payment Confirm</a></li>
         <li class="third-check"><a href="payment_complete.html" data-toggle="tooltip" data-placement="top" title="Completed">Payment Complete</a></li>
        
        </ul>
      </div>                        
    </div>
    <div class="row">
      <div class="checkout">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <h4 class="panel-title">Payment Complete</h4>
            <div class="panel panel-default total-area">
            <div class="container">
              <div class="row">
                  <div class="col-lg-6 col-lg-offset-5 col-md-7 col-sm-12 col-xs-12">
                    <div class="learning-content">
                      <h3> အတန်းသစ်အပ်နှံမှုအား<p>ကျေးဇူးတင်ရှိပါသည်</p></h3>
                      <p>သင်ဖြည့်စွက်ထားသော အချက်အလက်များကိုအတည်ပြုပြီးပါက ကျောင်းမှဆက်သွယ်အကြောင်းကြားပေးပါမည်</p>
                      <div class="box btn-confirm-box">
                        <a href="<?php echo base_url(); ?>" class="backBtn">To Home</a>
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