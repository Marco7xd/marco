<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $test = "info@edv.biologie.uni-bonn.de";
   echo "<p>Suchen in Zeichenketten:</p>";
   echo "<p>Original: $test<br>";
   echo "Position des ersten '@', strpos(): "
      . strpos($test,"@") . "<br>";

   $pos = strpos($test, ".");
   while($pos !== false)
   {
      echo "Folgender Punkt, strpos(): $pos<br>";
      $pos = strpos($test, ".", $pos + 1);
   }

   echo "Letztes 'd', strrpos(): " . strrpos($test,"d") . "</p>";
?>
</body></html>
