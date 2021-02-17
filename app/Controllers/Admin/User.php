<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    protected $db;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'title'  => 'User List | Perpustakaan Necis',
            'users'  => $this->userModel->getUser(),
        ];
        return view('admin/user/index', $data);
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
}
