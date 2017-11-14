<!DOCTYPE html><html><head><meta charset="utf-8"></head><body><table><tr>
<?php
   for ($i=32; $i<=127; $i++)
   {
      echo "<td align='right'>$i:</td><td><b>"
         . chr($i) . "</b></td>";
      if($i%8 == 7 && $i < 127) echo "</tr><tr>";
   }
?>
</tr></table></body></html>
