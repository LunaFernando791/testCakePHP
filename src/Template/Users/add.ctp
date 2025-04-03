<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Register User</h2>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($user)?>
                        <?= $this->Form->control('nombre', ['type' => 'text','required' => true,'placeholder' => 'Nombre', 'label' => __('Nombre'), 'autofocus' => true, 'autocomplete' => 'nombre', 'class' => 'form-control']); ?>
                        <br>
                        <?= $this->Form->control('email', ['type' => 'email','required' => true,'placeholder' => 'Email', 'label' => __('Email'), 'autofocus' => true, 'autocomplete' => 'email', 'class' => 'form-control']); ?>
                        <br>
                        <?= $this->Form->control('password', ['type' => 'password','required' => true,'placeholder' => 'Password', 'label' => __('Password'), 'class' => 'form-control']); ?>
                        <br>
                        <div class="text-center">
                            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login'])?>">Already have an account?</a>
                            <br>
                            <?= $this->Form->button(__('Register'),['class'=>'btn btn-primary']);?>
                        </div>
                        <br>
                    <?= $this->Form->end()?>
                </div>
            </div>
        </div>
    </div>
</div>