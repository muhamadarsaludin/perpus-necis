<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestModel extends Model
{
    protected $table = 'request';
    protected $useTimestamps = true;
    protected $allowedFields = ['user_id','title','cover','author','publisher','publication_year'];


    
public function getRequests()
{
    $query = "SELECT `r`.* , `up`.`full_name`
        FROM `request` AS `r`
        JOIN `users` AS `u`
        ON `u`.`id` = `r`.`user_id`
        JOIN `users_profile` AS `up`
        ON `u`.`id` = `up`.`user_id`
    ";
    return $this->db->query($query)->getResultArray();   
}
}

