<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\BookDataModel;
use App\Models\BooksModel;
use App\Models\CategoryModel;

class Ebook extends BaseController
{
    protected $userModel;
    protected $bookDataModel;
    protected $booksModel;
    protected $categoryModel;
    // protected $db;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->bookDataModel = new BookDataModel();
        $this->booksModel = new BooksModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Daftar Ebook',
            'books'  => $this->bookDataModel->getEbooksData(),
        ];
        return view('user/ebook/index', $data);
    }
    public function detail($id)
    {
        $data = [
            'title'  => 'Detail Buku',
            'bookData'  => $this->bookDataModel->getWhere(['id' => $id])->getRowArray(),
        ];
        // dd($data);
        return view('user/ebook/detail', $data);
    }
}