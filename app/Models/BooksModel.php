<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
    protected $table = 'books';
    protected $allowedFields = ['book_data_id','book_code','quality','source_book','can_borrow'];

    public function getBookByCode($code)
    {
        $query = "SELECT `b`.*,`bd`.`book_title`, `bd`.`book_cover`,`bd`.`buku_paket`,`c`.`category`,`bd`.`author`,`bd`.`publisher`,`bd`.`publication_year`,`bd`.`price`,`td`.`status`
        FROM `books` AS `b`
        JOIN `books_data` AS `bd`
        ON `bd`.`id` = `b`.`book_data_id`
        JOIN `books_category` AS `c`
        ON `bd`.`book_category_id` = `c`.`id`
        LEFT JOIN `transaction_detail` AS `td`
        ON `td`.`book_id` = `b`.`id`
        WHERE `b`.`book_code` = '$code'
    ";

        return $this->db->query($query)->getRowArray();
    }

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