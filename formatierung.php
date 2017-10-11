<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   echo "<p><b>Zahlenformatierung:</b></p>";
   $d = 10000000 / 7;
   echo "<p>Variable d: $d</p>";
   echo "<p>Mit Tausenderkomma, ohne Dezimalstellen:<br>"
      . number_format($d) . "</p>";
   echo "<p>Mit Tausenderkomma, auf drei Stellen gerundet:<br>"
      . number_format($d,3) . "</p>";
   echo "<p>Mit Tausenderpunkt, auf drei Stellen gerundet:<br>"
      . number_format($d,3,",",".") . "</p>";
?>
</body></html>
