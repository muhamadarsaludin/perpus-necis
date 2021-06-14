<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>

<!-- Content Row -->
<div class="row">

<img src="<?= base_url('img/jumbotron-admin.jpg'); ?>" class="img-fluid mb-4" alt="Jumbotron image">
    
<div class="content-frame bg-none">
        <h1 class="main-product-title">Buku Terbaru</h1>
        <p class="product-desc">Ayo pinjam sekarang jangan sampai kehabisan!</p>
        <div class="row">
            <?php foreach($latestBook as $book): ?>
            <div class="col-xl-3 col-md-6">
                <a href="/user/book/detail/<?= $book['id']; ?>">
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
            <div class="col-xl-3 col-md-6">
                <a href="/user/ebook/detail/<?= $ebook['id']; ?>">
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