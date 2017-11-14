<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   echo "<p><b>Wurzel, Potenz, e-Funktion, Logarithmus,"
      . " Konstanten:</b></p>";
   $a = 4.75;
   echo "Variable a: $a <br>";
   echo "&radic;a: " . sqrt($a) . "<br>";
   echo "a<sup>2</sup>: " . pow($a,2) . "<br>";
   echo "a<sup>3</sup>: " . pow($a,3) . "<br>";
   echo "log(a) = Nat. Logarithmus von a: " . log($a) . "<br>";
   echo "e<sup>a</sup> : " . exp($a) . "<br>";
   echo "e<sup>1/a</sup> :" . exp(1/$a) . "<br>";
   echo "log<sub>10</sub>(a), 10er-Logarithmus von a: "
      . log10($a) . "<br>";
   echo "Kreiszahl &pi;: " . M_PI . "<br>";
   echo "Eulersche Zahl e: " . M_E . "<br>";
?>
</body></html>
