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
        <a href="/user/ebook" class="btn btn-secondary">Back</a>
    </div>
</div>
<iframe src="/ebook/<?= $bookData['file_name']; ?>" height="500" class="w-100 preview-pdf mt-5" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html" frameborder="0"></iframe>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataVendors').DataTable();
    });
</script>
<?= $this->endSection(); ?>