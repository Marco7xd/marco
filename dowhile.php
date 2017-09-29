<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   srand((double)microtime()*1000000);
   $summe = 0;


   do
   {
   	  $zufallzahl = rand(1,6);
   	  $summe = $summe + $zufallzahl;
   	  echo "Zahl $zufallszahl, Summe $summe<br>";
   }
   while ($summe < 25);
?>
</body></html>