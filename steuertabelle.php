<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<h2>Steuertabelle</h2>

<table border="1">
<tr>
   <td align="center"><b>Gehalt</b></td>
   <td align="center"><b>Steuersatz</b></td>
   <td align="center"><b>Steuerbetrag</b></td>
   <td align="center"><b>Netto</b></td>
</tr>

<?php
for($brutto = $_POST["start"]; $brutto <= $_POST["ende"];
   $brutto = $brutto + $_POST["intervall"])
{
   /* Berechnung des Steuersatzes */
   if($brutto <= 12000)        $satz = 12;
   else if($brutto <= 20000)   $satz = 15;
   else if($brutto <= 30000)   $satz = 20;
   else                        $satz = 25;

   $steuerbetrag = $brutto * $satz / 100;
   $netto = $brutto - $steuerbetrag;
   echo "<tr>";
   echo "<td align='right'>"
      . number_format($brutto,2,",",".") . " &euro;</td>";
   echo "<td align='right'>"
      . number_format($satz,1,",",".") . " %</td>";
   echo "<td align='right'>"
      . number_format($steuerbetrag,2,",",".") . " &euro;</td>";
   echo "<td align='right'>"
      . number_format($netto,2,",",".") . " &euro;</td>";
   echo "</tr>";
}
?>

</table>
</body></html>
