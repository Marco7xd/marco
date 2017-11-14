<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   if(!file_exists("daten.txt"))
      exit("Datei konnte nicht gefunden werden");

   $fp = @fopen("daten.txt","r");
   if(!$fp)
      exit("Datei steht nicht zum Lesen bereit");

   while(!feof($fp))
   {
      $zeile = fgets($fp, 100);
      while(ord(substr($zeile, strlen($zeile)-1)) == 13
            || ord(substr($zeile, strlen($zeile)-1)) == 10)
         $zeile = substr($zeile, 0, strlen($zeile)-1);
      if(!(feof($fp) && $zeile == ""))
         echo "|$zeile|<br>";
   }
   fclose($fp);
?>
</body></html>
