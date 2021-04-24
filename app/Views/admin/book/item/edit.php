<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Tambah Item Buku</h1>
    </div>
    <div class="row mb-2">
        <div class="col-md-3">
            <img src="/img/books/<?= $bookData['book_cover']; ?>" alt="" height="200px">
        </div>
        <div class="col-md-6">
            <h3 class="font-weight-bold mb-3"><?= $bookData['book_title']; ?></h3>
            <table class="table bg-transparent">
                <tbody>
                    <tr>
                        <th scope="row">Author</th>
                        <td><?= ': ' . $bookData['author']; ?></td>

                    </tr>
                    <tr>
                        <th scope="row">Publisher</th>
                        <td><?= ': ' . $bookData['publisher']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Year</th>
                        <td><?= ': ' . $bookData['publication_year']; ?></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <form action="/admin/book/item/update" method="post" class="user">
    <?= csrf_field(); ?>
        <input type="hidden" name="book_data_id" value="<?= $bookData['id']; ?>">
        <input type="hidden" name="id" value="<?= $book['id']; ?>">
        <!-- book amount -->
        <div class="form-group row">
            <label for="book_code" class="col-sm-2 col-form-label">Kode Buku</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" id="book_code" name="book_code" value="<?= $book['book_code'] ?>" readonly>
                <div class="invalid-feedback">
                <?= $validation->getError('book_code'); ?>
                </div>
            </div>
        </div>
        
        <!-- source -->
        <div class="form-group row">
            <label for="source" class="col-sm-2 col-form-label">Sumber Buku</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('source') ? 'is-invalid' : ''); ?>" id="source" name="source" value="<?= (old('source'))?old('source'):$book['source_book']; ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('source'); ?>
                </div>
            </div>
        </div>
        <!-- Quality -->
        <div class="form-group row">
            <label for="quality" class="col-sm-2 col-form-label">Kualitas Buku</label>
            <div class="col-sm-10">
                <select class="custom-select <?= ($validation->hasError('quality') ? 'is-invalid' : ''); ?>" name="quality">
                    <option value="Baik" <?= ($book['quality']=="Baik")?'selected':''; ?>>Baik</option>
                    <option value="Rusak"<?= ($book['quality']=="Rusak")?'selected':''; ?>>Rusak</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('quality'); ?>
                </div>
            </div>
        </div>
        <!-- can borrow -->
        <div class="row mb-4">
            <div class="form-check ml-auto">
                <input type="checkbox" class="form-check-input check-can-borrow <?= ($validation->hasError('can_borrow') ? 'is-invalid' : ''); ?>" id="can_borrow" name="can_borrow" value="<?= $book['can_borrow']; ?>" <?= ($book['can_borrow']==1)?'checked':''; ?>>
                <div class="invalid-feedback">
                        <?= $validation->getError('can_borrow'); ?>
                    </div>
                <label class="form-check-label" for="can_borrow">Dapat dipinjam?</label>
            </div>
        </div>
        

        <button type="submit" class="btn btn-wild-watermelon btn-user btn-sm">Save</button>
        <a href="/admin/book/detail/<?= $bookData['id']; ?>" class="btn btn-secondary btn-user btn-sm">Cancel</a>
    </form>
</div>
<?= $this->endSection(); ?>