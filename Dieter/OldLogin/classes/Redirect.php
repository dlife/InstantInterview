<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 6/05/2015
 * Time: 12:49
 */
class Redirect {
    public static function to($location = null){
        if($location){
            if(is_numeric($location)){
            switch($location) {
                case 404:
                    header('HTTP/1.0 404 Not Found');
                    include 'includes/errors/404.php';
                    exit();
                break;
                case 404:

                    break;
                case 404:

                    break;
            }
            }
            header('Location: '.$location);
            exit();
        }
    }
}