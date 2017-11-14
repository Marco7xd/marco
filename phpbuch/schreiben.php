<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $fp = @fopen("daten.txt","w");
   // $fp = @fopen("daten.txt","a");
   // $fp = @fopen("unter/daten.txt","w");
   // $fp = @fopen("../daten.txt","w");
   // $fp = @fopen("../weitere/daten.txt","w");
   // $fp = @fopen("C:/Temp/daten.txt","w");

   if (!$fp)
      exit("Datei konnte nicht zum Schreiben angelegt werden");

   fputs($fp, "Erste Zeile\n");
   for ($i=10; $i<=30; $i+=10)
      fputs($fp, "$i\n");
   fputs($fp, "Letzte Zeile\n");

   echo "Ausgabe in Datei geschrieben";
   fclose($fp);
?>
</body></html>
