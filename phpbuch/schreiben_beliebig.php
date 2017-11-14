<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   srand((double)microtime()*1000000);

   $fp = @fopen("beliebig.txt","w");
   if(!$fp)
      exit("Datei konnte nicht zum Schreiben angelegt werden");

   for($i=1; $i<=15; $i++)
   {
      $zz = rand(1,30000);
      $zztext = sprintf("%6d",$zz);
      fputs($fp,$zztext);
   }
   fclose($fp);
   echo "15 Daten geschrieben";
?>
</body></html>
