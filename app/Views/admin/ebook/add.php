<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Tambah Ebook</h1>
    </div>
    <form action="/admin/ebook/save" method="post" class="user" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <!-- image -->
    <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Image</label>
            <div class="col-3">
                <img src="/img/books/default.png" class="img-thumbnail img-preview w-100" alt="">
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
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('title') ? 'is-invalid' : ''); ?>" id="title" name="title" value="<?= old('title'); ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('title'); ?>
                </div>
            </div>
        </div>
        
        <!-- Author -->
        <div class="form-group row">
            <label for="author" class="col-sm-2 col-form-label">Author</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('author') ? 'is-invalid' : ''); ?>" id="author" name="author" value="<?= old('author'); ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('author'); ?>
                </div>
            </div>
        </div>
        <!-- publisher -->
        <div class="form-group row">
            <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('publisher') ? 'is-invalid' : ''); ?>" id="publisher" name="publisher" value="<?= old('publisher'); ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('publisher'); ?>
                </div>
            </div>
        </div>
        
        <!-- year -->
        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label">Tahun Terbit</label>
            <div class="col-sm-10">
                <input type="year" class="form-control form-control-user <?= ($validation->hasError('year') ? 'is-invalid' : ''); ?>" id="year" name="year" value="<?= old('year'); ?>">
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
                    <option>Pilih Kategori</option>
                    <?php foreach($category as $c) : ?>
                    <option value="<?= $c['id']; ?>"><?= $c['category']; ?></option>
                    <?php endforeach; ?>
                    
                </select>
                <div class="invalid-feedback">
                <?= $validation->getError('category'); ?>
                </div>
            </div>
        </div>
       <!-- pdf -->
       <div class="form-group row">
            <label for="upload" class="col-sm-2 col-form-label text-white">Upload File</label>

            <div class="col-sm-10">
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('upload') ? 'is-invalid' : ''); ?>" id="upload" name="upload" onchange="previewPdf()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('upload'); ?>
                    </div>
                    <label class="custom-file-label pdf-label" for="upload">Upload File</label>
                </div>
                <div class="invalid-feedback">
                    <?= $validation->getError('upload'); ?>
                </div>
                <iframe src="" height="300" class="mt-2 w-100 d-none preview-pdf" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html" frameborder="0"></iframe>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-wild-watermelon btn-user btn-sm">Save</button>
            <a href="/admin/ebook" class="btn btn-secondary btn-user btn-sm">Cancel</a>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>