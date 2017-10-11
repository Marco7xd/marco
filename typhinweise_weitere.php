<?php declare(strict_types=1); ?>
<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   echo "Typ float: <br>";
   function addiereFloat(float $a, float $b):float
   {
      $c = $a + $b;
      return $c;
   }
   echo addiereFloat(1.9, 2.9) . "<br>";
   echo addiereFloat(1, 2) . "<br>";
   // echo addiereFloat("1.9", 2.9) . "<br>";

   echo "Typ bool: ";
   function oder(bool $a, bool $b):bool
   {
      $c = $a || $b;
      return $c;
   }
   echo oder(true, false) . "<br>";
   // echo oder(1, "abc") . "<br>";

   echo "Typ string: ";
   function verkette(string $a, string $b):string
   {
      $c = $a . $b;
      return $c;
   }
   echo verkette("Hallo", "Welt") . "<br>";
   // echo verkette(5, 8.2) . "<br>";

   echo "Vordefinierte Funktionen: ";
   echo strlen("Hallo") . "<br>";
   // echo strlen(123) . "<br>";
   echo "Ende des Programms";
?>
</body></html>
