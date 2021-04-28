<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
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
                <th scope="col">#</th>
                <th scope="col">Sampul</th>
                <th scope="col">Kode Buku</th>
                <th scope="col">Judul Bukku</th>
                <th scope="col">Peminjam</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th tscope="col">Telat</th>
                <th tscope="col">Status</th>
                <th tscope="col">Denda</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultTrans as $transIndex => $trans) : ?>
                <?php $total += $trans['fine']; ?>
                <tr>
                    <th scope="row"><?= ++$transIndex; ?></th>
                    <td><img src="img/books/<?= $trans['book_cover']; ?>" alt="" width="50px"></td>
                    <td><?= $trans['book_code']; ?></td>
                    <td><?= $trans['book_title']; ?></td>
                    <td><?= $trans['full_name']; ?></td>
                    <td><?= $trans['borrow_date']; ?></td>
                    <td><?= $trans['return_date']; ?></td>
                    <td><?= $trans['amount_late']; ?> Hari</td>
                    <td><?= $trans['status']; ?></td>
                    <td>Rp.<?= number_format($trans['fine'], 0, ',', '.'); ?>,-</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
            <tfoot>
                <tr>
                    <th scope="col" colspan="9">Total Denda</th>
                    <th scope="col">Rp.<?= number_format($total, 0, ',', '.'); ?>,-</th>
                </tr>
            </tfoot>
    </table>

    <script src="<?= base_url('js/sb-admin-2.min.js'); ?>"></script>
</body>

</html>