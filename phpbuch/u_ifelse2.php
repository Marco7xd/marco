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

   if ($_POST["liter"] >= 100)
      $zahlung = $zahlung * 0.98;
   echo $_POST["liter"] . " Liter $text kosten $zahlung &euro;";
?>
</body></html>