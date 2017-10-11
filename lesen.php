<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $fp = @fopen("daten.txt","r");
   while(!feof($fp))
   {
      $zeile = fgets($fp, 100);
      echo "|$zeile|<br>";
   }
   fclose($fp);
?>
</body></html>
