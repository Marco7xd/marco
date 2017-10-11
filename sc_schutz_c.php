<?php
   /* Session wieder aufnehmen */
   session_start();

   /* Kontrolle, ob innerhalb der Session */
   if (!isset($_SESSION["n"]))
      exit("<p>Kein Zugang<br><a href='sc_schutz_a.php'>"
         . "Zum Login</a></p>");
?>
<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<h3>Beliebige Seite</h3>
<?php
   /* Begrüßung des Benutzers */
   echo "<p>Hallo " . $_SESSION["n"] . "</p>";
?>
<p><a href="sc_schutz_b.php">Zur Intro-Seite</a></p>
<p><a href="sc_schutz_a.php">Logoff</a></p>
</body></html>
