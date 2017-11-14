<?php
function ostersonntag($j, &$t, &$m)
{
   // Berechnung von klein d
   $d = ((15 + floor($j/100) - floor($j/400)
      - floor((8 * floor($j/100) + 13) / 25)) % 30
      + 19 * ($j % 19)) % 30;

   // Berechnung von groß d
   if ($d==29)
      $D = 28;
   else if ($d == 28 && $j%17 >= 11)
      $D = 27;
   else
      $D = $d;

   // Berechnung von klein e
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

function feiertagNRW($jahr, &$ftag)
{
   /* Die festen Feiertage */
   $ftag["Neujahr"] = mktime(0,0,0,1,1,$jahr);
   $ftag["Tag der Arbeit"] = mktime(0,0,0,5,1,$jahr);
   $ftag["Tag der deutschen Einheit"] = mktime(0,0,0,10,3,$jahr);
   $ftag["Allerheiligen"] = mktime(0,0,0,11,1,$jahr);
   $ftag["1. Weihnachtsfeiertag"] = mktime(0,0,0,12,25,$jahr);
   $ftag["2. Weihnachtsfeiertag"] = mktime(0,0,0,12,26,$jahr);

   /* Ostersonntag berechnen */
   ostersonntag($jahr, $t_ostern, $m_ostern);
   $ostern = mktime(0, 0, 0, $m_ostern, $t_ostern, $jahr);

   /* Die beweglichen Feiertage, abhängig vom Ostersonntag */
   $ftag["Karfreitag"] = strtotime("-2 day",$ostern);
   $ftag["Ostersonntag"] = strtotime("0 day",$ostern);
   $ftag["Ostermontag"] = strtotime("+1 day",$ostern);
   $ftag["Christi Himmelfahrt"] = strtotime("+39 day",$ostern);
   $ftag["Pfingstsonntag"] = strtotime("+49 day",$ostern);
   $ftag["Pfingstmontag"] = strtotime("+50 day",$ostern);
   $ftag["Fronleichnam"] = strtotime("+60 day",$ostern);

   /* Liste nach Werten sortieren */
   asort($ftag);
}
?>
