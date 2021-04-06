<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'member';
    // protected $useTimestamps = true;
    protected $allowedFields = ['user_id','nis','class_id','rombel_id'];
}
