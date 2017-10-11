<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* Zwei Zeitangaben erzeugen */
   $zeit1 = mktime(23, 55, 0 ,2, 15, 2016);
   echo date("d.m.Y H:i:s",$zeit1) . "<br>";

   $zeit2 = mktime(0, 5, 15, 2, 16, 2016);
   echo date("d.m.Y H:i:s",$zeit2) . "<br><br>";

   /* Differenz berechnen */
   $diff_sek = $zeit2 - $zeit1;
   echo "Differenz: $diff_sek Sekunden<br>";

   $diff_min = $diff_sek / 60;
   echo "das sind: $diff_min Minuten<br>";

   $diff_std = $diff_min / 60;
   echo "das sind: $diff_std Stunden<br>";

   $diff_tag = $diff_std / 24;
   echo "das sind: $diff_tag Tage";
?>
</body></html>
