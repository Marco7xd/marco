<?php
   /* Session starten oder wieder aufnehmen */
   session_start();
?>
<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<h3>Warenkorb</h3>
<p>Ihre bisherige Auswahl:</p>

<table border="1">
<tr>
   <td><b>Artikel</b></td>
   <td><b>Nr.</b></td>
   <td><b>Einzelpreis</b></td>
   <td><b>Anzahl</b></td>
   <td><b>Gesamtpreis</b></td>
</tr>

<?php
   /* Arrays einbinden */
   include "sc_shop.inc.php";

   /* Falls neue Artikel in den Warenkorb kommen,
      werden sie in den Session-Array übernommen */
   if(isset($_GET["abtnr"]))
   {
      /* Abteilungsnummer übernehmen */
      $abtnr = $_GET["abtnr"];

      for($i=0; $i<count($aname[$abtnr]); $i++)
      {
         /* Falls Anzahl größer als 0 */
         if(intval($_POST["anzahl"][$i]) > 0)
            $_SESSION["anzahl"][$abtnr][$i] =
               intval($_POST["anzahl"][$i]);
         /* Falls keine Anzahl oder Anzahl = 0 */
         else
            $_SESSION["anzahl"][$abtnr][$i] = 0;
      }
   }

   /* Ausgabe der Inhalte des Session-Arrays: */
   /* Gesamteinkaufspreis */
   $summe = 0;

   /* Alle Abteilungen */
   for($a=0; $a<count($abtname); $a++)
   {
      /* Alle Artikel einer Abteilung */
      for($i=0; $i<count($aname[$a]); $i++)
      {
         /* Falls dieser Artikel im Session-Array vorhanden ist
            und die eingetragene Anzahl größer als 0 ist */
         if(isset($_SESSION["anzahl"][$a][$i])
            && $_SESSION["anzahl"][$a][$i] > 0)
         {
            echo "<tr>";
            echo "<td>" . $aname[$a][$i] . "</td>";
            echo "<td>" . $artnr[$a][$i] . "</td>";
            echo "<td align='right'>"
               . number_format($preis[$a][$i],2,",",".")
               . " &euro;</td>";
            echo "<td align='right'>"
               . $_SESSION["anzahl"][$a][$i] . "</td>";

            /* Gesamtpreis für diesen Artikel berechnen */
            $gp = $preis[$a][$i] * $_SESSION["anzahl"][$a][$i];

            /* Gesamtpreis aktualisieren und ausgeben */
            $summe += $gp;
            echo "<td align='right'>"
               . number_format($gp,2,",",".") . " &euro;</td>";
            echo "</tr>";
         }
      }
   }

   /* Gesamteinkaufspreis in Session-Array speichern */
   $_SESSION["summe"] = $summe;

   /* Gesamteinkaufspreis ausgeben */
   echo "<tr>";
   echo "<td colspan='4'>Gesamteinkaufspreis</td>";
   echo "<td align='right'>" . number_format($summe,2,",",".")
      . " &euro;</td>";
   echo "</tr>";
?>
</table>
<p><a href="sc_shop_d.php">Zur Kasse</a></p>
<p><a href="sc_shop_a.php">Zur Startseite</a></p>
</body></html>
