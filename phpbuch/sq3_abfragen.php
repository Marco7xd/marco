<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* Datenbankdatei öffnen bzw. erzeugen */
   $db = new SQLite3("sq3.db");

   /* Abfrage ausführen */
   $res = $db->query("SELECT * FROM personen");

   /* Abfrageergebnis ausgeben */
   while($dsatz = $res->fetchArray(SQLITE3_ASSOC))
   {
      echo $dsatz["name"] . ", "
         . $dsatz["vorname"] . ", "
         . $dsatz["personalnummer"] . ", "
         . $dsatz["gehalt"] . ", "
         . $dsatz["geburtstag"] . "<br>";
   }

   /* Verbindung zur Datenbankdatei wieder lösen */
   $db->close();
?>
</body></html>
