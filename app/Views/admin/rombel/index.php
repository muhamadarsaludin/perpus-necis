<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Data Rombel</h1>
        <a href="#" data-toggle="modal" data-target="#rombelModal" class="d-block d-sm-inline-block btn rounded-pill btn-wild-watermelon addRombelButton"><i class="fas fa-plus-square mr-1"></i>Tambah Rombel</a>
    </div>
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('danger')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('danger'); ?>
        </div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table table-bordered td-align-middle" id="dataVendors" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Rombel</th>
                    <th>Jumlah Kelas</th>
                    <th>Jumlah Member</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Rombel</th>
                    <th>Jumlah Kelas</th>
                    <th>Jumlah Member</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
            <?php $i=1; ?>
            <?php foreach($rombel as $r): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $r['rombel']; ?></td>
                    <td><?= $r['class_amount']; ?> Kelas</td>
                    <td><?= $r['member_amount']; ?> Orang</td>
                    <td class="text-center">
                        <a href="/admin/rombel/detail/<?= $r['id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></a>
                        <a href="#" data-toggle="modal" data-id="<?= $r['id']; ?>" data-target="#rombelModal" class="btn btn-action btn-sm small mb-1 editRombelButton"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></a>
                        <form action="/rombel/<?= $r['id']; ?>" method="POST" class="d-inline form-delete">
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



<!-- Modal -->
<div class="modal fade" id="rombelModal" tabindex="-1" role="dialog" aria-labelledby="rombelModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="rombelModalLabel">Tambah Kelas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="/admin/rombel/save" method="POST" class="formRombel">
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<!-- modal content -->
					<div class="form-group">
						<input type="text" class="form-control" id="rombel" name="rombel" placeholder="Nama Rombel" value="">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-wild-watermelon">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataVendors').DataTable();
    });

      // ROMBEL
$(".addRombelButton").on("click", function () {
  $("#rombelModalLabel").html("Tambah Rombel");
  $(".modal-footer button[type=submit]").html("Save");
  $("#rombel").val("");
});
// button edit Categori
$(".editRombelButton").on("click", function () {
  $("#rombelModalLabel").html("Edit Rombel");
  $(".modal-footer button[type=submit]").html("Update");
  $(".formRombel").attr("action", "/admin/rombel/update");
  const id = $(this).data("id");

  $.ajax({
    url: "/admin/rombel/geteditrombel",
    data: {
      id: id,
    },
    type: "post",
    dataType: "json",
    success: function (data) {
    //   console.log(data);
      $("#rombel").val(data.rombel);
      $("#id").val(data.id);
    },
  });
});
</script>
<?= $this->endSection(); ?>