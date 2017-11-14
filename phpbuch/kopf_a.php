<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
/* Initialisierung Zufallszahlengenerator */
srand((double)microtime()*1000000);

/* Dokumentbeginn */
echo "<p><b>Kopfrechnen</b></p>";

/* Falls kein Name eingetragen */
if($_POST["spielername"] == "")
{
   echo "<p>Kein Name, kein Spiel</p>";
   echo "<a href='kopf.htm'>Zum Start</a>";
   echo "</body>";
   echo "</html>";
   exit;
}

/* Formularbeginn */
echo "<form action='kopf_b.php' method='post'>";

/* Spielername */
echo "<p>Hallo <b>" . $_POST["spielername"]
   . "</b>, Ihre Aufgaben</p>";
echo "<input name='spielername' type='hidden' value='"
   . $_POST["spielername"] . "'>";

/* Tabellenbeginn */
echo "<table border='0'>";

/* 5 Aufgaben */
for($i=0; $i<5; $i++)
{
   /* Operatorauswahl */
   $opzahl = rand(1,5);

   /* Operandenauswahl */
   switch($opzahl)
   {
      case 1:
         $a = rand(-10,30);
         $b = rand(-10,30);
         $op = "+";
         $c = $a + $b;
         break;
      case 2:
         $a = rand(1,30);
         $b = rand(1,30);
         $op = "-";
         $c = $a - $b;
         break;
      case 3:
         $a = rand(1,10);
         $b = rand(1,10);
         $op = "*";
         $c = $a * $b;
         break;

      /* Sonderfall Division */
      case 4:
         $c = rand(1,10);
         $b = rand(1,10);
         $op = "/";
         $a = $c * $b;
         break;
      case 5:
         $a = rand(1,30);
         $b = rand(1,30);
         $op = "%";
         $c = $a % $b;
         break;
   }

   /* Tabellenzeile */
   echo "<tr>";
   echo "<td>" . ($i+1) . ". $a $op $b = </td>";
   echo "<td><input name='ein[$i]' size='12'></td>";
   echo "</tr>";

   /* Richtiges Ergebnis senden */
   echo "<input name='erg[$i]' type='hidden'
      value='$c'>";
}
?>
</table>
<p><input type="submit" value="Fertig"></p>
</form>
</body></html>
