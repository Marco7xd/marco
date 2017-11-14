<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   function ausgabe($x)
   {
      $ergebnis = "";
      foreach($x as $element)
         $ergebnis .= "$element ";
      return "$ergebnis<br> <br>";
   }

   $st = array("Berlin", "Rom");
   echo ausgabe($st);

   array_push($st, "Madrid", "Amsterdam");
   echo "array_push():<br>" . ausgabe($st);

   $x = array_pop($st);
   echo "array_pop():<br>Entfernt: $x<br>" . ausgabe($st);

   array_unshift($st, "Paris", "London");
   echo "array_unshift():<br>" . ausgabe($st);

   $x = array_shift($st);
   echo "array_shift():<br>Entfernt: $x<br>" . ausgabe($st);
?>
</body></html>
