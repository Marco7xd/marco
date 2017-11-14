<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $jetzt = mktime(0, 0, 0, 2, 25, 2016);
   echo date("d.m.Y",$jetzt) . " jetzt<br><br>";

   $dann = strtotime("+1 day", $jetzt);
   echo date("d.m.Y",$dann) . " +1 day<br>";
   
   $dann = strtotime("+2 week", $jetzt);
   echo date("d.m.Y",$dann) . " +2 week<br>";

   $dann = strtotime("+2 week +2 day", $jetzt);
   echo date("d.m.Y",$dann) . " +2 week +2 day<br>";

   $dann = strtotime("-5 month", $jetzt);
   echo date("d.m.Y",$dann) . " -5 month<br>";

   $dann = strtotime("next Monday", $jetzt);
   echo date("d.m.Y",$dann) . " next Monday<br>";

   $dann = strtotime("last Monday", $jetzt);
   echo date("d.m.Y",$dann) . " last Monday<br>";
?>
</body></html>
