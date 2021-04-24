<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ClassModel;
use App\Models\RombelModel;
use App\Models\UserRoleModel;
use App\Models\UserProfileModel;
use App\Models\MemberModel;
use App\Models\TransactionModel;

class Member extends BaseController
{
    protected $userModel;
    protected $classModel;
    protected $rombelModel;
    protected $userRoleModel;
    protected $userProfileModel;
    protected $memberModel;
    protected $transactionModel;
    // protected $db;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->classModel = new ClassModel();
        $this->rombelModel = new RombelModel();
        $this->userRoleModel = new UserRoleModel();
        $this->userProfileModel = new UserProfileModel();
        $this->memberModel = new MemberModel();
        $this->transactionModel = new TransactionModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Data Anggota',
            'users'  => $this->userModel->getUsersMember(),
            'menuActive' => 'admin user'
        ];
        // dd($data);
        return view('admin/user/member/index', $data);
    }

    public function add()
    {
        $data = [
            'title'  => 'Tambah Anggota',
            'role' => $this->userRoleModel->getWhere(['role' => 'Anggota'])->getRowArray(),
            'class' => $this->classModel->get()->getResultArray(),
            'rombel' => $this->rombelModel->get()->getResultArray(),
            'validation' => \Config\Services::validation(),
            'menuActive' => 'admin user'
        ];
        return view('admin/user/member/add', $data);   
    }

    public function save()
    {
        if (!$this->validate([
            'full_name' => 'required',
            'nis' => 'required|is_unique[users.username]',
            'email' => 'required|valid_email',
            'kontak' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'class' => 'required',
            'rombel' => 'required',
            'alamat' => 'required'
        ])) {
            return redirect()->to('/admin/members/add')->withInput();
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
            $password = $this->request->getVar('nis');
        }

        // dd($password);

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    // input tabel user
        $this->userModel->save([
            'role_id' => $this->request->getVar('role_id'),
            'username' => $this->request->getVar('nis'),
            'password' => $passwordHash,            
            'active' => 1,
        ]);
        
        $user = $this->userModel->getWhere(['username' => $this->request->getVar('nis')])->getRowArray();
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
        // input tabel member
        $this->memberModel->save([
            'user_id' => $user['id'],
            'nis' => $this->request->getVar('nis'),
            'class_id' => $this->request->getVar('class'),
            'rombel_id' => $this->request->getVar('rombel'),
        ]);
        $this->transactionModel->save([
            'user_id' => $user['id'],
            'transaction_code' => strtoupper(substr(uniqid('TRA-'),0,12)),
        ]);
        session()->setFlashdata('message', 'Anggota baru berhasil ditambahkan');
        return redirect()->to('/admin/members/');
    }


    public function edit($id)
    {
        $data = [
            'member' => $this->userModel->getUserById($id),
            'memberInfo' => $this->memberModel->getWhere(['user_id' => $id])->getRowArray(),
            'class' => $this->classModel->get()->getResultArray(),
            'rombel' => $this->rombelModel->get()->getResultArray(),
            'title'  => 'Ubah Anggota',
            'validation' => \Config\Services::validation(),
            'menuActive' => 'admin user'
        ];
        // dd($data);
        return view('admin/user/member/edit', $data);
    }

    
    public function update()
    {
        $oldUsername = $this->request->getVar('old_username');
        $nis = $this->request->getVar('nis');
        $userId = $this->request->getVar('user_id');
        
        if($oldUsername == $nis){
            $nisRules = 'required';
        }else{
            $nisRules = 'required|is_unique[users.username]';
        }
        if (!$this->validate([
            'full_name' => 'required',
            'nis' => $nisRules,
            'email' => 'required|valid_email',
            'kontak' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'class' => 'required',
            'rombel' => 'required',
            'alamat' => 'required'
        ])) {
            return redirect()->to('/admin/members/edit/'.$userId)->withInput();
        }
        $image = $this->request->getFile('image');
        if ($image->getError() == 4) {
            $imageName = $this->request->getFile('old-image');
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
        $passwordHash = $this->request->getVar('old_password');
        $password = $this->request->getVar('password');
        if($password == ''){
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        }
        $this->userModel->save([
            'id' => $userId,
            'username' => $this->request->getVar('nis'),
            'password' => $passwordHash,            
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
        $member =$this->memberModel->getWhere(['user_id' => $userId])->getRowArray();
        $this->memberModel->save([
            'id' => $member['id'],
            'user_id' => $userId,
            'nis' => $this->request->getVar('nis'),
            'class' => $this->request->getVar('class'),
            'rombel' => $this->request->getVar('rombel'),
            
        ]);
        
        session()->setFlashdata('message', 'Data Anggota berhasil diedit');
        return redirect()->to('/admin/users/profile/'.$userId);
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
        return redirect()->to('/admin/members');

    }



}