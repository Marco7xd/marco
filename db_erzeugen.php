﻿<!DOCTYPE html><html><head><meta charset="utf-8">
<?php
   if (isset($_POST["gesendet"]))
   {
      $con = mysqli_connect("", "root", "rooter");
      mysqli_select_db($con, "firma");

      $sql = "INSERT INTO personen(name, vorname, personalnummer,"
        . " gehalt, geburtstag) values('" . $_POST["na"] . "', '"
        . $_POST["vn"] . "', " . $_POST["pn"] . ", "
        . $_POST["ge"] . ", '" . $_POST["gt"] . "')";

      mysqli_query($con, $sql);

      $num = mysqli_affected_rows($con);
      if ($num>0)
      {
         echo "<p><font color='#00aa00'>";
         echo "Ein Datensatz hinzugekommen";
         echo "</font></p>";
      }
      else
      {
         echo "<p><font color='#ff0000'>";
         echo "Es ist ein Fehler aufgetreten, ";
         echo "es ist kein Datensatz hinzugekommen";
         echo "</font></p>";
      }

      mysqli_close($con);
   }
?>
</head>
<body>
<p>Geben Sie bitte einen Datensatz ein<br>
und senden Sie das Formular ab:</p>
<form action = "db_erzeugen.php" method = "post">
   <p><input name="na"> Name</p>
   <p><input name="vn"> Vorname</p>
   <p><input name="pn"> Personalnummer (eine ganze Zahl)</p>
   <p><input name="ge"> Gehalt (Nachkommastellen mit Punkt)</p>
   <p><input name="gt"> Geburtsdatum (in JJJJ-MM-TT)</p>
   <p><input type="submit" name="gesendet">
   <input type="reset"></p>
</form>

<p>Alle <a href="db_tabelle.php">anzeigen</a></p>
</body></html>
