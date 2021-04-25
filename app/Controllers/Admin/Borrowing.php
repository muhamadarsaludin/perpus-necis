<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\TransDetailModel;

class Borrowing extends BaseController
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
            'borrowing'  => $this->transactionModel->getAllBorrowingData(),
            'menuActive' => 'admin borrowing'
        ];
        // dd($data);
        return view('admin/borrow/index', $data);
    }


    public function detail($code)
    {
        $data = [
            'title'  => 'Detail Peminjaman',
            'borrowing'  => $this->transactionModel->getBorrowingDataByCode($code),
            'detail'  => $this->transDetailModel->getDetailBorrowByCode($code),
            'menuActive' => 'admin borrowing'
        ];
        return view('admin/borrow/detail', $data);
    }

    public function history()
    {
        $data = [
            'title'  => 'Data Peminjaman',
            'detail'  => $this->transDetailModel->getAllDetailBorrowing(),
            'menuActive' => 'admin borrowing'
        ];
        // dd($data);
        return view('admin/borrow/history', $data); 
    }
}
