<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title><?php echo $title; ?> - P.K.T Education Center</title>
	
	<!-- Base CSS -->
	<link rel="stylesheet" href="<?php echo base_url('asset/admin/css/basestyle/style.css'); ?>">
	<!-- Fontawesome Icons -->
	<link href="<?php echo base_url('asset/admin/css/fontawesome/fontawesome-all.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('asset/admin/css/pages/login.css'); ?>" rel="stylesheet">
	<style>
      h3.head{
          text-align: center;
          margin-bottom: 30px;
      }
      .form-custom {
          display: block;
          width: 100%;
          padding: 0.375rem 0.75rem;
          font-size: 0.9375rem;
          line-height: 1.5;
          color: #495057;
          background-color: #fff;
          background-clip: padding-box;
          border: 1px solid #ccc;
          border-radius: 2px;
      }
	</style>
	
</head>
<body>
<section class="wrapper">
	<div class="container">
		<div class="form mr-auto ml-auto mt-4">
			<h3 class="head">Welcome to Online Management System</h3>
			<div class="card mb-4">
				<div class="card-header">Confirm Site Configuration</div>
				<div class="card-body">
					<dl class="row">
						<dt class="col-md-3 ml-4">Favicon</dt>
						<dd class="col-sm-8"><img src="<?php echo base_url('upload/'.$this->session->__rootuser_primary_data['cos_image']); ?>" width="30" class="img-thumbnail img-fluid rounded-bottom"></dd>
                        <hr class="my-4 dashed">
						<dt class="col-md-3 ml-4">User Name</dt>
						<dd class="col-sm-8 text-primary weight-400"><?php echo $this->session->__rootuser_primary_data['username']; ?></dd>
                        <hr class="my-4 dashed">
						<dt class="col-md-3 ml-4">Password</dt>
						<dd class="col-sm-8 text-primary weight-400"> *********** </dd>
                        <hr class="my-4 dashed">
						<dt class="col-md-3 ml-4">Full Name</dt>
						<dd class="col-sm-8"><?php echo $this->session->__rootuser_primary_data['name']; ?></dd>
                        <hr class="my-4 dashed">
						<dt class="col-md-3 ml-4">Email</dt>
						<dd class="col-sm-8"><?php echo $this->session->__rootuser_primary_data['email']; ?></dd>
                        <hr class="my-4 dashed">
						<dt class="col-md-3 ml-4">Address</dt>
						<dd class="col-sm-8"><?php echo $this->session->__rootuser_primary_data['address']; ?></dd>
                        <hr class="my-4 dashed">
						<dt class="col-md-3 ml-4">Social Media</dt>
						<dd class="col-sm-8">
                          <?php if(!empty($this->session->__rootuser_primary_data['facebook'])) {
	                          echo $this->session->__rootuser_primary_data['facebook'].", ";
                          } ?>
                          <?php if(!empty($this->session->__rootuser_primary_data['twitter'])) {
                            echo $this->session->__rootuser_primary_data['twitter'].", ";
                          } ?>
                          <?php if(!empty($this->session->__rootuser_primary_data['instagram'])) {
                          echo $this->session->__rootuser_primary_data['instagram'].", ";
                          } ?></dd>
                        <hr class="my-4 dashed">
						<dt class="col-md-3 ml-4">Site Name</dt>
						<dd class="col-sm-8"><?php echo $this->session->__rootuser_primary_data['site_name']; ?></dd>
                        <hr class="my-4 dashed">
						<dt class="col-md-3 ml-4">Meta tag</dt>
						<dd class="col-sm-8"><?php echo $this->session->__rootuser_primary_data['meta_tag']; ?></dd>
                        <hr class="my-4 dashed">
						<dt class="col-md-3 ml-4">Date Format</dt>
						<dd class="col-sm-8">
                          <?php
                          if($this->session->__rootuser_primary_data['date_format'] == "Y-m-d H:i:s") {
                              echo "1990-01-01 12:00:00";
                          } elseif($this->session->__rootuser_primary_data['date_format'] == "Y/m/d H:i:s") {
                              echo "1990/01/01 12:00:00";
                          } elseif($this->session->__rootuser_primary_data['date_format'] == "H:i:s Y-m-d") {
                              echo "12:00:00 1990-01-01";
                          } elseif($this->session->__rootuser_primary_data['date_format'] == "H:i:s Y/m/d") {
                              echo "12:00:00 1990/01/01";
                          } elseif($this->session->__rootuser_primary_data['date_format'] == "d-m-Y H:i:s") {
                              echo "01-01-1990 12:00:00";
                          } elseif($this->session->__rootuser_primary_data['date_format'] == "d/m/Y H:i:s") {
                              echo "01/01/1990 12:00:00";
                          } elseif($this->session->__rootuser_primary_data['date_format'] == "d-M-Y H:i:s A") {
                              echo "01-May-1990 12:00:00 AM";
                          }?></dd>
                        <hr class="my-4 dashed">
						<dt class="col-md-3 ml-4">Phone Format</dt>
						<dd class="col-sm-8">
                          <?php
                          if($this->session->__rootuser_primary_data['phone_format'] == "334") {
                              echo "090-000-0001";
                          } elseif($this->session->__rootuser_primary_data['phone_format'] == "433") {
                              echo "0900-000-001";
                          } elseif($this->session->__rootuser_primary_data['phone_format'] == "244") {
                              echo "09-0000-0001";
                          }
                          ?></dd>
                        <hr class="my-4 dashed">
						<dt class="col-md-3 ml-4">Decimal Point</dt>
						<dd class="col-sm-8"><?php echo $this->session->__rootuser_primary_data['decimal_point']; ?></dd>
                        <hr class="my-4 dashed">
						<dt class="col-md-3 ml-4">User session</dt>
						<dd class="col-sm-8"><?php echo $this->session->__rootuser_primary_data['user_session']; ?> minutes</dd>
                        <hr class="my-4 dashed">
						<dt class="col-md-3 ml-4">Timezone</dt>
						<dd class="col-sm-8">
                          <?php
                          if($this->session->__rootuser_primary_data['timezone'] == "Asia/Rangoon") {
                            echo "UTC +6:30 Rangoon";
                          } elseif($this->session->__rootuser_primary_data['timezone'] == "Asia/Singapore") {
                            echo "UTC +6:00 Singapore";
                          } elseif($this->session->__rootuser_primary_data['timezone'] == "Asia/Japan") {
                            echo "UTC +9:00 Japan";
                          }
                          ?></dd>
					</dl>
				<hr class="my-2 dashed">
				<?php echo form_open("initial/confirm") ?>
                <?php
                $data = array(
                    'name'  => 'confirm',
                    'type' => 'hidden',
                    'class' => 'form-custom',
                    'value' => true,
                );
                echo form_input($data);
                ?>
				<button type="submit" class="col-1 btn mt-4 btn-block float-right" style="color: #fff;background-color:#4B89FC;border-color: #4B89FC;">Submit</button>
					<a href="<?php echo base_url('initial'); ?>" class="col-1 btn mt-4 mr-1 btn-block float-right btn-warning text-dark">Back</a>
				<?php echo form_close(); ?>
				</div>
			</div>
		
		</div>
	</div>
</section>
<div class="loading"><div class="spinner"><div class="spinner__rect spinner__rect--1"></div> <div class="spinner__rect spinner__rect--2"></div> <div class="spinner__rect spinner__rect--3"></div> <div class="spinner__rect spinner__rect--4"></div> <div class="spinner__rect spinner__rect--5"></div></div></div>
</body>
</html>


