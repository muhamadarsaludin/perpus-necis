<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Buku</title>
    <link rel="stylesheet" href="<?= base_url('css/sb-admin-2.min.css'); ?>">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        thead tr,
        tfoot tr {
            background-color: #f2f2f2;
        }

        thead th,
        tfoot th {
            padding: 10px 5px;
        }

        th,
        td {
            padding: 5px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php $total = 0; ?>
    <table border="1px">
        <thead>
            <tr>
                <th>No</th>
                <th>Sampul</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Tipe</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $bookIndex => $book) : ?>
                <?php $total += $bookIndex; ?>
                <tr>
                    <th scope="row"><?= ++$bookIndex; ?></th>
                    <td><img src="img/books/<?= $book['book_cover']; ?>" alt="" width="50px"></td>
                    <td><?= $book['book_title']; ?></td>
                    <td><?= $book['category']; ?></td>
                    <td><?= ($book['buku_paket'] ==1)?'Buku Paket':'Buku Regular'; ?></td>
                    <td><?= $book['author']; ?></td>
                    <td><?= $book['publisher']; ?></td>
                    <td><?= $book['publication_year']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
            <tfoot>
                <tr>
                    <th scope="col" colspan="7">Jumlah Buku</th>
                    <th scope="col"><?= $total; ?> Ebook</th>
                </tr>
            </tfoot>
    </table>

    <script src="<?= base_url('js/sb-admin-2.min.js'); ?>"></script>
</body>

</html>