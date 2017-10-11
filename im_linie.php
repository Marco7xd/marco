<?php
  $im = imagecreate(150,150);
  $grau = imagecolorallocate($im, 192, 192, 192);
  imagefill ($im, 0, 0, $grau);
  $s = imagecolorallocate($im, 0, 0, 0);

  for($i=25; $i<=125; $i+=5)
     imagesetpixel($im, 25, $i, $s);

  imageline($im, 50, 25, 50, 125, $s);

  imagesetthickness($im, 10);
  imageline($im, 75, 25, 75, 125, $s);
  imagesetthickness($im, 1);

  $w =  imagecolorallocate($im, 255, 255, 255);
  $style = array($s, $s, $s, $s, $s, $s, $s,
                 $w, $w, $w, $w, $w, $w, $w);
  imagesetstyle($im, $style);
  imageline($im, 100, 25, 100, 125, IMG_COLOR_STYLED);

  imagedashedline($im, 125, 25, 125, 125, $s);

  header("Content-Type: image/jpeg");
  imagejpeg($im);
  imagedestroy($im);
?>
