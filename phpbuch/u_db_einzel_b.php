<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
if (isset($_POST["auswahl"]))
{
   $con = mysqli_connect("", "root", "rooter");
   mysqli_select_db($con, "hardware");

   $sql = "SELECT * FROM fp WHERE artnummer = '" . $_POST["auswahl"] . "'";
   $res = mysqli_query($con, $sql);
   $dsatz = mysqli_fetch_assoc($res);

   echo "<p>Bitte neue Inhalte eintragen und speichern</p>";
   echo "<form action = 'u_db_einzel_c.php' method = 'post'>";

   echo "<p><input name='her' value='" . $dsatz["hersteller"] . "'> Hersteller</p>";
   echo "<p><input name='typ' value='" . $dsatz["typ"] . "'> Typ</p>";
   echo "<p><input name='gb'  value='" . $dsatz["gb"] . "'> Speicherplatz in GB</p>";
   echo "<p><input name='pre' value='" . $dsatz["preis"] . "'> Preis</p>";
   echo "<p><input name='anr' value='" . $_POST["auswahl"] . "'> Artikelnummer</p>";
   echo "<p><input name='pro' value='" . $dsatz["prod"] . "'> Erstes Produktionsdatum</p>";
   echo "<input type='hidden' name='orianr' value='" . $_POST["auswahl"] . "'>";
   echo "<p><input type='submit' value='Speichern'>";
   echo "<input type='reset'></p>";
   echo "</form>";
   
   mysqli_close($con);
}
else
   echo "<p>Keine Auswahl getroffen</p>";
?>
</body></html>
