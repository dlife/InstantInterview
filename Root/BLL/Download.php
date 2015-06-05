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
    if (file_exists('../temp/' . $filename)){
        ignore_user_abort(true);
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=".$filename."");
        header("Content-Transfer-Encoding: binary");
        header("Content-Type: binary/octet-stream");
        readfile($filename);
        if (connection_aborted()) {
            unlink($filename);
        }
    }

}

