<?php 

class Pemasukan extends Controller {
    
    // Method default untuk menampilkan halaman utama Kas Masuk
    public function index() {
        $data['judul'] = 'Kas Masuk';
        
        // Mengambil data dari Pemasukan_model
        $data['pemasukan'] = $this->model('Pemasukan_model')->getAllPemasukan();
        
        // Menghitung total untuk ditampilkan di dashboard/header jika perlu
        // Anda bisa menambahkan logika totalan di sini
        
        $this->view('templates/header', $data);
        $this->view('pemasukan/index', $data);
        $this->view('templates/footer', $data);
    }

    // Method untuk memproses tambah data dari Modal
    public function tambah() {
        // Menjalankan fungsi tambahDataPemasukan di Model
        if( $this->model('Pemasukan_model')->tambahDataPemasukan($_POST) > 0 ) {
            // Jika berhasil, arahkan kembali ke halaman index pemasukan
            header('Location: ' . BASEURL . '/pemasukan');
            exit;
        } else {
            // Jika gagal, tetap arahkan kembali (bisa ditambah Flasher nanti)
            header('Location: ' . BASEURL . '/pemasukan');
            exit;
        }
    }

    // Method untuk hapus data (Opsional untuk pengembangan lanjut)
    public function hapus($id) {
        if( $this->model('Pemasukan_model')->hapusDataPemasukan($id) > 0 ) {
            header('Location: ' . BASEURL . '/pemasukan');
            exit;
        }
    }
}