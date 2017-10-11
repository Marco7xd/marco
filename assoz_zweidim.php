<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* Die Informationen werden aus der Datenbank geholt */
   $con = mysqli_connect("", "root", "rooter");
   mysqli_select_db($con, "firma");
   $res = mysqli_query($con, "SELECT * FROM personen");

   /* Die Datensätze werden einzeln gelesen */
   while($dsatz = mysqli_fetch_assoc($res))
   {
      /* Der Schlüssel wird ermittelt, als Zeichenkette */
      $ax = $dsatz["personalnummer"];

      /* Die Informationen aus dem Datensatz werden
         über den Schlüssel gespeichert */
      $tab[$ax]["name"] = $dsatz["name"];
      $tab[$ax]["vorname"] = $dsatz["vorname"];
      $tab[$ax]["gehalt"] = $dsatz["gehalt"];
   }
   mysqli_close($con);

   /* Alle Datensätze werden mit allen Inhalten angezeigt */
   echo "<table border='1'>";
   foreach($tab as $dsname=>$dswert)
   {
      echo "<tr>";
      /* Der Schlüssel wird ausgegeben */
      echo "<td>$dsname:</td>";

      /* Die Infos aus dem Datensatz werden ausgegeben */
      foreach($dswert as $name=>$wert)
         echo "<td>$wert</td>";
      echo "</tr>";
   }
   echo "</table>";

   /* Einzelne Beispielinformationen werden angezeigt */
   echo "<p>";
   echo $tab["2297"]["name"] . "<br>";
   echo $tab["6715"]["vorname"] . "<br>";    // Schlüssel unbekannt
   echo $tab["6714"]["gehalt"] . "</p>";
?>
</body></html>
