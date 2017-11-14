<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   switch($_POST["sorte"])
   {
      case "N":
         $zahlung = $_POST["liter"] * 1.35;
         echo $_POST["liter"] . " L Normal kosten $zahlung &euro;";
         break;
      case "S":
         $zahlung = $_POST["liter"] * 1.4;
         echo $_POST["liter"] . " L Super kosten $zahlung &euro;";
         break;
      case "D":
         $zahlung = $_POST["liter"] * 1.1;
         echo $_POST["liter"] . " L Diesel kosten $zahlung &euro;";
         break;
      default:
         echo "Als Sorte nur N, S oder D eingeben!";
   }
?>
</body></html>
