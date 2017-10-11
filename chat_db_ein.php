<!DOCTYPE html><html><head><meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="chat.css">

<script type="text/javascript">
/* Beitrag senden, falls Name und Beitrag vorhanden */
function send()
{
   if(document.f.nick.value != "" && document.f.beitrag.value !="")
      document.f.submit();
}

/* Chat-Anzeige aktualisieren */
function reload()
{
   parent.ausgabe.location.href = "chat_db_aus.php";
}
</script>
</head>

<body>
<?php
/* Anhängen des neuen Textes, falls vorhanden */
if(isset($_POST["beitrag"]))
{
   $con = mysqli_connect("", "root", "rooter");
   mysqli_select_db($con, "chat");
   mysqli_query($con, "INSERT INTO daten (nick, beitrag) VALUES "
      . "('" . $_POST["nick"] . "', '" . $_POST["beitrag"] . "')");
   mysqli_close($con);

   /* Chat-Anzeige aktualisieren */
   echo "<script type='text/javascript'>reload();</script>";
}
?>

<form name="f" action="chat_db_ein.php" method="post">
<table>
   <tr>
     <td>Ihr Name:</td>
     <td><input name="nick"
        <?php
          if(isset($_POST["nick"]))
            echo "value='" . $_POST["nick"] . "'";
       ?>
        size="20"></td>
     <td align="center">
        <a href="javascript:reload();">Chat laden</a></td>
     <td align="right"><a href="javascript:send();">Senden</a></td>
   </tr>

   <tr>
      <td valign="top">Ihr Beitrag:</td>
      <td colspan="3"><textarea cols="50"
            rows="2" name="beitrag"></textarea></td>
   </tr>
</table>
</form>

</body></html>
