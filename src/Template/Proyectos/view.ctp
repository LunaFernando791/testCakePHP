<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proyecto $proyecto
 */
?>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2><?=$proyecto->nombre?></h2>
                        <div>
                            <?= $this->Html->link('Editar', ['action' => 'edit', $proyecto->id], ['class' => 'btn btn-primary']) ?>
                            <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $proyecto->id], ['confirm' => '¿Estás seguro?', 'class' => 'btn btn-danger'])?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Nombre</dt>
                        <dd class="col-sm-9"><?= h($proyecto->nombre) ?></dd>
                        <dt class="col-sm-3">Descripción</dt>   
                        <dd class="col-sm-9"><?= h($proyecto->descripcion)?></dd>
                        <dt class="col-sm-3">Fecha de Inicio</dt>
                        <dd class="col-sm-9"><?= h($proyecto->fecha_inicio->format('Y-m-d'))?></dd>
                        <dt class="col-sm-3">Fecha de Fin</dt>
                        <dd class="col-sm-9"><?= h($proyecto->fecha_fin->format('Y-m-d'))?></dd>
                    </dl>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <?= $this->Html->link('Agregar Tareas', ['controller' => 'Tareas', 'action' => 'add', $proyecto->id], ['class' => 'btn btn-primary'])?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
    <div class="col">
            <div class="card h-100">
                <div class="card-header">
                    <h2>Tablero de tareas</h2>
                </div>
                <?php if (!empty($proyecto->tareas)): ?>
                <div class="row text-center m-3">
                    <?php
                    $estados = ['pendiente' => 'primary', 'en progreso' => 'warning', 'completada' => 'success'];
                    foreach ($estados as $estado => $color):
                    ?>
                        <div class="col-md-4">
                            <h5 class="text-<?= $color ?> text-capitalize"><?= $estado ?></h5>
                            <div class="task-column rounded p-2 min-vh-50" id="<?= str_replace(' ', '-', $estado) ?>" data-estado="<?= $estado ?>">
                                <?php foreach ($proyecto->tareas as $tarea): ?>
                                    <?php if ($tarea->estado === $estado): ?>
                                        <div class="card mb-2 tarea border-<?=$color?>" data-id="<?= $tarea->id ?>">
                                            <div class="card-body p-2">
                                                <h6 class="card-title"><?= h($tarea->nombre) ?></h6>
                                                <p class="card-text"><small class="text-muted">Inicio: <?= h($tarea->fecha_inicio->format('Y-m-d'))?></small></p>
                                                <p class="card-text"><small class="text-muted">Fin: <?= h($tarea->fecha_fin->format('Y-m-d'))?></small></p>
                                                <p class="card-text"><small class="text-muted">Usuario: <?= h($tarea->usuario_asignado->nombre ?? 'Sin asignar')?></small></p>
                                                <a href="<?= $this->Url->build(['controller' => 'Tareas', 'action' => 'view', $tarea->id])?>" class="btn btn-primary">Ver</a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="card-body d-flex justify-content-center align-items-center">
                    <h4 class="text-muted">No hay tareas en este proyecto.</h4>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
    
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const columns = document.querySelectorAll('.task-column');

    columns.forEach(column => {
        Sortable.create(column, {
            group: 'tareas',
            animation: 150,
            onAdd: function (evt) {
                const tareaId = evt.item.dataset.id;
                const nuevoEstado = evt.to.dataset.estado;
                // Enviamos el cambio por AJAX
                fetch('<?= $this->Url->build(['controller' => 'Tareas', 'action' => 'updateEstado'])?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ tareaId: tareaId, nuevoEstado: nuevoEstado })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    });
});
</script>
