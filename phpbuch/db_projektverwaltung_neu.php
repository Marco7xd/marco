<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("localhost", "root", "7xd");

   $sql = "CREATE DATABASE IF NOT EXISTS projektverwaltung";
   mysqli_query($con, $sql);

   mysqli_select_db($con, "projektverwaltung");

   $sql = "CREATE TABLE IF NOT EXISTS kunde (
      ku_id int(11) NOT NULL,
      ku_name varchar(30) DEFAULT NULL,
      ku_ort varchar(30) DEFAULT NULL,
      PRIMARY KEY ku_id (ku_id)
      ) ENGINE=MyISAM";
   mysqli_query($con, $sql);

   $sql = "INSERT INTO kunde(ku_id, ku_name, ku_ort) VALUES
      (1, 'Schmidt', 'Hamburg'),
      (2, 'Weber', 'Frankfurt'),
      (3, 'Murchel', 'Dortmund')";
   mysqli_query($con, $sql);
   
   $sql = "CREATE TABLE IF NOT EXISTS projekt (
      pr_id int(11) NOT NULL,
      pr_ku_id int(11) DEFAULT NULL,
      pr_bezeichnung varchar(50) DEFAULT NULL,
      PRIMARY KEY pr_id (pr_id)
      ) ENGINE=MyISAM";
   mysqli_query($con, $sql);

   $sql = "INSERT INTO projekt(pr_id, pr_ku_id, pr_bezeichnung) VALUES
      (1, 1, 'Alexanderstrasse'),
      (2, 1, 'Peterstrasse'),
      (3, 2, 'Jahnplatz'),
      (4, 2, 'Lindenplatz'),
      (5, 3, 'Nordbahnhof'),
      (6, 3, 'Westbahnhof')";
   mysqli_query($con, $sql);
   
   $sql = "CREATE TABLE IF NOT EXISTS person (
      pe_id int(11) NOT NULL,
      pe_nachname varchar(30) DEFAULT NULL,
      pe_vorname varchar(30) DEFAULT NULL,
      PRIMARY KEY pe_id (pe_id)
      ) ENGINE=MyISAM";
   mysqli_query($con, $sql);

   $sql = "INSERT INTO person(pe_id, pe_nachname, pe_vorname) VALUES
      (1, 'Mohr', 'Hans'),
      (2, 'Berger', 'Stefan'),
      (3, 'Suhren', 'Marion')";
   mysqli_query($con, $sql);
  
   $sql = "CREATE TABLE IF NOT EXISTS projekt_person (
      pr_id int(11) NOT NULL,
      pe_id int(11) NOT NULL,
      pp_datum date NOT NULL,
      pp_zeit double DEFAULT NULL,
      PRIMARY KEY pp_id (pr_id, pe_id, pp_datum)
      ) ENGINE=MyISAM";
   mysqli_query($con, $sql);

   $sql = "INSERT INTO projekt_person(pr_id, pe_id, pp_datum, pp_zeit) VALUES
      (1, 1, '2015-12-01', 3.5),
      (1, 3, '2015-12-01', 4),
      (4, 1, '2015-12-01', 3),
      (4, 2, '2015-12-01', 6.5),
      (4, 2, '2015-12-02', 7.3),
      (4, 3, '2015-12-01', 4)";
   mysqli_query($con, $sql);

   mysqli_close($con);
?>
</body></html>
