<!DOCTYPE html><html><head><meta charset="utf-8">
<?php
   function mittel($a, $b, $c)
   {
      $mw = ($a + $b + $c) / 3;
      echo "Der Mittelwert von $a, $b"
         . " und $c ist $mw<br>";
   }
?>
</head>
<body>
<?php
   mittel(4,7,6);
   mittel(44,67.5,1);
   mittel(-5,0,-13);
   mittel(1e-3,8.1e-3,3.2e-3);
   $x = 5;
   mittel($x,$x+3,$x-3);
?>
</body></html>
