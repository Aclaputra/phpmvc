<?php

class Home extends Controller {
    public function index(){
        // panggil function view($view, $data = []) di core/Controller.php 
        $this->view('home/index');
    }
}