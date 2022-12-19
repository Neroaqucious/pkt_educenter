<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
  <!-- Course One side bar area start Here-->
  <aside>
    <div class="sidebar-widgect">
      <div class="singleside-widgect">
        <div class="widgect-title">
          <h3>Find Your Courses</h3>
        </div>
        <div class="widgect-form">
          <?php
            $attributes = array('class' => '');
            echo form_open('course/find', $attributes);
          ?>
            <?php
              echo form_input(array(
                'name' => 'title',
                'type' => 'hidden',
                'value' => 'title'
              ));
            ?>
            <?php
              echo form_input(array(
                'name' => 'key',
                'type' => 'text',
                'value' => "",
                'id' => "name",
                'placeholde' => 'Courses Name'
              ));
            ?>
            
            <div class="form-btn">
              <button class="btn-icon"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;search</button>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
      <div class="singleside-widgect">
        <div class="widgect-title">
          <h3>Categories</h3>
        </div>
        <div class="widgect-category">
          <ul>
            <?php foreach($subcat as $row) { ?>
            <li><a href="<?php echo base_url('course/search/cat/'.$row->id); ?>"><?php echo ucfirst($row->name); ?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="singleside-widgect">
        <div class="widgect-title">
          <h3>Classes</h3>
        </div>
        <div class="widgect-category">
          <ul>
            <li><a href="<?php echo base_url('course/search/ref/online'); ?>"> Online Classes</a></li>
            <li><a href="<?php echo base_url('course/search/ref/offline'); ?>"> Local Classroom</a></li>
          </ul>
        </div>
      </div>
      <div class="singleside-widgect">
        <div class="widgect-title">
          <h3>Recent News</h3>
        </div>
        <div class="recentnews-widgect">
          <div class="recentnews-list">
          <?php foreach($news as $new) { ?>
            <div class="single-recentnews">
              <div class="recentnews-img">
                <a href="<?php echo base_url('news/detail/'.$new->id); ?>">
                  <img src="<?php echo base_url('upload/assets/adm/new/'.$new->photo); ?>" alt="images"></a>
              </div>
              <div class="recentnews-contetn">
                <div class="recentnews-title">
                  <h4><a href="<?php echo base_url('news/detail/'.$new->id); ?>"><?php echo $new->title; ?></a></h4>
                  <p><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<?php echo date("d M, Y", strtotime($new->updated_at)); ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </aside>
  <!-- Course One side bar area end Here-->
</div>