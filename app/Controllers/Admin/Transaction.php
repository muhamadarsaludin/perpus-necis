<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\TransDetailModel;
use App\Models\UserModel;
use App\Models\BooksModel;
use App\Models\BookDataModel;
use App\Models\FineModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Transaction extends BaseController
{

    protected $transactionModel;
    protected $transDetailModel;
    protected $userModel;
    protected $booksModel;
    protected $bookDataModel;
    protected $fineModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->transDetailModel = new TransDetailModel();
        $this->userModel = new UserModel();
        $this->booksModel = new BooksModel();
        $this->bookDataModel = new BookDataModel();
        $this->fineModel = new FineModel();
    }


    public function index()
    {
        $data = [
            'title'  => 'Data Peminjaman',
            'menuActive' => 'admin borrowing',
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('admin/transaction/index', $data);
    }

    public function return()
    {
        $data = [
            'title' => 'Transaksi Pengembalian',
            'menuActive' => 'admin borrowing',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/transaction/return', $data);
    }

    public function returnResult()
    {
        if (!$this->validate([
            'username' => 'required',
            'book_code' => 'required',
        ])) {
            return redirect()->to('/admin/transaction/return')->withInput();
        }
        $username = $this->request->getVar('username');
        $bookCode = $this->request->getVar('book_code');
        $user = $this->userModel->getWhere(['username' => $username])->getRowArray();
        $book = $this->booksModel->getBookByCode($bookCode);
        // cek ada user 
        if(!$user){
            // jika tidak ada user
            session()->setFlashdata('danger', 'User tidak ditemukan!');
            return redirect()->to('/admin/transaction/return');
        }
        // cek ada buku
        if(!$book){
            // jika tidak ada buku
            session()->setFlashdata('danger', 'Buku tidak ditemukan!');
            return redirect()->to('/admin/transaction/return');
        }

        // cek ada detail transaksi atas buku dan user itu
        $transaction = $this->transactionModel->getWhere(['user_id' => $user['id']])->getRowArray();
        $detailTrans = $this->transDetailModel->getWhere(['transaction_id' => $transaction['id'], 'book_id'=> $book['id'], 'status' =>'Dipinjam'])->getRowArray();
        if(!$detailTrans){
            session()->setFlashdata('danger', 'Transaksi peminjaman tidak ditemukan!');
            return redirect()->to('/admin/transaction/return');
        }
        $data = [
            'title' => 'Transaksi Pengembalian',
            'bookData' => $book,
            'detail' => $this->transDetailModel->getDetailBorrowById($detailTrans['id']),
            'userBorrowing' => $this->userModel->getUserById($user['id']),
             'fine' => $this->fineModel->get()->getRowArray(),
            'menuActive' => 'admin borrowing',
            'validation' => \Config\Services::validation(),

        ];
        return view('admin/transaction/returnResult', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'username' => 'required',
            'book_code' => 'required',
        ])) {
            return redirect()->to('/admin/transaction')->withInput();
        }
        $username = $this->request->getVar('username');
        $bookCode = $this->request->getVar('book_code');

        $user = $this->userModel->getWhere(['username' => $username])->getRowArray();
        $book = $this->booksModel->getBookByCode($bookCode);
        // cek ada user 
        if(!$user){
            // jika tidak ada user
            session()->setFlashdata('danger', 'User tidak ditemukan!');
            return redirect()->to('/admin/transaction/');
        }
        // cek ada buku
        if(!$book){
            // jika tidak ada buku
            session()->setFlashdata('danger', 'Buku tidak ditemukan!');
            return redirect()->to('/admin/transaction/');
        }
        
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
                session()->setFlashdata('danger', 'Maaf Buku Ini'.$book['status']);
                return redirect()->to('/admin/transaction/');
            }
                session()->setFlashdata('danger', 'Maaf buku tidak dapat dipinjam!');
                return redirect()->to('/admin/transaction/');
        }
        
        
        // input transaksi
        $trans = $this->transactionModel->getWhere(['user_id' => $user['id']])->getRowArray();

        // cek buku regular?
        if($book['buku_paket'] == 0){
            // Cek jumlah pinjaman buku regular
            $amountBorrow = $this->transactionModel->getAmountRegularBookByTransCode($trans['transaction_code']);
            $returnDate = date("Y-m-d",strtotime("+7 day"));
            if($amountBorrow['amount_regular'] >= 2){
                session()->setFlashdata('danger', 'Maaf anda telah melebihi jumlah maksimal peminjaman!');
                return redirect()->to('/admin/transaction/');
            }
        }else{
            $returnDate = date("Y-m-d",strtotime("+365 day"));
        }
        date_default_timezone_set("Asia/Bangkok");
        $this->transDetailModel->save([
            'transaction_id' => $trans['id'],
            'book_id' => $book['id'],
            'status' => 'Dipinjam',
            'borrow_date' => date("Y-m-d"),
            'return_date' => $returnDate
        ]);

        // ubah can borrow book
        $this->booksModel->save([
            'id' => $book['id'],
            'can_borrow' => 0
        ]);

        session()->setFlashdata('message', 'Buku berhasil dipinjam!');
        return redirect()->to('/admin/borrowing/detail/'.$trans['transaction_code']);
    }


    public function returnBook($id)
    {
        $detailBorrow = $this->transDetailModel->getDetailBorrowById($id);
        date_default_timezone_set("Asia/Bangkok");
        $today = strtotime(date("Y-m-d"));
        $returnDate = strtotime($detailBorrow['return_date']);
        $calculate = ($today - $returnDate)/(60 * 60 * 24);
        if($calculate>=0){
            $late = $calculate;
        }else{
            $late = 0;
        }
        $fine = $this->fineModel->get()->getRowArray();
        $amount_fine = $late * $fine['fine'];
        $this->transDetailModel->save([
            'id' => $id,
            'status' => 'Dikembalikan',
            'return_date' => date("Y-m-d"),
            'amount_late' => $late,
            'fine' => $amount_fine,
        ]);
        $book = $this->booksModel->getWhere(['book_code' => $detailBorrow['book_code']])->getRowArray();
        $this->booksModel->save([
            'id' => $book['id'],
            'can_borrow' => 1
        ]);

        // berhasil dikembalikan
        session()->setFlashdata('message', 'Buku berhasil dikembalikan!');
        return redirect()->to('/admin/borrowing/detail/'.$detailBorrow['transaction_code']);
    }

    public function extend($id)
    {
        $detailBorrow = $this->transDetailModel->getDetailBorrowById($id);
        date_default_timezone_set("Asia/Bangkok");
        $today = strtotime(date("Y-m-d"));
        $returnDate = strtotime($detailBorrow['return_date']);
        $calculate = ($today - $returnDate)/(60 * 60 * 24);
        if($calculate>=0){
            $late = $calculate;
        }else{
            $late = 0;
        }
        $fine = $this->fineModel->get()->getRowArray();
        $amount_fine = $detailBorrow['fine'] + ($late * $fine['fine']);
        $this->transDetailModel->save([
            'id' => $id,
            'return_date' => date("Y-m-d",strtotime("+7 day")),
            'amount_late' => $late,
            'fine' => $amount_fine,
        ]);
        // berhasil diperpanjang
        session()->setFlashdata('message', 'Tengat pinjaman buku berhasil diperpanjang!');
        return redirect()->to('/admin/borrowing/detail/'.$detailBorrow['transaction_code']);
    }

    public function lost($id)
    {

        $detail = $this->transDetailModel->getDetailBorrowById($id);
        $book = $this->booksModel->getBookByCode($detail['book_code']);
        $data = [
            'title' => 'Form Kehilangan',
            'bookData' => $book,
            'detail' => $detail,
            'userBorrowing' => $this->userModel->getUserById($detail['user_id']),
            'fine' => $this->fineModel->get()->getRowArray(),
            'menuActive' => 'admin borrowing',
            'validation' => \Config\Services::validation(),

        ];
        // dd($data);
        return view('admin/transaction/lost', $data);
    }

    public function lostbook()
    {
        $detail_id = $this->request->getVar('detail_id');
        $book_id = $this->request->getVar('book_id');
        $transCode =  $this->request->getVar('transaction_code');
        // dd($transCode);
        $this->transDetailModel->save([
            'id' => $detail_id,
            'status' => 'Hilang',
            'return_date' => date("Y-m-d"),
            'amount_late' => $this->request->getVar('late'),
            'fine' => $this->request->getVar('fine')
        ]);

        $this->booksModel->save([
            'id' => $book_id,
            'can_borrow' => 0
        ]);

        session()->setFlashdata('message', 'Data Kehilangan berhasil disimpan!');
        return redirect()->to('/admin/borrowing/detail/'.$transCode);
    }

   
    public function report_view()
    {
        $data = [
            'title' => 'Laproan Transaksi',
            'menuActive' => 'admin borrowing',
            'date_min' => $this->transactionModel->getMinPaymentDate(true)
        ];
        // dd($data);
        return view('/admin/transaction/report_view', $data);
    }

    
    public function report_pdf($start_date, $end_date)
    {
        $data = [
            'resultTrans' => $this->transactionModel->getTransactionBetweenDate($start_date, $end_date)
        ];
        $options = new Options();
        $options->setIsHtml5ParserEnabled(true);
        $options->isRemoteEnabled(true);
        $options->setChroot('/');
        $dompdf = new Dompdf();
        $dompdf->setOptions($options);
        $dompdf->loadHtml(view('/admin/transaction/report_pdf', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Laporan_transaksi.pdf', ["Attachment" => false]);
    }


}
