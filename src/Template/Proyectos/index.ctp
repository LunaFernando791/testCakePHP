<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proyecto[]|\Cake\Collection\CollectionInterface $proyectos
 */
?>
<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="card">
    <div class="card-body">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                <h3><?= __('Proyectos')?></h3>
                    <a href="<?= $this->Url->build(['action' => 'add'])?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        <?= __('New Proyecto')?>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                <caption>Lista de proyectos</caption>
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id')?></th>
                            <th><?= $this->Paginator->sort('nombre')?></th>
                            <th><?= $this->Paginator->sort('descripcion')?></th>
                            <th><?= $this->Paginator->sort('fecha_inicio')?></th>
                            <th><?= $this->Paginator->sort('fecha_fin')?></th>
                            <th><?= $this->Paginator->sort('encargado')?></th>
                            <th class="actions"><?= __('Actions')?></th>
                        </tr>
                    </thead>    
                    <tbody class="table-group-divider">
                        <?php foreach ($proyectos as $proyecto):?>
                        <tr>
                            <td><?= $this->Number->format($proyecto->id) ?></td>
                            <td><?= h($proyecto->nombre) ?></td>
                            <td><?= h($proyecto->descripcion) ?></td>       
                            <td><?= h($proyecto->fecha_inicio)?></td>
                            <td><?= h($proyecto->fecha_fin)?></td>
                            <td><?= h($proyecto->user->nombre)?></td>
                            <td class="actions">                    
                                <?= $this->Html->link(__('Tareas'), ['controller' => 'Proyectos', 'action' => 'tareas', $proyecto->id], ['class' => 'btn btn-success'])?>
                                <?= $this->Html->link(__('View'), ['action' => 'view', $proyecto->id], ['class' => 'btn btn-primary'])?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $proyecto->id], [
                                    'class' => 'btn btn-warning'
                                ])?>    
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $proyecto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proyecto->id), 'class' => 'btn btn-danger']
                                )?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="paginator"> 
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first'))?>
                    <?= $this->Paginator->prev('< ' . __('previous'))?>
                    <?= $this->Paginator->numbers()?>
                    <?= $this->Paginator->next(__('next') . ' >')?>
                    <?= $this->Paginator->last(__('last').' >>')?>
                </ul>
                <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total'))?></p>
            </div>
        </div>
    </div>
</div>
