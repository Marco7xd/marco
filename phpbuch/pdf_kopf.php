<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
require("fpdf/fpdf.php");

class MyPDF extends FPDF
{
  function Header()
  {
      $this->SetFont("Helvetica", "B", 16);
      $this->Cell(0, 20, "Kopfzeile", "B", 1, "C");
  }
  
  function Footer()
  {
      $this->SetY(-20);
      $this->SetFont("Helvetica", "B", 8);
      $this->Cell(0, 10, "Seite "
         . $this->PageNo() . "/{nb}", "T", 0, "R");
  }
}

$pdf = new MyPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont("Helvetica", "B", 12);
for($i=1;$i<=60;$i++)
    $pdf->Cell(0, 10, "Zeile: " . $i, 0, 1);
$pdf->Output("pdf_test.pdf");
?>
</body></html>
