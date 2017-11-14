<?php
   /* Falls Cookie vorhanden */
   if (isset($_COOKIE["Besuch"])) $neu = 0;
   else                           $neu = 1;
   setcookie("Besuch", "1", time() + 86400);
?>
<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<h3>Cookies</h3>
<?php
   /* Falls erster Besuch */
   if ($neu==1)
      echo "<p>Sie waren noch nicht hier<br>"
         . "oder Sie speichern keine Cookies.</p>";
   else
      echo "<p>Sie waren schon einmal hier.</p>";
?>
</body></html>
