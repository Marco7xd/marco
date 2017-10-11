<?php
   /* Vor Beenden der Session wieder aufnehmen */
   session_start();

   /* Beenden der Session */
   session_destroy();
   $_SESSION = array();
?>
<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<h3>Login-Seite</h3>
<form action="sc_schutz_b.php" method="post">
   <p><input name="n"> Name</p>
   <p><input type="password" name="p"> Passwort</p>
   <p><input type="submit" value="Login"></p>
</form>
</body></html>
