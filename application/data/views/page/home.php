<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/aside.php"); ?>
 <!-- service area start Here    -->
 <section>
  <div class="service-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-heading text-center">
            <h2>Course Outline</h2>
          </div> 
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="col-lg-4 col-md-4 p-0 m-0">
            <div class="single-service" style="margin:0 auto;">
            <div class="service-icon">
              <a href="<?php echo base_url('course/search/cat/1'); ?>" class="i fa fa-language"></a>
            </div>
            <div class="service-content">
              <h4><a href="<?php echo base_url('course/search/cat/1'); ?>">Japanese language</a></h4>
              <p>အခြေခံမှအဆင့်မြင့်အထိ ဂျပန်နိုင်ငံအသိအမှတ်ပြု JLPT စာမေးပွဲကိုဖြေဆိုနိုင်ရန်သင်ကြားပေးနေပါပြီ</p>
            </div>
          </div>
          </div>
          <div class="col-lg-4 col-md-3 p-0 m-0">
          <div class="single-service" style="margin:0 auto;">
            <div class="service-icon">
              <a href="<?php echo base_url('contactus') ?>" class="i fa fa-sitemap"></a>
            </div>
            <div class="service-content">
              <h4><a href="<?php echo base_url('contactus') ?>">Web Design & Coding</a></h4>
              <p>ဝက်ဘ်ဆိုဒ်တစ်ခုကို ကိုယ်တိုင်ရေးဆွဲနိုင်စေရန် ဒီဇိုင်းဆွဲပုံအခြေခံနှင့် ကုဒ်များရေးပုံအခြေခံကိုသင်ကြားပေးနေပါပြီ</p>
            </div>
          </div>
          </div>
          <div class="col-lg-4 col-md-3 p-0 m-0">
          <div class="single-service" style="margin:0 auto;">
            <div class="service-icon">
              <a href="<?php echo base_url('contactus') ?>" class="i fa fa-code"></a>
            </div>
            <div class="service-content">
              <h4><a href="<?php echo base_url('contactus') ?>">ITPEC ( IT,FE )</a></h4>
              <p>ဂျပန်နိုင်ငံအသိအမှတ်ပြု ကွန်ပျူတာနည်းပညာရှင်လက်မှတ်ကိုရရှိနိုင်ရန် သင်ကြားပေးနေပါပြီ</p>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- service area end Here    -->

<!-- about us area start Here -->
<div class="aboutus-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="section-heading text-center">
          <h2>About Us</h2>
        </div> 
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="about-video">
          <a href="#"><img src="<?php echo base_url('asset/images/about/video.jpg'); ?>" alt="PKT Education Center about video"></a>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="about-content">
          <h3>WELCOME TO <span>PKT Education Center</span></h3>
          <p>ဂျပန်နိုင်ငံတွင် နည်းပညာ ကောလိပ်တက်ရောက်ပြီး Programmer အနေဖြင့် အလုပ်အကိုင်အတွေ့အကြုံ ၄နှစ် အပြင် မြန်မာပြည်တွင် နည်းပညာ ကုမ္ပဏီကိုတည်ထောင်ထားသော ဆရာ ဆရာမများ ဦးစီးဖွင့်လှစ်ထားခြင်းဖြစ်ပါတယ်။ သင်တန်းကျောင်းတွင် သင်ကြားသော သင်တန်းများအပြင် အွန်လိုင်းမှတက်ရောက်လိုသော သင်တန်းသားများအတွက် အွန်လိုင်းသင်တန်းကိုများလည်း ရှိပါတယ်။ လက်ရှိ အွန်လိုင်းတွင် တက်ရောက်ခဲ့သော သင်တန်းသားပေါင်း ၁၅၀၀ ကျော် သင်ကြားပြီးဖြစ်ပါသည်။</p>
          <div class="about-btn">
            <a href="<?php echo base_url('aboutus'); ?>" class="btn-icon">View More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- about us area end Here -->

<!-- courses area start Here -->
<section>
  <div class="our-courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-heading text-center">
            <h2>Our courses & batches</h2>
          </div> 
        </div>
      </div>
      <div class="row">
        <div class="chourses-list">
            <?php $x=0; foreach($course as $row) { ?>
          <div class="single-courses">
            <div class="courch-img">
              <a href="<?php echo base_url('course/detail/'.$row->slug_name); ?>"><img src="<?php echo base_url('upload/assets/adm/cos/'.$row->cos_image); ?>" alt="PKT Education Cetner Enroll Course - <?php echo $x; ?>"></a>
            </div>
            <div class="courch-content">
              <h3><a href="<?php echo base_url('course/detail/'.$row->slug_name); ?>"><?php echo $row->cos_title; ?></a></h3>
              <!-- <div class="amount">
                <ul>
                  <?php if($row->fees == 0) { ?>
                  <li><a href="<?php echo base_url('course/detail/'.$row->slug_name); ?>"> Free Course</a></li>
                  <?php } else { ?>
                  <li><a href="<?php echo base_url('course/detail/'.$row->slug_name); ?>"><?php echo number_format($row->fees); ?> MMK</a></li>
                  <?php } ?>
                </ul>
              </div> -->
              <div class="social-media">
                <ul>
                    <li>Trainer : <?php echo $row->trainer; ?></li>
                    <li>Class : <span class="notic"><?php if($row->ref_key == "online") { echo "Online class"; } else { echo "Local classroom"; } ?></span></li>
                    <li>Batch ID : <?php echo $row->batch_id; ?></li>
                    <li>Level : <?php echo strtoupper($row->level); ?>&nbsp;level</li>
                </ul>
                <br>
              </div>
            </div>
          </div>
        <?php $x++; } ?>


        </div>
      </div>
    </div>
  </div>
