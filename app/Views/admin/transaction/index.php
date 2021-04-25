<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Transaksi Peminjaman</h1>
    </div>
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>


    <div class="row card p-4">
     <!-- Title -->
        <form action="/admin/book/save" method="post" class="user" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <!-- Title -->
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Judul Buku</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-user " id="title" name="title" value="<?= old('title'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>
                <button type="submit" class="btn btn-wild-watermelon btn-user col-sm-1">Cari</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataBorrow').DataTable();
    });
</script>
<?= $this->endSection(); ?>