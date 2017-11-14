<?php declare(strict_types=1); ?>
<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
class Fahrzeug
{
   private $geschwindigkeit;
   private $bezeichnung;

   function __construct($bez, $ge)
   {
      $this->bezeichnung = $bez;
      $this->geschwindigkeit = $ge;
   }

   function __toString()
   {
      return "$this->bezeichnung, "
         . "$this->geschwindigkeit km/h<br>";
   }

   static function kopieVon(Fahrzeug $ori):Fahrzeug
   {
      $neu = new Fahrzeug();
      $neu->bezeichnung = "Kopie von: " . $ori->bezeichnung;
      $neu->geschwindigkeit = $ori->geschwindigkeit;
      return $neu;
   }
}

$vespa = new Fahrzeug("Vespa Piaggio", 25);
$honda = Fahrzeug::kopieVon($vespa);
echo $honda;
?>
</body></html>
