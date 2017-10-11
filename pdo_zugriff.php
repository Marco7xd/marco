<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
foreach(PDO::getAvailableDrivers() as $treiber)
   echo "$treiber<br>";
echo "<br>";

/* $con = new PDO("mysql:host=localhost;dbname=firma",
      "root", "rooter"); */
$con = new PDO("sqlite:sq3.db");

// $db = $_SERVER["DOCUMENT_ROOT"] . "/firma.mdb";
/* $con = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)}; "
   . "DBQ=$db; Uid=; Pwd=;"); */

$con->exec("UPDATE personen SET gehalt = gehalt * 1.05");
$res = $con->query("SELECT name, gehalt "
   . "FROM personen ORDER BY name");
foreach($res as $dsatz)
   echo $dsatz["name"] . ", " . $dsatz["gehalt"] . "<br>";
echo "<br>";

$con->exec("UPDATE personen SET gehalt = gehalt / 1.05");
$res = $con->query("SELECT name, gehalt "
   . "FROM personen ORDER BY name");
foreach($res as $dsatz)
   echo $dsatz["name"] . ", " . $dsatz["gehalt"] . "<br>";
?>
</body></html>
