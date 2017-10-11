<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $fp = @fopen("daten.csv","w");
   if (!$fp)
      exit("Datei konnte nicht zum Schreiben angelegt werden");

   fputs($fp, "Maier;Hans;6714;3500;15.03.1962\n");
   fputs($fp, "Schmitz;Peter;81343;3750;12.04.1958\n");
   fputs($fp, "Mertens;Julia;2297;3621,5;30.12.1959\n");

   echo "Ausgabe in CSV-Datei geschrieben";
   fclose($fp);
?>
</body></html>
