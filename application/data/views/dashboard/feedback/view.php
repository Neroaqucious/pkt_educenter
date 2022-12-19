<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>            
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>
  <div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title">Feedback Detail</h1>
    </div> 
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a href="<?php echo base_url('adm/portal/feedback'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>
      </div>
    </div>
  </div> 

  <div class="card">
    <div class="card-header bg-dark text-light">
      From : <?php echo $result->name; ?> (<span><?php echo $result->email; ?> </span>)
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          <h5 class="weight-400 mt-2 mb-3">Subject : <?php echo $result->subject; ?></h5>
          <?php echo $result->description; ?>

          <div class="clearfix"></div>
          <hr class="my-4 dashed clearfix">

          <small class="border-left border-danger pl-2 border-width-medium">Received date : <span class="text-muted ml-2"><?php echo $result->created_at; ?></span></small>

          <a href="<?php echo base_url('adm/portal/feedback'); ?>" class="btn btn-secondary py-1 px-2 float-right" ><span class="material-icons align-text-bottom">keyboard_backspace</span></a>
        </div>
      </div>
    </div>
  </div>
  <?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>