<?php
  $im = imagecreatefromjpeg("im_blume.jpg");
  $breite = imagesx($im);
  $hoehe = imagesy($im);

  $schwarz = imagecolorallocate($im, 0, 0, 0);
  $weiss = imagecolorallocate($im, 255, 255, 255);
  $schriftart = "arial.ttf";
  imagettftext($im, 20, 90, $breite, $hoehe, $weiss,
    $schriftart, "Sonnen");
  imagettftext($im, 20, 180, $breite, 0, $schwarz,
    $schriftart, "blume");
  header("Content-Type: image/jpeg");
  imagejpeg($im);
  imagedestroy($im);
?>
