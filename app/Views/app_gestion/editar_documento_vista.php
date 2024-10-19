<?= $this->extend('app_gestion/template'); ?> 

<?= $this->section('content'); ?> 

<?php if (isset($validation)): ?>
    <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="<?= base_url('/app/documentacion/update/' . esc($documento['id'])) ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?= set_value('nombre', esc($documento['nombre'])) ?>" required>
    </div>

    <div class="form-group">
        <label for="contenido">Archivo (opcional, dejar vacío si no se desea cambiar)</label>
        <input type="file" name="contenido" class="form-control">
        <small class="form-text text-muted">
            El archivo actual es: 
            <a href="<?= base_url('uploads/documentos/' . esc($documento['contenido'])) ?>" target="_blank" rel="noopener noreferrer">
                <?= esc($documento['contenido']) ?>
            </a>
        </small>
    </div>


    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="<?= base_url('/app/documentacion') ?>" class="btn btn-secondary">Cancelar</a>
</form>

<?= $this->endSection(); ?>

