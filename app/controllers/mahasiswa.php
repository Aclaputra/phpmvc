<?php

class Mahasiswa extends Controller{
    public function index() {

        $data['judul'] = 'Daftar Mahasiswa';
        /**
         * 1. panggil function model, panggil method di dalamnya 
         * hasil sudah array ASSOCiative kirim data ke viewnya
         * menggunakan function view
         * $this->view('mahasiswa/index', $data);
         */
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}