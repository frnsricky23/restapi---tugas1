<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        // Menampilkan halaman login
        return view('auth/login');
    }

    public function process()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Mendapatkan user berdasarkan username
        $user = $model->getUserByUsername($username);

        // Memeriksa apakah user ada dan password cocok
        if ($user && password_verify($password, $user['password'])) {
            $session->set(['admin_logged_in' => true]);
            return redirect()->to('/todolist');
        } else {
            // Set flashdata untuk pesan error login
            $session->setFlashdata('error', 'Username atau Password salah');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        // Menghapus sesi saat logout
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        // Menampilkan halaman registrasi
        return view('auth/register');
    }

    public function registerProcess()
    {
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $password_confirm = $this->request->getVar('password_confirm');

        // Memeriksa apakah password dan konfirmasi password cocok
        if ($password !== $password_confirm) {
            session()->setFlashdata('error', 'Password tidak cocok');
            return redirect()->to('/register');
        }

        // Hash password sebelum disimpan
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Menyimpan data user baru
        $model->save([
            'username' => $username,
            'password' => $password_hash
        ]);

        // Set flashdata untuk pesan sukses registrasi
        session()->setFlashdata('success', 'Registrasi berhasil, silakan login');
        return redirect()->to('/login');
    }
}
