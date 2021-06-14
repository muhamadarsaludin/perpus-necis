<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ClassModel;
use App\Models\RombelModel;

class Rombel extends BaseController
{

    protected $userModel;
    protected $classModel;
    protected $rombelModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->classModel = new ClassModel();
        $this->rombelModel = new RombelModel();
    }


    public function index()
    {
        $data = [
            'title'  => 'Data Rombel',
            'rombel'  => $this->rombelModel->getAllRombel(),
            'menuActive' => 'admin kelas'
        ];
        return view('admin/rombel/index', $data);
    }

    public function save()
    {
        $rombel =  $this->request->getVar('rombel');
        if($rombel == ''){
            session()->setFlashdata('danger', 'Fild Nama Rombel tidak boleh kosong!');
            return redirect()->to('/admin/rombel');
        }
        $this->rombelModel->save([
            'rombel' => $rombel
        ]);
        session()->setFlashdata('message', 'Rombel berhasil disimpan!');
        return redirect()->to('/admin/rombel');
    }

    public function getEditRombel()
    {
        $id = $this->request->getVar('id');
        $rombel = $this->rombelModel->getWhere(['id' => $id])->getRowArray();
        echo json_encode($rombel);
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $rombel =  $this->request->getVar('rombel');
        if($rombel == ''){
            session()->setFlashdata('danger', 'Fild Nama Rombel tidak boleh kosong!');
            return redirect()->to('/admin/rombel');
        }
        $this->rombelModel->save([
            'id' => $id,
            'rombel' => $rombel
        ]);
        session()->setFlashdata('message', 'Rombel berhasil diedit!');
        return redirect()->to('/admin/rombel');
    }

    
    public function delete($id)
    {
        $this->rombelModel->delete($id);
        session()->setFlashdata('message', 'Rombel berhasil dihapus!');
        return redirect()->to('/admin/rombel');  
    }
    
    public function detail($id)
    {
        $data = [
            'title'  => 'Datail Rombel',
            'rombel'  => $this->rombelModel->getRombelById($id),
            'thisRombel' => $this->rombelModel->getWhere(['id' => $id])->getRowArray(),
            'menuActive' => 'admin kelas'
        ];
        // dd($data);
        return view('admin/rombel/detail', $data);
    }

}
