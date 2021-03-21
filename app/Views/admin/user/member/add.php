<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Tambah Anggota</h1>
    </div>

    <form action="/admin/users/roles/save" method="post" class="user">
    <?= csrf_field(); ?>
        <!-- Nama Lengkap -->
        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" id="full_name" name="full_name">
                <div class="invalid-feedback">
                    
                </div>
            </div>
        </div>
        <!-- username -->
        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">NIS</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" id="nis" name="nis">
                <div class="invalid-feedback">
                    
                </div>
            </div>
        </div>
        <!-- Password -->
        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control form-control-user" id="password" name="password">
                <div class="invalid-feedback">
                    
                </div>
            </div>
        </div>
        <!-- Email -->
        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" id="email" name="email">
                <div class="invalid-feedback">
                    
                </div>
            </div>
        </div>
        <!-- Tempat Lahir -->
        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir">
                <div class="invalid-feedback">
                    
                </div>
            </div>
        </div>
        <!-- Tanggal Lahir -->
        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir">
                <div class="invalid-feedback">
                    
                </div>
            </div>
        </div>  
        <!-- Jenis Kelamin -->
        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <select class="custom-select">
                    <option selected>Jenis Kelamin</option>
                    <option value="1">Laki-Laki</option>
                    <option value="2">Perempuan</option>
                </select>
                <div class="invalid-feedback">
                    
                </div>
            </div>
        </div>
        <!-- kelas -->
        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
                <select class="custom-select">
                    <option selected>Pilih Kelas</option>
                    <option value="1">7</option>
                    <option value="2">8</option>
                    <option value="3">9</option>
                </select>
                <div class="invalid-feedback">
                    
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Rombel</label>
            <div class="col-sm-10">
                <select class="custom-select">
                    <option selected>Pilih Rombel</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">C</option>
                </select>
                <div class="invalid-feedback">
                    
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="alamat" name="alamat" rows="4"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox small">
                <input type="checkbox" class="custom-control-input" id="active" name="active" checked >
                <label class="custom-control-label" for="active">Active?</label>
            </div>
        </div>
        <button type="submit" class="btn btn-wild-watermelon btn-user btn-sm">Save</button>
        <a href="/admin/users/roles" class="btn btn-secondary btn-user btn-sm">Cancel</a>
    </form>
</div>
<?= $this->endSection(); ?>