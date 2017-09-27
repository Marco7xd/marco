<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $ww = 5>3;
   echo "Wahrheitswert: $ww<br>";
   if($ww) echo "Dieser Wert ist wahr<br><br>";

   echo "Impliziert: 5>3: " . (5>3) . ", 5<3: " . (5<3) . "<br>";
   echo "Explizit: boolval(5<3): " . boolval(5>3) .
      ", boolval(5<3): " . boolval(5<3) . "<br><br>";

   echo "TRUE: " . TRUE . ", true: " . true . "<br>";
   echo "FALSE: " . FALSE . ", false: " . false . "<br><br>";


   echo "boolval(1): " . boolval(1) . ", boolval(0): " . boolval(0)
      . ", boolval(-1): " . boolval(-1) . "<br>";
   echo "boolval(0.0): " . boolval(0.0)
      . " , boolval(0.000000001): "
      . boolval(0.000000001) . "<br>";
   echo 