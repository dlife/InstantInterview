<?php

include_once('../vendor/autoload.php');



$pdf = new createPdf();
$array = [1,2,'dummy',4];
$fId = 2;

$pdf->ParseData($array,$fId);
$pdf->GetData();

class createPdf
{

    protected $fId;
    protected $questionString;
    protected $PdfData;
    public function ParseData($array, $funcId)
    {
        try {
            $funcId = intval($funcId);
            print $funcId.'<Br>';
            foreach($array as $val)
            {
                $valint=intval($val);
                if($valint!=0){
                    if(strlen($this->questionString)!=0) {
                        $this->questionString .= ",$valint";
                        print $this->questionString . '<Br>';
                    }
                    else{
                        $this->questionString .= "$valint";
                        print $this->questionString . '<Br>';
                    }
                }
            }
        }
        catch(Exception $e)
        {
           echo $e;
        }

    }

    public function GetData ()
    {
        $context = new DAL\InterviewContext();
        $idList =preg_replace("/[^0-9,]/","",$this->questionString);
        $PdfData=$context->SelectReportData($idList);
        print_r($PdfData);
    }

    public function BuildPdf()
    {

    }

    public function ExportPdf()
    {

    }
}