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
        LEFT JOIN `transaction_detail` AS `td`
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

    public function getMinPaymentDate()
    {
        $query = "SELECT min(`td`.`borrow_date`) as `min_date`
        FROM `transaction_detail` as `td`
        INNER JOIN `transaction` as `t`
        ON `t`.id = `td`.`transaction_id`
        INNER JOIN `books` as `b`
        ON `b`.`id` = `td`.`book_id`";
        $result = $this->db->query($query)->getRow();
        return date('m/d/Y', strtotime($result->min_date));
    }


    public function getTransactionBetweenDate($start_date, $end_date)
    {
        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = date('Y-m-d', strtotime($end_date));

        $query = "SELECT  `td`.`id`,`t`.`transaction_code`,`b`.`book_code`,`bd`.`book_title`,`bd`.`book_cover`,`td`.`borrow_date`,`td`.`status`,`td`.`return_date`,`td`.`amount_late`,`td`.`fine`,`full_name`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `books` AS `b`
        ON `td`.`book_id` = `b`.`id`
        JOIN `books_data` AS `bd`
        ON `bd`.`id` = `b`.`book_data_id`
        JOIN `users` AS `u`
        ON `t`.`user_id` = `u`.`id`
        JOIN `users_profile` AS `up`
        ON `u`.`id` = `up`.`user_id`
        WHERE `td`.`borrow_date` BETWEEN '$start_date' AND '$end_date'
        ";
        return $this->db->query($query)->getResultArray();
    }

}
