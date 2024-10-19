<?= $this->extend('app_gestion/template'); ?> 

<?= $this->section('content'); ?>   

<?php if (isset($validation)): ?>
    <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="<?= base_url('/app/documentacion/create') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?= set_value('nombre') ?>" required>
    </div>
    
    <div class="form-group">
        <label for="contenido">Contenido</label>
        <input type="file" name="contenido" class="form-control" value="<?= set_value('contenido') ?>" required>
    </div>
    
    
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="<?= base_url('/app/documentacion') ?>" class="btn btn-secondary">Cancelar</a>
</form>

<?= $this->endSection(); ?>

