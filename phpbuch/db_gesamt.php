<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   include "db_connect.inc.php";

   $sql = "DROP TABLE IF EXISTS " . $_GET["tname"];
   echo "<p>$sql</p>";
   mysqli_query($con, $sql);

   $sql = "CREATE TABLE " . $_GET["tname"]
     . "(name VARCHAR(30),"
     . " vorname VARCHAR(25),"
     . " personalnummer INT(11),"
     . " gehalt DOUBLE,"
     . " geburtstag DATE,"
     . " PRIMARY KEY personalnummer (personalnummer)"
     . " )";
   echo "<p>$sql</p>";
   mysqli_query($con, $sql);

   $sql = "INSERT INTO ". $_GET["tname"] . " VALUES"
      . " ('Maier', 'Hans', 6714, '3500', '1962-03-15');";
   echo "<p>$sql<br>";
   mysqli_query($con, $sql);

   $sql = "INSERT INTO ". $_GET["tname"] . " VALUES"
      . " ('Schmitz', 'Peter', 81343, '3750', '1958-04-12');";
   echo "$sql<br>";
   mysqli_query($con, $sql);

   $sql = "INSERT INTO ". $_GET["tname"] . " VALUES"
      . " ('Mertens', 'Julia', 2297, '3621.5', '1959-12-30');";
   echo "$sql<br>";
   mysqli_query($con, $sql);
   
   mysqli_close($con);
?>
</body></html>
