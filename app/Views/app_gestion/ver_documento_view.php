<?= $this->extend('app_gestion/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h1><?= esc($documento['nombre']) ?></h1>

    <div class="mb-3">
        <label><strong>Autor:</strong></label>
        <p><?= esc($documento['autor_nombre']) ?></p> <!-- Asegúrate de usar el nombre correcto -->
    </div>

    <div class="mb-3">
        <label><strong>Fecha de Creación:</strong></label>
        <p><?= esc($documento['created_at']) ?></p>
    </div>

    <div class="mb-3">
        <label><strong>Última Modificación:</strong></label>
        <p><?= esc($documento['updated_at']) ?></p>
    </div>

    <div class="mb-3">
        <label><strong>Contenido:</strong></label>
        <p>
            <a href="<?= base_url('uploads/documentos/' . esc($documento['contenido'])) ?>" target="_blank">Abrir el archivo</a>
        </p>
    </div>

    <a href="<?= base_url('/app/documentacion') ?>" class="btn btn-secondary">Volver a la lista de documentos</a>
</div>

<?= $this->endSection(); ?>
