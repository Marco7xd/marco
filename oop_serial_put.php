<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   include "oop_serial_class.inc.php";
   $vespa = new Fahrzeug("Vespa Piaggio", 25, "rot");
   $s = serialize($vespa);
   file_put_contents("oop_serial.dat", $s);
   echo "Objekt serialisiert und in Datei gespeichert";
?>
</body></html>
