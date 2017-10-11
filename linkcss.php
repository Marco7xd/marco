<!DOCTYPE html><html>
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="linkcss.css">
</head>
<body>
<?php
   $erg = $_POST["z1"] + $_POST["z2"];
   echo "<p>Summe aus Zahl 1 und Zahl 2: $erg</p>";
?>
<a href="linkcss.htm">Zur erneuten Eingabe</a>
</body></html>
