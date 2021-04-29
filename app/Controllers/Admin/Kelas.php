<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ClassModel;
use App\Models\RombelModel;
use Dompdf\Dompdf;
use Dompdf\Options;


class Kelas extends BaseController
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
            'title'  => 'Data Kelas',
            'class'  => $this->classModel->getAllClass(),
            'menuActive' => 'admin kelas'
        ];
        // dd($data);
        return view('admin/kelas/index', $data);
    }
    public function save()
    {
        $class =  $this->request->getVar('class');
        if($class == ''){
            session()->setFlashdata('danger', 'Fild Nama Kelas tidak boleh kosong!');
            return redirect()->to('/admin/kelas');
        }
        $this->classModel->save([
            'class' => $class
        ]);
        session()->setFlashdata('message', 'Kelas berhasil disimpan!');
        return redirect()->to('/admin/kelas');
    }

    public function getEditClass()
    {
        $id = $this->request->getVar('id');
        $class = $this->classModel->getWhere(['id' => $id])->getRowArray();
        echo json_encode($class);
    }

    public function update()
    {
        $id =  $this->request->getVar('id');
        $class =  $this->request->getVar('class');
        if($class == ''){
            session()->setFlashdata('danger', 'Fild Nama Kelas tidak boleh kosong!');
            return redirect()->to('/admin/kelas');
        }
        $this->classModel->save([
            'id' => $id,
            'class' => $class
        ]);
        session()->setFlashdata('message', 'Kelas berhasil diedit!');
        return redirect()->to('/admin/kelas');
    }

    public function delete($id)
    {
        $this->classModel->delete($id);
        session()->setFlashdata('message', 'Kelas berhasil dihapus!');
        return redirect()->to('/admin/kelas');  
    }

   

    public function detail($id)
    {
        $data = [
            'title'  => 'Datail Kelas',
            'class'  => $this->classModel->getClassById($id),
            'thisClass' => $this->classModel->getWhere(['id' => $id])->getRowArray(),
            'menuActive' => 'admin kelas'
        ];
        // dd($data);
        return view('admin/kelas/detail', $data);
    }

    public function detailClass($classId,$rombelId)
    {
        $data = [
            'title'  => 'Datail Kelas',
            'class' => $this->classModel->getWhere(['id' => $classId])->getRowArray(),
            'rombel' => $this->rombelModel->getWhere(['id' => $rombelId])->getRowArray(),
            'detail'  => $this->classModel->getDetailByClassIdAndRombelId($classId,$rombelId),
            'menuActive' => 'admin kelas'
        ];
        // dd($data);
        return view('admin/kelas/detail_class', $data);
    }
    public function deleteDetail($classId, $rombelId)
    {
        $class = $this->classModel->getWhere(['id' => $classId])->getRowArray();
        $rombel = $this->rombelModel->getWhere(['id' => $rombelId])->getRowArray();
        $users = $this->classModel->getDetailByClassIdAndRombelId($classId, $rombelId);
        // dd($users);
        foreach ($users as $user) {
            if($user['user_image'] != 'default.svg'){
                unlink('img/users/profile/' . $user['user_image']);
            }
            $this->userModel->delete($user['user_id']);
        }
        session()->setFlashdata('message', 'Kelas '.$class['class'].$rombel['rombel'].' berhasil dihapus!');
        return redirect()->to('/admin/kelas/detail/'.$classId);
    }

    public function report($classId,$rombelId)
    {
        $data=[
            'class' => $this->classModel->getWhere(['id' => $classId])->getRowArray(),
            'rombel' => $this->rombelModel->getWhere(['id' => $rombelId])->getRowArray(),
            'detail'  => $this->classModel->getDetailByClassIdAndRombelId($classId,$rombelId),
        ];
        $options = new Options();
        $options->setIsHtml5ParserEnabled(true);
        $options->isRemoteEnabled(true);
        $options->setChroot('/');
        $dompdf = new Dompdf();
        $dompdf->setOptions($options);
        $dompdf->loadHtml(view('/admin/kelas/report_pdf', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Laporan_kelas_".$data['class']['class'].$data['rombel']['rombel'].".pdf", ["Attachment" => false]);
    }
}
