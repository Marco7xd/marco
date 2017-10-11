<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
if (isset($_POST["auswahl"]))
{
   $con = mysqli_connect("", "root", "rooter");
   mysqli_select_db($con, "firma");

   $sql = "DELETE FROM personen WHERE"
     . " personalnummer = " . $_POST["auswahl"];

   mysqli_query($con, $sql);

   $num = mysqli_affected_rows($con);
   if($num > 0) echo "Betroffen: $num<br>";
   else         echo "Betroffen: 0<br>";

   mysqli_close($con);
}
else
   echo "<p>Keine Auswahl getroffen</p>";
?>
<p>Zur <a href="db_loeschen_a.php">Auswahl</a></p>
</body></html>
