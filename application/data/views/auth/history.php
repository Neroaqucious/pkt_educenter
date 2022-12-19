<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?> 
<!-- courseone-area start Here -->
<div class="courseone-area">
  <div class="container">
    <div class="row">
      <?php if($permission->permission == 0){ ?>
        <div class="alert alert-danger alert-dismissible show" role="alert">
          <strong>Warning!</strong>  You haven't access for course permission. Please contant with admin!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-close"></span>
          </button>
        </div>
      <?php } ?>    
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
          <div class="courseone-view right-animate">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="view-area fix">
                  <div class="view-title floatleft">
                    <h4 class="heading-padding"><i class="fa fa-info-circle"></i>&nbsp; Your purchased histories</h4>
                  </div>
                </div>
              </div>
            </div>
 
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Course Name</th>
                      <th>Batch ID</th>
                      <th>Fees</th>
                      <th>Purchase Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($lists)) { $x = 1; foreach($lists as $row) { ?>
                    <tr>  
                      <td><?php echo $row->payment_id; ?> </td>
                      <td><?php echo $row->cos_title; ?> </td>
                      <td><?php echo $row->batch_id; ?></td>
                      <td><?php echo number_format($row->total_cash); ?> MMK</td>
                      <td><?php echo $row->created_at; ?></td>
                    </tr>
                    <?php $x++; } } else { ?>
                      <td colspan="5" class="text-center">No record!</td>
                    <?php } ?>
                  </tbody>
                </table>
                
                <!-- paginisition-area start Here -->
                <div class="pagination-area">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <ul>
                        <?php echo $pagination; ?>
                      </ul>
                    </div>
                  </div>
                </div>   
                <!-- paginisition-area end Here -->
              </div>
            </div>

        </div> 
      </div>
      <?php include("sidebar_dashboard.php"); ?> 
    </div>
  </div>
</div>
<!-- courseone-area end Here -->
<?php include(dirname(__FILE__) ."/../template/footer.php"); ?> 