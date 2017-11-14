<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   if (isset($preis)) echo "1: $preis<br>";
   else               echo "1: Nicht vorhanden<br>";

   $preis = 1.02;
   if (isset($preis)) echo "2: $preis<br>";
   else               echo "2: Nicht vorhanden<br>";

   unset($preis);
   if (isset($preis)) echo "3: $preis<br>";
   else               echo "3: Nicht vorhanden<br>";

   $preis = 1.02;
   if (isset($preis)) echo "4: $preis<br>";
   else               echo "4: Nicht vorhanden<br>";

   $preis = null;
   if (isset($preis)) echo "5: $preis<br>";
   else               echo "5: Nicht vorhanden<br>";
?>
</body></html>
