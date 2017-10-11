<!DOCTYPE html><html><head><meta charset="utf-8">
<?php
   function flexloop($von, $bis, $schritt)
   {
      echo "Eine Schleife von $von bis $bis mit"
         ." der Schrittweite $schritt<br>";
      for ($i = $von; $i <= $bis; $i = $i + $schritt)
         echo "$i ";
   }
?>
</head>
<body>
<?php
   echo "<p>Nummer 1:<br>";
   flexloop(5,27,3);

   echo "<p>Nummer 2:<br>";
   flexloop(-10,10,4);

   echo "<p>Nummer 3:<br>";
   $x = 100;
   $y = 200;
   $z = 10;
   flexloop($x,$y,$z);

   echo "<p>Nummer 4:<br>";
   flexloop($x,$y,($y-$x)/8);
?>
</body></html>
