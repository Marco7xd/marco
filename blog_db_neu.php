<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("","root", "rooter");

   $sql = "CREATE DATABASE IF NOT EXISTS blog";
   mysqli_query($con, $sql);

   mysqli_select_db($con, "blog");
   
   $sql = "CREATE TABLE IF NOT EXISTS blogdaten (
      id INT(11) NOT NULL AUTO_INCREMENT,
      zeit TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      art INT(11) NOT NULL,
      text VARCHAR(1000) NOT NULL,
      PRIMARY KEY (id)
      ) ENGINE=MyISAM";
   mysqli_query($con, $sql);
   
   $sql = "INSERT INTO blogdaten (id, zeit, art, text) VALUES
      (1, '2015-10-25 05:53:04', 0, 'Das ist der erste Text'),
      (2, '2015-10-25 05:53:35', 0, 'Das ist der zweite Text'),
      (3, '2015-10-25 05:59:30', 1, 'blog_20151025055930.jpg')";
   mysqli_query($con, $sql);

   mysqli_close($con);
?>
</body></html>
