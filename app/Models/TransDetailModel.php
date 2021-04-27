<?php

namespace App\Models;

use CodeIgniter\Model;

class TransDetailModel extends Model
{
    protected $table = 'transaction_detail';
    protected $useTimestamps = true;
    protected $allowedFields = ['transaction_id','book_id','status','borrow_date','return_date','amount_late','fine'];


    public function getAllDetailBorrowing()
    {
        $query = "SELECT  `td`.`id`,`t`.`transaction_code`,`b`.`book_code`,`bd`.`book_title`,`bd`.`book_cover`,`td`.`borrow_date`,`td`.`status`,`td`.`return_date`,`td`.`amount_late`,`td`.`fine`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `books` AS `b`
        ON `td`.`book_id` = `b`.`id`
        JOIN `books_data` AS `bd`
        ON `bd`.`id` = `b`.`book_data_id`
        ";
        return $this->db->query($query)->getResultArray();
    }

    public function getDetailBorrowById($id)
    {
        $query = "SELECT  `td`.`id`,`u`.`id` AS `user_id`,`t`.`transaction_code`,`b`.`book_code`,`bd`.`book_title`,`bd`.`book_cover`,`td`.`borrow_date`,`td`.`status`,`td`.`return_date`,`td`.`amount_late`,`td`.`fine`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `books` AS `b`
        ON `td`.`book_id` = `b`.`id`
        JOIN `books_data` AS `bd`
        ON `bd`.`id` = `b`.`book_data_id`
        JOIN `users` AS `u`
        ON `t`.`user_id` = `u`.`id`
        WHERE `td`.id = $id
       ";
       return $this->db->query($query)->getRowArray();
    }

    public function getDetailBorrowByTransCode($code)
    {
        $query = "SELECT  `td`.`id`,`t`.`transaction_code`,`bd`.`buku_paket`,`b`.`book_code`,`bd`.`book_title`,`bd`.`book_cover`,`td`.`borrow_date`,`td`.`status`,`td`.`return_date`,`td`.`amount_late`,`td`.`fine`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `books` AS `b`
        ON `td`.`book_id` = `b`.`id`
        JOIN `books_data` AS `bd`
        ON `bd`.`id` = `b`.`book_data_id`
        WHERE `t`.`transaction_code` = '$code' AND `td`.`status` ='Dipinjam'
        ";
        return $this->db->query($query)->getResultArray();
    }
}
