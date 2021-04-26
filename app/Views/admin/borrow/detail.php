<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="row mb-4">
    <div class="col-md-6">
        <h3 class="font-weight-bold mb-3"><?= $borrowing['transaction_code']; ?></h3>
        <table class="table bg-transparent">
            <tbody>
                <tr>
                    <th scope="row">Peminjam</th>
                    <td><?= ': ' . $borrowing['full_name']; ?></td>

                </tr>
                <tr>
                    <th scope="row">Username</th>
                    <td><?= ': '. $borrowing['username']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Jumlah Pinjaman</th>
                    <td><?= ': ' . $borrowing['borrowing_amount']; ?></td>
                </tr>

            </tbody>
        </table>
        <a href="/book" class="btn btn-secondary">Back</a>
    </div>
</div>
    <div class="d-flex">
        <!-- <a href="/admin/book/add" class="d-block d-sm-inline-block btn rounded-pill btn-wild-watermelon ml-auto my-3"><i class="fas fa-plus-square mr-1"></i>Tambah Buku</a> -->
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
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
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

                    <?php 
                     date_default_timezone_set("Asia/Bangkok");
                     $today = strtotime(date("Y-m-d"));
                     $returnDate = strtotime($d['return_date']);
                     $calculate = ($today - $returnDate)/(60 * 60 * 24);
                     if($calculate>=0){
                         $late = $calculate;
                     }else{
                         $late = 0;
                     }

                    ?>
                    <td><?=  $late; ?></td>
                    <td>Rp<?= number_format($late*500, 0, ',', '.'); ?>,-</td>
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
                        <a href="/admin/transaction/returnbook/<?= $d['id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Kembalikan</span></a>
                        <a href="/admin/transaction/extend/<?= $d['id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Perpanjang</span></a>
                        <a href="/admin/transaction/lost/<?= $d['id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Kehilangan</span></a>
                    </td>
                </tr>
            <?php endforeach; ?>    
            </tbody>
        </table>
    </div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataBorrow').DataTable();
    });
</script>
<?= $this->endSection(); ?>