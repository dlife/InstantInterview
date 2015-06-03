<?php

include_once('../vendor/autoload.php');



$pdf = new createPdf();
$array = [1,2,'dummy',4];
$fId = 2;

$pdf->ParseData($array,$fId);
$pdf->GetData();
$pdf->BuildPdf();
//$pdf->ExportPDF();

class createPdf
{

    protected $fId;
    protected $questionString;
    protected $PdfData;
    protected $Pdf;
    protected $name;

    public function ParseData($array, $funcId)
    {
        try {
            $funcId = intval($funcId);
           // print $funcId . '<Br>';
            foreach ($array as $val) {
                $valint = intval($val);
                if ($valint != 0) {
                    if (strlen($this->questionString) != 0) {
                        $this->questionString .= ",$valint";
            //            print $this->questionString . '<Br>';
                    } else {
                        $this->questionString .= "$valint";
               //         print $this->questionString . '<Br>';
                    }
                }
            }
        } catch (Exception $e) {
            echo $e;
        }

    }

    public function GetData()
    {
        $context = new DAL\InterviewContext();
        $idList = preg_replace("/[^0-9,]/", "", $this->questionString);
        $this->PdfData = $context->SelectReportData($idList);
    //    print_r($this->PdfData);
      //  echo '<Br><Br>';
    }

    public function BuildPdf()
    {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont("Arial", "", 15);
// breedte, hoogte, tekst, rand, ln, align, fill, link
//        echo 'testbuild<Br><Br>';
//        print_r($this->PdfData);
//        echo '<Br><Br>';

        foreach ($this->PdfData as $comp) {
            foreach ($this->PdfData as $vraag) {
//                echo $vraag['Vraag'] . '<Br>';
            }
        }
        $pdf->Cell(20, 10, 'Mijn eerste pdf', 1, 1);
        $pdf->Cell(0, 10, 'Lijn2', 1, 1);

        $pdf->Ln(50);
        $pdf->Cell(0, 10, 'Lijn3', 1, 1);
        $this->name = 'example2.pdf';
        $pdf->Output($this->name,'D');
    }

    public function ExportPDF()
    {
        $file = $this->name;

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }

    }
}