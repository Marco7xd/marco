<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   include "zeit_feiertag.inc.php";
   echo "<h2>Feiertage in NRW " . $_POST["jahr"] . "</h2>";

   /* Feiertage ermitteln */
   feiertagNRW($_POST["jahr"], $ftag);

   /* Liste ausgeben */
   echo "<table border='1'>";
   foreach($ftag as $name=>$wert)
   {
      $datum = date("d.m.Y", $wert);
      echo "<tr><td>$datum</td><td>$name</td></tr>";
   }
   echo "</table>";
?>
</body></html>
