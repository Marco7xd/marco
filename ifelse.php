<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $preis = 0.98;
   if ($preis < 1)
   {
     echo "Der Preis liegt unter 1 &euro;.<br>"
     echo "das ist billig.";
    }

    else
    {
     echo "Der Preis liegt bei 1 &euro; oder mehr<br>";
     echo "langsam wird es teuer";
    }
?>
</body></html>