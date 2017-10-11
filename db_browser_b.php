<!DOCTYPE html><html><head><meta charset="utf-8"></head>
<body>
<?php
   /* Verbindung aufnehmen */
   $con = mysqli_connect("", "root", "rooter");

   /* Datenbank auswählen */
   mysqli_select_db($con, $_POST["dbname"]);

   /* Datensätze ermitteln */
   $dataresult = mysqli_query($con, "SELECT * FROM " . $_POST["tabname"]);

   /* Anzahl der Datensätze ermitteln */
   $numdata = mysqli_num_rows($dataresult);

   /* Überschrift ausgeben */
   echo "<h3>Datenbank " . $_POST["dbname"] . "</h3>";
   echo "<h4>Tabelle " . $_POST["tabname"] . "</h4>";
   echo "<p>$numdata Zeile(n):</p>";

   /* Felder ermitteln */
   $fdresult = mysqli_query($con, "SHOW COLUMNS FROM " . $_POST["tabname"]);

   /* Anzahl der Felder ermitteln */
   $numfds = mysqli_num_rows($fdresult);

   /* Tabelle beginnen, alle Feldnamen ausgeben */
   echo "<table width='100%' border><tr>";
   while($fddsatz = mysqli_fetch_array($fdresult))
      echo "<td bgcolor='#c3c3c3'>$fddsatz[0]</td>";
   echo "</tr>";

   /* Schleife über alle Datensätze */
   while($datadsatz = mysqli_fetch_array($dataresult))
   {
      /* Schleife über alle Felder */
      echo "<tr>";
      for ($f=0; $f<$numfds; $f++)
      {
         /* Feldinhalt ermitteln, ausgeben*/
         $data = $datadsatz[$f];
         if ($data=="") $data = "&nbsp;";
         echo "<td>$data</td>";
      }
      echo "</tr>";
   }

   echo "</table>";
   
   mysqli_close($con);
?>
</body>
</html>
