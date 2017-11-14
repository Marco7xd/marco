<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("", "root", "rooter");

   $sql = "CREATE DATABASE IF NOT EXISTS firma";
   mysqli_query($con, $sql);

   mysqli_select_db($con, "firma");

   $sql = "CREATE TABLE IF NOT EXISTS personen (
      name VARCHAR(30) DEFAULT NULL,
      vorname VARCHAR(25) DEFAULT NULL,
      personalnummer INT(11) DEFAULT NULL,
      gehalt DOUBLE DEFAULT NULL,
      geburtstag DATE DEFAULT NULL,
      PRIMARY KEY personalnummer (personalnummer)
      ) ENGINE=MyISAM";
   mysqli_query($con, $sql);

   $sql = "INSERT INTO personen (name, vorname, personalnummer, gehalt, geburtstag) VALUES
      ('Maier', 'Hans', 6714, 3500, '1962-03-15'),
      ('Schmitz', 'Peter', 81343, 3750, '1958-04-12'),
      ('Mertens', 'Julia', 2297, 3621.5, '1959-12-30')";
   mysqli_query($con, $sql);
   
   mysqli_close($con);
?>
</body></html>
