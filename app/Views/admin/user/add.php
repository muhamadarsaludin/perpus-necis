<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Tambah User</h1>
    </div>
    <form method="POST" action="/admin/user/save">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control <?= ($validation->hasError('username') ? 'is-invalid' : ''); ?>" id="username" name="username" placeholder="Username" value="<?= old('username'); ?>">
            <div class="invalid-feedback">
                    <?= $validation->getError('username'); ?>
                </div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control <?= ($validation->hasError('password') ? 'is-invalid' : ''); ?>" id="password" name="password" placeholder="Password" value="<?= old('password'); ?>">
            <div class="invalid-feedback">
                    <?= $validation->getError('password'); ?>
                </div>
        </div>
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" class="form-control <?= ($validation->hasError('name') ? 'is-invalid' : ''); ?>" id="name" name="name" placeholder="name" value="<?= old('name'); ?>">
            <div class="invalid-feedback">
                    <?= $validation->getError('name'); ?>
                </div>
        </div>
        <button type="submit" class="btn btn-success btn-sm rounded-pill small">Simpan</button>
    </form>

</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataUsers').DataTable();
    });
</script>
<?= $this->endSection(); ?>