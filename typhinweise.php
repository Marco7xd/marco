<?php declare(strict_types=1); ?>
<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   echo "Typ int:<br>";
   function addiere(int $a, int $b):int
   {
      $c = $a + $b;
      return $c;
      // return $c * 1.0;
   }
   echo addiere(1, 2) . "<br>";
   // echo addiere(1.9, 2.9) . "<br>";
   echo "Ende des Programms";
?>
</body></html>
