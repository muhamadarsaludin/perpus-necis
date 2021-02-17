<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Detail User</h1>
    </div>
    <div class="row">
        <div class="col-md-12 container">
            <h4 class="text-gray-800 font-weight-bold">Personal Informations</h4>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <form action="">
                <div class="form-group row">
                    <div class="col-md-4">
                        <img src="/img/<?= $user['user_image']; ?>" class="img-thumbnail img-preview mb-3" alt="">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <!-- <div class="invalid-feedback"></div> -->
                            <label class="custom-file-label" for="image"><?= $user['user_image']; ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="text" class="form-control" id="inputUsername" value="<?= $user['username']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputFullname">Nama Lengkap</label>
                    <input type="text" class="form-control" id="inputFullname" value="<?= $user['full_name']; ?>">
                </div>
                <td> <button type="button" class="btn <?= ($user['active'] == 1) ? 'btn-success' : 'btn-warning'; ?> btn-sm small"><?= ($user['active'] == 1) ? 'Active' : 'Disable'; ?></button></td>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataUsers').DataTable();
    });
</script>
<?= $this->endSection(); ?>