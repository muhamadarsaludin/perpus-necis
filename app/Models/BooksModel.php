<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
    protected $table = 'books';
    protected $allowedFields = ['book_data_id','book_code','quality','source_book','can_borrow'];


    public function getBookByBookDataId($id)
    {
        $query = "SELECT `b`.*, IF(`td`.`status` = 'Dipinjam', 1,0) AS borrowing 
        FROM `books` AS `b`
        JOIN `books_data` AS `bd`
        ON `bd`.`id` = `b`.`book_data_id`
        LEFT JOIN `transaction_detail` AS `td`
        ON `td`.`book_id` = `b`.`id`
        WHERE `bd`.`id` = $id
    ";

        return $this->db->query($query)->getResultArray();
    }
}