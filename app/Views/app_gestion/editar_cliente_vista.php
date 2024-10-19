<?= $this->extend('app_gestion/template'); ?>

<?= $this->section('content'); ?>

<?= \Config\Services::validation()->listErrors(); ?>

<form action="<?= base_url('app/clientes/update/' . $client['id']) ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?= esc($client['nombre']); ?>" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?= esc($client['email']); ?>" required>
    </div>

    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" class="form-control" value="<?= esc($client['telefono']); ?>">
    </div>

    <div class="form-group">
        <label for="fecha_alta">Fecha de Alta</label>
        <?php
        $fechaAlta = date('Y-m-d', strtotime($client['fecha_alta']));
        ?>
        <input type="date" name="fecha_alta" class="form-control" value="<?= esc($fechaAlta); ?>">
    </div>

    <div class="form-group">
        <label for="contenido">Banner (Imagen)</label>
        <input type="file" name="contenido" class="form-control" accept="image/jpg,image/jpeg,image/png">
        <small>
            Imagen actual: 
            <a href="<?= base_url('img/uploads/' . esc($client['contenido'])); ?>" target="_blank">
                <?= esc($client['contenido']); ?>
            </a>
        </small>
    </div>

    <div class="form-group">
        <label for="banner_url">URL del Banner</label>
    <input type="url" name="url" class="form-control" value="<?= esc($client['url']); ?>" placeholder="https://ejemplo.com/banner" required>
    </div>

    <div class="form-group">
        <label for="duracion">Duración (en segundos)</label>
        <input type="number" name="duracion" class="form-control" value="<?= esc($client['duracion']); ?>" required>
    </div>

    <div class="form-group">
        <label for="emisoras">Emisoras</label>
        <div class="form-check">
            <?php foreach ($emisoras as $emisora): ?>
                <div>
                    <input class="form-check-input" type="checkbox" name="emisoras[]" value="<?= $emisora['id'] ?>" id="emisora_<?= $emisora['id'] ?>"
                        <?= in_array($emisora['id'], $clientEmisoras) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="emisora_<?= $emisora['id'] ?>">
                        <?= esc($emisora['nombre']) ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="mb-1">
        <button type="submit" class="btn btn-primary mb-2">Guardar cambios</button>
        <a href="<?= base_url('/app/clientes') ?>" class="btn btn-secondary mb-2">Cancelar</a>
    </div>
</form>

<?= $this->endSection(); ?>

