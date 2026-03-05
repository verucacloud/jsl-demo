<?php 

class Pengeluaran extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Kas Keluar';
        $data['pengeluaran'] = $this->model('Pengeluaran_model')->getAllPengeluaran();
        
        $this->view('templates/header', $data);
        $this->view('pengeluaran/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if( $this->model('Pengeluaran_model')->tambahDataPengeluaran($_POST) > 0 ) {
            // Anda bisa menambahkan Flasher di sini nanti
            header('Location: ' . BASEURL . '/pengeluaran');
            exit;
        }
    }
}