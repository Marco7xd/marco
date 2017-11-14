<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* Auswahl der Pizza */
   if ($_POST["ptyp"] == "Napoli")           $preis = 5.7;
   else if ($_POST["ptyp"] == "Italia")      $preis = 6.3;
   else if ($_POST["ptyp"] == "Con Tutto")   $preis = 7.1;
   else if ($_POST["ptyp"] == "4 Stagioni")  $preis = 6.6;
   else                                      $preis = 7.8;

   /* Anrede und Beginn der Ausgabe */
   if ($_POST["anr"] == "Herr")
      echo "<p>Sehr geehrter Herr " . $_POST["bst"] . "</p>";
   else
      echo "<p>Sehr geehrte Frau " . $_POST["bst"] . "</p>";
   echo "<p>Wir liefern Ihre Pizza " . $_POST["ptyp"];

   /* Zusätze */
   if (isset($_POST["cth"]))
   {
      echo ", mit " . $_POST["cth"];
      $preis = $preis + 0.6;
   }
   if (isset($_POST["ces"]))
   {
      echo ", mit " . $_POST["ces"];
      $preis = $preis + 1.1;
   }

   echo "<br>in 20 Minuten an die folgende Adresse:<br>";
   echo $_POST["adr"] . "</p>";
   echo "<p>Preis: "
      . number_format($preis,2,",",".") . " &euro;</p>";
   echo "<p>Ihr Pizza-Team</p>";
?>
</body></html>
