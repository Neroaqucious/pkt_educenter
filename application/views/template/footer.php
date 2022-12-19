<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 <!-- footer-area srart Here -->
 <footer>
  <div class="footer-area">
    <div class="footer-weidget">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="single-weidget">
              <div class="footer-logo">
                <a href="home.html"><img src="<?php echo base_url('asset/images/pkt.png'); ?>" alt="logo"></a>
              </div>
              <div class="footer-content-text">
                <p>အနာဂတ်အတွက် ဂျပန်စာနှင့် နည်းပညာကိုလေ့လာပြီး အောင်မြင်တဲ့ဘဝပန်းတိုင်ကိုတက်လှမ်းနိုင်ရန်အတွက် PKT Education Center မှသင်ကြားပေးနေပါပြီ...</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="single-weidget">
              <div class="footer-header">
                <h3>Information For</h3>
              </div>
              <div class="footer-content">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul>
                      <li  class="fleft">
                        <ul>
                            <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-caret-right"></i>Home</a></li>
                            <li><a href="<?php echo base_url('aboutus'); ?>"><i class="fa fa-caret-right"></i>About Us</a></li>
                            <li><a href="<?php echo base_url('course/search/ref/offline'); ?>"><i class="fa fa-caret-right"></i>Offline Courses</a></li>
                            <li><a href="<?php echo base_url('course/search/ref/online'); ?>"><i class="fa fa-caret-right"></i>Online Courses</a></li>
                            <li><a href="<?php echo base_url('qanda'); ?>"><i class="fa fa-caret-right"></i>Q & A</a></li>
                            
                        </ul>
                      </li>
                      <li class="fright">
                        <ul>
                          <li><a href="<?php echo base_url('news'); ?>"><i class="fa fa-caret-right"></i>News</a></li>
                          <li><a href="<?php echo base_url('contactus'); ?>"><i class="fa fa-caret-right"></i>Contact</a></li>
                          <?php if(isset($this->session->__student_token_slug)) { ?>
                            <li><a href="<?php echo base_url('student/dashboard'); ?>"><i class="fa fa-caret-right"></i>My page</a></li>
                          <?php } else { ?>
                          <!-- <li><a href="<?php echo base_url('auth/login'); ?>"><i class="fa fa-caret-right"></i>Login</a></li>
                          <li><a href="<?php echo base_url('auth/regist'); ?>"><i class="fa fa-caret-right"></i>Signup</a></li> -->
                          <?php } ?>
                        </ul>
                      </li>
                      
                    </ul>
                  </div>
                  
                </div>
              </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="single-weidget">
              <div class="footer-header">
                <h3>Address</h3>
              </div>
              <div class="featured-content">
                  <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul>
                  <li style="color: #fff;"><i class="fa fa-phone"></i>+959 251801804, +959 251801805</li>
                  <!-- <li><a href="mailto:http://educare@gmail.com"><i class="fa fa-envelope"></i>info@pkteducationcenter.com</a></li> -->
                  <li style="color: #fff;"><i class="fa fa-map"></i>No(71), Room A, Ground Floor, Upper Pazundaung Road Mingalar Taung Nyunt Township,Yangon.</li>
                  <!-- <li><a href="#"><i class="fa fa-fax"></i>12356900297</a></li> -->
                </ul>
              </div>
            </div>
              </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="footer-social text-center">
              <ul>
                <li><a href="https://www.facebook.com/pktitandJapaneseLanguageCenter"><i class="fa fa-facebook"></i></a></li>
                <!-- <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> -->
                
              </ul>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="copyright-area text-center">
              <h6>&copy; 2020 PKT Education Center All Rights Reserved.</h6>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</footer>
</div>
<div id="loading"><div class="spinner"></div></div>
<!-- footer-area end Here -->
<?php include('script.php'); ?>