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


// make an array and output it
$data = Array ();
$data[] = true;
$data[] = false;
$data[] = true;
$data[] = false;
$data[] = true;
$data[] = false;

// Send the data.
echo json_encode($data);
