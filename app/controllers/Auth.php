<?php

class Auth extends Controller {
    public function login()
    {
        $this->view("auth/login");
    }

    public function post_login()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $admin = $this->model("Admin_model")->getAdminByUsername($username);

        if ($admin && $password === $admin['password']) {
            $_SESSION['user'] = [
                'username' => $admin['username']
            ];
            Flaser::setFlash('Login berhasil', 'success', 'login');
            header('Location: ' . BASEURL . '/dashboard/index');
            exit;
        } else {
            Flaser::setFlash('Username atau password salah', 'error', 'login');
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: ' . BASEURL . '/auth/login');
    }
}