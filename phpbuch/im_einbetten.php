<?php
  $im = imagecreate(250,150);
  $grau = imagecolorallocate($im, 192, 192, 192);
  imagefill ($im, 0, 0, $grau);

  $ve = imagecreatefromjpeg("im_vogel.jpg");
  imagecopy($im, $ve, 0, 0, 0, 0, imagesx($ve), imagesy($ve));
  imagecopy($im, $ve, 150, 50, 20, 10, 50, 50);

  header("Content-Type: image/jpeg");
  imagejpeg($im);
  imagedestroy($im);
  imagedestroy($ve);
?>