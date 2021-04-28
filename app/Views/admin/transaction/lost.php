<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Form Kehilangan</h1>
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
    <form action="/admin/transaction/lostbook" method="post" class="user" enctype="multipart/form-data">
        <?= csrf_field(); ?>
            <input type="hidden" name='detail_id' value='<?= $detail['id']; ?>'>
            <input type="hidden" name='book_id' value='<?= $bookData['id']; ?>'>
            <input type="hidden" name='transaction_code' value='<?= $detail['transaction_code']; ?>'>
            <!-- Book code -->
            <div class="form-group row">
                <label for="book_code" class="col-sm-2 col-form-label">Kode buku</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-user" id="book_code" name="book_code" value="<?= $detail['book_code']; ?>" readonly>
                    <div class="invalid-feedback">
                   
                    </div>
                </div>
            </div>
            <!-- Peminjam -->
            <div class="form-group row">
                <label for="full_name" class="col-sm-2 col-form-label">Peminjam</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-user" id="full_name" name="full_name" value="<?= $userBorrowing['full_name']; ?>" readonly>
                    <div class="invalid-feedback">
                    
                    </div>
                </div>
            </div>
            <!-- Borrow date -->
            <div class="form-group row">
                <label for="borrow_date" class="col-sm-2 col-form-label">Tanggal Peminjam</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-user" id="borrow_date" name="borrow_date" value="<?= $detail['borrow_date']; ?>" readonly>
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <!-- Return date -->
            <div class="form-group row">
                <label for="return_date" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-user" id="return_date" name="return_date" value="<?= $detail['return_date']; ?>" readonly>
                    <div class="invalid-feedback">
                    </div>
                </div>
            </div>
            <?php 
                date_default_timezone_set("Asia/Bangkok");
                $today = strtotime(date("Y-m-d"));
                $returnDate = strtotime($detail['return_date']);
                $calculate = ($today - $returnDate)/(60 * 60 * 24);
                if($calculate>=0){
                    $late = $calculate;
                }else{
                    $late = 0;
                }

                $denda = $bookData['price']+($late*$fine['fine']);
            ?>
             <!-- Late -->
             <div class="form-group row">
                <label for="late" class="col-sm-2 col-form-label">Telat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-user" id="late" name="late" value="<?= $late; ?>" readonly>
                    <div class="invalid-feedback">
                    
                    </div>
                </div>
            </div>
            <!-- Denda -->
            <div class="form-group row">
                <label for="fine" class="col-sm-2 col-form-label">Denda</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-user" id="fine_view" name="fine_view" value="Rp<?= number_format($denda, 0, ',', '.'); ?>,-" readonly>
                    <input type="hidden" class="form-control form-control-user" id="fine" name="fine" value="<?= $denda; ?>" readonly>
                    <div class="invalid-feedback">
                    
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-wild-watermelon btn-user btn-sm">Save</button>
            </div>
            
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