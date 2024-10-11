<?= $this->extend('app_gestion/template'); ?> <!-- Extender el template -->

<?= $this->section('content'); ?> <!-- Contenido dinámico --> 

<?= \Config\Services::validation()->listErrors(); ?>

<form action="<?= base_url('app/clientes/edit/' . $client['id']) ?>" method="post">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?= esc($client['nombre']); ?>" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?= esc($client['email']); ?>" required>
    </div>

    <!-- Puedes agregar más campos según lo necesites, como teléfono o dirección -->
    <div class="form-group">
        <label for="telefono ">Teléfono</label>
        <input type="text" name="telefono" class="form-control" value="<?= esc($client['telefono']); ?>">
    </div>

    <div class="form-group">
        <label for="fecha_alta">Dirección</label>
        <input type="date" name="fecha_alta" class="form-control" value="<?= esc($client['fecha_alta']); ?>">
    </div>

    <button type="submit" class="btn btn-primary">Guardar cambios</button>
</form>

<?= $this->endSection(); ?>
