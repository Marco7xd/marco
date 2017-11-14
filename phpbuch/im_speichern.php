<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
  $im = imagecreate(150,100);
  $grau = imagecolorallocate($im, 192, 192, 192);
  imagefill ($im, 0, 0, $grau);
  imagejpeg($im, "im_test.jpg");
  imagedestroy($im);
?>
<img src="im_test.jpg">
</body></html>
