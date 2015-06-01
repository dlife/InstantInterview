<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 13/05/2015
 * Time: 20:59
 */

require('fpdf.php');


class PDF extends FPDF
{
    function FirstTable($header, $data)
    {
        // Header
        $this->PrintFirstTableRow($header, true);

        // Data
        foreach($data as $row) {
            $this->PrintFirstTableRow($row, false);
        }
    }

    function PrintFirstTableRow($row, $isHeader)
    {
        // breedte, hoogte, tekst, rand, ln, align, fill, link
        $x=0;
        foreach ($row as $col) {
            $offset = ($x == 1 ? 70 : 30);
            $align = $isHeader ? '' : ($x == 1 ? '' : 'R');
            $this->Cell($offset, 6, $col, 1,0, $align);
            $x++;
        }
        $this->Ln();
    }

    function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';',trim($line));
        return $data;
    }

    function SecondTable($data, $footer)
    {

        // Data
        foreach($data as $row) {
            $this->PrintSecondTableRow($row, false);
        }

        // Footer
        $this->PrintSecondTableRow($footer, true);
    }

    function PrintSecondTableRow($row, $isFooter)
    {
        // breedte, hoogte, tekst, rand, ln, align, fill, link
        $x=0;
        foreach ($row as $col) {
            $offset = ($x == 0 ? 130 : 30);
            $this->SetFont('Arial', $isFooter ? 'B' : '', $isFooter ? 12 : 10);
            $this->Cell($offset, 6, $col, 1,0, 'R');
            $x++;
        }
        $this->Ln();
    }

    function NAWTAble($data)
    {
        $x=0;
        // Data
        foreach($data as $row) {
            if ($x < 6) {
                $this->PrintNAW1Row($row);
            } else if ($x < 10) {
                $this->PrintNAW2Row($row);
            } else {
                $this->PrintNAW3Row($row);
            }

            $x++;
        }
    }

    function PrintNAW1Row($row)
    {
        $this->Cell(0, 5, $row[0], 0, 0);
        $this->Ln();
    }

    function PrintNAW2Row($row)
    {
        // breedte, hoogte, tekst, rand, ln, align, fill, link
        $this->SetX(140);
        $this->Cell(0, 5, $row[0], 0, 0);
        $this->Ln();
    }

    function PrintNAW3Row($row)
    {
        // breedte, hoogte, tekst, rand, ln, align, fill, link
        $this->Cell(0, 5, $row[0], 0, 0);
        $this->SetX(40);
        $this->Cell(0, 5, $row[1], 0, 0);
        $this->Ln();
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$header = array('Art.', 'Omschrijving', 'Aantal', 'E.P.', 'T.P.');
$footer = array('Totaal te betalen', '', '128.93');
$data0=$pdf->LoadData('data3.txt');
$pdf->NAWTable($data0);
$data=$pdf->LoadData('data.txt');
$pdf->FirstTable($header, $data);
$data2=$pdf->LoadData('data2.txt');
$pdf->SecondTable($data2, $footer);

$pdf->Output();

