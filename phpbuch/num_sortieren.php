<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* Erzeugen und unsortiert ausgeben */
   $tp = array(17.5, 19.2, 21.8, 21.6, 20.2, 16.6);
   foreach($tp as $element)
      echo "$element &nbsp; ";
   echo " unsortiert<br>";

   /* Aufsteigend sortieren und ausgeben */
   sort($tp);
   foreach($tp as $element)
      echo "$element &nbsp; ";
   echo "aufsteigend sortiert<br>";

   /* Absteigend sortieren und ausgeben */
   rsort($tp);
   foreach($tp as $element)
      echo "$element &nbsp; ";
   echo "absteigend sortiert";
?>
</body></html>
