<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
require("fpdf/fpdf.php");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Output("pdf_test.pdf", "F");
// header("Location: pdf_test.pdf");
?>
</body></html>
