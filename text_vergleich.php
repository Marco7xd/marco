<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $ErsterName = "Maier";
   $ZweiterName = "Mertens";
   $DritterName = "maier";

   echo "<p>Unterscheidung gross/klein, mit strcmp():<br>";
   if (strcmp($ErsterName,$ZweiterName) < 0)
      echo "$ErsterName steht vor $ZweiterName<br>";
   else
      echo "$ZweiterName steht vor $ErsterName<br>";
   if (strcmp($ZweiterName,$DritterName) < 0)
      echo "$ZweiterName steht vor $DritterName</p>";
   else
      echo "$DritterName steht vor $ZweiterName</p>";

   echo "<p>Ohne Untersch. gross/klein, mit strcasecmp():<br>";
   if (strcasecmp($ZweiterName,$DritterName) < 0)
      echo "$ZweiterName steht vor $DritterName</p>";
   else
      echo "$DritterName steht vor $ZweiterName</p>";

   echo "<p>Vergleichbarkeit, mit similar_text():<br>";
   $erg1 = similar_text($ErsterName,$ZweiterName);
   echo "Zwischen $ErsterName und $ZweiterName: "
      . "$erg1 gleiche Buchstaben<br>";
   $erg2 = similar_text($ErsterName,$DritterName);
   echo "Zwischen $ErsterName und $DritterName: "
      ."$erg2 gleiche Buchstaben";
?>
</body></html>
