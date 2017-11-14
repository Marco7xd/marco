<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
  if ($_POST["bname"] == "Marten" && $_POST["pw"] == "Hamburg"
      || $_POST["bname"] == "Schmitz" && $_POST["pw"] == "Berlin" )
    echo "Zugang gestattet";
  else
    echo "Zugang verweigert";
?>
</body></html>
