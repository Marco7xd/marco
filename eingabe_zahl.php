<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php 
   $w1 = doubleval($_POST["w1"]);
   $w2 = doubleval($_POST["w2"]);
   $erg = $w1 + $w2;
   echo "Die Summe von $w1 und $w2 ist $erg";
?>
</body></html>