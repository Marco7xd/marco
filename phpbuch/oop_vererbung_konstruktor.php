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
      return "Geschwindigkeit: $this->geschwindigkeit<br>";
   }
}

class Pkw extends Fahrzeug
{
   private $insassen;

   function __construct($ge, $anz)
   {
      $this->insassen = $anz;
      parent::__construct($ge);
   }

   function einsteigen($anzahl)
   {
      $this->insassen += $anzahl;
   }

   function aussteigen($anzahl)
   {
      $this->insassen -= $anzahl;
   }

   function __toString()
   {
      return "Insassen: $this->insassen "
         . parent::__toString();
   }
}

$fiat = new Pkw(0,0);
echo $fiat;

$fiat->einsteigen(3);
$fiat->beschleunigen(30);
echo $fiat;

$fiat->beschleunigen(-30);
echo $fiat;

$fiat->aussteigen(1);
echo $fiat;
?>
</body></html>
