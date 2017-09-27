<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $liter = doubleval($_POST["liter"]);
   switch($_POST["sorte"])
   {
      case "N":
         $zahlung = $liter * 1.35;
         echo "$liter Liter Normal kosten $zahlung &euro;";
         break;
      case "S":
         $zahlung = $liter * 1.4;
         echo "$liter Liter Super kosten $zahlung &euro;";
         break;
      case "D":
         $zahlung = $liter * 1.35;
         echo "$liter Liter Diesel kosten $zahlung &euro;";
         break;
      default:
         echo "Als Sorte nur N, S oder D eingeben!";
    }
?>
</body></html>
