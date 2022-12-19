<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include("aside.php"); ?>

<!--RIGHT CONTENT AREA-->
<div class="content-area">

  <header class="header sticky-top">
    <nav class="navbar navbar-light bg-dark px-sm-4" style="border-bottom: 3px solid #fb7173;">
      <a class="navbar-brand py-2 d-md-none  m-0 material-icons toggle-sidebar" href="#">menu</a>
      <ul class="navbar-nav flex-row ml-auto">
        <li>
        <?php if($alert['student'] > 0) { ?>
          <a href="<?php echo base_url('adm/portal/student'); ?>" class="nav-link text-light">
          <span class="material-icons align-middle">notification_important</span></a>
        <?php } elseif($alert['course'] > 0) { ?> 
          <a href="<?php echo base_url('adm/portal/student'); ?>" class="nav-link text-light">
          <span class="material-icons align-middle">notification_important</span></a>
        <?php } else { ?>
          <a href="#" class="nav-link text-secondary"><span class="material-icons align-middle">notification_important</span></a>
        <?php } ?>
        </li>
        <li>
        <?php if($alert['feedback'] > 0) { ?>
          <a href="<?php echo base_url('adm/portal/feedback'); ?>" class="nav-link text-primary">
          <span class="material-icons align-middle">chat</span></a>
        <?php } else { ?>
          <a href="#" class="nav-link text-secondary"><span class="material-icons align-middle">chat</span></a>
        <?php } ?>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>" class="nav-link text-secondary" target="_blank"><span class="material-icons align-middle">pages</span></a>
        </li>
        
        <li class="nav-item ml-sm-3 user-logedin dropdown">
          <a href="#" id="userLogedinDropdown" data-toggle="dropdown" class="nav-link weight-400 dropdown-toggle text-secondary"><span class="material-icons align-middle">account_circle</span>
	          <?php echo ucfirst(isset($_SESSION['__admin_user_data']['user_name'])?$_SESSION['__admin_user_data']['user_name']:""); ?></a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="<?php echo base_url('adm/portal/auth/profile'); ?>">Profile</a>
            <a class="dropdown-item" href="<?php echo base_url('adm/portal/auth/password'); ?>">Change Password</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url('adm/portal/auth/logout'); ?>">Log Out</a>
          </div>
        </li>
        
      </ul>
    </nav>
  </header>
