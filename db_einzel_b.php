<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
if (isset($_POST["auswahl"]))
{
	$con = mysqli_connect("", "root", "7xd", "firma");
	$sql = "SELECT * FROM personen WHERE personalnummer = "
	   . $_POST["auswahl"];
	$res = mysqli_query($con, $sql);
	$dastz = mysqli_fetch_assoc($res);

	echo "<p>Bitte neue Inhalte eintragen und speichern:</p>";
	echo "<form action = 'db_einzel_c.php' method = 'post'>";

	echo "<p><input name='nn' value='"
	   . $dsatz["name"] . "'> Nachname</p>";
	echo "<p><input name='vn' value='"
	   . $dsatz["vorname"] . "'> Vorname</p>";
	echo "<p><input name='pn' value='"
	   . $dsatz["auswahl"] . "'> Personalnummer</p>";
	echo "<p><input name='ge' value='"
	   . $dsatz["gehalt"] . "'> Gehalt</p>";
	echo "<p><input name='gt' value='"
	   . $dsatz["geburtstag"] . "'> Geburtstag</p>";
    echo "<input type='hidden' name='oripn' value='"
       . $_POST["auswahl"] . "'>";
    echo "<p><input type='submit' value='Speichern'>";
    echo " <input type='reset'></p>";
    echo "</form>";

    mysqli_close($con);
}
else 
   echo "<p>Keine Auswahl getroffen</p>";

?>
</body></html>