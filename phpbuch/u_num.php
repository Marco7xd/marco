<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
if(!file_exists("u_num.txt"))
   exit("Datei konnte nicht gefunden werden");

$fp = @fopen("u_num.txt", "r");
if(!$fp)
   exit("Datei steht nicht zum Lesen bereit");

/* Alle Altersangaben in einem Feld speichern
   Zeilenende hat keine Auswirkungen auf doubleval() */
$mit = array();
while(!feof($fp))
{
   $zeile = fgets($fp, 100);
   $zeile = fgets($fp, 100);
   /* echo "|$zeile|<br>"; */
   if(!(feof($fp) && $zeile == ""))
      array_push($mit, doubleval($zeile));
}
fclose($fp);

/* Werte zählen */
$cjung = 0;
$calt = 0;
foreach($mit as $element)
{
   if($element < 25) $cjung++;
   if($element > 50) $calt++;
}

// Ausgabe
if(count($mit) > 0)
{
   $anteiljung = $cjung / count($mit) * 100;
   $ausgabe = number_format($anteiljung, 1, ",", ".");
   echo "Unterhalb von 25 Jahren: $ausgabe%<br>";

   $anteilalt = $calt / count($mit) * 100;
   $ausgabe = number_format($anteilalt, 1, ",", ".");
   echo "Oberhalb von 50 Jahren: $ausgabe%<br>";
}
else
   echo "Die Datei beinhaltete keine Werte";
?>
</body></html>
