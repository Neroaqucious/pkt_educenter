<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
	<div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title">Edit Payment</h1>
    </div>

      <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
        <div class="controls d-flex justify-content-center justify-content-md-end float-right">
        <a href="<?php echo base_url('adm/portal/payment'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>
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
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-body">
          <?php
            $attributes = array('class' => 'form-horizontal form-label-left');
            echo form_open('adm/portal/payment/edit/'.$result->id, $attributes);
          ?>

          <div class="col-lg-12 col-md-12 float-left">
            <div class="form-group">
              <?php echo form_label('Payment Name', 'pay_name', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
                echo form_input(array(
                'name' => 'pay_name',
                'type' => 'text',
                'value' => html_escape(set_value('pay_name',isset($result)?$result->pay_name:''), ENT_QUOTES),
                'placeholder' => 'Enter payment name!',
                'class' => 'form-control',
                'id' => ''));
              ?>
              <span class="text-danger"><?php echo form_error('pay_name'); ?></span>
            </div>

            <div class="form-group">
              <?php echo form_label('User Name', 'user_name', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
                echo form_input(array(
                'name' => 'user_name',
                'type' => 'text',
                'value' => html_escape(set_value('user_name',isset($result)?$result->usr_name:''), ENT_QUOTES),
                'placeholder' => 'Enter user name!',
                'class' => 'form-control',
                'id' => ''));
              ?>
              <span class="text-danger"><?php echo form_error('user_name'); ?></span>
            </div>

            <div class="form-group">
            <?php echo form_label('Pay Type', 'pay_type', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
              $type = array(
                "" => "Select payment type",
                "bank transfer" => "Bank transfer",
                "mobile transfer" => "Mobile transfer",
                "online transfer" => "Online transfer",
                "direct pay" => "Direct pay",
              );
              $setarray = array( 'class' => 'form-control', 'style' => '');
              echo form_dropdown(
                'pay_type',  //dropdown name
                $type,
                set_value('pay_type',isset($result)?$result->pay_type:''),
                $setarray
              );
              ?>
              <span class="text-danger"><?php echo form_error('pay_type'); ?></span>
            </div>

            <div class="form-group">
              <?php echo form_label('Reference', 'reference', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
                echo form_input(array(
                'name' => 'reference',
                'type' => 'text',
                'value' => html_escape(set_value('reference',isset($result)?$result->reference:''), ENT_QUOTES),
                'placeholder' => 'Enter reference!',
                'class' => 'form-control',
                'id' => ''));
              ?>
              <span class="text-danger"><?php echo form_error('reference'); ?></span>
            </div>
            
            <div class="form-group">
              <?php echo form_label('Slug Name', 'slug', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
                echo form_input(array(
                'name' => 'slug',
                'type' => 'text',
                'value' => html_escape(set_value('slug',isset($result)?$result->slug:''), ENT_QUOTES),
                'placeholder' => 'Enter slug name!',
                'class' => 'form-control',
                'id' => ''));
              ?>
              <span class="text-danger"><?php echo form_error('slug'); ?></span>
            </div>

            <div class="form-group">
              <?php echo form_label('Fees', 'fees', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
                echo form_input(array(
                'name' => 'fees',
                'type' => 'text',
                'value' => html_escape(set_value('fees',isset($result)?$result->fees:''), ENT_QUOTES),
                'placeholder' => 'Enter fees!',
                'class' => 'form-control',
                'id' => ''));
              ?>
              <span class="text-danger"><?php echo form_error('fees'); ?></span>
            </div>

            <div class="form-group">
              <?php echo form_label('Permission', 'status', array( 'class' => 'form-control-label', 'id'=> '')); ?>

              <div class="radio">
                <label class="col-md-2">
                  <input type="radio" name="status" value="1" > Public
                </label>
                <label class="col-md-2">
                  <input type="radio" name="status" value="0" checked="checked"> Privated
                </label>
              </div>
            </div>
					</div>          

        	<div class="clearfix"></div>
            <hr class="my-4 dashed clearfix">
            <button type="submit" class="btn btn-primary btn-sm float-right"><span class="material-icons align-middle">update</span> Update</button>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>