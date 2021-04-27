<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FineModel;


class Fine extends BaseController
{

    protected $fineModel;
   

    public function __construct()
    {
        $this->fineModel = new FineModel();
    }


    public function index()
    {
        $data = [
            'title'  => 'Denda Keterlambatan',
            'fine'  => $this->fineModel->get()->getRowArray(),
            'menuActive' => 'admin transaction'
        ];
        // dd($data);
        return view('admin/transaction/fine', $data);
    }

    public function update()
    {
        $fine = $this->request->getVar('fine');
        if($fine == ''){
            session()->setFlashdata('danger', 'Fild denda tidak boleh kosong!');
            return redirect()->to('/admin/fine');
        }

        $this->fineModel->save([
            'id' => $this->request->getVar('id'),
            'fine' => $fine
        ]);
        session()->setFlashdata('message', 'Denda berhasil diperbarui!');
        return redirect()->to('/admin/fine');
    }
}
