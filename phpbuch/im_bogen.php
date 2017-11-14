<?php
  $im = imagecreate(500,100);
  $grau = imagecolorallocate($im, 192, 192, 192);
  imagefill ($im, 0, 0, $grau);
  $s = imagecolorallocate($im, 0, 0, 0);

  imageellipse($im, 50, 50, 50, 50, $s);
  imagefilledellipse($im, 120, 50, 50, 50, $s);

  imagearc($im, 190, 50, 50, 50, 0, 90, $s);
  imagefilledarc($im, 260, 50, 50, 50, 0, 90, $s, IMG_ARC_PIE);
  imagefilledarc($im, 330, 50, 50, 50, 0, 90, $s,
    IMG_ARC_EDGED | IMG_ARC_NOFILL);
  imagefilledarc($im, 400, 50, 50, 50, 0, 90, $s, IMG_ARC_CHORD);

  header("Content-Type: image/jpeg");
  imagejpeg($im);
  imagedestroy($im);
?>
