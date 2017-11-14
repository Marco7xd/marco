<!DOCTYPE html><html><head><meta charset="utf-8">
<?php
   if (isset($_POST["gesendet"]))
   {
      $con = mysqli_connect("", "root", "rooter");
      mysqli_select_db($con, "hardware");

      $sql = "INSERT INTO fp (hersteller, typ, gb, preis, artnummer, prod) VALUES "
        . "('" . $_POST["her"] . "', "
        . "'" . $_POST["typ"] . "', "
        . $_POST["gb"] . ", "
        . $_POST["pre"] . ", "
        . "'" . $_POST["artn"] . "', "
        . "'" . $_POST["prod"] . "')";

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
<form action = "u_db_erzeugen.php" method = "post">
   <p><input name="her"> Hersteller</p>
   <p><input name="typ"> Typ</p>
   <p><input name="gb"> GB</p>
   <p><input name="pre"> Preis (Nachkommastellen mit Punkt)</p>
   <p><input name="artn"> Artikelnummer</p>
   <p><input name="prod"> Datum der ersten Produktion (in der Form JJJJ-MM-TT)</p>
   <p><input type="submit" name="gesendet">
   <input type="reset"></p>
</form>

<p>Alle <a href="u_db_anzeigen.php">anzeigen</a></p>
</body></html>

