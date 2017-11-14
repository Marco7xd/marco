<!DOCTYPE html><html><head><meta charset="utf-8"></head>
<body>
<?php
  include "kopfoop_spiel.inc.php";
  include "kopfoop_aufgabe.inc.php";
 
  /* Spiel laden */
  $zk = file_get_contents("kopfoop.dat");
  $s = unserialize($zk);

  /* Ergebnis des Spiels */
  $s->auswerten($_POST["eingabe"]);
?>
<!-- Hyperlink zum Anfang -->
<a href="kopfoop.htm">Zum Start</a></p>

</body>
</html>
