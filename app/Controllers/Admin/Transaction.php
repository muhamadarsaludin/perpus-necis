<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\TransDetailModel;
use App\Models\UserModel;
use App\Models\BooksModel;

class Transaction extends BaseController
{

    protected $transactionModel;
    protected $transDetailModel;
    protected $userModel;
    protected $booksModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->transDetailModel = new TransDetailModel();
        $this->userModel = new UserModel();
        $this->booksModel = new BooksModel();
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

    public function save()
    {
        $username = $this->request->getVar('username');
        $bookCode = $this->request->getVar('book_code');

        $user = $this->userModel->getWhere(['username' => $username])->getRowArray();
        $book = $this->booksModel->getBookByCode($bookCode);
        // cek ada user 
        if(!$user){
            session()->setFlashdata('danger', 'User tidak ditemukan!');
            return redirect()->to('/admin/transaction/');
        }
        if(!$book){
            session()->setFlashdata('danger', 'Buku tidak ditemukan!');
            return redirect()->to('/admin/transaction/');
        }
        // cek ada buku
        $transaction = $this->transactionModel->getWhere(['user_id' => $user['id']])->getRowArray();
        // cek sudah ada transaksi?
        if(!$transaction){
            // buat transaksi jika belum
            $this->transactionModel->save([
                'user_id' => $user['id'],
                'transaction_code' =>strtoupper(substr(uniqid('TRA-'),0,12))
            ]);
        }
        // cek buku buku bisa dipinjam
        if($book['can_borrow'] == 0){
            if($book['status']){
                session()->setFlashdata('danger', 'Maaf Buku '.$book['status']);
                return redirect()->to('/admin/transaction/');
            }
                session()->setFlashdata('danger', 'Maaf buku tidak dapat dipinjam!');
                return redirect()->to('/admin/transaction/');
        }
        
        // input transaksi
        $trans = $this->transactionModel->getWhere(['user_id' => $user['id']])->getRowArray();
        
        $this->transDetailModel->save([
            'transaction_id' => $trans['id'],
            'book_id' => $book['id'],
            'status' => 'Dipinjam',
            'borrow_date' => date("Y-m-d"),
            'return_date' => date("Y-m-d",strtotime("+8 day"))
        ]);
        session()->setFlashdata('message', 'Buku berhasil dipinjam!');
        return redirect()->to('/admin/borrowing/detail/'.$trans['transaction_code']);
        
    }
}
