﻿<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("", "root", "rooter");
   mysqli_select_db($con, "firma");

   $sql  = "SELECT name, vorname FROM personen";
   $sql .= " WHERE name LIKE 'M%' ORDER BY name";

   $res = mysqli_query($con, $sql);
   $num = mysqli_num_rows($res);
   if($num > 0) echo "Ergebnis:<br>";
   else         echo "Keine Ergebnisse<br>";

   while ($dsatz = mysqli_fetch_assoc($res))
      echo $dsatz["name"] . ", " . $dsatz["vorname"] . "<br>";

   mysqli_close($con);
?>
</body></html>
