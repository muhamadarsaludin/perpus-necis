<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use App\Models\TransactionModel;
class Notification extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $notificationModel;
    protected $paymentModel;
    protected $transactionModel;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
        $this->transactionModel = new TransactionModel();
        helper('date');
    }

    public function index()
    {
        $user = session()->get('user');
        $data = [
            'menuActive' => false,
            'title' => 'My Notification',
            'notification' => $this->notificationModel->getWhere(['user_id' =>$user['id']])->getResultArray(),       
         ];
         return view('user/notification', $data);
        //  dd($data);
    }

   
    public function delete($id)
    {
        $this->notificationModel->delete($id);
        return redirect()->to('/notification');  
    }

    public function getItemInUserNotification()
    {
       $user = session()->get('user');
        return $this->notificationModel->getWhere(['user_id' => $user['id']])->getResultArray();
    }

    public function getJsonItemInUserNotification()
    {
        return json_encode($this->getItemInUserNotification(), JSON_PRETTY_PRINT);
    }

}
