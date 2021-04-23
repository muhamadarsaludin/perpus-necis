<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Daftar Buku</h1>
        <a href="/admin/book/add" class="d-block d-sm-inline-block btn rounded-pill btn-wild-watermelon"><i class="fas fa-plus-square mr-1"></i>Tambah Buku</a>
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
                    <th width='50px'>Sampul</th>
                    <th>Nama Buku</th>
                    <th>Kategori</th>
                    <th>Tipe</th>
                    <th>Penulis</th>
                    <th>Banyak Buku</th>
                    <th>Tersedia</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Sampul</th>
                    <th>Nama Buku</th>
                    <th>Kategori</th>
                    <th>Tipe</th>
                    <th>Penulis</th>
                    <th>Banyak Buku</th>
                    <th>Tersedia</th>
                </tr>
            </tfoot>
            <tbody>
            <?php $i=1; ?>
            <?php foreach($books as $book): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><img src="/img/books/<?= $book['book_cover']; ?>" alt="" class="w-100"></td>
                    <td><?= $book['book_title']; ?></td>
                    <td><?= $book['category']; ?></td>
                    <td><?= $book['type']; ?></td>
                    <td><?= $book['author']; ?></td>
                    <td>5</td>
                    <td>3</td>
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
        $('#dataVendors').DataTable();
    });
</script>
<?= $this->endSection(); ?>