<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   for($jahr=2013; $jahr<=2021; $jahr++)
   {
      echo "29.02.$jahr";
      if (checkdate(2,29,$jahr)) echo " Datum existiert<br>";
      else                       echo "<br>";
   }
?>
</body></html>
