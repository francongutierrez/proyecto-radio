<?= $this->extend('app_gestion/template'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <?php foreach ($emisoras as $emisora): ?>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h5><?= esc($emisora['nombre']); ?></h5>
                <p><?= esc($emisora['frecuencia']); ?></p>
                <h3><?= esc($emisora['clicks']); ?></h3>
            </div>
            <div class="icon">
                <i class="fas fa-microphone-alt"></i>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>
