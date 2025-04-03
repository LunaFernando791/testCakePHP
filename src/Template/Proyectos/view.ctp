<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proyecto $proyecto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions')?></h4>
            <?= $this->Html->link(__('List Proyectos'), ['action' => 'index'], ['class' =>'side-nav-item'])?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="proyectos form content">
            <?= $this->Form->create($proyecto)?>
            <fieldset>
                <legend><?= __('Edit Proyecto')?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('fecha_inicio');
                    echo $this->Form->control('fecha_fin');
                    echo $this->Form->control('id_usuario_lider', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'))?>
            <?= $this->Form->end()?>
        </div>
    </div>
</div>  