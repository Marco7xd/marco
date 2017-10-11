<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("", "root", "rooter");
   mysqli_select_db($con, "hardware");

   $sql  = "SELECT * FROM fp WHERE gb > 60 AND"
      . " preis < 150 ORDER BY gb DESC";

   $res = mysqli_query($con, $sql);
   $num = mysqli_num_rows($res);
   if($num > 0) echo "Ergebnis:<br>";
   else         echo "Keine Ergebnisse<br>";

   while ($dsatz = mysqli_fetch_assoc($res))
   {
      echo $dsatz["hersteller"] . ", "
         . $dsatz["typ"] . ", "
         . $dsatz["gb"] . ", "
         . $dsatz["preis"] . ", "
         . $dsatz["prod"] . ", "
         . $dsatz["artnummer"] . "<br>";
   }

   mysqli_close($con);
?>
</body></html>
