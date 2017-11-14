<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* explode */
   $test = "Dies ist ein kurzer Satz";
   $worte = explode(" ", $test);
   for($i=0; $i<count($worte); $i++)
      echo "Wort $i: $worte[$i]<br>";
   echo "<br>";

   /* str_split */
   $teile = str_split($test, 5);
   for($i=0; $i<count($teile); $i++)
      echo "Teil $i: $teile[$i]<br>";
   echo "<br>";

   /* implode */
   $feld = array(17.5, 19.2, 21.8, 21.6, 17.5);
   $test = implode(";", $feld);
   echo "Eine Zeichenkette:<br>$test";
?>
</body></html>
