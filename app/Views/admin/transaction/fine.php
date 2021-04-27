<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Denda Keterlambatan</h1>
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
                    <th>Besar Denda</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Besar Denda</>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td><?= $fine['fine']; ?></td>
                    <td class="text-center">
                        <a href="#" class="btn btn-action btn-sm small mb-1" data-toggle="modal" data-target="#editFineModal"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></a>
                    </td>
                </tr>  
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editFineModal" tabindex="-1" role="dialog" aria-labelledby="newFineModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newRoleModalLabel">Edit Denda</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="/admin/fine/update" method="POST" class="formRole">
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="<?= $fine['id']; ?>">
					<!-- modal content -->
					<div class="form-group">
						<input type="number" class="form-control" id="fine" name="fine" placeholder="Besar Denda" value="<?= $fine['fine']; ?>">
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
</script>
<?= $this->endSection(); ?>