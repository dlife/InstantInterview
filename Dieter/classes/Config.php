<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 6/05/2015
 * Time: 12:47
 */
class Config {
    public static function get($path = null){
        if($path){
            $config = $GLOBALS['config'];
            $path = explode('/', $path);

            foreach($path as $bit){
                if(isset($config[$bit])){
                    $config = $config[$bit];
                }
            }
            return $config;
        }
        return false;
    }
}