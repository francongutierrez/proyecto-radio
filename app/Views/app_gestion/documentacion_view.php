<?= $this->extend('app_gestion/template'); ?> <!-- Extender el template -->

<?= $this->section('content'); ?> <!-- Contenido dinámico -->

<div class="container">
    <div class="row mb-3">
        <div class="col">
            <a href="/app/documentacion/new" class="btn btn-primary">Añadir Documento</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <!-- Listado de documentos -->
            <?php if (!empty($documentos) && is_array($documentos)): ?>
                <ul class="list-group">
                    <?php foreach ($documentos as $documento): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h5><?= esc($documento['nombre']); ?></h5>
                                <p>Autor: <?= esc($documento['autor']); ?></p>
                                <p>Fecha de creación: <?= esc($documento['created_at']); ?></p>
                            </div>
                            <div>
                                <!-- Botón de ver o descargar el documento -->
                                <a href="<?= base_url('app/documentacion/show/' . esc($documento['id'])); ?>" class="btn btn-success">Ver Documento</a>


                                <!-- Botón de editar -->
                                <a href="documentacion/edit/<?= esc($documento['id']); ?>" class="btn btn-warning">Editar</a>

                                <!-- Botón de eliminar -->
                                <form action="<?= base_url('app/documentacion/delete/' . esc($documento['id'])); ?>" method="post" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este documento?');">
                                    <?= csrf_field(); ?> <!-- Protección CSRF -->
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No hay documentos registrados.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Paginación -->
    <div class="row mt-4">
        <div class="col">
            <?= $pager->links() ?> <!-- Mostrar los links de paginación si tienes paginación habilitada -->
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
