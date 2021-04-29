<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $table = 'class';
    // protected $useTimestamps = true;
    protected $allowedFields = ['class'];


    public function getAllClass()
    {
        $query = "SELECT `c`.*, COUNT(DISTINCT `r`.`id`) as 'rombel_amount', COUNT(`m`.`id`) AS `member_amount`
        FROM `class` AS `c`
        LEFT JOIN `member` AS `m`
        ON `c`.`id` = `m`.`class_id`
        LEFT JOIN `rombel` AS `r`
        ON `r`.`id` = `m`.`rombel_id`
        GROUP BY `c`.`id`
    ";

        return $this->db->query($query)->getResultArray();
    }

    public function getClassById($id)
    {
        $query = "SELECT `c`.*,`r`.`id` as 'rombel_id', `r`.`rombel`, COUNT(`m`.`id`) AS 'member_amount'
        FROM `class` AS `c`
        LEFT JOIN `member` AS `m`
        ON `c`.`id` = `m`.`class_id`
        LEFT JOIN `rombel` AS `r`
        ON `r`.`id` = `m`.`rombel_id`
        WHERE `c`.`id` = $id
        GROUP BY `r`.`id`
    ";

        return $this->db->query($query)->getResultArray();
    }

    public function getDetailByClassIdAndRombelId($classId, $rombelId)
    {
        $query = "SELECT `c`.`id` AS `class_id`, `c`.`class`, `r`.`id` as 'rombel_id', `r`.`rombel`,`m`.`nis`,`u`.`id` as 'user_id',`u`.`username`,`u`.`password`,`u`.`active`, `up`.`full_name`, `up`.`user_image`, `up`.`sex`,`up`.`place_of_birth`,`up`.`date_of_birth`, `up`.`contact`,`up`.`email`, `up`.`address`, COUNT(IF(`td`.`status` = 'Dipinjam', `td`.`id`, null)) AS `borrowing_amount`
        FROM `class` AS `c`
        LEFT JOIN `member` AS `m`
        ON `c`.`id` = `m`.`class_id`
        LEFT JOIN `rombel` AS `r`
        ON `r`.`id` = `m`.`rombel_id`
        JOIN `users` AS `u`
        ON `u`.`id` = `m`.`user_id`
        JOIN `users_profile` AS `up`
        ON `u`.`id` = `up`.`user_id`
        LEFT JOIN `transaction` AS `t`
        ON `t`.`user_id` = `u`.`id`
        LEFT JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        WHERE `c`.`id` = $classId AND `r`.`id` = $rombelId
        GROUP BY `u`.`id`
    ";

        return $this->db->query($query)->getResultArray();
    }
}
