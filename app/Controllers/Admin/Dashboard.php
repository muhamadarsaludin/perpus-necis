<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NotificationModel;
use App\Models\TransactionModel;
use App\Models\TransDetailModel;
use App\Models\UserModel;
use App\Models\BooksModel;
use App\Models\BookDataModel;
use App\Models\FineModel;

class Dashboard extends BaseController
{
    protected $request;
    protected $notificationModel;
    protected $transactionModel;
    protected $transDetailModel;
    protected $userModel;
    protected $booksModel;
    protected $bookDataModel;
    protected $fineModel;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
        $this->transactionModel = new TransactionModel();
        $this->transDetailModel = new TransDetailModel();
        $this->userModel = new UserModel();
        $this->booksModel = new BooksModel();
        $this->bookDataModel = new BookDataModel();
        $this->fineModel = new FineModel();
        helper('date');
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'menuActive' => 'dashboard admin',
            'userAmount' => $this->userModel->countAll(),
            'bookAmount' => $this->booksModel->countAll(),
            'transAmount' => $this->transDetailModel->countAll(),
            'fineAmount' => $this->transDetailModel->getFineAmount(),
            'latestBook' => $this->bookDataModel->getLatestBook(),
            'latestEbook' => $this->bookDataModel->getLatestEbook(),
        ];
        // dd($data);
        return view('admin/dashboard', $data);
    }
}
