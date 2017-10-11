<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $i = PHP_INT_MAX;  echo "$i<br>";
   $f = $i + 1;       echo "$f<br>";
   $i = PHP_INT_MIN;  echo "$i<br><br>";

   $x = 1e308;        echo "$x<br>";
   $x = $x * 10;      echo "$x<br>";
   $x = 1e-323;       echo "$x<br>";
   $x = $x / 10;      echo "$x<br><br>";

   $x = 1.0 / 7.0;    echo number_format($x,20) . "<br><br>";
   
   $x = array($i, $f, true, "Hallo");
   var_dump($x);
?>
</body></html>
