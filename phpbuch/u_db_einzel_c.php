<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("", "root", "rooter");
   mysqli_select_db($con, "hardware");

   $sql = "UPDATE fp SET hersteller = '" . $_POST["her"] . "',"
     . " typ = '" . $_POST["typ"] . "',"
     . " gb = " . $_POST["gb"] . ","
     . " preis = " . $_POST["pre"] . ","
     . " artnummer = '" . $_POST["anr"] . "',"
     . " prod = '" . $_POST["pro"] . "'"
     . " WHERE artnummer = '" . $_POST["orianr"] . "'";
   mysqli_query($con, $sql);

   $num = mysqli_affected_rows($con);
   if($num > 0) echo "Betroffen: $num<br>";
   else         echo "Betroffen: 0<br>";

   mysqli_close($con);
?>
<p>Zur <a href="u_db_einzel_a.php">Auswahl</a></p>
</body></html>
