<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?>  

<!-- Checkout Page Area Start-->
<div class="checkout-page-area"> 
  <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">           
      <div class="checkout-progress">
        <ul>
          <li><a href="<?php echo base_url('enroll/course') ?>" data-toggle="tooltip" data-placement="top" title="Completed">Course Confirm</a></li>
          <li class="second-check"><a href="<?php echo base_url('enroll/payment') ?>" data-toggle="tooltip" data-placement="top" title="Completed">Payment Confirm</a></li>
          <li><a href="p<?php echo base_url('enroll/complete') ?>" data-toggle="tooltip" data-placement="top" title="Completed">Payment Complete</a></li>
        
        </ul>
      </div>                        
    </div>

    <?php
        $attributes = array('class' => '');
        echo form_open('enroll/enroll_check', $attributes);

        echo form_input(array(
          'name' => 'student_id',
          'type' => 'hidden',
          'value' => $_SESSION['__student_user_data']['student_id'],
        ));
    ?>
    <div class="row">
      <div class="checkout">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
             <div class="checkout-progress">
                <h3>*သင်ငွေပေးချေလိုသည့် Payment Method ကိုနှိပ်၍ လိုအပ်သောအချက်အလက်များကိုဖြည့်သွင်းပါ</h3>
              </div>

              <select name="payment_method" id="pay_method">
                <option>Select Payment method</option>
                <?php
                  foreach($payment as $row) { ?>
                    <option value="<?php echo $row->slug; ?>"><?php echo $row->pay_name; ?></option>
                <?php } ?>
              </select>

              <div class="info my-4" id="pay_state">
                <table class="table table-bordered">
                </table>
              </div>
            <div class="phone my-4">
              <label for="phonenumber">ငွေလွှဲမည့်ဖုန်းနံပါတ်အားထည့်သွင်းပါ</label>
                <?php
                  echo form_input(array(
                    'name' => 'phonenumber',
                    'type' => 'text',
                    'placeholder' => 'Enter Your Phone',
                    'class' => "form-control"
                  ));
                ?>
            </div>

            <div class="mt-3">
              <div class="text-danger">
                ( * ငွေလွှဲရာတွင် Student ID အား အကြောင်းအရာတွင် တစ်ခါတည်းဖြည့်ပြီး ငွေလွှဲပေးရန် )
              </div>
              <div class="order-view-left text-danger">
                * အချက်အလက်များဖြည့်သွင်းပြီးပါက Continue ကိုနှိပ်၍ဆက်လက်ပါ။
              </div>
            </div>
          </div>  
          <div class="learning-content">
              <?php foreach ($this->cart->contents() as $items): ?>     
                <img src="<?php echo base_url('upload/assets/adm/cos/'.$items['image']); ?>" alt="courch-img"  style="width:100px;">
                <p><?php echo $items['name']; ?> (<?php echo $_SESSION['__enroll_course_package']['batch_id']; ?>)</p>
                <p><?php echo $items['class']; ?> Course</p>
                <p><?php echo number_format($items['price']); ?> MMK</p>  
              <?php endforeach; ?>
            </div>          
        </div>            
      </div>
    </div>
    <span><em>
    <?php
        if(!empty($this->session->msg)) {
          echo $this->session->msg;
        }
    ?>
    </em></span>
    <br>
    <a href="<?php echo base_url('enroll/course'); ?>" class="btn-hr">Back</a>
    <button type="submit" class="btn-hr">Continue</button>

    <?php echo form_close(); ?>
  </div>

</div>
<!-- Checkout Page Area End-->   

<style type="text/css">
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
.order-review label {
    display: block;
    font-size: 18px;
    color: #444444;
    margin-bottom: 15px;
    font-family: 'Ubuntu', sans-serif;
}
.order-review input {
    width: 30%;
    margin-bottom: 20px;
    height: 45px;
    padding: 10px;
    font-size: 16px;
    color: #444444;
    border: 1px solid #dddddd;
}
.button-area {
    width: 150px;
    margin: 0 auto;
    /* display: inline-block; */
}
.btn-hr {
    display: inline-block;
    vertical-align: middle;
    -webkit-transform: perspective(1px) translateZ(0);
    transform: perspective(1px) translateZ(0);
    position: relative;
    background: #c61508;
    text-align: center;
    padding: 10px 30px;
    -webkit-transition-property: color;
    transition-property: color;
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s;
    font-size: 16px;
    line-height: 24px;
    color: #ffffff;
    text-transform: capitalize;
    /* width: 150px; */
    /* margin: 0 auto; */
}
</style>

<?php include(dirname(__FILE__) ."/../template/footer.php"); ?>  