<!DOCTYPE html><html><head><meta charset="utf-8">
<?php
   function vermerk($entwickler)
   {
      echo "<table border='1'>";
      echo "<tr><td>Dieser Programmteil wurde"
         ." geschrieben von $entwickler</td></tr>";
      echo "</table>";
   }
?>
</head>
<body>
<?php
   vermerk("Bodo Berg");
   vermerk("Hans Heim");
?>
</body></html>
