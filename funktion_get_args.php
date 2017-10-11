<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   function addiere()
   {
      $param = func_get_args();
      $anz = func_num_args();
      echo "<p>Anzahl der Werte: $anz<br>";
      echo "Werte: ";

      $sum = 0;
      for($i=0; $i<$anz; $i++)
      {
         $sum = $sum + $param[$i];
         echo "$param[$i] ";
      }
      echo "<br>Summe der Werte: $sum</p>";
   }

   addiere(2,3,6);
   addiere(13,26);
   addiere(65,-3,88,31,12.5,7);
?>
</body></html>
