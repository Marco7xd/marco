<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
/* Definition der Klasse Mitarbeiter */
class Mitarbeiter
{
   /* Eigenschaften eines Mitarbeiters */
   private $id;
   private $nachname;
   private $vorname;
   private $bank;
   private $iban;
   private $bic;
   private $stundenlohn;
   private $summe_stunden;

   /* Daten eines Mitarbeiters erzeugen */
   function __construct($id, $na, $vo, $ba, $ib, $bi, $sl)
   {
      $this->id           = $id;
      $this->nachname     = $na;
      $this->vorname      = $vo;
      $this->bank         = $ba;
      $this->iban         = $ib;
      $this->bic          = $bi;
      $this->stundenlohn  = $sl;
      $this->summeStunden = 0;
   }

   /* Stunden eines Mitarbeiters erfassen */
   function stundenErfassen($anzahl)
   {
      $this->summeStunden += $anzahl;
   }

   /* Scheck eines Mitarbeiters ausdrucken */
   function scheckAusdruck()
   {
      $summeLohn = $this->summeStunden * $this->stundenlohn;
      echo "<p>Scheck:<br>"
        . "Name: $this->nachname, $this->vorname<br>"
        . "IBAN: $this->iban, BIC: $this->bic<br>"
        . "Bank: $this->bank, Betrag: $summeLohn &euro;</p>";
   }
}

/* Definition der Klasse Unternehmen */
class Unternehmen
{
   /* Eigenschaften eines Unternehmens */
   private $name;
   private $belegschaft;
   private $summeStundenUnbekannt;

   /* Daten eines Unternehmens erzeugen */
   function __construct($na)
   {
      /* Name der Firma */
      $this->name = $na;
      $this->summeStundenUnbekannt = 0;

      /* Mitarbeiterdatei lesen */
      $dp = fopen("oop_scheck_belegschaft.txt", "r");
      $zeile = fgets($dp, 100);
      while(!feof($dp))
      {
         $info = explode(",",$zeile);
         $id = $info[0];
         $this->belegschaft[$id] = new Mitarbeiter($id,
            $info[1], $info[2], $info[3], $info[4],
            $info[5], $info[6]);
         $zeile = fgets($dp, 100);
      }
      fclose($dp);
   }

   /* Stundendatei lesen */
   function stundenErfassen()
   {
      $dp = fopen("oop_scheck_stunden.txt", "r");
      $zeile = fgets($dp, 100);
      while(!feof($dp))
      {
         $info = explode(",", $zeile);
         $id = $info[0];
         if(array_key_exists($id,$this->belegschaft))
            $this->belegschaft[$id]->stundenErfassen($info[1]);
         else
            $this->summeStundenUnbekannt += $info[1];
         $zeile = fgets($dp, 100);
      }
      fclose($dp);
   }

   /* Alle Schecks ausdrucken */
   function scheckAusdruck()
   {
      foreach ($this->belegschaft as $schluessel=>$wert)
         $this->belegschaft[$schluessel]->scheckAusdruck();
   }
}

/* Hauptprogramm */
$un = new Unternehmen("MacroHard");
$un->stundenErfassen();
$un->scheckAusdruck();
?>
</body></html>
