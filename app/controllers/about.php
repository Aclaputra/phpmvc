<?php

class About extends Controller{
    public function index($nama = 'Acla', $pekerjaan = 'Software engineer', $umur = 21) {
        $this->view('about/index');
    }
    public function page() {
        $this->view('about/page');
    }
}