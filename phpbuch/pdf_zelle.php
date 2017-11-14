<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
require("fpdf/fpdf.php");

$pdf = new FPDF();
$pdf->SetFont("Helvetica", "B", 24);
$pdf->AddPage();
$pdf->Cell(50, 20, "Hallo");
$pdf->Output("pdf_test.pdf");
?>
</body></html>
