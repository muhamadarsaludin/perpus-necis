<?php
namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserRoleModel;
use App\Models\UserProfileModel;


class Profile extends BaseController
{
    protected $userModel;
    protected $userRoleModel;
    protected $userProfileModel;
    // protected $db;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userRoleModel = new UserRoleModel();
        $this->userProfileModel = new UserProfileModel();
    }
    public function index($id)
    {
        $data = [
            'title'  => 'User Profile',
            'user'  => $this->userModel->getUserById($id),
            'menuActive' => false
        ];
        // dd($data);
        return view('user/profile/index', $data);
    }
    
    public function edit($id)
    {
        $data = [
            'title'  => 'Edit Profile',
            'user' => $this->userModel->getUserById($id),
            'roles' => $this->userRoleModel->getWhere(['role !=' => "Anggota"])->getResultArray(),
            'validation' => \Config\Services::validation(),
            'menuActive' => false
        ];
        // dd($data);
        return view('user/profile/edit', $data);
    }


    public function update()
    {
        $userId = $this->request->getVar('user_id');
        if (!$this->validate([
            'full_name' => 'required',
            'email' => 'required|valid_email',
            'kontak' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required'
        ])) {
            return redirect()->to('/user/profile/edit/' . $userId )->withInput();
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
        $this->userModel->save([
            'id' => $userId,
            'password' => $passwordHash,           
        ]);
        $profile = $this->userProfileModel->getWhere(['user_id' => $userId])->getRowArray();
        $this->userProfileModel->save([
            'id' => $profile['id'],
            'full_name' => $this->request->getVar('full_name'),
            'user_image' => $imageName,
            'sex' => $this->request->getVar('jenis_kelamin'),
            'place_of_birth' => $this->request->getVar('tempat_lahir'),
            'date_of_birth' => $this->request->getVar('tanggal_lahir'),
            'contact' => $this->request->getVar('kontak'),
            'email' => $this->request->getVar('email'),
            'address' => $this->request->getVar('alamat'),
        ]);        
        session()->setFlashdata('message', 'Profile berhasil diedit');
        return redirect()->to('/user/profile/'.$userId);
    }

}
   
   
