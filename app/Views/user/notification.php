<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>


<!-- Content Row -->
<div class="row">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="main-product-title">My Notifications</h1>
    </div>
        <!-- Notification -->
        <?php foreach($notification as $notif) : ?>
            <div class="col-12 content-frame mb-3 shadow">
            <a href="<?= $notif['link']; ?>" class="d-block">
                <span class='text-primary'><?= $notif['created_at']; ?></span>
                <div class="row justify-content-between align-items-center">
                    <div class="col-10">
                        <p class="text-wrap text-black-50"><?= $notif['message']; ?></p>
                    </div>
                    <div class="col-1">
                        <form action="/notification/<?= $notif['id']; ?>" method="POST" class="d-inline form-delete">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-action btn-sm small mb-1 btn-delete"><span class="fa fa-times text-danger"></span></button>
                        </form>
                    </div>
                </div>
                 </a>
            </div>
        <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>