<?php 

class Home extends Controller {
    public function index() {
        // Cek status sesi agar tidak terjadi error "session already started"
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Proteksi halaman: Jika belum login, tendang ke halaman login
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        $data['judul'] = 'Dashboard';
        $data['nama'] = $_SESSION['nama'] ?? 'User'; 
        
        // 1. Fitur Manajemen Kas
        $data['total_pemasukan'] = $this->model('Home_model')->getTotalPemasukan();
        $data['total_pengeluaran'] = $this->model('Home_model')->getTotalPengeluaran();
        $data['sisa_saldo'] = $data['total_pemasukan'] - $data['total_pengeluaran'];

        // 2. Fitur Pengelolaan Hutang
        $data['total_hutang'] = $this->model('Home_model')->getTotalHutang();

        // 3. Fitur Kontrol Operasional Armada
        $data['biaya_armada'] = $this->model('Home_model')->getBiayaArmada();

        // 4. Monitoring Jumlah Karyawan
        $data['jumlah_karyawan'] = $this->model('Home_model')->getJumlahKaryawan();

        // 5. Data tambahan untuk kartu "Hari Ini" agar tidak Rp 0
        $data['pemasukan_hari_ini'] = $this->model('Home_model')->getPemasukanHariIni();
        $data['pengeluaran_hari_ini'] = $this->model('Home_model')->getPengeluaranHariIni();

        // Menyiapkan data untuk Grafik (Laporan Otomatis)
        $data['grafik_pemasukan'] = $this->model('Home_model')->getGrafikPemasukan();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        // PERBAIKAN: Tambahkan $data di sini agar Chart.js di footer bisa baca data
        $this->view('templates/footer', $data);
    }
}