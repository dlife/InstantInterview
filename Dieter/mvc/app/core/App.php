<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 9/05/2015
 * Time: 12:11
 */
class App
{

    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $this->parseUrl();
    }

    public function parseUrl()
    {
        if(isset($_GET['url'])){
           return $url = explode('/',filter_var(rtrim($_GET['url'], '/'),FILTER_SANITIZE_URL));
        }
    }
}