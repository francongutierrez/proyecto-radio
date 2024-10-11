<?= $this->extend('app_gestion/template'); ?> <!-- Extender el template -->

<?= $this->section('content'); ?> <!-- Contenido dinámico -->

<div class="container">
    <div class="row mb-3">
        <div class="col">
            <a href="/app/clientes/new" class="btn btn-primary">Añadir Cliente</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <!-- Listado de clientes -->
            <?php if (!empty($clientes) && is_array($clientes)): ?>
                <ul class="list-group">
                    <?php foreach ($clientes as $cliente): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h5><?= esc($cliente['nombre']); ?></h5>
                                <p>Email: <?= esc($cliente['email']); ?></p>
                                <p>Teléfono: <?= esc($cliente['telefono']); ?></p>
                            </div>
                            <div>
                                <!-- Botón de editar -->
                                <a href="clientes/edit/<?= esc($cliente['id']); ?>" class="btn btn-warning">Editar</a>
                                
                                <!-- Botón de eliminar -->
                                <form action="<?= base_url('app/clientes/delete/' . esc($cliente['id'])); ?>" method="post" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este cliente?');">
                                    <?= csrf_field(); ?> <!-- Protección CSRF -->
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No hay clientes registrados.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Paginación -->
    <div class="row mt-4">
        <div class="col">
            <?= $pager->links() ?> <!-- Mostrar los links de paginación -->
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
