<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
class Fahrzeug
{
   private $geschwindigkeit;
   private $bezeichnung;

   function __construct($bez, $ge)
   {
      $this->bezeichnung = $bez;
      $this->geschwindigkeit = $ge;
   }

   function beschleunigen($wert)
   {
      $this->geschwindigkeit += $wert;
   }

   function __toString()
   {
      return "$this->bezeichnung, "
         . "$this->geschwindigkeit km/h<br>";
   }

   function __clone()
   {
      $this->bezeichnung = "Klon von: " . $this->bezeichnung;
      $this->geschwindigkeit = $this->geschwindigkeit + 1;
   }

   static function kopieVon($ori)
   {
      $neu = new Fahrzeug();
      $neu->bezeichnung = "Kopie von: " . $ori->bezeichnung;
      $neu->geschwindigkeit = $ori->geschwindigkeit + 1;
      return $neu;
   }
}

/* Originalobjekt */
$vespa = new Fahrzeug("Vespa Piaggio", 25);

/* Zweite Referenz auf Originalobjekt */
$suzuki = $vespa;

/* Klonen eines Objekts */
$yamaha = clone $vespa;

/* Übergabe von Objekt an Methode,
   Rückgabe von Objekt aus Methode */
$honda = Fahrzeug::kopieVon($vespa);

/* Auswirkung auf zweite Referenz */
$vespa->beschleunigen(50);
echo $suzuki;

/* Ausgabe des Klons */
echo $yamaha;

/* Änderung und Ausgabe der Kopie */
$honda->beschleunigen(30);
echo $honda;
?>
</body></html>
