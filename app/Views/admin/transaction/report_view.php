<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-3">
    <form action="" method="POST">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="start-date">Start date</label>
                <div class='input-group date' id='start-date'>
                    <input id="start-date" type='text' name="start_date" value="<?= (@$_POST['start_date']) ? $_POST['start_date'] : ''; ?>" class="form-control" />
                    <div class="input-group-append input-group-addon">
                        <span class="input-group-text fa fa-calendar-alt"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="end-date">End date</label>
                <div class='input-group date' id='end-date'>
                    <input id="end-date" type='text' name="end_date" value="<?= (@$_POST['end_date']) ? $_POST['end_date'] : ''; ?>" class="form-control" />
                    <div class="input-group-append input-group-addon">
                        <span class="input-group-text fa fa-calendar-alt"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <button type="submit" name="preview-data" class="btn btn-action"><span class="fas fa-eye mr-1"></span> Preview</button>
        </div>
    </div>
    </form>
</div>

<?php

use App\Models\TransactionModel;

$TransactionModel = new TransactionModel();
?>

<?php if (isset($_POST['preview-data'])) : ?>
    <?php
    $total = 0;
    $resultTrans = $TransactionModel->getTransactionBetweenDate($_POST['start_date'], $_POST['end_date']);
    ?>
    <div class="container-fluid content-frame">
        <div class="row">
            <div class="col">
                <a href="/admin/transaction/report/<?= date('Y-m-d', strtotime($_POST['start_date'])); ?>/<?= date('Y-m-d', strtotime($_POST['end_date'])); ?>" target="_blink" name="preview-data" class="btn btn-primary"><span class="fas fa-file-pdf mr-1"></span> Export to PDF</a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Book Code</th>
                            <th scope="col">Book Title</th>
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
                                <td><img src="/img/books/<?= $trans['book_cover']; ?>" alt="" width="50px"></td>
                                <td><?= $trans['book_code']; ?></td>
                                <td><?= $trans['book_title']; ?></td>
                                <td><?= $trans['full_name']; ?></td>
                                <td><?= $trans['borrow_date']; ?></td>
                                <td><?= $trans['return_date']; ?></td>
                                <td><?= $trans['amount_late']; ?> Hari</td>
                                
                                <?php if($trans['status'] == "Dipinjam"){
                                    $color = "primary";
                                } else if($trans['status'] == "Dikembalikan"){
                                    $color = "success";
                                }else{
                                    $color = "danger";
                                }
                                ?>
                                <td><span class="badge badge-<?= $color; ?>"><?= $trans['status']; ?></span></td>
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
            </div>
        </div>
    </div>
<?php endif; ?>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $('.date').datetimepicker({
        format: 'L',
        useCurrent: false,
    });

    $('#start-date').data("DateTimePicker").minDate('<?= $date_min ?>');
    $('#end-date').data("DateTimePicker").minDate('<?= $date_min ?>');
</script>
<?= $this->endSection(); ?>