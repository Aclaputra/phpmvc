<?php

class Controller {
    public function view($view, $data = []) {
        // lokasi default berada di public/index.php
        $viewPath = "../app/views/";
        require_once $viewPath .  $view . '.php';
    }
}