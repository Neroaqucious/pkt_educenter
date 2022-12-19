<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
  <!-- Course One side bar area start Here-->
  <aside>
    <div class="sidebar-widgect">   
      <div class="singleside-widgect pc">
        <div class="widgect-title">
          <span>
          Student ID : <?php echo ($_SESSION['__student_user_data']['student_id']); ?> </span>
          <h3><?php echo $_SESSION['__student_user_data']['user_name']; ?></h3>
        </div>
        <div class="widgect-category">
          <ul>
            <li><a href="<?php echo base_url('student/dashboard'); ?>" class="<?php if($uri[0] != "" && $uri[0] == "dashboard") { echo "current-sidebar"; } ?>">My Page</a></li>
            <?php if(!empty($_SESSION['__enroll_course_package'])) { ?>  
            <li><a href="<?php echo base_url('student/enroll/course'); ?>" class="<?php if($uri[0] != "" && $uri[0] == "enroll") { echo "current-sidebar"; } ?>">Enroll Courses</a></li>
            <?php } ?>
            <li><a href="<?php echo base_url('student/profile'); ?>" class="<?php if($uri[0] != "" && $uri[0] == "profile") { echo "current-sidebar"; } ?>">My Profile</a></li>
            <li><a href="<?php echo base_url('student/purchase/history/'); ?>" class="<?php if($uri[0] != "" && $uri[0] == "history") { echo "current-sidebar"; } ?>">Purchase History</a></li>
            <li><a href="<?php echo base_url('auth/logout'); ?>">Logout</a></li>
          </ul>
        </div>
      </div>
      <section class="top-nav sp">
        <div class="hello">
          <h3><?php echo strtoupper($_SESSION['__student_user_data']['user_name']); ?></h3>
        </div>
        <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
          <div class='menu-button'></div>
        </label>
        <ul class="menu">
        <li><a href="<?php echo base_url('student/dashboard'); ?>" class="<?php if($uri[0] != "" && $uri[0] == "dashboard") { echo "current-sidebar"; } ?>">My Page</a></li>
            <?php if(!empty($_SESSION['__enroll_course_package'])) { ?>  
            <li><a href="<?php echo base_url('student/enroll/course'); ?>" class="<?php if($uri[0] != "" && $uri[0] == "enroll") { echo "current-sidebar"; } ?>">Enroll Courses</a></li>
            <?php } ?>
            <li><a href="<?php echo base_url('student/profile'); ?>" class="<?php if($uri[0] != "" && $uri[0] == "profile") { echo "current-sidebar"; } ?>">My Profile</a></li>
            <li><a href="<?php echo base_url('student/purchase/history/'); ?>" class="<?php if($uri[0] != "" && $uri[0] == "history") { echo "current-sidebar"; } ?>">Purchase History</a></li>
            <li><a href="<?php echo base_url('auth/logout'); ?>">Logout</a></li>
        </ul>
      </section>
      
      <div class="singleside-widgect">
        <div class="widgect-category">
          <?php echo $calendar; ?>
        </div>
        <div style="clear:both;"></div>
      </div>
      

      <?php if(!empty($course) && !empty($parts) && isset($permission->permission) == 1 && $result->status == 1 && $sidebar == 'on'){ ?>
        <div class="singleside-widgect">
          <div class="widgect-title">
            <h3><?php echo $course->cos_title; ?></h3>
          </div>
          <div class="recentnews-widgect">
            <div class="recentnews-list">
            <?php
              $x = 1;
              foreach($parts as $part){ 
            ?>
              <div class="single-recentnews">
                <div class="panel panel-default course-content">
                  <div class="panel-heading tab-number" role="tab" id="heading<?php echo $x; ?>">
                    <p class="panel-title">
                      <a class="collapsed recent" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $x; ?>" aria-expanded="false" aria-controls="collapse<?php echo $x; ?>">
                        <?php echo $part->name; ?>
                        <?php 
                          foreach($parts_detail as $total) { 
                            if($part->id == $total->part_id) {
                        ?>
                        <span class="video-timing">
                        <i class="fa fa-play-circle" aria-hidden="true"></i>&nbsp;<?php echo $total->count_less; ?> Lessons
                        </span>
                        <?php } } ?>
                        
                      </a>
                    </p>
                  </div>
                  
                  <div id="collapse<?php echo $x; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $x; ?>">
                    <div class="order-review">
                      <ul class="recent-vd">
                      <?php    
                        foreach($lists as $row){ 
                          if($part->id == $row->part_id) {
                        ?>
                        <li>
                          <a href="<?php echo base_url('student/lessons/'.$row->less_id.'/'.$row->slug_name); ?>">
                          <i class="fa fa-play-circle"></i>
                          <span><?php echo $row->title; ?></span>
                          <span class="video-timing"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?php echo $row->minute; ?></span>
                          </a>
                        </li>
                        <?php } } ?>
                      </ul>           
                  </div>
                  </div>
                </div>
              </div>
            <?php $x++; } ?>
            </div>
          </div>
        </div>
      <?php } ?>


      </div>
    </aside>
  <!-- Course One side bar area end Here-->
</div>