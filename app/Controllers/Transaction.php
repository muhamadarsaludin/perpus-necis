<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use App\Models\TransactionModel;
use App\Models\TransDetailModel;
use App\Models\UserModel;
use App\Models\BooksModel;
use App\Models\BookDataModel;
use App\Models\FineModel;
class Transaction extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
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


    public function getTransactionDeadline()
    {
       $user = session()->get('user');
        // return $this->notificationModel->getWhere(['user_id' => $user['id']])->getResultArray();
        $trans= $this->transactionModel->getWhere(['user_id' => $user['id']])->getRowArray();
        $detail = $this->transDetailModel->getDetailBorrowingStatusByTransCode($trans['transaction_code']);
        foreach ($detail as $d) {
            if($d['reminder'] == 1){
                $message = "Masa peminjaman buku ". $d['book_title'] ." akan habis, segera lakukan perpanjangan waktu sebelum tanggal ". $d['return_date'];
                if($d['reminder_notification'] == 0){
                    // kirim notif
                    $this->notificationModel->save([
                        'user_id' => $user['id'],
                        'message' => $message
                    ]);
                    // update status reminder notif
                    $this->transDetailModel->save([
                        'id' => $d['id'],
                        'reminder_notification' =>1
                    ]);
                }
            }
            if ($d['late'] == 1){
                $message = "Masa peminjaman buku ". $d['book_title'] ." telah habis, harap melapor kepada petugas perpustakaan";
                if($d['late_notification'] == 0){
                    // kirim notif
                    $this->notificationModel->save([
                        'user_id' => $user['id'],
                        'message' => $message
                    ]);
                    // update status reminder notif
                    $this->transDetailModel->save([
                        'id' => $d['id'],
                        'late_notification' =>1
                    ]);
                }
            }
        }
        echo "get reminder ok";
    }

}
