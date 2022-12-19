<?php defined('BASEPATH') OR exit('No direct script access allowed');

function get_uri($pass, $i) {
  $current_uri = [];
  $other = array_keys($pass); 
  foreach($other as $dee) {
    $current_uri[] = $dee;
  }
  return $current_uri[$i];
}

function check_data($data)
{
  if($data != ""){
    return $data;
  } else {
    return " not set!";
  }
}

function date_diff_Generate($date1, $date2)
{  
  $date = new DateTime($date1);
  $now = new DateTime($date2);
  return $date->diff($now)->format("%R%a");
}

?>