<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel;
    }
    public function index()
    {
        $data = [
            'title' => "Login | Perpus SMPN 1 Cisayong",
            'validation' => \Config\Services::validation(),
        ];
        return view('auth/login', $data);
    }

    public function login()
    {

        // validasi field username & password
        if (!$this->validate([
            'username' => 'required',
            'password' => 'required|min_length[3]'
        ])) {
            return redirect()->to('/auth')->withInput();
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->userModel->getWhere(['username' => $username])->getRowArray();
        // dd($user);
        // cek user ada atau tidak
        if ($user) {
            // cek password
            // if ($password == $user['password']) {
            if (password_verify($password, $user['password'])) {
                // jika username dan password benar
                $data = [
                    'user' => $this->userModel->getUserById($user['id']),
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                    'logged_in'     => TRUE
                ];
                session()->set($data);
                return redirect()->to('/admin');
            } else {
                session()->setFlashdata('message', 'Password Salah!');
                return redirect()->to('/auth');
            }
        } else {
            session()->setFlashdata('message', 'User tidak ditemukan!');
            return redirect()->to('/auth');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/auth');
    }
}
