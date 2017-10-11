<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php

/* Erzeugen der Zeichenkette */
$xml_zk = <<< XML
<?xml version="1.0" encoding="utf-8"?>
<fahrzeug>
   <marke>Opel</marke>
   <typ>Astra</typ>
   <motordaten>
      <leistung>70 KW</leistung>
      <hubraum>1600 ccm</hubraum>
   </motordaten>
   <gewicht>1200 kg</gewicht>
</fahrzeug>
XML;

/* Einlesen der Zeichenkette in ein Objekt */
$fahrzeug = simplexml_load_string($xml_zk);

/* Ausgabe der Objektdaten */
echo "Marke: $fahrzeug->marke<br>";
echo "Typ: $fahrzeug->typ<br>";
echo "Motordaten:<br>";
echo "--- Leistung: " . $fahrzeug->motordaten->leistung . "<br>";
echo "--- Hubraum: " . $fahrzeug->motordaten->hubraum . "<br>";
echo "Gewicht: $fahrzeug->gewicht<br>";
?>
</body></html>
