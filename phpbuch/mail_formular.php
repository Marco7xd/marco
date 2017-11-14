<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   mail("empfaenger@empf.de", $_POST["betreff"],
      $_POST["nachricht"], "From: " . $_POST["absender"]);
?>
</body></html>
