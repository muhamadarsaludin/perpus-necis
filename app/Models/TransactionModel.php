<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transaction';
    protected $useTimestamps = true;
    protected $allowedFields = ['transaction_code','user_id'];



    public function getAllBorrowingData()
    {
        $query = "SELECT  `t`.`id`,`t`.`transaction_code`,`up`.`full_name`, `u`.`username`, COUNT(IF(`td`.`status` = 'Dipinjam', `td`.`id`, null)) AS `borrowing_amount`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `users` AS `u`
        ON `t`.`user_id` = `u`.`id`
        JOIN `users_profile` AS `up`
        ON `u`.`id` = `up`.`user_id`
        GROUP BY `t`.`transaction_code`
        ";
        return $this->db->query($query)->getResultArray();
    }

    public function getBorrowingDataByCode($code)
    {
        
        $query = "SELECT  `t`.`id`,`t`.`transaction_code`,`u`.`username`,`up`.`full_name`, COUNT(IF(`td`.`status` = 'Dipinjam', `td`.`id`, null)) AS `borrowing_amount`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `users` AS `u`
        ON `t`.`user_id` = `u`.`id`
        JOIN `users_profile` AS `up`
        ON `u`.`id` = `up`.`user_id`
        WHERE `t`.`transaction_code` = '$code'
        ";
        return $this->db->query($query)->getRowArray();
    }



    public function getAmountRegularBookByTransCode($code)
    {
        $query = "SELECT  COUNT(IF(`bd`.`buku_paket` = 0, 1, null)) AS `amount_regular`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `books` AS `b`
        ON `td`.`book_id` = `b`.`id`
        JOIN `books_data` AS `bd`
        ON `b`.`book_data_id` = `bd`.`id`
        WHERE `t`.`transaction_code` = '$code' AND `td`.`status` = 'Dipinjam'
        ";
        return $this->db->query($query)->getRowArray();
    }
}
