<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    // protected $db;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'User List | Perpustakaan Necis',
            'users'  => $this->userModel->getUsers(),
        ];
        // dd($data);
        return view('admin/user/index', $data);
    }

    public function profile($id)    
    {
        $data = [
            'title'  => 'Profile | RH Wedding Planner',
            'user'  => $this->userModel->getUserBy($id),
        ];
        // dd($data['user']);
        return view('admin/user/profile/profile', $data);
    }








    public function detail($username)
    {
        $data = [
            'title'  => 'Detail User | Perpustakaan Necis',
            'user'  => $this->userModel->getUser('username', $username),
        ];
        return view('admin/user/detail', $data);
    }

    public function add()
    {
        $data = [
            'title'  => 'Tambah User | Perpustakaan Necis',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/user/add', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[5]',
        ])) {
            return redirect()->to('/admin/user/add')->withInput();
        }
        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role_id' => 1,
            'active' => 1,
        ]);
        session()->setFlashdata('message', 'User Berhasil ditambahkan');
        return redirect()->to('/admin/users');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('message', 'User berhasil dihapus');
        return redirect()->to('/admin/users');
    }
}
