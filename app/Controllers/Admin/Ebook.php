<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\BookDataModel;
use App\Models\BooksModel;
use App\Models\CategoryModel;
use Dompdf\Dompdf;
use Dompdf\Options;

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
            'menuActive' => 'admin book'
        ];
        // dd($data);
        return view('admin/ebook/index', $data);
    }
    
    public function add()
    {
        $data = [
            'title'  => 'Tambah Ebook',
            'category' => $this->categoryModel->get()->getResultArray(),
            'validation' => \Config\Services::validation(),
            'menuActive' => 'admin book'
        ];
        // dd($data);
        return view('admin/ebook/add', $data);   
    }

    public function save()
    {
        if (!$this->validate([
            'title' => 'required|is_unique[books_data.book_title]',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required',
            'category' => 'required',
            'upload' => [
                'rules'  => 'uploaded[upload]|max_size[upload,30240]|ext_in[upload,pdf]',
                'errors' => [
                    'ext_in' => "Extension must pdf",

                ]
            ]
        ])) {
            return redirect()->to('/admin/ebook/add')->withInput();
        }

        $image = $this->request->getFile('image');
        if ($image->getError() == 4) {
            $imageName = 'default.png';
        } else {
            // pindahkan file 
            $image->move('img/books');
            $imageName = $image->getName();
        }
        $file = $this->request->getFile('upload');
        // dd($file);
        $file->move('ebook');
        $fileName = $file->getName();

        $this->bookDataModel->save([
            'book_title' => $this->request->getVar('title'),
            'book_cover' => $imageName,
            'book_category_id' => $this->request->getVar('category'),
            'book_type_id' => 2,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'publication_year' => $this->request->getVar('year'),
            'file_name' => $fileName,
        ]);
        
        session()->setFlashdata('message', 'Ebook berhasil ditambahkan');
        return redirect()->to('/admin/ebook/');
    }
    public function detail($id)
    {
        $data = [
            'title'  => 'Detail Buku',
            'bookData'  => $this->bookDataModel->getWhere(['id' => $id])->getRowArray(),
            'menuActive' => 'admin book'
        ];
        // dd($data);
        return view('admin/ebook/detail', $data);
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
        return view('admin/ebook/edit', $data);
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
            'category' => 'required',
            'upload' => [
                'rules'  => 'max_size[upload,30240]|ext_in[upload,pdf]',
                'errors' => [
                    'ext_in' => "Extension must pdf",

                ]
            ]
        ])) {
            return redirect()->to('/admin/ebook/edit/' . $id )->withInput();
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
        $file = $this->request->getFile('upload');
        if ($file->getError() == 4) {
            $fileName = $this->request->getVar('old_file');
        } else {   
            // pindahkan file 
            $file->move('ebook');
            $fileName = $file->getName();
            // hapus file lama
            $oldFile = $this->request->getVar('old_file');
            if($oldFile != 'default.png'){
                unlink('ebook/' . $oldFile);
            }
        }
        $this->bookDataModel->save([
            'id' => $id,
            'book_title' => $this->request->getVar('title'),
            'book_cover' => $imageName,
            'book_category_id' => $this->request->getVar('category'),
            'book_type_id' => 2,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'publication_year' => $this->request->getVar('year'),
            'file_name' => $fileName,
        ]);   

        session()->setFlashdata('message', 'Data ebook berhasil diedit');
        return redirect()->to('/admin/ebook');
    }

    public function delete($id)
    {
        $book = $this->bookDataModel->getWhere(['id'=> $id])->getRowArray();
        if($book['book_cover'] != 'default.png'){
            unlink('img/books/' . $book['book_cover']);
        }
        unlink('ebook/' . $book['file_name']);
        $this->bookDataModel->delete($id);
        session()->setFlashdata('message', 'Data ebuku berhasil dihapus!');
        return redirect()->to('/admin/ebook');
        
    }
     public function report()
    {
        $data = [    
            'books'  => $this->bookDataModel->getEbooksData(),
        ];
        //dd($data);
        $options = new Options();
        $options->setIsHtml5ParserEnabled(true);
        $options->isRemoteEnabled(true);
        $options->setChroot('./');
        $dompdf = new Dompdf();
        $dompdf->setOptions($options);
        $dompdf->loadHtml(view('/admin/ebook/report_pdf', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Laporan_Ebook.pdf', ["Attachment" => false]);
    }
}