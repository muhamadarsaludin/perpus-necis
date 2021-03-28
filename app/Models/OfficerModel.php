<?php

namespace App\Models;

use CodeIgniter\Model;

class OfficerModel extends Model
{
    protected $table = 'officer';
    // protected $useTimestamps = true;
    protected $allowedFields = ['user_id','nip','officer_status'];
}
