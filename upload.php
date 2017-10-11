<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* Kontrolldaten */
   echo "<p>Zur Kontrolle:<br>";
   echo "Dateiname im Original: "
     . $_FILES["upfile"]["name"] . "<br>";
   echo "Anzahl Byte: "
     . $_FILES["upfile"]["size"] . "<br>";
   echo "Dateityp: "
     . $_FILES["upfile"]["type"] . "<br>";

   /* Dateiendung extrahieren */
   $dname = explode(".",$_FILES["upfile"]["name"]);
   $ext = $dname[count($dname)-1];
   echo "Dateiendung: $ext<br>";

   /* Temporärer Dateiname auf dem Server */
   echo "Dateiname auf dem Server: "
     . $_FILES["upfile"]["tmp_name"] . "</p>";

   /* Temporäre Datei dauerhaft an gewünschten Ort kopieren,
      falls sie vorhanden ist und die richtige Endung besitzt */
   if($_FILES["upfile"]["size"]>0 && $ext=="gif")
   {
      copy($_FILES["upfile"]["tmp_name"],"im_upload.gif");
      echo "<p>Datei wurde kopiert in im_upload.gif<br>";
      echo "<img src='im_upload.gif'></p>";
   }
   else
      echo "<p>Kopierfehler</p>";
?>
</body></html>
