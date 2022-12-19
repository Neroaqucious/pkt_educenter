<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>            
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>
  <div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title">Email Detail</h1>
    </div> 
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a href="<?php echo base_url('adm/portal/email'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>
      </div>
    </div>
  </div> 

  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
        <h5>Subject : <?php echo $result->subject; ?></h5>
        <div class="clearfix my-4"></div>
          <?php echo $result->content; ?>
        <div class="clearfix"></div>

        <div class="float-right">
          <span class="border-left border-dark pl-2 border-width-medium">Reference Key : <span class="text-dark ml-2"><?php echo $result->def_key; ?></span></span>
          <div class="clearfix"></div>
          <span class="border-left border-dark pl-2 border-width-medium">Created date : <span class="text-dark ml-2"><?php echo $result->created_at; ?></span></span>
          <div class="clearfix"></div>
          <span class="border-left border-dark pl-2 border-width-medium">Updated date : <span class="text-dark ml-2"><?php echo $result->updated_at; ?></span></span>
          <div class="clearfix"></div>
          <span class="border-left border-dark pl-2 border-width-medium">Status : <span class="text-dark ml-2">
            <?php if($result->status == 1) { ?>       
              <span class="badge badge-success text-white">Public</span>
            <?php } else { ?>
              <span class="badge badge-dark text-white">Private</span>
            <?php } ?>
            </span>
          </span>
        </div>
        <div class="clearfix"></div>
          <hr class="my-4 dashed clearfix">
            <div class="text-right">
              <a href="<?php echo base_url('adm/portal/email/edit/'.$result->id); ?>" class="btn btn-danger py-1 px-2 mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Email"><span class="material-icons align-middle">edit</span></a>
            </div> 
        </div>
      </div>
    </div>
  </div>
  <?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>