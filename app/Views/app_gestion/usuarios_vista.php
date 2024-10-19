<?= $this->extend('app_gestion/template'); ?> 

<?= $this->section('content'); ?> 

<div class="container">
    <div class="row mb-3">
        <div class="col">
            <a href="/app/usuarios/new" class="btn btn-primary">Añadir Usuario</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?php if (!empty($usuarios) && is_array($usuarios)): ?>
                <ul class="list-group">
                    <?php foreach ($usuarios as $usuario): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h5><?= esc($usuario['nombre']); ?></h5>
                                <p>Email: <?= esc($usuario['email']); ?></p>
                            </div>
                            <div>
                                <a href="usuarios/edit/<?= esc($usuario['usuario_id']); ?>" class="btn btn-warning">Editar</a>
                                <form action="<?= base_url('app/usuarios/delete/' . esc($usuario['usuario_id'])); ?>" method="post" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                    <?= csrf_field(); ?> 
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No hay usuarios registrados.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <?= $pager->links() ?> 
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

