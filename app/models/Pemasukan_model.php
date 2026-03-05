<?php 

class Pemasukan_model {
    private $table = 'pemasukan';
    private $db;

    public function __construct() {
        $this->db = new Database; // Core database wrapper
    }

    public function getAllPemasukan() {
        $this->db->query("SELECT * FROM " . $this->table . " ORDER BY tgl_pemasukan DESC");
        return $this->db->resultSet();
    }

    public function tambahDataPemasukan($data) {
        $query = "INSERT INTO pemasukan (tgl_pemasukan, jumlah, id_sumber) 
                  VALUES (:tgl, :jumlah, :sumber)";
        
        $this->db->query($query);
        $this->db->bind('tgl', $data['tgl_pemasukan']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('sumber', $data['id_sumber']);

        $this->db->execute();
        return $this->db->rowCount(); // Mengembalikan angka 1 jika berhasil
    }
}