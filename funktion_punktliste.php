<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   function addiere($eins, $zwei, ...$rest)
   {
      $anz = count($rest);
      echo "<p>Anzahl der Werte: " . (2 + $anz) . "<br>";
      echo "Werte: ";

      $sum = $eins + $zwei;
      $ausgabe = "$eins $zwei ";
      for($i=0; $i<$anz; $i++)
      {
         $sum = $sum + $rest[$i];
         $ausgabe .= "$rest[$i] ";
      }
      echo "$ausgabe<br>Summe der Werte: $sum</p>";
   }

   addiere(2,3,6);
   addiere(13,26);
   addiere(65,-3,88,31,12.5,7);
?>
</body></html>
