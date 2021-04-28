<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>

<!-- Content Row -->
<div class="row">

<img src="<?= base_url('img/jumbotron-admin.jpg'); ?>" class="img-fluid mb-4" alt="Jumbotron image">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 border-0 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto mr-3">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                    <div class="col">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $userAmount; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 border-0 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto mr-3">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                    <div class="col">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Buku</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $bookAmount; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow border-0 h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto mr-3">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                    <div class="col">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Jumlah Transaksi
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $transAmount; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow border-0 h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto mr-3">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                    <div class="col">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Denda </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= number_format($fineAmount['fine_amount'],0,',','.'); ?>,-</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-frame bg-none">
        <h1 class="main-product-title">Buku Terbaru</h1>
        <p class="product-desc">Ayo pinjam sekarang jangan sampai kehabisan!</p>
        <div class="row">
            <?php foreach($latestBook as $book): ?>
            <div class="col-3">
                <a href="/admin/book/detail/<?= $book['id']; ?>">
                    <div class="card card-product">
                        <img src="/img/books/<?= $book['book_cover']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book['book_title']; ?></h5>
                            <p class="main-product-location"><?= $book['category']; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
            
        </div>

        <h1 class="main-product-title">Ebook Terbaru</h1>
        <p class="product-desc">Yuk baca ebook terbaru biar makin banyak ilmu!</p>
        <div class="row">
        <?php foreach($latestEbook as $ebook): ?>
            <div class="col-3">
                <a href="/admin/ebook/detail/<?= $ebook['id']; ?>">
                    <div class="card card-product">
                        <img src="/img/books/<?= $ebook['book_cover']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $ebook['book_title']; ?></h5>
                            <p class="main-product-location"><?= $book['category']; ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>