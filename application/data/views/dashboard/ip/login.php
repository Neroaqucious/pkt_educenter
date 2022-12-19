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
        font-family: inherit;
        margin-bottom: 30px;
      }  
      .form-custom {
        display: block;
        width: 100%;
        padding: 0.35rem 0.75rem 0.45rem 0.75rem;
        font-family: system-ui, sans-serif;
        color: #5f5f5fd9;
        background-color: #ffffff;
        background-clip: padding-box;
        border: 1px solid #dadada;
        outline: none;
      }
      img.adm-logo {
        width: 24%;
        height: auto;
        margin: 0 auto;
        display: block;
        border: 5px solid #f5f7fa;
        border-radius: 80px;
        background: #f5f7fa;
        padding: 2px;
        margin-bottom: 10px;
      }
    </style>

    </head>
  <body>
    <section class="wrapper">
      <div class="login">
        <div class="form mr-auto ml-auto">
          <img src="<?php echo base_url('asset/images/pkt.png'); ?>" class="adm-logo">
          <h3 class="head">IP Access Portal</h3>
          <?php echo form_open('root/portal/url/generate/ipaccess'); ?>
            <div class="form-group">
                <?php
                  $data = array(
                    'name'  => 'user_name',
                    'type' => 'text',
                    'placeholder' => '',
                    'class' => 'form-custom',
                    'id' => 'InputEmail',
                    'autocomplete' => "new-user_name",
                    'placeholder' => "User Name"
                  );
                echo form_input($data);
              ?>
            </div>

            <div class="form-group">
              <?php
                $data = array(
                  'name'  => 'user_password',
                  'type' => 'password',
                  'placeholder' => '',
                  'class' => 'form-custom',
                  'id' => 'InputPassword',
                  'autocomplete' => "new-user_password",
                  'placeholder' => "Password"
                );
                echo form_input($data);
              ?>
            </div>
            
          <button type="submit" class="btn mt-4 btn-block" style="color: #fff;background-color: #c62d29;border-color: #c62d29;width: 80%;margin: 0 auto;border-radius: 0px;">Login</button>
          <?php echo form_close(); ?>
          
            <div class="text-danger mt-2"><?php echo $msg; ?></div>
            <?php if(!empty($_SESSION['token_error'])){ ?>
                <div class="text-danger mt-2"><?php echo $_SESSION['token_error']; ?></div>
            <?php } ?>
        </div>
      </div>    
    </section>

    <div class="loading"><div class="spinner"><div class="spinner__rect spinner__rect--1"></div> <div class="spinner__rect spinner__rect--2"></div> <div class="spinner__rect spinner__rect--3"></div> <div class="spinner__rect spinner__rect--4"></div> <div class="spinner__rect spinner__rect--5"></div></div></div>
    
  </body>
</html>
