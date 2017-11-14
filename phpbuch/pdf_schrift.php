<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
require("fpdf/fpdf.php");

$pdf = new FPDF();
$pdf->SetFont("Helvetica", "B", 24);
$pdf->SetTextColor(255, 0, 0);

$pdf->AddPage();
$text = "Das ist ein längerer Text, "
   . "der sich über mehrere Zeilen erstreckt.";
$pdf->Write(20, $text);

$pdf->SetFontSize(12);
$pdf->Ln();
$pdf->Write(20, "Neue Zeile");

$pdf->SetFont("","I");
$pdf->Ln(10);
$pdf->Write(20, "Ende");

$pdf->Output("pdf_test.pdf");
?>
</body></html>
