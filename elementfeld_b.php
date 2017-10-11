<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<h2>Kontrolle der Anwesenheit</h2>
<?php
   include "elementfeld.inc.php";
   echo "<table border='1'>";
   echo "<tr><td><b>ID</b></td><td><b>Name</b></td>
      <td><b>Aktion</b></td></tr>";

   /* Bearbeitung des ganzen Felds */
   foreach($person as $id=>$name)
   {
      echo "<tr><td>$id</td><td>$name</td>";
      if (isset($_POST["pe"][$id]))
         echo "<td>wurde gespeichert</td></tr>";
      else
         echo "<td>&nbsp;</td></tr>";
   }
   echo "</table>";
?>
</body></html>
