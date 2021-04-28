<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserRoleModel;
use App\Models\UserProfileModel;
use App\Models\OfficerModel;
use App\Models\TransactionModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Officer extends BaseController
{
    protected $userModel;
    protected $userRoleModel;
    protected $userProfileModel;
    protected $officerModel;
    protected $transactionModel;


    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userRoleModel = new UserRoleModel();
        $this->userProfileModel = new UserProfileModel();
        $this->officerModel = new OfficerModel();
        $this->transactionModel = new TransactionModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Data Petugas',
            'users'  => $this->userModel->getUsersOfficer(),
            'userData' => session()->get('user'),
            'menuActive' => 'admin user'
        ];
        // dd($data);
        return view('admin/user/officer/index', $data);
    }

    public function add()
    {
        $data = [
            'title'  => 'Tambah Petugas',
            'validation' => \Config\Services::validation(),
            'roles' => $this->userRoleModel->getWhere(['role !=' => "Anggota"])->getResultArray(),
            'menuActive' => 'admin user'
        ];
        return view('admin/user/officer/add', $data);   
    }
    public function save()
    {
        if (!$this->validate([
            'full_name' => 'required',
            'nip' => 'required|is_unique[users.username]',
            'email' => 'required|valid_email',
            'kontak' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'role' => 'required',
            'alamat' => 'required'
        ])) {
            return redirect()->to('/admin/officers/add')->withInput();
        }
        // Lolos Validasi
        // Upload image
        $image = $this->request->getFile('image');
        if ($image->getError() == 4) {
            $imageName = 'default.svg';
        } else {
            // pindahkan file 
            $image->move('img/users/profile');
            $imageName = $image->getName();
        }
        $password = $this->request->getVar('password');

        if($password == ''){
            $password = $this->request->getVar('nip');
        }
        // dd($imageName);

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    // input tabel user
        $this->userModel->save([
            'role_id' => $this->request->getVar('role'),
            'username' => $this->request->getVar('nip'),
            'password' => $passwordHash,            
            'active' => 1,
        ]);
        
        $user = $this->userModel->getWhere(['username' => $this->request->getVar('nip')])->getRowArray();
        // input tabel user profile
        $this->userProfileModel->save([
            'user_id' => $user['id'],
            'full_name' => $this->request->getVar('full_name'),
            'user_image' => $imageName,
            'sex' => $this->request->getVar('jenis_kelamin'),
            'place_of_birth' => $this->request->getVar('tempat_lahir'),
            'date_of_birth' => $this->request->getVar('tanggal_lahir'),
            'contact' => $this->request->getVar('kontak'),
            'email' => $this->request->getVar('email'),
            'address' => $this->request->getVar('alamat'),

        ]);
        // input tabel officer
        $this->officerModel->save([
            'user_id' => $user['id'],
            'nip' => $this->request->getVar('nip'),
            'officer_status' => $this->request->getVar('officer_status'),
        ]);
        session()->setFlashdata('message', 'Petugas baru berhasil ditambahkan');
        return redirect()->to('/admin/officers/');
    }
 
    public function edit($id)
    {
        $data = [
            'title'  => 'Edit Petugas',
            'officer' => $this->userModel->getUserById($id),
            'roles' => $this->userRoleModel->getWhere(['role !=' => "Anggota"])->getResultArray(),
            'validation' => \Config\Services::validation(),
            'menuActive' => 'admin user'
        ];
        // dd($data);
        return view('admin/user/officer/edit', $data);
    }

    public function update()
    {
        $oldUsername = $this->request->getVar('old_username');
        $nip = $this->request->getVar('nip');
        $userId = $this->request->getVar('user_id');
        if($oldUsername == $nip){
            $nipRules = 'required';
        }else{
            $nipRules = 'required|is_unique[users.username]';
        }
        if (!$this->validate([
            'full_name' => 'required',
            'nip' => $nipRules,
            'email' => 'required|valid_email',
            'kontak' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'role' => 'required',
            'alamat' => 'required'
        ])) {
            return redirect()->to('/admin/officers/edit/' . $userId )->withInput();
        }
        
        $image = $this->request->getFile('image');
        if ($image->getError() == 4) {
            $imageName = $this->request->getVar('old_image');
        } else {   
            // pindahkan file 
            $image->move('img/users/profile');
            $imageName = $image->getName();
            // hapus file lama
            $oldImage = $this->request->getVar('old_image');
            if($oldImage != 'default.svg'){
                unlink('img/users/profile/' . $oldImage);
            }
        }
        $oldPassword = $this->request->getVar('old_password');
        $password = $this->request->getVar('password');
        if($password != ''){
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        }else{
            $passwordHash = $oldPassword;
        }

        // dd($this->request->getVar('role'));
        $this->userModel->save([
            'id' => $userId,
            'username' => $this->request->getVar('nip'),
            'password' => $passwordHash, 
            'role_id' => $this->request->getVar('role'),           
            'active' => 1,
        ]);
        $profile = $this->userProfileModel->getWhere(['user_id' => $userId])->getRowArray();
        $this->userProfileModel->save([
            'id' => $profile['id'],
            'user_id' => $userId,
            'full_name' => $this->request->getVar('full_name'),
            'user_image' => $imageName,
            'sex' => $this->request->getVar('jenis_kelamin'),
            'place_of_birth' => $this->request->getVar('tempat_lahir'),
            'date_of_birth' => $this->request->getVar('tanggal_lahir'),
            'contact' => $this->request->getVar('kontak'),
            'email' => $this->request->getVar('email'),
            'address' => $this->request->getVar('alamat'),
        ]);
        $officer =$this->officerModel->getWhere(['user_id' => $userId])->getRowArray();
        $this->officerModel->save([
            'id' => $officer['id'],
            'user_id' => $userId,
            'nip' => $this->request->getVar('nip'),
            'officer_status' => $this->request->getVar('officer_status'),
        ]);
        
        session()->setFlashdata('message', 'Data Petugas berhasil diedit');
        return redirect()->to('/admin/officers/detail/'.$userId);
    }

    public function delete($id)
    {
        $profile = $this->userProfileModel->getWhere(['user_id' => $id])->getRowArray();
        if($profile['user_image'] != 'default.svg'){
            unlink('img/users/profile/' . $profile['user_image']);
        }
         // cari role berdasarkan id
         $this->userModel->delete($id);
         session()->setFlashdata('message', 'Petugas berhasil dihapus!');
         return redirect()->to('/admin/officers');
    }


    public function detail($id)
    {
        $data = [
            'title'  => 'Detail Petugas',
            'officer' => $this->userModel->getUserById($id),
            'menuActive' => 'admin user'
        ];
        // dd($data);
        return view('admin/user/officer/detail', $data);
    }

    public function report()
    {
        $data = [
            'users' => $this->userModel->getUsersOfficer()
        ];
        $options = new Options();
        $options->setIsHtml5ParserEnabled(true);
        $options->isRemoteEnabled(true);
        $options->setChroot('/');
        $dompdf = new Dompdf();
        $dompdf->setOptions($options);
        $dompdf->loadHtml(view('/admin/user/officer/report_pdf', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Laporan_Petugas.pdf', ["Attachment" => false]);
    }
}