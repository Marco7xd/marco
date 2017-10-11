<?php
   $t = time() + 60 * 60 * 24 * 365;
   setcookie("nname", $_POST["nname"], $t);
   setcookie("vname", $_POST["vname"], $t);
?>
<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<h3>Daten empfangen</h3>
<p>Ihre Ware wird versandt, 
<?php
   echo $_POST["vname"] . " " . $_POST["nname"];
?>
</p>
</body></html>
