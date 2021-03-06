<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 4/06/2015
 * Time: 7:58
 */

// Valid test 08/06/2015 20:03

include_once('../vendor/autoload.php');

$pdf = new \BLL\CreatePdf(new \DAL\InterviewContext(), new \BLL\PDF(), "../temp/");
$array = [1,2,31,4,11,50,15,18,40,7,9]; // testdata
$fId = 2;

$pdf->parseData($array,$fId);
$pdf->getData();
$pdf->buildPdf();

// use this to see the result in the browser directly
$pdf->OutputDirect();
// or use this to create the file on the server (does not download automatically)
//$pdf->OutputToDownloadLater();

// do cleanup manually in the test
$datacontroller = new \BLL\DataController();
$datacontroller->deleteOldTempFiles();
