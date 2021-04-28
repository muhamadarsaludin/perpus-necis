<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Request Buku</h1>
    </div>
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <form action="/user/request/save" method="post" class="user">
    <?= csrf_field(); ?>
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
        <div class="text-right">
        <button type="submit" class="btn btn-wild-watermelon btn-user btn-sm">Save</button>
        <a href="/user" class="btn btn-secondary btn-user btn-sm">Cancel</a>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>