<?php
/** inheritance
 * buat inheritance dari base class Controller ke-
 * child class About dgn menggunakan extends Controller
 */
class About extends Controller{
    public function index($nama = 'Acla', $umur = 21 , $pekerjaan = 'Software engineer') {
        // ambil data dari nama, umur, pekerjaan dan masukkan ke $data['value']
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        // buat judul dinamis
        $data['judul'] = 'About me';
        // pass data nya dengan memasukkan ke argumen ke-2
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page() {
        // judul dinamis
        $data['judul'] = 'Pages';
        // pass data ke function view yg telah kita buat di argumen ke-2
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}