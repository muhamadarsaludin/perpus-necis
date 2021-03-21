<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Officer extends BaseController
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
            'title'  => 'Data Petugas',
            'users'  => $this->userModel->getUsersOfficer(),
        ];
        // dd($data);
        return view('admin/user/officer/index', $data);
    }

    public function add()
    {
        $data = [
            'title'  => 'Tambah Petugas',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/user/officer/add', $data);   
    }

}