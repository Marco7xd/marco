<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $fn = "beliebig.txt";
   $info = stat($fn);

   echo "Datei: $fn<br>";
   echo "Anzahl Byte: $info[7]<br>";
   echo "Zeitpunkt der letzten Modifizierung: "
      . date("d.m.Y H:i:s", $info[9]) . "<br>";
?>
</body></html>
