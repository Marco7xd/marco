<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $test = "info@rz.uni-bonn.de";
   echo "<p>Teilzeichenketten:</p>";
   echo "<p>Original: $test<br>";
   echo "1) Ab Zeichen 3 bis Ende, substr(): "
      . substr($test,3) . "<br>";
   echo "2) Ab Zeichen 3, 5 Zeichen, substr(): "
      . substr($test,3,5) . "<br>";
   echo "3) Ab 5.letztem Zeichen bis Ende, substr(): "
      . substr($test,-5) . "<br>";
   echo "4) Ab 5.letztem Zeichen, 2 Zeichen, substr(): "
      . substr($test,-5,2) . "<br>";
   echo "5) Domain inklusive @, strstr(): "
      . strstr($test,"@") . "<br>";
   echo "6) Nur Domain, strstr() und substr(): "
      . substr(strstr($test,"@"),1) . "<br>";
   echo "7) Top Level Domain inklusive Punkt, strrchr(): "
      . strrchr($test,".") . "<br>";
   echo "8) Nur Top Level Domain, strrchr() und substr(): "
      . substr(strrchr($test,"."),1) . "</p>";
?>
</body></html>
