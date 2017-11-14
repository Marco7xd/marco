<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
$test = "hallo welt";
echo "<p>Umwandlungsfunktionen:</p>";
echo "<p>Original: $test<br>";
echo "Anzahl Zeichen, strlen(): " . strlen($test) . "<br>";
echo "Alles klein, strtolower(): " . strtolower($test) . "<br>";
echo "Alles gross, strtoupper(): " . strtoupper($test) . "<br>";
echo "Erstes Zeichen gross, ucfirst(): "
   . ucfirst($test) . "<br>";
echo "Erstes Zeichen jedes Worts gross, ucwords(): "
   . ucwords($test) . "<br>";
echo "Umdrehen, strrev(): " . strrev($test) . "<br>";
echo "Alle 'a' und 'o' ersetzt durch 'A' und 'O', strtr(): "
   . strtr($test,"ao", "AO") . "<br>";
echo "Alle 'hallo' ersetzt durch 'hi', strreplace(): "
   . str_replace("hallo","hi",$test) . "</p>";
?>
</body></html>
