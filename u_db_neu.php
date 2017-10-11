<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("", "root", "rooter");

   $sql = "CREATE DATABASE IF NOT EXISTS hardware";
   mysqli_query($con, $sql);

   mysqli_select_db($con, "hardware");

   $sql = "CREATE TABLE IF NOT EXISTS fp (
      hersteller VARCHAR(25) DEFAULT NULL,
      typ VARCHAR(25) DEFAULT NULL,
      gb INT(11) DEFAULT NULL,
      preis DOUBLE DEFAULT NULL,
      artnummer VARCHAR(15) NOT NULL,
      prod DATE DEFAULT NULL,
      PRIMARY KEY artnummer (artnummer)
      ) ENGINE=MyISAM";
   mysqli_query($con, $sql);

   $sql = "INSERT INTO fp (hersteller, typ, gb, preis, artnummer, prod) VALUES
      ('Quantum', 'Fireball CX', 40, 112, 'HDA-208', '2008-10-01'),
      ('Quantum', 'Fireball Plus', 80, 128, 'HDA-163', '2008-03-15'),
      ('Fujitsu', 'MPE 3136', 160, 149, 'HDA-171', '2008-09-01'),
      ('Seagate', '310232A', 60, 122, 'HDA-144', '2008-11-15'),
      ('IBM Corporation', 'DJNA 372200', 240, 230, 'HDA-140', '2008-06-15')";
   mysqli_query($con, $sql);
   
   mysqli_close($con);
?>
</body></html>
