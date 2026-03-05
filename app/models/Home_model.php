<?php 

class Home_model {
    private $db;

    public function __construct() {
        $this->db = new Database; // Menginisialisasi koneksi database
    }

    // --- FITUR 1: MANAJEMEN KAS (TOTAL) ---
    public function getTotalPemasukan() {
        $this->db->query("SELECT SUM(jumlah) as total FROM pemasukan");
        $result = $this->db->single();
        return $result['total'] ?? 0;
    }

    public function getTotalPengeluaran() {
        $this->db->query("SELECT SUM(jumlah) as total FROM pengeluaran");
        $result = $this->db->single();
        return $result['total'] ?? 0;
    }

    // --- FITUR BARU: DATA HARI INI (Agar tidak error) ---
    public function getPemasukanHariIni() {
        $hari_ini = date('Y-m-d');
        $this->db->query("SELECT SUM(jumlah) as total FROM pemasukan WHERE tgl_pemasukan = :tgl");
        $this->db->bind('tgl', $hari_ini);
        $result = $this->db->single();
        return $result['total'] ?? 0;
    }

    public function getPengeluaranHariIni() {
        $hari_ini = date('Y-m-d');
        $this->db->query("SELECT SUM(jumlah) as total FROM pengeluaran WHERE tgl_pengeluaran = :tgl");
        $this->db->bind('tgl', $hari_ini);
        $result = $this->db->single();
        return $result['total'] ?? 0;
    }

    // --- FITUR 2: TOTAL HUTANG ---
    public function getTotalHutang() {
        $this->db->query("SELECT SUM(jumlah) as total FROM hutang");
        $res = $this->db->single();
        return $res['total'] ?? 0;
    }

    // --- FITUR 3: OPERASIONAL ARMADA ---
    public function getBiayaArmada() {
        // Mengambil biaya khusus operasional berdasarkan ID sumber tertentu
        $this->db->query("SELECT SUM(jumlah) as total FROM pengeluaran WHERE id_sumber IN (8, 9, 10, 16)");
        $res = $this->db->single();
        return $res['total'] ?? 0;
    }

    // --- FITUR 4: DATA KARYAWAN ---
    public function getJumlahKaryawan() {
        $this->db->query("SELECT COUNT(*) as total FROM karyawan");
        $res = $this->db->single();
        return $res['total'] ?? 0;
    }

    // --- FITUR 5: LAPORAN GRAFIK ---
    public function getGrafikPemasukan() {
        $this->db->query("SELECT tgl_pemasukan, SUM(jumlah) as total 
                          FROM pemasukan 
                          GROUP BY tgl_pemasukan 
                          ORDER BY tgl_pemasukan DESC LIMIT 7");
        return $this->db->resultSet();
    }
}