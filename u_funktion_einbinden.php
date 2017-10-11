<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   include "u_funktion_einbinden.inc.php";

   echo "<p>" . mittelwert(4,5) . "<br>";
   echo mittelwert(0.5, 4, 7) . "<br>";
   echo mittelwert(5/2, 7/2, 2, -9) . "</p>";

   echo "<p>" . maximum(4,5) . "<br>";
   echo maximum(0.5, 4, 7) . "<br>";
   echo maximum(5/2, 7/2, 2, -9) . "</p>";
?>
</body></html>
