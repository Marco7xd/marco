<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("" , "root", "7xd", "Firma");
   $sql  = "SELECT name, gehalt FROM personen"
      . " WHERE gehalt >= 3000 AND gehalt <= 3700"
      . " ORDER BY gehalt DESC";
   $res = mysqli_query($con, $sql);
   $num = mysqli_num_rows($res);
   if($num > 0) echo "ergebnis: <br>";
   else         echo "Keine Ergebnisse<br>";
   while ($dsatz = mysqli_fetch_assoc($res))
   	  echo $dsatz["name"] . ", " . $dsatz["gehalt"] . "<br>";
   mysqli_close($con);

?>
</body></html>