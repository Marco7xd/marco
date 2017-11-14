<!DOCTYPE html><html><head><meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="sq3_linkcss.css">

<script type="text/javascript">
function send(ak,id)
{
   if(ak==0)
      document.f.ak.value = "in";
   else if(ak==1)
      document.f.ak.value = "up";
   else if(ak==2)
   {
      if (confirm("Datensatz mit id " + id + " entfernen?"))
         document.f.ak.value = "de";
      else
         return;
   }

   document.f.id.value = id;
   document.f.submit();
}
</script>
</head>
<body>
<?php
   /* Datenbankdatei öffnen bzw. erzeugen */
   $db = new SQLite3("sq3.db");

   /* Sortierung, wird ggf. überschrieben */
   $od = "";

   /* Aktion ausführen */
   if(isset($_POST["ak"]))
   {
      /* neu eintragen */
      if($_POST["ak"] == 'in')
      {
         $sql = "INSERT INTO personen"
           . "(name, vorname, personalnummer,"
           . " gehalt, geburtstag) VALUES "
           . "('" . $_POST["na"][0] . "', "
           . "'" . $_POST["vo"][0] . "', "
           . "'" . $_POST["pn"][0] . "', "
           . "'" . $_POST["gh"][0] . "', "
           . "'" . $_POST["gb"][0] . "')";
         $db->query($sql);
      }

      /* ändern */
      else if($_POST["ak"] == "up")
      {
         $id = $_POST["id"];
         $sql = "UPDATE personen SET name = '"
            . $_POST["na"][$id] . "', "
            . " vorname = '" . $_POST["vo"][$id] . "',"
            . " personalnummer = '" . $_POST["pn"][$id] . "',"
            . " gehalt = '" . $_POST["gh"][$id] . "',"
            . " geburtstag = '" . $_POST["gb"][$id] . "'"
            . " WHERE personalnummer = $id";
         $db->query($sql);
      }

      /* löschen */
      else if($_POST["ak"] == "de")
      {
         $sql = "DELETE FROM personen WHERE personalnummer = "
            . $_POST["id"];
         $db->query($sql);
      }
   }

   /* sortieren */
   else if(isset($_GET["ak"]))
   {
     if($_GET["ak"] == "sna")
        $od = " ORDER BY name";
     else if($_GET["ak"] == "svo")
        $od = " ORDER BY vorname";
     else if($_GET["ak"] == "spe")
        $od = " ORDER BY personalnummer";
     else if($_GET["ak"] == "sgh")
        $od = " ORDER BY gehalt";
     else if($_GET["ak"] == "sgb")
        $od = " ORDER BY geburtstag";
   }
  
   /* Formularbeginn */
   echo "<form name='f' action='sq3_linkcss.php' method='post'>";
   echo "<input name='ak' type='hidden'>";
   echo "<input name='id' type='hidden'>";

   /* Tabellenbeginn */
   echo "<table border='1'><tr>";
   echo "<td><a href='sq3_linkcss.php?ak=sna'>Name</a></td>";
   echo "<td><a href='sq3_linkcss.php?ak=svo'>Vorname</a></td>";
   echo "<td><a href='sq3_linkcss.php?ak=spe'>P-Nr</a></td>";
   echo "<td><a href='sq3_linkcss.php?ak=sgh'>Gehalt</a></td>";
   echo "<td><a href='sq3_linkcss.php?ak=sgb'>Geburtstag</a></td>";
   echo "<td>Aktion</td></tr>";

   /* Neuer Eintrag */
   echo "<tr>";
   echo "<td><input name='na[0]' size='6'></td>";
   echo "<td><input name='vo[0]' size='6'></td>";
   echo "<td><input name='pn[0]' size='6'></td>";
   echo "<td><input name='gh[0]' size='6'></td>";
   echo "<td><input name='gb[0]' size='10'></td>";
   echo "<td><a href='javascript:send(0,0);'>"
      . "neu eintragen</a></td>";
   echo "</tr>";

   /* Anzeigen */
   $res = $db->query("SELECT * FROM personen $od");

   /* Alle vorhandenen Datensätze */
   while($dsatz = $res->fetchArray())
   {
      $id = $dsatz["personalnummer"];
      echo "<tr>";
      echo "<td><input name='na[$id]' value='"
         . $dsatz["name"] . "' size='6'></td>";
      echo "<td><input name='vo[$id]' value='"
         . $dsatz["vorname"] . "' size='6'></td>";
      echo "<td><input name='pn[$id]' value='"
         . $id . "' size='6'></td>";
      echo "<td><input name='gh[$id]' value='"
         . $dsatz["gehalt"] . "' size='6'></td>";
      echo "<td><input name='gb[$id]' value='"
         . $dsatz["geburtstag"] . "' size='10'></td>";
      echo "<td><a href='javascript:send(1,$id);'>speichern</a>";
      echo " <a href='javascript:send(2,$id);'>entfernen</a></td>";
      echo "</tr>";
   }
   echo "</table></form>";
   $db->close();
?>
</body></html>
