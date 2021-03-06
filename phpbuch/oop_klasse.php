﻿<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
/* Definition der Klasse Fahrzeug */
class Fahrzeug
{
   private $geschwindigkeit = 0;     /* Eigenschaft */

   function beschleunigen($wert)     /* Methode */
   {
      $this->geschwindigkeit += $wert;
   }

   function ausgabe()                /* Methode */
   {
      echo "Geschwindigkeit: $this->geschwindigkeit<br>";
   }
}

/* Objekte der Klasse Fahrzeug erzeugen */
$vespa = new Fahrzeug();
$scania = new Fahrzeug();

/* Erstes Objekt betrachten bzw. verändern */
$vespa->ausgabe();
$vespa->beschleunigen(20);
$vespa->ausgabe();

/* Zweites Objekt betrachten */
$scania->ausgabe();

/* Private Eigenschaft, nicht erreichbar */
echo "Private Eigenschaft: $scania->geschwindigkeit";
?>
</body></html>
