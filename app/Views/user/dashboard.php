<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>

<!-- Content Row -->
<div class="row">

<img src="<?= base_url('img/jumbotron-admin.jpg'); ?>" class="img-fluid mb-4" alt="Jumbotron image">
    
        <div class="content-frame bg-none">
            <h1 class="main-product-title">Title</h1>
            <p class="product-desc">subtitle</p>
            <div class="row">
                <div class="col-3">
                    <a href="/">
                        <div class="card card-product">
                            <img src="/img/books/default.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">name</h5>
                                <p class="main-product-location">Tasikmalaya</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="/">
                        <div class="card card-product">
                            <img src="/img/books/default.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">name</h5>
                                <p class="main-product-location">Tasikmalaya</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="/">
                        <div class="card card-product">
                            <img src="/img/books/default.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">name</h5>
                                <p class="main-product-location">Tasikmalaya</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="/">
                        <div class="card card-product">
                            <img src="/img/books/default.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">name</h5>
                                <p class="main-product-location">Tasikmalaya</p>
                            </div>
                        </div>
                    </a>
                </div>
                    
            </div>
        </div>

</div>
<?= $this->endSection(); ?>