<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $tp = range(3, 20, 4);
   foreach($tp as $element)
      echo "$element ";
   echo "<br>";

   foreach(range(3, 20, 4) as $wert)
      echo "$wert ";
   echo "<br>";

   foreach(range(20, 3, 4) as $wert)
      echo "$wert ";
   echo "<br>";

   foreach(range(20, 3) as $wert)
      echo "$wert ";
?>
</body></html>
