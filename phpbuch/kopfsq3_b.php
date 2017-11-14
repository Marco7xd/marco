<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
  include "kopfsq3_spiel.inc.php";
  include "kopfsq3_aufgabe.inc.php";
 
  /* Spiel laden */
  $zk = file_get_contents('kopfoop.dat');
  $s = unserialize($zk);

  /* Ergebnis des Spiels */
  $s->auswerten($_POST["eingabe"]);
?>
<!-- Hyperlink zum Anfang -->
<a href="kopfsq3.htm">Zum Start</a></p>

</body></html>
