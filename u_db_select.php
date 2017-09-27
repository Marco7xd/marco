<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("", "root", "7xd", "hardware");
   $res = mysqli_query($con, "SELECT * FROM fp");


   //Tabellenbeginn
   echo "<table border='1'>";


   //Überschrift
   echo "<tr> <td>Lfd. Nr.</td> <td>Name</td>";
   echo "<td>Vorname</td> <td>Personalnummer</td>";
   echo "<td>Gehalt</td> <td>Geburtstag</td> </tr>";

   $lf = 1;
   while ($dsatz = mysqli_fetch_assoc($res))
   {
   	 echo "<tr>";
   	 echo "<td>$lf</td>";
   	 echo "<td>" . $dsatz["hersteller"] . "</td>";
   	 echo "<td>" . $dsatz["Typ"] . "</td>";
   	 echo "<td>" . $dsatz["GB"] . "</td>";
   	 echo "<td>" . $dsatz["Preis"] . "</td>";
   	 echo "<td>" . $dsatz["Artnr."] . "</td>";
       echo "<td>" . $dsatz["Datum..."] . "</td>";
   	 echo "</tr>";
   	 $lf = $lf + 1;
   }

   // Tabellenende
   echo "</table>";

   mysqli_close($con);
?>
</body></html>