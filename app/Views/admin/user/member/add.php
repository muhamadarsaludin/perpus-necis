<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Tambah Anggota</h1>
    </div>

    <form action="/admin/members/save" method="post" class="user" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="role_id" value="<?= $role['id']; ?>">
    <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Image</label>
            <div class="col-3">
                <img src="/img/users/profile/default.svg" class="img-thumbnail img-preview w-100" alt="">
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
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('full_name') ? 'is-invalid' : ''); ?>" id="full_name" name="full_name" value="<?= old('full_name'); ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('full_name'); ?>
                </div>
            </div>
        </div>
        
        <!-- username -->
        <div class="form-group row">
            <label for="nis" class="col-sm-2 col-form-label">NIS</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('nis') ? 'is-invalid' : ''); ?>" id="nis" name="nis" value="<?= old('nis'); ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('nis'); ?>
                </div>
            </div>
        </div>
        <!-- Password -->
        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control form-control-user" id="password" name="password" value="<?= old('password'); ?>">
                <div class="invalid-feedback">
                    
                </div>
            </div>
        </div>
         <!-- kontak -->
         <div class="form-group row">
            <label for="kontak" class="col-sm-2 col-form-label">kontak</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('kontak') ? 'is-invalid' : ''); ?>" id="kontak" name="kontak" value="<?= old('kontak'); ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('kontak'); ?>
                </div>
            </div>
        </div>
        <!-- Email -->
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control form-control-user <?= ($validation->hasError('email') ? 'is-invalid' : ''); ?>" id="email" name="email" value="<?= old('email'); ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('email'); ?>
                </div>
            </div>
        </div>
          <!-- Tempat Lahir -->
          <div class="form-group row">
            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('tempat_lahir') ? 'is-invalid' : ''); ?>" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir'); ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('tempat_lahir'); ?>
                </div>
            </div>
        </div>
        <!-- Tanggal Lahir -->
        <div class="form-group row">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control form-control-user <?= ($validation->hasError('tanggal_lahir') ? 'is-invalid' : ''); ?>" id="tanggal_lahir" name="tanggal_lahir" value="<?= old('tanggal_lahir'); ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('tanggal_lahir'); ?>
                </div>
            </div>
        </div>  
        <!-- Jenis Kelamin -->
        <div class="form-group row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">jenis_kelamin</label>
            <div class="col-sm-10">
                <select class="custom-select <?= ($validation->hasError('jenis_kelamin') ? 'is-invalid' : ''); ?>" name="jenis_kelamin">
                    <option unselected>Pilih Jenis Kelamin</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <div class="invalid-feedback">
                <?= $validation->getError('jenis_kelamin'); ?>
                </div>
            </div>
        </div>
        <!-- kelas -->
        <div class="form-group row">
            <label for="class" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
                <select class="custom-select <?= ($validation->hasError('class') ? 'is-invalid' : ''); ?>" name="class">
                    <option>Pilih Kelas</option>
                    <?php foreach($class as $c) : ?>
                    <option value="<?= $c['id']; ?>"><?= $c['class']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                <?= $validation->getError('class'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="rombel" class="col-sm-2 col-form-label">Rombel</label>
            <div class="col-sm-10">
                <select class="custom-select <?= ($validation->hasError('rombel') ? 'is-invalid' : ''); ?>" name="rombel">
                    <option>Pilih Rombel</option>
                    <?php foreach($rombel as $r) : ?>
                    <option value="<?= $r['id']; ?>"><?= $r['rombel']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                <?= $validation->getError('rombel'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea class="form-control <?= ($validation->hasError('alamat') ? 'is-invalid' : ''); ?>" id="alamat" name="alamat" rows="4"></textarea>
                <div class="invalid-feedback">
                <?= $validation->getError('alamat'); ?>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-wild-watermelon btn-user btn-sm">Save</button>
            <a href="/admin/members" class="btn btn-secondary btn-user btn-sm">Cancel</a>
        </div>
       
    </form>
</div>
<?= $this->endSection(); ?>