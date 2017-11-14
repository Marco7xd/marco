<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   echo "<h2>Winkelfunktionen:</h2>";

   $w = 32;
   echo "<p>Winkel w: $w (in Grad)<br>";
   $wbm = deg2rad($w);
   echo "Winkel w: $wbm (in Bogenmaß)<br>";
   echo "sin(w): " . sin($wbm) . "<br>";
   echo "cos(w): " . cos($wbm) . "<br>";
   echo "tan(w): " . tan($wbm) . "</p>";

   $x = 0.53;
   echo "<p>Wert x: $x<br>";
   echo "asin(x): " . rad2deg(asin($x)) . " (in Grad)<br>";
   echo "acos(x): " . rad2deg(acos($x)) . " (in Grad)";
?>
</body></html>
