<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
  if (extension_loaded("gd"))
  {
    echo "GD-Bibliothek aktiviert<br>";
    $gd = gd_info();
    echo "Version: " . $gd["GD Version"] . "<br>";
    echo "Grafikformate: ";
    if ($gd["JPEG Support"]) echo "JPEG ";
    if ($gd["PNG Support"]) echo "PNG ";
  }
  else
    echo "GD-Bibliothek nicht aktiviert";
?>
</body></html>
