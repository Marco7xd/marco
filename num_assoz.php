<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* 1. Zeile und 2. Zeile */
   $pers = array(
      array("Name"=>"Maier", "Vorname"=>"Hans",
         "Pnr"=>6714, "Gehalt"=>3500),
      array("Name"=>"Schmitz", "Vorname"=>"Peter",
         "Pnr"=>81343, "Gehalt"=>3750));

   /* 3. Zeile */
   $pers[2]["Name"] = "Mertens";
   $pers[2]["Vorname"] = "Julia";
   $pers[2]["Pnr"] = 2297;
   $pers[2]["Gehalt"] = 3621.50;

   echo "<table border='1'>";
   for($i=0; $i<3; $i++)
   {
      echo "<tr>";
      foreach($pers[$i] as $name=>$wert)
         echo "<td>$name: $wert</td>";
      echo "</tr>";
   }
   echo "</table>";
?>
</body></html>
