<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $table = 'class';
    // protected $useTimestamps = true;
    protected $allowedFields = ['class','description'];
}
