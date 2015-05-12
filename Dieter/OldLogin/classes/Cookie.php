<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 6/05/2015
 * Time: 12:47
 */
class Cookie{
    public static function exists($name){
        return (isset($_COOKIE[$name])) ? true : false;
    }

    public static function get($name){
        return $_COOKIE[$name];
    }

    public static function put($name, $value, $expiry){
        if(setcookie($name, $value, time()+ $expiry, '/')){
            return true;
        }
        return false;
    }

    public static function delete($name){
        // delete
        self::put($name, '', time()-1);
    }



}