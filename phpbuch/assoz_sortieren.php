<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   function ausgabe($x)
   {
      $ergebnis = "";
      foreach($x as $name=>$wert)
         $ergebnis .= "$name: $wert &nbsp; ";
      return $ergebnis;
   }

   $tp["Mo"] = 17.5; $tp["Di"] = 19.2; $tp["Mi"] = 21.8;
   $tp["Do"] = 21.6; $tp["Fr"] = 17.5; $tp["Sa"] = 20.2;
   $tp["So"] = 16.6;

   echo ausgabe($tp) . "unsortiert<br>";

   asort($tp);
   echo ausgabe($tp) . "aufsteigend nach Werten<br>";

   arsort($tp);
   echo ausgabe($tp) . "absteigend nach Werten<br>";

   ksort($tp);
   echo ausgabe($tp) . "aufsteigend nach Schlüsseln<br>";

   krsort($tp);
   echo ausgabe($tp) . "absteigend nach Schlüsseln<br>";
?>
</table>
</body></html>
