<?php

class Home extends Controller {
    public function index(){
        // panggil function view($view, $data = []) di core/Controller.php 
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index');
        $this->view('templates/footer');
    }
}