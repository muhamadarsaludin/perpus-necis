<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Data Peminjaman</h1>
        <a href="/admin/borrowing/history" class="d-block d-sm-inline-block btn rounded-pill btn-wild-watermelon"><i class="fas fa-history"></i> Riwayat Transaksi</a>
    </div>
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table table-bordered td-align-middle" id="dataBorrow" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Peminjaman</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Kode Peminjaman</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
            <?php $i=1; ?>
            <?php foreach($borrowing as $b): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $b['transaction_code']; ?></td>
                    <td><?= $b['username']; ?></td>
                    <td><?= $b['full_name']; ?></td>
                    <td><?= $b['borrowing_amount']; ?></td>
                    <td class="text-center">
                        <a href="/admin/borrowing/detail/<?= $b['transaction_code']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></a>
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
        $('#dataBorrow').DataTable();
    });
</script>
<?= $this->endSection(); ?>