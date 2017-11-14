<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $orig = 12.3;
   echo "$orig<br>";

   $refe = &$orig;
   $refe = 5.8;
   echo "$orig<br>";
?>
</body></html>
