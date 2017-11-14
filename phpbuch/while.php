<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   srand((double)microtime()*1000000);
   $summe = 0;

   while ($summe < 25)
   {
      $zufallszahl = rand(1,6);
      $summe = $summe + $zufallszahl;
      echo "Zahl $zufallszahl, Summe $summe<br>";
   }

?>
</body></html>
