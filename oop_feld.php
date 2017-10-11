<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
class Bestellung
{
   private $bestellnr;
   private $posten;

   function __construct($bn, $pf)
   {
      $this->bestellnr = $bn;
      $this->posten = $pf;
   }

   function __toString()
   {
      $gesamt = 0;
      $ausgabe = "Bestellnr.: $this->bestellnr<br>";
      for($i=0; $i<count($this->posten); $i++)
      {
         // Nicht innerhalb der Zeichenkette
         $ausgabe .= "Posten " . ($i+1) . ": "
            . $this->posten[$i] . "<br>";
         $gesamt += $this->posten[$i]->postenpreis();
      }
      $ausgabe .= "Gesamtpreis: $gesamt &euro;<br>";
      return $ausgabe;
   }
}

class Bestellposten
{
   private $artikel;
   private $menge;
   private $preis;

   function __construct($ar, $me, $pr)
   {
      $this->artikel = $ar;
      $this->menge = $me;
      $this->preis = $pr;
   }

   function postenpreis()
   {
      return $this->menge * $this->preis;
   }

   function __toString()
   {
      return "$this->artikel, $this->menge St., "
         . "$this->preis &euro;";
   }
}

/* Hauptprogramm */
$meineBestellung = new Bestellung(583,
   array(new Bestellposten("Apfel", 3, 1.35),
         new Bestellposten("Banane", 5, 0.85),
         new Bestellposten("Mango", 2, 1.95)));
echo $meineBestellung;
?>
</body></html>
