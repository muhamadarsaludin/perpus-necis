<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Book extends BaseController
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
            'title'  => 'Data Buku',
            'users'  => $this->userModel->getUsersMember(),
        ];
        // dd($data);
        return view('admin/book/index', $data);
    }
    
    public function add()
    {
        $data = [
            'title'  => 'Tambah Buku',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/book/add', $data);   
    }

}