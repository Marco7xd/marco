<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<h3>Willkommen im Webshop</h3>
<p>Zur Abteilung:<br>
<?php
/* Arrays einbinden */
include "sc_shop.inc.php";

/* Abteilungsnamen mit Hyperlinks ausgeben */
for($i=0; $i<count($abtname); $i++)
   echo "<a href='sc_shop_b.php?abtnr=$i'>$abtname[$i]</a><br>";
?>
</p>
<p><a href="sc_shop_c.php">Zum Warenkorb</a></p>
</body></html>
