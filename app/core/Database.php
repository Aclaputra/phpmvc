<?php
// Database Wrapper
class Database {
    /**
     * Ambil value dari define yg ada di dalam config.php
     */
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;
    /**
     * $dbh (database handler) utk koneksi ke database
     * $stmt (statement) utk menyimpan query
     */
    private $dbh;
    private $stmt;

    public function __construct() {
        $dsn = 'mysql:host='. $this->host .';dbname=' .$this->db_name;
        /** cek apakah koneksinya berhasil atau tidak
         * pangging PDO nya dgn new PDO()
         * catch ketika error tangkap exception masukkan-
         * ke dalam variabel $e
         * die($e->getMessage()); kalau error kasih pesan errornya
         * 
         * $option untuk mengoptimasi koneksi ke database
         * PDO::ATTR_PERSISTENT utk database koneksinya terjaga terus
         * PDO::ATTR_ERRORMODE utk mode errornya tampilkan exception-
         * PDO::ERRMODE_EXCEPTION
         */
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
    /** function utk menjalankan query
     * query($query) ambil query dri argument
     * statementnya diisi dengan dbh (database handler) prepare($query)
     * 
     * this statement diisi dengan handlernya this dbh
     * jika pakai PDO query harus kita prepare dahulu-
     * baru masukkan query nya
     */
    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }
    /** function bind()
     * binding data digunakan utk menghindari sql injection
     */
    public function bind($param, $value, $type = null) { 
        /** pengecekan type 
         * jika typenya null lakukan switch
         * jika valuenya integer, typenya otomatis di set menjadi parameter integer $type = PDO::PARAM_INT;
         * jika boolean, param menjadi boolean.
         * jika bukan int atau boolean, kita asusmsikan param menjadi string.
        */
        if(is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        // statement kita bind value nya
        $this->stmt->bindValue($param, $value, $type);
    }
    // function execute utk eksekusi
    public function execute()
    {
        // this statement kita execute
        $this->stmt->execute();
    }
    // setelah eksekusi, eksekusi banyak
    public function resultSet() {
        $this->execute();
        /** ambil data dengan mereturn statement dan ambil semua data-
         * dengan menggunakan fetchAll(), kembalikan data sbagai-
         * array assosiatif
         */ 
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // setelah eksekusi, eksekusi satu
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    // utk menghitung ada berapa baris/row
    public function myRowCount() {
        // row count yg dibawah punya PDO alias official
        $this->stmt->rowCount();
        // var_dump($this->stmt->rowCount());
    }
}