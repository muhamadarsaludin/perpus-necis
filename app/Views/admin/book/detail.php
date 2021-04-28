<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>

<div class="row mb-3">
    <div class="col-md-3">
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
        <a href="/admin/book" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('message'); ?>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('failed')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('failed'); ?>
    </div>
<?php endif; ?>
    <div class="d-flex">
        <a href="/admin/book/item/add/<?= $bookData['id']; ?>" class="d-block d-sm-inline-block btn rounded-pill btn-wild-watermelon ml-auto my-3"><i class="fas fa-plus-square mr-1"></i>Tambah Buku</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered td-align-middle" id="dataVendors" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Sumber</th>
                    <th>kualitas</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Sumber</th>
                    <th>kualitas</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
            <?php $i=1; ?>
            <?php foreach($books as $book): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $book['book_code']; ?></td>
                    <td><?= $book['source_book']; ?></td>
                    <td><?= $book['quality']; ?></td>
                    
                    <?php
                    if($book['borrowing']){
                        $status ='<span class="badge badge-primary">Dipinjam</span>';
                    }else{
                        if($book['can_borrow'] == 1){
                            $status ='<span class="badge badge-success">Tersedia</span>';
                        } else{
                            $status ='<span class="badge badge-danger">Tidak Dipinjamkan</span>';
                        }
                    }
                    ?>
                    <td><?= $status; ?></td>
                    <td class="text-center">
                        <a href="/admin/book/item/edit/<?= $book['id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></a>
                        <form action="/book/item/<?= $book['id']; ?>" method="POST" class="d-inline form-delete">
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