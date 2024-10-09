<?= $this->extend('app_gestion/template'); ?> <!-- Extender el template -->

<?= $this->section('content'); ?> <!-- Contenido dinámico -->   

<!-- Mostrar errores de validación si existen -->
<?php if (isset($validation)): ?>
    <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="<?= base_url('/app/clientes/crear') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?= set_value('nombre') ?>" required>
    </div>
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>" required>
    </div>
    
    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" class="form-control" value="<?= set_value('telefono') ?>" required>
    </div>
    
    <div class="form-group">
        <label for="fecha_alta">Fecha de alta</label>
        <input type="date" name="fecha_alta" class="form-control" value="<?= set_value('fecha_alta') ?>" required>
    </div>

    <div class="form-group">
        <label for="contenido">Banner</label>
        <input type="file" name="contenido" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="duracion">Duración del anuncio</label>
        <input type="number" name="duracion" class="form-control" value="<?= set_value('duracion') ?>" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="<?= base_url('/app/clientes') ?>" class="btn btn-secondary">Cancelar</a>
</form>

<?= $this->endSection(); ?>