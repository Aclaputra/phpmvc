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

    public function addDataMahasiswa($data) {
        $query = "INSERT INTO mahasiswa
                  VALUES
                  ('', :nama, :nim, :email, :jurusan)";
        // panggil function query masukkan variabel $query ke argumen
        $this->db->query($query);
        // panggil function bind 
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->myRowCount();
    }

    public function deleteDataMahasiswa($id) {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->myRowCount();
    }

    public function updateDataMahasiswa($data) {
        $query = "UPDATE mahasiswa SET nama = :nama, nim = :nim, email = :email, jurusan = :jurusan WHERE id = :id";
        // panggil function query masukkan variabel $query ke argumen
        $this->db->query($query);
        // panggil function bind 
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->myRowCount();
    }
}