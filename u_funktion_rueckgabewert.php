<!DOCTYPE html><html><head><meta charset="utf-8">
<?php
   function bigger($x, $y)
   {
      if ($x > $y)
         $ergebnis = $x;
      else
         $ergebnis = $y;
      return $ergebnis;
   }
?>
</head>
<body>
<?php
   $c = bigger(3,4);
   echo "Maximum: $c<br>";

   $x = 5;
   $c = bigger($x,12);
   echo "Maximum: $c<br>";

   echo "Maximum: " . bigger(13,2);
?>
</body></html>
