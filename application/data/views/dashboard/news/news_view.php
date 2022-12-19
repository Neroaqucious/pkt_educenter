<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>            
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>
  <div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3">News Detail</h1>
    </div> 
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a href="<?php echo base_url('adm/portal/news'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>      
      </div>
    </div>
  </div> 

  <div class="card">
    <div class="card-body">

    <div class="row">
      <div class="col-lg-12">
        <h4 class="title mb-3"><?php echo $result->title; ?></h4>
        <div class="col-md-12">
          <div class="col-md-4 mb-3">
            <a href="#" class="badge badge-info">Tags : <?php echo ucfirst($result->name); ?></a>
          </div>
        </div>
    
        <img class="img-thumbnail mb-4 img-fluid bg-white col-md-8" src="<?php echo base_url('upload/assets/adm/new/'.$result->photo); ?>">        
        <?php echo $result->content; ?>
        <div class="col-md-4 float-left">
            <span class="text-dark">Created Date : <?php echo $result->created_at; ?></span><br>
            <span class="text-dark">Updated Date : <?php echo $result->updated_at; ?></span>
          </div>
          Status : 
          <?php if($result->status == 1) { ?>
                <a href="#" class="badge badge-success text-light">Public</a>
              <?php } else { ?>
                <a href="#" class="badge badge-dark">Status : Private</a>
              <?php } ?>
      <div class="clearfix"></div>
      <hr class="my-4 dashed clearfix">

          <a href="<?php echo base_url('adm/portal/news/edit/'.$result->id); ?>" class="btn btn-danger py-1 px-2 float-right ml-2" ><span class="material-icons align-text-bottom">edit</span></a>
          <a href="<?php echo base_url('adm/portal/news'); ?>" class="btn btn-secondary py-1 px-2 float-right" ><span class="material-icons align-text-bottom">keyboard_backspace</span></a>

      </div>
    </div>
  </div>
</div>



  <?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>