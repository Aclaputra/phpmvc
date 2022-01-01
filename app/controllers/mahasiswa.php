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

    public function detail($id) {

        $data['judul'] = 'Detail Mahasiswa';
        /**
         * 1. panggil function model, panggil method di dalamnya 
         * hasil sudah array ASSOCiative kirim data ke viewnya
         * menggunakan function view
         * $this->view('mahasiswa/index', $data);
         */
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function add() {
        /** panggil function addDataMahasiswa masukkan data dri $_POST & jika > 0 atau exist
         * heading balik ke mahasiswa home & exit;
         */
        $this->model('Mahasiswa_model')->addDataMahasiswa($_POST);
        if($_POST > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('Location: '. BASEURL .'/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: '. BASEURL .'/mahasiswa');
            exit;
        }
    }
    public function delete($id) {
        /** panggil function addDataMahasiswa masukkan data dri $_POST & jika > 0 atau exist
         * heading balik ke mahasiswa home & exit;
         */
        $this->model('Mahasiswa_model')->deleteDataMahasiswa($id);
        if($id > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('Location: '. BASEURL .'/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: '. BASEURL .'/mahasiswa');
            exit;
        }
    }
}