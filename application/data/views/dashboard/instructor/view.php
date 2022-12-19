<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <h1 class="weight-300 h3 title">Instructor Detail</h1>
    </div> 

    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
        <a class="btn btn-secondary py-1 px-2" href="<?php echo base_url('adm/portal/instructor'); ?>"><span class="material-icons align-text-bottom">reorder</span></a>
      </div>
    </div>
  </div>  

  <?php if(!empty($_SESSION['msg_success'])){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong>  <?php echo $_SESSION['msg_success']; ?> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" class="material-icons md-18">clear</span>
      </button>
    </div>
  <?php } ?>    

  <?php if(!empty($_SESSION['msg_error'])){ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Warning!</strong>  <?php echo $_SESSION['msg_error']; ?> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" class="material-icons md-18">clear</span>
      </button>
    </div>
  <?php } ?>
  
  <div class="content">  
    <div class="row">
      <div class="col-lg-12 col-md-12 mb-4 mb-lg-0">
        <div class="card">
          <div class="card-body">
            <div class="col-md-4 float-left">
              <div style="text-align:center">
                  <img src="<?php echo base_url('upload/assets/adm/inst/'.$result->images); ?>" class="img-thumbnail img-fluid rounded-circle" width="200">
                  <h5 class="weight-400 mt-3"><?php echo strtoupper($result->name); ?></h5>
              </div>
            </div>

            <div class="col-md-7 float-left">
              <dl class="row">
                <dt class="col-sm-4 py-2">Full Name</dt>
                <dd class="col-sm-8 bg-light py-2">: <?php echo $result->name; ?></dd>
                <dt class="col-sm-4 py-2">Email </dt>
                <dd class="col-sm-8 bg-light py-2">: <?php if(!empty($result->email)) { echo $result->email; } else { echo "Not set"; } ?>
                </dd>
                <dt class="col-sm-4 py-2">Phone </dt>
                <dd class="col-sm-8 bg-light py-2">: <?php echo $result->phone; ?>
                </dd>
                <dt class="col-sm-4 py-2">Leature </dt>
                <dd class="col-sm-8 bg-light py-2">: <?php echo $result->course; ?>
                </dd>
                <dt class="col-sm-4 py-2">Created Date </dt>
                <dd class="col-sm-8 bg-light py-2">: <?php echo $result->created_at; ?>
                </dd>
                  <dt class="col-sm-4 py-2">Updated Date </dt>
                  <dd class="col-sm-8 bg-light py-2">: <?php echo $result->updated_at; ?>
                  </dd>
                <dt class="col-sm-4 py-2">Notes </dt>
                <dd class="col-sm-8 bg-light py-2">: <?php echo $result->description; ?>
                </dd>
                <dt class="col-sm-4 py-2">Status </dt>
                <dd class="col-sm-8 bg-light py-2">
                  <?php if($result->status == 1) { ?>       
                    <span class="badge badge-success text-white">Public</span>
                  <?php } else { ?>
                    <span class="badge badge-dark text-white">Privated</span>
                  <?php } ?>
                </dd>
              </dl>
            </div>

          <div class="clearfix"></div>  
          <hr class="my-4 dashed clearfix">
            <div class="text-right">
              <a href="<?php echo base_url('adm/portal/instructor/edit/'.$result->id); ?>" class="btn btn-sm btn-warning text-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Information"><span class="material-icons align-middle">edit</span></a>
              <a onclick="return confirm('Are you want to delete this data?');"  href="<?php echo base_url('adm/portal/instructor/delete/'.$result->id); ?>" class="btn btn-sm btn-danger text-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete User"><span class="material-icons align-middle">delete</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- /page content -->

<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>

