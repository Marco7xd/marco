<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php 
   $w1 = doubleval($_POST["w1"]);
   $erg = $w1 * $w1;
   echo "Das Quadrat von $w1 ist $erg";
?>
</body></html>