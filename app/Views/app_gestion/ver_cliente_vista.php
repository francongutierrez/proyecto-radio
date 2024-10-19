<?= $this->extend('app_gestion/template'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <h3 class="card-title">Información del Cliente</h3><br><br>
        <p><strong>Nombre:</strong> <?= esc($client['nombre']); ?></p>
        <p><strong>Email:</strong> <?= esc($client['email']); ?></p>
        <p><strong>Teléfono:</strong> <?= esc($client['telefono']); ?></p>
        <p><strong>Fecha de Alta:</strong> <?= esc(date('d-m-Y', strtotime($client['fecha_alta']))); ?></p>
        <p><strong>Duración:</strong> <?= esc($client['duracion']); ?> segundos</p>
        <p>
            <strong>Banner:</strong> 
            <a href="<?= base_url('img/uploads/' . esc($client['contenido'])); ?>" target="_blank">
                Ver Banner
            </a>
        </p>
        <p><strong>URL:</strong> <a href="<?= esc($client['url']); ?>" target="_blank"><?= esc($client['url']); ?></a></p>
        <h5 class="mt-4">Emisoras Asociadas</h5>
        <ul>
            <?php if (!empty($clientEmisoras)): ?>
                <?php foreach ($clientEmisoras as $emisoraId): ?>
                    <?php
                    $emisorasModel = new \App\Models\EmisorasModel();
                    $emisora = $emisorasModel->find($emisoraId);
                    ?>
                    <li><?= esc($emisora['nombre']); ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No hay emisoras asociadas a este cliente.</li>
            <?php endif; ?>
        </ul>
        
        <a href="<?= base_url('/app/clientes') ?>" class="btn btn-secondary">Volver</a>
    </div>
</div>

<?= $this->endSection(); ?>

