<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   function volumen($laenge, $breite=1, $hoehe=1)
   {
      return $laenge * $breite * $hoehe;
   }
   
   echo volumen(2, 4, 0.6) . "<br>";
   echo volumen(3.5, 2) . "<br>";
   echo volumen(5);
?>
</body></html>
