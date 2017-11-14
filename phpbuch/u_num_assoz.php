<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $fp = array(
      array("Hersteller"=>"Quantum", "Typ"=>"Fireball CX", "GB"=>40, "Preis"=>112, "ArtNr"=>"HDA-208"),
      array("Hersteller"=>"Quantum", "Typ"=>"Fireball Plus", "GB"=>80, "Preis"=>128, "ArtNr"=>"HDA-163"),
      array("Hersteller"=>"Fujitsu", "Typ"=>"MPE 3136", "GB"=>160, "Preis"=>149, "ArtNr"=>"HDA-171"),
      array("Hersteller"=>"Seagate", "Typ"=>"310232A", "GB"=>60, "Preis"=>122, "ArtNr"=>"HDA-144"),
      array("Hersteller"=>"IBM Corporation", "Typ"=>"DJNA 372200", "GB"=>240, "Preis"=>230, "ArtNr"=>"HDA-140"));

   /* Überschrift */
   echo "<table border='1'>";
   echo "<tr>";
   foreach($fp[0] as $name=>$wert)
      echo "<td>$name</td>";
   echo "</tr>";

   /* Werte */
   for($i=0; $i<5; $i++)
   {
      echo "<tr>";
      foreach($fp[$i] as $wert)
         echo "<td>$wert</td>";
      echo "</tr>";
   }
   echo "</table>";
?>
</body></html>
