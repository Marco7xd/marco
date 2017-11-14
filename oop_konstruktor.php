<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
/* Definition der Klasse Fahrzeug */
class Fahrzeug
{
	private $geschwindigkeit;
	private $bezeichnung;

    function __construct($bez, $ge)
    {
    	$this->bezeichnung = $bez;
    	$this->geschwindigkeit =$ge;
    }

    function beschleunigen($wert)
    {
    	$this->geschwindigkeit += $wert;
    }

    function __toString()
    {
    	return "$this->bezeichnung, "
    	   . "this->geschwindigkeit km/h<br>";
    }
}

/* Objekte erzeugen */
$vespa = new Fahrzeug("Vespa Piaggio",25);
$scania = new Fahrzeug("Scania TS 360",62);

/* Objekte ausgeben */
echo $vespa;
echo $scania;

/* Objekte verändern und ausgeben */
$vespa->beschleunigen(20);
echo $vespa;


// $vespa->__construct("Vespa Formosa", 35);
//echo $vespa;
?>
</body></html>