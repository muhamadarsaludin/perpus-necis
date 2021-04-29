<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Detail Kelas <?= $class['class']; ?> <?= $rombel['rombel']; ?></h1>
        <div>
        <a href="/admin/kelas/report/<?= $class['id']; ?>/<?= $rombel['id']; ?>" target="_blink" class="d-block d-sm-inline-block btn rounded-pill btn-outline-wild-watermelon"><i class="fas fa-file-alt mr-1"></i>Laporan Anggota</a>
        </div>
    </div>
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <div class="table-responsive">
    <table class="table table-bordered" id="dataUsers" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($detail as $d) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $d['full_name']; ?></td>
                        <td><?= $d['nis']; ?></td>
                        <td><?= $d['class']; ?> <?= $d['rombel']; ?></td>
                        <td><?= ($d['sex']=='L')?"Laki-Laki":'Perempuan'; ?></td>
                        <td><?= $d['borrowing_amount']; ?> Buku</td>
                        <td class="text-center">
                            <a href="/admin/members/detail/<?= $d['user_id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></a>
                            <a href="/admin/members/edit/<?= $d['user_id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></a>
                            <form action="/member/<?= $d['user_id']; ?>" method="POST" class="d-inline form-delete">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-action btn-sm small mb-1 btn-delete"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataUsers').DataTable();
    });
</script>
<?= $this->endSection(); ?>