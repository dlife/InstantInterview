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

// This ID parameter is sent by our javascript client.
$obj = $_POST['myData'];

// Here's some data that we want to send via JSON.
// We'll include the $id parameter so that we
// can show that it has been passed in correctly.
// You can send whatever data you like.
$obj_decoded = json_decode($obj);


$data = $obj;
$data = Array ();
$data[] = true;
$data[] = false;
$data[] = true;
$data[] = false;

// Send the data.
echo json_encode($data);
