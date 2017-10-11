<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $bit0 = 1;           // 0000 0001
   $bit1 = 2;           // 0000 0010
   $bit2 = 4;           // 0000 0100
   $bit3 = 8;           // 0000 1000

   $a = 5;              // 0000 0101
   $erg = $a & $bit2;   // 0000 0100
   echo "Bitweise Und: $erg<br>";

   $erg = 0;            // 0000 0000
   $erg = $erg | $bit0; // 0000 0001
   $erg = $erg | $bit3; // 0000 1001
   echo "Bitweise Oder: $erg<br>";

   $a = 5;              // 0000 0101
   $b = 3;              // 0000 0011
   $erg = $a ^ $b;      // 0000 0110
   echo "Bitweise Exklusiv-Oder: $erg<br>";

   $a = 11;             // ... 0000 1011
   $erg = ~$a;          // ... 1111 0100
   echo "Bitweise Inversion: $erg<br>";

   $a = 11;             // 0000 1011
   $erg = $a >> 1;      // 0000 0101
   echo "Bitweise Schieben nach rechts: $erg<br>";
   $erg = $a << 2;      // 0010 1100
   echo "Bitweise Schieben nach links: $erg<br>";
?>
</body></html>
