<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $vorname = array("Peter", "Markus", "Jens",
                    "Julia", "Monika", "Gerd");
   $alter = array(35,42,16,17,42,55);

   echo "<table border='1'>";
   echo "<tr><td><b>Name</b></td>"
      ."<td><b>Alter</b></td></tr>";
   for($i=0; $i<=5; $i = $i+1)
   {
      echo "<tr><td>$vorname[$i]</td>"
         . "<td align='right'>$alter[$i]</td></tr>";
   }
   echo "</table>";
?>
</body></html>
