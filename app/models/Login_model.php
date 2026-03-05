<?php 

class Login_model {
    private $table = 'admin';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function checkLogin($data) {
        // Kolom password di database Anda bernama 'pass'
        $this->db->query("SELECT * FROM " . $this->table . " WHERE email = :email AND pass = :pass");
        $this->db->bind('email', $data['email']);
        $this->db->bind('pass', $data['password']);
        
        return $this->db->single();
    }
}