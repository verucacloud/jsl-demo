<?php 

class Pengeluaran_model {
    private $table = 'pengeluaran'; // Sesuaikan dengan nama tabel di database Anda
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllPengeluaran() {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY tgl_pengeluaran DESC');
        return $this->db->resultSet();
    }

    public function tambahDataPengeluaran($data) {
    $query = "INSERT INTO pengeluaran (tgl_pengeluaran, jumlah, id_sumber) 
              VALUES (:tgl_pengeluaran, :jumlah, :id_sumber)";
    
    $this->db->query($query);
    $this->db->bind('tgl_pengeluaran', $data['tgl_pengeluaran']);
    $this->db->bind('jumlah', $data['jumlah']);
    $this->db->bind('id_sumber', $data['id_sumber']); // Menggunakan ID dari select option

    $this->db->execute();
    return $this->db->rowCount();
}
}