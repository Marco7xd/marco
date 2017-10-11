<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<table border="1">
<?php
   for ($z=8; $z<=13; $z=$z+1)
   {
      echo "<tr>";
      for ($s=1; $s<=5; $s=$s+1)
         echo "<td align='right'>$z/$s</td>";
      echo "</tr>";
   }
?>
</table>
</body></html>
