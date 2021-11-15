<?php

class Home extends Controller {
    public function index(){
        
        /** panggil function model setelah itu panggil method di dalamnya yaitu getUser();
         * Setiap user yang masuk akan dikirimkan ke $data['nama']
         */
        $data['nama'] = $this->model('User_model')->getUser();
        // panggil function view($view, $data = []) di core/Controller.php 
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        // kirim $data['nama'] ke home
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}