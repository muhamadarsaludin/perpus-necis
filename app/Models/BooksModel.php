<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
    protected $table = 'books';
    protected $allowedFields = ['book_data_id','book_code','quality','source_book','can_borrow'];
}