<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
/* Einlesen der Datei in ein Objekt */
$fahrzeug = simplexml_load_file("xml_einzel.xml");

/* Ausgabe der Objektdaten */
echo "Marke: $fahrzeug->marke<br>";
echo "Typ: $fahrzeug->typ<br>";
echo "Motordaten:<br>";
echo "--- Leistung: " . $fahrzeug->motordaten->leistung . "<br>";
echo "--- Hubraum: " . $fahrzeug->motordaten->hubraum . "<br>";
echo "Gewicht: $fahrzeug->gewicht";
?>
</body></html>
