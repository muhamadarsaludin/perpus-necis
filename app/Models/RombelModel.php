<?php

namespace App\Models;

use CodeIgniter\Model;

class RombelModel extends Model
{
    protected $table = 'rombel';
    // protected $useTimestamps = true;
    protected $allowedFields = ['rombel','description'];
}