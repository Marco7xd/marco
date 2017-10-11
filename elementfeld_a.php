<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<h2>Kontrolle der Anwesenheit</h2>
<form action="elementfeld_b.php" method="post">
<?php
   include "elementfeld.inc.php";
   echo "<table border='1'>";
   echo "<tr><td><b>ID</b></td><td><b>Name</b></td>";
   echo "<td><b>Anwesend</b></td></tr>";

   /* Bearbeitung des ganzen Felds */
   foreach($person as $id=>$name)
   {
      echo "<tr>";
      echo "<td>$id</td>";
      echo "<td>$name</td>";
      echo "<td><input type='checkbox' name='pe[$id]'></td>";
      echo "</tr>";
   }
   echo "</table>";
?>
<p><input type="submit" value="Anwesenheit speichern"></p>
</form>
</body></html>
