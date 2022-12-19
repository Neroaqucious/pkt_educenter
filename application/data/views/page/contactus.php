<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?>  

<!-- Contact Us-area start Here -->
<div class="contactus-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="address-area">
          <div class="row">
            <div class="col-lg-5 md-5 col-sm-12 col-xs-12">
              <div class="singpe-address">
                <div class="hotline-icon">
                  <a href="#"><i class="fa fa-map-marker"></i></a>
                </div>  
                <div class="hotline-content">
                  <h4>Address</h4>
                  <p>No(71), Room A, 6th Floor, Upper Pazundaung Road Mingalar Taung Nyunt Township,Yangon.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-5 md-5 col-sm-12 col-xs-12">
              <div class="singpe-address">
                <div class="hotline-icon">
                  <a href="#"> <i class="fa fa-phone"></i></a>
                </div>  
                <div class="hotline-content">
                  <h4>Phone</h4>
                  <a href="#">+959 251801804, +959 251801805</a>
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-4 md-4 col-sm-12 col-xs-12">
              <div class="singpe-address">
                <div class="hotline-icon">
                  <a href="#"><i class="fa fa-envelope"></i></a>
                </div>  
                <div class="hotline-content">
                  <h4>Email</h4>
                  <a href="mailto:http://info@pkteducationcenter.com">info@pkteducationcenter.com</a>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- error report area -->
      <?php if(!empty($_SESSION['msg_error'])){ ?>
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Danger!</strong> <?php echo $_SESSION['msg_error']; ?> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="fa fa-close"></span>
          </button>
        </div>
      <?php } ?>
      <!-- error report area -->
        <!-- error report area -->
        <?php if(!empty($_SESSION['msg_success'])){ ?>
        <div class="alert alert-success alert-dismissible show" role="alert">
          <strong>Success!</strong> <?php echo $_SESSION['msg_success']; ?> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="fa fa-close"></span>
          </button>
        </div>
      <?php } ?>
      <!-- error report area -->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-title text-center">
          <h3>Leave us a message</h3>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="row">
          <div class="contractus-form">

            <?php
              $attributes = array('class' => '');
              echo form_open('contactus', $attributes);
            ?>
              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php
                      echo form_input(array(
                        'name' => 'name',
                        'type' => 'text',
                        'placeholder' => 'Enter Name',
                        'value' => html_escape(set_value('name',isset($_SESSION['__student_user_data']['user_name'])?$_SESSION['__student_user_data']['user_name']:''), ENT_QUOTES),
                        'required' => 'required'
                      ));
                    ?>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php
                      echo form_input(array(
                        'name' => 'email',
                        'type' => 'email',
                        'value' => html_escape(set_value('email',isset($_SESSION['__student_user_data']['user_email'])?$_SESSION['__student_user_data']['user_email']:''), ENT_QUOTES),
                        'placeholder' => 'Enter Email',
                        'required' => 'required'
                      ));
                    ?>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                      echo form_input(array(
                        'name' => 'subject',
                        'type' => 'text',
                        'placeholder' => 'Enter Subject',
                        'required' => 'required'
                      ));
                    ?>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea name="messagess" id="mesaagess" cols="30" rows="10" placeholder="Message*" required></textarea>
                    <button class="btn"><span>SUBMIT</span></button>
                  </div>

                </div>
              </div>
              <!-- <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <button class="btn"><span>SUBMIT</span></button>
              </div> -->
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <!-- Contact Page Map Area Start-->   
        <div class="map-area">
          <div id="map" style="width:100%;height:300px;">
            <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.8842710575786!2d96.17198571447675!3d16.782432388443738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ed6232ed2ac1%3A0x5817e6d2d92f0b44!2sPKT%20IT%20%26%20Japanese%20Language%20Center!5e0!3m2!1sen!2smm!4v1585037167965!5m2!1sen!2smm" width="100%" height="300" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
            </div>
          </div>   
        </div>
        <!-- Contact Page Map Area End-->
      </div>
    </div>
  </div>
<!-- 40.contactus-area end Here -->

<?php include(dirname(__FILE__) ."/../template/footer.php"); ?>  