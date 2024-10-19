<?= $this->extend('app_gestion/template'); ?> <!-- Extender el template -->

<?= $this->section('content'); ?> <!-- Contenido dinámico -->

<div class="container">
    <h1><?= esc($documento['nombre']) ?></h1> <!-- Mostrar el nombre del documento -->

    <div class="mb-3">
        <label><strong>Autor:</strong></label>
        <p><?= esc($documento['autor']) ?></p> <!-- Mostrar el autor, asegúrate de que el autor se resuelva correctamente -->
    </div>

    <div class="mb-3">
        <label><strong>Fecha de Creación:</strong></label>
        <p><?= esc($documento['created_at']) ?></p> <!-- Mostrar fecha de creación -->
    </div>

    <div class="mb-3">
        <label><strong>Última Modificación:</strong></label>
        <p><?= esc($documento['updated_at']) ?></p> <!-- Mostrar fecha de última modificación -->
    </div>

    <div class="mb-3">
        <label><strong>Contenido:</strong></label>
        <p>
            <a href="<?= base_url('uploads/documentos/' . esc($documento['contenido'])) ?>" target="_blank">Descargar el archivo</a>
        </p> <!-- Enlace para descargar el archivo -->
    </div>

    <a href="<?= base_url('/app/documentacion') ?>" class="btn btn-secondary">Volver a la lista de documentos</a>
</div>

<?= $this->endSection(); ?>
