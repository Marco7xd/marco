<!DOCTYPE html><html><head><meta charset="utf-8">
<title>Max in Australien</title>
<style type="text/css">
   body,td   {font-family:Verdana; font-size:10pt;
              background-color:#ffee00; color:#00008b}
   .li       {font-size:8pt}
</style>
</head>
<body>
<p align="center"><b>Max in Australien</b></p>
<table border="0" width="100%">

<?php
  /* DB-Abfrage */
  $con = mysqli_connect("", "root", "rooter");
  mysqli_select_db($con, "blog");
  $res = mysqli_query($con, "SELECT * FROM blogdaten"
    . " ORDER BY zeit DESC");

  while($dsatz = mysqli_fetch_assoc($res))
  {
    /* Zeiten */
    $z = $dsatz["zeit"];
    $zeit = mktime(substr($z,11,2), substr($z,14,2),
      substr($z,17,2), substr($z,5,2), substr($z,8,2),
      substr($z,0,4));
    $awst = strtotime("+7 hour", $zeit);

    /* Ausgabe */
    echo "<tr>";
    echo "<td valign='top' class='li'>" . date("d.m.y H:i", $zeit)
       . " MEZ<br>" . date("d.m.y H:i", $awst) . " AWST</td>";
    if($dsatz["art"] == 1)
      echo "<td valign='top' width='20%'>"
        . "<img src='" . $dsatz["text"] . "'></td>";
    else
      echo "<td valign='top' width='80%'>"
        . $dsatz["text"] . "</td>";
    echo "</tr>";
  }
  mysqli_close($con);

  echo "</table>";
?>

<p class="li">MEZ = Mitteleurop. Zeit,
AWST = Australian Western Standard Time</p>
</body></html>
