<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<?php 
  $sub_purchase = $invoice->total_price;
  foreach($payment as $row ) { 
    $sub_purchase = $sub_purchase - $row->total_cash;
  }
?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
        <h1 class="weight-300 h3 title">Invoice Detail</h1>
    </div> 
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <?php if($sub_purchase <= 0) { ?>
        <?php if($result->status == 1) { ?>
          <a class="btn btn-dark py-1 px-2 text-light" onclick="return confirm('All student data has been added. Are you want to deactive this enroll course?');" href="<?php echo base_url('adm/portal/student/course/deactive/'.$result->id); ?>"><span class="material-icons align-text-bottom">remove_circle_outline</span></a>
        <?php } else { ?>
          <a class="btn btn-success py-1 px-2 text-light" onclick="return confirm('Are you want to active this enroll course?');" href="<?php echo base_url('adm/portal/student/course/active/'.$result->id); ?>"><span class="material-icons align-text-bottom">done</span></a>
        <?php } ?>
      <?php } else { ?>
        <button class="btn btn-success py-1 px-2 text-light" data-toggle="modal" data-target="#addNoteModal"><span class="material-icons align-text-bottom">monetization_on</span></button>
      <?php } ?>
        <a class="btn btn-secondary py-1 px-2" href="<?php echo base_url('adm/portal/student/view/'.$invoice->id); ?>"><span class="material-icons align-text-bottom">reorder</span></a>
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
    <div class="card mb-4">
      <div class="card-body">
        <div class="col-md-12">
          <div class="row">
            <div class="col">
            <h5 class="weight-400">User Information</h5>
              <p class="text-muted m-0"> <span class="material-icons align-text-bottom" style="font-size: 18px;">account_circle</span>&nbsp;&nbsp;&nbsp;<?php echo $invoice->name; ?> (<?php echo $invoice->user_id; ?>)</p>
              <p class="text-muted m-0"> <span class="material-icons align-text-bottom" style="font-size: 18px;">local_phone</span>&nbsp;&nbsp;&nbsp;<?php echo $invoice->phone; ?></p>
              <p class="text-muted m-0"> <span class="material-icons align-text-bottom" style="font-size: 18px;">email</span>&nbsp;&nbsp;&nbsp;<?php echo $invoice->email; ?></p>
            </div>
            <div class="col text-right">
              <h5 class="weight-400">Invice Number</h5>
              <p class="text-muted m-0"> <?php echo $invoice->invoice_number; ?></p>
              <p class="text-muted m-0"> <?php echo $invoice->pay_type; ?></p>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table my-5">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Course Name (Level)</th>
                  <th class="text-center">Batch ID</th>
                  <th class="text-center">Class</th>
                  <th class="text-center">Fees</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center">01</td>
                  <td class="text-center"><?php echo $result->cos_title; ?> ( <?php echo $result->level; ?> )</td>
                  <td class="text-center"><?php echo $result->batch_id; ?></td>
                  <td class="text-center"><?php echo ucfirst($result->ref_key); ?> Class</td>
                  <td class="text-right px-4"><?php echo number_format($invoice->sub_price); ?> MMK</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="col-md-12">
            <div class="float-right mt-5 d-inline-block text-right">
              <h6 class="weight-400 my-1 col-md-12"><span class="text-muted col-md-3">Tax :</span> <?php echo number_format($invoice->txt); ?> MMK</h6>
              <h6 class="weight-400 my-1 col-md-12"><span class="text-muted col-md-3">Charge :</span> <?php echo number_format($invoice->charge); ?> MMK</h6>
              <h6 class="weight-400 my-1 col-md-12"><span class="text-muted col-md-3">Discount :</span>- <?php echo number_format($invoice->discount); ?> MMK</h6>
            </div>
            <div class="clearfix my-1"></div>
            <hr class="my-3">
              <h6 class="weight-400 m-0 col-md-12 text-right"><span class="text-muted col-md-3">Grand Total :</span> <?php echo number_format($invoice->total_price); ?> MMK</h6>
            <hr class="my-3">
              <div class="col">
                <h5 class="weight-400">Customer Purchase</h5>
              </div>
            <?php foreach($payment as $row ) { ?>
              <h6 class="weight-400 m-0 col-md-12 text-right"><span class="text-muted col-md-3"><?php echo date('D, d F Y', strtotime($row->created_at)); ?> :</span>- <?php echo number_format($row->total_cash); ?> MMK</h6>
            <?php } ?>
            <hr class="my-3">
              <h6 class="weight-400 m-0 col-md-12 text-right text-danger"><span class="text-muted col-md-3">Due Amount :</span> <?php echo number_format($sub_purchase); ?> MMK</h6>
          </div> 
        </div>            
        <div class="clearfix my-4"></div>                
      </div>
    </div>


  <div class="card-header bg-dark text-light">Student Purchase <span class="text-success">List</span></div>
    <table class="table">
      <thead>
        <tr class="text-center">
          <th scope="col" class="border-top-0" width="1">No</th>
          <th scope="col" class="border-top-0">Payment ID</th>
          <th scope="col" class="border-top-0">Reference ID</th>
          <th scope="col" class="border-top-0">Cash</th>
          <th scope="col" class="border-top-0">Receive</th>
          <th scope="col" class="border-top-0">Description</th>
          <th scope="col" class="border-top-0">Created Date</th>
          <th scope="col" class="border-top-0" width="1">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php $x=1; foreach($payment as $row ) { ?>
        <tr class="text-center">
          <td width="1" class="text-right"><?php echo $x; ?></td>
          <td><?php echo $row->payment_id; ?></td>
          <td><?php echo $row->ref_number; ?></td>
          <td class="text-right"><?php echo number_format($row->total_cash); ?> MMK</td>
          <td>#<?php echo $row->cash_type; ?></td>
          <td><?php echo $row->description; ?></td>
          <td><?php echo $row->created_at; ?></td>
          <td width="1"><a onclick="return confirm('Are you want to cancel this purchase data?');"  class="text-secondary" href="<?php echo base_url('adm/portal/student/purchase/delete/'.$row->id.'/'.$result->id); ?>"><span class="material-icons align-middle md-20">delete</span></a></td>
        </tr>
        <?php $x++; } ?>
      </tbody>
    </table>
  </div>

