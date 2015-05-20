<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 20/05/2015
 * Time: 20:11
 */

// Prevent caching.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');
// The JSON standard MIME header.
header('Content-type: application/json');

// request the data and put it in $jsondata
$request_body = file_get_contents('php://input');
$jsondata = json_decode($request_body);

// output again using JSON
echo json_encode($jsondata);