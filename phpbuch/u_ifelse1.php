<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   if ($_POST["sorte"] == "N")
   {
      $zahlung = $_POST["liter"] * 1.35;
      $text = "Normal";
   }
   else
   {
      $zahlung = $_POST["liter"] * 1.40;
      $text = "Super";
   }
   echo $_POST["liter"] . " Liter $text kosten $zahlung &euro;";
?>
</body></html>
