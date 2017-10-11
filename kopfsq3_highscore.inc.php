<?php
/* Klasse "Highscore" */
class Highscore
{
   function __construct($spieler, $dauer)
   {
      /* Falls keine DB vorhanden: DB mit Tabelle erstellen */
      if(!file_exists("kopfsq3.db"))
      {
         $db = new SQLite3("kopfsq3.db");
         $db->exec("CREATE TABLE highscore(name, zeit)");
      }

      /* Falls DB vorhanden: DB öffnen */
      else
         $db = new SQLite3("kopfsq3.db");

      /* Datensatz einfügen */
      $db->query("INSERT INTO highscore (name, zeit)"
         . " VALUES ('$spieler', $dauer)");
      $db->close();

      /* Datensätze anzeigen */
      $this->anzeigen();
   }

   function anzeigen()
   {
      /* Datensätze anzeigen */
      echo "<p><b>Highscore:</b></p>";
      echo "<p><table>";
      echo "<tr><td><b>Name</b></td><td><b>Zeit</b></td></tr>";
      $db = new SQLite3("kopfsq3.db");
      $res = $db->query("SELECT * FROM highscore"
         . " ORDER BY zeit LIMIT 10");
      while($dsatz = $res->fetchArray())
         echo "<tr><td>" . $dsatz["name"]
            . "</td><td align='right'>"
            . $dsatz["zeit"] . " Sek.</td></tr>";
      $db->close();
      echo "</table></p>";
   }
}
?>
