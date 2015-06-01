<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 13/05/2015
 * Time: 19:12
 */

require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial", "", 15);
// breedte, hoogte, tekst, rand, ln, align, fill, link
$pdf->Cell(20, 10, 'Mijn eerste pdf', 1,1);
$pdf->Cell(0,10,'Lijn2',1,1);

$pdf->Ln(50);
$pdf->Cell(0,10,'Lijn3',1,1);

$pdf->Output('example1.pdf','I');