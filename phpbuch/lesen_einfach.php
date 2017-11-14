<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   if(!file_exists("daten.txt"))
      exit("Datei konnte nicht gefunden werden");

   echo "<p>Lesen mit readfile():<br>";
   readfile("daten.txt");
   echo "</p>";

   echo "<p>Lesen mit file():<br>";
   $feld = file("daten.txt");
   for($i=0; $i<count($feld); $i++)
      echo "|$feld[$i]|<br>";
   echo "</p>";
?>
</body></html>
