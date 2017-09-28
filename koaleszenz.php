<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   echo ($preis ?? "Nicht vorhanden") . "<br>";
   $preis = 1.02;
   echo ($preis ?? "Nicht vorhanden") . "<br>";
?>
</body></html>