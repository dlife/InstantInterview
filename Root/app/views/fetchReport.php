<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 2/06/2015
 * Time: 9:05
 */
include('../../vendor/autoload.php');

$controller = new Controller\Controller();

// Prevent caching.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');
// The JSON standard MIME header.
header('Content-type: application/json');

// request the data and put it in $jsondata
$request_body = file_get_contents('php://input');
$jsondata = json_decode($request_body);

// Use controller to get the right data to return
//$dataReturn = $controller->getReport($jsondata);

// output again using JSON
echo json_encode($jsondata);

// check David/JSONTesting/index3.php en David/JSONTesting/postfetchdata.php

