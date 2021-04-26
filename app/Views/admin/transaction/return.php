<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Pengembalian Buku</h1>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <img src="/img/books/<?= $bookData['book_cover']; ?>" alt="" height="200px">
        </div>
        <div class="col-md-6">
            <h3 class="font-weight-bold mb-3"><?= $bookData['book_title']; ?></h3>
            <table class="table bg-transparent">
                <tbody>
                    <tr>
                        <th scope="row">Author</th>
                        <td><?= ': ' . $bookData['author']; ?></td>

                    </tr>
                    <tr>
                        <th scope="row">Publisher</th>
                        <td><?= ': ' . $bookData['publisher']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Year</th>
                        <td><?= ': ' . $bookData['publication_year']; ?></td>
                    </tr>

                </tbody>
            </table>
            <!-- <a href="/book" class="btn btn-secondary">Back</a> -->
        </div>
    </div>
    <form action="/admin/transaction/update" method="post" class="user" enctype="multipart/form-data">
        <?= csrf_field(); ?>
            <input type="hidden" name='detail_id' value='<?= $detailBorrow['id']; ?>'>
            <!-- T code -->
            <div class="form-group row">
                <label for="transaction_code" class="col-sm-2 col-form-label">Kode Transaksi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('transaction_code') ? 'is-invalid' : ''); ?>" id="transaction_code" name="transaction_code" value="<?= $detailBorrow['transaction_code']; ?>" readonly>
                    <div class="invalid-feedback">
                    <?= $validation->getError('transaction_code'); ?>
                    </div>
                </div>
            </div>
            <!-- Book code -->
            <div class="form-group row">
                <label for="book_code" class="col-sm-2 col-form-label">Kode buku</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('book_code') ? 'is-invalid' : ''); ?>" id="book_code" name="book_code" value="<?= $detailBorrow['book_code']; ?>" readonly>
                    <div class="invalid-feedback">
                    <?= $validation->getError('book_code'); ?>
                    </div>
                </div>
            </div>
            <!-- Book code -->
            <div class="form-group row">
                <label for="book_code" class="col-sm-2 col-form-label">Kode buku</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('book_code') ? 'is-invalid' : ''); ?>" id="book_code" name="book_code" value="<?= $detailBorrow['book_code']; ?>" readonly>
                    <div class="invalid-feedback">
                    <?= $validation->getError('book_code'); ?>
                    </div>
                </div>
            </div>
            <!-- Peminjam -->
            <div class="form-group row">
                <label for="full_name" class="col-sm-2 col-form-label">Peminjam</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('full_name') ? 'is-invalid' : ''); ?>" id="full_name" name="full_name" value="<?= $detailBorrow['full_name']; ?>" readonly>
                    <div class="invalid-feedback">
                    <?= $validation->getError('full_name'); ?>
                    </div>
                </div>
            </div>
            <!-- Borrow date -->
            <div class="form-group row">
                <label for="borrow_date" class="col-sm-2 col-form-label">Tanggal Peminjam</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('borrow_date') ? 'is-invalid' : ''); ?>" id="borrow_date" name="borrow_date" value="<?= $detailBorrow['borrow_date']; ?>" readonly>
                    <div class="invalid-feedback">
                    <?= $validation->getError('borrow_date'); ?>
                    </div>
                </div>
            </div>
            <!-- Return date -->
            <div class="form-group row">
                <label for="return_date" class="col-sm-2 col-form-label">Tengat Pengembalian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('return_date') ? 'is-invalid' : ''); ?>" id="return_date" name="return_date" value="<?= $detailBorrow['return_date']; ?>" readonly>
                    <div class="invalid-feedback">
                    <?= $validation->getError('return_date'); ?>
                    </div>
                </div>
            </div>
            <?php 
                date_default_timezone_set("Asia/Bangkok");
                $today = strtotime(date("Y-m-d"));
                $returnDate = strtotime($detailBorrow['return_date']);
                $calculate = ($today - $returnDate)/(60 * 60 * 24);
                if($calculate>=0){
                    $late = $calculate;
                }else{
                    $late = 0;
                }
            ?>
             <!-- Late -->
             <div class="form-group row">
                <label for="late" class="col-sm-2 col-form-label">Telat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('late') ? 'is-invalid' : ''); ?>" id="late" name="late" value="<?= $late; ?>" readonly>
                    <div class="invalid-feedback">
                    <?= $validation->getError('late'); ?>
                    </div>
                </div>
            </div>
            <!-- Denda -->
            <div class="form-group row">
                <label for="fine" class="col-sm-2 col-form-label">Denda</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('fine') ? 'is-invalid' : ''); ?>" id="fine" name="fine" value="<?= $late*500; ?>" readonly>
                    <div class="invalid-feedback">
                    <?= $validation->getError('fine'); ?>
                    </div>
                </div>
            </div>
            <?php if($late>0): ?>
            <!-- paid -->
            <div class="row mb-4">
                <div class="form-check ml-auto">
                    <input type="checkbox" class="form-check-input paid" id="paid" name="paid" value="0">
                    <div class="invalid-feedback">
                            <?= $validation->getError('paid'); ?>
                        </div>
                    <label class="form-check-label" for="paid">Denda telah dibayar?</label>
                </div>
            </div>
            <?php endif; ?>

    </form>
</div>   

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataVendors').DataTable();
    });
</script>
<?= $this->endSection(); ?>