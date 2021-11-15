<?php

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    /** PHP PDO (PHP DATA OBJECT)
     * lebih mudah daripada drivernya mysqli
     *
     * jangan menaruh username dan database kalian di file ini-
     * hrus di simpan di file lain biar ngga diakses sembarang orang
     * $dsn (data source name) utk koneksi ke PDO
     */

    // ambil data dari variable $mhs dan kembalikan nilainya dgn return
    public function getAllMahasiswa() {
        /** panggil db pda construct yg memanggil class Database
         * panggil function query dan masukkan argumen yg dibutuhkan
         * return kembalikan nilai pd class database menggunakan function resultSet()
         */
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id) {
        /**
         * panggil function query dan masukkan argumen yg dibutuhkan
         * select * from mahasiswa where id = :id utk menyimpan data yg kita binding
         * id tidak dimasukkan langsung $id utk menghindari sql injection
         * id dimasukkan melalui function bind($param, $value, $type = null)
         * panggil function bind 
         */
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        // id pada WHERE id diisi dengan $id pada argumen getMahasiswaById
        $this->db->bind('id', $id);
        // isi cuma satu pakai function single() dripada resultSet() utk all
        return $this->db->single();
    }
}