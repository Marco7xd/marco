<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   if(!file_exists("daten.csv"))
      exit("Datei konnte nicht gefunden werden");

   $fp = @fopen("daten.csv","r");
   if(!$fp)
      exit("Datei steht nicht zum Lesen bereit");

   while(!feof($fp))
   {
      $zeile = fgets($fp, 100);
      while(ord(substr($zeile, strlen($zeile)-1)) == 13
            || ord(substr($zeile, strlen($zeile)-1)) == 10)
         $zeile = substr($zeile, 0, strlen($zeile)-1);
      if(!(feof($fp) && $zeile == ""))
      {
         $worte = explode(";", $zeile);
         for($i=0; $i<count($worte); $i++)
            echo "$i:|$worte[$i]| ";
         echo "<br>";
      }
   }
   fclose($fp);
?>
</body></html>
