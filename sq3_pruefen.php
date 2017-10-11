<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   if (extension_loaded("sqlite3"))
      echo "sqlite3-Bibliothek geladen<br>";
   else
      echo "sqlite3-Bibliothek nicht geladen<br>";
?>
</body></html>
