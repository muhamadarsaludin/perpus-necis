<?php

namespace App\Models;

use CodeIgniter\Model;

class BookDataModel extends Model
{
    protected $table = 'books_data';
    protected $useTimestamps = true;
    protected $allowedFields = ['book_title','book_cover','book_category_id','book_type_id','author','publisher','publication_year','file_name','price'];

     // User Role
     public function getBooksData()
     {
         $query = "SELECT `bd`.*,`bc`.`category`,`bt`.`type`, `b`.`book_data_id`, COUNT(`b`.`book_data_id`) AS amount, COUNT(IF(`td`.`status` = 'Dipinjam', 1,null)) AS amount_borrowing
             FROM `books_data` AS `bd`
             LEFT JOIN `books` AS `b`
             ON `bd`.`id` = `b`.`book_data_id`
             JOIN `books_category` AS `bc`
             ON `bd`.`book_category_id` = `bc`.`id`
             JOIN `books_type` AS `bt`
             ON `bd`.`book_type_id` = `bt`.`id`
             LEFT JOIN `transaction_detail` AS `td`
             ON `td`.`book_id` = `b`.`id`
             WHERE `bd`.`book_type_id` = 1
             GROUP BY `bd`.`id`
             ORDER BY `bd`.`id` ASC
         ";
 
             return $this->db->query($query)->getResultArray();
     }   
     public function getEbooksData()
     {
         $query = "SELECT `bd`.*,`bc`.`category`,`bt`.`type`, `b`.`book_data_id`, COUNT(`b`.`book_data_id`) AS amount
             FROM `books_data` AS `bd`
             LEFT JOIN `books` AS `b`
             ON `bd`.`id` = `b`.`book_data_id`
             JOIN `books_category` AS `bc`
             ON `bd`.`book_category_id` = `bc`.`id`
             JOIN `books_type` AS `bt`
             ON `bd`.`book_type_id` = `bt`.`id`
             WHERE `bd`.`book_type_id` = 2
             GROUP BY `bd`.`id`
             ORDER BY `bd`.`id` ASC
         ";
 
             return $this->db->query($query)->getResultArray();
     }   


}
