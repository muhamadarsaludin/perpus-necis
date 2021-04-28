<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\BookDataModel;

class Dashboard extends BaseController
{
    protected $bookDataModel;


    public function __construct()
    {
        $this->bookDataModel = new BookDataModel();
    }
    public function index()
    {
        $data = [                 
            'title' => 'Dashboard',
            'menuActive' => 'dashboard user',
            'latestBook' => $this->bookDataModel->getLatestBook(),
            'latestEbook' => $this->bookDataModel->getLatestEbook(),
        ];
        return view('user/dashboard', $data);
    }
}
