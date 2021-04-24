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
                                        <div class="text-center mb-5">
                                            <img src="/img/logo.png" alt="SMP Negeri 1 Cisayong" class="mb-4" width="80px">
                                            <h4 class="font-weight-bold">PERPUSTAKAAN</h4>
                                            <h5 class="font-weight-bold">SMP NEGERI 1 CISAYONG</h5>
                                            <?php if (session()->getFlashdata('message')) : ?>
                                                <div class="alert alert-danger text-left" role="alert">
                                                    <?= session()->getFlashdata('message'); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <form action="/auth/login" method="post" class="user">
                                            <?= csrf_field() ?>
                                            <div class="form-group">
                                                <input type="username" class="form-control form-control-user <?= ($validation->hasError('username') ? 'is-invalid' : ''); ?>" name="username" placeholder="Username">
                                                <div class="invalid-feedback">
                                                 <?= $validation->getError('username'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group password-wrapper">
                                                <i class="visible fas fa-eye-slash"></i>
                                                <input type="password" class="form-control form-control-user <?= ($validation->hasError('password') ? 'is-invalid' : ''); ?>" name="password" placeholder="Password">
                                                <div class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-wild-watermelon btn-user btn-block">
                                                Sign In
                                            </button>
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