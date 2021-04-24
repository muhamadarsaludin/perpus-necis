<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['menuActive'] = "dashboard admin";
        return view('admin/dashboard', $data);
    }
}
