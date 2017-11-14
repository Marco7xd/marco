<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
require("fpdf/fpdf.php");

$pdf = new FPDF();
$pdf->SetFont("Helvetica", "", 11);

$pdf->AddPage();
$pdf->Write(10, "Seite 1");
$pdf->Ln();

/* Externer Hyperlink */
$pdf->SetFont("", "U");
$pdf->Write(10, "extern", "http://localhost");
$pdf->Ln();

/* Hyperlink in einer Zelle */
$seite2 = $pdf->AddLink();
$pdf->Cell(40, 10, "zu Seite 2", 1, 1, "C", 0, $seite2);
$pdf->SetFont("", "");

/* Bild als Hyperlink */
$pdf->Image("im_blume.jpg", 65, 10, 20, 0, "", $seite2);

/* Hyperlink innerhalb eines Bildes */
$pdf->Image("im_blume.jpg", 100, 10, 20); 
$pdf->Link(100, 10, 20, 15, $seite2); 

/* Ziel des Hyperlinks */
$pdf->AddPage();
$pdf->SetLink($seite2);

$pdf->Write(10, "Seite 2");
$pdf->Output("pdf_test.pdf");
?>
</body></html>
