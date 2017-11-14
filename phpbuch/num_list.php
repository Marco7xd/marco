<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* Elemente aus numerischen Arrays, Komma setzen */
   $farben = array("Rot", "Gelb", "Blau", "Magenta", "Cyan");
   list($erste, $zweite, , $vierte) = $farben;
   echo "$erste, $zweite, $vierte <br><br>";

   /* Datenbankzugriff, mit mysqli_fetch_row() */
   $con = mysqli_connect("", "root", "rooter");
   mysqli_select_db($con, "firma");
   $res = mysqli_query($con, "SELECT * FROM personen");
   while(list($name, $vorname, , $gehalt) = mysqli_fetch_row($res))
      echo "$name, $vorname, $gehalt <br>";
   mysqli_close($con);
?>
</body></html>