<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>

<!-- Modal -->
    <div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog col-11 p-0" role="document">
        <div class="modal-content">
          <?php
            $attributes = array('class' => '');
            echo form_open('adm/portal/student/purchase/add/'.$result->id, $attributes);
            echo form_input(array(
              'name' => 'id',
              'type' => 'hidden',
              'value' => $result->id,
            ));
          ?>

          <div class="modal-header px-4">
            <h5 class="modal-title" id="exampleModalLabel">Purchase Process</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="material-icons ">close</span>
            </button>
          </div>

          <div class="modal-body p-4">
            <div class="form-group">
              <?php
                echo form_label('Purchase With','pay_from', array('class' => '')); 
                echo ' <span class="badge badge-danger">Required</span>';  
              ?>

              <?php
                $setarray = array( 'class' => 'form-control', 'style' => '');
                echo form_dropdown(
                  'pay_from',  //dropdown name
                  $type,
                  set_value('pay_from',$invoice->pay_type),
                  $setarray
                );
              ?>
            </div>
            
            <div class="form-group">
              <?php
                echo form_label('Reference Number','ref_number', array('class' => ''));
                echo ' <span class="badge badge-danger">Required</span>';
                echo form_input(array(
                  'name' => 'ref_number',
                  'type' => 'text',
                  'value' => '',
                  'placeholder' => 'Enter reference number',
                  'class' => 'form-control'
                ));
              ?>
            </div>

            <div class="form-group">
              <?php
                echo form_label('Purchase Amount','cash', array('class' => ''));
                echo ' <span class="badge badge-danger">Required</span>';
                echo form_input(array(
                  'name' => 'cash',
                  'type' => 'text',
                  'value' => html_escape(set_value('std_name',isset($sub_purchase)?$sub_purchase:''), ENT_QUOTES),
                  'placeholder' => 'Enter purchase',
                  'class' => 'form-control'
                ));
              ?>
            </div>

            <div class="form-group">
              <?php
                echo form_label('Description','desc', array('class' => ''));
                echo ' <span class="badge badge-danger">Required</span>';
                echo form_input(array(
                  'name' => 'desc',
                  'type' => 'text',
                  'value' => '',
                  'placeholder' => 'Enter description',
                  'class' => 'form-control'
                ));
              ?>
            </div>

            <div class="modal-footer px-4">
              <button type="button" class="btn btn-sm btn-secondary text-white" data-dismiss="modal"><span class="material-icons align-top md-18 mr-1">close</span> Close</button>
              <button type="submit" class="btn btn-sm btn-primary text-white"><span class="material-icons align-top md-18 mr-1">add_circle</span> Add New</button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
<!-- Modal -->