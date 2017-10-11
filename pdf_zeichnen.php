<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
require("fpdf/fpdf.php");

$pdf = new FPDF();
$pdf->SetFont("Helvetica", "", 11);
$pdf->SetLineWidth(1);

/* Linie */
$pdf->AddPage();
$pdf->Ln();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x, $y, $x+15, $y+10);

/* Rechteck */
$pdf->SetY($y+15);
$pdf->Ln();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Rect($x, $y, 15, 10);

/* Gefülltes Rechteck */
$pdf->SetY($y+15);
$pdf->Ln();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFillColor(0, 0, 255);
$pdf->Rect($x, $y, 15, 10, "DF");

$pdf->Output("pdf_test.pdf");
?>
</body></html>
