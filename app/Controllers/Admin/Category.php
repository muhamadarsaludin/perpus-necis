<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\BookDataModel;
use App\Models\BooksModel;
use App\Models\CategoryModel;
use App\Models\TransDetailModel;

class Category extends BaseController
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
            'title'  => 'Kategori Buku',
            'categories'  => $this->categoryModel->getAllCategory(),
            'menuActive' => 'admin book'
        ];
        // dd($data);
        return view('admin/book/category/index', $data);
    }

    public function add()
    {
        $data = [
            'title'  => 'Tambah Kategori Buku',
            'validation' => \Config\Services::validation(),
            'menuActive' => 'admin book'
        ];
        // dd($data);
        return view('admin/book/category/add', $data); 
    }

    public function save()
    {
        if (!$this->validate([
            'category' => 'required|is_unique[books_category.category]',
        ])) {
            return redirect()->to('/admin/book/category/add')->withInput();
        }
        $this->categoryModel->save([
            'category' => $this->request->getVar('category'),
            'description' => $this->request->getVar('description'),
        ]);
        session()->setFlashdata('message', 'Kategori berhasil ditambahkan');
        return redirect()->to('/admin/book/category');
    }

    public function edit($id)
    {
        $data = [
            'title'  => 'Edit Kategori Buku',
            'category' => $this->categoryModel->getWhere(['id' => $id])->getRowArray(),
            'validation' => \Config\Services::validation(),
            'menuActive' => 'admin book'
        ];
        // dd($data);
        return view('admin/book/category/edit', $data); 
    }

    public function update()
    {
        $categoryId = $this->request->getVar('id');
        $oldCategory = $this->request->getVar('old_category');
        $category = $this->request->getVar('category');

        if($category == $oldCategory){
            $cateogryRules = 'Required';
        }else{
            $cateogryRules = 'required|is_unique[books_category.category]';
        }

        if (!$this->validate([
            'category' => $cateogryRules,
        ])) {
            return redirect()->to('/admin/book/category/edit/'. $categoryId)->withInput();
        }

        $this->categoryModel->save([
            'id' => $categoryId,
            'category' => $category,
            'description' => $this->request->getVar('description'),
        ]);
        session()->setFlashdata('message', 'Kategori berhasil diedit');
        return redirect()->to('/admin/book/category');

    }

    public function delete($id)
    {
        $category = $this->categoryModel->getCategoryById($id);
        if($category['amount_book_data'] > 0){
            session()->setFlashdata('danger', 'Kategori Tidak dapat dihapus');
            return redirect()->to('/admin/book/category');
        }
        $this->categoryModel->delete($id);
        session()->setFlashdata('message', 'Kategori berhasil dihapus');
        return redirect()->to('/admin/book/category');
    }
}
