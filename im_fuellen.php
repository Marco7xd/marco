<?php
  $im = imagecreate(250,200);
  $grau = imagecolorallocate($im, 192, 192, 192);
  imagefill ($im, 0, 0, $grau);
  $s = imagecolorallocate($im, 0, 0, 0);
  $w = imagecolorallocate($im, 255, 255, 255);
  $r = imagecolorallocate($im, 255, 0, 0);
  
  imagerectangle($im, 0, 0, 249, 199, $s);
  imageellipse($im, 100, 100, 100, 100, $s);
  imageellipse($im, 150, 100, 100, 100, $s);
  imagerectangle($im, 120, 90, 130, 110, $r);
  
  imagefilltoborder($im, 125, 100, $s, $w);
  imagefilltoborder($im, 1, 1, $s, $w);

  header("Content-Type: image/jpeg");
  imagejpeg($im);
  imagedestroy($im);
?>
