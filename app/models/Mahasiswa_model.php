<?php

class Mahasiswa_model {
    /** PHP PDO (PHP DATA OBJECT)
     * lebih mudah daripada drivernya mysqli
     * $dbh (database handler) utk koneksi ke database
     * $stmt (statement) utk menyimpan query
     */
    private $dbh;
    private $stmt;

    /**
     * jangan menaruh username dan database kalian di file ini-
     * hrus di simpan di file lain biar ngga diakses sembarang orang
     * $dsn (data source name) utk koneksi ke PDO
     */
    public function __construct() {
        $dsn = 'mysql:host=localhost;dbname=phpmvc';
        /** cek apakah koneksinya berhasil atau tidak
         * pangging PDO nya dgn new PDO()
         * catch ketika error tangkap exception masukkan-
         * ke dalam variabel $e
         * die($e->getMessage()); kalau error kasih pesan errornya
         */
        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    // ambil data dari variable $mhs dan kembalikan nilainya dgn return
    public function getAllMahasiswa() {
        /** this statement diisi dengan handlernya this dbh
         * jika pakai PDO query harus kita prepare dahulu-
         * baru masukkan query nya
         */

        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        // this statement kita execute
        $this->stmt->execute();
        /** ambil data dengan mereturn statement dan ambil semua data-
         * dengan menggunakan fetchAll(), kembalikan data sbagai-
         * array assosiatif
         */ 
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}