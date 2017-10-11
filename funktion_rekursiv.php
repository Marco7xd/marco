<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* Schleife */
   $x = 1.5;
   echo "x: $x<br>";
   while($x > 0.1)
   {
      $x = $x / 2;
      echo "x: $x<br>";
   }
   echo "<br>";

   /* Rekursion */
   function halbieren(&$z)
   {
      $z = $z / 2;
      if($z > 0.1)
      {
         echo "z: $z<br>";
         halbieren($z);
      }
   }

   $x = 1.5;
   echo "x: $x<br>";
   halbieren($x);
   echo "x: $x<br>";
?>
</body></html>
