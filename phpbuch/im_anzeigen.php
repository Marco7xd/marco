<?php
  $im = imagecreate(150,100);
  $grau = imagecolorallocate($im, 192, 192, 192);
  imagefill ($im, 0, 0, $grau);

  header("Content-Type: image/jpeg");
  imagejpeg($im);

  imagedestroy($im);
?>
