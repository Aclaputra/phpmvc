<?php

class Controller {
    public function view($view, $data = []) {
        // lokasi default berada di public/index.php
        $viewPath = "../app/views/";
        require_once $viewPath .  $view . '.php';
    }
    /** buat function model 
     * panggil file pada model folders berdasarkan argumen model($model)
    */
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        /** new $model
         * kembalikan nilai dengan instansiasi dahulu dengan new $model- 
         * karena memanggil class User_model
         */
        return new $model;
    }
}