<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   // Monat ermitteln
   $jetzt = time();
   $monat = intval(date("m", $jetzt));

   // Anzahl Datensätze ermitteln
   $con = mysqli_connect("", "root", "rooter");
   mysqli_select_db($con, "firma");
   $sql = "SELECT * FROM personen WHERE MONTH(geburtstag) = $monat";
   $res = mysqli_query($con, $sql);

   // Datensätze ausgeben
   $num = mysqli_num_rows($res);
   if($num > 0) echo "Ergebnis:<br>";
   else         echo "Keine Ergebnisse<br>";
   while ($dsatz = mysqli_fetch_assoc($res))
      echo $dsatz["name"] . ", " . $dsatz["geburtstag"] . "<br>";
   mysqli_close($con);
?>
</body></html>
