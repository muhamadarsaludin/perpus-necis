<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\TransDetailModel;

class Transaction extends BaseController
{

    protected $transactionModel;
    protected $transDetailModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->transDetailModel = new TransDetailModel();
    }


    public function index()
    {
        $data = [
            'title'  => 'Data Peminjaman',
            'menuActive' => 'admin borrowing'
        ];
        // dd($data);
        return view('admin/transaction/index', $data);
    }
}
