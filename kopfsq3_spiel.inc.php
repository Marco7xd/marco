<?php
include "kopfsq3_highscore.inc.php";

/* Klasse "Spiel" */
class Spiel
{
   private $richtig;
   private $spieler;
   private $anzahl;
   private $start;
   private $ziel;
   private $startzeit;
   private $aufgabe;

   function __construct($sp, $st, $zi)
   {
      /* Start des Spiels */
      srand((double)microtime()*1000000);
      $this->richtig = 0;
      $this->anzahl = 5;
      $this->spieler = $sp;
      $this->start = $st;
      $this->ziel = $zi;

      /* Startzeit messen */
      $msfeld = explode(" ",microtime());
      $this->startzeit = doubleval($msfeld[0])
         + doubleval($msfeld[1]);
   }

   function anzeigen()
   {
      /* Überschrift */
      echo "<p><b>Kopfrechnen</b></p>";

      /* Falls kein Name eingetragen */
      if($this->spieler == "")
      {
         echo "<p>Kein Name, kein Spiel</p>";
         echo "<a href='$this->start'>Zurück</a>";
         return;
      }

      /* Formularbeginn */
      echo "<form action='$this->ziel' method='post'>";

      /* Spielername */
      echo "<p>Hallo <b>$this->spieler</b>,"
           . " Ihre Aufgaben:</p>";

      /* Tabellenbeginn */
      echo "<table border='0'>";

      /* Aufgaben erzeugen und stellen */
      for($i=1; $i<=$this->anzahl; $i++)
         $this->aufgabe[$i] = new Aufgabe($i, $this->anzahl);

      /* Tabellenende */
      echo "</table>";

      /* Formularende */
      echo "<p><input type='submit' value='Fertig'></p>";
      echo "</form>";
   }

   function speichern()
   {
      $zk = serialize($this);
      file_put_contents('kopfoop.dat', $zk);
   }

   function auswerten($eingabe)
   {
      /* Spieldauer messen */
      $msfeld = explode(" ",microtime());
      $endzeit = doubleval($msfeld[0]) + doubleval($msfeld[1]);
      $this->dauer =
         number_format($endzeit - $this->startzeit, 1, ".", "");

      /* Überschrift */
      echo "<p><b>Kopfrechnen</b></p>";

      /* Spielername */
      echo "<p>Hallo <b>$this->spieler</b>,"
           . " Ihr Ergebnis:</p>";

      /* Auswertung */
      for($i=1; $i<=$this->anzahl; $i++)
         $this->richtig +=
            $this->aufgabe[$i]->pruefen($eingabe[$i]);

      /* Ausgabe */
      echo "<p>$this->richtig von $this->anzahl richtig"
        . " in $this->dauer Sek.</p>";

      /* Falls alles richtig: Highscore speichern in DB,
         Highscore anzeigen */
      if($this->richtig == $this->anzahl)
         new Highscore($this->spieler, $this->dauer);
   }
}
?>
