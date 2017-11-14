<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   echo "<p><b>Maxima, Minima:</b><br>";
   $a = 4.75;
   $b = -4.75;
   $c = 30;
   echo "a: $a, b: $b, c: $c<br>";
   echo "Maximum von a, b und c: " 
        . max($a,$b,$c) . "<br>";
   echo "Minimum von a, b und c: " . min($a,$b,$c) . "</p>";

   $f = array(-4.75, 5.37, 30, -6.2, 0.05);
   echo "<p>Feld: ";
   for($i=0; $i<count($f); $i++)
      echo "$f[$i] &nbsp; ";
   echo "<br>";
   echo "Feld-Maximum: " . max($f) . "<br>";
   echo "Feld-Minimum: " . min($f) . "</p>";
?>
</body></html>
