<?php
   /* Session starten oder wieder aufnehmen */
   session_start();
?>
<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<h3>Kasse</h3>
<?php
   echo "<p>Bitte bezahlen Sie den Gesamteinkaufspreis von ";
   echo number_format($_SESSION["summe"],2,",",".")
      . " &euro;.</p>";
?>
<p>........</p>
<p><a href="sc_shop_a.php">Zur Startseite</a></p>
</body></html>
