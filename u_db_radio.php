<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("", "root", "7xd", "hardware");
   $sql = "SELECT hersteller, typ, preis FROM fp WHERE ";

   switch($_POST["geh"])
   {
   	  case 1:
   	     $sql .= "preis <= 120";
   	     break;
   	  case 2:
   	     $sql .= "preis > 120 AND preis <= 140";
   	     break;
   	  case 3:
   	     $sql .= "preis > 140";
   	     break;
   	  
   }
   if (isset($_POST["anp"]))
   {
      $sql .= " ORDER BY preis desc";
   }
   $res = mysqli_query($con, $sql);
   $num = mysqli_num_rows($res);
   if($num > 0) echo "Ergebnis:<br>";
   else         echo "Keine Ergebnisse<br>";


   while ($dsatz = mysqli_fetch_assoc($res))
   	  echo $dsatz["hersteller"] . ", " . $dsatz["typ"] . ", " . $dsatz["preis"] ; 

   mysqli_close($con);

?>
</body></html>