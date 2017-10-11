<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $dz = mktime(15, 32, 55, 03, 31, 2016);
   echo date("d.m.Y H:i:s", $dz) . "<br>";

   for($minute=58; $minute<=62; $minute++)
   {
      $dz = mktime(13, $minute, 0);
      echo date("H:i:s", $dz) . " &nbsp; ";
   }
   echo "<br>";

   for($tag=26; $tag<=32; $tag++)
   {
      $dz = mktime(0 ,0, 0, 2, $tag, 2016);
      echo date("d.m.Y", $dz) . " &nbsp; ";
   }
?>
</body></html>
