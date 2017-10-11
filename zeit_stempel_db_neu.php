<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("","root", "rooter");

   $sql = "CREATE DATABASE IF NOT EXISTS logdaten";
   mysqli_query($con, $sql);

   mysqli_select_db($con, "logdaten");
   
   $sql = "CREATE TABLE IF NOT EXISTS stempel (
      id INT(11) NOT NULL AUTO_INCREMENT,
      tstamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      ipaddr VARCHAR(20) NOT NULL,
      PRIMARY KEY (id)
      ) ENGINE=MyISAM";
   mysqli_query($con, $sql);
   
   $sql = "INSERT INTO stempel (id, tstamp, ipaddr) VALUES
      (1, '2015-10-25 05:47:57', '127.0.0.1'),
      (2, '2015-10-25 05:48:38', '127.0.0.1'),
      (3, '2015-10-25 05:49:00', '127.0.0.1')";
   mysqli_query($con, $sql);

   mysqli_close($con);
?>
</body></html>
