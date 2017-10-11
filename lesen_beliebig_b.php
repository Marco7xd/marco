<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $fp = @fopen("beliebig.txt","r");
   if (!$fp)
      exit("Datei konnte nicht zum Lesen geöffnet werden<p>");

   fseek($fp, ($_POST["nummer"]-1)*6, SEEK_SET);
   $wert = fgets($fp,7);
   fclose($fp);

   echo "Datensatz " . $_POST["nummer"] . ", Wert: $wert";
?>
</body></html>
