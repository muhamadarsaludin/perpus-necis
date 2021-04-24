<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['menuActive'] = "dashboard user";
        return view('user/dashboard', $data);
    }
}
