<?php

namespace BLL;

class CreatePdf
{
    protected $fId;
    protected $questionString;
    protected $PdfData;
    protected $Pdf;
    protected $name;
    protected $fpdf;
    protected $context;

    public function __construct($_context, $_fpdf)
    {
        $this->context = $_context;
        $this->fpdf = $_fpdf;
    }

    public function parseData($array, $funcId)
    {
        try {
            $funcId = intval($funcId);
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
        $idList = preg_replace("/[^0-9,]/", "", $this->questionString);
        $this->PdfData = $this->context->selectReportData($idList);
    }

    public function buildPdf()
    {
        $this->fpdf->AliasNbPages();
        $this->fpdf->AddPage();
        $this->fpdf->SetFont("Arial", "", 12);

        if ($this->PdfData[0]['CompNaam'] == null) { // should not be empty
            return;
        }

        $comp = "";
        $data = array();
        foreach ($this->PdfData as $datarow) {
            if ($datarow['CompNaam'] != $comp) {
                // if new competence, create a new array
                $data[$datarow['CompNaam']] = array();
                $comp = $datarow['CompNaam'];
            }
            array_push($data[$datarow['CompNaam']], $datarow['Vraag']); // put question in the array
        }

        foreach ($data as $key => $value) {
            $comp = $key;
            $this->fpdf->Cell(50, 10, $comp, 1, 1);
            foreach ($value as $vraag) {
                $this->fpdf->MultiCell(0, 10, $vraag, 1, 1);
            }
            $this->fpdf->Ln(10);
        }
        $t = time();
        $this->name = 'Interview_' . date('Y-m-d_H-i-s', $t) . '.pdf';
    }

    public function outputDirect()
    {
        $this->fpdf->Output($this->name, 'I');
    }

    public function outputToDownloadLater()
    {
        $this->fpdf->Output('../temp/' . $this->name, 'F');
    }

    public function getName()
    {
        return $this->name;
    }
}