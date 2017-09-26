<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("", "root", "7xd", "firma");
   $sql = "SELECT name, gehalt FROM personen WHERE ";

   switch($_POST["geh"])
   {
   	  case 1:
   	     $sql .= "gehalt <= 3000";
   	     break;
   	  case 2:
   	     $sql .= "gehalt > 3000 AND gehalt <= 3500";
   	     break;
   	  case 3:
   	     $sql .= "gehalt > 3500 AND gehalt <= 5000";
   	     break;
   	  case 4:
   	     $sql .= "gehalt > 5000";
   }

   $res = mysqli_query($con, $sql);
   $num = mysqli_num_rows($res);
   if($num > 0) echo "Ergebnis:<br>";
   else         echo "Keine Ergebnisse<br>";


   while ($dsatz = mysqli_fetch_assoc($res))
   	  echo $dsatz["name"] . ", " . $dsatz["gehalt"] . "<br>";

   mysqli_close($con);

?>
</body></html>