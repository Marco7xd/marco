<!DOCTYPE html><html>
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="db_linkcss.css">
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
   $con = mysqli_connect("", "root", "rooter");
   mysqli_select_db($con, "firma");

   /* Aktion ausführen */
   if(isset($_POST["ak"]))
   {
      /* neu eintragen */
      if($_POST["ak"]=="in")
      {
         $sql = "INSERT INTO personen"
           . "(name, vorname, personalnummer,"
           . " gehalt, geburtstag) values ('"
           . $_POST["na"][0] . "', '"
           . $_POST["vo"][0] . "', '"
           . $_POST["pn"][0] . "', '"
           . $_POST["gh"][0] . "', '"
           . $_POST["gb"][0] . "')";
         mysqli_query($con, $sql);
      }

      /* ändern */
      else if($_POST["ak"]=="up")
      {
         $id = $_POST["id"];
         $sql = "UPDATE personen SET "
           . "name = '" . $_POST["na"][$id] . "', "
           . "vorname = '" . $_POST["vo"][$id] . "', "
           . "personalnummer = '" . $_POST["pn"][$id] . "', "
           . "gehalt = '" . $_POST["gh"][$id] . "', "
           . "geburtstag = '" . $_POST["gb"][$id] . "'"
           . " WHERE personalnummer = $id";
         mysqli_query($con, $sql);
      }

      /* löschen */
      else if($_POST["ak"]=="de")
      {
         $sql = "DELETE FROM personen WHERE personalnummer = "
            . $_POST["id"];
         mysqli_query($con, $sql);
      }
   }

   /* Formularbeginn */
   echo "<form name='f' action='db_linkcss.php' method='post'>";
   echo "<input name='ak' type='hidden'>";
   echo "<input name='id' type='hidden'>";

   /* Tabellenbeginn */
   echo "\n\n<table border>"
    . "<tr>"
    . "<td>Name</td>"
    . "<td>Vorname</td>"
    . "<td>P-Nr</td>"
    . "<td>Gehalt</td>"
    . "<td>Geb.</td>"
    . "<td>Aktion</td>"
    . "</tr>";

   /* Neuer Eintrag */
   echo "\n\n<tr>"
    . "<td><input name='na[0]' size='6'></td>"
    . "<td><input name='vo[0]' size='6'></td>"
    . "<td><input name='pn[0]' size='6'></td>"
    . "<td><input name='gh[0]' size='6'></td>"
    . "<td><input name='gb[0]' size='10'></td>"
    . "<td><a href='javascript:send(0,0);'>neu eintragen</a></td>"
    . "</tr>";

   /* Anzeigen */
   $res = mysqli_query($con, "SELECT * FROM personen");

   /* Alle vorhandenen Datensätze */
   while ($dsatz = mysqli_fetch_assoc($res))
   {
      $id = $dsatz["personalnummer"];
      echo "\n\n<tr>"
         . "<td><input name='na[$id]' value='"
            . $dsatz["name"] . "' size='6'></td>"
         . "<td><input name='vo[$id]' value='"
            . $dsatz["vorname"] . "' size='6'></td>"
         . "<td><input name='pn[$id]' value='"
            . $dsatz["personalnummer"] . "' size='6'></td>"
         . "<td><input name='gh[$id]' value='"
            . $dsatz["gehalt"] . "' size='6'></td>"
         . "<td><input name='gb[$id]' value='"
            . $dsatz["geburtstag"] . "' size='10'></td>"
         . "<td><a href='javascript:send(1,$id);'>speichern</a>"
         . " <a href='javascript:send(2,$id);'>entfernen</a></td>"
         . "</tr>";
   }
   echo "</table>";
   echo "</form>";
   
   mysqli_close($con);
?>
</body></html>
