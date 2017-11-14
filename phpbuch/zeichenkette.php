<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $liter = 14;
   $preis = 1.35;
   $zahlung = $liter * $preis;
   $einheit1 = "Liter";
   $einheit2 = 'Euro';

   $gesamt = "<p>" . $liter . " " . $einheit1;
   $gesamt .= " kosten " . $zahlung . " " . $einheit2 . "</p>";
   echo $gesamt;
   echo "<p>$liter $einheit1 kosten $zahlung $einheit2</p>";
   echo '<p>$liter $einheit1 kosten $zahlung $einheit2</p>';
?>
</body></html>
