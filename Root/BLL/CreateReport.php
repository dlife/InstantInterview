<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 2/06/2015
 * Time: 9:05
 */
include('../vendor/autoload.php');

$dataController = new BLL\DataController();

// set headers
header('Content-type: text/html; charset=UTF-8') ;
// request the data and put it in $jsondata
$request_body = file_get_contents('php://input');
$jsondata = json_decode($request_body);
$name = $dataController->getReport($jsondata);
echo $name;

