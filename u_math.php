<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>

<table border="1">
<tr>
   <td>x</td>
   <td>radiant</td>
   <td>sin</td>
   <td>cos</td>
   <td>&radic;x</td>
   <td>x<sup>2</sup></td>
   <td>log</td>
   <td>log<sub>10</sub></td>
   <td>e<sup>1/x</sup></td>
   <td>dual</td>
   <td>hex</td>
</tr>

<?php
for ($x=15; $x<91; $x=$x+15)
{
   $xb    = deg2rad($x);
   $xbaus = number_format(     $xb, 2, ",", ".");
   $sinus = number_format(sin($xb), 2, ",", ".");
   $cos   = number_format(cos($xb), 2, ",", ".");
   $wurz  = number_format(sqrt($x), 2, ",", ".");
   $quad  = pow($x,2);
   $logn  = number_format(  log($x), 2, ",", ".");
   $log10 = number_format(log10($x), 2, ",", ".");
   $ehoch = number_format(exp(1/$x), 2, ",", ".");
   $bin   = decbin($x);
   $hexa  = dechex($x);

   echo "<tr>";
   echo "<td align='right'>$x</td>";
   echo "<td align='right'>$xbaus</td>";
   echo "<td align='right'>$sinus</td>";
   echo "<td align='right'>$cos</td>";
   echo "<td align='right'>$wurz</td>";
   echo "<td align='right'>$quad</td>";
   echo "<td align='right'>$logn</td>";
   echo "<td align='right'>$log10</td>";
   echo "<td align='right'>$ehoch</td>";
   echo "<td align='right'>$bin</td>";
   echo "<td align='right'>$hexa</td></tr>";
}
?>
</table>
</body></html>
