<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* Variable unbekannt */
   echo "Variable: $x<br>";

   /* Division durch 0 */
   $x = 42;
   $y = 0;
   $z = $x / $y;
   echo "Division: $x / $y = $z<br>";

   /* Zugriff auf Funktion */
   testFunktion();

   echo "Ende des Programms";
?>
</body></html>
