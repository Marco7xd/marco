<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<h2>Geldanlage</h2>

<?php
   $betrag = $_POST["grundbetrag"];
   $laufzeit = $_POST["laufzeit"];
   echo "<p>Grundbetrag: $betrag &euro;<br>";
   echo "Laufzeit: $laufzeit Jahre<br>";

   /* Zinssatz in Abhängigkeit von der Laufzeit */
   if ($laufzeit <= 3)         $zinssatz = 3;
   else if ($laufzeit <= 5)    $zinssatz = 4;
   else if ($laufzeit <= 10)   $zinssatz = 5;
   else                        $zinssatz = 6;
   echo "Zinssatz: $zinssatz %</p>";
?>

<table border="1">
<tr>
  <td align="right"><b>nach Jahr</b></td>
  <td align="right"><b>Betrag</b></td>
</tr>

<?php
   /* Anlageberechnung und Ausgabe */
   for($i=1; $i<=$laufzeit; $i++)
   {
      echo "<tr>";
      echo "<td align='right'>$i</td>";
      $betrag = $betrag + $betrag * $zinssatz / 100;
      $ausgabe = number_format($betrag,2,",",".");
      echo "<td align='right'>$ausgabe &euro;</td>";
      echo "</tr>";
   }
?>
</table>
</body></html>
