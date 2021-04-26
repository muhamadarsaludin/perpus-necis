<?php

namespace App\Models;

use CodeIgniter\Model;

class FineModel extends Model
{
    protected $table = 'fine';
    // protected $useTimestamps = true;
    protected $allowedFields = ['fine'];
}
