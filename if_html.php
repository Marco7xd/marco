<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $preis = 1.02;
   if ($preis < 1):
?>
Der Preis liegt unter 1 &euro;<br>
Das ist billig
<?php else: ?>
Der Preis liegt bei mehr als 1 &euro;<br>
langsam wird es teuer
<?php endif; ?>
</body></html>	