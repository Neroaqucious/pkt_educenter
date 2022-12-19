<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
  <!-- Blog Details side bar area start Here-->
  <aside>
    <div class="sidebar-widgect">
      <div class="singleside-widgect">
        <div class="widgect-title">
          <h3>Recent News</h3>
        </div>
        <div class="recentnews-widgect">
          <div class="recentnews-list">
          <?php foreach($recent as $new) { ?>
            <div class="single-recentnews">
              <div class="recentnews-img">
                <a href="<?php echo base_url('news/detail/'.$new->id); ?>">
                  <img src="<?php echo base_url('upload/assets/adm/new/'.$new->photo); ?>" alt="images"></a>
              </div>
              <div class="recentnews-contetn">
                <div class="recentnews-title">
                  <h4><a href="<?php echo base_url('news/detail/'.$new->id); ?>"><?php echo $new->title; ?></a></h4>
                  <p><?php echo date("d M, Y", strtotime($new->updated_at)); ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </aside>
  <!-- blog One side bar area end Here-->
</div>