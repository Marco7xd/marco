<?php
   /* Session starten oder wieder aufnehmen */
   session_start();
?>
<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* Falls diese Seite direkt angewählt wurde */
   if(!isset($_GET["abtnr"]))
   {
      echo "Keine Abteilung angegeben!";
      echo "<p><a href='sc_shop_a.php'>Zur Startseite</a></p>";
      echo "</body></html>";
      exit;
   }

   /* Abteilungsnummer übernehmen */
   $abtnr = $_GET["abtnr"];

   /* Arrays einbinden */
   include "sc_shop.inc.php";

   /* Abteilungsname ausgeben */
   echo "<h3>$abtname[$abtnr]</h3>";

   echo "<p>Ihre Auswahl:</p>";
   echo "<form action='sc_shop_c.php?abtnr=$abtnr' method='post'>";
?>
<table border="1">
<tr>
   <td><b>Artikel</b></td>
   <td><b>Nr.</b></td>
   <td><b>Preis</b></td>
   <td><b>Anzahl</b></td>
</tr>
<?php
/* Alle Artikel dieser Abteilung ausgeben */
   for($i=0; $i<count($aname[$abtnr]); $i++)
   {
      echo "<tr>";
      echo "<td>" . $aname[$abtnr][$i] . "</td>";
      echo "<td>" . $artnr[$abtnr][$i] . "</td>";
      echo "<td align='right'>" . number_format(
         $preis[$abtnr][$i],2,",",".") . " &euro;</td>";

      /* Eingabefeld für Anzahl */
      echo "<td><input name='anzahl[$i]' size='5'";
      if(isset($_SESSION["anzahl"][$abtnr][$i]))
         echo " value='" . $_SESSION["anzahl"][$abtnr][$i] . "'";
      else
         echo " value='0'";
      echo "></td>";
      echo "</tr>";
   }
?>
</table>
<p><input type="submit" value="In den Warenkorb"></p>
</form>

<p><a href="sc_shop_a.php">Zur Startseite</a></p>
</body></html>
