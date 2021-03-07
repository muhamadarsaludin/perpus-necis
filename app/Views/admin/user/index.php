<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Users</h1>
    </div>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <a href="/admin/user/add" class="btn btn-wild-watermelon btn-sm rounded-pill mb-3">Tambah User</a>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataUsers" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $user['username']; ?></td>
                        <td> <button type="button" class="btn <?= ($user['active'] == 1) ? 'btn-success' : 'btn-warning'; ?> btn-sm small"><?= ($user['active'] == 1) ? 'Active' : 'Disable'; ?></button></td>
                        <td class="text-center">
                            <a href="/admin/user/detail/<?= $user['id']; ?>" class="btn btn-success btn-sm rounded-pill small">Detail</a>
                            <a href="/admin/user/edit/<?= $user['id']; ?>" class="btn btn-info btn-sm rounded-pill small">Edit</a>
                            <form action="/admin/user/<?= $user['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm rounded-pill small" onclick="return confirm('Apakah anda yakin akan menghapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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