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
