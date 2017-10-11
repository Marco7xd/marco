<?php
function ostersonntag($j, &$t, &$m)
{
   // Berechnung des kleinen d
   $d = ((15 + floor($j/100) - floor($j/400)
      - floor((8 * floor($j/100) + 13) / 25)) % 30
      + 19 * ($j % 19)) % 30;

   // Berechnung des großen D
   if ($d==29)                         $D = 28;
   else if ($d == 28 && $j%17 >= 11)   $D = 27;
   else                                $D = $d;

   // Berechnung des kleinen e
   $e = (2 * ($j%4) + 4 * ($j%7) + 6 * $D
      + (6 + floor($j/100) - floor($j/400) - 2) % 7) % 7;

   // Berechnung von Tag und Monat
   // Rückgabe der Werte per Referenz
   $m = "03";
   $t = 21 + $e + $D + 1;
   if ($t > 31)
   {
      $m = "04";
      $t = $t - 31;
   }
   if($t < 10)
      $t = "0" . $t;
}
?>
