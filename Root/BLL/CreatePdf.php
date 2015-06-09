<?php

namespace BLL;

class CreatePdf
{
    protected $fId;
    protected $questionString;
    protected $pdfData;
    protected $preparedData;
    protected $Pdf;
    protected $name;
    protected $fpdf;
    protected $context;
    protected $tempFolder;
    protected $line;

    public function __construct($_context, $_fpdf, $_tempFolder)
    {
        $this->context = $_context;
        $this->fpdf = $_fpdf;
        $this->tempFolder = $_tempFolder;
        $this->line = str_repeat('.', 160);
    }

    public function parseData($array, $funcId)
    {
        // prepares a string to use in the stored procdedure.
        try {
            foreach ($array as $val) {
                $valint = intval($val);
                if ($valint != 0) {
                    if (strlen($this->questionString) != 0) {
                        $this->questionString .= ",$valint";
                    } else {
                        $this->questionString .= "$valint";
                    }
                }
            }
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function getData()
    {
        // loads pdfData with the resultset from the stored procedure
        $idList = preg_replace("/[^0-9,]/", "", $this->questionString);
        $this->pdfData = $this->context->selectReportData($idList);
    }

    private function prepareData()
    {
        // prepares the data for easy use later.
        if (isset($this->pdfData[0]['CompNaam'])) { // should not be empty
            return;
        }

        $comp = "";
        $data = array();
        foreach ($this->pdfData as $datarow) {
            if ($datarow['CompNaam'] != $comp) {
                // if new competence, create a new array
                $data[$datarow['CompNaam']] = array();
                $comp = $datarow['CompNaam'];
            }
            array_push($data[$datarow['CompNaam']], $datarow['Vraag']); // put question in the array
        }

        $this->preparedData = $data;
    }

    public function buildPdf()
    {
        // creates the actual pdf file
        $this->fpdf->AliasNbPages();
        $this->fpdf->AddPage();
        $this->fpdf->SetFont("Arial", "", 12);

        $this->prepareData();

        foreach ($this->preparedData as $key => $value) {
            $this->fpdf->SetTextColor(68, 110, 155);
            $this->fpdf->Cell(0, 10, $key, 0, 1);
            $this->fpdf->SetTextColor(0, 0, 0);
            $this->fpdf->Ln(0);
            foreach ($value as $vraag) {
                $this->fpdf->SetTextColor(0, 0, 0);
                $this->fpdf->MultiCell(0, 5, $vraag, 0, 1);
                $this->fpdf->Ln(0);
                $this->addTripleLine();
                $this->fpdf->Ln(5);
            }
            $this->fpdf->Ln(0);
        }
        $t = time();
        $this->name = 'Interview_' . date('Y-m-d_H-i-s', $t) . '.pdf';
    }

    private function addTripleLine()
    {
        // add three dotted lines
        for ($i = 0; $i < 3; $i++) {
            $this->fpdf->Cell(0, 10, $this->line, 0, 1);
            $this->fpdf->Ln(-2);
        }
    }

    public function outputDirect()
    {
        $this->fpdf->Output($this->name, 'I');
    }

    public function outputToDownloadLater()
    {
        $this->fpdf->Output($this->tempFolder . $this->name, 'F');
    }

    public function getName()
    {
        return $this->name;
    }
}