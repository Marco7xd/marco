<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* time */
   $jetzt = time();
   echo "<p>Sekunden seit 01.01.1970: $jetzt</p>";

   /* microtime */
   echo "Mit Sekundenbruchteilen:<br>";
   for($i=0; $i<20e6; $i++)
      if($i%2e6==0)
      {
         $msfeld = explode(" ",microtime());
         $genau = doubleval($msfeld[0]) + doubleval($msfeld[1]);
         echo "$genau<br>";
      }
?>
</body></html>
