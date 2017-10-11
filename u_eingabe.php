<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   echo "<p>Ihre Adresse lautet:</p>";
   echo "<p>" . $_POST["vor"] . " " . $_POST["nach"] . "<br>";
   echo $_POST["str"] . "<br>";
   echo $_POST["plz"] . " " . $_POST["ort"] . "</p>";
?>
</body></html>
