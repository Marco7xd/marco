<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<form action = "einedatei.php" method = "post">
<?php
   if (isset($_POST["gesendet"]))
      echo "<p><font color='#ff0000'> Ihre Eingabe: "
         . $_POST["vn"] . " " . $_POST["nn"] . "</font></p><hr>";
?>
<p>Bitte geben Sie einen Namen ein<br>
und senden Sie das Formular ab:</p>
   <p><input name = "nn"> Nachname</p>
   <p><input name = "vn"> Vorname</p>
   <p><input type = "submit" name = "gesendet">
      <input type = "reset"></p>
</form>
</body></html>
