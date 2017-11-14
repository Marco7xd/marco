<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<table border="1">
<?php
   function objektliste()
   {
      /* Aktuelles Verzeichnis ermitteln */
      $verz = getcwd();

      /* Handle für aktuelles Verzeichnis */
      $handle = opendir(".");

      while ($dname = readdir($handle))
      {
         if($dname!="." && $dname!="..")
         {
            /* Falls Unterverzeichnis */
            if(is_dir($dname))
            {
               chdir($dname);  // nach unten
               objektliste();  // rekursiv
               chdir("..");    // nach oben
            }

            /* Falls Datei */
            else
               echo "<tr><td>$verz</td><td>$dname</td></tr>";
         }
      }
      closedir($handle);
   }

   /* Startverzeichnis */
   chdir("D:/wampstack/apache2/conf");

   /* Erster Aufruf der Funktion */
   objektliste();
?>
</table>
</body></html>
