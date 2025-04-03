<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tarea[]|\Cake\Collection\CollectionInterface $tareas
 */
?>

<div class="tareas index large-9 medium-8 columns content">
    <h3><?= __('Tareas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_fin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Proyecto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_usuario_asignado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tareas as $tarea): ?>
            <tr>
                <td><?= $this->Number->format($tarea->id) ?></td>
                <td><?= h($tarea->nombre) ?></td>
                <td><?= h($tarea->fecha_inicio) ?></td>
                <td><?= h($tarea->fecha_fin) ?></td>
                <td><?= h($tarea->estado) ?></td>
                <td><?= h($tarea->proyecto->nombre) ?></td>
                <td><?= $this->Number->format($tarea->id_usuario_asignado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tarea->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tarea->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tarea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tarea->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
