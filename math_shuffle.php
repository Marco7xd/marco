<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* 32 Karten geordnet im Feld speichern */
   for ($i=0; $i<=31; $i++) $karte[$i]=$i+1;

   /* Mischen */
   shuffle($karte);

   /* Karten ausgeben */
   echo "Spieler A: ";
   for ($i=0; $i<=9; $i++) echo $karte[$i] . " ";
   echo "<br>";

   echo "Spieler B: ";
   for ($i=10; $i<=19; $i++) echo $karte[$i] . " ";
   echo "<br>";

   echo "Spieler C: ";
   for ($i=20; $i<=29; $i++) echo $karte[$i] . " ";
   echo "<br>";

   echo "Im Stock: ";
   for ($i=30; $i<=31; $i++)
      echo $karte[$i] . " ";
   echo "<br><br>";

   echo str_shuffle("abcdefghijklmnopqrstuvwxyz");
?>
</body></html>
