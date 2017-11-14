<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   echo "<p><b>Seite bitte mehrmals neu laden</b></p>";

   srand((double)microtime()*1000000);
   echo "<p>3 Zufallszahlen mit rand():<br>";
   echo "(von 0 bis " . getrandmax() . ")<br>";
   for ($i=1; $i<=3; $i++)
      echo rand() . " &nbsp; ";
   echo "</p>";

   echo "<p>3 Zufallszahlen mit random_int():<br>";
   echo "(von " . number_format(PHP_INT_MIN,0,",",".") . " bis "
	   . number_format(PHP_INT_MAX,0,",",".") . ")<br>";
   for ($i=1; $i<=3; $i++)
      echo number_format(random_int(
         PHP_INT_MIN, PHP_INT_MAX),0,",",".") . " &nbsp; ";
   echo "</p>";

   echo "<p>15 Zufallszahlen mit random_int() von 1 bis 49:<br>";
   for ($i=1; $i<=15; $i++)
      echo random_int(1, 49) . " &nbsp;";
   echo "</p>";
?>
</body></html>
