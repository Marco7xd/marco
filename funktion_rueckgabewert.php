<!DOCTYPE html><html><head><meta charset="utf-8">
<?php
   function add($z1, $z2)
   {
      $summe = $z1 + $z2;
      return $summe;
   }
?>
</head>
<body>
<?php
   $c = add(3,4);     /* Aufruf und Zuweisung */
   echo "Summe: $c<br>";

   $x = 5;
   $c = add($x,12);   /* Aufruf und Zuweisung */
   echo "Summe: $c<br>";

   /* Aufruf innerhalb der Ausgabe */
   echo "Summe: " . add(13,2) . "<br>";

   /* Aufruf in Zeichenkette, falsch! */
   echo "Summe: add(13,2)";
?>
</body></html>
