<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid content-frame mb-5 shadow">
    <div class="d-sm-flex align-items-center justify-content-be
    <!-- Page Heading -->tween mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Detail Petugas</h1>
    </div>
    <form action="" method="post" class="user" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <!-- image -->
    <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Image</label>
            <div class="col-3">
                <img src="/img/users/profile/<?= $officer['user_image']; ?>" class="img-thumbnail img-preview w-100" alt="">
            </div>
        </div>
        <!-- Nama Lengkap -->
        <div class="form-group row">
            <label for="full_name" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" id="full_name" name="full_name" value="<?= $officer['full_name']; ?>" readonly>
            </div>
        </div>
        
        <!-- username -->
        <div class="form-group row">
            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" id="nip" name="nip" value="<?= $officer['username']; ?>" readonly>
            </div>
        </div>
        <!-- kontak -->
        <div class="form-group row">
            <label for="kontak" class="col-sm-2 col-form-label">kontak</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" id="kontak" name="kontak" value="<?= $officer['contact']; ?>" readonly>
                
            </div>
        </div>
        <!-- Email -->
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control form-control-user" id="email" name="email" value="<?= $officer['email']; ?>" readonly>
                
            </div>
        </div>
        <!-- Email -->
        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" id="role" name="role" value="<?= $officer['role']; ?>" readonly>
                
            </div>
        </div>
        <!-- Tempat Lahir -->
        <div class="form-group row">
            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" value="<?= $officer['place_of_birth']; ?>" readonly>
            </div>
        </div>
        <!-- Tanggal Lahir -->
        <div class="form-group row">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" value="<?= $officer['date_of_birth']; ?>" readonly>
            </div>
        </div>  
        <!-- Jenis Kelamin-->
        <div class="form-group row">
            <label for="jenis-kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" id="jenis-kelamin" name="jenis-kelamin" value="<?=( $officer['sex'] == 'P')?'Perempuan':'Laki-Laki'; ?>" readonly>
            </div>
        </div>
       
        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="alamat" name="alamat" rows="4" readonly><?= $officer['address']; ?></textarea>
            </div>
        </div>
        <div class="text-right">
            <a href="/admin/officers/" class="btn btn-secondary btn-user btn-sm">Back</a>
        </div>
    </div>
    </form>
<?= $this->endSection(); ?>