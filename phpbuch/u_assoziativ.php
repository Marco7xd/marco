<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $x = array("Peter"=>35, "Markus"=>42,
              "Jens"=>16, "Julia"=>17,
              "Monika"=>42, "Gerd"=>55);

   echo "<table border='1'>";
   echo "<tr><td><b>Name</b></td>"
      ."<td><b>Alter</b></td></tr>";

   foreach($x as $vname=>$alter)
      echo "<tr><td>$vname</td>"
         ."<td align='right'>$alter</td></tr>";

   echo "</table>";
?>
</body></html>
