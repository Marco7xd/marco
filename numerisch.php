<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $tp = array(17.5, 19.2, 21.8, 21.6, 17.5);
   $tp[5] = 20.2;
   $tp[6] = 16.6;
   
   for($i=0; $i<=6; $i = $i+1)
      echo "Temperatur $i: $tp[$i]<br>";
?>
</body></html>
