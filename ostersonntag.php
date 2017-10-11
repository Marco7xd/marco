<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<h2>Ostersonntag</h2>
<?php
   // Einbinden der Funktionsbibliothek
   include "ostersonntag.inc.php";

   // Größere Jahreszahl zuerst? Tauschen!
   $anfang = $_POST["anfang"];
   $ende = $_POST["ende"];
   if ($anfang > $ende)
   {
      $temp = $anfang;
      $anfang = $ende;
      $ende = $temp;
   }

   echo "<table border='1'>";
   echo "<tr><td><b>Jahr</b></td><td><b>Datum</b></td></tr>";

   // Schleife über alle Jahreszahlen
   for ($jahr=$anfang; $jahr<=$ende; $jahr++)
   {
      ostersonntag($jahr, $tag, $monat);
      echo "<tr><td>$jahr</td><td>$tag.$monat.$jahr</td></tr>";
   }
   echo "</table>";
?>
</body></html>
