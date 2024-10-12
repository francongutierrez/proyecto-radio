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

    <!-- Botón Previsualizar, inicialmente deshabilitado -->
    <button type="button" id="previewButton" class="btn btn-info" onclick="previewImage()">Previsualizar</button>

    <!-- Modal para previsualizar la imagen -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">Previsualización de la Imagen</h5>
                </div>
                <div class="modal-body">
                    <!-- Imagen que se previsualiza -->
                    <img id="modalImage" src="" alt="Previsualización" style="max-width: 100%;"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="duracion">Duración del anuncio</label>
        <input type="number" name="duracion" class="form-control" value="<?= set_value('duracion') ?>" required>
    </div>
    
    <!-- Campo para seleccionar emisoras -->
    <div class="form-group">
        <label for="emisoras">Emisoras</label>
        <div class="form-check">
            <?php foreach ($emisoras as $emisora): ?>
                <div>
                    <input class="form-check-input" type="checkbox" name="emisoras[]" value="<?= $emisora['id'] ?>" id="emisora_<?= $emisora['id'] ?>">
                    <label class="form-check-label" for="emisora_<?= $emisora['id'] ?>">
                        <?= $emisora['nombre'] ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="<?= base_url('/app/clientes') ?>" class="btn btn-secondary">Cancelar</a>
</form>

<?= $this->endSection(); ?>
