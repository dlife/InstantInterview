<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 5/06/2015
 * Time: 17:12
 */

include('../vendor/autoload.php');

parse_str($_SERVER['QUERY_STRING']); // parses the query string and makes vars with the key => $q is created
if (isset($filename)) {
    $fullPath = '../web/tempData/';
    if (file_exists($fullPath . $filename)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fullPath.$filename));
        ob_clean();
        flush();
        readfile($fullPath.$filename);
        exit();
    }
}

