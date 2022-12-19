<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>            
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>
  <div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title border-left border-success pl-2 border-width-medium">Portfolio Detail</h1>
      <p class="text-muted m-0 desc">All activity portfolio</p>
    </div> 
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      
      <a href="<?php echo base_url('adm/portfo'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>

      <span class="dropdown">
        <button type="button" id="downloadGrid1" data-toggle="dropdown" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">save_alt</span></button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="downloadGrid1">
          <a class="dropdown-item" href="#">CSV (Online)</a>
          <a class="dropdown-item" href="#">CSV (Local)</a>
        </div>
      </span>
      
      </div>
    </div>
  </div> 

  <div class="card">
    <div class="card-header bg-dark text-light">
      <?php echo $result->title; ?>
    </div>
    <div class="card-body">

    <div class="row">
      <div class="col-lg-12">
        <img class="img-thumbnail mb-4 img-fluid bg-white" src="<?php echo base_url('upload/other/'.$result->photo); ?>">        
        
        <div class="col-md-12">
          <div class="col-md-4 float-left">
            <span class="border-left border-info pl-2 border-width-medium d-block bg-light"><span class="text-dark ml-2 weight-400">Tags : <?php echo ucfirst($result->name); ?></span></span>
          </div>
          <div class="col-md-4 float-left">
            <small class="border-left border-dark pl-2 border-width-medium">
            <span class="text-dark">Status : <?php if($result->status == 1) { echo "Public"; } else {  echo "Private"; } ?></span></small>
          </div>
          <div class="col-md-4 float-left">
            <small class="border-left border-dark pl-2 border-width-medium"><span class="text-dark">Upload date : <?php echo date($_SESSION['sess_timeformat'], strtotime($result->upload_date)); ?></span></small>
          </div>
          
        </div>
          <div class="clearfix"></div>
          <hr class="my-4 dashed clearfix">

          <a href="<?php echo base_url('adm/portfo/edit/'.$result->id); ?>" class="btn btn-danger py-1 px-2 float-right ml-2" ><span class="material-icons align-text-bottom">edit</span></a>

          <a href="<?php echo base_url('adm/portfo'); ?>" class="btn btn-secondary py-1 px-2 float-right" ><span class="material-icons align-text-bottom">keyboard_backspace</span></a>

        </div>
      </div>
    </div>
  </div>
  <?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>