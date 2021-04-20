<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RequestModel;

class Request extends BaseController
{
    protected $userModel;
    protected $requestModel;
    // protected $db;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->requestModel = new RequestModel();
    }
    public function index()
    {
        $data = [
            'title'  => 'Request Buku',
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('user/book/request', $data);   
    }

    public function save()
    {
        if (!$this->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required',
        ])) {
            return redirect()->to('/user/request')->withInput();
        }

        $userData = session()->get('user');
        $this->requestModel->save([
            'user_id' => $userData['id'],
            'title' => $this->request->getVar('title'),
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'publication_year' => $this->request->getVar('year'),
        ]);
        session()->setFlashdata('message', 'Request buku berhasil');
        return redirect()->to('user');
    }
}