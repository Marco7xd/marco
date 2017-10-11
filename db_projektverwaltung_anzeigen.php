<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("localhost", "root", "7xd");
   mysqli_select_db($con, "projektverwaltung");

   echo "<b>Alle Personen:</b><br>";
   $res = mysqli_query($con, "SELECT * FROM person ORDER BY pe_nachname, pe_vorname");
   while ($dsatz = mysqli_fetch_assoc($res))
      echo $dsatz["pe_nachname"] . ", " . $dsatz["pe_vorname"] . "<br>";

   echo "<br><b>Anzahl der Kunden:</b><br>";
   $res = mysqli_query($con, "SELECT COUNT(ku_id) as count_ku_id FROM kunde");
   while ($dsatz = mysqli_fetch_assoc($res))
      echo $dsatz["count_ku_id"] . "<br>";

   echo "<br><b>Alle Kunden mit allen Projekten:</b><br>";
   $res = mysqli_query($con, "SELECT * FROM kunde, projekt "
     . "WHERE ku_id = pr_ku_id ORDER BY ku_name, ku_ort, pr_bezeichnung");
   while ($dsatz = mysqli_fetch_assoc($res))
      echo $dsatz["ku_name"] . ", " . $dsatz["ku_ort"] . ", " . $dsatz["pr_bezeichnung"] . "<br>";

   echo "<br><b>Alle Personen mit allen Projektzeiten:</b><br>";
   $res = mysqli_query($con, "SELECT * FROM projekt, projekt_person, person "
     . "WHERE projekt.pr_id = projekt_person.pr_id "
     . "AND projekt_person.pe_id = person.pe_id "
     . "ORDER BY pe_nachname, pr_bezeichnung, pp_datum");
   while ($dsatz = mysqli_fetch_assoc($res))
      echo $dsatz["pe_nachname"] . ", " . $dsatz["pr_bezeichnung"]
         . ", " . $dsatz["pp_datum"] . "<br>";

   echo "<br><b>Alle Personen mit Zeitsumme:</b><br>";
   $res = mysqli_query($con, "SELECT pe_nachname, SUM(pp_zeit) as sum_pp_zeit "
     . "FROM person, projekt_person "
     . "WHERE person.pe_id = projekt_person.pe_id "
     . "GROUP BY person.pe_id, pe_nachname "
     . "ORDER BY pe_nachname");
   while ($dsatz = mysqli_fetch_assoc($res))
      echo $dsatz["pe_nachname"] . ", " . $dsatz["sum_pp_zeit"] . "<br>";

   echo "<br><b>Alle Projekte mit allen Personenzeiten:</b><br>";
   $res = mysqli_query($con, "SELECT * FROM projekt, projekt_person, person "
     . "WHERE projekt.pr_id = projekt_person.pr_id "
     . "AND projekt_person.pe_id = person.pe_id "
     . "ORDER BY pr_bezeichnung, pe_nachname, pp_datum");
   while ($dsatz = mysqli_fetch_assoc($res))
      echo $dsatz["pr_bezeichnung"] . ", " . $dsatz["pe_nachname"]
         . ", " . $dsatz["pp_datum"] . "<br>";

   echo "<br><b>Alle Projekte mit Zeitsumme:</b><br>";
   $res = mysqli_query($con, "SELECT pr_bezeichnung, SUM(pp_zeit) as sum_pp_zeit "
     . "FROM projekt, projekt_person "
     . "WHERE projekt.pr_id = projekt_person.pr_id "
     . "GROUP BY projekt.pr_id, pr_bezeichnung "
     . "ORDER BY pr_bezeichnung");
   while ($dsatz = mysqli_fetch_assoc($res))
      echo $dsatz["pr_bezeichnung"] . ", " . $dsatz["sum_pp_zeit"] . "<br>";

   mysqli_close($con);
?>
</body></html>
