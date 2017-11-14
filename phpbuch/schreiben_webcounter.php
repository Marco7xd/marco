<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   if(file_exists("schreiben_webcounter.txt"))
   {
      /* Kann Datei geöffnet werden? */
      $fp = @fopen("schreiben_webcounter.txt","r");
      if($fp)
      {
         $zahl = fgets($fp,10);
         fclose($fp);
      }
      else
         $zahl = 0;
   }
   else
      $zahl = 0;

   /* Zahl erhöhen */
   $zahl = $zahl + 1;
   echo "Webcounter steht auf $zahl";

   /* neue Zahl schreiben */
   $fp = @fopen("schreiben_webcounter.txt", "w");

   if(!$fp)
      exit("Webcounter kann nicht geschrieben werden");

   fputs($fp,$zahl);
   fclose($fp);
?>
</body></html>
