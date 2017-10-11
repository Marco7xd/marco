<!DOCTYPE html><html><head><meta charset="utf-8">
<?php
   function vtauschen($a, $b)
   {
      $temp = $a;
      $a = $b;
      $b = $temp;
   }

   function rtauschen(&$a, &$b)
   {
      $temp = $a;
      $a = $b;
      $b = $temp;
   }
?>
</head>
<body>
<?php
   $x = 12;   $y = 18;
   echo "<p>Per Kopie, vorher: $x, $y<br>";
   vtauschen($x,$y);
   echo "Per Kopie, nachher: $x, $y</p>";

   $x = 12;   $y = 18;
   echo "<p>Per Referenz, vorher: $x, $y<br>";
   rtauschen($x,$y);
   echo "Per Referenz, nachher: $x, $y</p>";
?>
</body></html>
