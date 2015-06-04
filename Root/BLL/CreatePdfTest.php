<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 4/06/2015
 * Time: 7:58
 */
include_once('../vendor/autoload.php');



$pdf = new \BLL\createPdf(new \DAL\InterviewContext(),new \BLL\PDF(), '../web/tempData/');
$array = [1,2,31,4,11,50];
$fId = 2;

$pdf->ParseData($array,$fId);
$pdf->GetData();
$file = $pdf->BuildPdf();
$file->Output($this->path . $this->name,'I');
//$pdf->ExportPDF();