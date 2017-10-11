<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
require("fpdf/fpdf.php");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image("im_blume.jpg", 50, 10, 30);
$pdf->Image("im_work.gif", 20, 10);
$pdf->Output("pdf_test.pdf");
?>
</body></html>
