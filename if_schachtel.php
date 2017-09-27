<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $preis = 1.12;

   if ($preis < 1)
   {
   	echo "Unter 1 &euro;<br>";
   	echo "Das ist billig";
   }

   else
   {
   	  if($preis <= 1.2)
   	  {
   	  	echo "Zwischen 1 &euro; und 1.20 &euro;<br>";
   	  	echo "Langsam wird es teuer"
   	  }
   	  else
   	  {
   	  	echo "Mehr als 1.20 &euro;<br>";
   	  	echo "Das is viel zu teuer";
   	  }
   }
?>
</body></html>