<?php 

class LoginController extends Controller {

    public function index() 
    {
        // Memanggil folder views/login/index.php
        $this->view('login/index');
    }

    public function prosesLogin() 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // --- LOGIC BYPASS UNTUK DEMO ---
        if ($username === 'admin_demo' && $password === '12345') {
            $_SESSION['login'] = true;
            $_SESSION['user'] = 'Guest Demo';
            
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
        // --- END BYPASS ---

        // Jika bukan bypass, baru panggil model
        $userModel = $this->model('User_model');
        if ($userModel->cekUser($username, $password)) {
            // Logic login normal...
        }
    }
}