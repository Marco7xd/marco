<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   include "oop_serial_class.inc.php";
   if(!file_exists("oop_serial.dat"))
      exit("Datei konnte nicht gefunden werden");
   $s = file_get_contents("oop_serial.dat");
   $vespa = unserialize($s);
   echo "Objekt aus Datei gelesen und deserialisiert<br>";
   echo $vespa;
?>
</body></html>
