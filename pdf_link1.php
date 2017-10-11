<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
require("fpdf/fpdf.php");

$pdf = new FPDF();
$pdf->SetFont("Helvetica", "", 11);

$pdf->AddPage();
$pdf->Write(10, "Inhalt:");
$pdf->Ln();

/* Start des Hyperlinks */
$pdf->SetFont("", "U");
$seite2 = $pdf->AddLink();
$pdf->Write(10, "zu Seite 2", $seite2);
$pdf->SetFont("", "");
$pdf->Ln();

$pdf->Write(10, "Ende Inhalt");

/* Ziel des Hyperlinks */
$pdf->AddPage();
$pdf->SetLink($seite2);

$pdf->Write(10, "Seite 2");
$pdf->Output("pdf_test.pdf");
?>
</body></html>
