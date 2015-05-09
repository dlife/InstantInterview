<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 9/05/2015
 * Time: 14:29
 */

class App
{
    protected $controller = 'home';

    protected $method = 'index';

    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        echo 'app constructed';
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])){
            return $url=explode('/',filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));
        }
    }
}
