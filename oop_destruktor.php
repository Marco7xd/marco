<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
class Fahrzeug
{
   private $geschwindigkeit;

   function __construct($ge)
   {
      $this->geschwindigkeit = $ge;
   }

   function beschleunigen($wert)
   {
      $this->geschwindigkeit += $wert;
   }

   function __toString()
   {
      return "Geschwindigkeit: "
         . "$this->geschwindigkeit <br>";
   }

   function __destruct()
   {
      echo "Destruktor<br>";
   }
}

$vespa = new Fahrzeug(20);
echo $vespa;
$vespa->beschleunigen(30);
echo $vespa;
?>
</body></html>
