<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 6/05/2015
 * Time: 12:48
 */
class Input{
    public static function exists($type = 'post'){
        switch($type){
            case 'post':
                return (!empty($_POST)) ? true : false;
                break;
            case 'get':
                return (!empty($_GET)) ? true : false;
                break;
            default:
                return false;
            break;
        }
    }

    public static function get($item){
    if(isset($_POST[$item])){
        return $_POST[$item];
    } elseif(isset($_GET[$item])){
        return $_GET[$item];
    }
    }
}