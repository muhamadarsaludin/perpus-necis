<?php

namespace App\Models;

use CodeIgniter\Model;

class TransDetailModel extends Model
{
    protected $table = 'transaction_detail';
    protected $useTimestamps = true;
    protected $allowedFields = ['transaction_id','book_id','status','borrow_date','return_date','amount_late','fine'];



    public function getDetailBorrowByCode($code)
    {
        $query = "SELECT  `td`.`id`,`t`.`transaction_code`,`b`.`book_code`,`bd`.`book_title`,`bd`.`book_cover`,`td`.`borrow_date`,`td`.`status`,`td`.`return_date`,`td`.`amount_late`,`td`.`fine`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `books` AS `b`
        ON `td`.`book_id` = `b`.`id`
        JOIN `books_data` AS `bd`
        ON `bd`.`id` = `b`.`book_data_id`
        WHERE `t`.`transaction_code` = '$code'
        ";
        return $this->db->query($query)->getResultArray();
    }
}
