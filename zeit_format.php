<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $jetzt = time();

   /* strftime */
   echo "<p>Formatiert mit strftime():<br>";
   echo strftime("%d.%m.%Y %H:%M:%S",$jetzt) . "<br>";
   echo strftime("%j.",$jetzt) . " Tag des Jahres<br>";
   setlocale(LC_ALL, "german");
   echo strftime("%A, %d.%B",$jetzt) . "</p>";

   /* date */
   echo "<p>Formatiert mit date():<br>";
   echo date("d.m.Y H:i:s",$jetzt) . "<br>";
   echo intval(date("z",$jetzt))+1 . ". Tag des Jahres<br>";
   echo date("W",$jetzt) . ". Kalenderwoche<br>";
   
   /* Feld mit deutschen Wochentagen */
   $wtag = array("Sonntag","Montag","Dienstag", "Mittwoch",
      "Donnerstag","Freitag","Samstag");
   $wt = intval(date("w",$jetzt));
   echo "$wtag[$wt]</p>";
?>
</body></html>
