<?php
/* Klasse "Aufgabe" */
class Aufgabe
{
   private $nr;
   private $gesamt;
   private $ergebnis;
   
   function __construct($i, $anzahl)
   {
      $this->nr = $i;
      $this->gesamt = $anzahl;
      $this->stellen();
   }

   function stellen()
   {
      $a = rand(10,30);
      $b = rand(10,30);
      $this->ergebnis = $a + $b;
      echo "<tr><td>Aufgabe $this->nr von $this->gesamt : "
         . "$a + $b = </td><td><input name='eingabe[$this->nr]'"
         . " size='12'></td></tr>";
   }

   function pruefen($eingabe)
   {
      if($eingabe == $this->ergebnis)
         return 1;
      else
         return 0;
   }
}
?>
