<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   echo "<p>Wir reservieren:</p>";
   if (isset($_POST["cb"]))
       echo "Zimmer mit " . $_POST["cb"] . ", Aufpreis 10 Euro/tag<br>";
   if (isset($_POST["cm"]))
       echo "Zimmer mit " . $_POST["cm"] . ", Aufpreis 15euro/tag<br>";
   if (isset($_POST["cz"]))
       echo "Zimmer mit " . $_POST["cz"] . ", Aufpreis 5 Euro/tag";
?>
</body></html>
