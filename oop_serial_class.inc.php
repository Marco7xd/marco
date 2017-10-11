<?php
class Fahrzeug
{
   private $bezeichnung;
   private $geschwindigkeit;
   private $farbe;

   function __construct($bz, $ge, $fa)
   {
       $this->bezeichnung = $bz;
       $this->geschwindigkeit = $ge;
       $this->farbe = $fa;
   }

   function __toString()
   {
       return "$this->bezeichnung"
          . " $this->geschwindigkeit km/h"
          . " $this->farbe";
   }
}
?>
