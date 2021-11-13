<?php

class About {
    public function index($nama = 'Anonymous', $pekerjaan = 'Sodomi') {
        echo "Halo, nama saya $nama, saya adalah seorang $pekerjaan";
    }
    public function page() {
        echo 'about/page';
    }
}