</section>
<!-- courses area area end Here -->

<!-- counter area start Herer -->
<div class="countewr-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="single-counter">
                    <div class="counter-icon">
                        <i class="fa fa-registered"></i>
                    </div>
                    <div class="counter-content">
                        <p>Registered Student</p>
                        <div class="counter">500 </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="single-counter">
                    <div class="counter-icon">
                        <i class="fa fa-tv"></i>
                    </div>
                    <div class="counter-content">
                        <p>Online Student</p>
                        <div class="counter">1550 </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="single-counter">
                    <div class="counter-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="counter-content">
                        <p>Certified Student</p>
                        <div class="counter">300 </div>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="single-counter">
                    <div class="counter-icon">
                        <i class="fa fa-sitemap"></i>
                    </div>
                    <div class="counter-content">
                        <p>Trainer</p>
                        <div class="counter">7</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- counter area end Herer -->

<!-- our trainer area start Here -->
<section>
  <div class="our-trainer">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-heading text-center">
            <h2>Our trainers</h2>
          </div> 
        </div>
      </div>
      <div class="row">
        <div class="tainer-list">
            <?php $x=0; foreach ($trainer as $row) { ?>
          <div class="single-trainer">
            <div class="tainer-img">
                <img src="<?php echo base_url('upload/assets/adm/inst/'.$row->images); ?>" alt="PKT Education Cetner tainer picture - <?php echo $x; ?>">
            </div>
            <div class="trainer-content">
                <h3><a href="#"><?php echo $row->name; ?></a> <span><?php echo $row->course; ?></span></h3>
            </div>
          </div>
            <?php $x++; } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- our trainer area end Here -->

<!-- testomilial area start Here -->
<section>
  <div class="testomonial">
    <div class="container">
      <div class="row">
        <div class="testominial-slide">
          <div class="single-testomonial">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="testomonial-img">
                <img src="<?php echo base_url('asset/images/testomonial/1.jpg'); ?>" alt="Pkt admin profile">
              </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
              <div class="testomonial-content">
                <h3><a href="#">POE KYI THAR</a> <span>Managing Director</span></h3>
                <p>ဂျပန်နိုင်ငံတွင် နည်းပညာ ကောလိပ်တက်ရောက်ပြီး Programmer အနေဖြင့် အလုပ်အကိုင်အတွေ့အကြုံ ၄နှစ် အပြင် မြန်မာပြည်တွင် နည်းပညာ ကုမ္ပဏီကိုတည်ထောင်ထားသော ဆရာ ဆရာမများ ဦးစီးဖွင့်လှစ်ထားခြင်းဖြစ်ပါတယ်။ သင်တန်းကျောင်းတွင် သင်ကြားသော သင်တန်းများအပြင် အွန်လိုင်းမှတက်ရောက်လိုသော သင်တန်းသားများအတွက် အွန်လိုင်းသင်တန်းကိုများလည်း ရှိပါတယ်။ လက်ရှိ အွန်လိုင်းတွင် တက်ရောက်ခဲ့သော သင်တန်းသားပေါင်း ၁၅၀၀ ကျော် သင်ကြားပြီးဖြစ်ပါသည်။</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- testomilial area end Here -->

<!-- blog-area strt Here -->
<section id="blog">
  <div class="blogtwo-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-heading text-center">
            <h2>Our Latest News</h2>
          </div> 
        </div>
      </div>
      <div class="row">
        <div class="slide-blog">
        <?php
        $x = 1;
        foreach($news as $row){ ?>
          <div class="single-blog">
            <div class="blog-img blogimg<?php echo $x; ?>">
              <a href="<?php echo base_url('news/detail/'.$row->id); ?>"><img src="<?php echo base_url('upload/assets/adm/new/'.$row->photo); ?>" alt="PKT Education Cetner new images - <?php echo $x; ?>"></a>
              <div class="date">
                <h4><?php echo date('d', strtotime($row->created_at)); ?>&nbsp;<span><?php echo date('M', strtotime($row->created_at)); ?></span></h4>
              </div>
            </div>
            <div class="blog-content">
              <h4><a href="<?php echo base_url('news/detail/'.$row->id); ?>"><?php echo $row->title; ?></a></h4>
              <div><?php echo $row->content; ?> </p></div>
            </div>
          </div>
            <?php } ?>
        </div>
      </div>
      <div class="lordmor-btn">
        <a href="<?php echo base_url('news'); ?>" class="btn-hr">View More</a>
      </div>
    </div>
  </div>
</section>
<!-- blog-area end Here -->
<?php include(dirname(__FILE__) ."/../template/footer.php"); ?>