<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Tambah Buku</h1>
    </div>
    <form action="/admin/book/update" method="post" class="user" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name='book_id' value='<?= $book['id']; ?>'>
    <input type="hidden" name='old_book_cover' value='<?= $book['book_cover']; ?>'>
    <input type="hidden" name='old_book_title' value='<?= $book['book_title']; ?>'>
    <!-- image -->
    <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Image</label>
            <div class="col-3">
                <img src="/img/books/<?= $book['book_cover']; ?>" class="img-thumbnail img-preview w-100" alt="">
                <div class="custom-file mt-2">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('image') ? 'is-invalid' : ''); ?>" id="image" name="image" onchange="previewImg()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('image'); ?>
                    </div>
                    <label class="custom-file-label image-label" for="image">Upload File</label>
                </div>
            </div>
        </div>
        <!-- Title -->
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Judul Buku</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('title') ? 'is-invalid' : ''); ?>" id="title" name="title" value="<?= (old('title'))? old('title'):$book['book_title']; ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('title'); ?>
                </div>
            </div>
        </div>
        
        <!-- Author -->
        <div class="form-group row">
            <label for="author" class="col-sm-2 col-form-label">Author</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('author') ? 'is-invalid' : ''); ?>" id="author" name="author" value="<?= (old('author'))? old('author'):$book['author']; ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('author'); ?>
                </div>
            </div>
        </div>
        <!-- publisher -->
        <div class="form-group row">
            <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('publisher') ? 'is-invalid' : ''); ?>" id="publisher" name="publisher" value="<?= (old('publisher'))? old('publisher'):$book['publisher']; ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('publisher'); ?>
                </div>
            </div>
        </div>
        
        <!-- year -->
        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label">Tahun Terbit</label>
            <div class="col-sm-10">
                <input type="year" class="form-control form-control-user <?= ($validation->hasError('year') ? 'is-invalid' : ''); ?>" id="year" name="year" value="<?= (old('year'))? old('year'):$book['publication_year']; ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('year'); ?>
                </div>
            </div>
        </div>  
        <!-- Kategory -->
        <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">Kategori Buku</label>
            <div class="col-sm-10">
                <select class="custom-select <?= ($validation->hasError('category') ? 'is-invalid' : ''); ?>" name="category">
                    <?php foreach($category as $c) : ?>
                    <option value="<?= $c['id']; ?>" <?= ($c['id']==$book['book_category_id'])?'selected':''; ?>><?= $c['category']; ?></option>
                    <?php endforeach; ?>
                    
                </select>
                <div class="invalid-feedback">
                <?= $validation->getError('category'); ?>
                </div>
            </div>
        </div>
        <!-- price -->
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('price') ? 'is-invalid' : ''); ?>" id="price" name="price" value="<?= (old('price'))? old('price'):$book['price']; ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('price'); ?>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-wild-watermelon btn-user btn-sm">Save</button>
        <a href="/admin/users/roles" class="btn btn-secondary btn-user btn-sm">Cancel</a>
    </form>
</div>
<?= $this->endSection(); ?>