<?= $this->extend('app_gestion/template'); ?> 

<?= $this->section('content'); ?> 

<div class="container">

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('app/usuarios/update/' . esc($usuario['usuario_id'])); ?>" method="post">
        <?= csrf_field(); ?> 
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= esc($usuario['nombre']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= esc($usuario['email']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <small class="form-text text-muted">Dejar vacío si no deseas cambiar la contraseña.</small>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-select" id="rol" name="rol" required>
                <option value="1" <?= ($usuario['rol_id'] == 1) ? 'selected' : ''; ?>>Administrador</option>
                <option value="2" <?= ($usuario['rol_id'] == 2) ? 'selected' : ''; ?>>Editor</option>
                <option value="3" <?= ($usuario['rol_id'] == 3) ? 'selected' : ''; ?>>Usuario</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="<?= base_url('app/usuarios'); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?= $this->endSection(); ?>

