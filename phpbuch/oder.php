<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   if ($_POST["pw"] == "bingo" || $_POST["pw"] == "kuckuck")
      echo "Zugang gestattet";
   else
      echo "Zugang verweigert";
?>
</body></html>
