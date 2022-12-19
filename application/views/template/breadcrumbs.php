<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- header breadcrumbs start Here -->
<div class="header-breadcrumbs <?php if(!empty($uri[1]) && $uri[1] == "pc_only") { echo "pc"; } ?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcrumbs-title text-center">
          <h2><?php if(!empty($title)){ echo ucfirst($title); } else { echo "HOME"; } ?></h2>
          <div class="subheader-pages">
            <ul>
              <li><a href="<?php echo base_url(''); ?>"> Home</a></li>
              <?php foreach($pass as $key=>$value) { ?>
                <li><a href="<?php echo base_url($value); ?>"><?php print_r($key); ?></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- header breadcrumbs end Here -->