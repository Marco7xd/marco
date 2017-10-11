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
   parent.ausgabe.location.href = "chat_text_aus.php";
}
</script>
</head>

<body>
<?php
/* Anhängen des neuen Textes, falls vorhanden */
if(isset($_POST["beitrag"]))
{
   $fp = @fopen("chat_text.txt","a");
   if($fp)
   {
      $jetzt = date("d.m.y H:i:s");
      $tabzeile =  "<tr><td>$jetzt</td><td>" . $_POST["nick"]
         . "</td><td>" . $_POST["beitrag"] . "</td></tr>\n";
      fputs($fp,$tabzeile);
   }
   fclose($fp);

   /* Chat-Anzeige aktualisieren */
   echo "<script type='text/javascript'>reload();</script>";
}
?>

<form name="f" action="chat_text_ein.php" method="post">
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
