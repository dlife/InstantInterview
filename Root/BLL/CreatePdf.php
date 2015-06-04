<?php

namespace BLL;

include_once('../vendor/autoload.php');

class createPdf
{

    protected $fId;
    protected $questionString;
    protected $PdfData;
    protected $Pdf;
    protected $name;
    protected $fpdf;
    protected $context;

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
        $idList = preg_replace("/[^0-9,]/", "", $this->questionString);
        $this->PdfData = $this->context->SelectReportData($idList);
       // print_r($this->PdfData);

      //  echo '<Br><Br>';
    }

    public function BuildPdf()
    {
        $this->fpdf->AddPage();
        $this->fpdf->SetFont("Arial", "", 15);
// breedte, hoogte, tekst, rand, ln, align, fill, link

        /*for ($i=0; $i <=count($this->PdfData);$i++)
        {
            print_r( $this->PdfData['CompNaam'][$i]);
        }
        foreach ($this->PdfData as $comp) {
            foreach ($this->PdfData as $vraag) {
//                echo $vraag['Vraag'] . '<Br>';
            }
        }*/
        // Naam = competentie
        // // Vraag = vraag voluit

        //Needs rework door value key
        if ($this->PdfData[0]['CompNaam'] == null) { // should not be empty
            return;
        }
        $comp ="";
        $data = array();
        foreach ($this->PdfData as $datarow) {
            if ($datarow['CompNaam'] != $comp) {
                // if new competence, create a new array
                $data[$datarow['CompNaam']] = array();
                $comp = $datarow['CompNaam'];
            }
               array_push($data[$datarow['CompNaam']], $datarow['Vraag']); // put question in the array
        }

            // access data:

        $this->fpdf->Cell(20, 10, 'Mijn eerste pdf', 1, 1);
            foreach ($data as $key => $value) {
                $comp = $key;
                $this->fpdf->Cell(0, 10, $comp, 1, 1);
                foreach ($value as $vraag) {
                // gebruik
                    $this->fpdf->Cell(0, 10, $vraag, 1, 1);
                    $this->fpdf->Ln(50);
                }
            }
        $this->name = 'example2.pdf';
        $this->fpdf->Output(/*$this->name,'D'*/);

        }

    public function __construct($_context, $_fpdf){
        $this->context = $_context;
        $this->fpdf = $_fpdf;
    }
}