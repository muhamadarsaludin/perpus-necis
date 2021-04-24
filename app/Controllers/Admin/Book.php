<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\BookDataModel;
use App\Models\BooksModel;
use App\Models\CategoryModel;
use App\Models\TransDetailModel;

class Book extends BaseController
{
    protected $userModel;
    protected $bookDataModel;
    protected $booksModel;
    protected $categoryModel;
    protected $transDetailModel;
    // protected $db;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->bookDataModel = new BookDataModel();
        $this->booksModel = new BooksModel();
        $this->categoryModel = new CategoryModel();
        $this->transDetailModel = new TransDetailModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Daftar Buku',
            'books'  => $this->bookDataModel->getBooksData(),
            'menuActive' => 'admin book'
        ];
        // dd($data);
        return view('admin/book/index', $data);
    }
    
    public function add()
    {
        $data = [
            'title'  => 'Tambah Data Buku',
            'category' => $this->categoryModel->get()->getResultArray(),
            'validation' => \Config\Services::validation(),
            'menuActive' => 'admin book'
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
       
        session()->setFlashdata('message', 'Buku berhasil ditambahkan');
        return redirect()->to('/admin/book/detail/'. $book['id']);
    }
    public function detail($id)
    {
        $data = [
            'title'  => 'Detail Data Buku',
            'bookData'  => $this->bookDataModel->getWhere(['id' => $id])->getRowArray(),
            'books'  => $this->booksModel->getBookByBookDataId($id),
            'menuActive' => 'admin book'
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
            'menuActive' => 'admin book'
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

    public function addItem($id)
    {
        $data = [
            'title'  => 'Tambah Buku',
            'bookData'  => $this->bookDataModel->getWhere(['id' => $id])->getRowArray(),
            'validation' => \Config\Services::validation(),
            'menuActive' => 'admin book'
        ];
        // dd($data);
        return view('admin/book/item/add', $data);  
    }

    public function saveItem()
    {
        $bookDataId = $this->request->getVar('book_data_id');
        if (!$this->validate([
            'book_amount' => 'required|integer|greater_than[0]',
            'source' => 'required',
            'quality' => 'required',
        ])) {
            return redirect()->to('/admin/book/item/add/' . $bookDataId )->withInput();
        }
        $bookAmount = $this->request->getVar('book_amount');
        for ($i=0; $i < $bookAmount ; $i++) { 
            $this->booksModel->save([
                'book_data_id' => $bookDataId,
                'book_code' => strtoupper(substr(uniqid('BK-'),-10)),
                'source_book' => $this->request->getVar('source'),
                'quality' => $this->request->getVar('quality'),
            ]);
        }
        session()->setFlashdata('message', 'Item buku berhasil ditambahkan!');
        return redirect()->to('/admin/book/detail/'. $bookDataId);  
    }
    public function deleteItem($id)
    {
        $book = $this->booksModel->getWhere(['id'=> $id])->getRowArray();
        $bookData = $this->bookDataModel->getWhere(['id' => $book['book_data_id']])->getRowArray();
        $borrowing = $this->transDetailModel->getWhere(['book_id' => $id, 'status'=> 'Dipinjam']);
        if($borrowing){
            session()->setFlashdata('failed', 'Item buku sedang dipinjam (Tidak dapat dihapus)');
            return redirect()->to('/admin/book/detail/'. $bookData['id']);  
        }
        $this->booksModel->delete($id);
        session()->setFlashdata('message', 'Item buku berhasil dihapus!');
        return redirect()->to('/admin/book/detail/'. $bookData['id']);  
    }

    public function editItem($id)
    {
        $data = [
            'title'  => 'Tambah Buku',
            'book' => $this->booksModel->getWhere(['id' => $id])->getRowArray(),
            'validation' => \Config\Services::validation(),
            'menuActive' => 'admin book'
        ];
        $data['bookData'] = $this->bookDataModel->getWhere(['id' => $data['book']['book_data_id']])->getRowArray();
        // dd($data);
        return view('admin/book/item/edit', $data); 
    }

    public function updateItem()
    {
        $bookDataId = $this->request->getVar('book_data_id');
        $bookId = $this->request->getVar('id');
        if (!$this->validate([
            'source' => 'required',
            'quality' => 'required',
        ])) {
            return redirect()->to('/admin/book/item/edit/' . $bookId )->withInput();
        }
        $this->booksModel->save([
            'id' => $bookId,
            'source_book' => $this->request->getVar('source'),
            'quality' => $this->request->getVar('quality'),
            'can_borrow' => $this->request->getVar('can_borrow')
        ]);
        session()->setFlashdata('message', 'Item buku berhasil diedit!');
        return redirect()->to('/admin/book/detail/'. $bookDataId);  

    }
}