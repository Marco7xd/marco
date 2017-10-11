<?php
/* Klasse "Highscore" */
class Highscore
{
   private $con;

   function __construct($spieler, $dauer)
   {
      /* Verbindung zum DB-Server */
      $this->con = mysqli_connect("", "root", "rooter");

      /* Falls keine DB vorhanden:
         DB mit Tabelle erstellen */
      if(!mysqli_select_db($this->con, "kopfzeit"))
      {
         mysqli_query($this->con, "CREATE DATABASE kopfzeit");
         mysqli_select_db($this->con, "kopfzeit");
         mysqli_query($this->con, "CREATE TABLE highscore"
            . " (name VARCHAR(20), zeit DOUBLE)");
      }

      /* Datensatz einfügen */
      mysqli_query($this->con, "INSERT INTO highscore (name, zeit)"
         . " VALUES ('$spieler', $dauer)");

      /* Datensätze anzeigen */
      $this->anzeigen();
   }

   function anzeigen()
   {
      /* Datensätze anzeigen */
      echo "<p><b>Highscore:</b></p>";
      echo "<p><table>";
      echo "<tr><td><b>Name</b></td>"
         . " <td><b>Zeit</b></td></tr>";
      $res = mysqli_query($this->con, "SELECT * FROM highscore"
         . " ORDER BY zeit LIMIT 10");
      while($dsatz = mysqli_fetch_assoc($res))
         echo "<tr><td>" . $dsatz["name"]
            . "</td><td align='right'>" . $dsatz["zeit"]
            . " Sek.</td></tr>";
      echo "</table></p>";
   }

   function __destruct()
   {
      mysqli_close($this->con);
   }
}
?>
