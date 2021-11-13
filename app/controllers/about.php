<?php

class About extends Controller{
    public function index($nama = 'Acla', $umur = 21 , $pekerjaan = 'Software engineer') {

        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $this->view('about/index', $data);
    }
    public function page() {
        $this->view('about/page');
    }
}