<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
  $sess_config = isset($_SESSION['__admin_user_data']['user_permission'])?$_SESSION['__admin_user_data']['user_permission']:"";
  function string_pos($sting, $find)
  {
    return strpos($sting, $find);
  }
?>
