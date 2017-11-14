<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* Verbindung aufnehmen */
   $con = mysqli_connect("", "root", "7xd", "rooter");

   /* Datenbank auswählen */
   mysqli_select_db($con, "Blogprojekt");

   /* SQL-Abfrage ausführen */
   $res = mysqli_query($con, "SELECT * FROM personen");

   /* Anzahl Datensätze ermitteln und ausgeben */
   $num = mysqli_num_rows($res);
   if($num > 0) echo "Ergebnis:<br>";
   else         echo "Keine Ergebnisse<br>";

   /* Datensätze aus Ergebnis ermitteln, */
   /* in Array speichern und ausgeben    */
   while ($dsatz = mysqli_fetch_assoc($res))
   {
      echo $dsatz["userid"] . ", "
         . $dsatz["username"] . ", "
         . $dsatz["name"] . ", "
         . $dsatz["vorname"] . ", "
         . $dsatz["email"] . ", "
         . $dsatz["geburtsdatum"] . "<br>";
   }
   
   /* Verbindung schließen */
   mysqli_close($con);
?>
</body></html>
