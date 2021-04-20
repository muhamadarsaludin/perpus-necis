<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-2">
        <img src="/img/books/<?= $bookData['book_cover']; ?>" alt="" height="200px">
    </div>
    <div class="col-md-6">
        <h3 class="font-weight-bold mb-3"><?= $bookData['book_title']; ?></h3>
        <table class="table bg-transparent">
            <tbody>
                <tr>
                    <th scope="row">Author</th>
                    <td><?= ': ' . $bookData['author']; ?></td>

                </tr>
                <tr>
                    <th scope="row">Publisher</th>
                    <td><?= ': ' . $bookData['publisher']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Year</th>
                    <td><?= ': ' . $bookData['publication_year']; ?></td>
                </tr>

            </tbody>
        </table>
        <a href="/book" class="btn btn-secondary">Back</a>
    </div>
</div>
    <div class="d-flex">
        <a href="/admin/book/add" class="d-block d-sm-inline-block btn rounded-pill btn-wild-watermelon ml-auto my-3"><i class="fas fa-plus-square mr-1"></i>Tambah Buku</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered td-align-middle" id="dataVendors" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>kualitas</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>kualitas</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
            <?php $i=1; ?>
            <?php foreach($books as $book): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $book['book_code']; ?></td>
                    <td><?= $book['quality']; ?></td>
                    <td class="text-center">
                        <a href="/admin/book/detail/<?= $book['id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></a>
                        <a href="/admin/book/edit/<?= $book['id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></a>
                        <form action="/admin/book/" method="POST" class="d-inline form-delete">
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

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataVendors').DataTable();
    });
</script>
<?= $this->endSection(); ?>