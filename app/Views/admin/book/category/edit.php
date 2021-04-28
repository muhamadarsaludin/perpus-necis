<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Tambah Category</h1>
    </div>

    <form action="/admin/book/category/update" method="post" class="user" enctype="multipart/form-data">
    <?= csrf_field(); ?>
      <!-- Category -->
      <input type="hidden" name="id" value='<?= $category['id']; ?>'>
      <input type="hidden" name="old_category" value='<?= $category['category']; ?>'>
      <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('category') ? 'is-invalid' : ''); ?>" id="category" name="category" value="<?= (old('category'))?old('category'):$category['category']; ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('category'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea class="form-control <?= ($validation->hasError('description') ? 'is-invalid' : ''); ?>" id="description" name="description" rows="4"><?= (old('description'))?old('description'):$category['description']; ?></textarea>
                <div class="invalid-feedback">
                <?= $validation->getError('description'); ?>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-wild-watermelon btn-user btn-sm">Save</button>
            <a href="/admin/book/category" class="btn btn-secondary btn-user btn-sm">Cancel</a>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>