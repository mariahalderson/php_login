<?php

function generate_password(){
  $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
  $str = strlen($characters);
  //echo $str;
  $newpass = '';

  for($i = 0; $i < $str; $i++){
    $newpass .= $characters[mt_rand(0, $str-1)];
  }
  return $newpass;
}
