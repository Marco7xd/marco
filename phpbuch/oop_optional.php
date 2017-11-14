<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
/* Definition der Klasse Fahrzeug */
class Fahrzeug
{
   private $geschwindigkeit;
   private $bezeichnung;

   /* Konstruktor mit optionalen Parametern */
   function __construct($bez = "xxx", $ge = 0)
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
      return "Name: $this->bezeichnung, Geschwindigkeit:"
         . " $this->geschwindigkeit km/h<br>";
   }
}

/* Objekte der Klasse Fahrzeug erzeugen */
$vespa = new Fahrzeug("Vespa Piaggio");
$scania = new Fahrzeug("",62);
$jeep = new Fahrzeug("Jeep Cherokee",45);
$hyundai = new Fahrzeug();

/* Objekte betrachten */
echo $vespa;
echo $scania;
echo $jeep;
echo $hyundai;
?>
</body></html>
