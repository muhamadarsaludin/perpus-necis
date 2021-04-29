<?php

namespace App\Models;

use CodeIgniter\Model;

class RombelModel extends Model
{
    protected $table = 'rombel';
    // protected $useTimestamps = true;
    protected $allowedFields = ['rombel'];


    public function getAllRombel()
    {
        $query = "SELECT `R`.*, COUNT(DISTINCT `c`.`id`) AS 'class_amount', COUNT(`m`.`id`) AS `member_amount`
        FROM `rombel` AS `r`
        LEFT JOIN `member` AS `m`
        ON `r`.`id` = `m`.`rombel_id`
        LEFT JOIN `class` AS `c`
        ON `c`.`id` = `m`.`class_id`
        GROUP BY `r`.`id`
    ";

        return $this->db->query($query)->getResultArray();
    }

    
    public function getRombelById($id)
    {
        $query = "SELECT `r`.*,`c`.`id` as 'class_id', `c`.`class`, COUNT(`m`.`id`) AS 'member_amount'
        FROM `rombel` AS `r`
        LEFT JOIN `member` AS `m`
        ON `r`.`id` = `m`.`rombel_id`
        LEFT JOIN `class` AS `c`
        ON `c`.`id` = `m`.`class_id`
        WHERE `r`.`id` = $id
        GROUP BY `c`.`id`
    ";

        return $this->db->query($query)->getResultArray();
    }

}