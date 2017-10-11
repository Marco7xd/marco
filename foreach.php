<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* Numerisches Feld */
   $tp = array(17.3, 19.2, 21.8);

   foreach($tp as $wert)
      $wert = $wert * 2;
   echo "$tp[0] $tp[1] $tp[2]<br>";

   foreach($tp as &$wert)
      $wert = $wert * 2;
   echo "$tp[0] $tp[1] $tp[2]<br>";

   /* Assoziatives Feld */
   $tp = array("Mo"=>17.3, "Di"=>19.2, "Mi"=>21.8);

   foreach($tp as $name=>$wert)
      $wert = $wert * 2;
   echo $tp["Mo"] . " " . $tp["Di"] . " " . $tp["Mi"] . "<br>";

   foreach($tp as $name=>&$wert)
      $wert = $wert * 2;
   echo $tp["Mo"] . " " . $tp["Di"] . " " . $tp["Mi"] . "<br>";
?>
</body></html>
