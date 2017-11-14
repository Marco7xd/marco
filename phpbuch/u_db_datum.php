<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("", "root", "rooter");
   mysqli_select_db($con, "hardware");

   $sql  = "SELECT hersteller, typ, prod, artnummer FROM fp"
      . " WHERE prod >= '2008-01-01' AND prod < '2008-07-01'"
      . " ORDER BY prod";

   $res = mysqli_query($con, $sql);
   $num = mysqli_num_rows($res);
   if($num > 0) echo "Ergebnis:<br>";
   else         echo "Keine Ergebnisse<br>";

   while ($dsatz = mysqli_fetch_assoc($res))
   {
      echo $dsatz["hersteller"] . ", "
         . $dsatz["typ"] . ", "
         . $dsatz["prod"] . ", "
         . $dsatz["artnummer"] . "<br>";
   }

   mysqli_close($con);
?>
</body></html>
