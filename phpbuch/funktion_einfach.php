<!DOCTYPE html><html><head><meta charset="utf-8">
<?php
   function trennstrich()
   {
      echo "<br>";
      for ($i=1; $i<=40; $i=$i+1)
         echo "-";
      echo "<br>";
   }
?>
</head>
<body>
<?php
   trennstrich();
   echo "Dies ist ein Programm,";
   trennstrich();
   echo "in dem mehrmals";
   trennstrich();
   echo "eine Funktion verwendet wird,";
   trennstrich();
   echo "die zu Beginn definiert wurde";
   trennstrich();
?>
</body></html>
