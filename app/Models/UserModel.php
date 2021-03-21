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
        $query = "SELECT `u`.`id`,`u`.`username`,`u`.`active`,`ur`.`role`, `up`.`full_name`, `up`.`user_image`, `up`.`sex`,`up`.`place_of_birth`,`up`.`date_of_birth`, `up`.`contact`,`up`.`email`, `up`.`address`
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
        $query = "SELECT `u`.`id`,`u`.`username`,`u`.`active`,`ur`.`role`, `up`.`full_name`, `up`.`user_image`, `up`.`sex`,`up`.`place_of_birth`,`up`.`date_of_birth`, `up`.`contact`,`up`.`email`, `up`.`address`
        FROM `users` AS `u`
        JOIN `users_profile` AS `up`
        ON `u`.id = `up`.`user_id`
        JOIN `users_role` AS `ur`
        ON `u`.`role_id` = `ur`.`id`
        WHERE `u`.`id` = $id
        ";
        return $this->db->query($query)->getRowArray();
    }
    
    public function getUsersMember()
    {
        $query = "SELECT `u`.`id`,`u`.`username`,`u`.`active`,`ur`.`role`, `up`.`full_name`, `up`.`user_image`, `up`.`sex`,`up`.`place_of_birth`,`up`.`date_of_birth`, `up`.`contact`,`up`.`email`, `up`.`address`, `c`.`class`, `r`.`rombel`, `m`.`nis`
        FROM `users` AS `u`
        JOIN `users_profile` AS `up`
        ON `u`.id = `up`.`user_id`
        JOIN `users_role` AS `ur`
        ON `u`.`role_id` = `ur`.`id`
        JOIN `member` AS `m`
        ON `u`.`id` = `m`.`user_id`
        JOIN `class` AS `c`
        ON `m`.`class_id` = `c`.`id`
        JOIN `rombel` AS `r`
        ON `m`.`rombel_id` = `r`.`id`
        WHERE `ur`.`role` = 'Anggota'
    ";
    return $this->db->query($query)->getResultArray(); 
    }
    public function getUsersOfficer()
    {
        $query = "SELECT `u`.`id`,`u`.`username`,`u`.`active`,`ur`.`role`, `up`.`full_name`, `up`.`user_image`, `up`.`sex`,`up`.`place_of_birth`,`up`.`date_of_birth`, `up`.`contact`,`up`.`email`, `up`.`address`, `o`.`nip`, `o`.`officer_status` 
        FROM `users` AS `u`
        JOIN `users_profile` AS `up`
        ON `u`.id = `up`.`user_id`
        JOIN `users_role` AS `ur`
        ON `u`.`role_id` = `ur`.`id`
        JOIN `officer` AS `o`
        ON `u`.`id` = `o`.`user_id`
        WHERE `ur`.`role` = 'Admin' OR `ur`.`role` = 'Admin'
    ";
    return $this->db->query($query)->getResultArray(); 
    }
}
