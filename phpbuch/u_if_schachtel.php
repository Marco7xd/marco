<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   if ($_POST["sorte"] == "N")
   {
      $zahlung = $_POST["liter"] * 1.35;
      $text = "Normal";
   }
   else
   {
      if ($_POST["sorte"] == "S")
      {
         $zahlung = $_POST["liter"] * 1.40;
         $text = "Super";
      }
      else
      {
         $zahlung = $_POST["liter"] * 1.10;
         $text = "Diesel";
      }
   }
   echo $_POST["liter"] . " Liter $text kosten $zahlung &euro;";
?>
</body></html>
