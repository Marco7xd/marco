<!DOCTYPE html><html><head><meta charset="utf-8"></head>
<body>
<?php
   /* 1: Verbindung aufnehmen */
   $con = mysqli_connect("", "root", "rooter");

   /* 2: Liste der Datenbanken */
   $dbresult = mysqli_query($con, "SHOW DATABASES");

   /* 3: Anzahl der Datenbanken, Überschrift */
   $numdbs = mysqli_num_rows($dbresult);
   echo "<h3 align='center'>MySQL, Struktur und Inhalt aller $numdbs vorhandenen Datenbanken</h3>";

   /* 4: Schleife über alle Datenbanken */
   $d = 0;
   while($dbdsatz = mysqli_fetch_array($dbresult))
   {
      /* 5: Nummer und Name der Datenbank */
      $d++;
      $dbname = $dbdsatz[0];

      /* 6: Datenbank auswählen */
      mysqli_select_db($con, $dbname);

      /* 7: Liste der Tabellen der akt. Datenbank */
      $tabresult = mysqli_query($con, "SHOW TABLES FROM $dbname");

      /* 8: Anzahl der Tabellen */
      $numtabs = mysqli_num_rows($tabresult);
      if ($numtabs==1) $tabtext = "Tabelle";
      else             $tabtext = "Tabellen";

      /* 9: Tabelle beginnen, Überschrift */
      echo "<table border='1' width='100%'><tr>"
        . "<td colspan='8' bgcolor='#c3c3c3'>"
        . "<b>Datenbank $d: $dbname</b><br>"
        . "$numtabs $tabtext</td></tr>";

      /* 10: Schleife über alle Tabellen */
      $t = 0;
      while($tabdsatz = mysqli_fetch_array($tabresult))
      {
         /* 11: Nummer und Name der Tabelle */
         $t++;
         $tabname = $tabdsatz[0];

         /* 12: Liste der Felder der akt. Tabelle */
         $fdresult = mysqli_query($con, "SHOW COLUMNS FROM $tabname");

         /* 13: Anzahl der Felder */
         $numfds = mysqli_num_rows($fdresult);
         if ($numfds==1) $fdtext = "Feld";
         else            $fdtext = "Felder";

         /* 14: Anzahl der Datensätze */
         $dataresult = mysqli_query($con, "SELECT * FROM $tabname");

         if (!$dataresult) $numdata = -1;
         else              $numdata = mysqli_num_rows($dataresult);

         /* 15: Anzeigebutton */
         if ($numdata==0)      $ft = "&nbsp;";
         elseif ($numdata==-1) $ft = "Anzeige-<br>problem";
         else
         {
            $ft = "<form action='db_browser_b.php' method='post'>"
              . "<input type='hidden' name='dbname' value='$dbname'>"
              . "<input type='hidden' name='tabname' value='$tabname'>"
              . "<input type='submit' value='ansehen'>"
              . "</form>";
         }

         /* 16: Tabelle der Felder, Überschrift */
         echo "<tr>"
           . "<td width='24%' bgcolor='#c3c3c3'>Tabelle $d / $t : $tabname<br>"
           . "$numfds $fdtext, $numdata Zeile(n)</td>"
           . "<td width='16%' align='center' bgcolor='#c3c3c3'>$ft</td>"
           . "<td width='16%' bgcolor='#c3c3c3'>Name:</td>"
           . "<td width='16%' bgcolor='#c3c3c3'>Typ:</td>"
           . "<td width='7%' bgcolor='#c3c3c3'>Null:</td>"
           . "<td width='7%' bgcolor='#c3c3c3'>Key:</td>"
           . "<td width='7%' bgcolor='#c3c3c3'>Default:</td>"
           . "<td width='7%' bgcolor='#c3c3c3'>Extra:</td>"
           . "</tr>";

         /* 17: Schleife über alle Felder */
         $f = 0;
         while($fddsatz = mysqli_fetch_array($fdresult))
         {
            /* 18: Nummer des Felds, Feldname, Feldtyp, Feldlänge und Feldflags */
            $f++;
            $fdname    = $fddsatz[0];
            $fdtype    = strtoupper($fddsatz[1]);
            $fdnull    = $fddsatz[2];
            $fdkey     = $fddsatz[3];
            $fddefault = $fddsatz[4];
            $fdextra   = strtoupper($fddsatz[5]);

            if (!$fdkey)     $fdkey = "&nbsp;";
            if (!$fddefault) $fddefault = "&nbsp;";
            if (!$fdextra)   $fdextra = "&nbsp;";

            /* 19: Ausgabe der Feldinformationen */
            echo "<tr>"
              . "<td colspan='2'>Feld $d / $t / $f :</td>"
              . "<td>$fdname</td>"
              . "<td>$fdtype</td>"
              . "<td>$fdnull</td>"
              . "<td>$fdkey</td>"
              . "<td>$fddefault</td>"
              . "<td>$fdextra</td>"
              . "</tr>";
         }
      }

      /* 20: Tabelle beenden */
      echo "</table><p>&nbsp;</p>";
   }
   
   mysqli_close($con);
?>
</body>
</html>
