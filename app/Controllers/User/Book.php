<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\BookDataModel;
use App\Models\BooksModel;
use App\Models\CategoryModel;

class Book extends BaseController
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
            'title'  => 'Daftar Buku',
            'books'  => $this->bookDataModel->getBooksData(),
        ];
        // dd($data);
        return view('user/book/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'  => 'Detail Buku',
            'bookData'  => $this->bookDataModel->getWhere(['id' => $id])->getRowArray(),
            'books'  => $this->booksModel->getBookByBookDataId($id),
        ];
        // dd($data);
        return view('user/book/detail', $data);
    }


    public function request()
    {
        if (!$this->validate([
            'title' => 'required|is_unique[books_data.book_title]',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required',
            'jumlah_buku' => 'required|integer',
            'price' => 'required',
            'category' => 'required',
        ])) {
            return redirect()->to('/admin/book/add')->withInput();
        }

        $image = $this->request->getFile('image');
        if ($image->getError() == 4) {
            $imageName = 'default.png';
        } else {
            // pindahkan file 
            $image->move('img/books');
            $imageName = $image->getName();
        }

        $this->bookDataModel->save([
            'book_title' => $this->request->getVar('title'),
            'book_cover' => $imageName,
            'book_category_id' => $this->request->getVar('category'),
            'book_type_id' => 1,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'publication_year' => $this->request->getVar('year'),
            'price' => $this->request->getVar('price'),
        ]);
        
        $book = $this->bookDataModel->getWhere(['book_title' => $this->request->getVar('title')])->getRowArray();
        $jumlahBuku = $this->request->getVar('jumlah_buku');
        for ($i=0; $i < $jumlahBuku; $i++) { 
            $code = strtoupper(uniqid('BK-'));
            $this->booksModel->save([
                'book_data_id' => $book['id'],
                'book_code'  => $code,
                'quality' => 'Baik'
            ]);
        }
        session()->setFlashdata('message', 'Buku berhasil ditambahkan');
        return redirect()->to('/admin/book/');
    }
}