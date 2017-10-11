<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
  include "kopfzeit_spiel.inc.php";
  include "kopfzeit_aufgabe.inc.php";
 
  /* Spiel laden */
  $zk = file_get_contents("kopfoop.dat");
  $s = unserialize($zk);

  /* Ergebnis des Spiels */
  $s->auswerten($_POST["eingabe"]);
?>
<!-- Hyperlink zum Anfang -->
<a href="kopfzeit.htm">Zum Start</a></p>

</body></html>
