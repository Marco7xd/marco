<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("", "root", "rooter");
   mysqli_select_db($con, "hardware");
   $res = mysqli_query($con, "SELECT * FROM fp");

   while($dsatz = mysqli_fetch_array($res))
   {
      $ax = $dsatz["artnummer"];
      $tab[$ax]["gb"] = $dsatz["gb"];
      $tab[$ax]["preis"] = $dsatz["preis"];
      $tab[$ax]["plv"] = doubleval($dsatz["preis"]) / doubleval($dsatz["gb"]);
   }
   mysqli_close($con);

   echo "<table border='1'>";
   echo "<tr>";
   echo "<td><b>Artikelnummer</b></td>";
   echo "<td><b>GByte</b></td>";
   echo "<td><b>Preis</b></td>";
   echo "<td><b>&euro;/GByte</b></td>";
   echo "</tr>";

   foreach($tab as $dsname=>$dswert)
   {
      echo "<tr>";
      echo "<td>$dsname</td>";
      echo "<td align='right'>" . $tab[$dsname]["gb"] . "</td>";
      echo "<td align='right'>" . $tab[$dsname]["preis"] . "</td>";
      echo "<td align='right'>" . number_format($tab[$dsname]["plv"],2, ",", ".") . "</td>";
      echo "</tr>";
   }
   echo "</table>";
?>
</body></html>
