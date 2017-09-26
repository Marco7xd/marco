<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("", "root", "7xd", "firma");
   $sql = "UPDATE personen SET gehalt = gehalt * 1.05";
   mysqli_query($con, $sql);


   $num = mysqli_affected_rows($con);
   if($num > 0) echo "Betroffen: $num<br>";
   else         echo "Betroffen: 0<br>";

   mysqli_close($con);
?>
<p>Alle <a href="db_tabelle.php">anzeigen</a></p>
</body></html>