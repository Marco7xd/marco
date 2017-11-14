<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
/* Einlesen der Datei in ein Objekt */
$sammlung = simplexml_load_file("xml_mehrere.xml");

/* Ausgabe der Objektdaten, Variante 1 */
foreach ($sammlung->fahrzeug as $fz)
{
   echo "Marke: $fz->marke<br>";
   echo "Typ: $fz->typ<br>";
   echo "Motordaten:<br>";
   echo "--- Leistung: " . $fz->motordaten->leistung . "<br>";
   echo "--- Hubraum: " . $fz->motordaten->hubraum . "<br>";
   echo "Gewicht: $fz->gewicht<br>";
   echo "Reifen: " . $fz->reifen[0] . "<br>";
   echo "Reifen: " . $fz->reifen[1] . "<br><br>";
}

/* Ausgabe der Objektdaten, Variante 2 */
for($i=0; $i<count($sammlung); $i++)
{
   echo "Marke: " . $sammlung->fahrzeug[$i]->marke . "<br>";
   echo "Typ: " . $sammlung->fahrzeug[$i]->typ . "<br>";
   echo "Motordaten:<br>";
   echo "--- Leistung: "
      . $sammlung->fahrzeug[$i]->motordaten->leistung . "<br>";
   echo "--- Hubraum: "
      . $sammlung->fahrzeug[$i]->motordaten->hubraum . "<br>";
   echo "Gewicht: " . $sammlung->fahrzeug[$i]->gewicht . "<br>";
   echo "Reifen: " . $sammlung->fahrzeug[$i]->reifen[0] . "<br>";
   echo "Reifen: "
      . $sammlung->fahrzeug[$i]->reifen[1] . "<br><br>";
}
?>
</body></html>
