<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include('html head.php'); ?>
<?php include('function.php'); ?>
<body>
<!-- header-area start Here -->
<div class="page">
  <header class="navigation">
    <div class="header-area">
      <div class="header-top" >
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-6">
              <div class="topbar-left">
                <p>
                  <!-- <div class="search-box-area">
                    <div class="search-box">
                      <?php
                        $attributes = array('id' => 'search_form');
                        echo form_open('course/find', $attributes);
                      ?>
                        <?php
                          echo form_input(array(
                            'name' => 'title',
                            'type' => 'hidden',
                            'value' => 'title'
                          ));
                        ?>
                          <input type="text" name="key" id="pc-search" class="search" placeholder="Search......" required>
                          <a href="javascript:{}" onclick="document.getElementById('search_form').submit();" class="search-button"><i class="fa fa-search" aria-hidden="true"></i></a>
                      <?php echo form_close(); ?>
                    </div>
                  </div> -->
                </p>
              </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-6 col-xs-6">
              <div class="topbar-right text-right">
                <ul>
                  <!-- <li><a href="#"><i class="fa fa-send"></i> info@pkteducationcenter.com</a></li> -->
                  <li><a href="#"><i class="fa fa-phone"></i>+959 251801804, +959 251801805</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="header-bottom" id="sticky">
    <div class="pixing">
      <div class="container">
          <div class="row">
              <div class="logo-area">
                <a href="<?php echo base_url(''); ?>">
                  <img src="<?php echo base_url('asset/images/pkt.png'); ?>" alt="logo">
                </a>
              </div>
              <div class="col-lg-8 col-md-7 col-sm-8 col-xs-8">
                <div class="menu-area">
                  <nav class="main-menu" id="nav">
                    <ul>
                      <li class="<?php if(get_uri($pass, 0) == "home"){ echo "current"; } ?>"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                      <li class="<?php if(get_uri($pass, 0) == "aboutus"){ echo "current"; } ?>"><a href="<?php echo base_url('aboutus'); ?>">About Us</a></li>
                      <li class="<?php if(get_uri($pass, 0) == "course"){ echo "current"; } ?>"><a href="#courses">Courses <i class="fa fa-angle-down"></i></a>
                        <ul>
                          <li><a href="<?php echo base_url('course/search/ref/offline'); ?>">Local Classroom</a></li>
                          <li><a href="<?php echo base_url('course/search/ref/online'); ?>">Online Courses</a></li> 
                        </ul>
                      </li>
                      <li class="<?php if(get_uri($pass, 0) == "qanda"){ echo "current"; } ?>"><a href="<?php echo base_url('qanda'); ?>">Q&A</a></li>
                      <li class="<?php if(get_uri($pass, 0) == "news"){ echo "current"; } ?>"><a href="<?php echo base_url('news'); ?>">News</a></li>
                      <li class="<?php if(get_uri($pass, 0) == "contactus"){ echo "current"; } ?>"><a href="<?php echo base_url('contactus'); ?>">Contact Us</a></li>    
                    </ul>
                  </nav>
                </div>
              </div>
              
              <!-- <div class="col-lg-3 col-md-4 col-sm-2 col-xs-2">
                <?php if(isset($this->session->__student_token_slug)) { ?>
                  <div class="mypa">
                    <div class="mypage">
                      <a href="<?php echo base_url('student/dashboard') ?>"><p>MY PAGE</p></a>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="logsign">
                    <div class="login">
                      <a href="<?php echo base_url('auth/login') ?>"><p>Log in</p></a>
                    </div>
                    <div class="signup">
                      <a href="<?php echo base_url('auth/regist') ?>"><p>Sign up</p></a>
                    </div>
                  </div>
              <?php } ?>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- header-area end Here -->

<!-- mobile-menu-area start -->
  <div class="mobile-menu-area">
    <div class="mobile-logo">
      <a href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('asset/images/pkt.png'); ?>" alt="logo"></a>
    </div>
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="mobile-menu">
                      <nav id="dropdown">
                          <ul>
                            <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                            <li><a href="<?php echo base_url('aboutus'); ?>">About Us</a></li>
                            <li><a href="#courses">Courses <i class="fa fa-angle-down"></i></a>
                              <ul>
                                <li><a href="<?php echo base_url('course/search/ref/offline'); ?>">Local Classroom</a></li>
                                <li><a href="<?php echo base_url('course/search/ref/online'); ?>">Online Courses</a></li> 
                              </ul>
                            </li>
                            <li><a href="<?php echo base_url('qanda'); ?>">Q&A</a></li>
                            <li><a href="<?php echo base_url('news'); ?>">News</a></li>
                            <li><a href="<?php echo base_url('contactus'); ?>">Contact Us</a></li>
                            <!-- <li class="mobile-login">
                            <?php if(isset($this->session->__student_token_slug)) { ?>
                              <div class="mypa">
                                <div class="mypage">
                                  <a href="<?php echo base_url('student/dashboard') ?>"><p>MY PAGE</p></a>
                                </div>
                              </div>
                            <?php } else { ?>
                              <div class="logsign">
                                <div class="login">
                                  <a href="<?php echo base_url('auth/login') ?>"><p>Log in</p></a>
                                </div>
                                <div class="signup">
                                  <a href="<?php echo base_url('auth/regist') ?>"><p>Sign up</p></a>
                                </div>
                              </div>
                            <?php } ?>
                            </li> -->
                           <!--  <li>
                              <?php
                                $attributes = array('id' => 'search_form-sp');
                                echo form_open('course/find', $attributes);
                              ?>
                                <?php
                                  echo form_input(array(
                                    'name' => 'title',
                                    'type' => 'hidden',
                                    'value' => 'title'
                                  ));
                                ?>
                                  <input type="text" name="key" id="sp-search" class="search" placeholder="Search......" required>
                                  <a href="javascript:{}" onclick="document.getElementById('search_form').submit();" class="mobile-search"><i class="fa fa-search" aria-hidden="true"></i></a>
                              <?php echo form_close(); ?>
                             
                            </li> -->
                        </ul>
                      </nav>
                  </div>                  
              </div>
          </div>
      </div>
  </div>
  <!-- mobile menu area end Here -->