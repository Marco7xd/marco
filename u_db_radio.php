<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("", "root", "rooter");
   mysqli_select_db($con, "hardware");

   $sql = "SELECT hersteller, typ, preis FROM fp WHERE ";
   switch($_POST["pr"])
   {
      case 1:
         $sql .= "preis <= 120";
         break;
      case 2:
         $sql .= "preis > 120 AND preis <= 140";
         break;
      case 3:
         $sql .= "preis > 140";
   }

   if (isset($_POST["prsort"]))
      $sql .= " ORDER BY preis DESC";

   $res = mysqli_query($con, $sql);
   $num = mysqli_num_rows($res);
   if($num > 0) echo "Ergebnis:<br>";
   else         echo "Keine Ergebnisse<br>";

   while ($dsatz = mysqli_fetch_assoc($res))
   {
      echo $dsatz["hersteller"] . ", "
         . $dsatz["typ"] . ", "
         . $dsatz["preis"] . " &euro;<br>";
   }

   mysqli_close($con);
?>

</body></html>
