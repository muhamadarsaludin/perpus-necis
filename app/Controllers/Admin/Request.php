<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RequestModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Request extends BaseController
{
    protected $userModel;
    protected $requestModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->requestModel = new RequestModel();
    }


    public function index()
    {
        $data = [
            'title'  => 'Data Request Buku',
            'requests'  => $this->requestModel->getRequests(),
            'menuActive' => 'admin request'
        ];
        // dd($data);
        return view('admin/request/index', $data);
    }
    
     public function delete($id)
    {
        $this->requestModel->delete($id);
        session()->setFlashdata('message', 'Request berhasil dihapus!');
        return redirect()->to('/admin/request');  
    }

    
    public function report()
    {
        $data = [
            'requests' => $this->requestModel->getRequests(),
        ];
        // dd($data);
        $options = new Options();
        $options->setIsHtml5ParserEnabled(true);
        $options->isRemoteEnabled(true);
        $options->setChroot('/');
        $dompdf = new Dompdf();
        $dompdf->setOptions($options);
        $dompdf->loadHtml(view('/admin/request/report_pdf', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Laporan_Request_Buku.pdf', ["Attachment" => false]);
    }
}