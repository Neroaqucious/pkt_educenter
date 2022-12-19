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
	<title><?php echo $title; ?></title>
	<!-- Base CSS -->
	<link rel="stylesheet" href="<?php echo base_url('asset/admin/css/basestyle/style.css'); ?>">
	<!-- Fontawesome Icons -->
	<link href="<?php echo base_url('asset/admin/css/fontawesome/fontawesome-all.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('asset/admin/css/pages/login.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/admin/css/icon.css'); ?>" rel="stylesheet" type="text/css" >
    
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
			
			<div class="card mb-4">
				<div class="card-header">Site Configuration</div>
				<div class="card-body">
                  <p class="text-danger text-center"><span class="material-icons align-text-bottom text-danger">report</span> Please enter the requied field!</p>
                <?php echo form_open_multipart('initial'); ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-6 col-sm-12 float-left">

                            <div class="form-group">
	                        <?php
		                        echo form_label('Full Name <span class="material-icons align-text-bottom text-danger">report</span>', 'userFullName', array('class' => 'col-form-label', 'id' => 'userFullName', 'style' => ''));
	                        ?>
                                <?php
                                    $data = array(
                                        'name'  => 'full_name',
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'id' => 'userFullName',
                                        'autocomplete' => "new-full_name",
                                        'value' => isset($this->session->__rootuser_primary_data['name'])?$this->session->__rootuser_primary_data['name']:"",
                                    );
                                    echo form_input($data);
                                ?>
                                <span class="text-danger"><?php echo form_error('full_name'); ?></span>
                            </div>
                            <hr class="my-4 dashed">
                            
                            <div class="form-group">
                                <?php
                                echo form_label('Email <span class="material-icons align-text-bottom text-danger">report</span>', 'userEmail', array('class' => 'col-form-label', 'id' => 'userEmail', 'style' => ''));
                                ?>
                                <?php
                                $data = array(
                                    'name'  => 'email',
                                    'type' => 'email',
                                    'class' => 'form-custom',
                                    'id' => 'userEmail',
                                    'autocomplete' => "new-email",
	                                'value' => isset($this->session->__rootuser_primary_data['email'])?$this->session->__rootuser_primary_data['email']:"",
                                );
                                echo form_input($data);
                                ?>
                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                            </div>
                            <hr class="my-4 dashed">

                            <div class="form-group">
                                <?php
                                echo form_label('User Name <span class="material-icons align-text-bottom text-danger">report</span>', 'userName', array('class' => 'col-form-label', 'id' => 'userName', 'style' => ''));
                                ?>
                                <?php
                                $data = array(
                                    'name'  => 'user_name',
                                    'type' => 'text',
                                    'class' => 'form-custom',
                                    'id' => 'userName',
                                    'autocomplete' => "new-user_name",
	                                'value' => isset($this->session->__rootuser_primary_data['username'])?$this->session->__rootuser_primary_data['username']:"",
                                );
                                echo form_input($data);
                                ?>
                                <span class="text-danger"><?php echo form_error('user_name'); ?></span>
                            </div>
                            <hr class="my-4 dashed">

                            <div class="form-group">
                                <?php
                                echo form_label('Password <span class="material-icons align-text-bottom text-danger">report</span>', 'inputPassword', array('class' => 'col-form-label', 'id' => 'inputPassword', 'style' => ''));
                                ?>
                                <div class="col-md-12">
                                    <div class="col-md-12 float-left mb-2">
                                        <?php
                                        $data = array(
                                            'name'  => 'user_password',
                                            'type' => 'password',
                                            'placeholder' => 'password',
                                            'class' => 'form-custom',
                                            'id' => 'inputPassword',
                                            'autocomplete' => "new-user_password",
                                        );
                                        echo form_input($data);
                                        ?>
                                    <span class="text-danger"><?php echo form_error('user_password'); ?></span>
                                    </div>

                                    <div class="col-md-12 float-left">
                                        <?php
                                        $data = array(
                                            'name'  => 'conf_password',
                                            'type' => 'password',
                                            'placeholder' => 'confirm password',
                                            'class' => 'form-custom',
                                            'id' => 'inputPassword2',
                                            'autocomplete' => "new-conf_password",
                                        );
                                        echo form_input($data);
                                        ?>
                                    <span class="text-danger"><?php echo form_error('conf_password'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr class="my-4 dashed clearfix">
                            
                            <div class="form-group">
                                <?php
                                echo form_label('Phone Number <span class="material-icons align-text-bottom text-danger">report</span>', 'userPhone', array('class' => 'col-form-label', 'id' => 'userPhone', 'style' => ''));
                                ?>
                                <?php
                                $data = array(
                                    'name'  => 'phone',
                                    'type' => 'text',
                                    'class' => 'form-custom',
                                    'id' => 'userPhone',
                                    'autocomplete' => "new-phone",
	                                'value' => isset($this->session->__rootuser_primary_data['phone'])?$this->session->__rootuser_primary_data['phone']:"",
                                );
                                echo form_input($data);
                                ?>
                                <span class="text-danger"><?php echo form_error('phone'); ?></span>
                            </div>
                            <hr class="my-4 dashed">

                            <div class="form-group">
                                <label for="inputSocial" class="col-form-label">Social Media</label>
                                <div class="col-sm-12 mb-2">
                                    <?php
                                    $data = array(
                                        'name'  => 'user_facebook',
                                        'type' => 'text',
                                        'placeholder' => 'facebook',
                                        'class' => 'form-custom',
                                        'id' => 'inputSocial',
                                        'autocomplete' => "new-user_facebook",
	                                    'value' => isset($this->session->__rootuser_primary_data['facebook'])?$this->session->__rootuser_primary_data['facebook']:"",
                                    );
                                    echo form_input($data);
                                    ?>
                                    <span class="text-danger"><?php echo form_error('user_facebook'); ?></span>
                                </div>

                                <div class="col-sm-12 mb-2">
                                    <?php
                                    $data = array(
                                        'name'  => 'user_instagram',
                                        'type' => 'text',
                                        'placeholder' => 'instagram',
                                        'class' => 'form-custom',
                                        'id' => 'inputSocial2',
                                        'autocomplete' => "new-user_instagram",
	                                    'value' => isset($this->session->__rootuser_primary_data['instagram'])?$this->session->__rootuser_primary_data['instagram']:"",
                                    );
                                    echo form_input($data);
                                    ?>
                                    <span class="text-danger"><?php echo form_error('user_instagram'); ?></span>
                                </div>

                                <div class="col-sm-12 mb-2">
                                    <?php
                                    $data = array(
                                        'name'  => 'user_twitter',
                                        'type' => 'text',
                                        'placeholder' => 'twitter',
                                        'class' => 'form-custom',
                                        'id' => 'inputSocial3',
                                        'autocomplete' => "new-user_twitter",
	                                    'value' => isset($this->session->__rootuser_primary_data['twitter'])?$this->session->__rootuser_primary_data['twitter']:"",
                                    );
                                    echo form_input($data);
                                    ?>
                                    <span class="text-danger"><?php echo form_error('user_twitter'); ?></span>
                                </div>
                            </div>
                            <hr class="my-4 dashed">

                            <div class="form-group">
                                <label for="userAddress" class="col-form-label">Address</label>
                                <div class="col-sm-12">
	                                <?php
		                                $data = array(
			                                'name'  => 'address',
			                                'class' => 'form-custom',
			                                'id' => 'userAddress',
			                                'autocomplete' => "new-address",
			                                'rows' => 3,
			                                'value' => isset($this->session->__rootuser_primary_data['meta_tag'])?$this->session->__rootuser_primary_data['meta_tag']:"",
		                                );
		                                echo form_textarea($data);
	                                ?>
                                </div>
                            </div>
                            <hr class="my-4 dashed">
                            
                        </div>
                        <div class="col-md-6 col-sm-12 float-left">
                            <div class="form-group">
                                <?php
                                echo form_label('Site Name <span class="material-icons align-text-bottom text-danger">report</span>', 'siteName', array('class' => 'col-form-label', 'id' => 'siteName', 'style' => ''));
                                ?>
                  
                                <?php
                                $data = array(
                                    'name'  => 'site_name',
                                    'type' => 'text',
                                    'class' => 'form-custom',
                                    'id' => 'siteName',
                                    'autocomplete' => "new-site_name",
	                                'value' => isset($this->session->__rootuser_primary_data['site_name'])?$this->session->__rootuser_primary_data['site_name']:"",
                                );
                                echo form_input($data);
                                ?>
                                <span class="text-danger"><?php echo form_error('site_name'); ?></span>
                            </div>
                            <hr class="my-4 dashed">

                            <div class="form-group">
                                <?php echo form_label( 'Date Format <span class="material-icons align-text-bottom text-danger">report</span>' ,'date_format', array( 'class' => 'col-form-label', 'id' => 'date_format', 'style' => ''));?>
                                <?php
                                $dateformat = array(
                                    "" => "Please select",
                                    "Y-m-d H:i:s" => "1990-01-01 12:00:00",
                                    "Y/m/d H:i:s" => "1990/01/01 12:00:00",
                                    "H:i:s Y-m-d" => "12:00:00 1990-01-01",
                                    "H:i:s Y/m/d" => "12:00:00 1990/01/01",
                                    "d-m-Y H:i:s" => "01-01-1990 12:00:00",
                                    "d/m/Y H:i:s" => "01/01/1990 12:00:00",
                                    "d-M-Y H:i:s A" => "01-May-1990 12:00:00 AM",
                                );
        
                                $setarray = array( 'class' => 'form-control', 'style' => '');
                                echo form_dropdown(
                                    'date_format',  //dropdown name
                                    $dateformat,
                                    set_value('date_format',isset($this->session->__rootuser_primary_data['date_format'])?$this->session->__rootuser_primary_data['date_format']:""),
                                    $setarray
                                );
                                ?>
                                <span class="text-danger"><?php echo form_error('date_format'); ?></span>
                            </div>
                            <hr class="my-4 dashed">

                            <div class="form-group">
                                <?php echo form_label( 'Phone Format <span class="material-icons align-text-bottom text-danger">report</span>' ,'mobile', array( 'class' => 'col-form-label', 'id' => 'mobile', 'style' => ''));?>
                                <?php
                                $mobile = array(
                                    "" => "Please select",
                                    "334" => "090-000-0001",
                                    "433" => "0900-000-001",
                                    "244" => "09-0000-0001",
                                );
        
                                $setarray = array( 'class' => 'form-control', 'style' => '');
                                echo form_dropdown(
                                    'mobile',  //dropdown name
                                    $mobile,
                                    set_value('mobile',isset($this->session->__rootuser_primary_data['phone_format'])?$this->session->__rootuser_primary_data['phone_format']:""),
                                    $setarray
                                );
                                ?>
                                <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                            </div>
                            <hr class="my-4 dashed">
                            
                            <div class="form-group">
                                <?php
                                echo form_label('Decimal Point <span class="material-icons align-text-bottom text-danger">report</span>', 'decimalPoint', array('class' => 'col-form-label', 'id' => 'userSession', 'style' => ''));
                                ?>
                                <div class="input-group">
                                <?php
                                $data = array(
                                    'name'  => 'decimal_point',
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'id' => 'decimalPoint',
	                                'aria-label' => "decimalPoint",
	                                'aria-describedby' => "basic-addon2",
                                    'autocomplete' => "new-decimal_point",
	                                'value' => isset($this->session->__rootuser_primary_data['decimal_point'])?$this->session->__rootuser_primary_data['decimal_point']:"",
                                );
                                echo form_input($data);
                                ?>
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-0" id="basic-addon2"><span class="material-icons align-text-bottom text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Only allow numeric">help_outline</span></span>
                                </div>
                            </div>
                                <span class="text-danger"><?php echo form_error('decimal_point'); ?></span>
                            </div>
                            <hr class="my-4 dashed">

                            <div class="form-group">
                                <?php
                                echo form_label('User Session <span class="material-icons align-text-bottom text-danger">report</span>', 'userSession', array('class' => 'col-form-label', 'id' => 'userSession', 'style' => ''));
                                ?>
                                <div class="input-group">
                                <?php
                                $data = array(
                                    'name'  => 'user_session',
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'id' => 'userSession',
	                                'aria-label' => "userSession",
	                                'aria-describedby' => "basic-addon3",
                                    'autocomplete' => "new-user_session",
	                                'value' => isset($this->session->__rootuser_primary_data['user_session'])?$this->session->__rootuser_primary_data['user_session']:"",
                                );
                                echo form_input($data);
                                ?>
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-0" id="basic-addon3"><span class="text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Only allow numeric">min</span></span>
                                </div>
                            </div>
                                <span class="text-danger"><?php echo form_error('user_session'); ?></span>
                            </div>
                            <hr class="my-4 dashed">

                            <div class="form-group">
                                <?php
                                echo form_label('Timezone <span class="material-icons align-text-bottom text-danger">report</span>', 'dateTimezone', array('class' => 'col-form-label', 'id' => 'userSession', 'style' => ''));
                                ?>
	
	                            <?php
	                            $timezone = array(
		                            "" => "Please select",
		                            "Asia/Rangoon" => "UTC +6:30 Rangoon",
                                    "Asia/Singapore" => "UTC +6:00 Singapore",
                                    "Asia/Japan" => "UTC +9:00 Japan",
	                            );
	
	                            $setarray = array( 'class' => 'form-control', 'style' => '');
	                            echo form_dropdown(
		                            'timezone',  //dropdown name
		                            $timezone,
		                            set_value('timezone',isset($this->session->__rootuser_primary_data['timezone'])?$this->session->__rootuser_primary_data['timezone']:""),
		                            $setarray
	                            );
	                            ?>
                                <span class="text-danger"><?php echo form_error('timezone'); ?></span>
                            </div>
                            <hr class="my-4 dashed">
                            
                            <div class="form-group">
			                        <?php echo form_label( 'Meta tag' ,'metaTags', array( 'class' => 'col-form-label', 'id' => '', 'style' => ''));?>
                                <div class="col-sm-12">
	                                <?php
		                                $data = array(
			                                'name'  => 'meta_tag',
			                                'class' => 'form-custom',
			                                'id' => 'metaTags',
			                                'autocomplete' => "new-meta_tag",
			                                'rows' => 3,
			                                'value' => isset($this->session->__rootuser_primary_data['meta_tag'])?$this->session->__rootuser_primary_data['meta_tag']:"",
		                                );
		                                echo form_textarea($data);
	                                ?>
                                </div>
                            </div>
                            <hr class="my-4 dashed">

                            <div class="form-group">
                                <?php
                                echo form_label('Favicon <span class="material-icons align-text-bottom text-danger">report</span>', 'userfile', array('class' => 'col-form-label', 'id' => 'userfile', 'style' => ''));
                                ?>
                                
                                <?php
                                echo form_input(array(
                                    'name' => 'userfile',
                                    'type' => 'file',
                                    'class' => 'form-control',
                                    'id' => 'clickImg',
                                    'accept' => 'image/*'
                                ));
                                ?>
                                <span class="text-danger"><?php echo form_error('userfile'); ?></span>
                            </div>
                            <hr class="my-4 dashed">
                        </div>
                    </div>
                
                <button type="submit" class="col-1 btn mt-4 btn-block float-right" style="color: #fff;background-color:#4B89FC;border-color: #4B89FC;">Submit</button>
                <?php echo form_close(); ?>
				
				</div>
			</div>
			
		</div>
	</div>
</section>

<script src="<?php echo base_url('asset/admin/js/lib/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('asset/admin/js/lib/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('asset/admin/js/bootstrap/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('asset/admin/js/jquery.dataTables.min.js'); ?>" type="text/javascript" ></script>
<script src="<?php echo base_url('asset/admin/js/dataTables.bootstrap4.min.js'); ?>" type="text/javascript" ></script>
<script src="<?php echo base_url('asset/admin/js/chosen-js/chosen.jquery.js'); ?>"></script>
<script src="<?php echo base_url('asset/admin/js/custom.js'); ?>"></script>

<div class="loading"><div class="spinner"><div class="spinner__rect spinner__rect--1"></div> <div class="spinner__rect spinner__rect--2"></div> <div class="spinner__rect spinner__rect--3"></div> <div class="spinner__rect spinner__rect--4"></div> <div class="spinner__rect spinner__rect--5"></div></div></div>
</body>
</html>
