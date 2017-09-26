<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("" , "root", "7xd", "hardware");
   $sql  = "SELECT hersteller, typ , prod , artnummer FROM fp"
      . " WHERE prod <= '2008-06-15'"
      . " ORDER BY prod <='2008-03-15' DESC";
   $res = mysqli_query($con, $sql);
   $num = mysqli_num_rows($res);
   if($num > 0) echo "ergebnis: <br>";
   else         echo "Keine Ergebnisse<br>";
   while ($dsatz = mysqli_fetch_assoc($res))
   	  echo $dsatz["hersteller"] . ", " . $dsatz["typ"] . ", " . $dsatz["prod"] . ", " . $dsatz["artnummer"] . "<br>";
   mysqli_close($con);

?>
</body></html>