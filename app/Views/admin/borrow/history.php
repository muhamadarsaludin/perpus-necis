<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Data Peminjaman</h1>
        <a href="/admin/transaction/report" class="d-block d-sm-inline-block btn rounded-pill btn-wild-watermelon"><i class="fas fa-file-alt mr-1"></i> Laporan Transaksi</a>
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
                    <th>Cover</th>
                    <th>Kode Buku</th>
                    <th>judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Terlambat</th>
                    <th>Denda</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Cover Buku</th>
                    <th>Kode Buku</th>
                    <th>judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Telat</th>
                    <th>Denda</th>
                    <th>Status</th>
                  
                </tr>
            </tfoot>
            <tbody>
            <?php $i=1; ?>
            <?php foreach($detail as $d): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><img src="/img/books/<?= $d['book_cover']; ?>" alt="" width="100px"></td>
                    <td><?= $d['book_code']; ?></td>
                    <td><?= $d['book_title']; ?></td>
                    <td><?= $d['borrow_date']; ?></td>
                    <td><?= $d['return_date']; ?></td>
                    <td><?= $d['amount_late']; ?> Hari</td>
                    <td>Rp<?= number_format($d['fine'], 0, ',', '.'); ?>,-</td>
                    <?php if($d['status'] == "Dipinjam"){
                        $color = "primary";
                    } else if($d['status'] == "Dikembalikan"){
                        $color = "success";
                    }else{
                        $color = "danger";
                    }
                    ?>
                    <td><span class="badge badge-<?= $color; ?>"><?= $d['status']; ?></span></td>
                    
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