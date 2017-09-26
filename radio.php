<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   echo "Es geht also nach " . $_POST["rziel"];
   echo " in ein " . $_POST["htyp"] . "-Sterne-Hotel<br>";
   if ($_POST["rziel"] == "Gomera")
   {
     if ($_POST["htyp"] == "Drei") $ang = 7;
     else                          $ang = 1;
   }
else if ($_POST["rziel"] == "Lanzarote")

 {
    if ($_POST["htyp"] == "Drei") $ang = 12;
    else                          $ang = 2;
 }
else
 {
    if ($_POST["htyp"] == "Drei") $ang = 5;
    else                          $ang = 4;
 }

 echo "Dazu haben wir $ang Angebote";
 ?>
 </body></html>

