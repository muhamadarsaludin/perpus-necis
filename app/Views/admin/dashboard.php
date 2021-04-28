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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">200</div>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">50</div>
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
                        Jumlah Peminjaman
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">20</span>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>