とても面白かった動画で、今度またジェロムさんとコラボして欲しい<?php

class App {
    /** protected
     * the property or method can be accessed within the class and-
     * by classes derived from that class
     * link documentation resmi:
     * https://www.w3schools.com/php/php_oop_access_modifiers.asp
     */
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        /** $this=>parseURL()
         * 
         * fungsi utk mengambil value pada url website
         * value berisi index 0 sampai seterusnya sesuai banyak url
         * yg memisahkan tiap index adalah /
        **/
        $url = $this->parseURL();
        
        /** 
         * check if file pada path dibawah + url index ke 0 .php- 
         * ada/exist pada folder app/controllers/ -> jika ada maka-
         * unset url index ke-0
         **/ 
        if(file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            /** unset() destroys the specified variables.
             * link documentation resmi: 
             * https://www.php.net/manual/en/function.unset
            */
            unset($url[0]);
            // var_dump($url);
            echo 'file in app/controllers/ exists. ';
        } else {
            echo 'file app/controllers/ not exists. ';
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method 
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                // method adalah variable di atas yg berisikan variable value
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if(!empty($url)) {
            echo 'Var_dump => '; 
            var_dump($url);
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