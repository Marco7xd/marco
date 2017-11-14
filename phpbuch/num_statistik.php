<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   if(!file_exists("num_statistik.txt"))
      exit("Datei konnte nicht gefunden werden");

   $fp = @fopen("num_statistik.txt","r");
   if(!$fp)
      exit("Datei steht nicht zum Lesen bereit");

   /* Alle Werte in ein Feld lesen */
   $tp = array();
   while (!feof($fp))
   {
      $zeile = fgets($fp, 100);
      if(!(feof($fp) && $zeile == ""))
         array_push($tp, doubleval($zeile));
   }
   fclose($fp);

   /* Anzahl der Werte oberhalb der Grenze ermitteln */
   $c = 0;
   $grenze = doubleval($_POST["gr"]);
   foreach($tp as $element)
      if($element > $grenze)
         $c++;

   /* Ausgabe */
   if(count($tp) > 0)
   {
      $anteil = $c / count($tp) * 100;
      $ausgabe = number_format($anteil, 2, ",", ".");
      echo "$ausgabe% der Werte liegen oberhalb von $grenze";
   }
   else
      echo "Die Datei beinhaltete keine Werte";
?>
</body></html>
