<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("", "root", "rooter");

   $sql = "CREATE DATABASE IF NOT EXISTS forum";
   mysqli_query($con, $sql);

   mysqli_select_db($con, "forum");

   $sql = "CREATE TABLE IF NOT EXISTS eintrag (
      id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
      zeit TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      name VARCHAR(40) NOT NULL,
      thema VARCHAR(20) NOT NULL,
      beitrag VARCHAR(1000) NOT NULL,
      PRIMARY KEY id (id)
      ) ENGINE=MyISAM AUTO_INCREMENT=5";
   mysqli_query($con, $sql);

   $sql = "INSERT INTO eintrag (id, zeit, name, thema, beitrag) VALUES
      (1, '2015-10-15 14:23:29', 'Theo Scheller', 'PHP', 'Hallo Leute, in meinem Betrieb wird viel mit PHP programmiert. Wie sieht es bei Euch aus?'),
      (2, '2015-10-15 14:24:24', 'Wolfgang Petersen', 'PHP', 'Hallo Theo, bei uns ist eher Python angesagt.'),
      (3, '2015-10-15 14:25:59', 'Astrid Gerth', 'Treffen', 'Hallo, was macht Ihr Freitag 16 Uhr? Wir gehen zum Markt.'),
      (4, '2015-10-15 14:26:37', 'Markus Maier', 'Treffen', 'Gute Idee, ich bin dabei.')";
   mysqli_query($con, $sql);

   $sql = "CREATE TABLE IF NOT EXISTS teilnehmer (
      id int(11) NOT NULL,
      vorname VARCHAR(20) NOT NULL,
      nachname VARCHAR(20) NOT NULL,
      passwort VARCHAR(6) NOT NULL,
      PRIMARY KEY id (id)
      ) ENGINE=MyISAM";
   mysqli_query($con, $sql);

   $sql = "INSERT INTO teilnehmer (id, vorname, nachname, passwort) VALUES
      (1, 'Markus', 'Maier', 'krt956'),
      (2, 'Theo', 'Scheller', 'pth620'),
      (3, 'Wolfgang', 'Petersen', 'ikr652'),
      (4, 'Astrid', 'Gerth', 'hkw649')";
   mysqli_query($con, $sql);

   mysqli_close($con);
?>
</body></html>
