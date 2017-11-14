<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   srand((double)microtime()*1000000);
   $summe = 0;
   $zaehler = 0;

   while ($summe < 25)
   {
      $zufallszahl = rand(1,6);
      $summe = $summe + $zufallszahl;
      $zaehler = $zaehler + 1;
      echo "Nr. $zaehler, Zahl $zufallszahl,";
      echo " Summe $summe<br>";
      if ($zaehler >= 6) break;       // Sonderfall
   }
?>
</body></html>
