<?php
  $im = imagecreate(150,100);
  $grau = imagecolorallocate($im, 192, 192, 192);
  imagefill ($im, 0, 0, $grau);
  $schwarz = imagecolorallocate($im, 0, 0, 0);

  $schriftart = "arial.ttf";
  imagettftext($im, 20, 0, 0, 20, $schwarz, $schriftart, "normal");
  imagettftext($im, 20, 90, 144, 100,
    $schwarz, $schriftart, "gedreht");

  header("Content-Type: image/jpeg");
  imagejpeg($im);
  imagedestroy($im);
?>
