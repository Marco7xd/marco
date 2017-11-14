<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $preis = 1.02;

   if ($preis < 1)
   {
      echo "Der Preis liegt unter 1 &euro;<br>";
      echo "Das ist billig";
   }
   else
   {
      echo "Der Preis liegt bei 1 &euro; oder mehr<br>";
      echo "Langsam wird es teuer";
   }
?>
</body></html>
