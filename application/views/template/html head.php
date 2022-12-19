<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php echo doctype('html5'); ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <?php
    $meta = array(
      array(
        'name' => 'Content-type',
        'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
      ),
      array(
        'name' => 'description',
        'content' => 'Online learning system, PKT Education Center'
      ),
      array(
        'name' => 'keywords',
        'content' => 'Online learning system, PKT Education Center, PKT Education, Japan, Japanese Language School, Online Learning, Japanese Online, Basic Japanese Learning, ITPEC'
      ),
      array(
        'name' => 'viewport',
        'content' => 'width=device-width, initial-scale=1.0'
      ),
      array(
        'name' => 'robots',
        'content' => 'noindex,nofollow'
      ),        
    );
    echo meta($meta);
  ?>
  <title><?php echo $title; ?> - PKT Education Center</title>
  <?php 
    echo link_tag('upload/favicon.ico', 'shortcut icon', 'image/ico');
    echo link_tag('asset/css/bootstrap.min.css');
    echo link_tag('asset/css/animate.css');
    echo link_tag('asset/css/jquery-ui.min.css');
    echo link_tag('asset/css/meanmenu.min.css');
    echo link_tag('asset/css/owl.carousel.css');
    echo link_tag('asset/css/font-awesome.min.css');
    echo link_tag('asset/inc/custom-slider/css/nivo-slider.css');
    echo link_tag('asset/css/nice-select.css');
    echo link_tag('asset/css/magnific-popup.css');
    echo link_tag('asset/css/jquery.bxslider.css');
    echo link_tag('asset/style.css');
    echo link_tag('asset/css/responsive.css');
  ?>
</head>