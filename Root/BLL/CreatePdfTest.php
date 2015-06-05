<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 4/06/2015
 * Time: 7:58
 */
include_once('../vendor/autoload.php');



$pdf = new \BLL\CreatePdf(new \DAL\InterviewContext(),new \BLL\PDF(), '../web/tempData/');
$array = [1,2,31,4,11,50,15,18,40,7,9];
$fId = 2;

$pdf->ParseData($array,$fId);
$pdf->GetData();
$pdf->BuildPdf();
$pdf->OutputDirect();
