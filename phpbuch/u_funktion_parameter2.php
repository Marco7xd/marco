<!DOCTYPE html><html><head><meta charset="utf-8">
<?php
   function quadrat($zahl)
   {
      $erg = $zahl * $zahl;
      echo "Das Quadrat von $zahl ist $erg<br>";
   }
?>
</head>
<body>
<?php
   quadrat(3);
   quadrat(3.2);
   quadrat(-5);
   quadrat(83373);
?>
</body></html>
