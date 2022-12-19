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
						<dt class="col-sm-3">User Name</dt>
						<dd class="col-sm-9">nero</dd>
						<hr class="my-4 dashed">
						
						<dt class="col-sm-3">Password</dt>
						<dd class="col-sm-9"> ******** </dd>
						<hr class="my-4 dashed">
						
						<dt class="col-sm-3"></dt>
						<dd class="col-sm-9"><p>Your site configuration setting is complete!<br> Please login admin protal.</p>
							<p class="text-warning">If something is missing on the filling form, You can reassign later!</p>
						</dd>
						<hr class="my-4 dashed">
					</dl>
					
					<a href="<?php echo base_url('adm/portal/auth/login'); ?>" class="col-1 btn mt-4 mr-1 btn-block float-right btn-primary text-white">Login</a>
				</div>
			</div>
		
		</div>
	</div>
</section>
<div class="loading"><div class="spinner"><div class="spinner__rect spinner__rect--1"></div> <div class="spinner__rect spinner__rect--2"></div> <div class="spinner__rect spinner__rect--3"></div> <div class="spinner__rect spinner__rect--4"></div> <div class="spinner__rect spinner__rect--5"></div></div></div>
</body>
</html>


