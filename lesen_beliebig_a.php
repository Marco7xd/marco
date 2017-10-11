<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   if(!file_exists("beliebig.txt"))
      exit("Datei konnte nicht gefunden werden");
?>
<p>Treffen Sie eine Auswahl:</p>
<form action="lesen_beliebig_b.php" method="post">
  <p>Datensatz: <select name="nummer">
<?php
  $anz = filesize("beliebig.txt") / 6;
  for($i=1; $i<=$anz; $i++)
     echo "<option value='$i'>$i</option>";
?>
  </select></p>
  <p><input type="submit" value="Absenden"></p>
</form>
</body></html>
