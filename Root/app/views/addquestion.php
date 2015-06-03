<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 3/06/2015
 * Time: 22:02
 */

include('../../vendor/autoload.php');

$compId = 0;
parse_str($_SERVER['QUERY_STRING']); // parses the query string and makes vars with the keys

if (isset($q)) {
    var_dump($q); // question to be added
}
if (isset($c)) {
    $compId = intval($c);
    var_dump($compId); // competence Id;
}

// to do here:

if ($q != "" & $compId != 0) {

// perform data verification (absolutely needed !!)
// use the stored procedure parameters: question and competence Id
// uncomment the location.reload in scripts.js to make the page refresh itself so the result can be seen.

}