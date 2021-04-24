<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ClassModel;
use App\Models\RombelModel;

class Kelas extends BaseController
{

    protected $userModel;
    protected $classModel;
    protected $rombelModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->classModel = new ClassModel();
        $this->rombelModel = new RombelModel();
    }


    public function index()
    {
        $data = [
            'title'  => 'Data Kelas',
            'class'  => $this->classModel->get()->getResultArray(),
            'menuActive' => 'admin kelas'
        ];
        // dd($data);
        return view('admin/kelas/index', $data);
    }
}
