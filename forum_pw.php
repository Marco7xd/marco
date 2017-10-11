<!DOCTYPE html><html><head><meta charset="utf-8"></head>
<body>
<?php
/* Zufallszahlengenerator initialisieren */
mt_srand((double)microtime()*1000000);

/* Jeweils eine zufällige Kombination erzeugen */
for($i=1; $i<=4; $i++)
{
   /* Keine Kombination doppelt erzeugen */
   do
   {
      $vorhanden = 0;
      $pw[$i] = "";

      /* Kombination besteht aus drei kleinen Buchstaben ... */
      for ($k=1; $k<=3; $k++)
         $pw[$i] .= chr(random_int(97,122));

      /* ... und drei Ziffern */
      for ($k=1; $k<=3; $k++)
         $pw[$i] .= chr(random_int(48,57));

      /* Mit allen bisherigen Kombinationen vergleichen */
      for($m=1; $m<$i; $m++)
      {
         if($pw[$m] == $pw[$i])
         {
            $vorhanden=1;
            break;
         }
      }
   }
   while($vorhanden==1);
}

/* Kombinationen in die Datenbank schreiben */
$con = mysqli_connect("", "root", "rooter");
mysqli_select_db($con, "forum");

$num = 0;
for($i=1; $i<=4; $i++)
{
   $sql = "UPDATE teilnehmer SET passwort = '$pw[$i]' WHERE id = " . $i;
   echo $sql . "<br>";
   mysqli_query($con, $sql);
   $num += mysqli_affected_rows($con);
}
mysqli_close($con);

echo "Betroffen: $num";
?>
</body>
</html>
