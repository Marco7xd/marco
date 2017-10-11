<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $fp = array(
      array("Quantum", "Fireball CX", 40, 112, "HDA-208"),
      array("Quantum", "Fireball Plus", 80, 128, "HDA-163"),
      array("Fujitsu", "MPE 3136", 160, 149, "HDA-171"),
      array("Seagate", "310232A", 60, 122, "HDA-144"),
      array("IBM Corporation", "DJNA 372200", 240, 230, "HDA-140"));

   echo "<table border='1'>";
   for($i=0; $i<5; $i++)
   {
      echo "<tr>";
      for($k=0; $k<5; $k++)
         echo "<td>" . $fp[$i][$k] . "</td>";
      echo "</tr>";
   }
   echo "</table>";
?>
</body></html>

