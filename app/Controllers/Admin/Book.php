<?php

namespace App\Controllers\Admin;
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
        return view('admin/book/index', $data);
    }
    
    public function add()
    {
        $data = [
            'title'  => 'Tambah Buku',
            'category' => $this->categoryModel->get()->getResultArray(),
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('admin/book/add', $data);   
    }

    public function save()
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
            $code = strtoupper(substr(uniqid('BK-'),0,10));
            $this->booksModel->save([
                'book_data_id' => $book['id'],
                'book_code'  => $code,
                'quality' => 'Baik'
            ]);
        }
        session()->setFlashdata('message', 'Buku berhasil ditambahkan');
        return redirect()->to('/admin/book/');
    }
    public function detail($id)
    {
        $data = [
            'title'  => 'Detail Buku',
            'bookData'  => $this->bookDataModel->getWhere(['id' => $id])->getRowArray(),
            'books'  => $this->booksModel->getWhere(['book_data_id' => $id])->getResultArray(),
        ];
        // dd($data);
        return view('admin/book/detail', $data);
    }

    public function edit($id)
    {
        $data = [
            'title'  => 'Edit Buku',
            'book' => $this->bookDataModel->getWhere(['id' => $id])->getRowArray(),
            'category' => $this->categoryModel->get()->getResultArray(),
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/book/edit', $data);
    }

    public function update()
    {
        $oldTitle = $this->request->getVar('old_book_title');
        $id = $this->request->getVar('book_id');
        $title = $this->request->getVar('book_id');
        if($oldTitle == $title){
            $titleRules = 'required';
        }else{
            $titleRules = 'required|is_unique[books_data.book_title]';
        }
        if (!$this->validate([
            'title' => $titleRules,
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required',
            'price' => 'required',
            'category' => 'required',
        ])) {
            return redirect()->to('/admin/book/edit/' . $id )->withInput();
        }

        $image = $this->request->getFile('image');
        if ($image->getError() == 4) {
            $imageName = $this->request->getVar('old_book_cover');
        } else {   
            // pindahkan file 
            $image->move('img/books');
            $imageName = $image->getName();
            // hapus file lama
            $oldImage = $this->request->getVar('old_book_cover');
            if($oldImage != 'default.png'){
                unlink('img/books/' . $oldImage);
            }
        }
        $this->bookDataModel->save([
            'id' => $id,
            'book_title' => $this->request->getVar('title'),
            'book_cover' => $imageName,
            'book_category_id' => $this->request->getVar('category'),
            'book_type_id' => 1,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'publication_year' => $this->request->getVar('year'),
            'price' => $this->request->getVar('price'),
        ]);   

        session()->setFlashdata('message', 'Data buku berhasil diedit');
        return redirect()->to('/admin/book');
    }

    public function delete($id)
    {
        $book = $this->bookDataModel->getWhere(['id'=> $id])->getRowArray();
        if($book['book_cover'] != 'default.png'){
            unlink('img/books/' . $book['book_cover']);
        }
        $this->bookDataModel->delete($id);
        session()->setFlashdata('message', 'Data buku berhasil dihapus!');
        return redirect()->to('/admin/book');
        
    }
}