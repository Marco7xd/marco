<?php
  $im = imagecreate(350,100);
  $grau = imagecolorallocate($im, 192, 192, 192);
  imagefill ($im, 0, 0, $grau);
  $s = imagecolorallocate($im, 0, 0, 0);

  imagerectangle($im, 25, 25, 75, 75, $s);
  imagefilledrectangle($im, 95, 25, 145, 75, $s);

  $poly1 = array(165, 25, 190, 75, 215, 25);
  imagepolygon($im, $poly1, 3, $s);

  $poly2 = array(240, 25, 265, 75, 290, 25);
  imagefilledpolygon($im, $poly2, 3, $s);

  header("Content-Type: image/jpeg");
  imagejpeg($im);
  imagedestroy($im);
?>
