<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proyecto $proyecto
 */
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>Editar Proyecto</h2>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($proyecto) ?>
                    <div class="form-group">
                        <?= $this->Form->control('nombre', ['class' => 'form-control'])?>
                    </div>
                    <br>
                    <div class="form-group">
                        <?= $this->Form->control('descripcion', ['class' => 'form-control'])?>
                    </div>
                    <br>
                    <div class="form-group">
                        <?= $this->Form->label('fecha_inicio', 'Fecha de inicio') ?>
                        <div class="input-group date">
                            <?= $this->Form->control('fecha_inicio', [
                                'type' => 'date',
                                'class' => 'form-control datepicker',
                                'label' => false,
                                'templates' => [
                                    'inputContainer' => '{{content}}'
                                ]
                            ])?>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">    
                        <?= $this->Form->label('fecha_fin', 'Fecha de finalización') ?>
                        <div class="input-group date">
                            <?= $this->Form->control('fecha_fin', [
                                'type' => 'date',
                                'class' => 'form-control datepicker',
                                'label' => false,
                                'templates' => [
                                    'inputContainer' => '{{content}}'
                                ]
                            ])?>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <?= $this->Form->control('id_usuario_lider', ['options' => $users, 'class' => 'form-control'])?>
                    </div>
                    <br>
                    <div class="form-group">
                        <?= $this->Form->button('Guardar', ['class' => 'btn btn-primary'])?>
                    </div>
                    <?= $this->Form->end()?>
                </div>
            </div>
        </div>
    </div>
</div>
