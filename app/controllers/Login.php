<?php 

class Login extends Controller {
    public function index() {
        $data['judul'] = 'Login';
        $this->view('login/index', $data);
    }

    public function proses() {
        if ($user = $this->model('Login_model')->checkLogin($_POST)) {
            // Jika login berhasil
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['id_admin'] = $user['id_admin'];
            $_SESSION['nama'] = $user['nama'];
            
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            // Jika login gagal, arahkan kembali ke halaman login
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}