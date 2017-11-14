<?php
  $im = imagecreate(150,100);
  $grau = imagecolorallocate($im, 192, 192, 192);
  imagefill ($im, 0, 0, $grau);

  $schwarz = imagecolorallocate($im, 0, 0, 0);
  imagestring($im, 5, 0, 0, "hallo", $schwarz);

  header("Content-Type: image/jpeg");
  imagejpeg($im);
  imagedestroy($im);
?>
