<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   for ($i=1; $i<=32; $i++)
      $cnt[$i]=0;  // Zähler auf 0

   for($i=1; $i<=32; $i++)  // 32mal ziehen
   {
      do  // mehrmals ziehen, falls Zähler > 0 */
         $z = random_int(1, 32);
      while($cnt[$z]>0);

      $cnt[$z] = $cnt[$z]+1;  // Zähler erhöhen
      $karte[$i] = $z;        // Karte speichern
   }

   /* Karten ausgeben */
   echo "Spieler A: ";
   for ($i=1; $i<=10; $i++)  echo $karte[$i] . " ";
   echo "<br>";

   echo "Spieler B: ";
   for ($i=11; $i<=20; $i++) echo $karte[$i] . " ";
   echo "<br>";

   echo "Spieler C: ";
   for ($i=21; $i<=30; $i++) echo $karte[$i] . " ";
   echo "<br>";

   echo "Im Stock: ";
   for ($i=31; $i<=32; $i++)
      echo $karte[$i] . " ";
?>
</body></html>
