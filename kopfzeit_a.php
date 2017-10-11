<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
  include "kopfzeit_spiel.inc.php";
  include "kopfzeit_aufgabe.inc.php";
  
  /* Spiel erzeugen */
  $s = new Spiel($_POST["spielername"],
     "kopfzeit.htm", "kopfzeit_b.php");

  /* Spiel darstellen */
  $s->anzeigen();

  /* Spieldaten speichern */
  $s->speichern();
?>
</body></html>
