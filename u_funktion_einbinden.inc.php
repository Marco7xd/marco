<?php
   function mittelwert()
   {
      $zahlen = func_get_args();
      $anzahl = func_num_args();

      $summe = 0;
      for($i=0; $i<$anzahl; $i++)
         $summe += $zahlen[$i];

      $ergebnis = $summe / $anzahl;
      return $ergebnis;
   }

   function maximum()
   {
      $zahlen = func_get_args();
      $anzahl = func_num_args();

      $mx = $zahlen[0];
      for($i=1; $i<$anzahl; $i++)
         if ($zahlen[$i] > $mx)
            $mx = $zahlen[$i];

      return $mx;
   }
?>
