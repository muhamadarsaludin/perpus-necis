<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RequestModel;

class Request extends BaseController
{
    protected $userModel;
    protected $requestModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->requestModel = new RequestModel();
    }


    public function index()
    {
        $data = [
            'title'  => 'Data Request Buku',
            'requests'  => $this->requestModel->getRequests(),
            'menuActive' => 'admin request'
        ];
        // dd($data);
        return view('admin/request/index', $data);
    }
}