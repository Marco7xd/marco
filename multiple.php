<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   echo "<p>Wir reservieren:</p>";
   echo "<p>";
   for($i=0; $i<count($_POST["zusatz"]); $i++)
   	  if (isset($_POST["zusatz"][$i]))
   	  	 echo "Zimmer mit " . $_POST["zusatz"][$i] . "<br>";
   echo "</p>"
?>
</body></html>