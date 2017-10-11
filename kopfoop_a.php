<!DOCTYPE html><html><head><meta charset="utf-8"></head>
<body>
<?php
  include "kopfoop_spiel.inc.php";
  include "kopfoop_aufgabe.inc.php";
  
  /* Spiel erzeugen */
  $s = new Spiel($_POST["spielername"],
     $_POST["anzahl"], "kopfoop.htm", "kopfoop_b.php");

  /* Spiel darstellen */
  $s->anzeigen();

  /* Spieldaten speichern */
  $s->speichern();
?>
</body>
</html>
