<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("", "root", "7xd", "firma");
   $sql = "UPDATE personen SET"
     . " name = '" . $_POST["nn"] . "',"
     . " vorname = '" . $_POST["vn"] . "' ,"
     . " personalnummer = " .$_POST["pn"] . ","
     . " gehalt = " . $_POST["ge"] . ","
     . " geburtstag = '" . $_POST["gt"] . "'"
     . " WHERE personalnummer = " . $_POST["oripn"];
   mysqli_query($con, $sql);

   $num = mysqli_affected_rows($con);
   if($num > 0) echo "Betroffen: $num<br>";
   else         echo "Betroffen: 0<br>";

   mysqli_close($con);
?>
<p>Zur <a href="db_einzel_a.php">Auswahl</a></p>
</body></html>
