<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Member extends BaseController
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
            'title'  => 'Data Anggota',
            'users'  => $this->userModel->getUsersMember(),
        ];
        // dd($data);
        return view('admin/user/member/index', $data);
    }

    public function add()
    {
        $data = [
            'title'  => 'Tambah Anggota',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/user/member/add', $data);   
    }

}