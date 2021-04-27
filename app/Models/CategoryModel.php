<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'books_category';
    protected $allowedFields = ['category','description'];


    public function getAllCategory()
    {
        $query = "SELECT `bc`.*, COUNT(`bd`.`id`) as 'amount_book_data'
        FROM `books_category` AS `bc`
        LEFT JOIN `books_data` AS `bd`
        ON `bc`.`id` = `bd`.`book_category_id`
        GROUP BY `bc`.`category`
        ORDER BY `bc`.`category` ASC
    ";

        return $this->db->query($query)->getResultArray();
    }

    public function getCategoryById($id)
    {
        $query = "SELECT `bc`.*, COUNT(`bd`.`id`) as 'amount_book_data'
        FROM `books_category` AS `bc`
        LEFT JOIN `books_data` AS `bd`
        ON `bc`.`id` = `bd`.`book_category_id`
        WHERE `bc`.`id` = $id
    ";
    return $this->db->query($query)->getRowArray();
    }
}