<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password', 'role_id', 'active'];

    public function getUsers()
    {
        $query = "SELECT `u`.`id`,`u`.`username`,`u`.`active`,`ur`.`role` as `role_name`, `up`.`full_name`, `up`.`user_image`, `up`.`gender`,`up`.`place_of_birth`,`up`.`date_of_birth`, `up`.`contact`,`up`.`email`, `up`.`address`
        FROM `users` AS `u`
        JOIN `users_profile` AS `up`
        ON `u`.id = `up`.`user_id`
        JOIN `users_role` AS `ur`
        ON `u`.`role_id` = `ur`.`id`
    ";
    return $this->db->query($query)->getResultArray();    
    }

    public function getUserBy($id)
    {
        $query = "SELECT `u`.`id`,`u`.`username`,`u`.`active`,`ur`.`role` as `role_name`, `up`.`full_name`, `up`.`user_image`, `up`.`gender`,`up`.`place_of_birth`,`up`.`date_of_birth`, `up`.`contact`,`up`.`email`, `up`.`address`
        FROM `users` AS `u`
        JOIN `users_profile` AS `up`
        ON `u`.id = `up`.`user_id`
        JOIN `users_role` AS `ur`
        ON `u`.`role_id` = `ur`.`id`
        WHERE `u`.`id` = $id
        ";
        return $this->db->query($query)->getRowArray();
    }
}
