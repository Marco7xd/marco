<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<p>Treffen Sie eine Auswahl:</p>
<form action = "db_loeschen_b.php" method = "post">

<?php
   $con = mysqli_connect("", "root", "rooter");
   mysqli_select_db($con, "firma");

   $res = mysqli_query($con, "SELECT * FROM personen");
   $num = mysqli_num_rows($res);

   // Tabellenbeginn
   echo "<table border='1'>";

   // Überschrift
   echo "<tr> <td>Auswahl</td> <td>Name</td>";
   echo "<td>Vorname</td> <td>P-Nr</td>";
   echo "<td>Gehalt</td> <td>Geburtstag</td> </tr>";

   while ($dsatz = mysqli_fetch_assoc($res))
   {
      echo "<tr>";
      echo "<td><input type='radio' name='auswahl'";
      echo " value='" . $dsatz["personalnummer"] . "'></td>";
      echo "<td>" . $dsatz["name"] . "</td>";
      echo "<td>" . $dsatz["vorname"] . "</td>";
      echo "<td>" . $dsatz["personalnummer"] . "</td>";
      echo "<td>" . $dsatz["gehalt"] . "</td>";
      echo "<td>" . $dsatz["geburtstag"] . "</td>";
      echo "</tr>";
   }

   // Tabellenende
   echo "</table>";
   
   mysqli_close($con);
?>
<p><input type="submit" value="Datensatz entfernen"></p>
</form>
</body></html>
