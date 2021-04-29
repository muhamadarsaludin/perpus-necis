<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\TransDetailModel;
use App\Models\FineModel;

class Transaction extends BaseController
{
    protected $transactionModel;
    protected $transDetailModel;
    protected $fineModel;
    // protected $db;
    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->transDetailModel = new TransDetailModel();
        $this->fineModel = new FineModel();
    }

    public function index()
    {

        $session = session();
        $userData = $session->get('user');

        $trans = $this->transactionModel->getWhere(['user_id' => $userData['id']])->getRowArray();
        $data = [
            'title'  => 'Detail Peminjaman',
            'borrowing'  => $this->transactionModel->getBorrowingDataByCode($trans['transaction_code']),
            'detail'  => $this->transDetailModel->getDetailBorrowByTransCode($trans['transaction_code']),
            'fine' => $this->fineModel->get()->getRowArray(),
            'menuActive' => 'user borrowing'
        ];
        return view('user/borrow/index', $data);
    }
}