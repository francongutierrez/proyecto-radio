<?= $this->extend('app_gestion/template'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <?php foreach ($emisoras as $emisora): ?>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h5><?= esc($emisora['nombre']); ?></h5>
                <p><?= esc($emisora['frecuencia']); ?></p>
                <h3><?= esc($emisora['clicks']); ?> clicks</h3>
            </div>
            <div class="icon">
                <i class="fas fa-microphone-alt"></i>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="row mt-4">
    <div class="col-12">
        <h4>Clientes más clickeados</h4>
    </div>
    <?php foreach ($topClients as $client): ?>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h5><?= esc($client['nombre']); ?></h5>
                <p>Cliente</p>
                <h3><?= esc($client['clicks']); ?> clicks</h3>
            </div>
            <div class="icon">
                <i class="fas fa-user-tie"></i>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="row mt-4">
    <div class="col-12">
        <h4>Clientes menos clickeados</h4>
    </div>
    <?php foreach ($bottomClients as $client): ?>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h5><?= esc($client['nombre']); ?></h5>
                <p>Cliente</p>
                <h3><?= esc($client['clicks']); ?> clicks</h3>
            </div>
            <div class="icon">
                <i class="fas fa-user-tie"></i>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>

