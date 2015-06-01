<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 13/05/2015
 * Time: 20:07
 */

require('fpdf.php');

class PDF extends FPDF{
    function Header()
    {

        $this->SetDrawColor(255,0,0);
        $this->SetFont('Arial', 'B', 18);
        $this->SetFillColor(255,255,100 );
        $this->SetTextColor(255,0,0);
        $this->Cell(0,20,'Oefening 1',1,1,'C', true);
        $this->Image('logocvoantwerpen.jpg',11,11,0,18);
        $this->Ln(1);

    }
    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial','I',8);
        // Print current and total page numbers
        $this->Cell(0,10,'Pagina '.$this->PageNo().' van {nb} - ' . date('l d F Y'),0,0,'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFont('Arial', '', 8);
$pdf->MultiCell(0, 3, file_get_contents('text.txt'),1);
$pdf->AddPage();
$pdf->Image('logocvoantwerpen.jpg');
$pdf->Cell(0,10,'Bijschrift',0,0);
$pdf->Ln(30);
$pdf->SetFont('Arial', '', 15);
// breedte, hoogte, tekst, rand, ln, align, fill, link
$pdf->Cell(0,10,'David Vlaminck',0,0);


// save as ddmmyyyy_hhmmss

$pdf->Output('CVO_DavidVlaminck_'.date(' dfY_His').'.pdf');
