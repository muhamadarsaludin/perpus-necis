<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ClassModel;
use App\Models\RombelModel;

class Rombel extends BaseController
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
            'title'  => 'Data Rombel',
            'rombel'  => $this->rombelModel->get()->getResultArray(),
        ];
        // dd($data);
        return view('admin/rombel/index', $data);
    }
}
