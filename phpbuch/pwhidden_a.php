<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<h2>Seite 1</h2>
<form action = "pwhidden_b.php" method = "post">
<?php
   echo "<p>Name: " . $_POST["ben"] . "</p>";
   echo "<input type='hidden' name='benzwei' value='"
      . $_POST["ben"] . "'>";
   if($_POST["pw"]=="bingo")
      echo "<p>Zugang erlaubt</p>";
   else
      echo "<p>Zugang eigentlich nicht erlaubt ...</p>";
?>
   <input type="submit">
</form>
</body></html>
