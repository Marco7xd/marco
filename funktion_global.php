<!DOCTYPE html><html><head><meta charset="utf-8">
<?php
   function summiere()
   {
      echo "Variable z: $z<br>";
      global $x;
      $y = 35;
      $z = $x + $y;
      echo "Variable z: $z<br>";
   }
?>
</head>
<body>
<?php
   $x = 6;
   $y = 52;
   $z = $x + $y;
   summiere();
   echo "Variable z: $z";
?>
</body></html>
