<!DOCTYPE html><html><head><meta charset="utf-8">
<title>Fachinformatiker Praktikumsforum</title>

<style type="text/css">
   body      {font-family:Verdana; font-size:10pt;
              background-color:#d0dce0; color:#00008b}
   td        {font-family:Verdana; font-size:10pt;
              background-color:#d0d0d0; color:#00008b;
              vertical-align:top}
   td.ub     {background-color:#d0d0d0}
   td.kl     {font-size:8pt}
   a:link    {color:#0000ff}
   a:visited {color:#0000ff}
   a:hover   {color:#ff0000}
</style>

<script type="text/javascript">
function send(p)
{
   if (p==1)
   {
      if (document.tb.thema.value == ""
         || document.tb.beitrag.value == "")
         alert("Bitte Thema und Beitrag eintragen!");
      else
      {
         document.tb.aufruf.value = "beitrag";
         document.tb.submit();
      }
   }
   else if (p==2)
   {
      document.tb.aufruf.value = "sdatum";
      document.tb.submit();
   }
   else if (p==3)
   {
      document.tb.aufruf.value = "sname";
      document.tb.submit();
   }
   else if (p==4)
   {
      document.tb.aufruf.value = "sthema";
      document.tb.submit();
   }
   else if (p==5)
   {
      document.tb.aufruf.value = "filter_t";
      document.tb.submit();
   }
   else if (p==6)
   {
      document.tb.aufruf.value = "filter_n";
      document.tb.submit();
   }
   else if (p==7)
   {
      document.tb.aufruf.value = "filter_w";
      document.tb.submit();
   }
}
</script>
</head>

<body>
<?php
/* Datenbankverbindung */
$con = mysqli_connect("", "root", "rooter");
mysqli_select_db($con, "forum");

/* Keine Parameter gesendet: Zur Anmeldung */
if(!isset($_POST["aufruf"]) || !isset($_POST["pw"]))
{
   echo "<form name='anm' action='forum.php' method='post'>"
     . "Passwort:<br><input type='password' name='pw'>"
     . "<input type='hidden' name='aufruf' value='login'><br>"
     . "<a href='javascript:document.anm.submit();'>Anmelden</a>"
     . "</form></body></html>";
   exit;
}

/* Prüfung auf gültiges Passwort */
$sql = "SELECT * FROM teilnehmer WHERE passwort LIKE '" . $_POST["pw"] . "'";
$res = mysqli_query($con, $sql);
$num = mysqli_num_rows($res);
if($num==0)
   exit("<script type='text/javascript'>location.href='forum.php'</script></body></html>");

/* Formular beginnt nach erfolgreicher Anmeldung */
echo "<form name='tb' action='forum.php' method='post'>"
  . "<input type='hidden' name='pw' value='" . $_POST["pw"] . "'>"
  . "<input type='hidden' name='aufruf'>";

/* Kopfzeile mit Teilnehmername */
$dsatz = mysqli_fetch_assoc($res);
$name = $dsatz["vorname"] . " " . $dsatz["nachname"];

echo "<table width='100%'>"
  . "<tr><td colspan='4' class='ub'>"
  . "<a name='oben'><b>Fachinformatiker Praktikumsforum, $name</b></a>"
  . "</td></tr>"
  . "<tr><td width='25%' class='ub'><a href='#neu'>Neuen Beitrag eingeben</a>"
  . "<br>&nbsp;<br><a href='forum.php'>Abmelden</a></td>";

/* Neuen Beitrag in Datenbank schreiben */
if($_POST["aufruf"] == "beitrag")
{
   $sql = "INSERT INTO eintrag (name, thema, beitrag) VALUES ('$name', '"
      . $_POST["thema"] . "', '" . $_POST["beitrag"] . "')";
   mysqli_query($con, $sql);
}

/* Thema als Auswahlfilter */
$sql = "SELECT thema FROM eintrag GROUP BY thema";
$res = mysqli_query($con, $sql);
$num = mysqli_num_rows($res);

echo "<td width='25%' class='ub'>Filtern nach Thema:<br>"
  . "<select name='filter_t'><option>- alle -</option>";

for($i=0; $i<$num; $i++)
{
   $dsatz = mysqli_fetch_assoc($res);
   echo "<option>" . $dsatz["thema"] . "</option>";
}

echo "</select><br>"
  . "<a href='javascript:send(5);'>anzeigen</a></td></td>";

/* Name als Auswahlfilter */
$sql = "SELECT name FROM eintrag GROUP BY name";
$res = mysqli_query($con, $sql);
$num = mysqli_num_rows($res);

echo "<td width='25%' class='ub'>Filtern nach Name:<br>"
  . "<select name='filter_n'><option>- alle -</option>";
for($i=0; $i<$num; $i++)
{
   $dsatz = mysqli_fetch_assoc($res);
   echo "<option>" . $dsatz["name"] . "</option>";
}
echo "</select><br>"
  . "<a href='javascript:send(6);'>anzeigen</a></td></td>";

/* Wort im Beitrag als Auswahlfilter */
echo "<td width='25%' class='ub'>Filtern nach Wort:<br>"
  . "<input name='filter_w'><br>"
  . "<a href='javascript:send(7);'>anzeigen</a></td>"
  . "</tr></table>";

/* Alle Beiträge darstellen, sortiert */
/* nach Zeit (absteigend)             */
if($_POST["aufruf"] == "sdatum" || $_POST["aufruf"] == "beitrag" ||
   $_POST["aufruf"] == "login")
{
   $sql = "SELECT * FROM eintrag ORDER BY zeit DESC";
   $res = mysqli_query($con, $sql);
   $num = mysqli_num_rows($res);
}

/* Alle Beiträge darstellen, sortiert            */
/* nach Name (aufsteigend) und Zeit (absteigend) */
else if($_POST["aufruf"] == "sname")
{
   $sql = "SELECT * FROM eintrag ORDER BY name ASC, zeit DESC";
   $res = mysqli_query($con, $sql);
   $num = mysqli_num_rows($res);
}

/* Alle Beiträge darstellen, sortiert             */
/* nach Thema (aufsteigend) und Zeit (absteigend) */
else if($_POST["aufruf"] == "sthema")
{
   $sql = "SELECT * FROM eintrag ORDER BY thema ASC, zeit DESC";
   $res = mysqli_query($con, $sql);
   $num = mysqli_num_rows($res);
}

/* Nur Beiträge zum ausgewählten Thema         */
/* darstellen, sortiert nach Zeit (absteigend) */
else if($_POST["aufruf"] == "filter_t")
{
   if ($_POST["filter_t"] == "- alle -")
   {
      $sql = "SELECT * FROM eintrag ORDER BY zeit DESC";
      $res = mysqli_query($con, $sql);
   }
   else
   {
      $sql = "SELECT * FROM eintrag WHERE thema LIKE '"
         . $_POST["filter_t"] . "' ORDER BY zeit DESC";
      $res = mysqli_query($con, $sql);
   }
   $num = mysqli_num_rows($res);
}

/* Nur Beiträge zum ausgewählten Namen         */
/* darstellen, sortiert nach Zeit (absteigend) */
else if($_POST["aufruf"] == "filter_n")
{
   if ($_POST["filter_n"] == "- alle -")
   {
      $sql = "SELECT * FROM eintrag ORDER BY zeit DESC";
      $res = mysqli_query($con, $sql);
   }
   else
   {
      $sql = "SELECT * FROM eintrag WHERE name LIKE '"
         . $_POST["filter_n"] . "' ORDER BY zeit DESC";
      $res = mysqli_query($con, $sql);
   }
   $num = mysqli_num_rows($res);
}

/* Nur Beiträge mit ausgewähltem Wort aus    */
/* Beitrag, sortiert nach Zeit (absteigend)  */
else if($_POST["aufruf"] == "filter_w")
{
   if ($_POST["filter_w"] == "")
   {
      $sql = "SELECT * FROM eintrag ORDER BY zeit DESC";
      $res = mysqli_query($con, $sql);
   }
   else
   {
      $sql = "SELECT * FROM eintrag WHERE beitrag LIKE '%"
         . $_POST["filter_w"] . "%' ORDER BY zeit DESC";
      $res = mysqli_query($con, $sql);
   }
   $num = mysqli_num_rows($res);
}
?>

<table width="100%">
<tr>
   <td width="15%" class="ub">
      <a href="javascript:send(2);"><b>Datum</a> /
      <a href="javascript:send(3);">Name</b></a>
   </td>
   <td width="15%" class="ub">
      <a href="javascript:send(4);"><b>Thema</b></a>
   </td>
   <td width="70%" class="ub">
      <b>Beitrag</b>
   </td>
</tr>

<?php
for($i=0; $i<$num; $i++)
{
   $dsatz = mysqli_fetch_assoc($res);
   $tabz = $dsatz["zeit"];
   $ausz = substr($tabz,8,2) . "." . substr($tabz,5,2) . "." . substr($tabz,2,2) . " " . substr($tabz,11,5);
   $tabn = $dsatz["name"];
   $tabt = $dsatz["thema"];
   $tabb = $dsatz["beitrag"];
   echo "<tr><td class='kl'>$ausz<br>$tabn</td>"
     . "<td>$tabt</td><td>$tabb</td></tr>";
}
mysqli_close($con);
echo "</table>";
?>

<table width="100%">
<tr>
<td width="100%" class="ub"><a name="neu">
   <b>Neuen Beitrag eingeben:</b></a>
   <br>&nbsp;<br>
Thema (max. 20 Zeichen):<br>
<input name="thema" size="30" maxlength="20">
<br>&nbsp;<br>Beitrag:<br>
<textarea name="beitrag" rows="10"
   cols="70"></textarea><br>&nbsp;<br>
<a href="javascript:send(1);">
   Beitrag senden</a> &nbsp; &nbsp;
<a href="#oben">Nach oben</a><br>&nbsp;<br>
</td>
</tr>
</table>

</form>
</body></html>
