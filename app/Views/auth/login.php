<?= $this->extend('templates/auth'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid overflow-hidden px-0">
    <!-- Outer Row -->
    <div class="row justify-content-center overflow-hidden" style="height: 100vh;">

        <div class="col">

            <div class="card o-hidden border-0" style="border-radius: 0;">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row" style="height: 100vh;">
                        <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-7 px-5">
                            <div class="row justify-content-center align-items-center h-100">
                                <div class="col px-5">
                                    <div class="px-5">
                                        <div class="text-center mb-4">
                                            <img src="/img/logo.png" alt="RH Wedding Logo" class="mb-4" width="80px">
                                            <h4 class="font-weight-bold">PERPUSTAKAAN</h4>
                                            <h5 class="font-weight-bold">SMP NEGERI 1 CISAYONG</h5>
                                        </div>
                                        <form action="/auth/login" method="post" class="user">
                                            <?= csrf_field() ?>
                                            <div class="form-group">
                                                <input type="username" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="username" placeholder="Username">
                                                <div class="invalid-feedback">
                                                    <?= session('errors.login') ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="Password">
                                                <div class="invalid-feedback">
                                                    <?= session('errors.password') ?>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-wild-watermelon btn-user btn-block">
                                                Sign In
                                            </button>
                                            <hr>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection(); ?>