<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Petugas</title>
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
                    <th>Nama Lengkap</th>
                    <th>NIP</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Role</th>
                    <th>Jumlah Pinjaman</th>
                </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $userIndex => $user) : ?>
                <?php $total++ ?>
                <tr>
                        <th><?= ++$userIndex; ?></th>
                        <td><?= $user['full_name']; ?></td>
                        <td><?= $user['nip']; ?></td>
                        <td><?= ($user['sex'] == 'L')?'Laki-Laki':'Perempuan'; ?></td>
                        <td><?= $user['place_of_birth']; ?></td>
                        <td><?= $user['date_of_birth']; ?></td>
                        <td><?= $user['role']; ?></td>
                        <td><?= $user['borrowing_amount']; ?> Buku</td>
                    </tr>
            <?php endforeach; ?>
        </tbody>
            <tfoot>
                <tr>
                    <th scope="col" colspan="7">Jumlah Petugas</th>
                    <th scope="col"><?= $total; ?> Orang</th>
                </tr>
            </tfoot>
    </table>

    <script src="<?= base_url('js/sb-admin-2.min.js'); ?>"></script>
</body>

</html>