<?php

namespace App\Models;

use CodeIgniter\Model;

class UserRoleModel extends Model
{
    protected $table = 'users_role';
    // protected $useTimestamps = true;
    protected $allowedFields = ['role'];
}
