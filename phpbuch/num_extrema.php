<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $tp = array(17.5, 19.2, 21.8, 21.6, 20.2, 16.6);

   /* Erste Annahmen */
   $maxpos = 0;   $max = $tp[0];
   $minpos = 0;   $min = $tp[0];

   /* Restliche Elemente untersuchen */
   for($i=1; $i<count($tp); $i++)
   {
      if($tp[$i] > $max)
      {
         $max = $tp[$i];
         $maxpos = $i;
      }
      if($tp[$i] < $min)
      {
         $min = $tp[$i];
         $minpos = $i;
      }
   }

   /* Unverändert ausgeben */
   for($i=0; $i<count($tp); $i++)
      echo "<b>$i:</b> $tp[$i] &nbsp; ";

   echo "<br>Maximum: $max bei Position $maxpos<br>";
   echo "Minimum: $min bei Position $minpos";
?>
</body></html>
