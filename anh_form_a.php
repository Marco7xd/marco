<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<h2>Seite 1</h2>
<?php
   echo "<form action='anh_form_b.php?benzwei=" . $_POST["ben"]
     . "&grzwei=" . $_POST["gr"] . "' method='post'>";
   echo "<p>Name: " . $_POST["ben"] . "<br>";
   echo "Gruppe: " . $_POST["gr"] . "</p>";
?>
<p><input type="submit" value="Weiter"></p>
</form>
</body></html>
