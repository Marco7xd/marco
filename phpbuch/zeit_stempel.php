<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $jetzt = time();
   echo "Zugriff " . date("d.m.Y H:i:s",$jetzt) . "<br>";

   $ip = $_SERVER["REMOTE_ADDR"];
   echo "IP-Adresse: $ip";

   $con = mysqli_connect("","root","rooter");
   mysqli_select_db($con, "logdaten");
   $sql = "INSERT INTO stempel (ipaddr) VALUES('$ip')";
   mysqli_query($con, $sql);
   mysqli_close($con);
?>
</body></html>
