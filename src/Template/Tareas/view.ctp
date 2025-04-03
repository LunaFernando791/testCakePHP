<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tarea $tarea
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tarea'), ['action' => 'edit', $tarea->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tarea'), ['action' => 'delete', $tarea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tarea->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tareas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tarea'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tareas view large-9 medium-8 columns content">
    <h3><?= h($tarea->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($tarea->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($tarea->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tarea->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Proyecto') ?></th>
            <td><?= $this->Number->format($tarea->id_proyecto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Usuario Asignado') ?></th>
            <td><?= $this->Number->format($tarea->id_usuario_asignado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Inicio') ?></th>
            <td><?= h($tarea->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Fin') ?></th>
            <td><?= h($tarea->fecha_fin) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($tarea->descripcion)); ?>
    </div>
</div>
