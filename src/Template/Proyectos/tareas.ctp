<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proyecto $proyecto
 * @var \App\Model\Entity\Tarea[]|\Cake\Collection\CollectionInterface $tareas
 */
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2><?= __('Tareas')?></h2>
                    <div class="card-tools">
                        <a href="<?= $this->Url->build(['action' => 'add'])?>" class="btn btn-primary"><?= __('New Tarea')?></a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($tareas->isEmpty()): ?>
                        <div class="alert alert-info" role="alert">
                            <?= __('No hay tareas disponibles en este momento.') ?>
                        </div>
                    <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('id')?></th>
                                    <th><?= $this->Paginator->sort('tareas')?></th>
                                    <th><?= $this->Paginator->sort('fecha_inicio')?></th>
                                    <th><?= $this->Paginator->sort('fecha_fin')?></th>
                                    <th><?= $this->Paginator->sort('proyecto_id')?></th>
                                    <th><?= $this->Paginator->sort('estado')?></th>
                                    <th class="actions"><?= __('Actions')?></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php foreach ($tareas as $tarea):?>
                                <tr>
                                    <td><?= $this->Number->format($tarea->id)?></td>
                                    <td><?= h($tarea->nombre)?></td>
                                    <td><?= h($tarea->fecha_inicio)?></td>
                                    <td><?= h($tarea->fecha_fin)?></td>
                                    <td><?= h($proyecto->nombre)?></td>
                                    <td><?= h($tarea->estado)?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $tarea->id, 'class' => 'btn btn-primary'])?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tarea->id])?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tarea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tarea->id)])?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->first('<< ' . __('first'))?>
                            <?= $this->Paginator->prev('< '. __('previous'))?>
                            <?= $this->Paginator->numbers()?>
                            <?= $this->Paginator->next(__('next'). ' >')?>
                            <?= $this->Paginator->last(__('last'). ' >>')?>
                        </ul>
                        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total'))?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

