<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
/* Dokumentbeginn */
echo "<p><b>Kopfrechnen</b></p>";

/* Spielername */
echo "<p>Hallo <b>" . $_POST["spielername"]
   . "</b>, Ihr Ergebnis</p>";

/* Auswertung */
$richtig = 0;
for($i=0; $i<5; $i++)
   if($_POST["ein"][$i] == $_POST["erg"][$i])
      $richtig ++;

/* Ausgabe */
echo "<p>$richtig von 5 richtig</p>";

?>
<!-- Hyperlink zum Anfang -->
<p><a href="kopf.htm">Zum Start</a></p>

</body></html>
