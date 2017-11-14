<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php

   for ($i=13; $i<=29; $i=$i+4)
      echo "$i ";
   echo "<br>";

   for ($i=2; $i>=-1.25; $i=$i-0.5)
      echo "$i ";
   echo "<br>";

   for ($i=2000; $i<=6000; $i=$i+1000)
      echo "$i ";
   echo "<br>";

   for ($i=5; $i<=13; $i=$i+2)
      echo "Z$i ";
   echo "<br>";

   for ($i=1; $i<=3; $i=$i+1)
      echo "a b$i ";
   echo "<br>";

   for ($i=2; $i<=22; $i=$i+10)
   {
      $k = $i + 1;
      echo "c$i c$k ";
   }
   echo "<br>";

   for ($i=13; $i<=45; $i=$i+4)
      if ($i<=21 || $i>=33)
         echo "$i ";
?>
</body></html>
