<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5">
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">User Profile</h1>
    </div>
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">
        <form class="user" enctype="multipart/form-data">
            <div class="row mb-5 align-items-center">
                <div class="col-2">
                    <img src="/img/users/profile/<?= $user['user_image']; ?>" alt="" class="img-profile" width="100px">
                </div>
                <div class="col">
                    <h4 class="font-weight-bold mb-1"><?= $user['full_name']; ?></h4>
                    <p><?= $user['email']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    
                        <div class="form-group">
                            <label for="fullname" class="pl-3">Fullname</label>
                            <input type="text" class="form-control rounded-pill" name="fullname" id="fullname" value="<?= $user['full_name']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="username" class="pl-3">Username</label>
                            <input type="text" class="form-control rounded-pill" name="username" id="username" value="<?= $user['username']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email" class="pl-3">Email</label>
                            <input type="email" class="form-control rounded-pill <?= ($user['active'] == 1) ? 'is-valid' : 'is-invalid'; ?>" name="email" id="email" aria-describedby="emailHelp" value="<?= $user['email']; ?>" readonly>
                            <div class="valid-feedback">
                                Email Verified!
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact" class="pl-3">Contact</label>
                            <input type="text" class="form-control rounded-pill" name="contact" id="contact" value="<?= $user['contact']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="address" class="pl-3">Address</label>
                            <textarea class="form-control" id="address" rows="5" style="border-radius: 20px;" readonly><?= $user['address']; ?></textarea>
                        </div>
                        <div class="text-right">
                            <a href="/user" class="btn btn-secondary btn-user btn-sm">Back</a>
                            <a href="/user/profile/edit/<?= $user['id']; ?>" class="btn btn-wild-watermelon btn-user btn-sm">Edit Profile</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>