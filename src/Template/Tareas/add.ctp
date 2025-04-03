<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tarea $tarea
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tareas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tareas form large-9 medium-8 columns content">
    <?= $this->Form->create($tarea) ?>
    <fieldset>
        <legend><?= __('Add Tarea') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('fecha_inicio', ['empty' => true]);
            echo $this->Form->control('fecha_fin', ['empty' => true]);
            echo $this->Form->control('estado');
            echo $this->Form->control('id_proyecto');
            echo $this->Form->control('id_usuario_asignado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
