<?php
  $im = imagecreatefromjpeg("im_blume.jpg");

  // $re = array("x"=>0, "y"=>0, "width"=>187, "height"=>283);
  $re = array("x"=>0, "y"=>0, "width"=>90, "height"=>140);
  // $re = array("x"=>90, "y"=>140, "width"=>97, "height"=>143);
  $im = imagecrop($im, $re);
  
  header("Content-Type: image/jpeg");
  imagejpeg($im);
  imagedestroy($im);
?>
