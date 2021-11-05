<?php

class App {
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();
        
        if(file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
            var_dump($url);
            echo 'file exists';
        } else {
            echo 'file not exists';
        }
    }

    public function parseURL() {
        if(isset($_GET['url'])) {
            // trim "/" in url
            $url = rtrim($_GET['url'], '/');
            // agar url bersih dari karakter aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // url kita pecah dengan explode '/' dari url
            $url = explode('/', $url);
            return $url;
        }
    }
}