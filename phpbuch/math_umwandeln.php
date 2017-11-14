<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   echo "<p><b>Zahlen in Ganzzahlen verwandeln:</b><br>";
   $a = 4.75;
   echo "Variable a: $a<br>";
   echo "Nach unten mit floor(): " . floor($a) . "<br>";
   echo "Nach oben mit ceil(): " . ceil($a) . "<br>";
   echo "Gerundet mit round(): " . round($a) . "</p>";

   $b = -4.75;
   echo "<p>Variable b: $b<br>";
   echo "Nach unten mit floor(): " . floor($b) . "<br>";
   echo "Nach oben mit ceil(): " . ceil($b) . "<br>";
   echo "Gerundet mit round(): " . round($b) . "</p>";
?>
</body></html>
