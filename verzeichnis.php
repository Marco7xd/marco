<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $verz = "D:/wampstack/apache2";
   chdir($verz);

   echo "<h2>Verzeichnis $verz</h2>";
   echo "<table border='1'>";

   /* Überschrift */
   echo "<td>Name</td>";
   echo "<td>Datei /<br>Verz.</td>";
   echo "<td>Readable /<br>Writeable</td>";
   echo "<td align='right'>Anzahl<br>Byte</td>";
   echo "<td>Letzte<br>Modifizierung</td>";

   /* Öffnet Handle */
   $handle = opendir($verz);

   /* Liest alle Objektnamen */
   while ($dname = readdir($handle))
   {
      echo "<tr>";
      echo "<td>$dname</td>";

      /* Datei oder Verzeichnis? */
      if(is_file($dname))
         echo "<td>D</td>";
      else if(is_dir($dname))
         echo "<td>V</td>";
      else
         echo "<td>&nbsp;</td>";

      /* Lesbar bzw. schreibbar? */
      echo "<td>";
      if(is_readable($dname)) echo "R";
      else echo "-";
      if(is_writeable($dname)) echo "W";
      else echo "-";
      echo "</td>";

      /* Zugriffsdaten */
      $info = stat($dname);
      echo "<td align='right'>$info[7]</td>";
      echo "<td>" . date("d.m.y H:i", $info[9]) . "</td>";
      echo "</tr>";
   }

   /* Schließt Handle */
   closedir($handle);
?>

</table>
</body></html>
