<?= $this->extend('app_gestion/template'); ?> 

<?= $this->section('content'); ?> 

<div class="container">
    
    <form action="<?= base_url('app/usuarios/create'); ?>" method="post">
        <?= csrf_field(); ?> 

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-select" id="rol" name="rol" required>
                <option value="" disabled selected>Selecciona un rol</option>
                <option value="1">Administrador</option>
                <option value="2">Editor</option>
                <option value="3">Usuario</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Añadir Usuario</button>
        <a href="<?= base_url('app/usuarios'); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?= $this->endSection(); ?>

