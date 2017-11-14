<!DOCTYPE html><html>
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="linkcss.css">
</head>
<body>
<h2>Seite 1</h2>
<?php
   echo "<p>Name: " . $_POST["ben"] . "<br>";
   echo "Gruppe: " . $_POST["gr"] . "</p>";
   echo "<p><a href='anh_link_b.php?benzwei=" . $_POST["ben"]
      . "&grzwei=" . $_POST["gr"] . "'>Weiter</a></p>";
?>
</body></html>
