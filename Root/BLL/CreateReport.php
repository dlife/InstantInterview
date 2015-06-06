<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 2/06/2015
 * Time: 9:05
 */
include('../vendor/autoload.php');

$dataController = new BLL\DataController();

// Send Headers
//header('Content-type: application/pdf');
//header('Content-Disposition: attachment; filename="temp1.pdf');
header('Content-type: text/html; charset=UTF-8') ;
// Send Headers: Prevent Caching of File
//header('Cache-Control: private');
//header('Pragma: private');
//header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

// request the data and put it in $jsondata
$request_body = file_get_contents('php://input');
$jsondata = json_decode($request_body);
//$return = $controller->GetReport($jsondata);
$name = $dataController->GetReport($jsondata);
echo $name;


//$return->Output('../../web/tempData/temp1.pdf','F');
//OutputToDownload
//echo "web/tempData/temp1.pdf";//readfile("../../web/tempData/temp1.pdf");
// Use controller to get the right data to return
//$dataReturn = $controller->getReport($jsondata);

// output again using JSON

// check David/JSONTesting/index3.php en David/JSONTesting/postfetchdata.php

