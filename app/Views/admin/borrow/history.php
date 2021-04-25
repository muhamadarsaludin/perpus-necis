<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Data Peminjaman</h1>
        <a href="" class="d-block d-sm-inline-block btn rounded-pill btn-wild-watermelon"><i class="fas fa-history"></i> Laporan Transaksi</a>
    </div>
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <div class="table-responsive">
    <table class="table table-bordered td-align-middle" id="dataVendors" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                    <th>Cover</th>
                    <th>Kode Buku</th>
                    <th>judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Action</th>
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
                    <th>Status</th>
                    <th>Action</th>
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
                    <?php if($d['status'] == "Dipinjam"){
                        $color = "primary";
                    } else if($d['status'] == "Dikembalikan"){
                        $color = "success";
                    }else{
                        $color = "danger";
                    }
                    ?>
                    <td><span class="badge badge-<?= $color; ?>"><?= $d['status']; ?></span></td>
                    <td class="text-center">
                        <a href="/admin/borrow/history/detail/<?= $d['id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></a>
                        <a href="/admin/borrow/history/edit/<?= $d['id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></a>
                        <form action="/admin/borrow/" method="POST" class="d-inline form-delete">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-action btn-sm small mb-1 btn-delete"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
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
        $('#dataBorrow').DataTable();
    });
</script>
<?= $this->endSection(); ?>