<?php
  $im = imagecreatefromjpeg("im_blume.jpg");

  // imageflip($im, IMG_FLIP_HORIZONTAL);
  imageflip($im, IMG_FLIP_VERTICAL);
  // imageflip($im, IMG_FLIP_BOTH);

  header("Content-Type: image/jpeg");
  imagejpeg($im);
  imagedestroy($im);
?>
