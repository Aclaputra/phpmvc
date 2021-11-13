<?php

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
        // make a console.log in php
        function console_log($output, $with_script_tags = true) {
            $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
        ');';
            if ($with_script_tags) {
                $js_code = '<script>' . $js_code . '</script>';
            }
            echo $js_code;
        }
        /** $this=>parseURL()
         * 
         * fungsi utk mengambil value pada url website
         * value berisi index 0 sampai seterusnya sesuai banyak url
         * yg memisahkan tiap index adalah /
         */
        $url = $this->parseURL();
        //  fixed: Trying to access array offset on value of type null
        if($url == NULL) {
            $url = [$this->controller];
        }
        /** file_exists
         * check if file pada path dibawah + url index ke 0 .php- 
         * ada/exist pada folder app/controllers/ -> jika ada maka-
         * unset url index ke-0
         */ 
        $ctrlPath = '../app/controllers/';
        $FExist = file_exists($ctrlPath . $url[0] . '.php');
        if($FExist) {
            $this->controller = $url[0];
            /** unset() 
             * destroys the specified variables.
             * link documentation resmi: 
             * https://www.php.net/manual/en/function.unset
             */
            unset($url[0]);
            // var_dump($url);
            
            console_log("file in ".$ctrlPath." exists.");
            // echo nl2br("file in ".$ctrlPath." exists. \n");
        } else {
            console_log("file ".$ctrlPath." not exists.");
        }

        require_once $ctrlPath . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        /** isset
         * Determine if a variable is declared and is different than null
         * Determine if a variable is considered set, this means if a variable- 
         * is declared and is different than null.
         */
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                // method adalah variable di atas yg berisikan variable value
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if(!empty($url)) {
            $this->params = array_values($url);
            // echo 'Var_dump => '; 
            // var_dump($url);
        }

        /**  jalankan controller & method, serta kirimkan params jika ada
         * call_user_func_array(function, param_arr)
         * https://www.php.net/manual/en/function.call-user-func-array.php
         */
        call_user_func_array([$this->controller, $this->method], $this->params);
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