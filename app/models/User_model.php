<?php

class User_model {
    private $nama = 'Acla Putra';

    // buat function untuk ambil user yaitu getUser()
    public function getUser() {
        return $this->nama;
    }
}