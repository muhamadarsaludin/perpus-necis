<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <div class="d-sm-flex align-items-center justify-content-be
    <!-- Page Heading -->tween mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Edit Profile</h1>
    </div>
    <form action="/user/profile/update" method="post" class="user" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
    <input type="hidden" name="old_image" value="<?= $user['user_image']; ?>">
    <input type="hidden" name="old_password" value="<?= $user['password']; ?>">
    <!-- image -->
    <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Image</label>
            <div class="col-3">
                <img src="/img/users/profile/<?= $user['user_image']; ?>" class="img-thumbnail img-preview w-100" alt="">
                <div class="custom-file mt-2">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('image') ? 'is-invalid' : ''); ?>" id="image" name="image" onchange="previewImg()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('image'); ?>
                    </div>
                    <label class="custom-file-label image-label" for="image">Upload File</label>
                </div>
            </div>
        </div>
        <!-- Nama Lengkap -->
        <div class="form-group row">
            <label for="full_name" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('full_name') ? 'is-invalid' : ''); ?>" id="full_name" name="full_name" value="<?= (old('full_name'))? old('full_name'):$user['full_name']; ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('full_name'); ?>
                </div>
            </div>
        </div>
        <!-- Password -->
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Reset Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control form-control-user" id="password" name="password">
                <div class="invalid-feedback">
                    
                </div>
            </div>
        </div>
        <!-- kontak -->
        <div class="form-group row">
            <label for="kontak" class="col-sm-2 col-form-label">kontak</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('kontak') ? 'is-invalid' : ''); ?>" id="kontak" name="kontak" value="<?= (old('kontak'))? old('kontak'):$user['contact']; ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('kontak'); ?>
                </div>
            </div>
        </div>
        <!-- Email -->
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control form-control-user <?= ($validation->hasError('email') ? 'is-invalid' : ''); ?>" id="email" name="email" value="<?= (old('email'))? old('email'):$user['email']; ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('email'); ?>
                </div>
            </div>
        </div>
        <!-- Tempat Lahir -->
        <div class="form-group row">
            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('tempat_lahir') ? 'is-invalid' : ''); ?>" id="tempat_lahir" name="tempat_lahir" value="<?= (old('tempat_lahir'))? old('tempat_lahir'):$user['place_of_birth']; ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('tempat_lahir'); ?>
                </div>
            </div>
        </div>
        <!-- Tanggal Lahir -->
        <div class="form-group row">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control form-control-user <?= ($validation->hasError('tanggal_lahir') ? 'is-invalid' : ''); ?>" id="tanggal_lahir" name="tanggal_lahir" value="<?= (old('tanggal_lahir'))? old('tanggal_lahir'):$user['date_of_birth']; ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('tanggal_lahir'); ?>
                </div>
            </div>
        </div>  
        <!-- Jenis Kelamin -->
        <div class="form-group row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <select class="custom-select <?= ($validation->hasError('jenis_kelamin') ? 'is-invalid' : ''); ?>" name="jenis_kelamin">
                    <?php if($user['sex'] == 'L') :?>
                    <option value="L" selected>Laki-Laki</option>
                    <option value="P">Perempuan</option>
                    <?php else :?>
                    <option value="P" selected>Perempuan</option>
                    <option value="L">Laki-Laki</option>
                    <?php endif ?>
                </select>
                <div class="invalid-feedback">
                <?= $validation->getError('jenis_kelamin'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea class="form-control <?= ($validation->hasError('alamat') ? 'is-invalid' : ''); ?>" id="alamat" name="alamat" rows="4"><?= $user['address']; ?></textarea>
                <div class="invalid-feedback">
                <?= $validation->getError('alamat'); ?>
                </div>
            </div>
        </div>
        <div class="text-right">
            <a href="/user/profile/<?= $user['id']; ?>" class="btn btn-secondary btn-user btn-sm">Cancel</a>
            <button type="submit" class="btn btn-wild-watermelon btn-user btn-sm">Save</button>
        </div>
        
    </form>
</div>
<?= $this->endSection(); ?>