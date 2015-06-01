<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 13/05/2015
 * Time: 19:23
 */



require('fpdf.php');


class PDF extends FPDF{
    function Header()
    {
        $this->Image('logocvoantwerpen.jpg');
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0,0,'Title',0,1,'C');
        $this->Ln(20);
    }
    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial','I',8);
        // Print current and total page numbers
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFont("Arial", "", 15);
// breedte, hoogte, tekst, rand, ln, align, fill, link
$pdf->Cell(20, 10, 'Mijn eerste pdf', 1,1);
$pdf->SetDrawColor(255,255,0);
$pdf->Cell(0,10,'Lijn2',1,1);
$pdf->SetFillColor(5,100,255);
$pdf->Cell(0,10,'Lijn3',1,1,'L',true);
$pdf->SetTextColor(0,0,255);
$pdf->Cell(0,10,'Lijn4',1,1);
$pdf->SetLineWidth(3);
$pdf->Cell(0,10,'Lijn5',1,1);




$pdf->AddPage();
$pdf->Output();

