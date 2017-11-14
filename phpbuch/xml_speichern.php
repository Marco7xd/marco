<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
/* Einlesen der Datei in ein Objekt, Teilausgabe */
$fahrzeug = simplexml_load_file("xml_speichern.xml");
echo "<p>Gewicht: " . $fahrzeug->gewicht . "</p>";

/* Ändern von Teildaten, Dateiausgabe des Objekts */
$fahrzeug->gewicht ="2200 kg";
file_put_contents("xml_speichern.xml", $fahrzeug->asXML());

/* Einlesen der Datei in ein Objekt, Teilausgabe */
$fahrzeug = simplexml_load_file("xml_speichern.xml");
echo "<p>Gewicht: " . $fahrzeug->gewicht . "</p>";
?>
</body></html>
