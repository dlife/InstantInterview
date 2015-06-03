<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 3/06/2015
 * Time: 22:02
 */

include('../../vendor/autoload.php');


parse_str($_SERVER['QUERY_STRING']); // parses the query string and makes vars with the key => $q is created
if (isset($q)) {
    var_dump($q); // loads all data needed to construct the view
}
echo 'tst';

