<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>            
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>
  <div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title">QandA Detail</h1>
    </div> 
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a href="<?php echo base_url('adm/qanda'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">keyboard_backspace</span></a>
      </div>
    </div>
  </div> 

  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          <h4 class="weight-400 mt-2 mb-3"><?php echo $result->question; ?></h4>
          <?php echo $result->answer; ?>

          <div class="clearfix"></div>
          <hr class="my-4 dashed clearfix">
            <dl class="col-md-2 float-left">
                <dt>Status</dt>
                <dd><?php if($result->status == 1) { ?>
                        <span class="badge badge-success text-white">Public</span>
	                <?php } else { ?>
                        <span class="badge badge-secondary text-white">Privated</span>
	                <?php } ?>
                </dd>
            </dl>
            <dl class="col-md-2 float-left">
                <dt>Created Date</dt>
                <dd><?php echo $result->created_at; ?></dd>
            </dl>
            <dl class="col-md-2 float-left">
                <dt>Updated Date</dt>
                <dd><?php echo $result->updated_at; ?></dd>
            </dl>
          <a href="<?php echo base_url('adm/portal/qanda/edit/'.$result->id); ?>" class="btn btn-danger py-1 px-2 float-right ml-2" ><span class="material-icons align-text-bottom">edit</span></a>

          <a href="<?php echo base_url('adm/portal/qanda'); ?>" class="btn btn-secondary py-1 px-2 float-right" ><span class="material-icons align-text-bottom">keyboard_backspace</span></a>

        </div>
      </div>
    </div>
  </div>
  <?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>