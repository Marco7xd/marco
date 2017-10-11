<!DOCTYPE html><html><head><meta charset="utf-8">
<?php
   function trennstrich($anzahl)
   {
      echo "<br>";
      for ($i=1; $i<=$anzahl; $i=$i+1)
         echo "-";
      echo "<br>";
   }
?>
</head>
<body>
<?php
   trennstrich(30);
   echo "In diesem Programm";
   trennstrich(40);
   echo "sind die Trennstriche";
   $x = 20;
   trennstrich($x);
   echo "unterschiedlich lang";
   trennstrich($x * 3);
?>
</body></html>
