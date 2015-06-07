<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 4/06/2015
 * Time: 12:24
 */
namespace BLL;

class PDF extends \FPDF
{
    // Page header
    function Header()
    {
        // Logo
        //$this->Image('logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(70);
        // Title
        $this->Cell(50,10,'Interview Vragen',1,0,'C');
        // Line break
        $this->Ln(20);
    }

// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
