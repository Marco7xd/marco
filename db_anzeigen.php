<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
    /* Verbindung aufnehmen und Datenbank auswählen */
    $con = mysqli_connect("", "root", "7xd", "firma");

    /* SQl-Abfrage ausführen */
    $res = mysqli_query($con, "SELECT * FROM personen");

    /* Anzahl Datensätze ermitteln und ausgeben */
    $num = mysqli_num_rows($res);
    if($num > 0) echo "Ergebnis:<br>";
    else         echo "Keine Ergebnisse<br>";

    /* Datensätze aus Ergebnis ermitteln, */
    /* In Array speichern und ausgeben */
    while ($dsatz= mysqli_fetch_assoc($res))
    {
       echo $dsatz["name"] . ", "
          . $dsatz["vorname"] . ", "
          . $dsatz["personalnummer"] . ", "
          . $dsatz["gehalt"] . ", "
          . $dsatz["geburtstag"] . "<br>";
    }

    /* Verbindung schließen */
    mysqli_close($con);
?>
</body></html>