<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProfileModel extends Model
{
    protected $table = 'users_profile';
    // protected $useTimestamps = true;
    protected $allowedFields = ['user_id','full_name','user_image','sex','place_of_birth','date_of_birth','contact','email','address'];
}
