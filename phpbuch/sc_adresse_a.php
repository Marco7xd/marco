<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<h3>Ihr Name</h3>
<form action="sc_adresse_b.php" method="post">
<?php
   echo "<p><input name='nname' size='20' value='";
   if(isset($_COOKIE["nname"]))
      echo $_COOKIE["nname"];
   echo "'> Nachname</p>";

   echo "<p><input name='vname' size='20' value='";
   if(isset($_COOKIE["vname"]))
      echo $_COOKIE["vname"];
   echo "'> Vorname</p>";
?>
<p><input type="submit" value="Bestellen"></p>
</form>
</body></html>
